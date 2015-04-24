<div class="dashboard">
	
	<h1 class="page-header">
        <i class="fa fa-dashboard"></i>
        <?php echo __d('cms', 'Dashboard'); ?>
    </h1>
	
	<div class="row text-center">
		<div class="col-sm-6 col-md-3 col-md-offset-1">
			<div>
				<a href="<?php echo Router::url(array('controller' => 'races', 'action' => 'index')); ?>">
					<img src="/cms/images/icons/flag68.png" alt="<?php echo __d('cms', 'Races'); ?>" class="icon" />
				</a>
			</div>
			<h2>
				<a href="<?php echo Router::url(array('controller' => 'races', 'action' => 'index')); ?>">
					<?php echo __d('cms', 'Races'); ?>
				</a>
			</h2>
		</div>
		<div class="col-sm-6 col-md-3">
			<div>
				<a href="<?php echo Router::url(array('controller' => 'sponsors', 'action' => 'index')); ?>">
					<img src="/cms/images/icons/money10.png" alt="<?php echo __d('cms', 'Sponsors'); ?>" class="icon" />
				</a>
			</div>
			<h2>
				<a href="<?php echo Router::url(array('controller' => 'sponsors', 'action' => 'index')); ?>">
					<?php echo __d('cms', 'Sponsors'); ?>
				</a>
			</h2>
		</div>
		<div class="col-sm-6 col-md-3">
			<div>
				<a href="<?php echo Router::url(array('controller' => 'runner_clubs', 'action' => 'index')); ?>">
					<img src="/cms/images/icons/shield36.png" alt="<?php echo __d('cms', 'Runner Clubs'); ?>" class="icon" />
				</a>
			</div>
			<h2>
				<a href="<?php echo Router::url(array('controller' => 'runner_clubs', 'action' => 'index')); ?>">
					<?php echo __d('cms', 'Runner Clubs'); ?>
				</a>
			</h2>
		</div>
		<div class="col-sm-6 col-md-3 col-md-offset-3">
			<div>
				<a href="<?php echo Router::url(array('controller' => 'recommendations', 'action' => 'index')); ?>">
					<img src="/cms/images/icons/recommendations.png" alt="<?php echo __d('cms', 'Recommendations'); ?>" class="icon" />
				</a>
			</div>
			<h2>
				<a href="<?php echo Router::url(array('controller' => 'recommendations', 'action' => 'index')); ?>">
					<?php echo __d('cms', 'Recommendations'); ?>
				</a>
			</h2>
		</div>
		<div class="col-sm-6 col-md-3">
			<div>
				<a href="<?php echo Router::url(array('controller' => 'quotes', 'action' => 'index')); ?>">
					<img src="/cms/images/icons/quotes.png" alt="<?php echo __d('cms', 'Quotes'); ?>" class="icon" />
				</a>
			</div>
			<h2>
				<a href="<?php echo Router::url(array('controller' => 'quotes', 'action' => 'index')); ?>">
					<?php echo __d('cms', 'Quotes'); ?>
				</a>
			</h2>
		</div>
	</div>
	
	<div class="row credits">
		<div class="col-sm-12 text-center">
			<div>
				Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> 
				from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>
				is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>
			</div>
		</div>
	</div>
	
</div>