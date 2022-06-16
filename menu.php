<body><?php
function menu(){
echo "<menu>";
 $glob = array_map("basename", glob("*", GLOB_ONLYDIR));
foreach($glob as $file){
echo "<a href=\"$file\">".$file."</a>\n";
}
echo "</menu>";
}
menu()
?>