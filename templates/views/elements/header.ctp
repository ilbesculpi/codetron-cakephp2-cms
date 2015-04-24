<div class="navbar navbar-default navbar-fixed-top header">
	<div class="container">
		<div class="navbar-header">
			<h1>
				<a href="<?php echo Router::url('/cms/dashboard'); ?>" class="navbar-brand">
					<img class="logo" src="/cms/logo.png" />
					CMS
				</a>
			</h1>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse" id="navbar-main">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo Router::url(array('plugin' => 'cms', 'controller' => 'auth', 'action' => 'profile')); ?>"><?php echo __d('cms', 'My Account'); ?></a></li>
				<li><a href="<?php echo Router::url(array('plugin' => 'cms', 'controller' => 'auth', 'action' => 'logout')); ?>"><?php echo __d('cms', 'Logout'); ?></a></li>
			</ul>
		</div>
	</div>
</div>