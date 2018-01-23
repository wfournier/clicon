<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php
if(!func::checkLogin($con)){
    header("Location: /gamecon/Login_register.php");
}
session_start();
if($_GET["id"] == null){
    $_SESSION["Error_Quantity"] = "An error occured please try again";
    header("Location: /gamecon/Purchase/Purchase_SetTickets.php");
} else {
    $_SESSION["Error_Quantity"] = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_TicketSelection</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Head.html";?>
    <style>
        label {
            width: 100px;
            margin-left: 30px;
        }}
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Header.php";?>
<main>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row" style="height: 400px">
            <h1>Select dates for your ticket:</h1>
            <p><i>Selecting all 3 days get you a 15$ off.</i></p>
            <form method="post" action="Purchase_ProcessingSelectTicket.php">
                    <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                    <label>Friday: </label><input type="checkbox" name="friday"
                        <?php if($_SESSION["friday"] != null){ echo "checked"; }?>
                    ><br><br>
                    <label>Saturday: </label><input type="checkbox" name="saturday"
                        <?php if($_SESSION["saturday"] != null){ echo "checked"; }?>
                    ><br><br>
                    <label>Sunday: </label><input type="checkbox" name="sunday"
                        <?php if($_SESSION["sunday"] != null){ echo "checked"; }?>
                    >
                </div>
                <div class="row">
                    <a class="btn btn-warning" href="Purchase_SetTickets.php">Cancel</a>
                    <input class="btn btn-warning" type="submit" value="Next" id="next">
                </div>
            </form>
            <?php
            $_SESSION["friday"] = null;
            $_SESSION["saturday"] = null;
            $_SESSION["sunday"] = null;
            if(isset($_SESSION["Error_Ticket"])) {
                echo "<p><i style='color: red'>" . $_SESSION["Error_Ticket"] . "</i></p>";
                $_SESSION["Error_Ticket"] = null;
            }
            ?>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Footer.html";?>
</body>
</html>