<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }
        
        public function index()
        {
//                $this->load->view('forms/uploadsForms', array('error' => ' ' ));
//            return 'añsldkfjñalskdjfñasd';
        }

        public function do_upload(){
            $config['upload_path']          = base_url().'uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1024;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
            $this->load->helper('url');
            var_dump($config['upload_path']);
            
            if (!$this->upload->do_upload('userfile')){
                $error = 'no anda ni mierda';
                $return = '<div class="alert alert-danger"><strong>Error: </strong>'.$error.'</div>';
            }else{
                $data = array('upload_data' => $this->upload->data());
                $html .= 'Your file was successfully uploaded!';
                $html .= '<div class="alert alert-danger"><strong>Error: </strong>'.$html.'</div>';
                $return = $html;
            }
            echo $return;
        }
}
?>