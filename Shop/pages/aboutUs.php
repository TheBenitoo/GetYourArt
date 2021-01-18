<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<title> WebSite 1.0 </title>
<?php
    include "../includes/header.php"
?>
</head>

<body>

<?php
  include "../includes/navbar.php"
?>



<body>
<p> Hello </p>
<p> Hello </p>
<p> Hello </p>
<p> Hello </p>
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>