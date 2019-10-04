<div class="container">
   <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
            <i class="material-icons" style="vertical-align:middle;" >shopping_cart</i>
                Shopping cart
                <a href="https://ccboxing.esikolweni.co.za/shop" class="btn btn-outline-info btn-sm float-right">Continue shopping</a>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <?php if(count($cart) > 0): ?>
                    <?php foreach($cart as $key=>$item): ?>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                    <img class="img-responsive" src="<?php echo $item['product_image'];?>" alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                <h4 class="product-name"><strong><?php echo $item['product_name'];?></strong></h4>
                                <h4>
                                    <small><?php echo $item['product_description'];?></small>
                                </h4>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                    <h6>
                                        <strong>
                                            R<?php echo $item['product_price'];?>
                                            <span class="text-muted"> x </span>
                                            <?php echo $item['quantity'];?>
                                        </strong>
                                    </h6>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2 text-right">
                                    <form method="post" action="https://ccboxing.esikolweni.co.za/cart">
                                        <input type="hidden" name="productid" value=<?php echo $item['product_id']; ?> >
                                        <input type="hidden" name="action" value="delete">
                                        <div class="form-row align-items-center">
                                            <div class="col-auto">
                                                <button type="submit" name="" class="btn btn-outline-danger btn-xs">
                                                    <i class="material-icons" style="vertical-align:middle;">delete</i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                <?php else: ?>
                <button href="" class="btn btn-outline-secondary" disabled>
                        Shopping cart empty
                </button>
                <?php endif;?>
            </div>
            <div class="card-footer">
                <div class="float-right" style="margin: 10px">
                    <a href="https://ccboxing.esikolweni.co.za/checkout" class="btn btn-success float-right">Checkout</a>
                    <div class="float-right" style="margin: 5px">
                        Total price: <b>R<?php echo $total;?></b>
                    </div>
                </div>
            </div>
        </div>
</div>