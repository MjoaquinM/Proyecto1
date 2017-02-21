<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

Class ReqBodyHandling extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('configVars/req_body_handling');
        $this->load->view('layouts/footer');
    }

    public function apply_changes(){
        $this->load->helper('url');
        $this->load->helper('file');

        if (isset($_POST['SecRequestBodyAccess'])) {
            $fileModificated = '';
            $file = fopen(MODSECURITY_CONF_PATH, 'r');
            while (!feof($file)) {
                $line = fgets($file);
                if (is_numeric(strpos($line, 'SecRequestBodyAccess'))){
                    $line = '';
                    $line = 'SecRequestBodyAccess '.$_POST['SecRequestBodyAccess'].PHP_EOL;
                }
                $fileModificated .= $line;
            }
            fclose($file);
            $file = fopen(MODSECURITY_CONF_PATH, 'w');
            fwrite($file,$fileModificated);
            fclose($file);
        }
        echo $_POST['SecRequestBodyAccess'];
    }
}