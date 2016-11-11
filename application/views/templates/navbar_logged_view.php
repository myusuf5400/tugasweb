<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<div class="navbar-brand">
				<span class="glyphicon glyphicon-fire"></span>
			</div>
			<ul class="nav navbar-nav hover">
				<li <?php if($title=='Home')echo "class='active'"?>>
				<?php if($title=='Home'){
					echo "<p class='navbar-text'>Home</p>";
				}else{
					echo "<a href=".base_url().">Home</a>";
				}?>
				</li>
				<li <?php if($title=='Gallery')echo "class='active'"?>>
				<?php if($title=='Gallery'){
					echo "<p class='navbar-text'>Gallery</p>";
				}else{
					echo "<a href=".base_url()."gallery>Gallery</a>";
				}?>
				</li>
				<li><a  data-target=".upload" data-toggle="modal" href="">Upload</a></li>
			</ul>
		</div>
		<ul class="nav navbar-nav navbar-right hover">
			<li class="dropdown member">
				<a  href="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Member</a>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li class="img-avatar"><img src="<?php echo base_url().'uploads/'.$this->login_library->get_avatar()?>" alt="..." class="img-circle" height="100px" width="100px"></li>	
					<li><a  data-target=".setting" data-toggle="modal" href="">Setting</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="<?php echo base_url()?>login/signout">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav><!-- /.container-fluid -->
