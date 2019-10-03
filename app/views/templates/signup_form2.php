<div class="container-fluid">
    <section class="container">
		<div class="container-page">				
			<div class="col-md-6">
				<h3 class="dark-grey">Registration</h3>

				<form action="https://ccboxing.esikolweni.co.za/register" method="POST">

					<div class="form-group col-lg-12">
						<p class="text-danger"><?php if(isset($error_message)){ echo $error_message;} ?></p>
					</div>
				
					<div class="form-group col-lg-12">
						<label>Username</label>
						<input type="" name="username" class="form-control" id="username" value="">
					</div>

					<div class="form-group col-lg-12">
						<label>First name</label>
						<input type="" name="name" class="form-control" id="first_name" value="">
					</div>

					<div class="form-group col-lg-12">
						<label>Last name</label>
						<input type="" name="surname" class="form-control" id="last_name" value="">
					</div>

					<div class="form-group col-lg-6">
						<label>Email Address</label>
						<input type="email" name="email" class="form-control" id="email" value="">
					</div>	
					
					<div class="form-group col-lg-6">
						<label>Password</label>
						<input type="password" name="password" class="form-control" id="password" value="">
					</div>		
				
				</div>
			
				<div class="col-md-6">
					<button type="submit" value="submit" class="btn btn-primary">Register</button>
				</div>
			</form>
		</div>
	</section>
</div>