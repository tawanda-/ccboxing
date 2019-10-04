<div class="card">
	<div class="card-body">
		<?php foreach($comments as $k=>$v): ?>
			<div class="row">
				<div class="col-md-4">
					<i class="material-icons" style="font-size: 48px;">account_circle</i>
				</div>
				<div class="col-md-8">
					<p>
						<a class="float-left" href="#">
							<strong>
								<?php echo $v['customer_username']?>
							</strong>
						</a>
					</p>
					<div class="clearfix"></div>
					<p class="text-secondary">
						<?php
							echo time_elapsed_string($v['timestamp']);
						?>
					</p>
					<p>
						<?php echo $v['comment']?>
					</p>
				</div>
			</div>
			<hr/>
		<?php endforeach;?>
        <form action="https://ccboxing.esikolweni.co.za/comment" method="post" class="form-horizontal" id="commentForm" role="form"> 
            <input type="hidden" name="productid" value=<?php echo $product_id; ?> >
            <input type="hidden" name="action" value="addcomment">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">  
                    <?php echo $_SESSION['username'].', '; ?>
                    please leave a comment
                </div>
			</div>
			<div class="form-group">
                <div class="col-sm-10">
					<select class="custom-select mr-sm-2" id="rating" name="rating">
						<option selected>Product star Rating</option>
						<option value="1">One</option>
						<option value="2">Two</option>
						<option value="3">Three</option>
						<option value="4">Four</option>
						<option value="5">Five</option>
					</select>
				</div>
			</div>
            <div class="form-group">
                <div class="col-sm-10">
                    <textarea class="form-control" name="commenttxt" id="commenttxt" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">                    
                    <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment" name=""><span class="glyphicon glyphicon-send"></span> Submit</button>
                </div>
            </div>            
        </form>
	</div>
</div>