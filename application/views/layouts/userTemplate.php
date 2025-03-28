<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard-Scent Guard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon"> -->
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->





    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/user/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/vendor/simple-datatables/style.css') ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/user/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/css/custom.css') ?>" rel="stylesheet">

    <!-- jquery files -->
    <script src="<?= base_url('assets/user/js/jquery-3.6.3.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/vendor/simple-datatables/simple-datatables.js') ?>"></script>


    <!-- DataTables  -->
    <!-- <script src="<?= base_url('assets/user/vendor/simple-datatables/simple-datatables.js') ?>"></script> -->
    <!-- <script src="<?= base_url('assets/user/js/jquery.dataTables.min.js') ?>"></script> -->
    <!-- <link href="<?= base_url('assets/user/css/jquery.dataTables.min.css') ?>" rel="stylesheet"> -->

</head>

<body>


    <!-- ======= Header ======= -->
    <header id="header" class="header container fixed-top d-flex align-items-center justify-content-between bg-offwhite">

        <div class="d-flex align-items-center justify-content-between">

            <!-- <i class="bi bi-list toggle-sidebar-btn d-flex align-items-center"></i> -->
            <a href="<?= base_url() ?>" class="logo ">
                <img src="<?= base_url('assets/user/img/logo.png') ?>" alt="">
                <!-- <span class="d-none d-lg-block">NiceAdmin</span> -->
            </a>
        </div><!-- End Logo -->


        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
             
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=base_url()?>">Home</a>
                    </li>
                    <?php if(isset($_SESSION['userId'])): ?>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#updateProfileModal" onclick="getLoggedInUser()">
                                <i class=""></i>
                                <span>Profile</span>
                            </a>
                            </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
    </li>
    <li class="nav-item profileName">
    <span class="profileName">
        <?= isset($_SESSION['firstName']) && isset($_SESSION['lastName']) 
            ? $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] 
            : 'Guest' ?>
    </span>
</li>


<?php else: ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('signup') ?>">Register</a>
    </li>
<?php endif; ?>

             
                </ul>
                </div>
            </div>
        </nav>

    </header><!-- End Header -->




    <main id="main" class="main">

        <section class="section container">

            <?= $template['body']; ?>


        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer container">
        <div class="copyright">
            &copy; Copyright <strong><span>Scent Guard</span></strong>. All Rights Reserved
        </div>
        <div class="credits">

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/user/vendor/apexcharts/apexcharts.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/vendor/chart.js/chart.umd.js') ?>"></script>
    <script src="<?= base_url('assets/user/vendor/echarts/echarts.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/vendor/quill/quill.js') ?>"></script>
    <script src="<?= base_url('assets/user/vendor/simple-datatables/simple-datatables.js') ?>"></script>
    <script src="<?= base_url('assets/user/vendor/tinymce/tinymce.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/vendor/php-email-form/validate.js') ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/user/js/main.js') ?>"></script>



    <!--change password  modal end-->
    <!-- start alert Modal -->
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#alertModalSuccess" id="alertSuccess" style="display:none;">success</button>

    <div id="alertModalSuccess" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Notification</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body bg-success">
                    <p id="notification" class="notification text-white"></p>
                </div>
                <!--                    <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                                        </div>-->
            </div>

        </div>
    </div>

    <!--end alert modal-->



    <!-- Trigger the modal with a button  danger-->
    <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#alertModalDanger" id="alertDanger" style="display:none;">danger</button>

    <div id="alertModalDanger" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Notification</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                   
                </div>
                <div class="modal-body bg-danger">
                    <p id="notification" class="notification text-white"></p>
                </div>
                <!--                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                                </div>-->
            </div>

        </div>
    </div>

    <!--end alert modal-->


    <!-- login modal start -->



    <div id="updateProfileModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header bg-skin">
                <h4 class="modal-title  fw-bold">Update Profile</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    
                </div>
                <div class="modal-body">
                    <!-- Login Form -->
                    <form id="updateProfile">

                        <input type="hidden" name="id" id="id" />
                        <div class="col-12">
                            <label for="yourName" class="form-label">First Name*</label>
                            <input type="text" name="firstName" id="firstName" class="form-control">
                            <div class="invalid-feedback">Please, enter your name!</div>
                        </div>

                        <div class="col-12">
                            <label for="yourEmail" class="form-label">Last Name*</label>
                            <input type="text" name="lastName" id="lastName" class="form-control">
                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                        </div>

                        
                        <div class="col-12">
                            <label for="yourEmail" class="form-label">Email*</label>
                            <input type="text" name="email" id="email" class="form-control">
                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                        </div>

                        <div class="col-12">
                <label for="yourUsername" class="form-label">Gender*</label>
                <select name="gender" class="form-control">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Transgender">Transgender</option>
                </select>
              </div>


                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Password*</label>
                            <input type="password" name="pass" id="pass" class="form-control">
                            <span class="txt-gray">Password must contain 6 characters at least one uppercase letter, one lowercase letter, and one special character.</span>
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Confirm Password*</label>
                            <input type="password" name="confirmPass" class="form-control" >
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">DOB*</label>
                            <input type="date" name="dob" id="dob" class="form-control">
                            <span class="txt-gray"> Age should be greater than 18 years.</span>
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>


                        <!-- <div class="col-12">
                            <label for="yourPassword" class="form-label">Email*</label>
                            <input type="email" name="email" id="email" class="form-control">
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>-->

                        


                        <div class="col-12  mt-5 ">
                            <button class="btn btn-primary bg-darkbrown w-100 login-btn" type="button" onclick="updateProfile();">Update</button>

                        </div>

                        <div class="form-group errorDiv" style="display:none;color:brown;" id="errorDiv">
                            <p id="error" class="error"></p>
                        </div>
                    </form>
                    <!-- /Login Form -->
                </div>
                <!--                    <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                                        </div>-->
            </div>

        </div>
    </div>


    <!-- login modal end -->


