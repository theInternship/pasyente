<h1>Welcome Back, <?php  echo $this->session->userdata('username'); ?>!</h1>
<h4><?php echo anchor('login/signoff', 'Logout'); ?></h4>