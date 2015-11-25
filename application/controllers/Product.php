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
                        'name' => $row->name,
						'description' => $row->description,
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

}
