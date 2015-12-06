<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * @author          Satria, jixstreet.com
 * @license         None
 * @link            https://github.com/satryaway/OlehOlehBali-api
 */
class Transaction extends REST_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function transaction_post()
    {

		$name = $this -> post('name');
		$email = $this -> post('email');
		$phone = $this -> post('phone');
		$address = $this -> post('address');
		$kec = $this -> post('kec');
		$kab = $this -> post('kab');
		$prov = $this -> post('prov');
		$postal_code = $this -> post('postal_code');
		$product_id = $this -> post('product_id');
		$qty = $this -> post('qty');
		$total = $this -> post('total');

		$query = $this->db->query("
                INSERT INTO `transaction` (
                    `transaction_id`,
                    `name`,
                    `email`,
                    `phone`,
                    `address`,
                    `kec`,
                    `kab`,
                    `prov`,
                    `postal_code`,
                    `total`
                ) VALUES (
                    NULL,
                    '$name',
                    '$email',
                    '$phone',
                    '$address',
                    '$kec',
                    '$kab',
                    '$prov',
                    '$postal_code',
                    '$total'
                )");

		$transaction_id = $this->db->insert_id();
		if ($this->db->affected_rows() == 1) {
			for ($i = 0; $i < count($product_id); $i++)
			{
				$prod_id = $product_id[$i];
				$quantity = $qty[$i];

				$q = $this->db->query("
					INSERT INTO `item` (
							`transaction_id`,
							`product_id`,
							`qty` 
							) VALUES (
							'$transaction_id',
							'$prod_id',
							'$quantity'
						)");
			}

			$config = Array(
			'protocol' => 'smtp',
 		   	'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
  			'smtp_user' => 'satryaway@gmail.com',
  			'smtp_pass' => 'key4-gm41l',
   			'mailtype'  => 'html', 
   			'charset'   => 'iso-8859-1'
			);

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('satryaway@gmail.com', 'Euyyy');
            $this->email->to('satryaway@gmail.com');
            $this->email->subject('Transaksi Oleh-oleh Bali');
            $emailContent = "Hello";
            $this->email->message($emailContent);

            if ($this->email->send()) {
				$response['status'] = 1;
                $response['message'] = "Your order has been completed";
			} else {
                $response['status'] = 0;
                $response['message'] = "Failed to make an order, please try again later";
			}

            $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}

    }

}
