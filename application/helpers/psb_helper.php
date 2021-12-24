<?php 

function psb_url($path = NULL)
{
    if ($_SERVER['HTTP_HOST'] == "localhost"){
        return "http://localhost/psbbaru/".$path;
    } else {
        return "https://psb.ruhulislam.com/".$path;
    }
}


?>