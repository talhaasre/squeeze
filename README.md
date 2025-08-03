# SQUEEZE - Image Optimization Tool

A powerful, client-side image optimization tool that compresses and optimizes images directly in your browser. No server processing required - all optimization happens locally for maximum privacy and speed.

![SQUEEZE](https://img.shields.io/badge/SQUEEZE-Image%20Optimizer-blue?style=for-the-badge&logo=image)

## ✨ Features

- **🖼️ Single Image Optimization** - Upload and optimize individual images
- **🎯 Multiple Format Support** - JPEG, PNG, WebP, GIF, BMP
- **⚙️ Quality Control** - Adjustable quality settings (40-100%)
- **📊 Real-time Comparison** - Side-by-side before/after comparison with draggable slider
- **🔍 Zoom & Pan** - Interactive image viewing with zoom controls
- **📱 Responsive Design** - Works perfectly on desktop and mobile devices
- **🔒 Privacy First** - All processing happens locally in your browser
- **💾 Instant Download** - Download optimized images immediately
- **🎨 Modern UI** - Beautiful, intuitive interface with smooth animations

## 🚀 Quick Start

### Prerequisites

- A modern web browser (Chrome, Firefox, Safari, Edge)
- PHP server (for local development) or any web server

### Installation

1. **Clone or Download**
   ```bash
   git clone https://github.com/yourusername/squeeze.git
   cd squeeze
   ```

2. **Setup Web Server**
   
   **Option A: Using PHP Built-in Server**
   ```bash
   php -S localhost:8000
   ```
   
   **Option B: Using XAMPP/WAMP**
   - Place the files in your `htdocs` folder
   - Access via `http://localhost/squeeze`

3. **Open in Browser**
   ```
   http://localhost:8000
   ```

## 📖 How to Use

### Step 1: Upload Your Image
- **Drag & Drop**: Simply drag an image file onto the upload area
- **Browse Files**: Click the "Browse Files" button to select an image
- **Supported Formats**: JPG, PNG, WebP, GIF, BMP

### Step 2: Configure Optimization Settings
Once your image is uploaded, you'll see the control panel with these options:

#### Format Selection
- **Original Format**: Preserves the original file format
- **JPEG**: Best for photographs with good compression
- **PNG**: Best for graphics with transparency support
- **WebP**: Superior compression with minimal quality loss

#### Quality Adjustment
- **Slider Control**: Adjust quality from 40% to 100%
- **Real-time Preview**: See the impact on file size instantly
- **Recommended**: 85% for most images

### Step 3: Compare Results
- **Side-by-Side View**: See original vs optimized image
- **Draggable Slider**: Drag the center bar to compare different areas
- **Zoom Controls**: Use zoom in/out buttons or mouse wheel
- **Pan**: Click and drag to move around the image

### Step 4: Download Optimized Image
- **Download Button**: Click to save the optimized image
- **Automatic Naming**: Files are saved as `filename-optimized.ext`
- **Format Preserved**: Maintains your selected format

## 🎯 Advanced Features

### Image Comparison
- **Interactive Slider**: Drag the center bar to compare before/after
- **Zoom Controls**: 
  - 🔍 Zoom In: Enlarge the image
  - 🔍 Zoom Out: Reduce the image size
  - ⤢ Reset Zoom: Return to original size
- **Pan Navigation**: Click and drag to move around zoomed images

### Optimization Statistics
Real-time display of:
- **Original Size**: File size before optimization
- **Optimized Size**: File size after optimization
- **Reduction**: Percentage of size reduction
- **Savings**: Actual bytes saved

### Quality Settings
- **40-60%**: High compression, noticeable quality loss
- **60-80%**: Good balance of size and quality
- **80-90%**: Minimal quality loss, good compression
- **90-100%**: Near original quality, minimal compression

## 📱 Mobile Usage

SQUEEZE is fully responsive and works great on mobile devices:

- **Touch-Friendly**: All controls work with touch gestures
- **Adaptive Layout**: Interface adjusts to screen size
- **Optimized Performance**: Fast processing on mobile devices
- **Easy Upload**: Use your device's file picker

## 🔧 Technical Details

### Browser Compatibility
- ✅ Chrome 60+
- ✅ Firefox 55+
- ✅ Safari 12+
- ✅ Edge 79+

### File Size Limits
- **Recommended**: Up to 10MB per image
- **Maximum**: Limited by browser memory
- **Format Support**: All major image formats

### Performance
- **Processing**: Real-time optimization
- **Memory**: Efficient canvas-based processing
- **Speed**: Instant results for most images

## 🛠️ Development

### Project Structure
```
squeeze/
├── default.php          # Main application file
├── styles/
│   └── index.css        # Stylesheet
└── README.md           # This file
```

### Customization
- **Colors**: Modify CSS variables in `styles/index.css`
- **Features**: Extend functionality in `default.php`
- **Styling**: Customize the UI by editing CSS classes

### Contributing
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📄 License

MIT License

Copyright (c) 2024 SQUEEZE by Asresoft

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

## 🙏 Acknowledgments

- **Font Awesome** - Icons
- **Modern Web Standards** - Canvas API, File API
- **CSS Grid & Flexbox** - Responsive layout
- **Browser Vendors** - Image processing capabilities

## 📞 Support

- **Website**: [https://asresoft.com](https://asresoft.com)
- **Issues**: Report bugs via GitHub Issues
- **Feature Requests**: Suggest new features via GitHub Discussions

---

**Made with ❤️ by [Asresoft](https://asresoft.com)**

*Optimize your images, not your workflow.* 