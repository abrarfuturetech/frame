<?php
/**
 * Abrar Future Tech's Frame Editor
 * Database Configuration File
 * 
 * IMPORTANT: Update these settings with your actual database credentials
 * Keep this file secure and never expose it publicly
 */

// Prevent direct access
if (!defined('FRAME_EDITOR_ACCESS')) {
    die('Direct access not permitted.');
}

// Environment Configuration
define('ENVIRONMENT', 'development'); // Options: 'development', 'production'

// Database Configuration
class Config {
    
    // Database Settings
    public static function getDatabaseConfig() {
        $config = [
            'development' => [
                'host' => 'localhost',
                'port' => 3306,
                'database' => 'dbname',
                'username' => 'username',
                'password' => 'password',
                'charset' => 'utf8mb4',
                'options' => [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_PERSISTENT => false,
                    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
                ]
            ],
            'production' => [
                'host' => 'your_production_host',
                'port' => 3306,
                'database' => 'frame_editor_prod',
                'username' => 'prod_username',
                'password' => 'secure_prod_password',
                'charset' => 'utf8mb4',
                'options' => [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_PERSISTENT => true,
                    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true,
                ]
            ]
        ];
        
        return $config[ENVIRONMENT] ?? $config['development'];
    }
    
    // Application Settings
    public static function getAppConfig() {
        return [
            'app_name' => 'Abrar Future Tech\'s Frame Editor',
            'version' => '1.0.0',
            'timezone' => 'UTC',
            'max_image_size' => 10 * 1024 * 1024, // 10MB
            'allowed_image_types' => ['image/jpeg', 'image/png', 'image/gif'],
            'thumbnail_max_width' => 300,
            'thumbnail_max_height' => 200,
            'cache_duration' => 3600, // 1 hour
            'rate_limit_requests' => 100, // requests per hour per IP
        ];
    }
    
    // Security Settings
    public static function getSecurityConfig() {
        return [
            'enable_cors' => true,
            'allowed_origins' => ['*'], // Update with specific domains in production
            'session_timeout' => 3600,
            'max_login_attempts' => 5,
            'lockout_duration' => 1800, // 30 minutes
            'password_min_length' => 8,
            'require_https' => ENVIRONMENT === 'production',
        ];
    }
    
    // File Upload Settings
    public static function getUploadConfig() {
        return [
            'max_file_size' => 10 * 1024 * 1024, // 10MB
            'allowed_extensions' => ['jpg', 'jpeg', 'png', 'gif'],
            'upload_path' => __DIR__ . '/uploads/',
            'temp_path' => __DIR__ . '/temp/',
            'enable_compression' => true,
            'compression_quality' => 80,
        ];
    }
    
    // API Settings
    public static function getApiConfig() {
        return [
            'api_version' => 'v1',
            'rate_limiting' => true,
            'enable_logging' => true,
            'log_file' => __DIR__ . '/logs/api.log',
            'enable_caching' => true,
            'cache_type' => 'file', // Options: 'file', 'redis', 'memcached'
        ];
    }
    
    // Email Configuration (for notifications, password reset, etc.)
    public static function getEmailConfig() {
        return [
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_username' => 'your_email@gmail.com',
            'smtp_password' => 'your_app_password',
            'from_email' => 'noreply@abrartechfuture.com',
            'from_name' => 'Abrar Future Tech\'s',
            'use_tls' => true,
        ];
    }
    
    // Logging Configuration
    public static function getLoggingConfig() {
        return [
            'enabled' => true,
            'level' => ENVIRONMENT === 'development' ? 'DEBUG' : 'ERROR',
            'file' => __DIR__ . '/logs/application.log',
            'max_file_size' => 10 * 1024 * 1024, // 10MB
            'max_files' => 5,
            'log_queries' => ENVIRONMENT === 'development',
            'log_errors' => true,
        ];
    }
}

// Utility Functions
class ConfigHelper {
    
    /**
     * Get full database DSN string
     */
    public static function getDatabaseDSN() {
        $config = Config::getDatabaseConfig();
        return "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']};charset={$config['charset']}";
    }
    
