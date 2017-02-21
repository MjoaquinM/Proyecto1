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
                <h1 class="page-header">Carga de Archivos</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-folder-o"></i>
                Cargar un archivo
            </div>
            <div class="panel-body">
                <div id="form1">
                    <?php echo form_open(base_url("index.php/upload/"), array('id' => 'formulario1', 'enctype' => 'multipart/form-data')); ?>
                        <?php echo form_upload(array('id' => 'upload-input-load', 'name' =>'userfile', 'size' => '20')); ?>
                        <br />
                        <?php echo form_submit(array('id' => 'upload-button-load', 'value' => 'Upload')); ?> 
                    <?php echo form_close(); ?>
                </div>
                <div id="form-response1"></div>
            </div>
        </div>
    </div>
        
</div>

<div id = "dialog-1" title = "Archivo Existente">El archivo que intenta subir ya existe, ¿quiere sobreescribirlo?</div>
