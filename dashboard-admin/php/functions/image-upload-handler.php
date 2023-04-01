<?php
header('Content-Type: application/json');

require_once('../db.php');
if (
    $_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['images'])
) {
    $message = "";
    $uploadOk = true;
    $image_data = $_FILES['images'];
    $target_dir = "../uploads/";
    // file path to use
    $target_file = $target_dir . basename($image_data["name"][0]);
    $target_name = $image_data["name"][0];
    $target_tmp_name = $image_data["tmp_name"][0];
    $imageFileSize = $image_data["size"][0];
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is between 1KB and 1MB
    $checkSize = $imageFileSize > 1000 && $imageFileSize < 1000000;
    if (
        $checkSize == false
    ) {
        $message = "file must be between 1KB and 1MB";
        $uploadOk = false;
    }
    // Check if image file is JPG, JPEG, PNG & GIF
    else if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = false;
    }
    // check if file already exists
    else if (file_exists($target_file)) {
        // $message = "Sorry, file already exists.";
        // $uploadOk = false;
        $actual_name = pathinfo($target_name, PATHINFO_FILENAME);
        $original_name = $actual_name;
        $extension = pathinfo($target_name, PATHINFO_EXTENSION);
        $target_name = $actual_name . "." . $extension;

        $i = 1;
        while (file_exists($target_file)) {
            $actual_name = (string) $original_name . $i;
            $target_name = $actual_name . "." . $extension;
            $target_file = $target_dir . basename($target_name);
            $i++;
        }
    }
    // upload to server
    try {
        $uploadOk = true;
        $upload_path = $target_dir . $target_name;
        $media_url = 'uploads/' . $target_name;
        $media_type = "image";
        move_uploaded_file($target_tmp_name, $upload_path);
        $insert_media = "INSERT INTO media (
                media_url,
                media_type)
            VALUES (?,?)";

        if ($stmt = mysqli_prepare($conn, $insert_media)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param(
                $stmt,
                "ss",
                $media_url,
                $media_type,
            );

            /* Set the parameters values and execute
            the statement again to insert another row */
            mysqli_stmt_execute($stmt);
        } else {
            $message = "ERROR: Could not prepare post create query: $insert_media. " . mysqli_error($conn);
        }

        // Close statement
        mysqli_stmt_close($stmt);

    } catch (Exception $e) {
        $message = $e;
    }

    $response = [
        "successful" => $uploadOk,
        "message" => $message,
        "image_data" => [$target_name, $target_tmp_name],
        "image_path" => 'uploads/' . $target_name
    ];
    echo json_encode($response);

} else {
    $response = [
        "message" => "no file",
    ];
    echo json_encode($response);
}