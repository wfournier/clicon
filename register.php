<?php include "Shared/connection.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "Shared/Head.html" ?>
	<title>$Title$</title>
</head>
<body>
	<?php include "Shared/Header.html" ?>
	<div class="row">
		<div class="col-sm-2">
			<form action="Processes/registerProcess.php" method="post">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
				</div>
			</form>
		</div>
	</div>
	<?php include "Shared/Footer.html" ?>
</body>
</html>