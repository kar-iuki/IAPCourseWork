<?php
//require_once "load.php";
//print $Obj->user_age("Alex", 2004);

//public function about_content(){

//}

require "load.php";
$ObjLayouts->heading();
$ObjMenus->main_menu();
$ObjHeadings-> main_banner();
$ObjCont->main_content();
$ObjCont->side_bar();
$ObjLayouts->footer();

?>
