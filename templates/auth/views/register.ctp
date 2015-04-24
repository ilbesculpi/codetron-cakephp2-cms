<div class="register">
	
	<?php print $this->Session->flash('flash'); ?>

	<div class="row">
		<div class="text-center">
			<img class="logo" src="/logo.png" alt="{{ CMS }}" />
			<h1>{{ CMS }}</h1>
		</div>
	</div>

	<div class="row">
		<div class="well col-sm-6 col-sm-offset-3">
			<form class="form" method="post">
				<fieldset>
					<legend><?php echo __d('cms', 'Registration'); ?></legend>
					<div class="form-group">
						<label for="name"><?php echo __d('cms', 'Name'); ?></label>
						<input type="text" class="form-control" id="name" name="data[Admin][name]" placeholder="<?php echo __d('cms', 'Name'); ?>" required />
					</div>
					<div class="form-group">
						<label for="email"><?php echo __d('cms', 'Email'); ?></label>
						<input type="email" class="form-control" id="email" name="data[Admin][email]" placeholder="user@example.com" required />
					</div>
					<div class="form-group">
						<label for="password"><?php echo __d('cms', 'Password'); ?></label>
						<input type="password" class="form-control" id="password" name="data[Admin][password]" placeholder="<?php echo __d('cms', 'Password'); ?>" />
					</div>
					<div class="form-group">
						<label for="passwordConfirm"><?php echo __d('cms', 'Password Confirm'); ?></label>
						<input type="password" class="form-control" id="passwordConfirm" name="data[Admin][passwordConfirm]" placeholder="<?php echo __d('cms', 'Password'); ?>" />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary"><?php echo __d('cms', 'Create Account'); ?></button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
    
	<div class="row text-center">
		<p><?php echo __d('cms', 'Already have an account?'); ?> <a href="login"><?php echo __d('cms', 'Sign in here'); ?></a></p>
	</div>
	
</div>