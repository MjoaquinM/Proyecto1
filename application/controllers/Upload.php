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

        public function parse_block($block){
            preg_match_all("/^--([0-9a-fA-F]{8,})-([Z])--$/", $line);
            preg_match("/((?:(?:[0-2]?\\d{1})|(?:[3][01]{1}))[-:\\/.](?:Jan(?:uary)?|Feb(?:ruary)?|Mar(?:ch)?|Apr(?:il)?|May|Jun(?:e)?|Jul(?:y)?|Aug(?:ust)?|Sep(?:tember)?|Sept|Oct(?:ober)?|Nov(?:ember)?|Dec(?:ember)?)[-:\\/.](?:(?:[1]{1}\\d{1}\\d{1}\\d{1})|(?:[2]{1}\\d{3})))(?![\\d])/",$block,$matches); // Date
            $date=$matches[0];
            preg_match("/[0-9]{2}:[0-9]{2}:[0-9]{2}\s/",$block,$matches); // Time
            $time=$matches[0];
            preg_match("/([a-zA-Z]{2}\s)([0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3})\s([0-9]*)\s([0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3})\s([0-9]*)/",$block,$matches); // IP's & Port's
            $source_ip=$matches[2];
            $source_port=$matches[3];
            $dest_ip=$matches[4];
            $dest_port=$matches[5];
            preg_match("/\s(GET)(.*)(\sHost)/",$block,$matches); // GET Header Address
            $get_address=$matches[2];
            preg_match("/\s(User-Agent:\s)(.*)(\sAccept:)/",$block,$matches); // User Agent
            $user_agent=$matches[2];
            //preg_match("/\s\[(tag\s\")(.*)(\"])\s/",$block,$matches); // message Tags(Attack Type)
            //$message_tags=$matches;
            preg_match("/(\[msg)(.*?)(\"\])/",$block,$matches); //  message
            $message=$matches[2];
            preg_match("/(-H--\sMessage:\s)(.*)(]\s)/",$block,$matches); // detailed message
            $detailed_message=$matches[2];
            
            //echo("Date:".$date."<br>Time:".$time."<br>Attacker IP:".$attacker_ip."<br>Attacker Port:".$attacker_port."<br>Server IP:".$server_ip."<br>server port:".$server_port."<br>GET Adress:".$get_address."<br>User Agent:".$user_agent."<br>Message:".$message."<br>Detailed Message:".$detailed_message."<br><br><br>");
            $ua=useragent_parser($user_agent);// parsing user agent for browser & os
            $browser=$ua['name'];//browser
            $os=$ua['platform'];//os 
            mysql_query("insert into log (`date`,`time`,`source_ip`,`source_port`,`dest_ip`,`dest_port`,`get_adr`,`os`,`browser`,`message`,`detailed_message`)values('$date','$time','$source_ip','$source_port','$dest_ip','$dest_port','$get_address','$os','$browser','$message','$detailed_message')");
        }

        public function useragent_parser($uagent){ 
            $u_agent = $uagent; 
            $bname = 'Unknown';
            $platform = 'Unknown';
            $version= "";

            //First get the platform?
            if (preg_match('/linux/i', $u_agent)) {
                $platform = 'linux';
            }
            elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
                $platform = 'mac';
            }
            elseif (preg_match('/windows|win32/i', $u_agent)) {
                $platform = 'windows';
            }
            
            // Next get the name of the useragent yes seperately and for good reason
            if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
            { 
                $bname = 'Internet Explorer'; 
                $ub = "MSIE"; 
            } 
            elseif(preg_match('/Firefox/i',$u_agent)) 
            { 
                $bname = 'Mozilla Firefox'; 
                $ub = "Firefox"; 
            } 
            elseif(preg_match('/Chrome/i',$u_agent)) 
            { 
                $bname = 'Google Chrome'; 
                $ub = "Chrome"; 
            } 
            elseif(preg_match('/Safari/i',$u_agent)) 
            { 
                $bname = 'Apple Safari'; 
                $ub = "Safari"; 
            } 
            elseif(preg_match('/Opera/i',$u_agent)) 
            { 
                $bname = 'Opera'; 
                $ub = "Opera"; 
            } 
            elseif(preg_match('/Netscape/i',$u_agent)) 
            { 
                $bname = 'Netscape'; 
                $ub = "Netscape"; 
            } 
            
            // finally get the correct version number
            $known = array('Version', $ub, 'other');
            $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
            if (!preg_match_all($pattern, $u_agent, $matches)) {
                // we have no matching number just continue
            }
            
            // see how many we have
            $i = count($matches['browser']);
            if ($i != 1) {
                //we will have two since we are not using 'other' argument yet
                //see if version is before or after the name
                if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                    $version= $matches['version'][0];
                }
                else {
                    $version= $matches['version'][1];
                }
            }
            else {
                $version= $matches['version'][0];
            }
            
            // check if we have a number
            if ($version==null || $version=="") {$version="?";}
            
            return array(
                'userAgent' => $u_agent,
                'name'      => $bname,
                'version'   => $version,
                'platform'  => $platform,
                'pattern'    => $pattern
            );
        }

        public function parse($file_name){
            $fp = fopen( $file_name, "r" );
            $i = 0;
            while (!feof($fp)) {
                set_time_limit(0); // for increasing the execution time
                // do some processing with the line!
                $line=fgets($fp);//read 1line
                $error_block.=$line;
                $flag=preg_match_all("/^--([0-9a-fA-F]{8,})-([Z])--$/", $line);
                if($flag){
                    parse_block($error_block);
                    $error_block="";
                    $flag=0;
                }
                $i++;
            }
            /*if(!$fp){
                echo "Couldn't open the data file. Try again later.";
                exit;
            }else{
                // echo("Content&ltbr>".$theData);
            }*/
        }

        public function do_upload(){
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|log|txt';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 2048000;

            $this->load->library('upload', $config);
            $this->load->helper('url');
            
            if (!$this->upload->do_upload('userfile')){
                $error = $this->upload->display_errors();
                $return = '<div class="alert alert-danger"><strong>Error: </strong>'.$error.'</div>';
            }else{
                $return = '<div class="alert alert-success"><strong>Su archivo fue cargado con exito!</strong></div>';
                $file = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$_FILES['userfile']['name'];
                if (file_exists($file)) {
                    parse($_FILES['userfile']['tmp_name']);
                }
                if (isset($_FILES) && $_FILES['userfile']['tmp_name']!='') {
                    //Encript content file to save it with codeigniter upload class
                    $fp = fopen($_FILES['userfile']['tmp_name'], 'r');
                    $line = '';
                    $i=0;
                    while (!feof($fp) && $i<100) {
                        $line.=' '.fgets($fp);//read 1line
                        $i+=1;
                    }
                    fclose($fp);
                    $line = str_replace(['<','>'], ['menor','mayor'], $line);
                    $aux = fopen($_FILES['userfile']['tmp_name'], 'w');
                    fwrite($aux, $line);
                    fclose($aux);
                }
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