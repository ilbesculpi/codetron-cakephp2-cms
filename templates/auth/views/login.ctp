<div class="login">

	<div class="row">
		<div class="text-center">
			<img class="logo" src="/logo.png" alt="{{ CMS }}" />
			<h1>{{ CMS }}</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<?php print $this->Session->flash('flash'); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="well col-sm-6 col-sm-offset-3">
			<form class="form-horizontal" method="post">
				<fieldset>
					<legend><?php echo __d('cms', 'Log in'); ?></legend>
					<div class="form-group">
						<label for="email" class="col-lg-2 control-label"><?php echo __d('cms', 'Email'); ?></label>
						<div class="col-lg-10">
							<input type="email" class="form-control" id="email" name="data[Admin][email]" placeholder="user@example.com" value="<?php echo $admin['Admin']['email']; ?>" required />
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-lg-2 control-label"><?php echo __d('cms', 'Password'); ?></label>
						<div class="col-lg-10">
							<input type="password" class="form-control" id="password" name="data[Admin][password]" placeholder="Password" />
							<div class="checkbox">
								<label>
									<input id="remember" type="checkbox">
									<?php echo __d('cms', 'Remember me'); ?>
								</label>
							</div>							
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="submit" class="btn btn-primary"><?php echo __d('cms', 'Login'); ?></button>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<p><small><?php echo __d('cms', 'Don\'t have an account?'); ?> <a href="register"><?php echo __d('cms', 'Create one.'); ?></a></small></p>
						</div>
						<div class="col-sm-10 col-sm-offset-2">
							<p><small><?php echo __d('cms', 'Don\'t remember your password?'); ?> <a href="/cms/auth/forgot_password"><?php echo __d('cms', 'Recover password.'); ?></a></small></p>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

</div>