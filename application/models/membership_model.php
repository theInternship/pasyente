<?php

	class Membership_model extends CI_Model{

		function validate(){

			$this->db->where('username', $this->input->post('username'));
			$this->db->where('password',md5($this->input->post('password')));
			$query=$this->db->get('users');

			if($query->num_rows == 1){
				return true;
			}
		}

		function create_member(){

			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email_address'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);

			$insert = $this->db->insert('users', $new_member_insert_data);
			return $insert;
		}

		function checkUsername($username){

			$this->db->where('username', $username);
			$query=$this->db->get('users');

			if($query->num_rows == 1)			
				return true;

			return false;
		}


		function checkEmail($email){

			$this->db->where('email', $email);
			$query=$this->db->get('users');

			if($query->num_rows == 1)
				return true;

			return false;
		}

		function get_member_details($id=false){
			if($id){
				//Set Active record to the current session's username
				if($this->session->userdata('username'))
					$this->db->where('username',$this->session->userdata('username'));
				else
					return false; // Return a non logged in person from accessing member profile dashboard
			}
			else{
				 //get the user by id
				$this->db->where('id',$id);
			}
			//Find all records that match this query
			$query = $this->db->get('users');
			if($query->num_rows == 1){
				$data['id'] = $query->id;
				$data['first_name'] = $query->first_name;
				$data['last_name'] = $query->last_name;

				return $data;
			}

			else{
				return false;
			}
		}
	}