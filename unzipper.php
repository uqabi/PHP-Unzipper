<?php
$message = "";
if(isset($_GET['unzip'])) {

$zip = new ZipArchive;
$file_to_unzip = $_GET['file_to_unzip'];
$destination_directory = $_GET['destination_directory'];
if ($zip->open($file_to_unzip) === TRUE) {
    $zip->extractTo($destination_directory);
    $zip->close();
    $message = "<div id=\"success\">Extraction successful</div>";
} else {
    $message =  "<div id=\"failure\">Extraction failed</div>";
}
}
?>
<!Doctype html>
<html>
<head>
	<title>PHP unzipper</title>
  <style>
  #success {
  	border:1px solide green;
  	color:green;
  }
  #failure {
  	color: red;
  }
	#form {
		min-height: 100px;
		width: 300px;
		margin:40px auto;
		border: 1px solid grey;
		padding: 15px;
	}
	form {
		width: 100%;
		margin:20px 0;
	}
	input {
		width: 100%;
		margin-bottom:30px;

		
	}
	label {
	}
	</style>
</head>	
<body>
	<div id="form">
	<?php echo $message; ?>
		<form method="get">
			<label for="filetounzip">File to unzip:
			<input type="text" name="file_to_unzip" id="filetounzip" placeholder="fileName.zip" value="<?php echo $file_to_unzip; ?>">
			<label for="destinationdirectory">Destination directory:
			<input type="text" name="destination_directory" id="destinationdirectory" placeholder="http://yoursiteurl/folderName" value="<?php echo $destination_directory; ?>">
            <input type="submit" name="unzip" value="Unzip Now">
		</form>

	</div>
</body>




</html>