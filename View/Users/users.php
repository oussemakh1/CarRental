<?php

//Include User Controller
include '../../Controllers/UserController.php';

//Inherit User Controller
$UserController = new UserController();
//Fetch all User
$User = $UserController->Users();

?>



<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<?php include '../includes/header.inc.php'; ?>

    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <?php include '../includes/navbar.inc.php'; ?>

    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <?php include '../includes/left_navbar.inc.php'; ?>


    <div class="row">
        <!-- ============================================================== -->
        <!-- data table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <?php
                    if(isset($_GET['insert_success'])) {
                        insert_success_message();
                    }

                    if(isset($_GET['update_success'])) {
                        update_success_message();
                    }

                    if(isset($_GET['delete_success'])) {
                        delete_success_message();
                    }

                    if(isset($_GET['error_message'])) {
                        error_message($_GET['error_message']);
                    }
                ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">


                            <thead>
                                <tr>
                                  <th>Nom</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($User as $data): ?>
                                <tr>
                                  <td><a href="user_edit.php?id=<?php echo $data['id'];?>"><?php echo $data['username']; ?></a></td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>


                        </table>

                        <!-- pagination -->



                  </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end data table  -->
        <!-- ============================================================== -->
    </div>

    <!-- footer -->
    <?php include '../includes/footer.inc.php'; ?>
