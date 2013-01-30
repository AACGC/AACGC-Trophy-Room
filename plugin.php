<?php

/*
#######################################
#     AACGC Trophy Room               #                
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/



$eplug_name = "AACGC Trophy Room";
$eplug_version = "1.7";
$eplug_author = "M@CH!N3";
$eplug_url = "http://www.aacgc.com";
$eplug_email = "admin@aacgc.com";
$eplug_description = "Trophy Room Page that lists events with trophy images for 1st, 2nd, & 3rd with detail page to show more details of event with list of users who participated. Includes menu for latest events with option to set how many events shown in scrolling section.";
$eplug_compatible = "";
$eplug_readme = "";
$eplug_compliant = FALSE;
$eplug_module = FALSE;
$eplug_status = FALSE;
$eplug_latest = FALSE;


$eplug_folder      = "aacgc_trophy_room";

$eplug_menu_name   = "AACGC_Trophy_Room";

$eplug_conffile    = "admin_main.php";

$eplug_logo        = "";
$eplug_icon        = e_PLUGIN."aacgc_trophy_room/images/icon_32.png";
$eplug_icon_small  = e_PLUGIN."aacgc_trophy_room/images/icon_16.png";
$eplug_caption     = "AACGC Trophy Room";  

$eplug_prefs = array(
"et_pagetitle" => "Trophy Room",
"et_colums" => "3",
"et_menu_itemcount" => "10",
"et_menu_title" => "Trophy Room Events",
"et_menu_scrollspeeds" => "2",
"et_menu_scrollspeedin" => "0",
"et_menu_scrollspeedout" => "2",
"et_menu_height" => "300",
"et_trophy1_size" => "150",
"et_trophy2_size" => "150",
"et_trophy3_size" => "150",
"et_trophyd1_size" => "200",
"et_trophyd2_size" => "200",
"et_trophyd3_size" => "200",
"et_trophym1_size" => "25",
"et_trophym2_size" => "25",
"et_trophym3_size" => "25",
"et_avatar_size" => "25",
"et_enable_gold" => "0",
"et_enable_menutrophies" => "",
"et_enable_avatar" => "",
"et_enable_menuedate" => "",
"et_enable_menuplace" => "",
"et_enable_menuecount" => "",
"et_enable_menupcoun" => "",
"et_event_order" => "event_id",
"et_event_ordertype" => "ASC",
"et_theme" => "None",
);


$eplug_table_names = array("aacgc_trophy_room", "aacgc_trophy_room_details");

$eplug_tables = array(

"CREATE TABLE ".MPREFIX."aacgc_trophy_room(event_id int(11) NOT NULL auto_increment,event_name varchar(50) NOT NULL,event_place text NOT NULL,event_date text NOT NULL,event_detail text NOT NULL, PRIMARY KEY  (event_id)) ENGINE=MyISAM;",

"CREATE TABLE ".MPREFIX."aacgc_trophy_room_details(eventdet_id int(11) NOT NULL auto_increment,eventdet_tracker_id int(11) NOT NULL,user_id varchar(11) NOT NULL, PRIMARY KEY  (eventdet_id)) ENGINE=MyISAM;");


$eplug_link      = TRUE;
$eplug_link_name = "Trophy Room";
$eplug_link_url  = e_PLUGIN."aacgc_trophy_room/Events.php";

$eplug_done = "Install Complete";
$eplug_upgrade_done = "Upgrade Complete";


//----# Upgrading #----+

$upgrade_alter_tables = "";
$upgrade_remove_prefs = "";

$upgrade_add_prefs = array(
"et_pagetitle" => "Trophy Room",
"et_colums" => "3",
"et_menu_itemcount" => "10",
"et_menu_title" => "Trophy Room Events",
"et_menu_scrollspeeds" => "2",
"et_menu_scrollspeedin" => "0",
"et_menu_scrollspeedout" => "2",
"et_menu_height" => "300",
"et_trophy1_size" => "150",
"et_trophy2_size" => "150",
"et_trophy3_size" => "150",
"et_trophyd1_size" => "200",
"et_trophyd2_size" => "200",
"et_trophyd3_size" => "200",
"et_trophym1_size" => "25",
"et_trophym2_size" => "25",
"et_trophym3_size" => "25",
"et_avatar_size" => "25",
"et_enable_gold" => "0",
"et_enable_menutrophies" => "",
"et_enable_avatar" => "",
"et_enable_menuedate" => "",
"et_enable_menuplace" => "",
"et_enable_menuecount" => "",
"et_enable_menupcoun" => "",
"et_event_order" => "event_id",
"et_event_ordertype" => "ASC",
"et_theme" => "None",
);

?>
