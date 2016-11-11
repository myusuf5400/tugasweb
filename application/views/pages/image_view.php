<!-- Main Page -->
<div class="jumbotron">
	<div class="container-fluid">
		<div class="row">
			<!-- Main -->
			<div class="col-xs-8 col-md-9">
				<div class="container-fluid">
					<!-- <h3><?php echo $image->name_image; ?></h3> -->
					<div class="image-viewer">
						<div>
							<img src="<?php echo base_url().'uploads/'.$image->url_image;?>">
						</div>
					</div>

					<!-- <div class="image-viewer">
						<?php foreach($image_category as $image_c):?>
							<p><?php echo $image_c->name_category?>
						<?php endforeach?>
					</div> -->
					<!-- Comment -->
					<div class="container-fluid comment">
					<?php if($this->login_library->is_logged()){?>
						<form id="formComment" class="form-horizontal" method="POST" action="<?php echo base_url(); ?>comment/add_comment">
							<div class="input-group">
								<input type="text" value="<?php echo $image->id_image?>" name="id_image" style="display: none">
								<textarea class="form-control" rows="2" name="comment"></textarea>
								<button class="btn btn-default btn-comment">Comment</button>
							</div>
						</form>
						<?php }else{?>
						<a data-target=".signin" data-toggle="modal" href=""><button class="btn btn-default login-comment">Login</button></a>
						<?php }?>
						<?php foreach ($comment as $row):?>
							<div class="container-comment">
								<img src="<?php echo base_url().'uploads/'.$row->url_avatar?>" width="75px" height="75px" class="img-circle">
								<div class="popover fade right in">
									<div class="arrow" style="top: 50%;"></div>
									<div class="popover-content">
										<timestamp><?php echo $row->timestamp_created?></timestamp>
										<comment><?php echo $row->comment?></comment>
									</div>
								</div>
							</div>
						<?php endforeach?>
					</div>
				</div>
			</div>

			<!-- Sidebar -->
			<div class="col-xs-6 col-md-3 sidebar navbar navbar-default">
				<div class="container-fluid">

					<h4><?php echo $image->name_image; ?></h4>
					<user>by <?php echo $image->username ?></user>
					<time>at <?php echo $image->timestamp_created?></time>
					<description><?php echo $image->description; ?></description>

					<ol class="breadcrumb hash">
						<?php foreach($image_category as $row):?>
							<a href="<?php echo base_url().'category/'.$row->name_category?>"><?php echo $row->name_category ?></a>
						<?php endforeach?>
					</ol>
					<ol class="breadcrumb hash">
						<?php foreach($image_tag as $row):?>
							<a href="<?php echo base_url().'tag/'.$row->name_tag?>"><?php echo $row->name_tag ?></a>
						<?php endforeach?>
					</ol>
				</div>
			</div>
		</div>
	</div>
</div>