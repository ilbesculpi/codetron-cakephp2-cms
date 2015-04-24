
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
						<input type="hidden" name="id" value="<?php echo $user['Admin']['id']; ?>" />
						<input type="hidden" name="ch" value="<?php echo $ch; ?>" />
						<fieldset>
							<div class="form-group form-group-lg">
								<div class="form-control-static"><?php echo $user['Admin']['email']; ?></div>
							</div>
							<div class="form-group form-group-lg">
								<input type="password" class="form-control" name="password" placeholder="<?php echo __d('cms', 'New Password'); ?>" autofocus />
							</div>
							<div class="form-group form-group-lg">
								<input type="password" class="form-control" name="confirmPassword" placeholder="<?php echo __d('cms', 'Repeat Password'); ?>" />
							</div>
							<div class="form-group form-group-lg">
								<input type="submit" class="btn btn-primary btn-block" value="<?php echo __d('cms', 'Send'); ?>" />
							</div>
						</fieldset>
					</form>
					<p>
						<a href="login">Volver</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>