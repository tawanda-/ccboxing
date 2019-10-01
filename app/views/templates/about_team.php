<!-- Header -->
<header class="bg-primary text-center py-5 mb-4">
  <div class="container">
    <h1 class="font-weight-light text-white">Meet the Team</h1>
  </div>
</header>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Team Member 1 -->
    <?php foreach($staff as $key=>$value): ?>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img 
          src="<?php echo $value['staff_image']; ?>" 
          class="card-img-top" alt="<?php echo $value['staff_first_name']; ?>" 
          height="317" 
          width="300">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">
            <?php echo $value['staff_first_name']; ?>&nbsp
            <?php echo $value['staff_last_name']; ?>
          </h5>
          <div class="card-text text-black-50"><?php echo $value['staff_role']; ?></div>
        </div>
      </div>
    </div>

    <?php endforeach; ?>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->