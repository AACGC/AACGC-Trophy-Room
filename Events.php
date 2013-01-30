<?php

/*
#######################################
#     AACGC Trophy Room               #                
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/


require_once("../../class2.php");
require_once(HEADERF);



if ($pref['et_enable_gold'] == "1")
{$gold_obj = new gold();}



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

//-----------------------------------------+


$title .= "".$pref['et_pagetitle'].""; 

$text .= "    
        <table style='width:100%' class='' ".$mtbgcolor.">
        <tr>";

$order = $pref['et_event_order'];
$ordertype = $pref['et_event_ordertype'];


        $sql ->db_Select("aacgc_trophy_room", "*", "ORDER BY $order $ordertype","");
        $rows = $sql->db_Rows();
        $pcol = 1;
        for ($i = 0; $i < $rows; $i++){
        $row = $sql->db_Fetch();

        
if ($row['event_place'] == "1"){
$trophy = "<img width='".$pref['et_trophy1_size']."' src='".e_PLUGIN."aacgc_trophy_room/images/1st.png'></img>";}
if ($row['event_place'] == "2"){
$trophy = "<img width='".$pref['et_trophy2_size']."' src='".e_PLUGIN."aacgc_trophy_room/images/2nd.png'></img>";}
if ($row['event_place'] == "3"){
$trophy = "<img width='".$pref['et_trophy2_size']."' src='".e_PLUGIN."aacgc_trophy_room/images/3rd.png'></img>";}

$text .= "<td class='".$themeb."'>
          <table style='width:100%' class='' ".$itbgcolor.">
          <tr><td><center><a href='".e_PLUGIN."aacgc_trophy_room/Event_Details.php?det.".$row['event_id']."'>".$trophy."</a></center></td></tr>
          <tr><td class='".$themeb."' ".$tdbgcolor."><center><a href='".e_PLUGIN."aacgc_trophy_room/Event_Details.php?det.".$row['event_id']."'><font size='3'>".$row['event_name']."</font></a></center></td></tr>
          <tr><td class='".$themeb."' ".$tdbgcolor."><center>".$row['event_date']."</td></tr>
          </table>
          </td>";


if ($pcol == "".$pref['et_colums']."") 
{$text .= "</tr><tr>";
$pcol = 1;}
else
{$pcol++;}}

$text .= "</tr></table>";





//--#AACGC Plugin Copyright&reg; - DO NOT REMOVE BELOW THIS LINE
require(e_PLUGIN . 'aacgc_trophy_room/plugin.php');
$text .= "<br><br><br><br><br><br><br>
<a href='http://www.aacgc.com' target='_blank'><font size='1'>".$eplug_name." V".$eplug_version."  &reg;</font></a>";
//---------------------------------------------------------------





$ns -> tablerender($title, $text);



//----------------------------------------------------------------------------------

require_once(FOOTERF);


