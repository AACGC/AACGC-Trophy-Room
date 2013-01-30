<?php

/*
#######################################
#     AACGC Trophy Room               #                
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/



global $sc_style;

//-----------------------------------------+

if($pref['et_theme'] == "None"){
$themea = "";
$themeb = "";
$themec = "";
$mtbgcolor = "";
$itbgcolor = "";
$tdbgcolor = "";}

if($pref['et_theme'] == "Layout 1"){
$themea = "forumheader3";
$themeb = "forumheader3";
$themec = "forumheader3";
$mtbgcolor = "";
$itbgcolor = "";
$tdbgcolor = "";}

if($pref['et_theme'] == "Layout 2"){
$themea = "indent";
$themeb = "indent";
$themec = "indent";
$mtbgcolor = "";
$itbgcolor = "";
$tdbgcolor = "";}

if($pref['et_theme'] == "Layout 3"){
$themea = "forumheader3";
$themeb = "indent";
$themec = "indent";
$mtbgcolor = "";
$itbgcolor = "";
$tdbgcolor = "";}


if($pref['et_theme'] == "Custom"){
$themea = "";
$themeb = "";
$themec = "";
$mtbgcolor = "bgcolor='#".$pref['et_ctheme_mtbgcolor']."'";
$itbgcolor = "bgcolor='#".$pref['et_ctheme_itbgcolor']."'";
$tdbgcolor = "bgcolor='#".$pref['et_ctheme_tdbgcolor']."'";}

//-------------------------------------------+

//-------------------------Menu Title--------------------------+

$etmenu_title .= "".$pref['et_menu_title']."";

//-------------------------------------------------------------+



$etmenu_text .= "<marquee height='".$pref['et_menu_height']."px' scrollamount='".$pref['et_menu_scrollspeeds']."' onMouseover='this.scrollAmount=".$pref['et_menu_scrollspeedin']."' onMouseout='this.scrollAmount=".$pref['et_menu_scrollspeedout']."' direction='up' loop='true'>
<table style='width:100%' class='' ".$mtbgcolor.">";

        $sql ->db_Select("aacgc_trophy_room", "*", "ORDER BY event_id ASC LIMIT 0,".$pref['et_menu_itemcount']."","");
        while($row = $sql ->db_Fetch()){

$etmenu_text .= "
<tr>
<td style='width:100%' class='".$themeb."' ".$pref['et_ctheme_tdbgcolor']."><a href='".e_PLUGIN."aacgc_trophy_room/Event_Details.php?det.".$row['event_id']."'>".$row['event_name']."</a></td>
<td style='width:0%' class='".$themeb."' ".$pref['et_ctheme_tdbgcolor'].">".$row['event_date']."</td>
</tr>
";}


$etmenu_text .= "</table></marquee>";



//--------------------------------------------------------------------+








$ns -> tablerender($etmenu_title, $etmenu_text);


?>