<?php
// class auto load
function classAutoLoad($classname){
    $directories=["contents","Layout", "menus"];

    foreach($directories AS $directory){
        $filename = dirname(__FILE__).DIRECTORY_SEPARATOR. $directory . DIRECTORY_SEPARATOR. $classname. ".php";
        if(file_exists($filename) AND is_readable($filename)){
            require_once $filename;
        }
    }
}
spl_autoload_register("classAutoLoad");


//require_once "Layout/layout.php";
$ObjLayouts = new layouts();
//require_once "menus/menus.php";
$ObjMenus = new menus();
//require_once "contents/headings.php";
$ObjHeadings = new headings();
$ObjCont = new contents();

require "includes/constants.php";
require "includes/dbConnection.php";

$conn = new dbConnection(DBTYPE, HOSTNAME, DBPORT, HOSTUSER, HOSTPASS, DBNAME);




//print dirname(_FILE_);
//print "<br>";
//print "<br>";
//print $_SERVER["PHP_SELF"];
//print "<br>";
//print "<br>";
//print basename($_SERVER["PHP_SELF"]);
//print "<br>";
//print "<br>";

//if(file_exists("index.php")){
//    print "yes";
//}
//else{
//    print "no";
//}
?>