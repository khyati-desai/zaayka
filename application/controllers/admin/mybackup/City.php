<?php
	defined('BASEPATH') or die('error');

	/**
	* 
	*/
	class City extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/City_m','ctm');
			$this->load->helper('form');
			$this->load->helper('dataicon');
			if(!$this->ss->AdminId)
				redirect('admin/Login');
		}

		public function index($id=FALSE)
		{
			if($id != FALSE)
			{
				//$data['subcategoryid']=$id;//it is category id
				$st_id=[
					'StateId'=>$id
				];
				$data['my_state']=$this->ctm->get_state_m($st_id);
			}
			else
			{
				$data['states']=$this->ctm->get_state_m();
			}
			$this->load->view('admin/header');
			$this->load->view('admin/datatable_city_v',$data);
			$this->load->view('admin/footer');
		}

		public function add_city($id=FALSE)
		{
			$this->fv->set_rules('aCityName','City Name','trim|required|min_length[3]|max_length[20]|alpha');
			if($this->fv->run()==FALSE)
			{
				if($id != FALSE)
				{
					//$data['subcategoryid']=$id;//it is category id
					$st_id=[
						'StateId'=>$id
					];
					$data['my_state']=$this->ctm->get_state_m($st_id);
				}
				else
				{
					$data['states']=$this->ctm->get_state_m();
				}
				$this->load->view('admin/header');
				$this->load->view('admin/datatable_city_v',$data);
				$this->load->view('admin/footer');		
				}
			else
			{
				$city_data=[
					'CityName'=>$this->input->post('aCityName'),
				];
				if($id != FALSE)
				{
					$city_data['StateId']=$id;
					$this->ctm->add_city_m($city_data);
					redirect('admin/City/index/'.$id);
				}
				else
				{
					$city_data['StateId']=$this->input->post('aStateIdCombo');	
					$this->ctm->add_city_m($city_data);
					redirect('admin/City');
				}
			}
		}

		public function get_city($id=FALSE)
		{
			if($id != FALSE)
			{
				$state_id=[
					's.StateId'=>$id
				];
				$city_data=$this->ctm->get_city_m($state_id);
			}
			else
				$city_data=$this->ctm->get_city_m();
				echo json_encode(['aaData'=>$city_data]);
		}

		public function get_city_to_update($id)
		{
			$ct_id=[
				'CityId'=>$id
			];
			$data=$this->ctm->get_city_to_update_m($ct_id);
			/*echo "<pre>";
			print_r($data);
			die('hello');*/
			$this->load->view('admin/header');
			$this->load->view('admin/update_city_v',$data);
			$this->load->view('admin/footer');
		}

		public function update_city($id)
		{
			$this->fv->set_rules('uCityName','City Name','trim|required|min_length[3]|max_length[20]|alpha');
			if($this->fv->run()==FALSE)
			{
				$this->get_city_to_update($id);
			}
			else
			{
				$city_data_old=[
					'CityId'=>$id
				];
				$city_data_new=[
					'CityName'=>$this->input->post('uCityName'),
					'StateId'=>$this->input->post('uState'),
				];
				/*echo "<pre>";
				print_r($subcategory_data_old);
				print_r($subcategory_data_new);
				die('abc');*/
				$this->ctm->update_city_m($city_data_old,$city_data_new);
				redirect('admin/City/index/'.$city_data_new['StateId']);
			}
		}
	}
?>