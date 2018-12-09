<?php
	defined('BASEPATH') or die('error');

	/**
	* 
	*/
	class Subcategory extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Subcategory_m','sm');
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
				$cat_id=[
					'CategoryId'=>$id
				];
				$data['my_category']=$this->sm->get_category_m($cat_id);
			}
			else
			{
				$data['categories']=$this->sm->get_category_m();
			}
			$this->load->view('admin/header');
			$this->load->view('admin/datatable_subcategory_v',$data);
			$this->load->view('admin/footer');
		}

		public function add_subcategory($id=FALSE)
		{
			$this->fv->set_rules('aSubCategoryName','Category Name','trim|required|min_length[3]|max_length[20]|alpha');
			if($this->fv->run()==FALSE)
			{
				if($id != FALSE)
				{
					//$data['subcategoryid']=$id;//it is category id
					$cat_id=[
						'CategoryId'=>$id
					];
					$data['my_category']=$this->sm->get_category_m($cat_id);
				}
				else
				{
					$data['categories']=$this->sm->get_category_m();
				}
				$this->load->view('admin/header');
				$this->load->view('admin/datatable_subcategory_v',$data);
				$this->load->view('admin/footer');		
				}
			else
			{
				$subcategory_data=[
					'SubCategoryName'=>$this->input->post('aSubCategoryName'),
					'AddedByAdminId'=>$this->ss->AdminId
				];
				if($id != FALSE)
				{
					$subcategory_data['CategoryId']=$id;
					$this->sm->add_subcategory_m($subcategory_data);
					redirect('admin/Subcategory/index/'.$id);
				}
				else
				{
					$subcategory_data['CategoryId']=$this->input->post('aCategoryIdCombo');	
					$this->sm->add_subcategory_m($subcategory_data);
					redirect('admin/Subcategory');
				}
			}
		}

		public function toggle_status($id)
		{
			$sid=[
				'SubcategoryId'=>$id
			];
			$this->sm->toggle_status_m($sid);
		}

		public function get_subcategory($id=FALSE)
		{
			if($id != FALSE)
			{
				$category_id=[
					's.CategoryId'=>$id
				];
				$subcategory_data=$this->sm->get_subcategory_m($category_id);
			}
			else
				$subcategory_data=$this->sm->get_subcategory_m();
				echo json_encode(['aaData'=>$subcategory_data]);
		}

		public function get_subcategory_to_update($id)
		{
			$sub_cat_id=[
				'SubcategoryId'=>$id
			];
			$data=$this->sm->get_subcategory_to_update_m($sub_cat_id);
			
			$this->load->view('admin/header');
			$this->load->view('admin/update_subcategory_v',$data);
			$this->load->view('admin/footer');
		}

		public function update_subcategory($id)
		{
			$this->fv->set_rules('uSubcategoryName','Subcategory Name','trim|required|min_length[3]|max_length[20]|alpha');
			if($this->fv->run()==FALSE)
			{
				$this->get_subcategory_to_update($id);
			}
			else
			{
				$subcategory_data_old=[
					'SubcategoryId'=>$id
				];
				$subcategory_data_new=[
					'SubcategoryName'=>$this->input->post('uSubcategoryName'),
					'CategoryId'=>$this->input->post('uCategory'),
				];
				/*echo "<pre>";
				print_r($subcategory_data_old);
				print_r($subcategory_data_new);
				die('abc');*/
				$this->sm->update_subcategory_m($subcategory_data_old,$subcategory_data_new);
				redirect('admin/Subcategory/index/'.$subcategory_data_new['CategoryId']);
			}
		}
	}
?>