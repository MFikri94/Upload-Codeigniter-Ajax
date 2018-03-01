<?php
class Upload extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('upload_model');
	}

	function index(){
		$this->load->view('upload_view');
	}


	function do_upload(){
        $config['upload_path']="./assets/images";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload',$config);
	    if($this->upload->do_upload("file")){
	        $data = $this->upload->data();

	        //Resize and Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 600;
            $config['height']= 400;
            $config['new_image']= './assets/images/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

	        $title= $this->input->post('title');
	        $image= $data['file_name']; 
	        
	        $result= $this->upload_model->save_upload($title,$image);
	        echo json_decode($result);
        }

     }
	
}