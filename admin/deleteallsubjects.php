<?php
        //echo "hiii";
        $all=implode(",",$_POST["chk"]);
        //echo $all;
        require '../shared/databaseSubject.php';
        $obj=new dbsubject();
        $result=$obj->subjectDelAll($all);
        header('location:subjects.php');
?>