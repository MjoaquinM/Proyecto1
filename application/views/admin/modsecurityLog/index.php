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
                        <input type="text" name="nombre" value="hola" style="display: none;" />
                        <input type="file" name="userfile" id="upload-input-load" size="20" />
                        <br />
                        <!--<input id="upload-input" type="submit" value="upload" />-->
                        <button id="upload-button-load">Upload</button>
                    </form>
                </div>
                <div id="form-response1"></div>
            </div>
        </div>
    </div>
        
</div>

<div id = "dialog-1" title = "Archivo Existente">El archivo que intenta subir ya existe, ¿quiere sobreescribirlo?</div>
