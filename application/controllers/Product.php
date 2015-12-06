<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * @author          Satria, Samstudio.inc
 * @license         None
 * @link            https://github.com/satryaway/OlehOlehBali-api
 */
class Product extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['product_get']['limit'] = 500; // 500 requests per hour per user/key
        //$this->methods['product_post']['limit'] = 100; // 100 requests per hour per user/key
        //$this->methods['product_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function product_get()
    {
		$response = array();
		$data = array();
		
		$category = $this->get('c');
		
		if ($category !== NULL) {
			$query = $this->db->query("SELECT * FROM product WHERE category = '$category'");
            if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
				array_push($data, array(
                        'id' => $row->id,
						'category' => $row->category,
                        'name' => $row->name,
						'description' => $row->description,
						'specification' => $row->specification,
						'price' => $row->price,
						'stock' => $row->stock,
						'image' => $row->image,
						'created_time' => $row->created_time
						));
				}
				$response['status'] = 1;
                $response['message'] = "Data retreived";
                $response['return_data'] = $data;
				$this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			} else {
				$response['status'] = 0;
                $response['message'] = "Product not found";                 
				$this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
		} 
    }


    public function product_post() 
    {
    	$id = $this->post('id');
    	$category = $this->post('category');
    	$name = $this->post('name');
    	$description = $this->post('description');
    	$specification = $this->post('specification');
    	$price = $this->post('price');
    	$qty = $this->post('qty');
    	$isUpdate = $this->post('isUpdate');

    	if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) 
		{
				$filename = uniqid();
				$config['upload_path'] = "./assets/images/";
				$config['file_name'] = $filename;
				$config['allowed_types'] = "gif|jpg|png|jpeg";
				$config['max_size'] = '5120';
				$config['overwrite'] = false;
				
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('image')) {
					$upload_data = $this->upload->data();
					$_POST['image'] = $upload_data;

					$filename = $upload_data['file_name'];
					$ext = end((explode(".",$filename)));

					$image = $config['file_name'].'.'.$ext;
				} else {
					//$error = array('error' => $this->upload->display_errors());
					$error = array('error' => $this->upload->file_type);
					//$error = array('error' => $this->response($_FILES));
					//$data['message']="error =".$error['error'];
					//continue;  

				$response['status'] = 0;
				$response['message'] = $error['error'];
				$this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
				}
		} 
		else 
		{
			$image = "";
		}

		$syntax;
		$message;

		if ($isUpdate == false) 
		{
			$syntax = " INSERT INTO `product` (
						`category`,
						`name`,
						`description`,
						`specification`,
						`price`,
						`stock`,
						`image`
					) VALUES (
						'$category',
						'$name',
						'$description',
						'$specification',
						'$price',
						'$qty',
						'$image'
					)";
			$message = "You have successfully inputted a product";
		}
		else
		{
			$updatingQuery = "";
			if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) 
			{
				$updatingQuery = "`image` = '$image',";
			}

			$syntax = "UPDATE `product` SET 
						`category` = '$category',
						`name`= '$name',
						`description` = '$description',
						`specification` = '$specification',
						`price` = '$price',
						".$updatingQuery."
						`stock` = '$qty'
						WHERE id = $id
						";
			$message = "You have successfully updated a product";
		}

		$query = $this->db->query($syntax);

		if ($this->db->affected_rows() == 1) {
			$response['status'] = 1;
			$response['message'] = $message;
			$this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code	
		} else {
			$response['status'] = 0;
			$response['message'] = "Failed inputting or updating product";
			$this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
    }

}
