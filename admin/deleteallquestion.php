<?php
        //echo "hiii";
        $all=implode(",",$_POST["chk"]);
        //echo $all;
        require '../shared/databaseQuestion.php';
        $obj=new dbquestion();
        $result=$obj->delAllQuest($all);
        header('location:questions.php');
?>