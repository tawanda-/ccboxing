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
	</div>
</div>