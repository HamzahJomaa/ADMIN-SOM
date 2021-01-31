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

    $title = $_POST["title"];
    $cat = $_POST["cat"];
    $tag = implode(",", $_POST["tag"]);
    $date = date('Y-m-d H:i:s', strtotime($_POST["date"]));
    $artcile_text = $_POST['content'];

    mkdir("uploads/articles/" . $title, 0700);

    $error = array();
    $extension = array("jpeg", "jpg", "png", "gif");
    foreach ($_FILES["file"]["tmp_name"] as $key => $tmp_name) {
        $picsDone = 0;
        $file_name = $_FILES["file"]["name"][$key];
        $file_type = $_FILES["file"]["type"][$key];
        $temp_name = $_FILES["file"]["tmp_name"][$key];
        $file_size = $_FILES["file"]["size"][$key];
        $error = $_FILES["file"]["error"][$key];
        if (!$temp_name)
        {
            echo "ERROR: Please browse for file before uploading";
            exit();
        }
        if ($error > 0)
        {
            echo $error;
        }
        else if (($file_type == "image/gif") || ($file_type == "image/jpeg") || ($file_type == "image/png") || ($file_type == "image/pjpeg"))
        {
            $filename = compress_image($temp_name, "uploads/articles/".$title."/" . $file_name, 80);
            $picsDone = 1;
        }
        else
        {
            echo "Uploaded image should be jpg or gif or png.";
        }


    }



    if ($picsDone == 1){
        $stmt = $conn->prepare("INSERT INTO `Articles`(`title`, `cat`, `tag`, `text`, `date`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss", $title, $cat, $tag, $artcile_text, $date);
        $result = $stmt->execute();


        if ($result) {
            echo "<script>alert('Article Added Succesfully')</script>";
            $stmt->close();
        } else {
            echo "<script>alert('Error in Addinf the Article to the Database')</script>";
            print_r($conn->error_list);
            die;
        }
    }else{
        echo "<script>alert('Error in Pictures')</script>";

    }


} else {
    header('HTTP/1.0 403 Forbidden');
}
