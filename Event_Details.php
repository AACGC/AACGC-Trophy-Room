<?php

/*
#######################################
#     AACGC Trophy Room               #                
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/


                                     
//-----------------------------------------+
                                     


require_once("../../class2.php");
require_once(HEADERF);
if (e_QUERY) {
        $tmp = explode('.', e_QUERY);
        $action = $tmp[0];
        $sub_action = $tmp[1];
        $id = $tmp[2];
        unset($tmp);
}

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

//-------------------------------------------+

$sql->db_Select("aacgc_trophy_room", "*", "event_id = '".intval($sub_action)."'");
$row = $sql->db_Fetch();

if ($row['event_place'] == "1"){
$trophy = "<img width='".$pref['et_trophyd1_size']."' src='".e_PLUGIN."aacgc_trophy_room/images/1st.png'></img>";}
if ($row['event_place'] == "2"){
$trophy = "<img width='".$pref['et_trophyd2_size']."' src='".e_PLUGIN."aacgc_trophy_room/images/2nd.png'></img>";}
if ($row['event_place'] == "3"){
$trophy = "<img width='".$pref['et_trophyd2_size']."' src='".e_PLUGIN."aacgc_trophy_room/images/3rd.png'></img>";}


$text .= "<table style='width:100%' class='' ".$mtbgcolor.">
          <tr>
          <td style='width:0%' class='".$themea."' colspan='2' ".$tdbgcolor."><center>".$trophy."</center></td>
          </tr><tr>
          <td style='width:0%' class='".$themeb."' ".$tdbgcolor."><b>Event:</b></td>
          <td style='width:100%' class='".$themeb."' ".$tdbgcolor.">".$row['event_name']."</td>
          </tr><tr>
          <td style='width:0%' class='".$themeb."' ".$tdbgcolor."><b>Date:</b></td>
          <td style='width:100%' class='".$themeb."' ".$tdbgcolor.">".$row['event_date']."</td>
          </tr><tr>
          <td style='width:0%' class='".$themeb."' ".$tdbgcolor."><b>Details:</b></td>
          <td style='width:100%' class='".$themeb."' ".$tdbgcolor.">".$row['event_detail']."</td>
          </tr>
          </table><br>";


$text .= "<br><table style='width:100%' ".$mtbgcolor.">
          <tr>
          <td style='width:100%' class='".$themea."' ".$tdbgcolor."><center><b><u>Participants:</u></b></td>
          </tr>";
         
        $sql3 = new db;
        $sql3->db_Select("aacgc_trophy_room_details", "*", "eventdet_tracker_id='".intval($row['event_id'])."'");
        while($row3 = $sql3->db_Fetch()){
        $sql2->db_Select("user", "*", "user_id='".intval($row3['user_id'])."'");
        $row2 = $sql2->db_Fetch();

        if ($pref['et_enable_gold'] == "1"){
        $userorb = "".$gold_obj->show_orb($row2['user_id'])."";}
        else
        {$userorb = "".$row2['user_name']."";}

        if ($pref['et_enable_avatar'] == "1"){
	if ($row2['user_image'] == "")
	{$etavatar = "";}
	else
	{$useravatar = $row2[user_image];
	require_once(e_HANDLER."avatar_handler.php");
	$useravatar = avatar($useravatar);
	$etavatar = "<img src='".$useravatar."' width=".$pref['et_avatar_size']."px></img>";}}



$text .= "<tr><td style='width:100%' class='".$themeb."' ".$tdbgcolor."><center><a href='".e_BASE."user.php?id.".$row3['user_id']."'>".$etavatar." ".$userorb."</a></center></td></tr>";}


$text .= "</table>";

$text .= "<br><br><center>[ <a href='".e_PLUGIN."aacgc_trophy_room/Events.php'>Back To Trophy Room</a> ]</center>";         
     

//--#AACGC Plugin Copyright&reg; - DO NOT REMOVE BELOW THIS LINE
require(e_PLUGIN . 'aacgc_trophy_room/plugin.php');
$text .= "<br><br><br><br><br><br><br>
<a href='http://www.aacgc.com' target='_blank'><font size='1'>".$eplug_name." V".$eplug_version."  &reg;</font></a>";
//---------------------------------------------------------------



  $ns -> tablerender("Details", $text);


  require_once(FOOTERF);



?>
