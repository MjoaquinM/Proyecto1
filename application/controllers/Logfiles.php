<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Logfiles extends CI_Controller {
    
	public function index()
	{
                //Load Helpers
                $this->load->helper('url');
                $this->load->helper('utility_helper');
                
                //Load Views
//		$this->load->view('welcome_message');
                $this->load->view('layouts/header');
                $this->load->view('layouts/navbar');
                $this->load->view('layouts/sidebar');
                $this->load->view('admin/modsecurityLog/index.php');
                $this->load->view('layouts/footer');
	}
}

