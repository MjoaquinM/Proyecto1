<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

    <!-- jQuery -->
    <?php echo '<script src="'.base_url().'application/assets/js/jquery/jquery.min.js"></script>';?>
    <?php echo '<script src="'.base_url().'application/assets/js/jquery/jquery-3.1.1.min.js"></script>';?>
    <?php echo '<script src="'.base_url().'application/assets/js/jquery/jquery-ui.min.js"></script>';?>

    <!-- Bootstrap Core JavaScript -->
    <?php echo '<script src="'.base_url().'application/assets/js/bootstrap/bootstrap.min.js"></script>';?>
        <!-- Flot Charts JavaScript -->
<!--    <script src="/application/assets/js/flot/excanvas.min.js"></script>
    <script src="/application/assets/js/flot/jquery.flot.js"></script>
    <script src="/application/assets/js/flot/jquery.flot.pie.js"></script>
    <script src="/application/assets/js/flot/jquery.flot.resize.js"></script>
    <script src="/application/assets/js/flot/jquery.flot.time.js"></script>
    <script src="/application/assets/js/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="/application/assets/js/morris/flot-data.js"></script>-->

    <!-- Metis Menu Plugin JavaScript -->
    <?php echo '<script src="'.base_url().'application/assets/js/metisMenu/metisMenu.min.js"></script>';?>

    <!-- Morris Charts JavaScript -->
    <?php echo '<script src="'.base_url().'application/assets/js/raphael/raphael.min.js"></script>'; ?>
    <?php echo '<script src="'.base_url().'application/assets/js/morris/morris.min.js"></script>';?>
    <?php echo '<script src="'.base_url().'application/assets/js/morris/morris-data.js"></script>';?>


    <!-- Custom Theme JavaScript -->
    <?php echo '<script src="'.base_url().'application/assets/js/sb-admin-2.js"></script>';?>
    <script>

        function hideFormResponse(){
            jQuery('#form-response1').empty();
            jQuery('#form1').show();
        }

        function uploadFile(){
            var form = jQuery('#formulario1');
            //alert(form[0]);
            $.ajax({
                type: form.attr("method"),
                url: form.attr("action")+'do_upload',
                dataType: "JSON",
                data: new FormData(form[0]),
                processData: false,
                contentType: false,
                async:false,    
                cache:false,
                success:function(respuesta){
                    jQuery('#form1').hide();
                    jQuery('#form-response1').append(respuesta+'<button id="upload-another-file" onclick="hideFormResponse();">Cargar Otro Archivo</button>');
                }
            });
            return false;
        }

        jQuery("#dialog-1").dialog({
           autoOpen: false,
           buttons: {
              Aceptar: function() {
                uploadFile();
                $(this).dialog("close");},
              Cancelar: function() {$(this).dialog("close");}
            },
        });

        jQuery(document).ready(function(){

            jQuery('#formulario1').bind('submit',function(event){
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: jQuery(this).attr("action")+'file_verification',
                    data: {'nombre': jQuery("#upload-input-load").val()},
                    success: function(response){
                        if(response === 'true'){
                            //The file already exist!!!!!!!                            
                            jQuery("#dialog-1").dialog('open');
                        }else{
                            uploadFile();
                        }
                    }
                });

                //alert(jQuery("#upload-input-load").val());

                //alert(jQuery("#upload-input-load").val());
            });
        });

    </script>
</body>

</html>