<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Create and customize professional photo frames with Abrar Future Tech's Frame Editor. Upload frames, set precise image positions with sliders, apply border radius effects, and download high-quality results." />
  <meta name="keywords" content="Frame Editor, Photo Frame Tool, Abrar Future Tech, Online Image Editor, Custom Frames, Frame Design, Border Radius Frames" />
  <meta name="author" content="Abrar Future Tech" />
  <meta name="robots" content="index, follow" />
  
  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Frame Editor Platform by Abrar Future Tech" />
  <meta property="og:description" content="Professional frame editor with precise image placement, border radius customization, and instant sharing capabilities." />
  <meta property="og:url" content="https://frames.abrarfuturetech.com/" />
  <meta property="og:image" content="https://abrarfuturetech.com/public/uploads/logo.png" />
  <meta property="og:site_name" content="Abrar Future Tech" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Frame Editor Platform by Abrar Future Tech" />
  <meta name="twitter:description" content="Create professional photo frames with precise positioning and customizable border effects." />
  <meta name="twitter:image" content="https://abrarfuturetech.com/public/uploads/logo.png" />

  <title>Frame Editor Platform by Abrar Future Tech | Professional Frame Design</title>
  <link rel="canonical" href="https://www.abrarfuturetech.com/frame-editor" />
  <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' rx='20' fill='%233b82f6'/%3E%3Crect x='20' y='20' width='60' height='60' rx='10' fill='%2306b6d4'/%3E%3Ctext x='50' y='65' font-family='Inter, sans-serif' font-size='40' fill='%23ffffff' text-anchor='middle' font-weight='bold'%3EA%3C/text%3E%3C/svg%3E" type="image/svg+xml" />

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#3b82f6',
            secondary: '#1e40af',
            accent: '#06b6d4',
            'purple-gradient-start': '#8b5cf6',
            'purple-gradient-end': '#3b82f6',
            dark: '#0f172a',
            'dark-secondary': '#1e293b'
          },
          fontFamily: {
            'sans': ['Inter', 'system-ui', 'sans-serif'],
          },
          animation: {
            'fade-in': 'fadeIn 0.8s ease-out',
            'slide-up': 'slideUp 0.6s ease-out',
            'float': 'float 6s ease-in-out infinite',
            'pulse-slow': 'pulse 3s infinite',
            'glow': 'glow 2s ease-in-out infinite alternate',
            'gradient-shift': 'gradientShift 8s ease-in-out infinite',
          }
        }
      }
    }
  </script>
  <style>
    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes slideUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-10px); } }
    @keyframes glow { 0% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); } 100% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.6), 0 0 60px rgba(59, 130, 246, 0.3); } }
    @keyframes gradientShift { 0%, 100% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } }
    
    .glass-morphism {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .glass-dark {
      background: rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .gradient-bg {
      background: linear-gradient(-45deg, #1e3a8a, #3b82f6, #06b6d4, #8b5cf6);
      background-size: 400% 400%;
      animation: gradientShift 8s ease-in-out infinite;
    }
    
    .hero-pattern {
      background-image: radial-gradient(circle at 25px 25px, rgba(255,255,255,.1) 2px, transparent 0),
                        radial-gradient(circle at 75px 75px, rgba(255,255,255,.1) 2px, transparent 0);
      background-size: 100px 100px;
    }
    
    .selection-area {
      border: 3px dashed #3b82f6;
      background: rgba(59, 130, 246, 0.1);
      position: absolute;
      cursor: crosshair;
      transition: all 0.2s ease;
    }
    
    .selection-area:hover {
      border-color: #06b6d4;
      background: rgba(6, 182, 212, 0.15);
    }
    
    .resize-handle {
      width: 14px;
      height: 14px;
      background: #3b82f6;
      border: 2px solid white;
      border-radius: 50%;
      position: absolute;
      cursor: nw-resize;
      transition: all 0.2s ease;
    }
    
    .resize-handle:hover {
      background: #06b6d4;
      transform: scale(1.2);
    }
    
    .resize-handle.nw { top: -7px; left: -7px; }
    .resize-handle.ne { top: -7px; right: -7px; cursor: ne-resize; }
    .resize-handle.sw { bottom: -7px; left: -7px; cursor: sw-resize; }
    .resize-handle.se { bottom: -7px; right: -7px; cursor: se-resize; }
    
    .nav-pill {
      position: relative;
      overflow: hidden;
    }
    
    .nav-pill::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }
    
    .nav-pill:hover::before {
      left: 100%;
    }
    
    .feature-card {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      transform: perspective(1000px) rotateX(0deg);
    }
    
    .feature-card:hover {
      transform: perspective(1000px) rotateX(5deg) translateY(-10px);
    }
    
    .btn-primary {
      background: linear-gradient(135deg, #3b82f6, #1e40af);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .btn-primary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: left 0.5s;
    }
    
    .btn-primary:hover::before {
      left: 100%;
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
    }
    
    .page-transition {
      transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .slide-in-right {
      transform: translateX(100%);
      opacity: 0;
    }
    
    .slide-in-left {
      transform: translateX(-100%);
      opacity: 0;
    }
    
    .slide-in-active {
      transform: translateX(0);
      opacity: 1;
    }
  </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-dark via-dark-secondary to-dark text-white font-sans">
  <!-- Navigation Header -->
  <header class="fixed top-0 left-0 right-0 z-50 glass-morphism">
    <div class="container mx-auto px-6 py-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
          <div class="w-12 h-12 rounded-xl flex items-center justify-center animate-float">
            <svg width="40" height="40" viewBox="0 0 100 100">
              <rect width="100" height="100" rx="20" fill="#3b82f6"/>
              <rect x="20" y="20" width="60" height="60" rx="10" fill="#06b6d4"/>
              <text x="50" y="65" font-family="Inter, sans-serif" font-size="40" fill="#ffffff" text-anchor="middle" font-weight="bold">A</text>
            </svg>
          </div>
          <div>
            <h1 class="text-xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Abrar's</h1>
            <p class="text-xs text-gray-400">Frame Editor Platform</p>
          </div>
        </div>
        <nav class="flex items-center space-x-2">
          <button id="homeBtn" class="nav-pill px-4 py-2 rounded-full glass-dark hover:glass-morphism transition-all duration-300">🏠 Home</button>
          <button id="adminBtn" class="nav-pill px-4 py-2 rounded-full glass-dark hover:glass-morphism transition-all duration-300">⚙️ Create</button>
          <button id="userBtn" class="nav-pill px-4 py-2 rounded-full glass-dark hover:glass-morphism transition-all duration-300">👤 Use Frame</button>
        </nav>
      </div>
    </div>
  </header>

  <!-- Loading Indicator -->
  <div id="loadingIndicator" class="fixed inset-0 bg-black bg-opacity-60 z-50 flex items-center justify-center hidden">
    <div class="glass-morphism p-8 rounded-3xl text-center animate-pulse-slow">
      <div class="w-16 h-16 border-4 border-primary border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
      <p class="text-lg font-medium">Processing...</p>
      <p class="text-sm text-gray-400 mt-2">Please wait while we work our magic</p>
    </div>
  </div>

  <!-- Toast Messages Container -->
  <div id="messageContainer" class="fixed top-24 right-6 z-40 space-y-3 max-w-sm"></div>

  <!-- Home Page -->
  <div id="homePage" class="page-transition min-h-screen">
    <section class="pt-32 pb-20 hero-pattern">
      <div class="container mx-auto px-6 text-center">
        <div class="animate-fade-in">
          <h2 class="text-6xl md:text-7xl font-black mb-8 bg-gradient-to-r from-white via-blue-100 to-cyan-100 bg-clip-text text-transparent leading-tight">
            Professional<br><span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">Frame Editor</span>
          </h2>
          <p class="text-xl md:text-2xl text-gray-300 max-w-4xl mx-auto mb-12 leading-relaxed">
            Create stunning photo frames with precise image placement and customizable border effects using our AI-powered platform.
          </p>
          <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-16">
            <button id="getStartedBtn" class="btn-primary px-8 py-4 rounded-2xl text-lg font-semibold animate-glow">🚀 Get Started Free</button>
            <button id="learnMoreBtn" class="glass-morphism px-8 py-4 rounded-2xl text-lg font-medium hover:bg-white hover:bg-opacity-20 transition-all duration-300">📖 Learn More</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gradient-to-r from-dark-secondary to-dark">
      <div class="container mx-auto px-6">
        <div class="text-center mb-16 animate-slide-up">
          <h3 class="text-4xl font-bold mb-6">Powerful Features</h3>
          <p class="text-xl text-gray-400 max-w-2xl mx-auto">Everything you need to create professional frame templates</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="feature-card glass-dark p-8 rounded-3xl">
            <div class="w-16 h-16 bg-gradient-to-br from-primary to-accent rounded-2xl flex items-center justify-center mb-6 animate-float">
              <span class="text-2xl">🎨</span>
            </div>
            <h4 class="text-xl font-bold mb-4">Precision Editor</h4>
            <p class="text-gray-400">Use sliders or mouse for pixel-perfect image placement with real-time preview.</p>
          </div>
          <div class="feature-card glass-dark p-8 rounded-3xl">
            <div class="w-16 h-16 bg-gradient-to-br from-purple-gradient-start to-purple-gradient-end rounded-2xl flex items-center justify-center mb-6 animate-float" style="animation-delay: 0.2s;">
              <span class="text-2xl">🔗</span>
            </div>
            <h4 class="text-xl font-bold mb-4">Instant Sharing</h4>
            <p class="text-gray-400">Generate shareable links instantly for user access.</p>
          </div>
          <div class="feature-card glass-dark p-8 rounded-3xl">
            <div class="w-16 h-16 bg-gradient-to-br from-accent to-primary rounded-2xl flex items-center justify-center mb-6 animate-float" style="animation-delay: 0.4s;">
              <span class="text-2xl">⚡</span>
            </div>
            <h4 class="text-xl font-bold mb-4">Smart Compression</h4>
            <p class="text-gray-400">Optimized images for fast loading and high quality.</p>
          </div>
          <div class="feature-card glass-dark p-8 rounded-3xl">
            <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-blue-500 rounded-2xl flex items-center justify-center mb-6 animate-float" style="animation-delay: 0.6s;">
              <span class="text-2xl">📱</span>
            </div>
            <h4 class="text-xl font-bold mb-4">Mobile Responsive</h4>
            <p class="text-gray-400">Create and edit templates on any device.</p>
          </div>
          <div class="feature-card glass-dark p-8 rounded-3xl">
            <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6 animate-float" style="animation-delay: 0.8s;">
              <span class="text-2xl">💾</span>
            </div>
            <h4 class="text-xl font-bold mb-4">Cloud Storage</h4>
            <p class="text-gray-400">Securely save and access templates from anywhere.</p>
          </div>
          <div class="feature-card glass-dark p-8 rounded-3xl">
            <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 animate-float" style="animation-delay: 1s;">
              <span class="text-2xl">🎨</span>
            </div>
            <h4 class="text-xl font-bold mb-4">Custom Border Effects</h4>
            <p class="text-gray-400">Apply rounded corners to frames for a polished look.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 gradient-bg hero-pattern">
      <div class="container mx-auto px-6 text-center">
        <h3 class="text-4xl font-bold mb-6">Ready to Get Started?</h3>
        <p class="text-xl text-gray-100 mb-8 max-w-2xl mx-auto">Join creators worldwide in designing professional frames</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <button id="createFrameBtn" class="btn-primary px-8 py-4 rounded-2xl text-lg font-semibold">🎨 Create Your First Frame</button>
          <button id="browseTemplatesBtn" class="glass-morphism px-8 py-4 rounded-2xl text-lg font-medium hover:bg-white hover:bg-opacity-20 transition-all duration-300">📋 Browse Templates</button>
        </div>
      </div>
    </section>
  </div>

  <!-- Admin/Creator Page -->
  <div id="adminPage" class="page-transition min-h-screen pt-24 hidden">
    <div class="container mx-auto px-6 py-12">
      <div class="text-center mb-12">
        <h2 class="text-5xl font-bold mb-4 bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">Frame Creator Studio</h2>
        <p class="text-xl text-gray-400 max-w-3xl mx-auto">Design professional frame templates with precise controls and custom effects.</p>
      </div>
      <div class="glass-dark rounded-3xl p-8 mb-8">
        <div class="grid lg:grid-cols-2 gap-12">
          <div class="space-y-8">
            <div class="glass-morphism rounded-2xl p-6">
              <h3 class="text-2xl font-bold mb-6 flex items-center">
                <span class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center mr-3">📸</span>
                Frame Template
              </h3>
              <div class="border-2 border-dashed border-gray-600 rounded-2xl p-8 text-center hover:border-primary transition-all duration-300 hover:bg-primary hover:bg-opacity-5">
                <input type="file" id="frameUpload" accept="image/*" class="hidden">
                <button onclick="document.getElementById('frameUpload').click()" class="w-full group">
                  <div class="text-6xl mb-4 group-hover:scale-110 transition-transform duration-300">🖼️</div>
                  <h4 class="text-xl font-semibold mb-2 group-hover:text-primary transition-colors">Upload Frame Image</h4>
                  <p class="text-gray-400">PNG, JPG, or GIF up to 10MB</p>
                  <p class="text-sm text-primary mt-2">Click to browse files</p>
                </button>
              </div>
            </div>
            <div id="selectionControls" class="glass-morphism rounded-2xl p-6 hidden">
              <h3 class="text-2xl font-bold mb-6 flex items-center">
                <span class="w-8 h-8 bg-accent rounded-lg flex items-center justify-center mr-3">⚙️</span>
                Selection Area Controls
              </h3>
              <div class="grid grid-cols-2 gap-6 mb-6">
                <div class="space-y-3">
                  <label class="block text-sm font-medium text-gray-300">X Position</label>
                  <input type="range" id="xSlider" min="0" max="100" value="20" class="w-full h-2 bg-gray-700 rounded-lg appearance-none cursor-pointer slider">
                  <div class="flex justify-between text-xs text-gray-500">
                    <span>0%</span>
                    <span id="xValue" class="font-semibold text-primary">20%</span>
                    <span>100%</span>
                  </div>
                </div>
                <div class="space-y-3">
                  <label class="block text-sm font-medium text-gray-300">Y Position</label>
                  <input type="range" id="ySlider" min="0" max="100" value="20" class="w-full h-2 bg-gray-700 rounded-lg appearance-none cursor-pointer slider">
                  <div class="flex justify-between text-xs text-gray-500">
                    <span>0%</span>
                    <span id="yValue" class="font-semibold text-primary">20%</span>
                    <span>100%</span>
                  </div>
                </div>
                <div class="space-y-3">
                  <label class="block text-sm font-medium text-gray-300">Width</label>
                  <input type="range" id="widthSlider" min="10" max="80" value="40" class="w-full h-2 bg-gray-700 rounded-lg appearance-none cursor-pointer slider">
                  <div class="flex justify-between text-xs text-gray-500">
                    <span>10%</span>
                    <span id="widthValue" class="font-semibold text-primary">40%</span>
                    <span>80%</span>
                  </div>
                </div>
                <div class="space-y-3">
                  <label class="block text-sm font-medium text-gray-300">Height</label>
                  <input type="range" id="heightSlider" min="10" max="80" value="40" class="w-full h-2 bg-gray-700 rounded-lg appearance-none cursor-pointer slider">
                  <div class="flex justify-between text-xs text-gray-500">
                    <span>10%</span>
                    <span id="heightValue" class="font-semibold text-primary">40%</span>
                    <span>80%</span>
                  </div>
                </div>
                <div class="space-y-3">
                  <label class="block text-sm font-medium text-gray-300">Border Radius</label>
                  <input type="range" id="borderRadiusSlider" min="0" max="50" value="0" class="w-full h-2 bg-gray-700 rounded-lg appearance-none cursor-pointer slider">
                  <div class="flex justify-between text-xs text-gray-500">
                    <span>0px</span>
                    <span id="borderRadiusValue" class="font-semibold text-primary">0px</span>
                    <span>50px</span>
                  </div>
                </div>
              </div>
              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium text-gray-300 mb-2">Template Name</label>
                  <input type="text" id="templateName" placeholder="Enter a descriptive name..." class="w-full bg-gray-800 border border-gray-600 rounded-xl px-4 py-3 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-all duration-300">
                </div>
                <button id="saveTemplate" class="w-full btn-primary py-4 rounded-xl text-lg font-semibold animate-glow">💾 Save Template & Generate Link</button>
              </div>
            </div>
          </div>
          <div class="space-y-6">
            <div class="glass-morphism rounded-2xl p-6">
              <h3 class="text-2xl font-bold mb-6 flex items-center">
                <span class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mr-3">👁️</span>
                Live Preview
              </h3>
              <div id="framePreview" class="relative bg-gradient-to-br from-gray-800 to-gray-900 border-2 border-gray-600 rounded-2xl min-h-[500px] flex items-center justify-center overflow-hidden">
                <div class="text-center text-gray-500">
                  <div class="text-6xl mb-4">🖼️</div>
                  <p class="text-lg font-medium">Upload a frame to see preview</p>
                  <p class="text-sm mt-2">Your selection area will appear here</p>
                </div>
              </div>
            </div>
            <div id="shareableLinkSection" class="glass-morphism rounded-2xl p-6 hidden">
              <h3 class="text-xl font-bold mb-4 flex items-center text-green-400">
                <span class="w-6 h-6 bg-green-500 rounded-lg flex items-center justify-center mr-2">✅</span>
                Template Saved Successfully!
              </h3>
              <div class="bg-gray-800 rounded-xl p-4 mb-4">
                <label class="block text-sm font-medium text-gray-400 mb-2">Shareable Link:</label>
                <div class="flex items-center space-x-3">
                  <input type="text" id="shareableLink" readonly class="flex-1 bg-gray-900 border border-gray-600 rounded-lg px-3 py-2 text-sm font-mono">
                  <button id="copyLinkBtn" class="bg-primary hover:bg-primary-600 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-300">📋 Copy</button>
                </div>
              </div>
              <p class="text-sm text-gray-400">Share this link with users to apply their images to your frame template.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="glass-dark rounded-3xl p-8">
        <div class="flex justify-between items-center mb-8">
          <h3 class="text-3xl font-bold flex items-center">
            <span class="w-10 h-10 bg-purple-gradient-start rounded-xl flex items-center justify-center mr-4">📚</span>
            Your Templates
          </h3>
          <button id="refreshTemplates" class="glass-morphism px-6 py-3 rounded-xl hover:bg-white hover:bg-opacity-10 transition-all duration-300 flex items-center space-x-2">
            <span>🔄</span><span>Refresh</span>
          </button>
        </div>
        <div id="templatesList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
      </div>
    </div>
  </div>

  <!-- User Page -->
  <div id="userPage" class="page-transition min-h-screen pt-24 hidden">
    <div class="container mx-auto px-6 py-12">
      <div class="text-center mb-12">
        <h2 class="text-5xl font-bold mb-4 bg-gradient-to-r from-accent to-primary bg-clip-text text-transparent">Create Your Framed Image</h2>
        <p class="text-xl text-gray-400 max-w-3xl mx-auto mb-8">Upload your image to fit perfectly into the selected frame template.</p>
        <button id="createOwnFrameBtn" class="btn-primary px-6 py-3 rounded-xl font-semibold flex items-center space-x-2 mx-auto">
          <span>🎨</span><span>Create Your Own Frame Template</span>
        </button>
      </div>
      <div class="glass-dark rounded-3xl p-8">
        <div class="grid lg:grid-cols-2 gap-12">
          <div class="space-y-8">
            <div class="glass-morphism rounded-2xl p-6">
              <h3 class="text-2xl font-bold mb-6 flex items-center">
                <span class="w-8 h-8 bg-accent rounded-lg flex items-center justify-center mr-3">📤</span>
                Upload Your Image
              </h3>
              <div class="border-2 border-dashed border-gray-600 rounded-2xl p-8 text-center hover:border-accent transition-all duration-300 hover:bg-accent hover:bg-opacity-5">
                <input type="file" id="userImageUpload" accept="image/*" class="hidden">
                <button onclick="document.getElementById('userImageUpload').click()" class="w-full group">
                  <div class="text-6xl mb-4 group-hover:scale-110 transition-transform duration-300">🖼️</div>
                  <h4 class="text-xl font-semibold mb-2 group-hover:text-accent transition-colors">Select Your Image</h4>
                  <p class="text-gray-400">Will be automatically fitted to the frame</p>
                  <p class="text-sm text-accent mt-2">Click to browse files</p>
                </button>
              </div>
            </div>
            <div id="userControls" class="glass-morphism rounded-2xl p-6 hidden">
              <h3 class="text-xl font-bold mb-6 flex items-center text-green-400">
                <span class="w-6 h-6 bg-green-500 rounded-lg flex items-center justify-center mr-2">✅</span>
                Image Ready!
              </h3>
              <button id="downloadResult" class="w-full bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 py-4 rounded-xl text-lg font-semibold transition-all duration-300 flex items-center justify-center space-x-2 animate-glow">
                <span>📥</span><span>Download Framed Image</span>
              </button>
              <p class="text-sm text-gray-400 mt-3 text-center">High-quality PNG format ready for use</p>
            </div>
          </div>
          <div class="space-y-6">
            <div class="glass-morphism rounded-2xl p-6">
              <h3 class="text-2xl font-bold mb-6 flex items-center">
                <span class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-3">🎯</span>
                Result Preview
              </h3>
              <div id="resultPreview" class="relative bg-gradient-to-br from-gray-800 to-gray-900 border-2 border-gray-600 rounded-2xl min-h-[500px] flex items-center justify-center overflow-hidden">
                <div class="text-center text-gray-500">
                  <div class="text-6xl mb-4">🎨</div>
                  <p class="text-lg font-medium">Template will appear here</p>
                  <p class="text-sm mt-2">Upload your image to see the magic</p>
                </div>
              </div>
            </div>
            <div id="templateInfo" class="glass-morphism rounded-2xl p-6 hidden">
              <h4 class="text-lg font-bold mb-3 flex items-center">
                <span class="w-6 h-6 bg-blue-500 rounded-lg flex items-center justify-center mr-2">ℹ️</span>
                Template Information
              </h4>
              <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                  <span class="text-gray-400">Template Name:</span>
                  <span id="templateNameDisplay" class="font-medium">-</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-400">Created:</span>
                  <span id="templateDateDisplay" class="font-medium">-</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-400">Selection Area:</span>
                  <span id="selectionAreaDisplay" class="font-medium">-</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gradient-to-r from-dark-secondary to-dark border-t border-gray-800 mt-20">
    <div class="container mx-auto px-6 py-12">
      <div class="grid md:grid-cols-3 gap-8">
        <div>
          <div class="flex items-center space-x-3 mb-4">
            <svg width="40" height="40" viewBox="0 0 100 100">
              <rect width="100" height="100" rx="20" fill="#3b82f6"/>
              <rect x="20" y="20" width="60" height="60" rx="10" fill="#06b6d4"/>
              <text x="50" y="65" font-family="Inter, sans-serif" font-size="40" fill="#ffffff" text-anchor="middle" font-weight="bold">A</text>
            </svg>
            <span class="text-xl font-bold">Abrar Future Tech's</span>
          </div>
          <p class="text-gray-400 mb-4">Professional frame editor for creators worldwide.</p>
          <div class="flex space-x-4">
            <a href="mailto:support@abrarfuturetech.com" class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center cursor-pointer hover:bg-primary transition-colors">📧</a>
            <a href="https://twitter.com/abrarfuturetech" class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center cursor-pointer hover:bg-primary transition-colors">🐦</a>
            <a href="tel:+1234567890" class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center cursor-pointer hover:bg-primary transition-colors">📱</a>
          </div>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Features</h4>
          <ul class="space-y-2 text-gray-400">
            <li class="hover:text-white transition-colors cursor-pointer">🎨 Precision Editor</li>
            <li class="hover:text-white transition-colors cursor-pointer">🔗 Instant Sharing</li>
            <li class="hover:text-white transition-colors cursor-pointer">⚡ Smart Compression</li>
            <li class="hover:text-white transition-colors cursor-pointer">📱 Mobile Responsive</li>
            <li class="hover:text-white transition-colors cursor-pointer">☁️ Cloud Storage</li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Support (Coming Soon)</h4>
          <ul class="space-y-2 text-gray-400">
            <li class="hover:text-white transition-colors cursor-pointer">📚 Documentation</li>
            <li class="hover:text-white transition-colors cursor-pointer">💬 Live Chat</li>
            <li class="hover:text-white transition-colors cursor-pointer">📧 Email Support</li>
            <li class="hover:text-white transition-colors cursor-pointer">🎓 Tutorials</li>
            <li class="hover:text-white transition-colors cursor-pointer">❓ FAQ</li>
          </ul>
        </div>
      </div>
      <div class="border-t border-gray-800 pt-8 mt-8 text-center">
        <p class="text-gray-400">© 2025 Abrar Future Tech's. All rights reserved. Made with ❤️ for creators worldwide.</p>
      </div>
    </div>
  </footer>

  <script>
    // Global variables
    let currentFrameImage = null;
    let currentSelectionArea = { x: 20, y: 20, width: 40, height: 40, borderRadius: 0 };
    let currentMode = 'home';
    let currentTemplateId = null;
    let isResizing = false;
    let resizeHandle = null;
    let isSelecting = false;
    let selectionStart = { x: 0, y: 0 };
    const API_BASE = 'api.php';

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
      initializeApp();
      setupEventListeners();
      setupPageTransitions();
      const urlParams = new URLSearchParams(window.location.search);
      const frameId = urlParams.get('frameId');
      if (frameId) {
        showPage('user');
        loadTemplateForUser(frameId);
      }
    });

    function initializeApp() {
      animateElements();
    }

    function animateElements() {
      const featureCards = document.querySelectorAll('.feature-card');
      featureCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animate-slide-up');
      });
    }

    function setupEventListeners() {
      document.getElementById('homeBtn').addEventListener('click', () => showPage('home'));
      document.getElementById('adminBtn').addEventListener('click', () => showPage('admin'));
      document.getElementById('userBtn').addEventListener('click', () => showPage('user'));
      document.getElementById('getStartedBtn').addEventListener('click', () => showPage('admin'));
      document.getElementById('createFrameBtn').addEventListener('click', () => showPage('admin'));
      document.getElementById('learnMoreBtn').addEventListener('click', scrollToFeatures);
      document.getElementById('createOwnFrameBtn').addEventListener('click', () => showPage('admin'));
      document.getElementById('frameUpload').addEventListener('change', handleFrameUpload);
      document.getElementById('userImageUpload').addEventListener('change', handleUserImageUpload);
      setupSelectionControls();
      document.getElementById('saveTemplate').addEventListener('click', saveTemplate);
      document.getElementById('refreshTemplates').addEventListener('click', loadSavedTemplates);
      document.getElementById('downloadResult').addEventListener('click', downloadResult);
      document.getElementById('copyLinkBtn').addEventListener('click', copyShareableLink);
    }

    function setupPageTransitions() {
      ['homePage', 'adminPage', 'userPage'].forEach(pageId => {
        const page = document.getElementById(pageId);
        page.classList.add('page-transition');
      });
    }

    function showPage(pageName) {
      const pages = {
        'home': document.getElementById('homePage'),
        'admin': document.getElementById('adminPage'),
        'user': document.getElementById('userPage')
      };
      Object.values(pages).forEach(page => {
        page.classList.add('hidden');
        page.classList.remove('slide-in-active');
      });
      setTimeout(() => {
        if (pages[pageName]) {
          pages[pageName].classList.remove('hidden');
          pages[pageName].classList.add('slide-in-active');
          currentMode = pageName;
          if (pageName === 'admin') {
            setTimeout(() => loadSavedTemplates(), 300);
          }
          if (pageName !== 'user') {
            const url = new URL(window.location);
            url.searchParams.delete('frameId');
            window.history.replaceState({}, '', url);
          }
        }
      }, 150);
    }

    function scrollToFeatures() {
      const featuresSection = document.querySelector('section:nth-of-type(2)');
      featuresSection.scrollIntoView({ behavior: 'smooth' });
    }

    function setupSelectionControls() {
      ['x', 'y', 'width', 'height', 'borderRadius'].forEach(slider => {
        const element = document.getElementById(`${slider}Slider`);
        const valueSpan = document.getElementById(`${slider}Value`);
        element.addEventListener('input', function() {
          const value = this.value;
          valueSpan.textContent = (slider === 'borderRadius' ? value + 'px' : value + '%');
          currentSelectionArea[slider] = parseFloat(value);
          updateSelectionArea();
        });
      });
    }

    async function handleFrameUpload(event) {
      const file = event.target.files[0];
      if (!file) return;
      showLoading(true);
      try {
        const compressedDataUrl = await compressImage(file);
        currentFrameImage = compressedDataUrl;
        const framePreview = document.getElementById('framePreview');
        framePreview.innerHTML = `
          <img src="${compressedDataUrl}" alt="Frame" class="max-w-full max-h-full object-contain rounded-xl">
        `;
        document.getElementById('selectionControls').classList.remove('hidden');
        setupMouseSelection();
        updateSelectionArea();
        showMessage('Frame uploaded successfully! 🎉', 'success');
      } catch (error) {
        showMessage('Error uploading frame: ' + error.message, 'error');
      } finally {
        showLoading(false);
      }
    }

    async function handleUserImageUpload(event) {
      const file = event.target.files[0];
      if (!file) return;
      if (!currentTemplateId) {
        showMessage('Please load a template first 📋', 'error');
        return;
      }
      if (!currentFrameImage || !currentSelectionArea) {
        showMessage('Template data is not properly loaded.', 'error');
        return;
      }
      showLoading(true);
      try {
        const compressedDataUrl = await compressImage(file, 1200, 0.8);
        await createCompositeImage(compressedDataUrl);
        document.getElementById('userControls').classList.remove('hidden');
        showMessage('Image uploaded and processed successfully! ✨', 'success');
      } catch (error) {
        console.error('Error processing user image:', error);
        showMessage('Error processing image: ' + error.message, 'error');
      } finally {
        showLoading(false);
      }
    }

    async function compressImage(file, maxWidth = 1200, quality = 0.8) {
      return new Promise((resolve, reject) => {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        const img = new Image();
        img.onload = function() {
          const ratio = Math.min(maxWidth / img.width, maxWidth / img.height);
          canvas.width = img.width * ratio;
          canvas.height = img.height * ratio;
          ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
          resolve(canvas.toDataURL('image/jpeg', quality));
        };
        img.onerror = () => reject(new Error('Failed to load image'));
        img.src = URL.createObjectURL(file);
      });
    }

    function setupMouseSelection() {
      const framePreview = document.getElementById('framePreview');
      const img = framePreview.querySelector('img');
      if (!img) return;

      framePreview.addEventListener('mousedown', function(e) {
        if (e.target.classList.contains('resize-handle')) return;
        isSelecting = true;
        const imgRect = img.getBoundingClientRect();
        selectionStart.x = (e.clientX - imgRect.left) / imgRect.width * 100;
        selectionStart.y = (e.clientY - imgRect.top) / imgRect.height * 100;
        currentSelectionArea.x = selectionStart.x;
        currentSelectionArea.y = selectionStart.y;
        currentSelectionArea.width = 0;
        currentSelectionArea.height = 0;
        updateSelectionArea();
        updateSlidersFromArea();
        e.preventDefault();
      });

      framePreview.addEventListener('mousemove', function(e) {
        if (isSelecting) {
          const imgRect = img.getBoundingClientRect();
          const currentX = (e.clientX - imgRect.left) / imgRect.width * 100;
          const currentY = (e.clientY - imgRect.top) / imgRect.height * 100;
          
          currentSelectionArea.x = Math.min(selectionStart.x, currentX);
          currentSelectionArea.y = Math.min(selectionStart.y, currentY);
          currentSelectionArea.width = Math.abs(currentX - selectionStart.x);
          currentSelectionArea.height = Math.abs(currentY - selectionStart.y);
          
          currentSelectionArea.x = Math.max(0, Math.min(80, currentSelectionArea.x));
          currentSelectionArea.y = Math.max(0, Math.min(80, currentSelectionArea.y));
          currentSelectionArea.width = Math.max(10, Math.min(80, currentSelectionArea.width));
          currentSelectionArea.height = Math.max(10, Math.min(80, currentSelectionArea.height));
          
          updateSelectionArea();
          updateSlidersFromArea();
        }
      });

      framePreview.addEventListener('mouseup', function() {
        isSelecting = false;
      });

      // Resize functionality
      framePreview.querySelectorAll('.resize-handle').forEach(handle => {
        handle.addEventListener('mousedown', function(e) {
          isResizing = true;
          resizeHandle = handle.classList[1];
          e.stopPropagation();
          e.preventDefault();
        });
      });

      document.addEventListener('mousemove', function(e) {
        if (isResizing) {
          const imgRect = img.getBoundingClientRect();
          const mouseX = (e.clientX - imgRect.left) / imgRect.width * 100;
          const mouseY = (e.clientY - imgRect.top) / imgRect.height * 100;

          let newX = currentSelectionArea.x;
          let newY = currentSelectionArea.y;
          let newWidth = currentSelectionArea.width;
          let newHeight = currentSelectionArea.height;

          switch(resizeHandle) {
            case 'se':
              newWidth = Math.max(10, Math.min(80, mouseX - currentSelectionArea.x));
              newHeight = Math.max(10, Math.min(80, mouseY - currentSelectionArea.y));
              break;
            case 'sw':
              newX = Math.max(0, Math.min(mouseX, currentSelectionArea.x + currentSelectionArea.width - 10));
              newWidth = Math.max(10, currentSelectionArea.x + currentSelectionArea.width - newX);
              newHeight = Math.max(10, Math.min(80, mouseY - currentSelectionArea.y));
              break;
            case 'ne':
              newY = Math.max(0, Math.min(mouseY, currentSelectionArea.y + currentSelectionArea.height - 10));
              newWidth = Math.max(10, Math.min(80, mouseX - currentSelectionArea.x));
              newHeight = Math.max(10, currentSelectionArea.y + currentSelectionArea.height - newY);
              break;
            case 'nw':
              newX = Math.max(0, Math.min(mouseX, currentSelectionArea.x + currentSelectionArea.width - 10));
              newY = Math.max(0, Math.min(mouseY, currentSelectionArea.y + currentSelectionArea.height - 10));
              newWidth = Math.max(10, currentSelectionArea.x + currentSelectionArea.width - newX);
              newHeight = Math.max(10, currentSelectionArea.y + currentSelectionArea.height - newY);
              break;
          }

          currentSelectionArea.x = newX;
          currentSelectionArea.y = newY;
          currentSelectionArea.width = newWidth;
          currentSelectionArea.height = newHeight;
          
          updateSlidersFromArea();
          updateSelectionArea();
        }
      });

      document.addEventListener('mouseup', function() {
        isResizing = false;
        resizeHandle = null;
        isSelecting = false;
      });
    }

    function updateSelectionArea() {
      if (!currentFrameImage) return;
      const framePreview = document.getElementById('framePreview');
      const img = framePreview.querySelector('img');
      if (!img) return;

      const existingSelection = framePreview.querySelector('.selection-area');
      if (existingSelection) existingSelection.remove();

      const selectionDiv = document.createElement('div');
      selectionDiv.className = 'selection-area';
      
      const imgLeft = img.offsetLeft;
      const imgTop = img.offsetTop;
      const imgWidth = img.offsetWidth;
      const imgHeight = img.offsetHeight;

      const left = imgLeft + (currentSelectionArea.x / 100) * imgWidth;
      const top = imgTop + (currentSelectionArea.y / 100) * imgHeight;
      const width = (currentSelectionArea.width / 100) * imgWidth;
      const height = (currentSelectionArea.height / 100) * imgHeight;

      selectionDiv.style.left = left + 'px';
      selectionDiv.style.top = top + 'px';
      selectionDiv.style.width = width + 'px';
      selectionDiv.style.height = height + 'px';
      selectionDiv.style.borderRadius = currentSelectionArea.borderRadius + 'px';

      const handles = ['nw', 'ne', 'sw', 'se'];
      handles.forEach(handle => {
        const handleDiv = document.createElement('div');
        handleDiv.className = `resize-handle ${handle}`;
        selectionDiv.appendChild(handleDiv);
      });

      framePreview.appendChild(selectionDiv);
    }

    function updateSlidersFromArea() {
      ['x', 'y', 'width', 'height', 'borderRadius'].forEach(slider => {
        document.getElementById(`${slider}Slider`).value = currentSelectionArea[slider];
        document.getElementById(`${slider}Value`).textContent = (slider === 'borderRadius' ? Math.round(currentSelectionArea[slider]) + 'px' : Math.round(currentSelectionArea[slider]) + '%');
      });
    }

    async function saveTemplate() {
      if (!currentFrameImage) {
        showMessage('Please upload a frame image first 📸', 'error');
        return;
      }
      const templateName = document.getElementById('templateName').value.trim();
      if (!templateName) {
        showMessage('Please enter a template name ✏️', 'error');
        return;
      }
      showLoading(true);
      try {
        const templateData = {
          name: templateName,
          frameImage: currentFrameImage,
          selectionArea: currentSelectionArea
        };
        const response = await fetch(API_BASE, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'saveTemplate', data: templateData })
        });
        const result = await response.json();
        if (result.success) {
          showMessage('Template saved successfully! 🎉', 'success');
          document.getElementById('templateName').value = '';
          const shareableUrl = `${window.location.origin}${window.location.pathname}?frameId=${result.templateId}`;
          document.getElementById('shareableLink').value = shareableUrl;
          document.getElementById('shareableLinkSection').classList.remove('hidden');
          await loadSavedTemplates();
        } else {
          throw new Error(result.message || 'Failed to save template');
        }
      } catch (error) {
        showMessage('Error saving template: ' + error.message, 'error');
      } finally {
        showLoading(false);
      }
    }

    function copyShareableLink() {
      const linkInput = document.getElementById('shareableLink');
      linkInput.select();
      document.execCommand('copy');
      showMessage('Link copied to clipboard! 📋', 'success');
    }

    async function loadSavedTemplates() {
      showLoading(true);
      try {
        const response = await fetch(API_BASE, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'getTemplates' })
        });
        const result = await response.json();
        if (result.success) {
          displayTemplates(result.templates);
        } else {
          throw new Error(result.message || 'Failed to load templates');
        }
      } catch (error) {
        showMessage('Error loading templates: ' + error.message, 'error');
        document.getElementById('templatesList').innerHTML = `
          <div class="col-span-full text-center py-12">
            <div class="text-6xl mb-4">😕</div>
            <p class="text-gray-500 text-lg">Failed to load templates</p>
          </div>
        `;
      } finally {
        showLoading(false);
      }
    }

    function displayTemplates(templates) {
      const templatesList = document.getElementById('templatesList');
      if (!templates || templates.length === 0) {
        templatesList.innerHTML = `
          <div class="col-span-full text-center py-12">
            <div class="text-6xl mb-4">📝</div>
            <p class="text-gray-500 text-lg">No templates found</p>
            <p class="text-gray-600 text-sm mt-2">Create your first template to get started!</p>
          </div>
        `;
        return;
      }
      templatesList.innerHTML = templates.map(template => `
        <div class="feature-card glass-morphism rounded-2xl p-6 hover:bg-white hover:bg-opacity-10 transition-all duration-300">
          <div class="aspect-video mb-4 bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl overflow-hidden">
            <img src="${template.frame_image}" alt="${template.name}" class="w-full h-full object-contain" style="border-radius: ${JSON.parse(template.selection_area).borderRadius}px">
          </div>
          <h5 class="font-bold text-lg mb-2 text-white">${template.name}</h5>
          <p class="text-sm text-gray-400 mb-4">📅 ${new Date(template.created_at).toLocaleDateString()}</p>
          <div class="grid grid-cols-2 gap-2">
            <button disabled onclick="loadTemplate(${template.id})" class="bg-primary hover:bg-blue-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-300 flex items-center justify-center space-x-1">
              <span>📝</span><span>Edit</span>
            </button>
            <button onclick="copyShareLink(${template.id})" class="bg-accent hover:bg-cyan-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-300 flex items-center justify-center space-x-1">
              <span>🔗</span><span>Share</span>
            </button>
            <button onclick="previewTemplate(${template.id})" class="bg-purple-600 hover:bg-purple-700 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-300 flex items-center justify-center space-x-1">
              <span>👁️</span><span>Preview</span>
            </button>
            <button disabled onclick="deleteTemplate(${template.id})" class="bg-red-600 hover:bg-red-700 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-300 flex items-center justify-center space-x-1">
              <span>🗑️</span><span>Delete</span>
            </button>
          </div>
        </div>
      `).join('');
    }

    async function loadTemplate(templateId) {
      showLoading(true);
      try {
        const response = await fetch(API_BASE, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'getTemplate', templateId: templateId })
        });
        const result = await response.json();
        if (result.success) {
          const template = result.template;
          currentFrameImage = template.frame_image;
          currentSelectionArea = JSON.parse(template.selection_area);
          const framePreview = document.getElementById('framePreview');
          framePreview.innerHTML = `
            <img src="${currentFrameImage}" alt="Frame" class="max-w-full max-h-full object-contain rounded-xl">
          `;
          updateSlidersFromArea();
          document.getElementById('selectionControls').classList.remove('hidden');
          setupMouseSelection();
          updateSelectionArea();
          document.getElementById('templateName').value = template.name;
          showMessage('Template loaded successfully! 📁', 'success');
        } else {
          throw new Error(result.message || 'Failed to load template');
        }
      } catch (error) {
        showMessage('Error loading template: ' + error.message, 'error');
      } finally {
        showLoading(false);
      }
    }

    function copyShareLink(templateId) {
      const shareableUrl = `${window.location.origin}${window.location.pathname}?frameId=${templateId}`;
      if (navigator.clipboard) {
        navigator.clipboard.writeText(shareableUrl).then(() => {
          showMessage('Shareable link copied! 🔗', 'success');
        }).catch(() => {
          showMessage('Failed to copy. Link: ' + shareableUrl, 'info');
        });
      } else {
        showMessage('Link: ' + shareableUrl, 'info');
      }
    }

    function previewTemplate(templateId) {
      const shareableUrl = `${window.location.origin}${window.location.pathname}?frameId=${templateId}`;
      window.open(shareableUrl, '_blank');
    }

    async function loadTemplateForUser(templateId) {
      showLoading(true);
      try {
        const response = await fetch(API_BASE, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'getTemplate', templateId: templateId })
        });
        const result = await response.json();
        if (result.success) {
          const template = result.template;
          currentFrameImage = template.frame_image;
          currentSelectionArea = JSON.parse(template.selection_area);
          currentTemplateId = templateId;
          const resultPreview = document.getElementById('resultPreview');
          resultPreview.innerHTML = `
            <img src="${currentFrameImage}" alt="Frame Template" class="max-w-full max-h-full object-contain rounded-xl" style="border-radius: ${currentSelectionArea.borderRadius}px">
          `;
          document.getElementById('templateInfo').classList.remove('hidden');
          document.getElementById('templateNameDisplay').textContent = template.name;
          document.getElementById('templateDateDisplay').textContent = new Date(template.created_at).toLocaleDateString();
          document.getElementById('selectionAreaDisplay').textContent = `${Math.round(currentSelectionArea.width)}×${Math.round(currentSelectionArea.height)}%`;
          showMessage(`Template "${template.name}" loaded! 🎯`, 'success');
        } else {
          throw new Error(result.message || 'Template not found');
        }
      } catch (error) {
        showMessage('Error loading template: ' + error.message, 'error');
      } finally {
        showLoading(false);
      }
    }

    async function createCompositeImage(userImageDataUrl) {
      if (!currentFrameImage || !userImageDataUrl || !currentSelectionArea) return;
      return new Promise((resolve, reject) => {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        const frameImg = new Image();
        const userImg = new Image();
        let imagesLoaded = 0;
        
        function onImageLoad() {
          imagesLoaded++;
          if (imagesLoaded === 2) {
            try {
              canvas.width = frameImg.width;
              canvas.height = frameImg.height;
              ctx.clearRect(0, 0, canvas.width, canvas.height);
              ctx.drawImage(frameImg, 0, 0, frameImg.width, frameImg.height);
              
              const selectionX = (currentSelectionArea.x / 100) * frameImg.width;
              const selectionY = (currentSelectionArea.y / 100) * frameImg.height;
              const selectionWidth = (currentSelectionArea.width / 100) * frameImg.width;
              const selectionHeight = (currentSelectionArea.height / 100) * frameImg.height;
              
              // Fill method: scale image to completely fill selection area
              const scaleX = selectionWidth / userImg.width;
              const scaleY = selectionHeight / userImg.height;
              const scale = Math.max(scaleX, scaleY); // Use max to fill area
              const scaledWidth = userImg.width * scale;
              const scaledHeight = userImg.height * scale;
              
              const drawX = selectionX - (scaledWidth - selectionWidth) / 2;
              const drawY = selectionY - (scaledHeight - selectionHeight) / 2;
              
              ctx.save();
              ctx.beginPath();
              ctx.moveTo(selectionX + currentSelectionArea.borderRadius, selectionY);
              ctx.lineTo(selectionX + selectionWidth - currentSelectionArea.borderRadius, selectionY);
              ctx.quadraticCurveTo(selectionX + selectionWidth, selectionY, selectionX + selectionWidth, selectionY + currentSelectionArea.borderRadius);
              ctx.lineTo(selectionX + selectionWidth, selectionY + selectionHeight - currentSelectionArea.borderRadius);
              ctx.quadraticCurveTo(selectionX + selectionWidth, selectionY + selectionHeight, selectionX + selectionWidth - currentSelectionArea.borderRadius, selectionY + selectionHeight);
              ctx.lineTo(selectionX + currentSelectionArea.borderRadius, selectionY + selectionHeight);
              ctx.quadraticCurveTo(selectionX, selectionY + selectionHeight, selectionX, selectionY + selectionHeight - currentSelectionArea.borderRadius);
              ctx.lineTo(selectionX, selectionY + currentSelectionArea.borderRadius);
              ctx.quadraticCurveTo(selectionX, selectionY, selectionX + currentSelectionArea.borderRadius, selectionY);
              ctx.closePath();
              ctx.clip();
              
              ctx.drawImage(userImg, drawX, drawY, scaledWidth, scaledHeight);
              ctx.restore();
              
              const compositeDataUrl = canvas.toDataURL('image/png', 0.9);
              const resultPreview = document.getElementById('resultPreview');
              resultPreview.innerHTML = `
                <img src="${compositeDataUrl}" alt="Result" class="max-w-full max-h-full object-contain rounded-xl" style="border-radius: ${currentSelectionArea.borderRadius}px">
              `;
              resolve(compositeDataUrl);
            } catch (error) {
              reject(error);
            }
          }
        }
        
        frameImg.onload = onImageLoad;
        userImg.onload = onImageLoad;
        frameImg.onerror = () => reject(new Error('Failed to load frame image'));
        userImg.onerror = () => reject(new Error('Failed to load user image'));
        frameImg.crossOrigin = 'anonymous';
        userImg.crossOrigin = 'anonymous';
        frameImg.src = currentFrameImage;
        userImg.src = userImageDataUrl;
      });
    }

    function downloadResult() {
      const resultPreview = document.getElementById('resultPreview');
      const img = resultPreview.querySelector('img');
      if (!img || !img.src) {
        showMessage('No result to download 📥', 'error');
        return;
      }
      try {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        const downloadImg = new Image();
        downloadImg.onload = function() {
          canvas.width = downloadImg.width;
          canvas.height = downloadImg.height;
          ctx.drawImage(downloadImg, 0, 0);
          canvas.toBlob(function(blob) {
            const link = document.createElement('a');
            const templateName = document.getElementById('templateNameDisplay').textContent || 'framed-image';
            const fileName = `${templateName.replace(/\s+/g, '-').toLowerCase()}-${Date.now()}.png`;
            link.download = fileName;
            link.href = URL.createObjectURL(blob);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(link.href);
            showMessage('Download started! 📥✨', 'success');
          }, 'image/png', 0.9);
        };
        downloadImg.onerror = function() {
          const link = document.createElement('a');
          const templateName = document.getElementById('templateNameDisplay').textContent || 'framed-image';
          link.download = `${templateName.replace(/\s+/g, '-').toLowerCase()}.png`;
          link.href = img.src;
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
          showMessage('Download started! 📥✨', 'success');
        };
        downloadImg.src = img.src;
      } catch (error) {
        showMessage('Error downloading image: ' + error.message, 'error');
      }
    }

    async function deleteTemplate(templateId) {
      if (!confirm('Are you sure you want to delete this template?')) return;
      showLoading(true);
      try {
        const response = await fetch(API_BASE, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'deleteTemplate', templateId: templateId })
        });
        const result = await response.json();
        if (result.success) {
          showMessage('Template deleted successfully! 🗑️', 'success');
          await loadSavedTemplates();
        } else {
          throw new Error(result.message || 'Failed to delete template');
        }
      } catch (error) {
        showMessage('Error deleting template: ' + error.message, 'error');
      } finally {
        showLoading(false);
      }
    }

    function showMessage(message, type = 'info') {
      const messageContainer = document.getElementById('messageContainer');
      const messageDiv = document.createElement('div');
      const colors = {
        'success': 'from-green-500 to-emerald-500',
        'error': 'from-red-500 to-pink-500',
        'info': 'from-blue-500 to-cyan-500',
        'warning': 'from-yellow-500 to-orange-500'
      };
      const icons = {
        'success': '✅',
        'error': '❌',
        'info': 'ℹ️',
        'warning': '⚠️'
      };
      messageDiv.className = `bg-gradient-to-r ${colors[type] || colors.info} text-white px-6 py-4 rounded-2xl shadow-2xl transform transition-all duration-500 translate-x-full opacity-0 glass-morphism`;
      messageDiv.innerHTML = `
        <div class="flex items-center space-x-3">
          <span class="text-xl">${icons[type] || icons.info}</span>
          <span class="font-medium">${message}</span>
        </div>
      `;
      messageContainer.appendChild(messageDiv);
      setTimeout(() => {
        messageDiv.classList.remove('translate-x-full', 'opacity-0');
        messageDiv.classList.add('translate-x-0', 'opacity-100');
      }, 100);
      setTimeout(() => {
        messageDiv.classList.add('translate-x-full', 'opacity-0');
        setTimeout(() => {
          if (messageContainer.contains(messageDiv)) {
            messageContainer.removeChild(messageDiv);
          }
        }, 500);
      }, 5000);
    }

    function showLoading(show) {
      const loadingIndicator = document.getElementById('loadingIndicator');
      if (show) {
        loadingIndicator.classList.remove('hidden');
        loadingIndicator.classList.add('flex');
      } else {
        loadingIndicator.classList.add('hidden');
        loadingIndicator.classList.remove('flex');
      }
    }

    // Custom slider styling
    const style = document.createElement('style');
    style.textContent = `
      .slider::-webkit-slider-thumb {
        appearance: none;
        height: 20px;
        width: 20px;
        border-radius: 50%;
        background: linear-gradient(135deg, #3b82f6, #06b6d4);
        cursor: pointer;
        border: 2px solid white;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        transition: all 0.2s ease;
      }
      .slider::-webkit-slider-thumb:hover {
        transform: scale(1.2);
        box-shadow: 0 6px 12px rgba(59, 130, 246, 0.4);
      }
      .slider::-moz-range-thumb {
        height: 20px;
        width: 20px;
        border-radius: 50%;
        background: linear-gradient(135deg, #3b82f6, #06b6d4);
        cursor: pointer;
        border: 2px solid white;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
      }
      .slider::-webkit-slider-track {
        height: 8px;
        border-radius: 4px;
        background: linear-gradient(90deg, #374151, #4b5563);
      }
      .slider::-moz-range-track {
        height: 8px;
        border-radius: 4px;
        background: linear-gradient(90deg, #374151, #4b5563);
      }
    `;
    document.head.appendChild(style);

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
      if (e.ctrlKey || e.metaKey) {
        switch(e.key) {
          case 's':
            e.preventDefault();
            if (currentMode === 'admin' && currentFrameImage) saveTemplate();
            break;
          case 'd':
            e.preventDefault();
            if (currentMode === 'user') downloadResult();
            break;
        }
      }
      if (e.key === 'Escape') showPage('home');
    });

    // Debug tools
    window.debugFrameEditor = function() {
      console.log('Current state:', {
        hasFrameImage: !!currentFrameImage,
        hasSelectionArea: !!currentSelectionArea,
        currentTemplateId,
        selectionArea: currentSelectionArea,
        frameImageLength: currentFrameImage ? currentFrameImage.length : 0
      });
      if (currentFrameImage) {
        console.log('Frame image preview:', currentFrameImage.substring(0, 100) + '...');
      }
    };

    // Intersection observer for animations
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('animate-fade-in');
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    document.querySelectorAll('.feature-card').forEach(card => observer.observe(card));
  </script>
</body>
</html>