<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuario_model extends CI_Model{
    
    public $variable;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function login($email,$password){
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $ans = $this->db->get('users');
        
        return ($ans->num_rows()>0);
    }
}
