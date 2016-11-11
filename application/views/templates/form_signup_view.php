<div class="modal fade bs-example-modal-sm signup" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-signup">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
				<h4 class="modal-title" id="myLargeModalLabel">Signup</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="alert alert-danger" role="alert" id="messegeSignup">
						</div>
						<form id="formSignup" class="form-horizontal" action="<?php echo base_url(); ?>signup">
							<input type="text" value="true" name="verified" style="display: none">
							<div class="form-group">
								<label for="inputFirstName" class="col-sm-4 control-label">First Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="firstname">
								</div>
							</div>
							<div class="form-group">
								<label for="inputLastName" class="col-sm-4 control-label">Last Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="lastname">
								</div>
							</div>
							<div class="form-group">
								<label for="inputUsername" class="col-sm-4 control-label">Username</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-4 control-label">Password</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassConf" class="col-sm-4 control-label">Password Confirmation</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" id="inputPassConf" placeholder="Password Confirmation" name="passconf">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="col-sm-4 control-label">Email</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button class="btn btn-default">Sign up</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div>
</div>