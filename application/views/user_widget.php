<code style="font-family: Monaco, Verdana, Sans-serif;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;">
		<?php echo 'here' ?>
		<?php echo $first_name.''.$last_name; ?> $middot;
		<?php echo anchor('site/dashboard','Dashboard'); ?>|
		<?php echo anchor('site/search_patient','Search Patient'); ?> |
		<?php echo anchor('site/add_patient','Add New Patient'); ?> |
		<?php echo anchor('site/calendar','Calendar'); ?> |
		<?php echo anchor('site/billing','Billing'); ?> |
		<?php echo anchor('site/reports','Reports'); ?> |
		<?php echo anchor('site/profile','Profile'); ?> |
		<?php echo anchor('site/signoff','Logout'); ?>
	</code>