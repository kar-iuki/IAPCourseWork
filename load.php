<?php
// class auto load
function classAutoLoad($classname){
    $directories=["contents","Layout", "menus", "forms", "global", "processes"];

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
$ObjForm= new user_forms();
$ObjGlob = new fncs();
$ObjSendMail = new SendMail();

require "includes/constants.php";
require "includes/dbConnection.php";
require "lang/en.php";

$conn = new dbConnection(DBTYPE, HOSTNAME, DBPORT, HOSTUSER, HOSTPASS, DBNAME);

    $ObjAuth = new auth();
    $ObjAuth->signup($conn, $ObjGlob, $ObjSendMail, $lang, $conf);
    $ObjAuth->verify_code($conn, $ObjGlob, $ObjSendMail, $lang, $conf);




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