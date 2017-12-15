<?php

$get_account_info_sql = "SELECT * FROM ACCOUNT WHERE ACCOUNT_ID = " .$_COOKIE['account_id'];
$get_account_info_res = $con->query($get_account_info_sql) or die("get_account_info_res: " .$con->error);

while($account = $get_account_info_res->fetch_array()){

}
?>