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
		}

    }

}
