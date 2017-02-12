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

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite']             = TRUE;
            $config['max_size']             = 2048000;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
            $this->load->helper('url');
            
            if (!$this->upload->do_upload('userfile')){
                $error = $this->upload->display_errors();
                $return = '<div class="alert alert-danger"><strong>Error: </strong>'.$error.'</div>';
            }else{
                $return = '<div class="alert alert-success"><strong>Your file was successfully uploaded!</strong></div>';
            }
            echo json_encode($return);
        }

        public function file_verification(){
            if (isset($_POST['nombre']) && $_POST['nombre']=="") {
                $status = 'false';
            }elseif (file_exists($_SERVER['DOCUMENT_ROOT'].'/uploads/'.$_POST['nombre'])) {
                $status = 'true';
            }else{
                $status = 'false';
            }
            echo $status;
        }
}
?>