<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <?php
        include 'admin_navbar.php';
        $_quesid=$_GET["queid"];
        //require '../shared/database_user.php';
        //$obj=new userdb();
        require '../shared/databaseQuestion.php';
        $obj=new dbquestion();
        $result=$obj->getQuesDetail($_quesid);
        $row=$result->fetch_assoc();
    ?>
        <form action="" method="post" class="container">
<!--<div class="row">
<img src="" alt="" class="img-responsive img-thumbnail">
</div>-->
<div class="row">
  <div class="col-ld-3 col-sm-4">
    <a href="#" class="thumbnail">
      <img src="<?php echo $row["que_img"]; ?>" alt="..." class="img-responsive img-circle">
    </a>
  </div>
  <div class="col-ld-9 col-sm-8 ">
  <?php
    echo "<h3><label>Email ID:   ".$row["fk_email_id"]."</label><br><br>";
    echo "<label>Question Title:  ".$row["que_title"]."</label><br><br>";
    echo "<label>Question Description:  ".$row["que_desc"]."</label><br><br>";
    echo "<label>Subject:     ".$row["sub_name"]."</label> 
          <button type='submit' class='button large blue-button'>Edit Subject Category  <span class='icons-edit'> </button> ";
  ?> 
    <button type="submit" class="button large blue-button"> <span class="icons-stop"></span> Disapprove Question </button>
        <?php
        if(isset($_POST["btnedit"])){
            header('location:userupdate.php');
        }
        ?>
        <form action="" method="post">
           
        </form>
        
         </div>
</div>    
</form>

    </body>
</html>