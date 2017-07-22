<?php
        //echo "hiii";
        $all=implode(",",$_POST["chk"]);
        //echo $all;
        require '../shared/databaseAnswer.php';
        $obj=new dbanswer();
        $result=$obj->answerDelAll($all);
        header('location:answers.php');
   
?>