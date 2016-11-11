<!-- Main Page -->
<div class="jumbotron">
	<div class="container-fluid">
		<div class="row">
			<!-- Main -->
			<div class="col-xs-8 col-md-9">
				<div class="container-fluid">
					<div class="row">
						<?php foreach ($image_list as $image): ?>
							<div class='col-sm-6 col-md-4 gallery-img'>
								<div class='thumbnail'>
									<img src="<?php echo base_url().'uploads/'.str_replace('.','_thumb.',$image->url_image) ?>">
									<figcaption class="img-title">
										<a href="<?php echo base_url().'image/'.underscore($image->name_image)?>" ><div><h4><?php echo $image->name_image?></h4></div></a>
										<a href="<?php echo base_url().'gallery/delete/'.$image->id_image?>"><h4 class="remove"><span class="glyphicon glyphicon-remove"></span></h4></a>
									</figcaption>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<nav>
					<ul class="pager">
						<?php echo $pagination ?>
					</ul>
				</nav>
			</div>
			<!-- Sidebar -->
			<div class="col-xs-6 col-md-3 sidebar navbar navbar-default">
				<div class="container-fluid">
			<!-- 		<form action="<?php echo base_url()?>search" method="GET">
						<div class="form-group">
							<input type="text" class="form-control search_image" placeholder="Search" name="search">
						</div>
					</form> -->
					<ol class="breadcrumb hash">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsecategories" aria-expanded="false" aria-controls="collapseTwo">Categories</a>

						<div id="collapsecategories" class="panel-collapse collapse">
							<ul class="category">
								<?php
								foreach ($category as $row) {
									echo "<a href=".base_url().'category/'.$row->name_category."><li>".$row->name_category."</li></a>";
								}
								?>
							</ul>
						</div>
					</ol>
					<ol class="breadcrumb hash">
						<?php
						foreach ($tag as $row) {
							echo "<a href=".base_url().'tag/'.$row->name_tag.'>'.$row->name_tag.'</a>';
						}
						?>
					</ol>
				</div>
			</div>
		</div>
	</div>
</div>