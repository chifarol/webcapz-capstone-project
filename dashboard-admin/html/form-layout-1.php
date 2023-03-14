<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Basic Layout</h5>
        <small class="text-muted float-end">Default label</small>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Full Name</label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" name="full_name" value="Chinaza" />
            </div>
            <div class=" input-group mb-3">
                <input type="file" name="fileToUpload" class="form-control" id="inputGroupFile02" />
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
        </form>
    </div>
</div>

<?php
// check if the form's file input was set
if (isset($_POST["submit"])  && isset($_POST["full_name"]) && isset($_FILES["fileToUpload"])) {
    // print file info
    var_dump($_FILES["fileToUpload"]);
    // directory to upload to
    $target_dir = "uploads/";
    // file path to use
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $target_name = $_FILES["fileToUpload"]["name"];
    $target_tmp_name = $_FILES["fileToUpload"]["tmp_name"];
    $uploadOk = 1;
    $imageFileSize = $_FILES["fileToUpload"]["size"];
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is between 1KB and 1MB
    $checkSize = $imageFileSize > 1000 && $imageFileSize < 1000000;
    if (
        $checkSize == false
    ) {
        echo "<br> file must be between 1KB and 1MB";
        $uploadOk = 0;
    }
    // Check if image file is JPG, JPEG, PNG & GIF
    else if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "<br> Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // check if file already exists
    else if (file_exists($target_file)) {
        echo " <br> Sorry, file already exists.";
        $uploadOk = 0;
    } else {
        // upload to server
        move_uploaded_file($target_tmp_name, $target_dir . $target_name);
        echo "<br> File is an image - " . $imageFileType . ".";
        $uploadOk = 1;
    }
} else {
    echo ("File or Full name is empty");
}
?>