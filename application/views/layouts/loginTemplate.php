<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Scent Guard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="<?=base_url('assets/user/img/favicon.png')?>" rel="icon"> -->
  <!-- <link href="<?=base_url('assets/user/img/apple-touch-icon.png')?>" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url('assets/user/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/user/vendor/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/user/vendor/boxicons/css/boxicons.min.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/user/vendor/quill/quill.snow.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/user/vendor/quill/quill.bubble.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/user/vendor/remixicon/remixicon.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/user/vendor/simple-datatables/style.css')?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url('assets/user/css/style.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/user/css/custom.css')?>" rel="stylesheet">

  <!-- jquery files -->
  <script src="<?=base_url('assets/user/js/jquery-3.6.3.min.js')?>"></script>
  <script src="<?=base_url('assets/user/js/jquery.validate.min.js')?>"></script>

</head>

<body>

  <main>
    <div class="container log-temp">
    <?= $template['body']; ?>
</div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


   <!-- start alert Modal -->
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#alertModalSuccess" id="alertSuccess" style="display:none;">success</button>



    <div class="modal fade" id="alertModalSuccess" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Notification</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body notification alert alert-success">
                    </div>
                  </div>
                </div>
              </div>


    <!--end alert modal-->


     <!-- Trigger the modal with a button  danger-->
     <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#alertModalDanger" id="alertDanger" style="display:none;">danger</button>

     <div class="modal fade" id="alertModalDanger" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Notification</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body notification alert alert-danger">
                    </div>
                  </div>
                </div>
              </div>



  <!-- Vendor JS Files -->
  <script src="<?=base_url('assets/user/vendor/apexcharts/apexcharts.min.js')?>"></script>
  <script src="<?=base_url('assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?=base_url('assets/user/vendor/chart.js/chart.umd.js')?>"></script>
  <script src="<?=base_url('assets/user/vendor/echarts/echarts.min.js')?>"></script>
  <script src="<?=base_url('assets/user/vendor/quill/quill.js')?>"></script>
  <script src="<?=base_url('assets/user/vendor/simple-datatables/simple-datatables.js')?>"></script>
  <script src="<?=base_url('assets/user/vendor/tinymce/tinymce.min.js')?>"></script>
  <script src="<?=base_url('assets/user/vendor/php-email-form/validate.js')?>"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url('assets/user/js/main.js')?>"></script>
 

</body>

</html>