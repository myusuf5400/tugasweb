<div class="modal fade bs-example-modal-sm setting" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-setting">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
				<h4 class="modal-title" id="myLargeModalLabel">Setting User</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-success" role="alert" id="messegeSetting"></div>
				<form id="formSetting" class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>user/update">
					<input type="text" value="true" name="verified" style="display: none">
					<div class="form-group">
						<label class="col-sm-2 control-label">Avatar</label>
						<input id="avatarfile" name="userfile" type="file" style="display: none">
						<div class="col-sm-9" style="display:table">
							<input type="text"  class="form-control" aria-describedby="basic-addon2" id="path-avatar" disabled="true">
							<span class="btn btn-default input-group-addon" id="basic-addon2" onclick="$('input[id=avatarfile]').click();">Browse</span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-9">
							<button class="btn btn-default">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div>
</div>