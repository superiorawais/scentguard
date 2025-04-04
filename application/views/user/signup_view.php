<!-- Login Section -->
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center bg-offwhite">
      <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="card mb-3 bg-offwhite">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
              <p class="text-center small">Enter your personal details to create account</p>
            </div>

            <form class="row g-3" novalidate id="signup">

              <div class="col-12">
                <label for="yourName" class="form-label">First Name*</label>
                <input type="text" name="firstName" class="form-control">
                <div class="invalid-feedback">Please, enter your name!</div>
              </div>

              <div class="col-12">
                <label for="yourEmail" class="form-label">Last Name*</label>
                <input type="text" name="lastName" class="form-control">
                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
              </div>

              <div class="col-12">
                <label for="yourUsername" class="form-label">Email*</label>
                <input type="text" name="email" class="form-control">
                <div class="invalid-feedback">Please choose a email.</div>
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
                <input type="password" name="pass" class="form-control">
                <span class="txt-gray">Password must contain 6 characters at least one uppercase letter, one lowercase letter, and one special character.</span>
                <div class="invalid-feedback">Please enter your password!</div>
              </div>

              <div class="col-12">
                <label for="yourPassword" class="form-label">Confirm Password*</label>
                <input type="password" name="confirmPass" class="form-control" id="pass">
                <div class="invalid-feedback">Please enter your password!</div>
              </div>

              <div class="col-12">
                <label for="yourPassword" class="form-label">DOB*</label>
                <input type="date" name="dob" class="form-control">
                <span class="txt-gray">Age should be greater than 18 years </span>
                <div class="invalid-feedback">Please enter your password!</div>
              </div>




              <div class="col-12">
                    <label class="col-sm-3 control-label">Risks/Diseases :</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="risks[]" id="risks" multiple>
                        </select>
                    </div>
                </div>


              <!-- <div class="col-12">
                <label for="yourPassword" class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
                <div class="invalid-feedback">Please enter your password!</div>
              </div>-->



              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                  <label class="form-check-label" for="acceptTerms">I agree and accept the terms and conditions</label>
                  <div class="invalid-feedback">You must agree before submitting.</div>
                </div>
              </div>
              <div class="col-6">
                <button class="btn btn-primary w-100 bg-darkbrown" type="button" onclick="signUp()">Create Account</button>
              </div>
              <div class="col-12">
                <p class="small mb-0">Already have an account? <a href="<?= base_url('login')?>">Login</a></p>
              </div>
            </form>

          </div>
        </div>

      </div>

      <!-- logo start -->

      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="mb-3 bg-offwhite">
          <div class="card-body">
            <a href="<?= base_url() ?>" class="img d-flex align-items-center w-auto">
              <img src="<?= base_url('assets/user/img/logo-transparent.png') ?>" alt="">
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
  $(document).ready(function() {

    loadDropdownData("#signup");


  });

  function signUp() {

    $.validator.addMethod("passwordCheck", function(value, element) {
      return this.optional(element) ||
        /[A-Z]/.test(value) // at least one uppercase letter
        &&
        /[a-z]/.test(value) // at least one lowercase letter
        &&
        /[!@#$%^&*(),.?":{}|<>]/.test(value); // at least one special character
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



    var form = $('#signup').validate({
      rules: {


        firstName: {
          required: true
          // minlength: 6

        },
        lastName: {
          required: true
          // minlength: 6

        },
        email: {
          required: true,
          email:true

        },

        gender: {
          required: true

        },
        pass: {
          required: true,
          maxlength: 20,
          minlength: 6,
          passwordCheck: true


        },
        confirmPass: {
          equalTo: "#pass"

        },
        dob: {
          required: true,
          ageCheck: true
        }
        //  ,
        //  shippingAddress: {
        //   required: function() {
        //         return $("input[name='userType']").val() === "child";
        //     }
        //   }
        // ,
        // email: {
        //   required: true,
        //   email:true
        // }
        //,
        // termsConditions: {
        //     required: true
        // }


      },
      messages: {
        confirmPass: "Password didn't match.",
        pattern: "Password must contain at least one uppercase letter, one lowercase letter, and one special character."
      }

    });
    //#store the validator obj
    if ($('#signup').valid()) {

      // submit using ajax
      var url = "<?php echo base_url('user/User/signUp'); ?>";

      var risks = $('select[name="risks[]"]').val() || [];
      var formData = new FormData($("#signup")[0]);
      formData.append('risks', JSON.stringify(risks));

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
              $('#signup')[0].reset();
              var url = "<?php echo base_url('login')?>";
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
    } else {
      form.focusInvalid();

    }

  }


  function loadDropdownData(container) {
        // console.log(container +  " #ingredients");
        $.ajax({
            url: "<?= base_url('admin/Perfume/getDropdownData'); ?>",
            type: "GET",
            dataType: "json",
            success: function(response) {
               // populateDropdown(container + " #ingredients", response.ingredients);
                populateDropdown(container + " #risks", response.risks);
                //populateDropdown(container + " #alternatives", response.alternatives);
            },
            error: function() {
                alert("Failed to fetch dropdown data.");
            }
        });
    }

    function populateDropdown(selector, data) {
        $(selector).empty();
        $.each(data, function(index, item) {
            $(selector).append(new Option(item.name, item.id));
        });
    }




  $('#signup input').keypress(function(event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      signUp();
    }
  });
</script>