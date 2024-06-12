<?php
session_start();
if (!$_SESSION["login"]){
    header("Location:login.php");
}
?>
<?php
require ("connection.php");
$query = $pdo->query("SELECT * FROM admin")->fetch();
?>

<!DOCTYPE html>
<html lang="en-gb">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />

    <style>

        .ck-editor__editable_inline {
            min-height: 450px;
            margin-bottom: 16px;
        }
    </style>



</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include "templates/nav.php"
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">



                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $query["first_name"]." ". $query["last_name"] ?></span>
                            <img class="img-profile rounded-circle"
                                 src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="admin_ayar.php">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                settings
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Exit
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Contents</h1>



                <div>
                    <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered w-100">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Featured image</th>
                                        <th scope="col">History</th>
                                        <th scope="col">Transactions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $data = $pdo->query("SELECT * FROM articles")->fetchAll();
                                    $say=1;

                                    ?>

                                    <?php foreach ($data as $yazi): ?>
                                    <tr>
                                        <th scope="row"><?php echo $say++ ?></th>
                                        <td><?php echo $yazi["title"] ?></td>

                                        <td class="text-center"><img data-fancybox  src="<?php echo "../".$yazi["yazi_image"] ?>" height="80" width="80" alt=""></td>

                                        <td><?php echo $yazi["history"] ?></td>

                                        <td>
                                            <div  role="group" aria-label="Basic example">
                                                <a href="<?php echo "ajax/content_delete.php?sil_id=".$yazi["id"] ?>" type="button" class="btn btn-danger">Delete</a>
                                                <a href="<?php echo "content-edit.php?id=".$yazi["id"] ?>" type="button" class="btn btn-warning">Edit</a>

                                            </div>
                                        </td>

                                    </tr>
                                    <?php endforeach; ?>




                                    </tbody>
                                </table>
                                
                            </div>


                        </div>


                    </form>
                </div>


            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->

    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade close_pass" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Log out</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure you want to exit the current session ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Exit</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="vendor/ckeditör/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>



<script >

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            language: 'tr',
        } )

</script>
</body>

</html>

