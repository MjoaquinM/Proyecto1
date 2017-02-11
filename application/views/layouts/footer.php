<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

    <!-- jQuery -->
    <?php echo '<script src="/application/assets/js/jquery/jquery.min.js"></script>';?>
    <?php echo '<script src="/application/assets/js/jquery/jquery-3.1.1.min.js"></script>';?>
    

    <!-- Bootstrap Core JavaScript -->
    <?php echo '<script src="/application/assets/js/bootstrap/bootstrap.min.js"></script>';?>
    
    
        <!-- Flot Charts JavaScript -->
<!--    <script src="/application/assets/js/flot/excanvas.min.js"></script>
    <script src="/application/assets/js/flot/jquery.flot.js"></script>
    <script src="/application/assets/js/flot/jquery.flot.pie.js"></script>
    <script src="/application/assets/js/flot/jquery.flot.resize.js"></script>
    <script src="/application/assets/js/flot/jquery.flot.time.js"></script>
    <script src="/application/assets/js/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="/application/assets/js/morris/flot-data.js"></script>-->
    

    <!-- Metis Menu Plugin JavaScript -->
    <?php echo '<script src="/application/assets/js/metisMenu/metisMenu.min.js"></script>';?>

    <!-- Morris Charts JavaScript -->
    
    <?php echo '<script src="/application/assets/js/raphael/raphael.min.js"></script>'; ?>
    <?php echo '<script src="/application/assets/js/morris/morris.min.js"></script>';?>
    <?php echo '<script src="/application/assets/js/morris/morris-data.js"></script>';?>
    


    
    <!-- Custom Theme JavaScript -->
    <?php echo '<script src="/application/assets/js/sb-admin-2.js"></script>';?>
    
    
    <script>        
//        alert('HOLAS');
        jQuery(document).ready(function(){
            jQuery('#upload-button-load').on('click',function(){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url("index.php/upload/do_upload"); ?>',
                    data:{'id': 1},
                    success:function(data){
                        $('#form1').empty();
                        $('#form1').append(data);
                    }
                });
            });
        });
            
    </script>
    
    
</body>

</html>
