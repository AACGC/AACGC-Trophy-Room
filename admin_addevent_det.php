<?php

/*
#######################################
#     AACGC Trophy Room               #                
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/


require_once("../../class2.php");
if(!getperms("P")) {
echo "";
exit;}

require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");
$rs = new form;
$fl = new e_file;

//-----------------------------------------------------------------------------------------------------------+
if ($_POST['eventtodb'] == "1") {
$eventid = $_POST['event_id'];
$eventdetid =  $_POST['eventdet_tracker_id'];
$uid = $_POST['user_id'];
$sql->db_Select("user", "*", "WHERE user_id = '".$uid."'","");
while($row = $sql->db_Fetch())
{$usern2 = $row[user_name];}

$sql->db_Insert("aacgc_trophy_room_details", "NULL, '".$eventdetid."', '".$uid."'");

$txt = "<center><b>".$usern2." Added To Event</b><center>";
$ns -> tablerender("", $txt);}


if (isset($_POST['main_delete'])) {
        $delete_id = array_keys($_POST['main_delete']);
	$sql2 = new db;
        $sql2->db_Delete("aacgc_trophy_room_details", "eventdet_id='".$delete_id[0]."'");
}

//-----------------------------------------------------------------------------------------------------------+


//-----------------------------------------------------------------------------------------------------------------------------


$text .= "<form method='POST' action='admin_addevent_det.php'>
	 <br>
	 <center>
	 <div style='width:100%'>
	 <table style='width:60%' class='fborder' cellspacing='0' cellpadding='0'>
	 <tr>
	 <td style='width:30%; text-align:right' class='forumheader3'>Member:</td>
	 <td style='width:70%' class='forumheader3'>
	 <select name='user_id' size='1' class='tbox' style='width:100%'>";

	 
$sql->db_Select("user", "user_id, user_name", "ORDER BY user_name ASC","");
while($row = $sql->db_Fetch()){
$usern = $row[user_name];
$userid = $row[user_id];
		

$text .= "<option name='user_id' value='".$userid."'>".$usern."</option>";}

$text .= "</td>
          </tr>
          <tr>
          <td style='width:30%; text-align:right' class='forumheader3'>Event:</td>
          <td style='width:70%' class='forumheader3'>
	  <select name='eventdet_tracker_id' size='1' class='tbox' style='width:100%'>";
	
$sql->db_Select("aacgc_trophy_room", "event_id, event_name", "ORDER BY event_id ASC","");
while($row = $sql->db_Fetch()){
        

$text .= "<option name='eventdet_tracker_id' value='".$row['event_id']."'>".$row['event_name']."</option>";}
        
$text .= "</div>
	  </td>
	  </tr>
          <tr>
          <td colspan='2' style='text-align:center' class='forumheader'>
	  <input type='hidden' name='eventtodb' value='1'>
	  <input class='button' type='submit' value='Add User' style='width:150px'>
	  </td>
          </tr>
          </table>
          </form>
          <br>";

//----------------------------------------------------------------------------------------------------------------------------
        
        
$text .= "<br><form method='POST' action='admin_addevent_det.php'>
          <table style='width:95%' class='fborder' cellspacing='0' cellpadding='0'>
          <tr>
          <td colspan='4' class='forumheader'><center><b>Event User List</b></center></td>
          </tr><tr>
          <td style='width:0%' class='forumheader3'>ID</td>
          <td style='width:30%' class='forumheader3'>User</td>
          <td style='width:70%' class='forumheader3'>Event</td>
          <td style='width:0%' class='forumheader3'>Remove</td>
          </tr>";
        
$sql->db_Select("aacgc_trophy_room_details", "*", "ORDER BY eventdet_tracker_id ASC","");
while($row = $sql->db_Fetch()){
$sql2 = new db;
$sql2->db_Select("aacgc_trophy_room", "*", "WHERE event_id='".$row['eventdet_tracker_id']."'","");
$row2 = $sql2->db_Fetch();
$sql3 = new db;
$sql3->db_Select("user", "*", "WHERE user_id='".$row['user_id']."'","");
$row3 = $sql3->db_Fetch();
        
$text .= "<tr>
          <td style='width:' class='forumheader3'>".$row['eventdet_id']."</td>
          <td style='width:' class='forumheader3'>".$row3['user_name']."</td>
          <td style='width:' class='forumheader3'>".$row2['event_name']."</td>
          <td style='width:' class='forumheader3'>
	  <input type='image' title='".LAN_DELETE."' name='main_delete[".$row['eventdet_id']."]' src='".ADMIN_DELETE_ICON_PATH."' onclick=\"return jsconfirm('".LAN_CONFIRMDEL." [ID: {$row['eventdet_id']} ]')\"/>
	  </td>
          </tr>";}

        
$text .= "</table></div>";
        
$text .= "</form>";

//----------------------------------------------------------------------------------------------------------------------------



$ns -> tablerender("AACGC Trophy Room(Add/Remove Users)", $text);

require_once(e_ADMIN."footer.php");


?>