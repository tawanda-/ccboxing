<div class="container">

<div class="row">


<div class="col-lg-3">

      <?php include("category.php"); ?>

  </div>

  <div class="col-lg-9">

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="row">

    <?php foreach($products as $key=>$value): ?>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="https://ccboxing.esikolweni.co.za/shop?productid=<?php echo $value['product_id']; ?>">
            <img class="card-img-top" 
              src="<?php echo $value['product_image']; ?>" alt="">
          </a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="https://ccboxing.esikolweni.co.za/shop?productid=<?php echo $value['product_id']; ?>">
                <?php echo $value['product_name']; ?>
              </a>
            </h4>
            <h5>Price: R<?php echo $value['product_price']; ?></h5>
            <h6>In Stock: <?php echo $value['stock_available']; ?></h6>
            <p class="card-text"><?php echo $value['product_description']; ?></p>
          </div>
          <div class="card-footer">
            <?php if( $value['stock_available'] > 0): ?>
              <form method="post" action="https://ccboxing.esikolweni.co.za/cart">
                <input type="hidden" name="productid" value=<?php echo $value['product_id']; ?> >
                <input type="hidden" name="action" value="add">
                <div class="form-row align-items-center">
                  <div class="col-auto">
                    <input class="form-control" type="number" name="quantity" 
                          min="1" max="<?php echo $value['stock_available'];?>">
                  </div>
                  <div class="col-auto">
                    <button type="submit" name="" class="btn btn-warning">
                      <i class="material-icons" style="vertical-align:middle;">add_shopping_cart</i>   Add to cart
                  </button>
                </div>
                </div>
              </form>
            <?php else:?>
              <div class="form-row align-items-center">
                <div class="col-auto">
                  <button type="button" class="btn btn-info" disabled>Out of Stock</button>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <?php endforeach; ?>

    </div>
  </div>
</div>
</div>