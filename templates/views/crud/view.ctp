<?php 
	$navigation = array(
		array(
			'icon' => 'fa fa-dashboard',
			'url' => Router::url(array('controller' => 'dashboard', 'action' => 'home')),
			'text' => __d('cms', 'Dashboard')
		),
		array(
			'icon' => 'fa fa-flag-checkered',
			'url' => Router::url(array('action' => 'index')),
			'text' => __d('cms', 'Races')
		),
		array(
			'text' => $race['Race']['name']
		)
	);
	
	$dateFormat = '%d/%m/%Y %l:%M %p';
?>

<?php echo $this->Theme->breadcrumbs($navigation); ?>

<div class="races">

	<h2 class="page-header">
		<i class="fa fa-flag-checkered"></i>
		<?php echo __d('cms', 'Races'); ?>
		<small><?php echo h($race['Race']['name']); ?></small>
	</h2>

	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<h3 class="panel-title pull-left"><?php echo $race['Race']['name']; ?></h3>
			<div class="btn-group pull-right">
				<a href="<?php echo $this->Html->url(array('action' => 'edit', $race['Race']['id'])); ?>" 
				   class="btn btn-default btn-sm">
					<i class="fa fa-edit"></i>
					<?php echo __d('cms', 'Edit'); ?>
				</a>
				<a href="<?php echo $this->Html->url(array('action' => 'delete', $race['Race']['id'])); ?>" 
				   class="btn btn-default btn-sm" data-confirm="<?php echo __d('cms', 'Are you sure you want to delete this Race?'); ?>">
					<i class="fa fa-trash"></i>
					<?php echo __d('cms', 'Delete'); ?>
				</a>
			</div>
		</div>
		<div class="panel-body">
			
			<h3 class="page-header"><?php echo __d('cms', 'Race Info'); ?></h3>
			
			<?php if($race['Race']['race_type_id']): ?>
			<div class="form-group">
				<label><?php echo __d('cms', 'Race Type'); ?>:</label>
				<div><?php echo $race['Type']['name']; ?></div>
			</div>
			<?php endif; ?>

			<?php if($race['Race']['category']): ?>
			<div class="form-group">
				<label><?php echo __d('cms', 'Event Type'); ?>:</label>
				<div><?php echo $race['Race']['category']; ?></div>
			</div>
			<?php endif; ?>
			
			<?php if($race['Race']['sponsor_id']): ?>
			<div class="form-group">
				<label><?php echo __d('cms', 'Sponsor'); ?>:</label>
				<div><?php echo $race['Sponsor']['name']; ?></div>
			</div>
			<?php endif; ?>
			
			<?php if($race['Race']['description']): ?>
			<div class="form-group">
				<label><?php echo __d('cms', 'Description'); ?>:</label>
				<div><?php echo $race['Race']['description']; ?></div>
			</div>
			<?php endif; ?>
			
			<?php if($race['Race']['location']): ?>
			<div class="form-group">
				<label><?php echo __d('cms', 'Location'); ?>:</label>
				<div><?php echo $race['Race']['location']; ?></div>
			</div>
			<?php endif; ?>
			
			<?php if($race['Race']['race_date']): ?>
			<div class="form-group">
				<label><?php echo __d('cms', 'Race Date'); ?>:</label>
				<div><?php echo $this->Time->format($race['Race']['race_date'], $dateFormat); ?></div>
			</div>
			<?php endif; ?>
			
			<?php if($race['Race']['image']): ?>
			<div class="form-group">
				<label><?php echo __d('cms', 'Map Image'); ?></label>
				<div>
					<a href="<?php echo $race['Race']['image']; ?>" target="_blank">
						<img src="<?php echo $race['Race']['image']; ?>" width="300" />
					</a>
				</div>
			</div>
			<?php endif; ?>
			
			
			<h3 class="page-header"><?php echo __d('cms', 'Race Enrollment and Pickup'); ?></h3>
			
			<?php if($race['Race']['enrollment_start_date'] || $race['Race']['enrollment_end_date']): ?>
			<div class="form-group">
				<label><?php echo __d('cms', 'Enrollment Date'); ?>:</label>
				<div>
					<?php
						$startDate = $this->Time->format($race['Race']['enrollment_start_date'], $dateFormat);
						$endDate = $this->Time->format($race['Race']['enrollment_end_date'], $dateFormat);
						$dates = array_filter(array($startDate, $endDate));
						echo implode(" - ", $dates);
					?>
				</div>
			</div>
			<?php endif; ?>
			
			<?php if($race['Race']['enrollment_url']): ?>
			<div class="form-group">
				<label><?php echo __d('cms', 'Enrollment URL'); ?>:</label>
				<div><?php echo $this->Text->autoLink($race['Race']['enrollment_url'], array('target' => '_blank')); ?></div>
			</div>
			<?php endif; ?>
			
			<?php if($race['Race']['pickup_material_start_date'] || $race['Race']['pickup_material_end_date']): ?>
			<div class="form-group">
				<label><?php echo __d('cms', 'Pickup Material Date'); ?>:</label>
				<div>
					<?php
						$startDate = $this->Time->format($race['Race']['pickup_material_start_date'], $dateFormat);
						$endDate = $this->Time->format($race['Race']['pickup_material_end_date'], $dateFormat);
						$dates = array_filter(array($startDate, $endDate));
						echo implode(" - ", $dates);
					?>
				</div>
			</div>
			<?php endif; ?>
			
			<?php if($race['Race']['enrollment_cost']): ?>
			<div class="form-group">
				<label><?php echo __d('cms', 'Enrollment Cost'); ?></label>
				<div><?php echo number_format($race['Race']['enrollment_cost'], 2); ?>
			</div>
			<?php endif; ?>
			
		</div>
	</div>
	
</div>