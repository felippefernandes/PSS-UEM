<?php 
session_start();
if(isset($_SESSION['MEDICO'])){ 
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?='ola medico!';?>

</body>
</html>
<?php } else { header("Location: login"); }