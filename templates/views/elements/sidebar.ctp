<?php
	// fallback for errors
	if( !isset($section) ) {
		$section = '';
	}
?>
<ul class="nav nav-sidebar">
	<li class="<?php echo $section == 'Dashboard' ? 'active' : ''; ?>">
		<a href="<?php echo Router::url(array('controller' => 'dashboard', 'action' => 'home')); ?>">
			<i class="fa fa-dashboard fa-fw"></i> 
			<?php echo __d('cms', 'Dashboard'); ?>
		</a>
	</li>
</ul>
<hr>
<ul class="nav nav-sidebar">
	<li>
		<a href="<?php echo Router::url(array('controller' => 'auth', 'action' => 'profile')); ?>">
			<i class="fa fa-user fa-fw"></i>
			<?php echo __d('cms', 'My Account'); ?>
		</a>
	</li>
	<li>
		<a href="<?php echo Router::url(array('controller' => 'auth', 'action' => 'logout')); ?>">
			<i class="fa fa-power-off fa-fw"></i>
			<?php echo __d('cms', 'Logout'); ?>
		</a>
	</li>
</ul>