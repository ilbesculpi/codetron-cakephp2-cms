<div class="login">
	<div class="row">
		<div id="login" class="col-md-6 col-md-offset-3">
			<?php echo $this->Session->flash(); ?>
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo __d('cms', 'Reset Password'); ?></h3>
				</div>
				<div class="panel-body">
					<form method="post" role="form">
						<fieldset>
							<div class="form-group form-group-lg">
								<input class="form-control" placeholder="Email" name="email" type="email" autofocus />
							</div>
							<div class="form-group form-group-lg">
								<input type="submit" class="btn btn-primary btn-block" value="<?php echo __d('cms', 'Send'); ?>" />
							</div>
						</fieldset>
					</form>
					<p>
						<a href="login"><?php echo __d('cms', 'Back'); ?></a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>