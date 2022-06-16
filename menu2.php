
<body><?php
function menu2(){
echo "<menu>";
 $glob = array_map("basename", glob("*.php"));
foreach($glob as $file){
echo "<a href=\"$file\">".$file."</a>\n";
}
echo "</menu>";
}
menu2()
?>