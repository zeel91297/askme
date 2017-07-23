<?php
    session_start();
    $_mailid=$_SESSION["userid"];
    $_queid=$_SESSION["queid"];
    $_adesc=$_POST["adesc"];
    $_aimg="../images/".basename($_FILES["aimg"]["name"]);
    move_uploaded_file($_FILES["aimg"]["tmp_name"],$_aimg);
    
    require '../shared/databaseAnswer.php';
    $obj=new dbanswer();
    $result=$obj->answerInsert($_adesc,$_aimg,$_queid,$_mailid);
    if($result===true)
    {
        header('location: index.php');
    }
    else
    {
        echo "nathi";
    }
?>