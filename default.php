<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-LFBJ872LJ4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-LFBJ872LJ4');
  </script>
  <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TCWTHLTF');</script>
  <!-- End Google Tag Manager -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SQUEEZE</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="styles/index.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TCWTHLTF"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <!-- Error Popup Modal -->
  <div id="errorModal" class="error-modal">
    <div class="error-modal-content">
      <div class="error-modal-header">
        <h3><i class="fas fa-exclamation-triangle"></i> Attention</h3>
        <button class="error-modal-close" onclick="closeErrorModal()">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="error-modal-body">
        <div id="errorMessage"></div>
      </div>
              <div class="error-modal-footer" id="errorModalFooter">
          <button class="btn btn-danger" onclick="closeErrorModal()">Cancel</button>
          <button class="btn btn-success" onclick="proceedWithValidFiles()">Continue</button>
        </div>
    </div>
  </div>

  <div class="app-container">
    <div class="app-title">
      <h1><i class="fas fa-images"></i> SQUEEZE</h1>
      <p id="dragNotice" style="display: none">
        Drag the center bar to compare
      </p>
    </div>

    <div class="zoom-controls" id="zoomControls" style="display: none">
      <button class="zoom-btn" id="zoomIn">
        <i class="fas fa-search-plus"></i>
      </button>
      <button class="zoom-btn" id="zoomOut">
        <i class="fas fa-search-minus"></i>
      </button>
      <button class="zoom-btn" id="resetZoom">
        <i class="fas fa-expand"></i>
      </button>
    </div>

    <div class="canvas-container">
      <canvas id="comparisonCanvas" style="display: none;"></canvas>
      <div class="comparison-slider" id="comparisonSlider" style="display: none"></div>

      <div class="upload-section" id="dropZone">
        <h2><i class="fas fa-cloud-upload-alt"></i> Upload Image</h2>
        <div class="upload-icon"><i class="fas fa-images"></i></div>
        <p>Drag & drop your image here or</p>
        <input type="file" id="fileInput" class="file-input" accept="image/jpeg,image/jpg,image/png,image/webp,image/bmp" multiple />
        <button class="browse-btn" id="browseBtn">
          <i class="fas fa-folder-open"></i> Browse Files
        </button>
        <p>Supports JPG, PNG, WebP, BMP (Static images only)</p>
        <p class="upload-hint">You can select multiple images</p>
      </div>
    </div>

    <!-- Multiple Image Gallery Section -->
    <div class="image-gallery" id="imageGallery" style="display: none;">
      <div class="gallery-header">
        <h3><i class="fas fa-images"></i> Uploaded Images</h3>
        <button class="clear-all-btn" id="clearAllBtn">
          <i class="fas fa-trash"></i> Clear All
        </button>
      </div>
      <div class="gallery-scroll-container">
        <div class="gallery-grid" id="galleryGrid">
          <!-- Images will be added here dynamically -->
        </div>
      </div>
    </div>

    <div class="control-panel hidden" id="controlPanel">
      <div class="panel-section">
        <div class="setting-group">
          <label><i class="fas fa-image"></i> Format</label>
          <div class="format-controls">
            <select id="formatSelect">
              <!-- Options will be populated dynamically -->
            </select>
            <button class="btn btn-secondary" id="applyToAllBtn" style="display: none; background: #4cc9f0;" title="Apply this format to all images">
              Apply All
            </button>
          </div>
        </div>

        <div class="setting-group quality-group">
          <label for="qualitySlider"><i class="fas fa-bullseye"></i> Quality:
            <span id="qualityValue">60</span>%</label>
          <div class="slider-container">
            <input type="range" id="qualitySlider" min="40" max="100" value="60" />
            <div class="value-display" id="qualityDisplay">60%</div>
          </div>
        </div>
      </div>

      <div class="panel-section">
        <div class="stats">
          <div class="stat-item stat-item1">
            <div class="stat-label">
              <i class="fas fa-image"></i> Original
            </div>
            <div class="stat-value-large" id="originalSize">0 KB</div>
          </div>
          <div class="stat-item stat-item2">
            <div class="stat-label">
              <i class="fas fa-compress-alt"></i> Optimized
            </div>
            <div class="stat-value-large" id="optimizedSize">0 KB</div>
          </div>
        </div>
      </div>

      <div class="panel-section">
        <div class="actions">
          <button class="btn download-btn" id="downloadBtn" disabled>
            <i class="fas fa-download"></i> <span id="downloadBtnText">Download</span>
          </button>
        </div>
      </div>
    </div>

    <div class="info-box">
      <i class="fas fa-info-circle"></i> All processing happens locally in
      your browser. <br /> All rights reserved &copy;
      <?php echo date("Y"); ?> SQUEEZE by
      <a href="https://asresoft.com" target="_blank" style="color: inherit; text-decoration: none">Asresoft</a>.
    </div>
  </div>

  <script>
    // DOM Elements
    const canvas = document.getElementById("comparisonCanvas");
    const ctx = canvas.getContext("2d");
    const fileInput = document.getElementById("fileInput");
    const browseBtn = document.getElementById("browseBtn");
    const dropZone = document.getElementById("dropZone");
    const comparisonSlider = document.getElementById("comparisonSlider");
    const dragNotice = document.getElementById("dragNotice");
    const zoomControls = document.getElementById("zoomControls");
    const formatSelect = document.getElementById("formatSelect");
    const qualitySlider = document.getElementById("qualitySlider");
    const qualityValue = document.getElementById("qualityValue");
    const qualityDisplay = document.getElementById("qualityDisplay");
    const downloadBtn = document.getElementById("downloadBtn");
    const originalSize = document.getElementById("originalSize");
    const optimizedSize = document.getElementById("optimizedSize");
    const savings = document.getElementById("savings");
    const formatInfo = document.getElementById("formatInfo");
    const controlPanel = document.getElementById("controlPanel");
    const zoomInBtn = document.getElementById("zoomIn");
    const zoomOutBtn = document.getElementById("zoomOut");
    const resetZoomBtn = document.getElementById("resetZoom");
    const imageGallery = document.getElementById("imageGallery");
    const galleryGrid = document.getElementById("galleryGrid");
    const clearAllBtn = document.getElementById("clearAllBtn");
    const downloadBtnText = document.getElementById("downloadBtnText");
    const applyToAllBtn = document.getElementById("applyToAllBtn");

          // Configuration constants
      const MAX_FILE_SIZE = 50 * 1024 * 1024; // 50MB limit
      const MAX_FILES = 20; // Maximum 20 files at once

    // State variables
    let originalImage = new Image();
    let optimizedImage = new Image();
    let originalFile = null;
    let originalFormat = null;
    let optimizedDataUrl = null;
    let isDraggingSlider = false;
    let sliderPosition = 0.5; // 0 to 1
    let scale = 1;
    let offsetX = 0;
    let offsetY = 0;
    let startX, startY;
    let isPanning = false;
    let canvasWidth, canvasHeight;
    let isImageLoaded = false;
    let uploadedImages = []; // Array to store uploaded images
    let selectedImageIndex = 0; // Index of currently selected image
    let individualSettings = []; // Array to store individual settings for each image
    let updateGalleryTimeout = null; // For debounced gallery updates
    let hasIndividualFormats = false; // Track if individual formats have been set

    // Format file size to KB or MB only (no bytes)
    function formatFileSize(bytes) {
      if (bytes < 1024) {
        return "0 KB";
      } else if (bytes < 1024 * 1024) {
        return (bytes / 1024).toFixed(1) + " KB";
      } else {
        return (bytes / (1024 * 1024)).toFixed(2) + " MB";
      }
    }

    // Initialize canvas
    function resizeCanvas() {
      canvasWidth = canvas.parentElement.clientWidth;
      canvasHeight = canvas.parentElement.clientHeight;
      canvas.width = canvasWidth;
      canvas.height = canvasHeight;

      if (isImageLoaded) {
        drawImages();
      }
    }

    // Draw images on canvas with comparison
    function drawImages() {
      if (!originalImage.complete || !optimizedImage.complete) return;

      ctx.clearRect(0, 0, canvas.width, canvas.height);

      // Calculate dimensions to maintain aspect ratio
      const imgRatio = originalImage.width / originalImage.height;
      const canvasRatio = canvasWidth / canvasHeight;
      let drawWidth, drawHeight;

      if (imgRatio > canvasRatio) {
        drawWidth = canvasWidth * scale;
        drawHeight = drawWidth / imgRatio;
      } else {
        drawHeight = canvasHeight * scale;
        drawWidth = drawHeight * imgRatio;
      }

      // Calculate center position
      const centerX = (canvasWidth - drawWidth) / 2;
      const centerY = (canvasHeight - drawHeight) / 2;

      // Apply panning offset
      const drawX = offsetX + centerX;
      const drawY = offsetY + centerY;

      // Draw original image (left side)
      ctx.save();
      ctx.beginPath();
      ctx.rect(0, 0, canvasWidth * sliderPosition, canvasHeight);
      ctx.clip();
      ctx.drawImage(originalImage, drawX, drawY, drawWidth, drawHeight);
      ctx.restore();

      // Draw optimized image (right side)
      ctx.save();
      ctx.beginPath();
      ctx.rect(
        canvasWidth * sliderPosition,
        0,
        canvasWidth * (1 - sliderPosition),
        canvasHeight
      );
      ctx.clip();
      ctx.drawImage(optimizedImage, drawX, drawY, drawWidth, drawHeight);
      ctx.restore();

      // Position slider
      const separatorX = canvasWidth * sliderPosition;
      comparisonSlider.style.left = `${separatorX}px`;
      canvas.style.display = "block";
      comparisonSlider.style.display = "block";
      zoomControls.style.display = "flex";
      dragNotice.style.display = "block";
    }

    // Update quality display
    function updateQualityDisplay() {
      const value = qualitySlider.value;
      qualityValue.textContent = value;
      qualityDisplay.textContent = `${value}%`;
    }

    // Update format dropdown with individual settings
    function updateFormatDropdown(originalFormat, selectedFormat) {
      formatSelect.innerHTML = '';

      // Add original format option
      const originalFormatName = getFormatName(originalFormat);
      const originalOption = document.createElement('option');
      originalOption.value = originalFormat;
      originalOption.textContent = `${originalFormatName} (Original)`;
      formatSelect.appendChild(originalOption);

      // Add all supported formats (except the original one)
      const formats = [
        { value: 'image/jpeg', name: 'JPEG' },
        { value: 'image/png', name: 'PNG' },
        { value: 'image/webp', name: 'WebP' },
        { value: 'image/bmp', name: 'BMP' }
      ];

      formats.forEach(format => {
        if (format.value !== originalFormat) {
          const option = document.createElement('option');
          option.value = format.value;
          option.textContent = format.name;
          formatSelect.appendChild(option);
        }
      });

      // Set the selected format
      formatSelect.value = selectedFormat;
      
      // If the selected format is not in the dropdown, add it
      if (!formatSelect.value && selectedFormat) {
        const selectedFormatName = getFormatName(selectedFormat);
        const selectedOption = document.createElement('option');
        selectedOption.value = selectedFormat;
        selectedOption.textContent = selectedFormatName;
        formatSelect.appendChild(selectedOption);
        formatSelect.value = selectedFormat;
      }
      
      // Ensure the selected format is always visible
      if (selectedFormat && !formatSelect.value) {
        console.warn('Format not found in dropdown:', selectedFormat);
        // Fallback: set to original format if selected format is not available
        formatSelect.value = originalFormat;
      }
    }

    // Update format info
    function updateFormatInfo() {
      // Check if formatSelect has options and formatInfo exists
      if (!formatSelect || formatSelect.options.length === 0 || !formatInfo) {
        return;
      }
      
      const selectedOption = formatSelect.options[formatSelect.selectedIndex];
      if (!selectedOption) {
        return;
      }
      
      const formatName = selectedOption.text.split(' ')[0];

      if (formatName === "JPEG") {
        formatInfo.textContent =
          "JPEG is best for photographs with good compression";
      } else if (formatName === "PNG") {
        formatInfo.textContent =
          "PNG is best for graphics with transparency support";
      } else if (formatName === "WebP") {
        formatInfo.textContent =
          "WebP provides superior compression with minimal quality loss";
      } else if (formatName === "BMP") {
        formatInfo.textContent =
          "BMP is uncompressed format, consider converting for smaller files";
      } else {
        formatInfo.textContent =
          "Original format preserved for best compatibility";
      }
    }

    // Get format extension
    function getFormatExtension(format) {
      if (format === "image/jpeg") return "jpg";
      if (format === "image/png") return "png";
      if (format === "image/webp") return "webp";
      if (format === "image/bmp") return "bmp";
      return "jpg";
    }

    // Format name mapping
    function getFormatName(format) {
      const map = {
        'image/jpeg': 'JPEG',
        'image/png': 'PNG',
        'image/webp': 'WebP',
        'image/bmp': 'BMP'
      };
      return map[format] || format;
    }

    function getOptimalQuality(file, format) {
      const qualityMap = {
        'image/jpeg': 60,  // Aggressive compression for JPEG
        'image/png': 70,   // Moderate compression for PNG
        'image/webp': 65,  // Excellent compression for WebP
        'image/bmp': 85    // Minimal compression for BMP
      };
      
      return qualityMap[format] || 70; // Default to 70% for unknown formats
    }

    // Optimize image - FIXED COMPRESSION
    function optimizeImage() {
      if (!originalFile) return;

      // Use individual settings for the selected image
      const settings = individualSettings[selectedImageIndex] || { quality: 85, format: originalFile.type };
      const useFormat = settings.format;
      const quality = settings.quality / 100;

      // Create off-screen canvas
      const tempCanvas = document.createElement("canvas");
      const tempCtx = tempCanvas.getContext("2d");

      // Calculate new dimensions (reduce size for compression)
      const maxDimension = 2000; // Max width/height
      let newWidth = originalImage.width;
      let newHeight = originalImage.height;

      // Resize only if image is too large
      if (newWidth > maxDimension || newHeight > maxDimension) {
        const ratio = Math.min(
          maxDimension / newWidth,
          maxDimension / newHeight
        );
        newWidth = Math.floor(newWidth * ratio);
        newHeight = Math.floor(newHeight * ratio);
      }

      tempCanvas.width = newWidth;
      tempCanvas.height = newHeight;

      // Draw image with new dimensions
      tempCtx.drawImage(originalImage, 0, 0, newWidth, newHeight);

      // Apply optimization with quality setting
      optimizedDataUrl = tempCanvas.toDataURL(useFormat, quality);

      // Load optimized image
      optimizedImage.onload = function () {
        isImageLoaded = true;
        drawImages();

        // Calculate stats
        const originalSizeBytes = originalFile.size;
        const base64String = optimizedDataUrl.split(",")[1];
        const optimizedSizeBytes = Math.floor((base64String.length * 3) / 4);

        // Check if optimization actually reduced size
        if (optimizedSizeBytes > originalSizeBytes) {
          // If optimization increased size, use original image
          optimizedImage.src = URL.createObjectURL(originalFile);
          optimizedDataUrl = URL.createObjectURL(originalFile);
          
          // Update stats to show no optimization
          originalSize.textContent = formatFileSize(originalSizeBytes);
          optimizedSize.textContent = formatFileSize(originalSizeBytes);
          
          // Update individual settings to prevent future optimization attempts
          if (individualSettings[selectedImageIndex]) {
            individualSettings[selectedImageIndex].quality = 100;
          }
        } else {
          // Optimization was successful
        originalSize.textContent = formatFileSize(originalSizeBytes);
        optimizedSize.textContent = formatFileSize(optimizedSizeBytes);

        const savingsBytes = originalSizeBytes - optimizedSizeBytes;
        const reductionPercent = (
          (savingsBytes / originalSizeBytes) *
          100
        ).toFixed(1);
        }

        downloadBtn.disabled = false;

        // Update download button text based on number of images
        if (uploadedImages.length === 1) {
          downloadBtnText.textContent = "Download";
        } else {
          downloadBtnText.textContent = `Download ZIP (${uploadedImages.length} images)`;
        }

        // Show control panel
        controlPanel.classList.remove("hidden");
      };

      optimizedImage.src = optimizedDataUrl;
    }

    // Handle file selection
    function handleFileSelect(e) {
      const files = Array.from(e.target.files);
      if (files.length > 0) {
        processMultipleFiles(files);
      }
    }

    // Show error modal
    function showErrorModal(message, hasValidFiles = true) {
      const errorModal = document.getElementById('errorModal');
      const errorMessage = document.getElementById('errorMessage');
      
              // Check if message contains file lists and format accordingly
        if (message.includes('Oversized files (max 50 MB each):') || message.includes('Unsupported files:') || message.includes('Valid files:') || message.includes('Excess files:') || message.includes('Too many files selected')) {
        // Format as HTML with icons
        let htmlMessage = '';
        const lines = message.split('\n');
        
        let currentSection = '';
        
                  for (let line of lines) {
            if (line.includes('Too many files selected')) {
              currentSection = 'info';
              htmlMessage += `<div class="error-section"><h4><i class="fas fa-info-circle text-info"></i> ${line}</h4>`;
            } else if (line.includes('Excess files:')) {
              currentSection = 'excess';
              htmlMessage += `<div class="error-section"><h4><i class="fas fa-minus-circle text-secondary"></i> ${line}</h4>`;
            } else if (line.includes('Oversized files (max 50 MB each):')) {
              currentSection = 'oversized';
              htmlMessage += `<div class="error-section"><h4><i class="fas fa-exclamation-triangle text-warning"></i> ${line}</h4>`;
            } else if (line.includes('Unsupported files:')) {
              currentSection = 'unsupported';
              htmlMessage += `<div class="error-section"><h4><i class="fas fa-times-circle text-danger"></i> ${line}</h4>`;
            } else if (line.includes('Valid files:')) {
              currentSection = 'valid';
              htmlMessage += `<div class="error-section"><h4><i class="fas fa-check-circle text-success"></i> ${line}</h4>`;
                        } else if (line.match(/^\d+\./)) {
              // File list item
              if (currentSection === 'oversized' || currentSection === 'unsupported' || currentSection === 'excess') {
                htmlMessage += `<div class="file-item invalid"><i class="fas fa-times text-danger"></i> ${line}</div>`;
              } else if (currentSection === 'valid') {
                htmlMessage += `<div class="file-item valid"><i class="fas fa-check text-success"></i> ${line}</div>`;
              } else {
                htmlMessage += `<div class="file-item">${line}</div>`;
              }
          } else if (line.trim() === '') {
            htmlMessage += '';
          } else {
            htmlMessage += `<p>${line}</p>`;
          }
        }
        
        errorMessage.innerHTML = htmlMessage;
      } else {
        // Regular text message
        errorMessage.textContent = message;
      }
      
      // Show appropriate buttons based on whether there are valid files
      const errorModalFooter = document.getElementById('errorModalFooter');
      if (hasValidFiles) {
        // Show Cancel and Continue buttons
        errorModalFooter.innerHTML = `
          <button class="btn btn-danger" onclick="closeErrorModal()">Cancel</button>
          <button class="btn btn-success" onclick="proceedWithValidFiles()">Continue</button>
        `;
      } else {
        // Show only Okay button
        errorModalFooter.innerHTML = `
          <button class="btn btn-danger" onclick="closeErrorModalAndReset()" style="max-width: fit-content;">Try Again</button>
        `;
      }
      
      errorModal.style.display = 'flex';
    }

    // Close error modal
    function closeErrorModal() {
      const errorModal = document.getElementById('errorModal');
      errorModal.style.display = 'none';
    }

    // Close error modal and reset to index page
    function closeErrorModalAndReset() {
      const errorModal = document.getElementById('errorModal');
      errorModal.style.display = 'none';
      
      // Reset application state
      uploadedImages = [];
      individualSettings = [];
      selectedImageIndex = 0;
      
      // Clear any pending files
      window.pendingValidFiles = null;
      window.pendingOversizedFiles = null;
      window.pendingUnsupportedFiles = null;
      
      // Reset UI to upload page
      resetState();
      
      // Hide gallery if visible
      const imageGallery = document.getElementById('imageGallery');
      if (imageGallery) {
        imageGallery.style.display = 'none';
      }
    }

    // Close modal when clicking outside
    document.addEventListener('click', function(event) {
      const errorModal = document.getElementById('errorModal');
      if (event.target === errorModal) {
        closeErrorModal();
      }
    });

    // Proceed with valid files only
    function proceedWithValidFiles() {
      
      if (window.pendingValidFiles && window.pendingValidFiles.length > 0) {
        closeErrorModal();
        
        // Clear existing images
        uploadedImages = [];
        individualSettings = [];
        hasIndividualFormats = false;
        updateGallery();
        
        // Process only the valid files
        const validFiles = window.pendingValidFiles;
        let processedCount = 0;
        
        function processNextImage() {
          if (processedCount >= validFiles.length) {
            // All images processed
            updateGallery();
            // Always select the first image when processing is complete
            if (uploadedImages.length > 0) {
              selectImage(0);
            }
            return;
          }

          const file = validFiles[processedCount];
          
          // Use FileReader for all files for better compatibility
          const reader = new FileReader();
          
          reader.onload = function(e) {
            const imageData = {
              file: file,
              dataUrl: e.target.result,
              name: file.name,
              size: file.size,
              type: file.type
            };
            
            uploadedImages.push(imageData);
            
            // Initialize individual settings for this image
            const imageIndex = uploadedImages.length - 1;
            const optimalQuality = getOptimalQuality(file, file.type);
            individualSettings[imageIndex] = {
              quality: optimalQuality,
              format: file.type,
              optimizedSize: null,
              reduction: 0
            };
            
            processedCount++;
            
            // If this is the first image, select it immediately
            if (processedCount === 1) {
              selectImage(0);
            }
            
            // Update progress for multiple images
            if (validFiles.length > 1) {
              downloadBtnText.textContent = `Processing ${processedCount}/${validFiles.length} images...`;
            }
            
            // Process next image immediately for better performance
            processNextImage();
          };
          
          reader.onerror = function() {
            console.error(`Failed to read file: ${file.name}`);
            processedCount++;
            processNextImage();
          };
          
          reader.readAsDataURL(file);
        }
        
        // Start processing
        processNextImage();
        
        // Clear the pending files
        window.pendingValidFiles = null;
        window.pendingOversizedFiles = null;
        window.pendingUnsupportedFiles = null;
      } else {
        console.error('No pending valid files found');
        showErrorModal('No valid files to process. Please try uploading again.');
      }
    }

          // Process multiple files
      function processMultipleFiles(files) {
        // Define supported formats
        const supportedFormats = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image/bmp'];
        
        // Separate files by type
        const supportedFiles = files.filter(file => supportedFormats.includes(file.type));
        const unsupportedFiles = files.filter(file => !supportedFormats.includes(file.type));
    
        // Further categorize supported files
        const oversizedFiles = supportedFiles.filter(file => file.size > MAX_FILE_SIZE);
        const validFiles = supportedFiles.filter(file => file.size <= MAX_FILE_SIZE);
      
        // Only return early if there are no files to process AND no errors to show
        if (validFiles.length === 0 && unsupportedFiles.length === 0 && oversizedFiles.length === 0) return;

        // Check for any errors (too many files, oversized, unsupported)
        let hasErrors = false;
        let errorMessage = '';
        let filesToProcess = validFiles;
        
        // Check file count limit
        if (supportedFiles.length > MAX_FILES) {
          hasErrors = true;
          const limitedValidFiles = validFiles.slice(0, MAX_FILES);
          const excessFiles = supportedFiles.slice(MAX_FILES);
          filesToProcess = limitedValidFiles;
          
          errorMessage += `Too many files selected (max ${MAX_FILES}).\n\n`;
          
          if (excessFiles.length > 0) {
            const excessFilesList = excessFiles.map((name, index) => `${index + 1}. ${name.name}`).join('\n');
            errorMessage += `Excess files (will be ignored):\n${excessFilesList}\n\n`;
          }
        }
        
        // Check for oversized files
        if (oversizedFiles.length > 0) {
          hasErrors = true;
          const oversizedFilesList = oversizedFiles.map((name, index) => `${index + 1}. ${name.name}`).join('\n');
          errorMessage += `Oversized files (max 50 MB each):\n${oversizedFilesList}\n\n`;
        }
        
        // Check for unsupported files
        if (unsupportedFiles.length > 0) {
          hasErrors = true;
          const unsupportedFilesList = unsupportedFiles.map((name, index) => `${index + 1}. ${name.name} (${name.type})`).join('\n');
          errorMessage += `Unsupported files:\n${unsupportedFilesList}\n\n`;
        }
        
        // If there are any errors, show unified error modal
        if (hasErrors) {
          // Add valid files list
          if (filesToProcess.length > 0) {
            const validFilesList = filesToProcess.map((name, index) => 
              `${index + 1}. ${name.name} (${formatFileSize(name.size)})`
            ).join('\n');
            errorMessage += `Valid files:\n${validFilesList}\n\n`;
          }
          
          // Store the files for later processing
          window.pendingValidFiles = filesToProcess;
          window.pendingOversizedFiles = oversizedFiles;
          window.pendingUnsupportedFiles = unsupportedFiles;
          
          // Show error modal with appropriate buttons based on whether there are valid files
          showErrorModal(errorMessage, filesToProcess.length > 0);
          return;
        }

      // Show loading state
      if (validFiles.length > 1) {
        downloadBtnText.textContent = `Processing ${validFiles.length} images...`;
      }

      // Reset individual formats flag for new batch
      hasIndividualFormats = false;
      
      // Process images sequentially to avoid blocking
      let processedCount = 0;
      
      function processNextImage() {
        if (processedCount >= validFiles.length) {
          // All images processed
          updateGallery();
          // Always select the first image when processing is complete
          if (uploadedImages.length > 0) {
            selectImage(0);
          }
          return;
        }

        const file = validFiles[processedCount];
        
        // For large files, use createObjectURL instead of FileReader for better performance
        if (file.size > 10 * 1024 * 1024) { // 10MB threshold
          const objectUrl = URL.createObjectURL(file);
          const img = new Image();
          
                      // Add timeout for large files
            const loadTimeout = setTimeout(() => {
              console.error(`Timeout loading large image: ${file.name}`);
              URL.revokeObjectURL(objectUrl);
              processedCount++;
              processNextImage();
            }, 15000); // 15 second timeout for large files
          
          img.onload = function() {
            clearTimeout(loadTimeout);
            const imageData = {
              file: file,
              dataUrl: objectUrl, // Use object URL for large files
              name: file.name,
              size: file.size,
              type: file.type
            };
            
            uploadedImages.push(imageData);
            
            // Initialize individual settings for this image
            const imageIndex = uploadedImages.length - 1;
            const optimalQuality = getOptimalQuality(file, file.type);
            individualSettings[imageIndex] = {
              quality: optimalQuality,
              format: file.type,
              optimizedSize: null,
              reduction: 0
            };
            
            processedCount++;
            
            // If this is the first image, select it immediately
            if (processedCount === 1) {
              selectImage(0);
            }
            
            // Update progress for multiple images
            if (validFiles.length > 1) {
              downloadBtnText.textContent = `Processing ${processedCount}/${validFiles.length} images...`;
            }
            
            // Process next image immediately for better performance
            processNextImage();
          };
          
          img.onerror = function() {
            clearTimeout(loadTimeout);
            console.error(`Failed to load image: ${file.name}`);
            URL.revokeObjectURL(objectUrl);
            
            // Show user-friendly error for large files
            if (file.size > 50 * 1024 * 1024) { // 50MB threshold
              showErrorModal(`Failed to load large image: ${file.name}\n\nThis file may be too large for your browser to handle. Try:\n• Reducing the image size before uploading\n• Using a different browser\n• Breaking the file into smaller parts`);
            }
            
                          processedCount++;
              processNextImage();
          };
          
          img.src = objectUrl;
        } else {
          // Use FileReader for smaller files
          const reader = new FileReader();
          
          reader.onload = function(e) {
            const imageData = {
              file: file,
              dataUrl: e.target.result,
              name: file.name,
              size: file.size,
              type: file.type
            };
            
            uploadedImages.push(imageData);
            
            // Initialize individual settings for this image
            const imageIndex = uploadedImages.length - 1;
            const optimalQuality = getOptimalQuality(file, file.type);
            individualSettings[imageIndex] = {
              quality: optimalQuality,
              format: file.type,
              optimizedSize: null,
              reduction: 0
            };
            
            processedCount++;
            
            // If this is the first image, select it immediately
            if (processedCount === 1) {
              selectImage(0);
            }
            
            // Update progress for multiple images
            if (validFiles.length > 1) {
              downloadBtnText.textContent = `Processing ${processedCount}/${validFiles.length} images...`;
            }
            
            // Process next image immediately for better performance
            processNextImage();
          };
          
          reader.readAsDataURL(file);
        }
      }
      
      // Start processing
      processNextImage();
    }



    // Debounced gallery update for better performance
    function debouncedUpdateGallery() {
      if (updateGalleryTimeout) {
        clearTimeout(updateGalleryTimeout);
      }
      updateGalleryTimeout = setTimeout(updateGallery, 10);
    }

    // Memory cleanup function
    function cleanupMemory() {
      // Force garbage collection if available
      if (window.gc) {
        window.gc();
      }
      
      // Clear any unused object URLs
      const unusedUrls = [];
      uploadedImages.forEach((imageData, index) => {
        if (imageData.dataUrl && imageData.dataUrl.startsWith('blob:') && !document.querySelector(`img[src="${imageData.dataUrl}"]`)) {
          unusedUrls.push(imageData.dataUrl);
        }
      });
      
      unusedUrls.forEach(url => {
        URL.revokeObjectURL(url);
      });
    }

    // Update gallery display
    function updateGallery() {
      if (uploadedImages.length === 0) {
        imageGallery.style.display = "none";
        applyToAllBtn.style.display = "none";
        return;
      }

      imageGallery.style.display = "flex";
      
      // Show "Apply to All" button when there are multiple images
      if (uploadedImages.length > 1) {
        applyToAllBtn.style.display = "inline-flex";
        // Update button text based on whether individual formats are set
        if (hasIndividualFormats) {
          applyToAllBtn.innerHTML = 'Apply All';
          applyToAllBtn.title = "Override individual formats and apply this format to all images";
        } else {
          applyToAllBtn.innerHTML = 'Apply All';
          applyToAllBtn.title = "Apply this format to all images";
        }
      } else {
        applyToAllBtn.style.display = "none";
      }
      
      // Use DocumentFragment for better performance
      const fragment = document.createDocumentFragment();

      uploadedImages.forEach((imageData, index) => {
        const settings = individualSettings[index] || { quality: 85, format: imageData.type };
        const galleryItem = document.createElement("div");
        galleryItem.className = `gallery-item ${index === selectedImageIndex ? 'selected' : ''}`;
        galleryItem.innerHTML = `
          <div class="gallery-image">
            <img src="${imageData.dataUrl}" alt="${imageData.name}" loading="lazy" />
            <div class="gallery-overlay">
              <button class="download-individual-btn" onclick="downloadIndividualImage(${index})" title="Download this image">
                <i class="fas fa-download"></i>
              </button>
              <button class="remove-btn" onclick="removeImage(${index})" title="Remove this image">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="gallery-info">
            <div class="gallery-name">${imageData.name}</div>
            <div class="gallery-settings">
              <div class="quality-indicator">Q: ${settings.quality}%</div>
              <div class="format-indicator">${getFormatName(settings.format)}</div>
            </div>
          </div>
        `;
        
        // Add click event listener to the entire gallery item
        galleryItem.addEventListener('click', function(e) {
          // Don't trigger selection if clicking on remove button
          if (!e.target.closest('.remove-btn')) {
            selectImage(index);
          }
        });
        
        fragment.appendChild(galleryItem);
      });

      // Clear and update gallery in one operation
      galleryGrid.innerHTML = "";
      galleryGrid.appendChild(fragment);

      // Update download button text based on number of images
      if (uploadedImages.length === 1) {
        downloadBtnText.textContent = "Download";
      } else {
        downloadBtnText.textContent = `Download ZIP (${uploadedImages.length} images)`;
      }
    }

    // Select image for comparison
    function selectImage(index) {
      if (index >= 0 && index < uploadedImages.length) {
        selectedImageIndex = index;
        const selectedImageData = uploadedImages[index];
        
        // Load individual settings for this image
        const settings = individualSettings[index] || { quality: 85, format: selectedImageData.type };
        
        // Update UI with individual settings
        qualitySlider.value = settings.quality;
        qualityValue.textContent = settings.quality;
        qualityDisplay.textContent = `${settings.quality}%`;
        
        // Update format dropdown with individual settings
        updateFormatDropdown(selectedImageData.type, settings.format);
        
        processImageFile(selectedImageData.file);
        updateGallery();
      }
    }

    // Remove image from gallery
    function removeImage(index) {
      uploadedImages.splice(index, 1);
      individualSettings.splice(index, 1);
      
      if (uploadedImages.length === 0) {
        // No images left, reset everything and show upload page
        resetState();
        imageGallery.style.display = "none";
      } else {
        // Update selected index if necessary
        if (selectedImageIndex >= uploadedImages.length) {
          selectedImageIndex = uploadedImages.length - 1;
        }
        
        // Select the first image if current selection is invalid
        if (selectedImageIndex < 0) {
          selectedImageIndex = 0;
        }
        
        // Process the currently selected image
        selectImage(selectedImageIndex);
      }
    }

    // Clear all images
    function clearAllImages() {
      uploadedImages = [];
      individualSettings = [];
      hasIndividualFormats = false;
      resetState();
      imageGallery.style.display = "none";
    }

    // Apply same format to all images
    function applyFormatToAll() {
      if (uploadedImages.length === 0) return;

      const selectedFormat = formatSelect.value;
      
      // Update all individual settings with optimal quality for the selected format
      individualSettings.forEach((settings, index) => {
        settings.format = selectedFormat;
        // Set optimal quality for the new format
        const optimalQuality = getOptimalQuality(uploadedImages[index].file, selectedFormat);
        settings.quality = optimalQuality;
      });

      // Update current image's quality slider to reflect the new optimal quality
      if (selectedImageIndex >= 0 && selectedImageIndex < individualSettings.length) {
        const currentSettings = individualSettings[selectedImageIndex];
        qualitySlider.value = currentSettings.quality;
        qualityValue.textContent = currentSettings.quality;
        qualityDisplay.textContent = `${currentSettings.quality}%`;
      }

      // Reset individual formats flag since we're applying to all
      hasIndividualFormats = false;

      // Update gallery to reflect changes
      updateGallery();

      // Re-optimize the currently selected image to show updated stats
      if (originalFile) {
        setTimeout(() => optimizeImage(), 10);
      }

      // Show success feedback
      showApplyToAllFeedback();
    }

    // Show feedback for apply to all action
    function showApplyToAllFeedback() {
      const originalBackground = applyToAllBtn.style.background;
      
      applyToAllBtn.innerHTML = 'Applied!';
      applyToAllBtn.style.background = '#28a745';
      applyToAllBtn.disabled = true;

      setTimeout(() => {
        // Restore correct button text based on current state
        if (hasIndividualFormats) {
          applyToAllBtn.innerHTML = 'Apply All';
          applyToAllBtn.title = "Override individual formats and apply this format to all images";
        } else {
          applyToAllBtn.innerHTML = 'Apply All';
          applyToAllBtn.title = "Apply this format to all images";
        }
        applyToAllBtn.style.background = originalBackground;
        applyToAllBtn.disabled = false;
      }, 2000);
    }



    // Process image file
    function processImageFile(file) {
      // Don't reset state if we're just switching images
      if (!originalFile) {
        resetState();
      }

      originalFile = file;
      originalFormat = file.type;
      originalSize.textContent = formatFileSize(file.size);

      // Format dropdown is already populated

      const reader = new FileReader();
      reader.onload = function (e) {
        originalImage.onload = function () {
          showCanvasPage();
          // Reset zoom and pan
          scale = 1;
          offsetX = 0;
          offsetY = 0;
          optimizeImage();
        };
        originalImage.src = e.target.result;
      };
      reader.readAsDataURL(file);
    }

    // Show upload page state
    function showUploadPage() {
      dropZone.classList.remove("hidden");
      canvas.style.display = "none";
      comparisonSlider.style.display = "none";
      zoomControls.style.display = "none";
      dragNotice.style.display = "none";
      controlPanel.classList.add("hidden");
    }

    // Show canvas page state
    function showCanvasPage() {
      dropZone.classList.add("hidden");
      canvas.style.display = "block";
      comparisonSlider.style.display = "block";
      zoomControls.style.display = "flex";
      dragNotice.style.display = "block";
      // Don't show control panel here - it will be shown when optimization is complete
    }

    // Reset application state
    function resetState() {
      // Clear images
      originalImage = new Image();
      optimizedImage = new Image();

      // Reset UI elements
      if (originalSize) originalSize.textContent = "0 KB";
      if (optimizedSize) optimizedSize.textContent = "0 KB";
      if (downloadBtn) downloadBtn.disabled = true;

      // Reset internal state
      optimizedDataUrl = null;
      isImageLoaded = false;
      sliderPosition = 0.5;

      // Clear canvas
      if (ctx && canvas) {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      }

      // Reset slider position
      if (comparisonSlider) {
      comparisonSlider.style.left = "50%";
      }
      
      // Show upload page
      showUploadPage();
    }

    // Handle drag over
    function handleDragOver(e) {
      e.preventDefault();
      e.stopPropagation();
      dropZone.classList.add("drag-over");
    }

    // Handle drag leave
    function handleDragLeave(e) {
      e.preventDefault();
      e.stopPropagation();
      dropZone.classList.remove("drag-over");
    }

    // Handle drop
    function handleDrop(e) {
      e.preventDefault();
      e.stopPropagation();
      dropZone.classList.remove("drag-over");

      const files = Array.from(e.dataTransfer.files);
      if (files.length > 0) {
        processMultipleFiles(files);
      }
    }

    // Generate optimized image for a given file
    function generateOptimizedImage(file, useFormat, quality) {
      return new Promise((resolve, reject) => {
        const img = new Image();
        
        img.onload = function() {
          const tempCanvas = document.createElement("canvas");
          const tempCtx = tempCanvas.getContext("2d");

          // Use original dimensions - no size limitation
          const newWidth = img.width;
          const newHeight = img.height;

          tempCanvas.width = newWidth;
          tempCanvas.height = newHeight;
          
          // Use high quality rendering for better results
          tempCtx.imageSmoothingEnabled = true;
          tempCtx.imageSmoothingQuality = 'high';
          tempCtx.drawImage(img, 0, 0, newWidth, newHeight);

          // For large files, use toBlob directly instead of toDataURL for better performance
          if (file.size > 10 * 1024 * 1024) { // 10MB threshold
            tempCanvas.toBlob((blob) => {
              if (blob) {
                resolve({
                  blob: blob,
                  dataUrl: URL.createObjectURL(blob), // Use object URL for large files
                  name: file.name,
                  size: blob.size
                });
              } else {
                reject(new Error('Failed to generate optimized image'));
              }
            }, useFormat, quality);
          } else {
            // For smaller files, use toDataURL for compatibility
            const optimizedDataUrl = tempCanvas.toDataURL(useFormat, quality);
            tempCanvas.toBlob((blob) => {
              if (blob) {
                resolve({
                  blob: blob,
                  dataUrl: optimizedDataUrl,
                  name: file.name,
                  size: blob.size
                });
              } else {
                reject(new Error('Failed to generate optimized image'));
              }
            }, useFormat, quality);
          }
        };
        
        img.onerror = function() {
          reject(new Error('Failed to load image'));
        };
        
        // Use object URL for better performance with large files
        if (file.size > 5 * 1024 * 1024) { // 5MB threshold
          const objectUrl = URL.createObjectURL(file);
          
          // Add timeout for large files
          const loadTimeout = setTimeout(() => {
            URL.revokeObjectURL(objectUrl);
            reject(new Error('Timeout loading large image'));
          }, 30000); // 30 second timeout
          
          const originalOnload = img.onload;
          img.onload = function() {
            clearTimeout(loadTimeout);
            URL.revokeObjectURL(objectUrl); // Clean up
            if (originalOnload) originalOnload.call(this); // Call the original onload
          };
          
          img.onerror = function() {
            clearTimeout(loadTimeout);
            URL.revokeObjectURL(objectUrl);
            reject(new Error('Failed to load large image'));
          };
          
          img.src = objectUrl;
        } else {
          img.src = URL.createObjectURL(file);
        }
      });
    }

    // Download individual image
    async function downloadIndividualImage(index) {
      if (index < 0 || index >= uploadedImages.length) return;

      const imageData = uploadedImages[index];
      const settings = individualSettings[index] || { quality: 85, format: imageData.type };
      
      try {
        // Show loading state
        const downloadBtn = event.target.closest('.download-individual-btn');
        if (downloadBtn) {
          const originalHTML = downloadBtn.innerHTML;
          downloadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
          downloadBtn.disabled = true;
        }
        
        // Generate optimized image for this specific image
        const optimized = await generateOptimizedImage(imageData.file, settings.format, settings.quality / 100);
        
        // Get base name without extension
        let baseName = imageData.name;
        const lastDot = baseName.lastIndexOf(".");
        if (lastDot > 0) {
          baseName = baseName.substring(0, lastDot);
        }

        const fileName = `${baseName}-optimized.${getFormatExtension(settings.format)}`;
        
        // Create download link
        const link = document.createElement("a");
        link.href = URL.createObjectURL(optimized.blob);
        link.download = fileName;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
        // Clean up the object URL
        URL.revokeObjectURL(link.href);
        
        // Clean up data URL if it's an object URL
        if (optimized.dataUrl.startsWith('blob:')) {
          URL.revokeObjectURL(optimized.dataUrl);
        }
      } catch (error) {
        console.error("Error downloading individual image:", error);
        showErrorModal("Error downloading image. Please try again.");
      } finally {
        // Restore button state
        if (downloadBtn) {
          downloadBtn.innerHTML = '<i class="fas fa-download"></i>';
          downloadBtn.disabled = false;
        }
      }
    }

    // Download image(s)
    async function downloadImage() {
      if (uploadedImages.length === 0) return;

      const useFormat = formatSelect.value;
      const quality = parseInt(qualitySlider.value) / 100;
      const formatExt = getFormatExtension(useFormat);

      if (uploadedImages.length === 1) {
        // Single image download
        if (!optimizedDataUrl) return;

        // Use individual settings for single image
        const settings = individualSettings[0] || { quality: 85, format: originalFile.type };
        const singleFormatExt = getFormatExtension(settings.format);

      let baseName = originalFile.name;
      const lastDot = baseName.lastIndexOf(".");
      if (lastDot > 0) {
        baseName = baseName.substring(0, lastDot);
      }

      const link = document.createElement("a");
      link.href = optimizedDataUrl;
        link.download = `${baseName}-optimized.${singleFormatExt}`;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      } else {
        // Multiple images - create zip
        downloadBtn.disabled = true;
        downloadBtnText.textContent = "Creating ZIP...";

        try {
          // Check if JSZip is available
          if (typeof JSZip === 'undefined') {
            throw new Error('JSZip library not loaded');
          }
          
          const zip = new JSZip();
          const timestamp = new Date().toISOString().replace(/[:.]/g, '-').slice(0, -5);
          let zipName = `squeezed-${timestamp}`;
          
          let processedCount = 0;

          // Generate optimized images for all uploaded images with individual settings
          for (let i = 0; i < uploadedImages.length; i++) {
            // Update progress
            downloadBtnText.textContent = `Processing ${i + 1}/${uploadedImages.length}...`;
            
            const imageData = uploadedImages[i];
            const settings = individualSettings[i] || { quality: 85, format: imageData.type };
            
            try {
              const optimized = await generateOptimizedImage(imageData.file, settings.format, settings.quality / 100);
              
              // Get base name without extension
              let baseName = imageData.name;
              const lastDot = baseName.lastIndexOf(".");
              if (lastDot > 0) {
                baseName = baseName.substring(0, lastDot);
              }

              const fileName = `${baseName}-optimized.${getFormatExtension(settings.format)}`;
              
              zip.file(fileName, optimized.blob);
              processedCount++;
              
              // Clean up blob URL if it was created
              if (optimized.dataUrl && optimized.dataUrl.startsWith('blob:')) {
                URL.revokeObjectURL(optimized.dataUrl);
              }
            } catch (error) {
              console.error(`Error processing ${imageData.name}:`, error);
              // Continue with other files
            }
          }

          if (processedCount === 0) {
            throw new Error('No images were successfully processed');
          }
          
          // Generate and download zip
          downloadBtnText.textContent = "Generating ZIP...";
          const zipBlob = await zip.generateAsync({ type: "blob" });
          
          if (!zipBlob || zipBlob.size === 0) {
            throw new Error('Generated ZIP file is empty or invalid');
          }
          
          const link = document.createElement("a");
          link.href = URL.createObjectURL(zipBlob);
          link.download = `${zipName}.zip`;
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
          
          // Clean up zip blob URL
          URL.revokeObjectURL(link.href);

          // Update download button text
          downloadBtnText.textContent = `Download ZIP (${uploadedImages.length} images)`;
        } catch (error) {
          console.error("Error creating ZIP:", error);
          downloadBtnText.textContent = "Download";
          showErrorModal(`Error creating ZIP file: ${error.message}. Please try again.`);
        } finally {
          downloadBtn.disabled = false;
        }
      }
    }

    // Handle zoom
    function handleZoom(delta) {
      const zoomIntensity = 0.1;

      // Calculate new zoom
      scale += delta * zoomIntensity;

      // Constrain zoom
      scale = Math.min(Math.max(0.1, scale), 4);

      drawImages();
    }

    // Initialize event listeners
    function initEventListeners() {
      // File handling
      browseBtn.addEventListener("click", () => fileInput.click());
      fileInput.addEventListener("change", handleFileSelect);
      dropZone.addEventListener("dragover", handleDragOver);
      dropZone.addEventListener("dragleave", handleDragLeave);
      dropZone.addEventListener("drop", handleDrop);

      // Clear all button
      clearAllBtn.addEventListener("click", clearAllImages);

      // Apply to all button
      applyToAllBtn.addEventListener("click", applyFormatToAll);

      // Settings changes trigger auto-optimization and save individual settings
      qualitySlider.addEventListener("input", function () {
        updateQualityDisplay();
        
        // Save individual settings for current image
        if (selectedImageIndex >= 0 && selectedImageIndex < individualSettings.length) {
          individualSettings[selectedImageIndex].quality = parseInt(qualitySlider.value);
        }
        
        if (originalFile) {
          // Force re-optimization to update size display
          setTimeout(() => optimizeImage(), 10);
        }
      });

      formatSelect.addEventListener("change", function () {
        // Save individual settings for current image
        if (selectedImageIndex >= 0 && selectedImageIndex < individualSettings.length) {
          const newFormat = formatSelect.value;
          individualSettings[selectedImageIndex].format = newFormat;
          
          // Update quality to optimal setting for the new format
          const optimalQuality = getOptimalQuality(originalFile, newFormat);
          individualSettings[selectedImageIndex].quality = optimalQuality;
          
          // Update UI to reflect the new optimal quality
          qualitySlider.value = optimalQuality;
          qualityValue.textContent = optimalQuality;
          qualityDisplay.textContent = `${optimalQuality}%`;
          
          hasIndividualFormats = true; // Mark that individual formats have been set
          // Update gallery to reflect the format change
          debouncedUpdateGallery();
        }
        
        if (originalFile) {
          // Force re-optimization with new format and optimal quality
          setTimeout(() => optimizeImage(), 10);
        }
      });

      // Download button
      downloadBtn.addEventListener("click", downloadImage);

      // Slider dragging
      comparisonSlider.addEventListener("mousedown", function (e) {
        isDraggingSlider = true;
        document.body.style.cursor = "ew-resize";
        document.body.style.userSelect = "none";
      });

      document.addEventListener("mouseup", function () {
        isDraggingSlider = false;
        document.body.style.cursor = "";
        document.body.style.userSelect = "";
      });

      document.addEventListener("mousemove", function (e) {
        if (isDraggingSlider && originalFile) {
          const rect = canvas.getBoundingClientRect();
          const x = e.clientX - rect.left;
          sliderPosition = Math.max(0, Math.min(1, x / rect.width));
          drawImages();
        }
      });

      // Zoom controls
      zoomInBtn.addEventListener("click", () => handleZoom(1));
      zoomOutBtn.addEventListener("click", () => handleZoom(-1));
      resetZoomBtn.addEventListener("click", function () {
        scale = 1;
        offsetX = 0;
        offsetY = 0;
        drawImages();
      });

      // Mouse wheel zoom
      canvas.addEventListener("wheel", function (e) {
        e.preventDefault();
        const delta = e.deltaY < 0 ? 1 : -1;
        handleZoom(delta);
      });

      // Canvas panning
      canvas.addEventListener("mousedown", function (e) {
        if (e.button === 0) {
          // Left mouse button
          isPanning = true;
          startX = e.clientX - offsetX;
          startY = e.clientY - offsetY;
          canvas.style.cursor = "grabbing";
        }
      });

      document.addEventListener("mouseup", function () {
        isPanning = false;
        canvas.style.cursor = "default";
      });

      document.addEventListener("mousemove", function (e) {
        if (isPanning) {
          offsetX = e.clientX - startX;
          offsetY = e.clientY - startY;
          drawImages();
        }
      });
    }

    // Disable browser resize functionality
    function disableBrowserResize() {
      // Prevent window resize
      window.addEventListener('resize', function(e) {
        e.preventDefault();
        e.stopPropagation();
        return false;
      });
      
      // Prevent window resize via keyboard shortcuts
      document.addEventListener('keydown', function(e) {
        // Prevent Ctrl/Cmd + Plus/Minus for zoom
        if ((e.ctrlKey || e.metaKey) && (e.key === '+' || e.key === '-' || e.key === '=')) {
          e.preventDefault();
          return false;
        }
        
        // Prevent F11 (fullscreen toggle)
        if (e.key === 'F11') {
          e.preventDefault();
          return false;
        }
      });
      
      // Prevent context menu (right-click) resize options
      document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
        return false;
      });
      
      // Set fixed viewport
      const meta = document.createElement('meta');
      meta.name = 'viewport';
      meta.content = 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no';
      document.head.appendChild(meta);
      
      // Disable text selection to prevent accidental resizing
      document.body.style.userSelect = 'none';
      document.body.style.webkitUserSelect = 'none';
      document.body.style.mozUserSelect = 'none';
      document.body.style.msUserSelect = 'none';
    }

    // Initialize the app
    function init() {
      // Disable browser resize
      disableBrowserResize();
      
      resizeCanvas();
      initEventListeners();
      updateQualityDisplay();

      // Handle window resize
      window.addEventListener("resize", resizeCanvas);
      
      // Periodic memory cleanup for large files
      setInterval(cleanupMemory, 30000); // Clean up every 30 seconds
    }

    // Start the app
    init();
  </script>
</body>

</html>