<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Borrame1 extends CI_Controller {
    
	public function index()
	{
                //Load Helpers
                var_dump($_FILES);
                $this->load->helper('url');
                $this->load->helper('utility_helper');
                $datos =  array('tam' => (integer) $_SERVER['CONTENT_LENGTH'] );
                //Load Views
//		$this->load->view('welcome_message');
                $this->load->view('layouts/header.php');
                $this->load->view('layouts/navbar.php'); 
                $this->load->view('layouts/sidebar.php');
                $this->load->view('borrame1',$datos);
                $this->load->view('layouts/footer.php');
	}
}