</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
      
        //getLoggedInUser();
    });


    function getLoggedInUser() {

        var url = "<?php echo base_url('user/User/getLoggedInUser'); ?>";
        $.ajax({
            url: url,
            type: "POST",
            success: function(response) {
                try {
                    response = JSON.parse(response);
                    $('#updateProfile #id').val(response['id']);
                    $('#updateProfile #gender').val(response['gender']);
                    $('#updateProfile #firstName').val(response['firstName']);
                    $('#updateProfile #lastName').val(response['lastName']);
                    $('#updateProfile #dob').val(response['dob']);
                    $('#updateProfile #email').val(response['email']);
                    // $('#updateProfile #email').val(response['email']);

                } catch (e) {
                    alert(e);
                }
            },
            error: function(e) {
                alert('System Error !');
            }
        });
    }

    function updateProfile() {


        $.validator.addMethod("passwordCheck", function(value, element) {
        return this.optional(element) 
            || /[A-Z]/.test(value)    // at least one uppercase letter
            && /[a-z]/.test(value)    // at least one lowercase letter
            && /[!@#$%^&*(),.?":{}|<>]/.test(value); // at least one special character
    }, "Password must contain at least one uppercase letter, one lowercase letter, and one special character.");

    $.validator.addMethod("ageCheck", function(value, element) {
    var dob = new Date(value);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();
    var month = today.getMonth() - dob.getMonth();

    if (month < 0 || (month === 0 && today.getDate() < dob.getDate())) {
        age--;
    }

    return age >= 18; // Ensures the age is 18 or older
}, "You must be at least 18 years old.");

        var form = $('#updateProfile').validate({
            rules: {

                fisrtName: {
                    required: true
                },
                lastName: {
                    required: true
                },
                dob: {
                    required: true,
                    ageCheck:true

                },
                pass: {
                    maxlength: 20,
                    minlength: 6,
                    passwordCheck: true
                },
                confirmPass: {
                    equalTo: "#pass"

                },
                email: {
                    required:true,
                    email:true
                }
                // ,
                // email: {
                //     email: true,
                //     required:true
                // }
        //         ,
        //  shippingAddress: {
        //   required: function() {
        //         return $("input[name='userType']").val() === "child";
        //     }
        //   }

            }
            ,
      messages: {
        confirmPass: "Password didn't match.",
        pattern: "Password must contain at least one uppercase letter, one lowercase letter, and one special character."
      }

        });
        //#store the validator obj
        if ($('#updateProfile').valid()) {

            // submit using ajax
            var url = "<?php echo base_url('user/User/updateProfile'); ?>";
            var formData = new FormData($("#updateProfile")[0]);

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    try {
                        response = JSON.parse(response);

                        if (response.status == '1') {

                            $('#updateProfile #errorDiv').css("display", "none");
                            $('#btnClose').trigger('click');
                            $('#alertSuccess').trigger('click');
                            $('#updateProfile')[0].reset();

                            setTimeout(function() {
                                $('#alertModalSuccess').modal('hide');

                            }, 2000);

                        } else {
                            $('#updateProfile #errorDiv').css("display", "block");
                            $('#updateProfile #error').text(response.message);
                        }

                        $('.notification').text(response.message);

                    } catch (e) {
                        alert(e);
                    }
                },
                error: function(e) {
                    alert('System Error !');
                }
            });
        } else {
            form.focusInvalid();

        }

    }


    $('#login input').keypress(function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            login();
        }
    });
    
</script>

</html>