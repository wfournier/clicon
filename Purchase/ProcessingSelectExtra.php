<?php include $_SERVER['DOCUMENT_ROOT']."/gamecon/Classes/Ticket.php" ?>
<?php
session_start();
//Add selection to object and then update session array ticket
//redirect to select badge name
if ($_POST["id"] != null) {
    $tickets = $_SESSION["tickets"];
    $id = $_POST["id"];
    $ticket = $tickets["$id"];

    if(isset($_POST["concert"]) && $_POST["concert"] == true) {
        $_SESSION["concert"] = "something";
        echo "concert";
        $ticket->setExtra1(true);
    }else
        $ticket->setExtra1(false);
    if(isset($_POST["panel"]) && $_POST["panel"] == true) {
        $_SESSION["panel"] = "something";
        echo "panel";
        $ticket->setExtra2(true);
    }else
        $ticket->setExtra2(false);
    if(isset($_POST["guest"]) && $_POST["guest"] == true) {
        $_SESSION["guest"] = "something";
        echo "guest";
        $ticket->setExtra3(true);
    } else
        $ticket->setExtra3(false);

    //header("Location: /gamecon/Purchase/SelectExtra.php?id=$id");
    header("Location: /gamecon/Purchase/SetTickets.php");
} else {
    if($_POST["id"]!=null){
        $id=$_POST["id"];
        $_SESSION["Error_Extra"] = "An error occurred (101). Please try again";
        header("Location: /gamecon/Purchase/SelectExtra.php?id=$id");
    } else {
        $_SESSION["Error_Extra"] = "An error occurred while processing extra. Please try again.";
        header("Location: /gamecon/Purchase/SetTickets.php");
    }
}
?>