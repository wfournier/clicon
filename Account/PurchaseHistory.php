<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/Functions.php" ?>
<?php
if (!func::checkLogin()) {
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
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/AccountNavigation.php";?>
        <div class="content row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-hover" border="2">
                    <tr>
                        <th><?php echo($lang("transaction_id")); ?></th><th><?php echo($lang("purchase_date")); ?></th><th><?php echo($lang("num_tickets")); ?></th><th style="border-right: solid 1px black;"><?php echo($lang("total_price")); ?></th>
                    </tr>
                    <?php
                    $get_transactions = "SELECT * FROM transaction WHERE ACCOUNT_ID = " .$_COOKIE['account_id'];
                    $get_transactions_res = $con->query($get_transactions) or die("get_transactions_res: " .$con->error);

                    if($get_transactions_res->num_rows < 1){
                        ?>
                        <tr>
                            <td colspan="6"><?php echo($lang("no_recent_purchases")); ?></td>
                        </tr>
                        <?php
                    } else{
                        while($transaction = $get_transactions_res->fetch_array()){
                            echo("<tr>");
                            echo("<td>" .$transaction['TRANSACTION_ID'] ."</td>");
                            echo("<td>" .date("d-m-Y", strtotime($transaction['PURCHASE_DATE'])) ."</td>");

                            $get_ticket_count_res = $con->query("SELECT count(*) AS TICKET_COUNT FROM ticket WHERE TRANSACTION_ID = " .$transaction["TRANSACTION_ID"]) or die("ticket_count: " .$con->error);
                            
                            $ticketCount = $get_ticket_count_res->fetch_array()["TICKET_COUNT"];

                            echo("<td>" .$ticketCount ."&nbsp;<a href=\"TransactionDetail.php?transaction_id=" .$transaction['TRANSACTION_ID'] ."\">" .$lang("view_tickets") ."</a></td>");
                            echo("<td>$" .$transaction['PRICE_TOTAL'] ."</td>");
                            echo("</tr>");
                        }
                    }
                    ?>
                </table>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html";?>
</body>
</html>