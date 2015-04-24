<div class="welcome">

	<div class="row">
		<div class="text-center">
			<img class="logo" src="/logo.png" alt="EURunners" />
			<h1>{{ CMS }}</h1>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<?php print $this->Session->flash('flash'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h2 class="panel-title"><?php echo __d('cms', 'WELCOME TO %s', '{{ CMS }}'); ?></h2>
				</div>
				<div class="panel-body text-center">
					<a href="login">
						<img src="/cms/images/login.png" class="img-rounded" alt="<?php echo __d('cms', 'Log in'); ?>" />
						<?php echo __d('cms', 'Log in'); ?>
					</a>
				</div>
			</div>
		</div>
	</div>

</div>