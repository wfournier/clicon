<?php include "Shared/connection.php" ?>
<?php include "Processes/CheckLogin.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: Login_register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameCon_Account</title>
    <?php include "Shared/Head.html";?>
    <link rel="stylesheet" type="text/css" href="Style/AccountStyle.css">
    <style>
    #AH {
        background-color: aliceblue;
    }
</style>
</head>
<body>
    <?php include "Shared/Header.php";?>

    <main>
        <?php include "Shared/AccountNavigation.html";?>
        <div class="content row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-hover" border="2">
                    <tr>
                        <th>Ticket ID</th><th>Ticket Type</th><th>Description</th><th>Extras</th><th>Purchase Date</th><th>Price</th>
                    </tr>
                    <?php
                    $get_tickets_sql = "SELECT * FROM TICKET WHERE ACCOUNT_ID = " .$_COOKIE['account_id'];
                    $get_tickets_res = $con->query($get_tickets_sql) or die("get_tickets_res: " .$con->error);

                    if($get_tickets_res->num_rows < 1){
                        while($ticket = $get_tickets_res->fetch_array()){
                            echo("<tr>");
                            echo("<td>" .$ticket['TICKET_ID'] ."</td>");
                            echo("<td>" .$ticket['TICKET_TYPE'] ."</td>");
                            echo("<td>" .$ticket['TICKET_DESC'] ."</td>");
                            echo("<td>" .$ticket['EXTRAS'] ."</td>");
                            echo("<td>" .$ticket['PURCHASE_DATE'] ."</td>");
                            echo("<td>" .$ticket['PRICE'] ."</td>");
                            echo("</tr>");
                        }
                    } else{
                        echo("<tr>");
                        echo("<td colspan=\"6\">No recent purchases</td>");
                        echo("</tr>");
                    }
                    ?>
                </table>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </main>
    <?php include "Shared/Footer.html";?>
</body>
</html>