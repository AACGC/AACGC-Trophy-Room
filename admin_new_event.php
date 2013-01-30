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
exit;
}

require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");
$rs = new form;
$fl = new e_file;
$cal = new DHTML_Calendar(true);
function headerjs()
{
	global $cal;
	require_once(e_HANDLER."calendar/calendar_class.php");
	$cal = new DHTML_Calendar(true);
	return $cal->load_files();
}
$offset = +0;
$time = time()  + ($offset * 60 * 60);

//-----------------------------------------------------------------------------------------------------------+
if ($_POST['add_event'] == '1') {
$neweventname = $_POST['event_name'];
$neweventplace = $_POST['event_place'];
$neweventdate = $_POST['event_date'];
$neweventdet = $_POST['event_txt'];

$reason = "";
$newok = "";

if (($neweventname == "")){
	$newok = "0";
	$reason = "No Name For Event";
} else {
	$newok = "1";
}

If ($newok == "0"){
 	$newtext = "
 	<center>
	<b><br><br> ".$reason."
	</center>
 	</b>
	";
	$ns->tablerender("", $newtext);}

If ($newok == "1"){
$sql->db_Insert("aacgc_trophy_room", "NULL, '".$neweventname."', '".$neweventplace."', '".$neweventdate."', '".$neweventdet."'") or die(mysql_error());
$ns->tablerender("", "<center><b>Event Added</b></center>");
}}

//-----------------------------------------------------------------------------------------------------------+
$text = "
<form method='POST' action='admin_new_event.php'>
<br>
<center>
<div style='width:100%'>
<table style='width:80%' class='fborder' cellspacing='0' cellpadding='0'>";

$text .= "
        <tr>
        <td style='width:100px; text-align:right' class='forumheader3'>Event Name:</td>
        <td style='width:100%' class='forumheader3'>
        <input class='tbox' type='text' name='event_name' size='50'>
        </td>
        </tr>";


$text .="<tr>
         <td style='width:100px; text-align:right' class='forumheader3'>Date:</td><td style='width:60%' class='forumheader3'>";

$text .= $cal->make_input_field(
           array('firstDay'       => 1, // show Monday first
                 'showsTime'      => true,
                 'showOthers'     => true,
                 'ifFormat'       => '%d/%m/%Y %I:%M %P',
                 'weekNumbers'    => false,
                 'timeFormat'     => '12'),
           array('style'       => 'color: #840; background-color: #ff8; border: 1px solid #000; text-align: center',
                 'name'        => 'event_date',
                 'value'       => date("d/m/Y h:i a", $time)));
					
$text .="</td>
        </tr>
		<tr>
        <td style='width:100px; text-align:right' class='forumheader3'>Place Achieved:</td>
        <td style='width:0%' class='forumheader3'>
		<select name='event_place' size='1' class='tbox' style='width:100px'>
		<option name='event_place' value='1'>1st</option>
		<option name='event_place' value='2'>2nd</option>
		<option name='event_place' value='3'>3rd</option>
        </td>
	</tr>
        <tr>
        <td style='width:100px; text-align:right' class='forumheader3'>Event Details:</td>
        <td style='width:100%' class='forumheader3'>
	        <textarea class='tbox' rows='5' cols='75' name='event_txt'></textarea>
        </td>
        </tr>

";

$text .= "</div>
        </td>
	</tr>
		
        <tr style='vertical-align:top'>
        <td colspan='2' style='text-align:center' class='forumheader'>
		<input type='hidden' name='add_event' value='1'>
		<input class='button' type='submit' value='Add Event'>
		</td>
        </tr>
</table>
</div>
<br>
</form>";
	      $ns -> tablerender("AACGC Trophy Room (Create New Event)", $text);
	      require_once(e_ADMIN."footer.php");
?>

