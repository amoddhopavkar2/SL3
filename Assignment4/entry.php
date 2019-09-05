<!DOCTYPE html>
<html>
<head>
	<title>Submit your entries</title>
	<link rel="stylesheet" href="form.css">
</head>

<?php
$nameErr = $emailErr = $websiteErr = "";
$name = $email = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }    
  }

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<body>
	<div class="navbar">
		<a href="web.html">Home</a>
		<a href="animals.html">Animals</a>
		<a href="india.html">India</a>
		<a href="ocean.html">Oceans</a>
		<a class="active" onclick="Back()" style="float: right; background-color: #4CAF50">Back</a>
		<div class="dropdown">
			<div class="active">
			<button class="dropbtn">Support 
	    		<i class="fa fa-caret-down"></i>
	    	</button></div>
	    <div class="dropdown-content">
	      	<a href="contact.html">Contact Us</a>
	      	<a href="entry.html">Submit Entries</a>
	    </div>
	  	</div> 
	</div>

	<script>
		function Back()
		{
			window.history.back();
		}
	</script>

	<h1 class="heading">Submit Entries</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		<div class="forms">
			<p>Help us by submiting entries which you feel are worthy enough of being on our website!</p>
			<fieldset class="formCSS" style="padding-top: 30px;">
				<legend class="title">Submit Entries</legend>
				<p><span class="error">* Required field</span></p>

				Name:<br>
				<input class="field" type="text" name="name" placeholder="Name" size="30">
				<span class="error">*  <?php echo $nameErr;?></span>
				<br><br>

				Email-id:<br>
				<input class="field" type="email" name="email" placeholder="Email-id" size="30">
				<span class="error">*  <?php echo $emailErr;?></span>
				<br><br>

				Entry URL:<br>
				<input class="field" type="url" name="website" placeholder="Enter the URL" size="30">
				<span class="error">*  <?php echo $websiteErr;?></span>
				<br><br>
			</fieldset>
			<br>

			<input type="submit" name="submit" value="Submit">
			<input type="reset" name="reset" value="Reset">
		</div>
	</form>
</body>
