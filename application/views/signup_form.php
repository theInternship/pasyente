<h1>Create an Account</h1>

<fieldset>
	<legend>Personal Information</legend>

	<?php

		echo form_open('login/create_member');
		echo form_input('first_name',set_value('first_name',''),'placeholder="First Name"');
		echo form_input('last_name',set_value('last_name',''),'placeholder="Last Name"');
		echo form_input('email_address',set_value('email_address', ''),'placeholder="Email Address"');
	?>
</fieldset>

<fieldset>
	<legend>Login Info</legend>

	<?php

            	echo form_input('username', set_value('username', ''),'placeholder="Username"');
		echo form_password('password', '','placeholder="Password"');
		echo form_password('con_password', '', 'placeholder="Confirm Password"');

		echo form_submit('submit', 'Create Account');
	?>

	<?php echo validation_errors('<p class="error">'); ?>

</fieldset>
