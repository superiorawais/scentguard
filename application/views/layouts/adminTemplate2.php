<!DOCTYPE html>
<html class="no-js before-run" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">
        <title>Login</title>
        <!--<link rel="shortcut icon" href="<?= base_url('assets/admin/images/favicon.ico'); ?>">-->
        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?= base_url('assets/admin/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/admin/css/bootstrap-extend.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/admin/css/site.min.css'); ?>">
        <!-- Page -->
        <link rel="stylesheet" href="<?= base_url('assets/admin/css/pages/login.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/admin/css/custom.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/user/css/custom.css'); ?>">
        <!-- Fonts -->
        <link rel="stylesheet" href="<?= base_url('assets/admin/fonts/web-icons/web-icons.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/admin/fonts/brand-icons/brand-icons.min.css'); ?>">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
        <script type = "text/javascript" src = "//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js" ></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.0.0.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
        <!--[if lt IE 9]>
                 <script src="<?= base_url('assets/admin/vendor/html5shiv/html5shiv.min.js'); ?>"></script>
                 <![endif]-->

        <!--[if lt IE 10]>
          <script src="<?= base_url('assets/admin/vendor/media-match/media.match.min.js'); ?>"></script>
          <script src="<?= base_url('assets/admin/vendor/respond/respond.min.js'); ?>"></script>
          <![endif]-->

    </head>

    <!--[if lt IE 8]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->


    <!-- Page -->
    <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
         data-animsition-out="fade-out">>
        <div class="page-content vertical-align-middle">
            <div class="brand">
                <img class="brand-img" src="<?= base_url('assets/user/img/logo.png'); ?>" height="150px"  alt="...">
                <!-- <h2 class="brand-text">Childbank</h2> -->
            </div>
            <?= $template['body']; ?>

            <footer class="page-copyright">
                <p>© <?= date('Y'); ?>. All RIGHT RESERVED.</p>
            </footer>
        </div>
    </div>
    <!-- End Page -->
    <!-- Core  -->
    <script src="<?= base_url('assets/admin/vendor/bootstrap/bootstrap.js'); ?>"></script>
</body>

</html>