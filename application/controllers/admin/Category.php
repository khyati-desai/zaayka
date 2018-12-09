<?php
	defined('BASEPATH') or exit('error');

	/**
	* 
	*/
	class Category extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Category_m','cm');
			$this->load->helper('form');
			$this->load->helper('dataicon');
			if(!$this->ss->AdminId)
				redirect('admin/Login');
		}

		public function index()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/datatable_category_v');
			$this->load->view('admin/footer');
		}

		public function add_category()
		{
			$this->fv->set_rules('aCategoryName','Category Name','trim|required|min_length[3]|max_length[20]|alpha');
			if($this->fv->run()==FALSE)
			{
				$this->load->view('admin/header');
				$this->load->view('admin/datatable_category_v');
				$this->load->view('admin/footer');
			}
			else
			{
				$category_data=[
					'CategoryName'=>$this->input->post('aCategoryName'),
					'AddedByAdminId'=>$this->ss->AdminId
				];
				$this->cm->add_category_m($category_data);
				redirect('admin/Category');
			}
		}

		public function get_category()
		{
			$category_data=$this->cm->get_category_m();
			echo json_encode(['aaData'=>$category_data]);
		}

		public function toggle_status($id)
		{
			$cid=[
				'CategoryId'=>$id
			];
			$this->cm->toggle_status_m($cid);
		}

		public function get_category_to_update($id)
		{
			$cid=[
				'CategoryId'=>$id
			];

			$data['category_data']=$this->cm->get_category_to_update_m($cid);

			/*echo "<pre>";
			print_r($data);
			die('hello');*/

			$this->load->view('admin/header');
			$this->load->view('admin/update_category_v',$data);
			$this->load->view('admin/footer');
		}

		public function update_category($id)
		{
			$this->fv->set_rules('uCategoryName','Category Name','trim|required|min_length[3]|max_length[20]|alpha');
			if($this->fv->run()==FALSE)
			{
				$this->get_category_to_update($id);
			}
			else
			{
				$category_data_old=[
					'CategoryId'=>$id
				];
				$category_data_new=[
					'CategoryName'=>$this->input->post('uCategoryName'),
				];
				$this->cm->update_category_m($category_data_old,$category_data_new);
				redirect('admin/Category');
			}	
		}
	}
?>