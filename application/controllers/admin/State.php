<?php
	defined('BASEPATH') or exit('error');

	/**
	* 
	*/
	class State extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/State_m','stm');
			$this->load->helper('form');
			$this->load->helper('dataicon');
			if(!$this->ss->AdminId)
				redirect('admin/Login');
		}

		public function index()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/datatable_state_v');
			$this->load->view('admin/footer');
		}

		public function add_state()
		{
			$this->fv->set_rules('aStateName','State Name','trim|required|min_length[3]|max_length[20]|alpha');
			if($this->fv->run()==FALSE)
			{
				$this->load->view('admin/header');
				$this->load->view('admin/datatable_state_v');
				$this->load->view('admin/footer');
			}
			else
			{
				$state_data=[
					'StateName'=>$this->input->post('aStateName'),
				];
				$this->stm->add_state_m($state_data);
				redirect('admin/State');
			}
		}

		public function get_state()
		{
			$state_data=$this->stm->get_state_m();
			echo json_encode(['aaData'=>$state_data]);
		}

		public function get_state_to_update($id)
		{
			$stid=[
				'StateId'=>$id
			];

			$data['state_data']=$this->stm->get_state_to_update_m($stid);

			/*echo "<pre>";
			print_r($data);
			die('hello');*/

			$this->load->view('admin/header');
			$this->load->view('admin/update_state_v',$data);
			$this->load->view('admin/footer');
		}

		public function update_state($id)
		{
			$this->fv->set_rules('uStateName','State Name','trim|required|min_length[3]|max_length[20]|alpha');
			if($this->fv->run()==FALSE)
			{
				$this->get_state_to_update($id);
			}
			else
			{
				$state_data_old=[
					'StateId'=>$id
				];
				$state_data_new=[
					'StateName'=>$this->input->post('uStateName'),
				];
				$this->stm->update_state_m($state_data_old,$state_data_new);
				redirect('admin/State');
			}	
		}
	}
?>