<!DOCTYPE html>
<html>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <link type="text/css" rel="stylesheet" href="https://siiha.000webhostapp.com/styles.css">
</head>
<?php
require_once('../menu1.php');
$photo="photo";
$d = dir(getcwd());
echo "<div>";
while (($file = $d->read()) !== false){
if (strpos($file,".jpg")==true){echo "<img src=\"$file\" alt=\"$file\" width=\"256\" height=\"256\">";
}}
echo "</div>";
?>
</body>
</html>
