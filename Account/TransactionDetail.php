<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Processes/Functions.php" ?>
<?php
if (!func::checkLogin()) {
    header("Location: /gamecon/Login_Register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clicon_Account</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Head.php";?>
    <link rel="stylesheet" type="text/css" href="../Style/AccountStyle.css">
    <style>
    #AH {
        background-color: lawngreen;
    }
</style>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Header.php";?>

    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/AccountNavigation.php";?>
        <div class="content row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <?php
                if(isset($_GET["transaction_id"])){
                    ?>
                    <table class="table table-hover" border="2">
                        <tr>
                            <th><?php echo($lang("ticket_id")); ?></th><th><?php echo($lang("ticket_price")); ?></th><th><?php echo($lang("ticket_days")); ?></th><th><?php echo($lang("ticket_badge_name")); ?></th><th><?php echo($lang("ticket_extras")); ?></th>
                        </tr>
                        <?php
                        $get_tickets_res = $con->query("SELECT * FROM ticket ti, transaction tr WHERE ti.TRANSACTION_ID = tr.TRANSACTION_ID AND tr.ACCOUNT_ID = " .$con->real_escape_string($_COOKIE['account_id']) ." AND tr.TRANSACTION_ID = " .$con->real_escape_string($_GET["transaction_id"])) or die("get_tickets_res: " .$con->error);
                        while($ticket = $get_tickets_res->fetch_array()){
                            echo("<tr>");
                            echo("<td>" .$ticket["TICKET_ID"] ."</td>");
                            echo("<td>$" .$ticket["PRICE"] ."</td>");
                            echo("<td><ul>");
                            for($i = 0; $i < strlen($ticket["TICKET_TYPE"]); $i ++){
                                if($ticket["TICKET_TYPE"][$i] != "-"){
                                    echo("<li>");
                                    switch ($i) {
                                        case 0:
                                        echo($lang("friday"));
                                        break;
                                        case 1:
                                        echo($lang("saturday"));
                                        break;
                                        case 2:
                                        echo($lang("sunday"));
                                        break;
                                    }
                                    echo("</li>");
                                }
                            }
                            echo("</ul></td>");
                            echo("<td>" .$ticket["BADGE_NAME"] ."</td>");
                            echo("<td><ul>");
                            for($i = 0; $i < strlen($ticket["EXTRAS"]); $i ++){
                                if($ticket["EXTRAS"][$i] != "-"){
                                    echo("<li>");
                                    switch ($i) {
                                        case 0:
                                        echo($lang("ticket_extra_concert"));
                                        break;
                                        case 1:
                                        echo($lang("ticket_extra_panel"));
                                        break;
                                        case 2:
                                        echo($lang("ticket_extra_vip"));
                                        break;
                                    }
                                    echo("</li>");
                                }
                            }
                            echo("</ul></td>");
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
                <a href="PurchaseHistory.php" class="btn btn-warning"><?php echo($lang("return")); ?></a>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Footer.html";?>
</body>
</html>