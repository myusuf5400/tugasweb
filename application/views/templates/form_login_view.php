<div class="modal fade bs-example-modal-sm signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-login">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
				<h4 class="modal-title" id="myLargeModalLabel">Sign in</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="alert alert-danger" role="alert" id="messegeLogin">
						</div>
						<form id="formLogin" class="form-horizontal" action="<?php echo base_url(); ?>login">
							<input type="text" value="true" name="verified" style="display: none">
							<div class="form-group">
								<label for="inputUsername" class="col-sm-4 control-label">Username</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="username" placeholder="Username">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-sm-4 control-label">Password</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button class="btn btn-default">Sign in</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div>
</div>