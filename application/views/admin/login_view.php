<style>

    #recoverPass .error
    {
        color:red !important;
    }
    #recoverPass .control-label
    {
        color:grey !important;
    }
</style>
<h3>Login into admin panel</h3>
<body class="page-login layout-full">
    <form id="login">
        <div class="form-group">
            <label class="sr-only" for="inputEmail">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label class="sr-only" for="inputPassword">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
        </div>

        <div class="form-group" id="errorDiv">
            <label class="sr-only" for="inputPassword"></label>
            <p id="error"></p>
        </div>

        <button type="button" class="btn btn-block bg-darkbrown" onclick="loginCheck();" id="test">Sign in</button>
        <div class="form-group clearfix">
            <!--            <div class="checkbox-custom checkbox-inline pull-left">
                            <input type="checkbox" id="rememberme" name="rememberme" value="1">
                            <label for="inputCheckbox">Remember me</label>
                        </div>-->
            <!-- <a class="btn btn-link" data-target="#recoverPassModal"
               data-toggle="modal">Forgot password?</a> -->
        </div>
    </form>
    <!--<p>Still no account? Please go to <a href="register.html">Register</a></p>-->




    <!-- Modal notification -->
    <button class="btn btn-outline btn-default" data-target="#exampleNiftyFadeScale"
            data-toggle="modal" type="button" id="alert" style="display: none;"></button>
    <div class="modal fade modal-fade-in-scale-up" id="exampleNiftyFadeScale" aria-hidden="true"
         aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
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
    <!-- End Modal notification -->



    <!-- Modal recovery-->
    <div class="modal fade" id="recoverPassModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
         role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content form-horizontal" id="recoverPass" style="width: 600px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" id="closeRecoverPassModal">×</span>
                    </button>
                    <h4 class="modal-title" id="exampleFormModalLabel">Recover Password</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email <span class="required">*</span> : </label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-7 col-sm-offset-3">
                                <button type="button" class="btn btn-primary" onclick="recoverPass();">Recover </button>
                                <!--<button type="reset" class="btn btn-default btn-outline">Reset</button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Modal recovery -->



    <script type="text/javascript">
        function loginCheck()
        {
            var form = $('#login').validate({
                rules: {
                    email: {
                        required: true

                    },
                    pass: {
                        required: true
                    }
                }
            });
            //#store the validator obj
            if ($('#login').valid()) {

                // submit using ajax
                var url = "<?php echo base_url('admin/Login/login'); ?>";
                var formData = new FormData($("#login")[0]);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response)
                    {
                        try
                        {
                            response = JSON.parse(response);

                            if (response.status == '1')
                            {
                                $('#errorDiv').css("display", "none");
                                $('#alert').trigger('click');
                                $('#notification').removeClass('alert alert-danger');
                                $('#notification').addClass('alert alert-success');
                                $('#notification').text(response.message);
                                var url = "<?php echo base_url('admin/User'); ?>";
                                setTimeout(function () {
                                    window.location = url;
                                }, 1000);
                            } else
                            {
                                $('#errorDiv').css("display", "block");
                                $('#error').text(response.message);
                                /*$('#notification').removeClass('alert alert-success');
                                 $('#notification').addClass('alert alert-danger');*/
                            }


                        } catch (e)
                        {
                            alert(e);
                        }
                    },
                    error: function (e)
                    {
                        alert('System Error !');
                    }
                });

            }
        }

        function recoverPass()
        {

            var form = $('#recoverPass').validate({
                rules: {
                    email: {
                        required: true

                    }

                }

            });

            if ($('#recoverPass').valid())
            {


                var url = "<?php echo base_url('admin/Login/recoverPass'); ?>";
                var formData = new FormData($("#recoverPass")[0]);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response)
                    {
                        try
                        {
                            $('#closeRecoverPassModal').trigger('click');
                            response = JSON.parse(response);
                            $('#alert').trigger('click');
                            if (response.status == '1')
                            {
                                $('#notification').removeClass('alert alert-danger');
                                $('#notification').addClass('alert alert-success');
                            } else
                            {
                                $('#notification').removeClass('alert alert-success');
                                $('#notification').addClass('alert alert-danger');
                            }
                            $('#notification').text(response.message);
                        } catch (e)
                        {
                            alert(e);
                        }
                    },
                    error: function (e)
                    {
                        alert('System Error !');
                    }
                });
            }
        }
        $('#login input').keypress(function (event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                loginCheck();
            }
        });

        $('#recoverPass input').keypress(function (event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                recoverPass();
            }
        });
    </script>