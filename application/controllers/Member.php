<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * @author          Satria, Samstudio.inc
 * @license         None
 * @link            https://github.com/satryaway/OlehOlehBali-api
 */
class Member extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['member_get']['limit'] = 500; // 500 requests per hour per user/key
        //$this->methods['member_post']['limit'] = 100; // 100 requests per hour per user/key
        //$this->methods['member_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function member_get($id=0)
    {
		$response = array();
		$data = array();
		
		if ($id !== NULL) {
			$query = $this->db->query("SELECT * FROM member WHERE member_id = '$id'");
            if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
				array_push($data, array(
                        'id' => $row->member_id,
                        'name' => $row->member_name,
						'email' => $row->member_email,
						'phone' => $row->member_phone,
						'address' => $row->member_address,
						'kec' => $row->member_kec,
						'kab' => $row->member_kab,
						'prov' => $row->member_prov,
						'reward_point' => $row->member_reward_point,
						'commission' => $row->member_commission,
						'transaction_total' => $row->member_transaction_total,
						'unit_link_total' => $row->member_unit_link_total,
						'parent_unit' => $row->member_parent_unit,
						'transaction_history' => $row->member_transaction_history
						));
				}
				$response['status'] = 1;
                $response['message'] = "Data retreived";
                $response['return_data'] = $data;
				$this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			} else {
				$response['status'] = 0;
                $response['message'] = "Member not found";                 
				$this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
		} 
    }

}
