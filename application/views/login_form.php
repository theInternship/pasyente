<div id="login_form">
	<h1>Please Login</h1>
	<?php
		echo form_open('login/validate_credentials');
		echo form_input('username','' , 'placeholder="Username"');
		echo form_password('password','','placeholder="Password"');
		echo form_submit('submit', 'Login');
		echo anchor('login/signup','Create Account');
	?>
</div>
