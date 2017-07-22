<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
    </head>
    <body>
        <?php 
            include 'admin_navbar.php';
            require '../shared/databaseQuestion.php';
            $obj=new dbquestion();
            $result=$obj->getAllQuestions();
        ?>
        <div class="table-responsive container">
        <!--<a href="productinsert.php" class="btn btn-primary" role="button">Insert A Record</a>-->
        <form method="post" action="deleteallquestion.php">
        <script>
        $(function () {
            $('#dataTable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            });
        });
    </script>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <th>Delete</th>
                    <th>Question Title</th>
                    <th>User</th>
                    <th>Question Image</th>
                    <th>Details</th>
                </thead>
                <?php
                    while($row=$result->fetch_assoc())
                    {
                        echo '<b><tr class="active">';
                        echo '<td><input type="checkbox" name="chk[]" value="'.$row["que_id"].'"></td>';
                        echo '<td>'.$row["que_title"] .'</td>';
                        echo '<td>'.$row["fk_email_id"] .'</td>';
                        echo '<td><img class="img-responsive img-thumbnail" src="'.$row["que_img"].'"></td>';
                        echo '<td align="center"><a href="questiondetails.php?queid='.$row["que_id"].'"><i class="icon-eye-open">  View More</a></i></td>';
                       // echo '<td>'.$row["cat_name"] .'</td></b>';
                       /*echo '<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">';
  echo '<div class="modal-dialog" role="document">';
    echo '<div class="modal-content">';
      echo '<div class="modal-header">';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>';
      echo '</div>';
      echo '<div class="modal-body">';
        echo '<div class="row">';
          echo '<div class="col-md-4">.col-md-4</div>';
          echo '<div class="col-md-4 col-md-offset-4">.col-md-4 .col-md-offset-4</div>';
        echo '</div>';
        echo '<div class="row">';
          echo '<div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>';
          echo '<div class="col-md-2 col-md-offset-4">.col-md-2 .col-md-offset-4</div>';
        echo '</div>';
        echo '<div class="row">';
          echo '<div class="col-md-6 col-md-offset-3">.col-md-6 .col-md-offset-3</div>';
        echo '</div>';
        echo '<div class="row">';
          echo '<div class="col-sm-9">
            Level 1: .col-sm-9';
            echo '<div class="row">';
              echo '<div class="col-xs-8 col-sm-6">
                Level 2: .col-xs-8 .col-sm-6
              </div>';
              echo '<div class="col-xs-4 col-sm-6">
                Level 2: .col-xs-4 .col-sm-6
              </div>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
      echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
        echo '<button type="button" class="btn btn-primary">Save changes</button>';
      echo '</div>';
    echo '</div><!-- /.modal-content -->';
  echo '</div><!-- /.modal-dialog -->';
echo '</div><!-- /.modal -->';*/
                        echo '</tr>';
                    }
                ?>
            </table>
            <input type="submit" name="btndelete" value="Delete All" class="form-control">
        </form>
        </div> 
         
    </body>
</html>