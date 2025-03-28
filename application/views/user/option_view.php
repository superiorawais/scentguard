<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center card bg-offwhite">
            <div class="d-flex justify-content-center py-4">
                <a href="<?=base_url()?>" class="logo d-flex align-items-center w-auto">
                  <img src="<?=base_url('assets/user/img/logo.jpeg')?>" alt="">
                </a>
              </div>

              <div class="card mb-3 bg-sea-green w-100 pt-4">

              <div class="mb-3 py-5">
                <div class="card-body">

                  <form class="row g-3 needs-validation" novalidate>
                      <div class="col-7 mx-auto">
                      <a class="btn btn-primary w-100 bg-orange" href="<?=isset($_GET['type'])?base_url('signup?type=').$_GET['type']:''?>">Sign up</a>
                      </div>
                      <div class="col-7 mx-auto">
                      <a class="btn btn-primary w-100 bg-orange" href="<?=isset($_GET['type'])?base_url('login?type=').$_GET['type']:''?>">Log in</a>
                      </div>
                  </form>

                </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </section>