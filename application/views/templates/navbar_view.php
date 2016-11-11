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
			</ul>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<ul class="nav navbar-nav hover">
				<li><a  data-target=".signup" data-toggle="modal" href="">Sign up</a></li>
				<li><a  data-target=".signin" data-toggle="modal" href="">Sign in</a></li>
			</ul>
		</ul>
	</div>
</nav><!-- /.container-fluid -->