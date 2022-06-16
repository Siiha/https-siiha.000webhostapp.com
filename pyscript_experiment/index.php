<!DOCTYPE html>
<html>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head><title>pyscript_experiment</title>
<link type="text/css" rel="stylesheet" href="https://siiha.000webhostapp.com/styles.css">
</head>
<?php
require_once('../menu1.php');
?>
<?php
require_once('../menu2.php');
?>
<?php
$d = dir(getcwd());
echo "<div>";
while (($file = $d->read()) !== false){
if (strpos($file,".webm")==true){echo "<video width=\"395\" height=\"315\" controls><source src=\"$file\" type=\"video/webm\"></video>\n";
}}
echo "</div>";
?>
</body>