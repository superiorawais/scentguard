<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="card col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center bg-offwhite">

        <div class="">

          <div class="card-body">

            <div class="pt-4 pb-2">

              <div class="col-12">

                <div class="d-flex justify-content-center py-4">
                  <a href="<?= base_url() ?>" class="logo d-flex align-items-center w-auto">
                    <img src="<?= base_url('assets/user/img/logo.jpeg') ?>" alt="">
                  </a>
                </div>
              </div>

              <h5 class="card-title text-center pb-0 fs-3 ">Hello who are you ?</h5>
            </div>

          </div>
        </div>

        <div class="card mb-3 bg-sea-green w-100" style="padding-top: 65px; padding-bottom:65px;">
          <form class="row g-3 needs-validation" novalidate>

            <div class="col-7 mx-auto">
              <a class="btn btn-primary w-100 bg-orange" href="<?= base_url('option?type=parent') ?>">Parent</a>
            </div>

            <div class="col-7 mx-auto">
              <a class="btn btn-primary w-100 bg-orange" href="<?= base_url('option?type=child') ?>">Child</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</section>