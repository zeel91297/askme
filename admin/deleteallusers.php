<?php
        //echo "hiii";
        $all=implode(",",$_POST["chk"]);
        //echo $all;
        require '../shared/databaseSubject.php';
        $obj=new dbsubject();
        $result=$obj->delAllUsers($all);
        //echo $all;
        //header('location:users.php');
?>