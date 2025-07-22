# Frame Editor Platform by Abrar Future Tech

A modern, feature-rich web application for creating and customizing professional photo frame templates. Built with HTML, Tailwind CSS, and JavaScript, this platform enables users to design frame templates with precise image placement, apply customizable border effects, and share templates via unique links. Users can upload their images to fit into these templates and download high-quality results. The application is optimized for both desktop and mobile devices, offering a seamless and visually appealing experience.

---

## Features

- **Precision Editor**: Adjust image placement using sliders or mouse-based drag-and-resize controls with real-time preview.
- **Custom Border Effects**: Apply adjustable border radius to frame selection areas for a polished look.
- **Instant Sharing**: Generate shareable links for templates, allowing others to use them with their own images.
- **Smart Compression**: Automatically compress images for fast loading while maintaining quality.
- **Mobile Responsive**: Fully responsive design for desktops, tablets, and smartphones.
- **Cloud Storage**: Save and access templates securely (requires backend integration).
- **Live Preview**: Real-time visualization of frame templates and user-uploaded images.
- **High-Quality Downloads**: Export framed images as high-quality PNG files.
- **Glassmorphism UI**: Sleek, modern interface with glassmorphism effects, gradients, and smooth animations.
- **Keyboard Shortcuts**: Quick actions like saving templates (Ctrl+S), downloading results (Ctrl+D), and returning to the home page (Escape).
- **SEO Optimized**: Includes meta tags, Open Graph, and Twitter Card support for better discoverability.
- **Custom Animations**: Features fade-in, slide-up, float, glow, and gradient-shift animations for an engaging experience.

---

## File Structure
frame-editor/
├── index.html           # Main HTML file containing frontend logic and UI
├── README.md            # This documentation file
└── api.php              # Backend API (not included, must be implemented separately)

text

Collapse

Wrap

Copy
---

## Getting Started

### Prerequisites
- A modern web browser (e.g., Chrome, Firefox, Safari).
- A web server (e.g., Apache, Nginx) or a local development environment (e.g., XAMPP, WAMP, or Node.js with `http-server`).
- A PHP-enabled server for the backend API (`api.php`) if template storage is needed.

### Installation
1. **Clone or Download the Repository**:
   ```bash
   git clone https://github.com/your-username/frame-editor.git
Or download the ZIP file and extract it.

Set Up a Web Server:
Place the project files in your web server's root directory (e.g., htdocs for XAMPP).
Alternatively, use a local server like http-server:
bash

Collapse

Wrap

Run

Copy
npm install -g http-server
cd frame-editor
http-server
Access the application at http://localhost:port (replace port with your server's port, e.g., 8080).
Backend Setup (Optional):
The frontend communicates with a backend API (api.php) for template management. Implement the following endpoints:
POST /api.php with action: 'saveTemplate': Save a template (name, frame image, selection area).
POST /api.php with action: 'getTemplates': Retrieve all saved templates.
POST /api.php with action: 'getTemplate': Retrieve a specific template by ID.
POST /api.php with action: 'deleteTemplate': Delete a template by ID.
Example response format:
json

Collapse

Wrap

Copy
{
  "success": true,
  "templates": [
    {
      "id": 1,
      "name": "Sample Frame",
      "frame_image": "data:image/jpeg;base64,...",
      "selection_area": "{\"x\":20,\"y\":20,\"width\":40,\"height\":40,\"borderRadius\":0}",
      "created_at": "2025-07-22T10:00:00Z"
    }
  ]
}
Host api.php on a PHP-enabled server and update the API_BASE constant in the JavaScript code if needed.
Usage
Home Page
Overview: Showcases the platform with a hero section, feature highlights, and calls-to-action.
Actions:
Get Started Free or Create Your First Frame: Navigate to the Frame Creator Studio.
Learn More: Scroll to the features section.
Browse Templates: Placeholder for future template browsing functionality (not implemented in frontend).
Frame Creator Studio (Admin Page)
Purpose: Design and manage frame templates.
Steps:
Upload a frame image (PNG, JPG, or GIF, up to 10MB).
Adjust the selection area using sliders (X, Y, Width, Height, Border Radius) or drag/resize with the mouse.
Enter a template name and click Save Template & Generate Link.
Copy the shareable link to distribute the template.
View and manage saved templates in the Your Templates section (refresh to update).
User Page
Purpose: Apply a user’s image to a pre-designed frame template.
Steps:
Access via a shareable link (?frameId=ID) or navigate manually.
Upload an image to fit the template’s selection area.
Preview the composite image in real-time.
Click Download Framed Image to save as a PNG.
Click Create Your Own Frame Template to switch to the Frame Creator Studio.
Keyboard Shortcuts
Ctrl+S (Admin Page): Save the current template.
Ctrl+D (User Page): Download the framed image.
Escape: Return to the home page.
Customization
Styling
Tailwind CSS: Utilizes Tailwind CSS with custom configurations for colors, fonts, and animations.
Custom Colors:
primary: #3b82f6 (Blue)
secondary: #1e40af (Dark Blue)
accent: #06b6d4 (Cyan)
dark: #0f172a (Dark Background)
Animations:
Defined in the <style> section (fadeIn, slideUp, float, glow, gradientShift).
Customize animations by modifying @keyframes or adding new ones.
JavaScript
Core Functions:
Image compression (compressImage): Reduces image size for performance.
Mouse-based selection (setupMouseSelection): Enables drag-and-resize functionality.
Canvas rendering (createCompositeImage): Combines user images with frames.
API integration: Handles template saving, loading, and sharing.
Debugging:
Run window.debugFrameEditor() in the browser console to view the current state (frame image, selection area, etc.).
Extending Features:
Add image filters, rotation, or opacity controls.
Implement template categories or user authentication.
Enhance error handling for better user feedback.
Backend (api.php)
The frontend expects a PHP-based API for template storage. Replace with any backend (e.g., Node.js, Python) supporting the required endpoints.
Suggested MySQL schema:
sql

Collapse

Wrap

Copy
CREATE TABLE templates (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  frame_image TEXT NOT NULL,
  selection_area TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
Limitations
Backend Requirement: Template storage requires a backend API (api.php), which is not provided.
Disabled Features: The Edit and Delete buttons in the templates list are disabled (require backend implementation).
CORS Issues: Images must be served with proper CORS headers to avoid canvas-related errors.
File Size Limit: Images are capped at 10MB and compressed to a maximum width of 1200px.
Troubleshooting
Images Not Loading: Verify image format and size (≤10MB). Check the console for errors.
API Failures: Ensure api.php is correctly implemented and accessible. Inspect the network tab for details.
Selection Area Issues: Confirm a frame image is loaded before adjusting. Use window.debugFrameEditor() to debug.
Download Failures: Ensure the result preview contains a valid image. Try a different browser if CORS issues occur.
