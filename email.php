<!DOCTYPE HTML>
<html>
<head>
<style>
.error {
	color: #FF0000;
}
</style>
</head>
<body style="background-color: powderblue;">


	<?php
	// define variables and set to empty values
	$recipient = $sender = $subject = $body = "";
	$recErr = $sendErr = $subErr = $bodyErr = "";


	if ($_SERVER["REQUEST_METHOD"] == "POST") {



		if (empty($_POST["recipient"])) {
			$recErr = "You must enter recipient";
		}

		elseif(!filter_var($_POST["recipient"], FILTER_VALIDATE_EMAIL)){
			$recipient = test_input($_POST["recipient"]);
			$recErr = "Invalid email format";

		}

		else {
			$recipient = test_input($_POST["recipient"]);
		}


		if (empty($_POST["sender"])) {
			$sendErr = "You must enter from address";
		}

		elseif(!filter_var($_POST["sender"], FILTER_VALIDATE_EMAIL)){
			$sender = test_input($_POST["sender"]);
			$sendErr = "Invalid email format";

		}

		else {
			$sender = test_input($_POST["sender"]);
		}



		if (empty($_POST["subject"])) {
			$subErr = "You must enter subject";
		}



		else {
			$subject = test_input($_POST["subject"]);



		}




		if (empty($_POST["body"])) {
			$bodyErr = "You must enter body";
		}



		else {
			$body = test_input($_POST["body"]);
		}




	}









	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



?>

	<h2 style="font-family: verdana;" /h2>
		Welcome to Professional Email Sender! <img src="int" alt="Smiley face"
			style="float: right; width: 300px; height: 300px;">
	</h2>
	<p>
		<span class="error">* required field.</span>
	</p>
	<form method="post"
		action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		To: <input type="text" name="recipient"
			value="<?php echo $recipient;?>"> <span class="error">* <?php echo $recErr;?>
		</span> <br> <br> From: <input type="text" name="sender"
			value="<?php echo $sender;?>"> <span class="error">* <?php echo $sendErr;?>
		</span> <br> <br> Subject: <input type="text" name="subject"
			value="<?php  echo $subject  ?>"> <span class="error">*<?php echo $subErr;?>
		</span> <br> <br> Body:
		<textarea name="body" rows="5" cols="40">
			<?php echo $body;?>
		</textarea>
		<span class="error">*<?php echo $bodyErr;?>
		</span> <br> <br> <input type="submit" name="submit" value="Submit">
	</form>

	<?php
	echo "<h2>Testing:</h2>";
	echo $recipient;
	echo "<br>";
	echo $sender;
	echo "<br>";
	echo $subject;
	echo "<br>";
	echo $body;
	echo "<br>";

	
	if(filter_var($recipient, FILTER_VALIDATE_EMAIL) and filter_var($sender, FILTER_VALIDATE_EMAIL)){

$header = '';
 
// Send email
if (mail($recipient, $subject, $body, $header,"-f $sender")) 
	echo "Sent";
} else {
	echo "Error";
}







}
?>
	<img src="email2" alt="Smiley face"
		style="float: middle; width: 1655px; height: 610px;">
</body>
</html>
