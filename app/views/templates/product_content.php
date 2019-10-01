<!-- Page Content -->
<div class="container">

   <small><a href="https://ccboxing.esikolweni.co.za/shop">Back</a></small>

  <!-- Portfolio Item Heading -->
  <h1 class="my-4"><?php echo $product['product_name']?></h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8">
      <img class="img-fluid" src="<?php echo $product['product_image']?>" alt="">
    </div>

    <div class="col-md-4">
      <h3 class="my-3">Description</h3>
      <p><?php echo $product['product_description']?></p>
      <button>Add to cart</button>
    </div>

  </div>
  <!-- /.row -->

  <!-- Related Projects Row -->
  <h3 class="my-4">Related Products</h3>

  <div class="row">

    <?php foreach($products as $key=>$value): ?>
        <?php if($product_id !== $value['product_id']): ?>
            <div class="col-md-3 col-sm-6 mb-4">
            <a href="https://ccboxing.esikolweni.co.za/shop?productid=<?php echo $value['product_id']?>">
                    <img class="img-fluid" src="<?php echo $value['product_image']?>" alt="">
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->