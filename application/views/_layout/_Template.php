<!DOCTYPE html>
<html lang="en">

<?php $this->view('_layout/Header'); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    

    <div class="wrapper">

        <?php $this->view('_layout/Navbar'); ?>

        <?php $this->view('_layout/Sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pb-5 pt-2">
            <?php
            if (!empty($content)) {
                $this->view($content);
            } else {
                echo "Nothing To Display";
            }
            ?>
        </div>
        <!-- End of Content Wrapper -->

        <?php $this->view('_layout/Footer'); ?>
        
    </div>
    <!-- ./wrapper -->

    
    
    <?php $this->view('_layout/Script'); ?>

    <?php
        if (!empty($costum_js)) {
            $this->view($costum_js);
        } 
    ?>

    <?php
    if ($this->session->flashdata('msg') !== NULL){
        swalalert($this->session->flashdata('msg'), $this->session->flashdata('type'));
    }
    ?>

</body>

</html>