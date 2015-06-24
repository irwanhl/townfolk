<?php
    $success_msg=$this->session->flashdata("success_msg");
    $error_msg=$this->session->flashdata("error_msg");
    
    if($success_msg!="")
    {
        //echo "<label>";
        echo "<div class='alert alert-success'>";
        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        echo $success_msg;
        echo "</div>";
        //echo "</label>";
    }
    
    elseif($error_msg!="")
    {
        echo "<div class='alert alert-error'>";
        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        echo $error_msg;
        echo "</div>";
    }
?>

