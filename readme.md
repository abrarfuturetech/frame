
# Frame Editor Platform by Abrar Future Tech

A modern, feature-rich web application for creating and customizing professional photo frame templates. Built with **HTML**, **Tailwind CSS**, and **JavaScript**, this platform enables users to design frame templates with precise image placement, apply customizable border effects, and share templates via unique links. Users can upload their images to fit into these templates and download high-quality results. The application is optimized for both desktop and mobile devices, offering a seamless and visually appealing experience.

---

## 🚀 Features

- **Precision Editor**: Adjust image placement using sliders or mouse-based drag-and-resize controls with real-time preview.
- **Custom Border Effects**: Apply adjustable border radius to frame selection areas for a polished look.
- **Instant Sharing**: Generate shareable links for templates, allowing others to use them with their own images.
- **Smart Compression**: Automatically compress images for fast loading while maintaining quality.
- **Mobile Responsive**: Fully responsive design for desktops, tablets, and smartphones.
- **Cloud Storage**: Save and access templates securely (requires backend integration).
- **Live Preview**: Real-time visualization of frame templates and user-uploaded images.
- **High-Quality Downloads**: Export framed images as high-quality PNG files.
- **Glassmorphism UI**: Sleek, modern interface with glassmorphism effects, gradients, and smooth animations.
- **Keyboard Shortcuts**: Quick actions like saving templates (`Ctrl+S`), downloading results (`Ctrl+D`), and returning to the home page (`Escape`).
- **SEO Optimized**: Includes meta tags, Open Graph, and Twitter Card support for better discoverability.
- **Custom Animations**: Features fade-in, slide-up, float, glow, and gradient-shift animations for an engaging experience.

---

## 📁 File Structure

```
frame-editor/
├── index.html           # Main HTML file containing frontend logic and UI
├── README.md            # This documentation file
└── api.php              # Backend API (not included, must be implemented separately)
```

---

## 🛠 Getting Started

### ✅ Prerequisites

- A modern web browser (e.g., Chrome, Firefox, Safari)
- A web server (e.g., Apache, Nginx) or a local development environment (e.g., XAMPP, WAMP)
- A PHP-enabled server for the backend API (`api.php`) if using template storage

### 🔧 Installation

1. **Clone or Download the Repository**

```bash
git clone https://github.com/abrarfuturetech/frame.git
```

Or [download ZIP](#) and extract.

2. **Set Up a Web Server**

Place the project in your web server root (e.g., `htdocs` for XAMPP), or use a simple server:

```bash
npm install -g http-server
cd frame-editor
http-server
```

Access at: `http://localhost:8080` (or your chosen port).

3. **Backend Setup (Optional)**

Implement `api.php` with these endpoints:

- `POST /api.php` with `action: saveTemplate`
- `POST /api.php` with `action: getTemplates`
- `POST /api.php` with `action: getTemplate`
- `POST /api.php` with `action: deleteTemplate`

#### Example Response Format

```json
{
  "success": true,
  "templates": [
    {
      "id": 1,
      "name": "Sample Frame",
      "frame_image": "data:image/jpeg;base64,...",
      "selection_area": "{"x":20,"y":20,"width":40,"height":40,"borderRadius":0}",
      "created_at": "2025-07-22T10:00:00Z"
    }
  ]
}
```

---

## 🧭 Usage

### 🏠 Home Page

- Hero section with intro
- Get Started → Creator Studio
- Learn More → Scroll to Features
- Browse Templates → (Future Feature)

### 🖼 Frame Creator Studio (Admin)

- Upload frame image
- Adjust selection area (X, Y, Width, Height, Radius)
- Save Template & Generate Shareable Link
- View & Manage Templates (Edit/Delete – backend required)

### 👥 User Page

- Open via shareable link `?frameId=ID`
- Upload image → Live preview
- Download Framed Image (PNG)
- Option to create their own template

---

## ⌨ Keyboard Shortcuts

| Shortcut     | Action                          |
|--------------|---------------------------------|
| Ctrl + S     | Save template (Admin)           |
| Ctrl + D     | Download image (User)           |
| Escape       | Return to Home Page             |

---

## 🎨 Customization

### Tailwind CSS

- `primary`: `#3b82f6` (Blue)
- `secondary`: `#1e40af` (Dark Blue)
- `accent`: `#06b6d4` (Cyan)
- `dark`: `#0f172a`

### Animations

Defined via `@keyframes`:

- `fadeIn`, `slideUp`, `float`, `glow`, `gradientShift`

Modify in `<style>` tag or CSS file as needed.

---

## 🧠 JavaScript Overview

- `compressImage()` – Compress input images
- `setupMouseSelection()` – Drag/resize box
- `createCompositeImage()` – Merge user + frame
- `debugFrameEditor()` – Console state dump
- `saveTemplate()`, `loadTemplates()` – Backend communication

---

## 🗄 Backend (`api.php`)

Use MySQL (or any DB) with this suggested schema:

```sql
CREATE TABLE templates (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  frame_image TEXT NOT NULL,
  selection_area TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## ⚠️ Limitations

- Requires `api.php` for full functionality
- Edit/Delete are disabled without backend
- Images must have correct CORS headers
- Max image size: 10MB
- Max width after compression: 1200px

---

## 🧩 Troubleshooting

| Issue                | Fix                                                                 |
|----------------------|----------------------------------------------------------------------|
| Image not loading     | Check format and size (≤10MB)                                       |
| API issues            | Ensure `api.php` is deployed and accessible                         |
| Download not working  | Validate that preview canvas is rendered, try another browser       |
| Selection bug         | Confirm a frame image is loaded; use `debugFrameEditor()` to check |

---

## 👨‍💻 License

This project is proprietary to **Abrar Future Tech**. For commercial or external usage, contact the author.

---

Made with ❤️ by [Abrar Future Tech](https://abrarfuturetech.com)
