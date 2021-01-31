<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dore jQuery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="font/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="css/vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap-float-label.min.css" />

    <link rel="stylesheet" href="css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="css/vendor/select2.min.css" />
    <link rel="stylesheet" href="css/vendor/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body id="app-container" class="menu-default show-spinner">
<?php
include("navabar.php");
include("menu.php");
$get_art = "SELECT * FROM pills";
$Qget_art = $conn->query($get_art);
?>

<style>
    .data-tables-hide-filter .view-filter{
        display: block;
    }
</style>
<main>
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Product List</h1>
                    <div class="top-right-button-container">
                        <button type="button" class="btn btn-primary btn-lg top-right-button mr-1"><a href="article_add.php">ADD NEW</a></button>
                        <div class="top-right-button-container">
                            <div class="btn-group">
                                <button class="btn btn-outline-primary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    EXPORT
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" id="dataTablesCopy" href="#">Copy</a>
                                    <a class="dropdown-item" id="dataTablesExcel" href="#">Excel</a>
                                    <a class="dropdown-item" id="dataTablesCsv" href="#">Csv</a>
                                    <a class="dropdown-item" id="dataTablesPdf" href="#">Pdf</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Library</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                </div>

                <div class="mb-2">
                    <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions" role="button" aria-expanded="true" aria-controls="displayOptions">
                        Display Options
                        <i class="simple-icon-arrow-down align-middle"></i>
                    </a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4 data-table-rows data-tables-hide-filter">
                <table id="datatableRows" class="data-table responsive nowrap" data-order="[[ 1, &quot;desc&quot; ]]">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Text</th>

                        <th class="empty">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($Qget_art->num_rows > 0) {
                        while ($row_cat = $Qget_art->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>
                                    <p class="list-item-heading"><?php echo $row_cat["id"] ?></p>
                                </td>
                                <td>
                                    <p class="text-muted"><?php echo $row_cat["title"] ?></p>
                                </td>
                                <td>
                                    <p class="text-muted"><?php echo $row_cat["cat_title"] ?></p>
                                </td>
                                <td>
                                    <p class="text-muted"><?php echo substr(html_entity_decode($row_cat["text"]), 0, 150); ?></p>

                                </td>
                                <td>

                                    <a href="article_edit.php?id=<?php echo $row_cat['id']; ?>"><button
                                            href=""
                                            type="button" class="btn
                                            btn-sm
                                            btn-outline-primary
">Edit</button></a>

                                </td>
                            </tr>

                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>

<footer class="page-footer">
    <div class="footer-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <p class="mb-0 text-muted">ColoredStrategies 2019</p>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                    <ul class="breadcrumb pt-0 pr-0 float-right">
                        <li class="breadcrumb-item mb-0">
                            <a href="#" class="btn-link">Review</a>
                        </li>
                        <li class="breadcrumb-item mb-0">
                            <a href="#" class="btn-link">Purchase</a>
                        </li>
                        <li class="breadcrumb-item mb-0">
                            <a href="#" class="btn-link">Docs</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="js/vendor/jquery-3.3.1.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
<script src="js/vendor/perfect-scrollbar.min.js"></script>
<script src="js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="js/vendor/jquery.validate/additional-methods.min.js"></script>
<script src="js/vendor/datatables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="js/vendor/select2.full.js"></script>
<script src="js/dore.script.js"></script>
<script src="js/scripts.js"></script>

</body>

</html>