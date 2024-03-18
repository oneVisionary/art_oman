<?php
if(isset($_GET['file'])) {
    $filePath = $_GET['file'];
    $files = "../asset/images/chatfiles/".$filePath;
    
    if (file_exists($files)) {
        // Set headers for file download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($files) . '"');
        header('Content-Length: ' . filesize($files));

        // Read the file and output its contents
        readfile($files);
        exit; // Terminate script execution after downloading the file
    } else {
        // Handle the case where the file does not exist
        echo "File not found.";
    }
} else {
    // Handle the case where the file parameter is missing
    echo "File parameter is missing.";
}
?>
