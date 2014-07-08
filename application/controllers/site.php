<?php

	class Site extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->is_logged_in();
		}

		function dashboard(){
			$this->load->view('dashboard');
		}

		function is_logged_in()
		{
		    $is_logged_in = $this->session->userdata('is_logged_in');
		 	
		    if(!isset($is_logged_in) || $is_logged_in != TRUE)
		    {
		        echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';   
		        die();     
		    }      
		}
	}
?>
