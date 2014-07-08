<?php

	class Login extends CI_Controller{

		function index(){

			$data['main_content'] = 'login_form';
			$this->load->view('includes/template', $data);
		}

		function validate_credentials(){

			$this->load->model('membership_model');
			$query=$this->membership_model->validate();

			// if user's credentials validated..
			if($query){
				$data=array(
						'username' => $this->input->post('username'),
						'is_logged_in' => TRUE
					);

				$this->session->set_userdata($data);
				redirect('site/dashboard');
			}

			else{
				$this->index();
			}
		}

		public function signoff(){
				$newdata=array(
						'username' => '',
						'is_logged_in' => FALSE
					);
				$this->session->unset_userdata($newdata);
				$this->session->sess_destroy();
				$this->index();
		}

		function signup(){

			$data['main_content'] = 'signup_form';
			$this->load->view('includes/template', $data);
		}

		function create_member(){

			$this->load->library('form_validation');
			//field name, error message, validation rules

			$this->form_validation->set_rules('first_name','First Name','trim|required');
			$this->form_validation->set_rules('last_name','Last Name','trim|required');
			$this->form_validation->set_rules('email_address','Email Address','trim|required|valid_email|callback_checkEmail');

			$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|callback_checkUsername');
			$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('con_password','Password Confirmation','trim|required|matches[password]');

			if($this->form_validation->run() == FALSE){
				$this->signup();
			} 
			else{
				$this->load->model('membership_model');
				if($query = $this->membership_model->create_member()){
					$data ['main_content'] = 'signup_successful';
					$this->load->view('includes/template',$data);
				}
				else{
                                    $error = validation_errors();
					$this->load->view('signup_form', $error);
				}
			}
		}

		function checkUsername(){

			$tmpusername = $this->input->post('username');
			$this->load->model('membership_model');

			if($this->membership_model->checkUsername($tmpusername))
				return false;

			return true;
		}

		function checkEmail(){

			$tmpemail = $this->input->post('email_address');
			$this->load->model('membership_model');

			if($this->membership_model->checkEmail($tmpemail))
				return false;

			return true;
		}

		function cp(){

			if($this->session->userdata('username')){
				//load the model for this controller
				$this->load->model('membership_model');
				//Get user data from db
				$user = $this->membership_model->get_member_details();
				if(!$user){
					return false; //No user found
				}
				else{
					$this->load->view('user_widget', $user); //display our widget
				}

			}

			else{
				//There is no session so we return nothing
				return false;
			}
		}
	}
?>