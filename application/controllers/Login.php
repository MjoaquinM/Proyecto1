<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    function index(){
        $this->load->model('usuario_model');
        $this->load->helper('form');
        if (isset($_POST['email']) && isset($_POST['password'])){
            $this->load->model('usuario_model');
            if ($this->usuario_model->login($_POST['email'], md5($_POST['password']))){
                $this->load->view('layouts/header.php');
                $this->load->view('layouts/navbar.php');
                $this->load->view('layouts/sidebar.php');
                $this->load->view('admin/content.php');
                $this->load->view('layouts/footer.php');
            } else {
//                echo 'anda y no valida';
            }
        }
    }
}