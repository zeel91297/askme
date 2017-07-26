<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
    </head>
    <body>
        <?php 
            include 'admin_navbar.php';
            require '../shared/databaseSubject.php';
            $obj=new dbsubject();
            $result=$obj->getAllUsers();
        ?>
        <div class="table-responsive container">
        <!--<a href="productinsert.php" class="btn btn-primary" role="button">Insert A Record</a>-->
        <form method="post" action="deleteallusers.php">
        <script>
        $(function () {
            $('#dataTable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            });
        });
    </script>
            <table class="table table-hover" id="dataTable" align="center">
                <thead>
                    <th>Delete</th>
                    <th>Proile Picture</th>
                    <th>User Name</th>
                    <th>Verified</th>
                    <th>User Type</th>
                    <th>Details</th>
                </thead>
                <?php
                    while($row=$result->fetch_assoc())
                    {
                        echo '<b><tr class="active">';
                        echo '<td><input type="checkbox" name="chk[]" value="'.$row["email_id"].'"></td>';
                        echo '<td><img class="img-responsive img-thumbnail" height="200px" width="200px"src="'.$row["profile_pic"].'"></td>';
                        echo '<td>'.$row["user_name"] .'</td>';
                        echo '<td>'.$row["verify"] .'</td>';
                        echo '<td>'.$row["user_type"].'</td>';
                        echo '<td align="center"><a href="userrdetails.php?ansid='.$row["email_id"].'"><i class="icon-eye-open">  View More</a></i></td>';
                        echo '</tr>';
                    }
                ?>
            </table>
            <input type="submit" name="btndelete" value="Delete All" class="form-control">
        </form>
        </div>  
    </body>
</html>