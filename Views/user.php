<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="<?php echo 'uploads/' . $selectData['Data'][0]->profile; ?>"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <a href="admin_update?user=<?php echo $selectData['Data'][0]->id; ?>">Edit Your Information</a>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Name</h6>
                    <p class="text-muted"><?php echo $selectData['Data'][0]->fname . " " .$selectData['Data'][0]->lname; ?></p>
                  </div>                 
                  <div class="col-6 mb-3">
                    <h6>Email Adress</h6>
                    <p class="text-muted"><?php echo $selectData['Data'][0]->email;?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Contact Number</h6>
                    <p class="text-muted"><?php echo $selectData['Data'][0]->contact;?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Gender</h6>
                    <p class="text-muted"><?php echo $selectData['Data'][0]->gender;?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Adress</h6>
                    <p class="text-muted"><?php echo $selectData['Data'][0]->adress;?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>State</h6>
                    <p class="text-muted">
                      <?php
                        if ($selectData['Data'][0]->state == 'gj') {
                          echo "Gujrat";
                        }
                        if ($selectData['Data'][0]->state == 'dl') {
                          echo "Delhi";
                        }
                        if ($selectData['Data'][0]->state == 'rj') {
                          echo "Rajasthan";
                        }
                        if ($selectData['Data'][0]->state == 'mh') {
                          echo "Maharashtra";
                        }
                        if ($selectData['Data'][0]->state == 'sk') {
                          echo "Sikkim";
                        }
                        if ($selectData['Data'][0]->state == 'pb') {
                          echo "Punjab";
                        }
                      ?>
                    </p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Hobbies</h6>
                    <p class="text-muted"><?php echo $selectData['Data'][0]->hobbies;?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>