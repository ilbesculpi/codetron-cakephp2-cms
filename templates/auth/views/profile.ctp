<?php 
	$navigation = array(
		array(
			'icon' => 'fa fa-dashboard',
			'url' => Router::url(array('controller' => 'dashboard', 'action' => 'home')),
			'text' => __d('cms', 'Dashboard')
		),
		array(
			'icon' => 'fa fa-user fa-fw',
			'url' => Router::url(array('action' => 'index')),
			'text' => __d('cms', 'My Account')
		),
		array(
			'text' => $this->fetch('subtitle')
		)
	);
?>

<?php echo $this->Theme->breadcrumbs($navigation); ?>

<div class="myaccount">

	<h2 class="page-header">
		<i class="fa fa-user"></i>
		<?php echo __d('cms', 'My Account'); ?>
		<small><?php echo $this->fetch('subtitle'); ?></small>
	</h2>

	<div class="panel panel-default">
		
			<div class="panel-body">
				<?php $username = $this->Session->read ($admin['Admin']['name']); ?>

				<div class="form-group col-md-8">
					<label for="name"><?php echo __d('cms', 'Name'); ?>:</label>
					<div><?php echo $username['Auth']['User']['name']; ?></div>
				</div>

				<div class="form-group col-md-8">
					<label for="role"><?php echo __d('cms', 'Role'); ?>:</label>
					<div><?php echo $username['Auth']['User']['role']; ?></div>
				</div>

				<div class="form-group col-md-8">
					<label for="email"><?php echo __d('cms', 'Email'); ?>:</label>
					<div><?php echo $username['Auth']['User']['email']; ?></div>
				</div>
			</div>
		
	</div>
			
</div>