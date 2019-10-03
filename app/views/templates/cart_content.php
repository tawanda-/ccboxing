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
                                <!--div class="col-4 col-sm-4 col-md-4">
                                    <div class="quantity">
                                        <input type="button" value="+" class="plus">
                                        <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                            size="4">
                                        <input type="button" value="-" class="minus">
                                    </div>
                                </div-->
                                <div class="col-2 col-sm-2 col-md-2 text-right">
                                    <button type="button" class="btn btn-outline-danger btn-xs">
                                    <i class="material-icons">delete</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                <div class="float-right">
                    <a href="" class="btn btn-outline-secondary float-right">
                        Update shopping cart
                    </a>
                </div>
                <?php else: ?>
                <button href="" class="btn btn-outline-secondary" disabled>
                        Shopping cart empty
                </button>
                <?php endif;?>
            </div>
            <div class="card-footer">
                <div class="float-right" style="margin: 10px">
                    <a href="" class="btn btn-success float-right">Checkout</a>
                    <div class="float-right" style="margin: 5px">
                        Total price: <b>R<?php echo $total;?></b>
                    </div>
                </div>
            </div>
        </div>
</div>