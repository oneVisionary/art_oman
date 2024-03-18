<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) && isset($_POST['filter'])) {
    $image = $_FILES['image'];
    $filter = $_POST['filter'];

    // Define the directory where uploaded images will be saved
    $uploadDirectory = 'uploads/';

    // Ensure the directory exists
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Generate a unique filename
    $fileName = $uploadDirectory . uniqid() . '_' . $image['name'];

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($image['tmp_name'], $fileName)) {
        // Load the uploaded image
        $imageResource = imagecreatefromjpeg($fileName);

        // Apply the specified filter
        switch ($filter) {
            case 'invert':
                imagefilter($imageResource, IMG_FILTER_NEGATE);
                break;
            case 'grayscale':
                imagefilter($imageResource, IMG_FILTER_GRAYSCALE);
                break;
            // Add more cases for other filters
        }

        // Save the filtered image
        $filteredFileName = 'filtered_' . basename($fileName);
        imagejpeg($imageResource, $uploadDirectory . $filteredFileName);

        // Free up memory
        imagedestroy($imageResource);

        // Display the filtered image
        echo '<img src="' . $uploadDirectory . $filteredFileName . '" alt="Filtered Image">';
    } else {
        echo 'Failed to move the uploaded file.';
    }
} else {
    echo 'Invalid request.';
}
?>
