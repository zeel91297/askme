<?php
    session_start();

    $_mailid=$_SESSION["userid"];
    $_qtitle=$_POST["qtitle"];
    $_qdesc=$_POST["qdesc"];
    $_qimg=$_pimg1="../images/".basename($_FILES["qimg"]["name"]);
    move_uploaded_file($_FILES["qimg"]["tmp_name"],$_qimg);;
    $_subid=$_POST["qsubject"];

    require '../shared/databaseQuestion.php';
    $obj=new dbquestion();
    $result=$obj->questionInsert($_qtitle,$_qdesc,$_qimg,$_mailid,$_subid);
    if($result===true)
    {
       // header('location: ');
        echo "Done";
    }
    else
    {
        echo "Not done";
    }

?>