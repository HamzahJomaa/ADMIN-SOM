<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dore jQuery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/vendor/quill.snow.css" />

    <link rel="stylesheet" href="font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="css/vendor/fullcalendar.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="css/vendor/select2.min.css" />
    <link rel="stylesheet" href="css/vendor/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="css/vendor/dropzone.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="css/vendor/nouislider.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap-stars.css" />
    <link rel="stylesheet" href="css/vendor/cropper.min.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>
<style>
    :root {
        --ck-z-default: 100;
        --ck-z-modal: calc(var(--ck-z-default) + 999);
    }
</style>

<body id="app-container" class="menu-default show-spinner">
<?php
include("navabar.php");
include("menu.php");
include("connect.php");
include("PillPOST.php");

$SQLget_cat = "SELECT * FROM categories";
$Qget_cat = $conn->query($SQLget_cat);

$SQLget_tag = "SELECT * FROM Tags";
$Qget_tag = $conn->query($SQLget_tag);
?>
<main>
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Add Pill</h1>

                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Pills</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add new Pill</li>
                        </ol>
                    </nav>
                </div>


                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="#" enctype="multipart/form-data">

                            <label class="form-group has-float-label">
                                <input class="form-control" type="text" placeholder="Pill Text" name="text" />
                                <span>Pill Text</span>
                            </label>


                            <label class="form-group has-float-label">
                                <select class="form-control select2-single" data-width="100%" name="tag[]" multiple autocomplete>
                                    <?php
                                    if ($Qget_tag->num_rows > 0) {
                                        while ($row = $Qget_tag->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row["id"] ?>"><?php echo $row["title"] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span>Tags</span>
                            </label>
                            <label class="btn btn-outline-primary btn-upload" for="inputImage" title="Upload image file">
                                <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png">
                                Select File
                            </label>
                            <button class="btn btn-primary" name="submit" type="submit">Add Pill</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include("footer.php");
?>



<script src="js/vendor/jquery-3.3.1.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
<script src="js/vendor/perfect-scrollbar.min.js"></script>
<script src="js/vendor/select2.full.js"></script>
<script src="js/vendor/quill.min.js"></script>

<script src="js/vendor/bootstrap-datepicker.js"></script>
<script src="js/vendor/bootstrap-tagsinput.min.js"></script>
<script src="js/dore.script.js"></script>
<script src="js/vendor/dropzone.min.js"></script>

<script src="js/scripts.js"></script>
<script src="js/build/ckeditor.js"></script>
</body>

</html>