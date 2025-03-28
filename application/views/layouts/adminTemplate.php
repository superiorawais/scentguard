<!DOCTYPE html>
<html class="no-js before-run" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>Admin</title>

    <!--<link rel="apple-touch-icon" href="<?= base_url('assets/admin/images/apple-touch-icon.png'); ?>">-->
    <!--<link rel="shortcut icon" href="<?= base_url('assets/admin/images/favicon.ico'); ?>">-->

    <!--for avoiding conflict add this on top-->
    <script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
    <script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/custom.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/user/css/custom.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/bootstrap-extend.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/site.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/asscrollable/asScrollable.css'); ?>">

    <!-- Plugin -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/datatables-bootstrap/dataTables.bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/datatables-responsive/dataTables.responsive.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/select2/select2.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/bootstrap-select/bootstrap-select.css'); ?>">
    <!--<link rel="stylesheet" href="<?= base_url('assets/admin/vendor/summernote/summernote.css'); ?>">-->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/dataurl.css'); ?>">

    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/../fonts/font-awesome/font-awesome.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/dashboard/v1.css'); ?>">

    <!-- Fonts -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/fonts/web-icons/web-icons.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/fonts/google-fonts.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/bootstrap-datepicker/bootstrap-datepicker.css'); ?>">



    <!--<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>-->


    <!--[if lt IE 9]>
          <script src="<?= base_url('assets/admin/vendor/html5shiv/html5shiv.min.js'); ?>"></script>
          <![endif]-->

    <!--[if lt IE 10]>
          <script src="<?= base_url('assets/admin/vendor/media-match/media.match.min.js'); ?>"></script>
          <script src="<?= base_url('assets/admin/vendor/respond/respond.min.js'); ?>"></script>
          <![endif]-->

    <!-- Scripts -->
    <!--<script src="<?= base_url('assets/admin/vendor/modernizr/modernizr.js'); ?>"></script>-->
    <script src="<?= base_url('assets/admin/vendor/breakpoints/breakpoints.js'); ?>"></script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="">
    <!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided" data-toggle="menubar">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-bar"></span>
            </button>
            <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
                <i class="icon wb-more-horizontal" aria-hidden="true"></i>
            </button>
            <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search" data-toggle="collapse">
                <span class="sr-only">Toggle Search</span>
                <i class="icon wb-search" aria-hidden="true"></i>
            </button>
            <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="" style="cursor: default;">
            <!-- <span> Child Bank</span>    -->
            <img class="navbar-brand-logo" src="<?= base_url('assets/user/img/logo.png'); ?>" height="64px" title="childbank">
            </div>
        </div>

        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                <!-- Navbar Toolbar -->
                <ul class="nav navbar-toolbar">
                    <li class="hidden-float" id="toggleMenubar">
                        <a data-toggle="menubar" href="#" role="button">
                            <i class="icon hamburger hamburger-arrow-left">
                                <span class="sr-only">Toggle menubar</span>
                                <span class="hamburger-bar"></span>
                            </i>
                        </a>
                    </li>
                    <!-- <li class="hidden-xs" id="toggleFullscreen">
                        <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                            <span class="sr-only">Toggle fullscreen</span>
                        </a>
                    </li> -->
                </ul>
                <!-- End Navbar Toolbar -->

                <!-- Navbar Toolbar Right -->
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                    <li class="dropdown">
                        <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="slide-bottom" role="button">
                            <span class="avatar avatar-online">
                                <img src="<?= base_url('assets/admin/images/user.png') ?>" alt="...">
                                <i></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem" onclick="editProf(this);" data-id="<?= $this->session->userdata('panel_user_id'); ?>"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                            </li>
                            <li class="divider" role="presentation"></li>
                            <li role="presentation">
                                <a href="<?= base_url('admin/Login/logout'); ?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- End Navbar Toolbar Right -->
            </div>
            <!-- End Navbar Collapse -->

            <!-- Site Navbar Seach -->

            <!-- End Site Navbar Seach -->
        </div>
    </nav>
    <div class="site-menubar">
        <div class="site-menubar-body">
            <div>
                <div>
                    <ul class="site-menu">
                        <li class="site-menu-category">Admin Panel</li>

                        <li class="site-menu-item">
                            <a href="<?= base_url('admin/User'); ?>" data-slug="layout">
                                <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                                <span class="site-menu-title">Users</span>
                            </a>
                        </li>

                        <li class="site-menu-item">
                            <a href="<?= base_url('admin/Perfume'); ?>" data-slug="layout">
                                <i class="site-menu-icon wb-list" aria-hidden="true"></i>
                                <span class="site-menu-title">Perfumes</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page -->
    <div class="page">
        <div class="page-content padding-30 container-fluid">
            <div class="row">
                <?= $template['body']; ?>
            </div>
        </div>
    </div>
    <!-- End Page -->
    <!-- End Tabs With Inverse -->
    <button class="btn btn-outline btn-default" data-target="#exampleNiftyFadeScale" data-toggle="modal" type="button" id="alert" style="display: none;"></button>

    <!-- Modal -->
    <div class="modal fade modal-fade-in-scale-up" id="exampleNiftyFadeScale" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Ã—</span>
                    </button>
                    <h4 class="modal-title">Notification</h4>
                </div>
                <div class="modal-body">
                    <p id="notification"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal --> <button class="btn btn-primary" data-target="#editProfileModal" data-toggle="modal" type="button" style="display: none;" id="editProfileAlert"></button>

    <!-- Modal -->
    <div class="modal fade" id="editProfileModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content form-horizontal" id="editProfile">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" id="closeEditProfileModal">×</span>
                    </button>
                    <h4 class="modal-title" id="exampleFormModalLabel">Edit</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id2" />

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Name <span class="required">*</span> : </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" id="name2" placeholder="Full Name" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">userName <span class="required">*</span> : </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="userName" id="userName2" placeholder="userName" autocomplete="off" disabled="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password <span class="required">*</span> : </label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="pass" id="pass3" placeholder="Password" autocomplete="off" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Confrim Pass <span class="required">*</span> : </label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="confirmPass" id="confirmPass2" placeholder="Confirm Password" autocomplete="off" />
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Email <span class="required">*</span> : </label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="email" id="email2" placeholder="Email" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Mobile# <span class="required">*</span> : </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="mobile" id="mobile2" placeholder="Mobile#" autocomplete="off" />
                                <p class="help-block">(Example:0300XXXXXXX) </p>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-sm-7 col-sm-offset-3">
                                <button type="button" class="btn btn-primary bg-light-orange" onclick="editUserProfile();">Save </button>
                                <!--<button type="reset" class="btn btn-default btn-outline">Reset</button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Footer -->
    <footer class="site-footer">
        <span class="site-footer-legal">© <?= date('Y'); ?> PetsCare</span>
        <div class="site-footer-right">

        </div>
    </footer>

    <!-- Core  -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.0.0.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script src="<?= base_url('assets/admin/vendor/animsition/jquery.animsition.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/bootstrap/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/asscrollable/jquery.asScrollable.all.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/ashoverscroll/jquery-asHoverScroll.js'); ?>"></script>

    <!-- Plugins -->
    <script src="<?= base_url('assets/admin/vendor/screenfull/screenfull.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/datatables-bootstrap/dataTables.bootstrap.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/datatables-responsive/dataTables.responsive.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/datatables-tabletools/dataTables.tableTools.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/select2/select2.min.js'); ?>"></script>
    <!--<script src="<?= base_url('assets/admin/vendor/summernote/summernote.min.js'); ?>"></script>-->
    <script src="<?= base_url('assets/admin/vendor/bootstrap-datepicker/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/pace.min.js'); ?>"></script>
    <!-- Scripts -->
    <script src="<?= base_url('assets/admin/js/core.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/site.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/sections/menu.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/sections/menubar.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/sections/sidebar.js'); ?>"></script>
    <!--component-->
    <script src="<?= base_url('assets/admin/js/components/animsition.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/components/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/components/datatables.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/components/select2.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/components/bootstrap-select.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/components/summernote.js'); ?>"></script>

    <script>
        $(document).ready(function($) {
            Site.run();
            (function(document, window, $) {
                'use strict';

                var Site = window.Site;

            })(document, window, jQuery);

            getLocation();
        });


        function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
            $("#lat").val();
            $("#lng").val();
        }
    }

    function showPosition(position) {
        $("#lat").val(position.coords.latitude);
        $("#lng").val(position.coords.longitude);
      //  $("#SearchForm").submit();

    }



    function getNearestLocationName() {
        var lat = $("#lat").val();
        var lng = $("#lng").val();
        $.ajax({
            url: "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng + "&sensor=false&key=AIzaSyALIkGkUzfGHj8eIyXUmjnrIui2r_P3r-o",
            type: "POST",
            //data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                try {
                    if (response['status'] == "OK")
                        $("#nearest_area").val(response['results'][0].address_components[1].short_name);
                    else
                        $("#nearest_area").val("");


                } catch (e) {
                    alert(e);
                }
            },
            error: function(e) {
                alert('Location Not Loaded Please Refresh Page');
            }
        });

    }


        function editProf(event) {
            $('#editProfileAlert').trigger('click');
            var id = $(event).attr("data-id");
            var url = "<?php echo base_url('admin/User/getSpecificPanelUser'); ?>";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    ID: id
                },
                success: function(response) {
                    try {
                        response = JSON.parse(response);
                        $('#id2').val(response[0]['id']);
                        $('#name2').val(response[0]['name']);
                        $('#userName2').val(response[0]['user_name']);
                        $('#email2').val(response[0]['email']);
                        $('#mobile2').val(response[0]['phone']);
                    } catch (e) {
                        alert(e);
                    }
                },
                error: function(e) {
                    alert('System Error !');
                }
            });
        }

        function editUserProfile() {

            $.validator.addMethod("passwordCheck", function(value, element) {
        return this.optional(element) 
            || /[A-Z]/.test(value)    // at least one uppercase letter
            && /[a-z]/.test(value)    // at least one lowercase letter
            && /[!@#$%^&*(),.?":{}|<>]/.test(value); // at least one special character
    }, "Password must contain at least one uppercase letter, one lowercase letter, and one special character.");


            var form = $('#editProfile').validate({
                rules: {
                    name: {
                        required: true

                    },
                    email: {
                        required: true

                    },
                    pass: {
                        
                        maxlength: 30,
                        minlength: 6,
                        passwordCheck: true


                    },
                    confirmPass: {
                        equalTo: "#pass3"

                    },
                    mobile: {
                        required: true,
                        maxlength: 11,
                        minlength: 11,
                        number: true

                    }
                },
                messages: {
                    confirmPass: "Password didn't match."
                }

            });

            if ($('#editProfile').valid()) {

                var url = "<?php echo base_url('admin/User/editPanelUser'); ?>";
                var formData = new FormData($("#editProfile")[0]);
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
                            $('#closeEditProfileModal').trigger('click');
                            response = JSON.parse(response);
                            $('#alert').trigger('click');
                            if (response.status == '1') {
                                $('#notification').removeClass('alert alert-danger');
                                $('#notification').addClass('alert alert-success');
                            } else {
                                $('#notification').removeClass('alert alert-success');
                                $('#notification').addClass('alert alert-danger');
                            }
                            $('#notification').text(response.message);
                        } catch (e) {
                            alert(e);
                        }
                    },
                    error: function(e) {
                        alert('System Error !');
                    }
                });
            }
        }

        $('#editProfile input').keypress(function(event) {
            if (event.keyCode === 13) {
                editUserProfile();
            }
        });
    </script>

</body>

</html>