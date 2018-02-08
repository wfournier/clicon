<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: /gamecon/Login_register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameCon_Account</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Head.html";?>
    <link rel="stylesheet" type="text/css" href="../Style/AccountStyle.css">
    <style>
    #AH {
        background-color: aliceblue;
    }
</style>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Header.php";?>

    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/AccountNavigation.html";?>
        <div class="content row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-hover" border="2">
                    <tr>
                        <th>Transaction ID</th><th>Purchase Date</th><th>Number of Tickets</th><th>Total Price</th>
                    </tr>
                    <?php
                    $get_transactions = "SELECT * FROM TRANSACTION WHERE ACCOUNT_ID = " .$_COOKIE['account_id'];
                    $get_transactions_res = $con->query($get_transactions) or die("get_transactions_res: " .$con->error);

                    if($get_transactions_res->num_rows < 1){
                        ?>
                        <tr>
                            <td colspan="6">No recent purchases</td>
                        </tr>
                        <?php
                    } else{
                        while($transaction = $get_transactions_res->fetch_array()){
                            echo("<tr>");
                            echo("<td>" .$transaction['TRANSACTION_ID'] ."</td>");
                            echo("<td>" .date("d-m-Y", strtotime($transaction['PURCHASE_DATE'])) ."</td>");

                            $get_ticket_count_res = $con->query("SELECT count(*) AS TICKET_COUNT FROM TICKET WHERE TRANSACTION_ID = " .$transaction["TRANSACTION_ID"]) or die("ticket_count: " .$con->error);
                            
                            $ticketCount = $get_ticket_count_res->fetch_array()["TICKET_COUNT"];

                            echo("<td>" .$ticketCount ."&nbsp;<a href=\"TransactionDetail.php?transaction_id=" .$transaction['TRANSACTION_ID'] ."\">View Tickets</a></td>");
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
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Footer.html";?>
</body>
</html>