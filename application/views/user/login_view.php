<!-- Login Section -->
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center" style="margin-top: 0px !important;">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login into Account</h5>
                    <!-- <p class="text-center small">Enter your personal details to create account</p> -->
                  </div>

                  <form class="row g-3" novalidate id="login">
                  
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                        <div class="invalid-feedback">Please choose a email.</div>
                     
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="pass" class="form-control">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div> -->
                    <div class="col-6">
                      <button class="btn btn-primary w-100 bg-darkbrown" type="button" onclick="login()">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have an account? <a href="<?=base_url('signup')?>">Signup</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>

<!-- logo start -->

<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="mb-3">
                <div class="card-body">
                <a href="<?=base_url()?>" class="img d-flex align-items-center w-auto">
                  <img src="<?=base_url('assets/user/img/logo-transparent.png')?>" alt="">
                </a>
                </div>
              </div>

            </div>
<!-- logo end -->
          </div>
        </div>

      </section>
<!-- /Login Section -->


<script type="text/javascript">
    var destinationUrl = '';

    function login() {
        var form = $('#login').validate({
            rules: {
              email: {
                    required: true,
                    email:true
                },
                pass: {
                    required: true
                }
            }

        });
        //#store the validator obj
        if ($('#login').valid()) {

            // submit using ajax
            var url = "<?php echo base_url('user/User/login'); ?>";
            var formData = new FormData($("#login")[0]);
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
                            $('#alertSuccess').trigger('click');
                            var url = "<?php echo base_url('home'); ?>";
                            setTimeout(function() {
                                window.location = url;
                            }, 1500);

                        } else {
                            $('#alertDanger').trigger('click');
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

        }
        /*else {
                                                    // dont do anything
                                                    }*/

    }
    $('#login input').keypress(function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            login();
        }
    });
</script>