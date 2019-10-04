<!-- Page Content -->
<div class="container">

   <small><a href="https://ccboxing.esikolweni.co.za/shop">Back</a></small>
  <h1 class="my-4"><?php echo $product['product_name']?></h1>

  <div class="row">

    <div class="col-md-8">
      <img class="img-fluid" src="<?php echo $product['product_image']?>" alt="" style="width:100%;">
    </div>

    <div class="col-md-4">
      <p><b>Description:</b> <?php echo $product['product_description']?></p>
      <p><b>Price:</b> <?php echo $product['product_price']?></p>
      <p><b>Stock:</b> <?php echo $product['stock_available']?></p>
      <p><b>Rating:</b>
      <?php
          for($x = 0; $x < $product['product_rating']; $x++){
              echo "&#9733;";
          } 
          $i = 5 - $product['product_rating'];
          if($i>0){
            for($k = 0; $k < $i; $k++){
              echo "&#9734;";
            }
          }
        ?>
      </p>
      <button style="margin-bottom: 16px;">Add to cart</button>
      <?php if(isset($_SESSION["loggedin"])):?>
        <p>
          <b>Comments:</b><br/>
          <?php include(__DIR__.'/comments_loggedin_html.php');?>
        </p>
        <?php else:?>
        <p>
          <b>Comments:</b><br/>
          Please <a href="https://ccboxing.esikolweni.co.za/login">Login</a> to comment.
          <?php include(__DIR__.'/comments_html.php');?>
        </p>
      <?php endif;?>
    </div>

  </div>
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
</div>