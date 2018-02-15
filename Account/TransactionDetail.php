<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/CheckLogin.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: /Login_Register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clicon_Account</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Head.php";?>
    <link rel="stylesheet" type="text/css" href="../Style/AccountStyle.css">
    <style>
    #AH {
        background-color: lawngreen;
    }
</style>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Header.php";?>

    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/AccountNavigation.html";?>
        <div class="content row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <?php
                if(isset($_GET["transaction_id"])){
                    ?>
                    <table class="table table-hover" border="2">
                        <tr>
                            <th>Ticket ID</th><th>Price</th><th>Days</th><th>Badge Name</th>
                        </tr>
                        <?php
                            $get_tickets_res = $con->query("SELECT * FROM ticket ti, TRANSACTION tr WHERE ti.TRANSACTION_ID = tr.TRANSACTION_ID AND tr.ACCOUNT_ID = " .$_COOKIE['account_id'] ." AND tr.TRANSACTION_ID = " .$_GET["transaction_id"]) or die("get_tickets_res: " .$con->error);
                            while($ticket = $get_tickets_res->fetch_array()){
                                echo("<tr>");
                                echo("<td>" .$ticket["TICKET_ID"] ."</td>");
                                echo("<td>$" .$ticket["PRICE"] ."</td>");
                                echo("<td>" .$ticket["TICKET_TYPE"] ."</td>");
                                echo("<td>" .$ticket["BADGE_NAME"] ."</td>");
                                echo("</tr>");
                            }
                        ?>
                    </table>
                    <?php
                } else{
                    ?>
                        <h2 class="error">INVALID TRANSACTION ID</h2>
                    <?php
                }
                ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html";?>
</body>
</html>