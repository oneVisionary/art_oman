<?php include("header.php") ?>

<div class="images-container">
   
    <div class="filter-btns common">
        <h1>Filters</h1>
        <div class="level1btn">
            <button onclick="applyFilter('original')">Original</button>
            <button onclick="applyFilter('grayscale')">Grayscale</button>
            <button onclick="applyFilter('invert')">Inversion</button>
            <button onclick="applySaturation()">Saturation</button>
        </div>

        <input type="range" min="0" max="100" value="0" class="slider" id="inversionSlider">
        <h2>Rotate & Flip</h2>
        <div class="levelbtn2">
            <button onclick="rotateImage('clockwise')">Rotate Clockwise</button>
            <button onclick="rotateImage('anticlockwise')">Rotate Anticlockwise</button>
            <button onclick="stretchImage()">Stretch</button>
            <button onclick="shrinkImage()">Shrink</button>
        </div>
        
    </div>
    <div class="img-choosen">
        <div class="img-box">
            <div id="imagePreview"></div>
        </div>
        <div class="box-btn">
            <input type="file" id="imageInput" accept="image/jpeg">
            <button onclick="saveImage()">Save</button>
        </div>
    </div>
</div>

<script>
    function applyFilter(filter) {
        var imageInput = document.getElementById('imageInput');
        var file = imageInput.files[0];
        if (!file) {
            alert('Please select an image.');
            return;
        }

        var formData = new FormData();
        formData.append('image', file);
        formData.append('filter', filter);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'filterapply.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById('imagePreview').innerHTML = xhr.responseText;
            } else {
                alert('Error occurred. Please try again later.');
            }
        };
        xhr.send(formData);
    }

    var inversionSlider = document.getElementById("inversionSlider");
    inversionSlider.oninput = function() {
        var imagePreview = document.getElementById('imagePreview').querySelector('img');
        if (imagePreview) {
            imagePreview.style.filter = 'invert(' + (this.value / 100) + ')';
        }
    };

    function rotateImage(direction) {
        var imagePreview = document.getElementById('imagePreview').querySelector('img');
        var rotation = 0;
        if (imagePreview) {
            rotation = parseInt(imagePreview.getAttribute('data-rotation')) || 0;
        }

        if (direction === 'clockwise') {
            rotation += 90;
        } else if (direction === 'anticlockwise') {
            rotation -= 90;
        }

        if (rotation >= 360) {
            rotation = 0;
        } else if (rotation < 0) {
            rotation = 270;
        }

        if (imagePreview) {
            imagePreview.style.transform = 'rotate(' + rotation + 'deg)';
            imagePreview.setAttribute('data-rotation', rotation);
        }
    }

    function stretchImage() {
        var imagePreview = document.getElementById('imagePreview').querySelector('img');
        if (imagePreview) {
            imagePreview.style.width = '200%';
        }
    }

    function shrinkImage() {
        var imagePreview = document.getElementById('imagePreview').querySelector('img');
        if (imagePreview) {
            imagePreview.style.width = '50%';
        }
    }

    function applySaturation() {
        var imagePreview = document.getElementById('imagePreview').querySelector('img');
        if (imagePreview) {
            // Apply saturation directly without slider
            imagePreview.style.filter = 'saturate(2)'; // Example saturation value
        }
    }

    function saveImage() {
        var imagePreview = document.getElementById('imagePreview').querySelector('img');
        if (imagePreview) {
            var downloadLink = document.createElement('a');
            downloadLink.href = imagePreview.src;
            downloadLink.download = 'filtered_image.jpg'; // Change the filename if needed
            downloadLink.click();
        } else {
            alert('No image to save.');
        }
    }
</script>

<?php include("footer.php") ?>
