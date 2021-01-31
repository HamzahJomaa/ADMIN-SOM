<?php

function compress_image($source_url, $destination_url, $quality)
{
    $info = getimagesize($source_url);
    if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
    elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
    elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
    imagejpeg($image, $destination_url, $quality);
    echo "Image uploaded successfully.";

}


if (isset($_POST["submit"])) {
    include ("connect.php");


    $get_count=$conn->query("SELECT id from pills ORDER BY id DESC LIMIT 1");
    $data= $get_count->fetch_assoc();
    $count = intval($data["id"]) + 1;


    $tag = implode(",", $_POST["tag"]);
    $pill_text = $_POST['text'];




    $target_dir = "uploads/pills/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 1600000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Error!!')</script>";
        // if everything is ok, try to upload file
    } else {
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = $count . '.' . end($temp);
        compress_image($_FILES["file"]["tmp_name"],"uploads/pills/" . $newfilename, 80);
        $stmt = $conn->prepare("INSERT INTO `pills`(`text`, `tag_id`) VALUES (?, ?)");
            $stmt->bind_param("ss", $pill_text, $tag);
            $result = $stmt->execute();
            if ($result) {
                echo "<script>alert('Pill Added Successfully, Have a Great Day!')</script>";
                $stmt->close();
            } else {
                print_r($conn->error_list);
                die;
            }
    }





}else {
    header('HTTP/1.0 403 Forbidden');
}