<?php

// Check if the 'image' key is set in the $_FILES array
if(isset($_FILES['image']) && isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
    $imageData = $_FILES['image']['tmp_name'];
    // Rest of your code
} else {
    echo "No file uploaded.";
    exit(); // Stop execution if no file is uploaded
}

$pythonScriptPath = 'classify.py';
$command = "python \"$pythonScriptPath\" \"$imageData\"";

$output = shell_exec($command);

if ($output === null) {
    echo "Error executing command: " . error_get_last()['message'];
} else {
    echo "Output: $output";
}
?>
