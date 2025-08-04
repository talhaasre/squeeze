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
        <input type="file" id="fileInput" class="file-input" accept="image/*" multiple />
        <button class="browse-btn" id="browseBtn">
          <i class="fas fa-folder-open"></i> Browse Files
        </button>
        <p>Supports JPG, PNG, WebP, GIF, BMP</p>
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
      <div class="gallery-grid" id="galleryGrid">
        <!-- Images will be added here dynamically -->
      </div>
    </div>

    <div class="control-panel hidden" id="controlPanel">
      <div class="panel-section">
        <h3><i class="fas fa-cogs"></i> Settings</h3>

        <div class="setting-group">
          <label for="formatSelect"><i class="fas fa-file-image"></i> Format</label>
          <select id="formatSelect">
            <!-- Options will be populated dynamically -->
          </select>
          <div class="format-info" id="formatInfo">
            Original format preserved for best compatibility
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
        <h3><i class="fas fa-chart-bar"></i> Optimization Status</h3>

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
          <div class="stat-item stat-item3">
            <div class="stat-label">
              <i class="fas fa-percentage"></i> Reduction
            </div>
            <div class="stat-value-large" id="reduction">0%</div>
          </div>
          <div class="stat-item stat-item4">
            <div class="stat-label"><i class="fas fa-save"></i> Saved</div>
            <div class="stat-value-large" id="savings">0 KB</div>
          </div>
        </div>
        
        <!-- ZIP Size Estimation for Multiple Images -->
        <div class="zip-estimation" id="zipEstimation" style="display: none;">
          <h4><i class="fas fa-file-archive"></i> ZIP Size Estimation</h4>
          <div class="zip-stats">
            <div class="zip-stat-item">
              <div class="zip-stat-label">Original ZIP:</div>
              <div class="zip-stat-value" id="originalZipSize">0 KB</div>
            </div>
            <div class="zip-stat-item">
              <div class="zip-stat-label">Optimized ZIP:</div>
              <div class="zip-stat-value" id="optimizedZipSize">0 KB</div>
            </div>
            <div class="zip-stat-item">
              <div class="zip-stat-label">Total Savings:</div>
              <div class="zip-stat-value" id="totalZipSavings">0 KB</div>
            </div>
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
    const reduction = document.getElementById("reduction");
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
    const zipEstimation = document.getElementById("zipEstimation");
    const originalZipSize = document.getElementById("originalZipSize");
    const optimizedZipSize = document.getElementById("optimizedZipSize");
    const totalZipSavings = document.getElementById("totalZipSavings");

    // Configuration constants
    const DEFAULT_QUALITY = 60; // Default quality percentage
    const DEFAULT_MAX_DIMENSION = 2000; // Maximum width/height for optimization
    const MAX_FILE_SIZE = 10 * 1024 * 1024; // 10MB limit
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

      // Add other supported formats
      const formats = [
        { value: 'image/jpeg', name: 'JPEG' },
        { value: 'image/png', name: 'PNG' },
        { value: 'image/webp', name: 'WebP' }
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
      updateFormatInfo();
    }

    // Update format info
    function updateFormatInfo() {
      const selectedOption = formatSelect.options[formatSelect.selectedIndex];
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
      if (format === "image/gif") return "gif";
      if (format === "image/bmp") return "bmp";
      return "jpg";
    }

    // Format name mapping
    function getFormatName(format) {
      const map = {
        'image/jpeg': 'JPEG',
        'image/png': 'PNG',
        'image/webp': 'WebP',
        'image/gif': 'GIF',
        'image/bmp': 'BMP'
      };
      return map[format] || format;
    }

    // Optimize image - FIXED COMPRESSION
    function optimizeImage() {
      if (!originalFile) return;

      // Use individual settings for the selected image
      const settings = individualSettings[selectedImageIndex] || { quality: DEFAULT_QUALITY, format: originalFile.type };
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

        // Update UI with formatted sizes (KB/MB only)
        originalSize.textContent = formatFileSize(originalSizeBytes);
        optimizedSize.textContent = formatFileSize(optimizedSizeBytes);

        const savingsBytes = originalSizeBytes - optimizedSizeBytes;
        savings.textContent = formatFileSize(savingsBytes);

        const reductionPercent = (
          (savingsBytes / originalSizeBytes) *
          100
        ).toFixed(1);
        reduction.textContent = `${reductionPercent}%`;

        // Highlight if compression failed
        if (optimizedSizeBytes > originalSizeBytes) {
          optimizedSize.style.color = "red";
          reduction.style.color = "red";
          savings.style.color = "red";
        } else {
          optimizedSize.style.color = "";
          reduction.style.color = "";
          savings.style.color = "";
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

    // Process multiple files
    function processMultipleFiles(files) {
      const imageFiles = files.filter(file => file.type.match("image.*"));
      
      if (imageFiles.length === 0) return;

      // Check file sizes and limit processing
      if (imageFiles.length > MAX_FILES) {
        alert(`Too many files selected. Please select ${MAX_FILES} or fewer images.`);
        return;
      }
      
      const oversizedFiles = imageFiles.filter(file => file.size > MAX_FILE_SIZE);
      if (oversizedFiles.length > 0) {
        alert(`Some files are too large (max ${formatFileSize(MAX_FILE_SIZE)} each). Please resize them before uploading.`);
        return;
      }

      // Show loading state
      if (imageFiles.length > 1) {
        downloadBtnText.textContent = `Processing ${imageFiles.length} images...`;
      }

      // Process images sequentially to avoid blocking
      let processedCount = 0;
      
              function processNextImage() {
          if (processedCount >= imageFiles.length) {
            // All images processed
            updateGallery();
            // Always select the first image when processing is complete
            if (uploadedImages.length > 0) {
              selectImage(0);
            }
            return;
          }

        const file = imageFiles[processedCount];
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
          individualSettings[imageIndex] = {
            quality: DEFAULT_QUALITY, // Default quality
            format: file.type, // Default to original format
            optimizedSize: null,
            reduction: 0
          };
          
          processedCount++;
          
          // If this is the first image, select it immediately
          if (processedCount === 1) {
            selectImage(0);
          }
          
          // Update progress for multiple images
          if (imageFiles.length > 1) {
            downloadBtnText.textContent = `Processing ${processedCount}/${imageFiles.length} images...`;
          }
          
          // Process next image with a small delay to prevent blocking
          setTimeout(processNextImage, 10);
        };
        
        reader.readAsDataURL(file);
      }
      
      // Start processing
      processNextImage();
    }

    // Calculate and update ZIP size estimation
    function updateZipEstimation() {
      if (uploadedImages.length <= 1) {
        zipEstimation.style.display = "none";
        return;
      }

      // Calculate original total size
      const originalTotalSize = uploadedImages.reduce((total, image) => total + image.size, 0);
      
      // Estimate optimized sizes based on individual settings
      let estimatedOptimizedSize = 0;
      
      uploadedImages.forEach((imageData, index) => {
        const settings = individualSettings[index] || { quality: DEFAULT_QUALITY, format: imageData.type };
        const quality = settings.quality / 100;
        
        // Rough estimation based on quality and format
        let compressionRatio = 1;
        
        if (settings.format === 'image/jpeg') {
          compressionRatio = 0.3 + (0.7 * quality); // JPEG compression
        } else if (settings.format === 'image/png') {
          compressionRatio = 0.5 + (0.5 * quality); // PNG compression
        } else if (settings.format === 'image/webp') {
          compressionRatio = 0.2 + (0.6 * quality); // WebP compression
        } else {
          compressionRatio = 0.8 + (0.2 * quality); // Other formats
        }
        
        estimatedOptimizedSize += imageData.size * compressionRatio;
      });

      // Add ZIP overhead (roughly 2% of total size)
      const zipOverhead = estimatedOptimizedSize * 0.02;
      const finalOptimizedSize = estimatedOptimizedSize + zipOverhead;
      
      // Calculate savings
      const totalSavings = originalTotalSize - finalOptimizedSize;
      
      // Update UI
      originalZipSize.textContent = formatFileSize(originalTotalSize);
      optimizedZipSize.textContent = formatFileSize(finalOptimizedSize);
      totalZipSavings.textContent = formatFileSize(totalSavings);
      
      // Color coding for savings
      if (totalSavings > 0) {
        totalZipSavings.style.color = "var(--success)";
        optimizedZipSize.style.color = "var(--success)";
      } else {
        totalZipSavings.style.color = "var(--danger)";
        optimizedZipSize.style.color = "var(--danger)";
      }
    }

    // Debounced gallery update for better performance
    function debouncedUpdateGallery() {
      if (updateGalleryTimeout) {
        clearTimeout(updateGalleryTimeout);
      }
      updateGalleryTimeout = setTimeout(updateGallery, 50);
    }

    // Update gallery display
    function updateGallery() {
      if (uploadedImages.length === 0) {
        imageGallery.style.display = "none";
        return;
      }

      imageGallery.style.display = "block";
      
      // Use DocumentFragment for better performance
      const fragment = document.createDocumentFragment();

      uploadedImages.forEach((imageData, index) => {
        const settings = individualSettings[index] || { quality: DEFAULT_QUALITY, format: imageData.type };
        const galleryItem = document.createElement("div");
        galleryItem.className = `gallery-item ${index === selectedImageIndex ? 'selected' : ''}`;
        galleryItem.innerHTML = `
          <div class="gallery-image">
            <img src="${imageData.dataUrl}" alt="${imageData.name}" loading="lazy" />
            <div class="gallery-overlay">
              <button class="remove-btn" onclick="removeImage(${index})">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="gallery-info">
            <div class="gallery-name">${imageData.name}</div>
            <div class="gallery-size">${formatFileSize(imageData.size)}</div>
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
        zipEstimation.style.display = "none";
      } else {
        downloadBtnText.textContent = `Download ZIP (${uploadedImages.length} images)`;
        zipEstimation.style.display = "block";
        updateZipEstimation();
      }
    }

    // Select image for comparison
    function selectImage(index) {
      if (index >= 0 && index < uploadedImages.length) {
        selectedImageIndex = index;
        const selectedImageData = uploadedImages[index];
        
        // Load individual settings for this image
        const settings = individualSettings[index] || { quality: DEFAULT_QUALITY, format: selectedImageData.type };
        
        // Update UI with individual settings
        qualitySlider.value = settings.quality;
        qualityValue.textContent = settings.quality;
        qualityDisplay.textContent = `${settings.quality}%`;
        
        // Update format dropdown
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
      resetState();
      imageGallery.style.display = "none";
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

      // Set format info
      updateFormatInfo();

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
      originalSize.textContent = "0 KB";
      optimizedSize.textContent = "0 KB";
      reduction.textContent = "0%";
      savings.textContent = "0 KB";
      downloadBtn.disabled = true;

      // Reset internal state
      optimizedDataUrl = null;
      isImageLoaded = false;
      sliderPosition = 0.5;

      // Clear canvas
      ctx.clearRect(0, 0, canvas.width, canvas.height);

      // Reset slider position
      comparisonSlider.style.left = "50%";
      
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
      return new Promise((resolve) => {
        const img = new Image();
        img.onload = function() {
          const tempCanvas = document.createElement("canvas");
          const tempCtx = tempCanvas.getContext("2d");

          // Calculate new dimensions (reduce size for compression)
          let newWidth = img.width;
          let newHeight = img.height;

          if (newWidth > DEFAULT_MAX_DIMENSION || newHeight > DEFAULT_MAX_DIMENSION) {
            const ratio = Math.min(DEFAULT_MAX_DIMENSION / newWidth, DEFAULT_MAX_DIMENSION / newHeight);
            newWidth = Math.floor(newWidth * ratio);
            newHeight = Math.floor(newHeight * ratio);
          }

          tempCanvas.width = newWidth;
          tempCanvas.height = newHeight;
          tempCtx.drawImage(img, 0, 0, newWidth, newHeight);

          const optimizedDataUrl = tempCanvas.toDataURL(useFormat, quality);
          const base64String = optimizedDataUrl.split(",")[1];
          const optimizedBlob = tempCanvas.toBlob((blob) => {
            resolve({
              blob: blob,
              dataUrl: optimizedDataUrl,
              name: file.name,
              size: blob.size
            });
          }, useFormat, quality);
        };
        img.src = URL.createObjectURL(file);
      });
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
        const settings = individualSettings[0] || { quality: DEFAULT_QUALITY, format: originalFile.type };
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
          const zip = new JSZip();
          const timestamp = new Date().toISOString().replace(/[:.]/g, '-').slice(0, -5);
          let zipName = `squeezed-${timestamp}`;

          // Generate optimized images for all uploaded images with individual settings
          const optimizedImages = [];
          for (let i = 0; i < uploadedImages.length; i++) {
            const imageData = uploadedImages[i];
            const settings = individualSettings[i] || { quality: DEFAULT_QUALITY, format: imageData.type };
            const optimized = await generateOptimizedImage(imageData.file, settings.format, settings.quality / 100);
            
            // Get base name without extension
            let baseName = imageData.name;
            const lastDot = baseName.lastIndexOf(".");
            if (lastDot > 0) {
              baseName = baseName.substring(0, lastDot);
            }

            const fileName = `${baseName}-optimized.${getFormatExtension(settings.format)}`;
            zip.file(fileName, optimized.blob);
            optimizedImages.push(optimized);
          }

          // Generate and download zip
          const zipBlob = await zip.generateAsync({ type: "blob" });
          const link = document.createElement("a");
          link.href = URL.createObjectURL(zipBlob);
          link.download = `${zipName}.zip`;
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);

          // Update download button text
          downloadBtnText.textContent = `Download ZIP (${uploadedImages.length} images)`;
        } catch (error) {
          console.error("Error creating ZIP:", error);
          downloadBtnText.textContent = "Download";
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

      // Settings changes trigger auto-optimization and save individual settings
      qualitySlider.addEventListener("input", function () {
        updateQualityDisplay();
        
        // Save individual settings for current image
        if (selectedImageIndex >= 0 && selectedImageIndex < individualSettings.length) {
          individualSettings[selectedImageIndex].quality = parseInt(qualitySlider.value);
          // Update ZIP estimation when quality changes
          if (uploadedImages.length > 1) {
            updateZipEstimation();
          }
        }
        
        if (originalFile) optimizeImage();
      });

      formatSelect.addEventListener("change", function () {
        updateFormatInfo();
        
        // Save individual settings for current image
        if (selectedImageIndex >= 0 && selectedImageIndex < individualSettings.length) {
          individualSettings[selectedImageIndex].format = formatSelect.value;
          // Update gallery to reflect the format change
          debouncedUpdateGallery();
          // Update ZIP estimation when format changes
          if (uploadedImages.length > 1) {
            updateZipEstimation();
          }
        }
        
        if (originalFile) optimizeImage();
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

    // Initialize the app
    function init() {
      resizeCanvas();
      initEventListeners();
      updateQualityDisplay();
      updateFormatInfo();

      // Handle window resize
      window.addEventListener("resize", resizeCanvas);
    }

    // Start the app
    init();
  </script>
</body>

</html>