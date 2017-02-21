<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div id="wrapper">
    <div id="page-wrapper">
    	<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Configuración</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-folder-o"></i>
                Request Body Handling
            </div>
            <div class="panel-body">
                <label>
                    SecRequestBodyAccess:
                    <select>
                            <option selected>On</option>
                            <option>Off</option>    
                    </select>    
                </label>
                </br>
                <label>
                    SecRequestBodyLimit:
                    <?php  
                        $data = array( 'name' => 'SecRequestBodyLimit', 'id' => 'username', 'value' => '13107200', 'type'=>'number', 'min'=>'0'); echo form_input($data);
                    ?>
                </label>
                </br>
                <label>
                    SecRequestBodyNoFilesLimit:
                    <?php  
                        $data = array( 'name' => 'SecRequestBodyLimit', 'id' => 'username', 'value' => '131072', 'type'=>'number', 'min'=>'0'); echo form_input($data);
                    ?>
                </label>
                </br>
                <label>
                    SecRequestBodyInMemoryLimit:
                    <?php  
                        $data = array( 'name' => 'SecRequestBodyLimit', 'id' => 'username', 'value' => '131072', 'type'=>'number', 'min'=>'0'); echo form_input($data);
                    ?>
                </label>
                </br>
                <label>
                    SecRequestBodyLimitAction:
                    <select>
                            <option selected>Reject</option>
                            <option>ProcessPartial</option>    
                    </select>    
                </label>
                <hr/>
                <?php
                echo form_button('Apply','Apply','id="aplly_req_body"');
                ?>
            </div>
        </div>

    </div>
</div>