    /**
     * Validate configuration settings
     */
    public static function validateConfig() {
        $errors = [];
        
        $dbConfig = Config::getDatabaseConfig();
        if (empty($dbConfig['host']) || empty($dbConfig['database']) || 
            empty($dbConfig['username']) || empty($dbConfig['password'])) {
            $errors[] = 'Database configuration is incomplete';
        }
        
        $uploadConfig = Config::getUploadConfig();
        if (!is_dir($uploadConfig['upload_path'])) {
            if (!mkdir($uploadConfig['upload_path'], 0755, true)) {
                $errors[] = 'Cannot create upload directory';
            }
        }
        
        if (!is_writable($uploadConfig['upload_path'])) {
            $errors[] = 'Upload directory is not writable';
        }
        
        return $errors;
    }
    
    /**
     * Create necessary directories
     */
    public static function createDirectories() {
        $directories = [
            Config::getUploadConfig()['upload_path'],
            Config::getUploadConfig()['temp_path'],
            dirname(Config::getLoggingConfig()['file']),
            dirname(Config::getApiConfig()['log_file']),
        ];
        
        foreach ($directories as $dir) {
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
        }
    }
    
    /**
     * Get environment-specific setting
     */
    public static function get($key, $default = null) {
        static $config = null;
        
        if ($config === null) {
            $config = array_merge(
                Config::getAppConfig(),
                Config::getDatabaseConfig(),
                Config::getSecurityConfig(),
                Config::getUploadConfig(),
                Config::getApiConfig(),
                Config::getEmailConfig(),
                Config::getLoggingConfig()
            );
        }
        
        return $config[$key] ?? $default;
    }
}

// Initialize configuration
try {
    // Set timezone
    date_default_timezone_set(Config::getAppConfig()['timezone']);
    
    // Create necessary directories
    ConfigHelper::createDirectories();
    
    // Validate configuration
    $configErrors = ConfigHelper::validateConfig();
    if (!empty($configErrors) && ENVIRONMENT === 'development') {
        foreach ($configErrors as $error) {
            error_log("Configuration Error: " . $error);
        }
    }
    
} catch (Exception $e) {
    error_log("Configuration initialization failed: " . $e->getMessage());
}

// Define constants for easy access
define('DB_HOST', Config::getDatabaseConfig()['host']);
define('DB_NAME', Config::getDatabaseConfig()['database']);
define('DB_USER', Config::getDatabaseConfig()['username']);
define('DB_PASS', Config::getDatabaseConfig()['password']);
define('UPLOAD_PATH', Config::getUploadConfig()['upload_path']);
define('MAX_FILE_SIZE', Config::getUploadConfig()['max_file_size']);

// Export configuration for JavaScript (if needed)
function getClientConfig() {
    return [
        'app_name' => Config::getAppConfig()['app_name'],
        'version' => Config::getAppConfig()['version'],
        'max_file_size' => Config::getUploadConfig()['max_file_size'],
        'allowed_extensions' => Config::getUploadConfig()['allowed_extensions'],
        'thumbnail_dimensions' => [
            'width' => Config::getAppConfig()['thumbnail_max_width'],
            'height' => Config::getAppConfig()['thumbnail_max_height']
        ]
    ];
}

/*
SETUP INSTRUCTIONS:

1. Update Database Credentials:
   - Change 'your_username' and 'your_password' to your actual MySQL credentials
   - Update host if not using localhost
   - Ensure the database 'frame_editor' exists

2. Directory Permissions:
   - Ensure the web server can write to the uploads/ and logs/ directories
   - Set appropriate permissions: chmod 755 for directories, chmod 644 for files

3. Production Settings:
   - Change ENVIRONMENT to 'production'
   - Update production database credentials
   - Set specific allowed origins for CORS
   - Enable HTTPS requirement
   - Use strong passwords and secure connection strings

4. Optional Features:
   - Configure SMTP settings for email functionality
   - Set up Redis or Memcached for caching
   - Configure proper logging directories

5. Security Checklist:
   - Never commit this file with actual credentials to version control
   - Use environment variables for sensitive data in production
   - Regularly rotate database passwords
   - Keep PHP and MySQL updated
   - Monitor logs for suspicious activity

6. Testing:
   - Test database connection
   - Verify file upload functionality
   - Check error logging is working
   - Validate API endpoints respond correctly
*/

?>
