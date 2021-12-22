<?php
    function swalalert($msg, $type){

        
        if ($type == "success"){

            echo '<script language="javascript">';
            echo 'Swal.fire({
                title: "Berhasil",
                html: "'.$msg.'",
                icon: "success",
                timer: 3000,
                showCancelButton: false,
                showConfirmButton: false

            })';
            echo '</script>';

        } else if ($type == "info"){

            echo '<script language="javascript">';
            echo 'Swal.fire({
                title: "Info",
                html: "'.$msg.'",
                icon: "info",
                timer: 3000,
                showCancelButton: false,
                showConfirmButton: false

            })';
            echo '</script>';

        } else if ($type == "error"){

            echo '<script language="javascript">';
            echo 'Swal.fire({
                title: "Error / Gagal",
                html: "'.$msg.'",
                icon: "error",
                timer: 3000,
                showCancelButton: false,
                showConfirmButton: false

            })';
            echo '</script>';

        } else if ($type == "warning"){

            echo '<script language="javascript">';
            echo 'Swal.fire({
                title: "Peringatan",
                html: "'.$msg.'",
                icon: "warning",
                timer: 3000,
                showCancelButton: false,
                showConfirmButton: false

            })';
            echo '</script>';
            
        }
    }

?>