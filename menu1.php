<body><?php
function menu1(){
echo "<menu>";
 $glob = array_map("basename", glob("../*", GLOB_ONLYDIR));
foreach($glob as $file){
echo "<a href=\"../$file\">".$file."</a>\n";
}
echo "<a href=\"https://siiha.000webhostapp.com\">index</a>";
echo "</menu>";
}
menu1()
?>