<div class="modal fade bs-example-modal-sm upload" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-upload">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
				<h4 class="modal-title" id="myLargeModalLabel">Upload Image</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger" role="alert" id="messegeUpload"></div>
				<form id="formUpload" class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>upload">
					<input type="text" value="true" name="verified" style="display: none">
					<div class="form-group">
						<label class="col-sm-2 control-label">Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="title" placeholder="Title">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-9">
							<textarea class="form-control" name="description" placeholder="Description"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-9">
							<div class="btn-group" data-toggle="buttons">
								<?php
								foreach ($category as $row) {
									echo "<label class='btn btn-default btn-category'>
									<input type='checkbox' autocomplete='off' name='checkbox-category[]' value=".$row->id_category.">".$row->name_category."
								</label>";
							}
							?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Tag</label>
					<div class="col-sm-9">
						<input type="text" class="form-control tag" name="tag" placeholder="tag">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Image</label>
					<input id="lefile" name="userfile" type="file" style="display: none">
					<div class="col-sm-9" style="display:table">
						<input type="text"  class="form-control" aria-describedby="basic-addon2" id="path-image" disabled="true">
						<span class="btn btn-default input-group-addon" id="basic-addon2" onclick="$('input[id=lefile]').click();">Browse</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-9">
						<button class="btn btn-default">Upload</button>
					</div>
				</div>
			</form>
		</div>
	</div><!-- /.modal-content -->
</div>
</div>