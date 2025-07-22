<?php
/**
 * Abrar Future Tech's Frame Editor API
 * Backend PHP API for handling frame templates
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle OPTIONS request for CORS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Database configuration
class Database {
    private static $instance = null;
    private $connection;
    
    // Update these with your actual database credentials
    private $host = 'localhost';
    private $database = 'u230826074_frames';
    private $username = 'u230826074_frames';
    private $password = 'Jazir@123gold';
    
    private function __construct() {
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->database};charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
            throw new Exception("Database connection failed");
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
}

// Template management class
class FrameTemplateManager {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    /**
     * Save a new frame template
     */
    public function saveTemplate($data) {
        try {
            $sql = "INSERT INTO frame_templates (name, frame_image, selection_area, created_at) VALUES (?, ?, ?, NOW())";
            $stmt = $this->db->prepare($sql);
            
            $selectionAreaJson = json_encode($data['selectionArea']);
            
            $result = $stmt->execute([
                $data['name'],
                $data['frameImage'],
                $selectionAreaJson
            ]);
            
            if ($result) {
                $templateId = $this->db->lastInsertId();
                return [
                    'success' => true,
                    'templateId' => $templateId,
                    'message' => 'Template saved successfully'
                ];
            } else {
                throw new Exception('Failed to save template');
            }
        } catch (Exception $e) {
            error_log("Save template error: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Failed to save template: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Get all templates
     */
    public function getTemplates() {
        try {
            $sql = "SELECT id, name, frame_image, selection_area, created_at FROM frame_templates ORDER BY created_at DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            $templates = $stmt->fetchAll();
            
            // Limit frame_image size for listing (create thumbnails)
            foreach ($templates as &$template) {
                $template['frame_image'] = $this->createThumbnail($template['frame_image']);
            }
            
            return [
                'success' => true,
                'templates' => $templates
            ];
        } catch (Exception $e) {
            error_log("Get templates error: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Failed to retrieve templates: ' . $e->getMessage(),
                'templates' => []
            ];
        }
    }
    
    /**
     * Get a specific template by ID
     */
    public function getTemplate($templateId) {
        try {
            $sql = "SELECT id, name, frame_image, selection_area, created_at FROM frame_templates WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$templateId]);
            
            $template = $stmt->fetch();
            
            if ($template) {
                return [
                    'success' => true,
                    'template' => $template
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Template not found'
                ];
            }
        } catch (Exception $e) {
            error_log("Get template error: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Failed to retrieve template: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Delete a template
     */
    public function deleteTemplate($templateId) {
        try {
            $sql = "DELETE FROM frame_templates WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([$templateId]);
            
            if ($result && $stmt->rowCount() > 0) {
                return [
                    'success' => true,
                    'message' => 'Template deleted successfully'
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Template not found or already deleted'
                ];
            }
        } catch (Exception $e) {
            error_log("Delete template error: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Failed to delete template: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Create a thumbnail from base64 image data
     */
    private function createThumbnail($base64Image, $maxWidth = 300, $maxHeight = 200) {
        try {
            // Extract image data
            if (strpos($base64Image, 'data:image/') === 0) {
                $imageData = explode(',', $base64Image, 2);
                if (count($imageData) == 2) {
                    $imageString = base64_decode($imageData[1]);
                    $mimeType = $imageData[0];
                } else {
                    return $base64Image; // Return original if can't parse
                }
            } else {
                return $base64Image; // Return original if not base64
            }
            
            // Create image resource from string
            $sourceImage = imagecreatefromstring($imageString);
            if (!$sourceImage) {
                return $base64Image;
            }
            
            // Get original dimensions
            $originalWidth = imagesx($sourceImage);
            $originalHeight = imagesy($sourceImage);
            
            // Calculate new dimensions
            $ratio = min($maxWidth / $originalWidth, $maxHeight / $originalHeight);
            $newWidth = (int)($originalWidth * $ratio);
            $newHeight = (int)($originalHeight * $ratio);
            
            // Create new image
            $thumbnail = imagecreatetruecolor($newWidth, $newHeight);
            
            // Preserve transparency for PNG
            if (strpos($mimeType, 'png') !== false) {
                imagealphablending($thumbnail, false);
                imagesavealpha($thumbnail, true);
                $transparent = imagecolorallocatealpha($thumbnail, 255, 255, 255, 127);
                imagefill($thumbnail, 0, 0, $transparent);
            }
            
            // Resize image
            imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
            
            // Output to buffer
            ob_start();
            if (strpos($mimeType, 'png') !== false) {
                imagepng($thumbnail, null, 6); // Compression level 6
            } else {
                imagejpeg($thumbnail, null, 75); // Quality 75
            }
            $thumbnailData = ob_get_contents();
            ob_end_clean();
            
            // Clean up
            imagedestroy($sourceImage);
            imagedestroy($thumbnail);
            
            // Return base64 encoded thumbnail
            return $mimeType . ',' . base64_encode($thumbnailData);
            
        } catch (Exception $e) {
            error_log("Thumbnail creation error: " . $e->getMessage());
            return $base64Image; // Return original on error
        }
    }
}

// Request handler class
class RequestHandler {
    private $templateManager;
    
    public function __construct() {
        $this->templateManager = new FrameTemplateManager();
    }
    
    public function handleRequest() {
        try {
            // Get request data
            $input = file_get_contents('php://input');
            $data = json_decode($input, true);
            
            if (!$data || !isset($data['action'])) {
                return $this->sendError('Invalid request format');
            }
            
            $action = $data['action'];
            
            switch ($action) {
                case 'saveTemplate':
                    return $this->handleSaveTemplate($data);
                
                case 'getTemplates':
                    return $this->handleGetTemplates();
                
                case 'getTemplate':
                    return $this->handleGetTemplate($data);
                
                case 'deleteTemplate':
                    return $this->handleDeleteTemplate($data);
                
                default:
                    return $this->sendError('Unknown action: ' . $action);
            }
            
        } catch (Exception $e) {
            error_log("Request handler error: " . $e->getMessage());
            return $this->sendError('Internal server error');
        }
    }
    
    private function handleSaveTemplate($data) {
        if (!isset($data['data'])) {
            return $this->sendError('Template data is required');
        }
        
        $templateData = $data['data'];
        
        // Validate required fields
        $required = ['name', 'frameImage', 'selectionArea'];
        foreach ($required as $field) {
            if (!isset($templateData[$field]) || empty($templateData[$field])) {
                return $this->sendError("Field '$field' is required");
            }
        }
        
        // Validate selection area
        $selectionArea = $templateData['selectionArea'];
        $requiredCoords = ['x', 'y', 'width', 'height'];
        foreach ($requiredCoords as $coord) {
            if (!isset($selectionArea[$coord]) || !is_numeric($selectionArea[$coord])) {
                return $this->sendError("Selection area '$coord' must be a number");
            }
        }
        
        // Validate image data
        if (strpos($templateData['frameImage'], 'data:image/') !== 0) {
            return $this->sendError('Invalid image format');
        }
        
        $result = $this->templateManager->saveTemplate($templateData);
        return $this->sendResponse($result);
    }
    
    private function handleGetTemplates() {
        $result = $this->templateManager->getTemplates();
        return $this->sendResponse($result);
    }
    
    private function handleGetTemplate($data) {
        if (!isset($data['templateId'])) {
            return $this->sendError('Template ID is required');
        }
        
        $templateId = filter_var($data['templateId'], FILTER_VALIDATE_INT);
        if ($templateId === false) {
            return $this->sendError('Invalid template ID');
        }
        
        $result = $this->templateManager->getTemplate($templateId);
        return $this->sendResponse($result);
    }
    
    private function handleDeleteTemplate($data) {
        if (!isset($data['templateId'])) {
            return $this->sendError('Template ID is required');
        }
        
        $templateId = filter_var($data['templateId'], FILTER_VALIDATE_INT);
        if ($templateId === false) {
            return $this->sendError('Invalid template ID');
        }
        
        $result = $this->templateManager->deleteTemplate($templateId);
        return $this->sendResponse($result);
    }
    
    private function sendResponse($data) {
        echo json_encode($data);
    }
    
    private function sendError($message) {
        echo json_encode([
            'success' => false,
            'message' => $message
        ]);
    }
}

// Error handling
set_error_handler(function($severity, $message, $file, $line) {
    if (!(error_reporting() & $severity)) {
        return false;
    }
    error_log("PHP Error: $message in $file on line $line");
    return true;
});

set_exception_handler(function($exception) {
    error_log("Uncaught exception: " . $exception->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Internal server error'
    ]);
});

// Main execution
try {
    $handler = new RequestHandler();
    $handler->handleRequest();
} catch (Exception $e) {
    error_log("Main execution error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Internal server error'
    ]);
}
?>