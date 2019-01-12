<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="img/ico" href="/clicon/Resources/icon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/clicon/Scripts/MainScript.js"></script>
<link rel="stylesheet" href="/clicon/Style/MainStyle.css">
<?php include($_SERVER['DOCUMENT_ROOT'] . "/clicon" ."/langquery/langquery.php");
	$lang = new LangQuery();

	if(!isset($_COOKIE["current_language"])){
		$lang->load("en");
	}

	if(isset($_GET["lang"])){
		$lang->load($_GET["lang"]);
		header("Location: " .htmlspecialchars($_SERVER['PHP_SELF']));
	}
?>