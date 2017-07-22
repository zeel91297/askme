<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
    </head>
    <body>
        <?php 
            include 'admin_navbar.php';
            require '../shared/databasebill.php';
            $obj=new billdb();
            $result=$obj->getBills();
        ?>
        <div class="table-responsive container">
        <!--<a href="productinsert.php" class="btn btn-primary" role="button">Insert A Record</a>-->
        <form method="post" action="deleteallbill.php">
        <script>
        $(function () {
            $('#dataTable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            });
        });
    </script>
            <table class="table table-hover">
                <thead>
                    <th>Delete</th>
                    <th>Email ID</th>
                    <th>Product Name</th>
                    <th>Bill Amount</th>
                    <th>Bill Date</th>
                    <th>Payment Type</th>
                </thead>
                <?php
                    while($row=$result->fetch_assoc())
                    {
                        echo '<b><tr class="active">';
                        echo '<td><input type="checkbox" name="chk[]" value="'.$row["bill_no"].'"></td>';
                        echo '<td>'.$row["fk_email_id"] .'</td>';
                        echo '<td>'.$row["prod_name"] .'</td>';
                        echo '<td>'.$row["bill_amount"] .'</td>';
                        echo '<td>'.$row["bill_date"] .'</td>';
                        echo '<td>'.$row["pay_type"] .'</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
            <input type="submit" name="btndelete" value="Delete All" class="form-control">
        </form>
        </div>  
    </body>
</html>