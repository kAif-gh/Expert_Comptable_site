<?php
    //require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    if(!isset($_GET['name'])){
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }else{
        // Get name values
        $name = $_GET['name'];

        //Call Delete function
        $result = $crud->deleteMessage($name);
        //Redirect to list
        if($result)
        {
            header("Location: viewrecords.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }

?>