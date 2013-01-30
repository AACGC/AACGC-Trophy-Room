<?php

/*
#######################################
#     AACGC Trophy Room               #
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/


require_once("../../class2.php");
if (!defined('e107_INIT'))
{exit;}
if (!getperms("P"))
{header("location:" . e_HTTP . "index.php");
exit;}
require_once(e_ADMIN . "auth.php");
if (!defined('ADMIN_WIDTH'))
{define(ADMIN_WIDTH, "width:100%;");}

if (e_QUERY == "update")
{
    $pref['et_pagetitle'] = $_POST['et_pagetitle'];
    $pref['et_colums'] = $_POST['et_colums'];
    $pref['et_menu_itemcount'] = $_POST['et_menu_itemcount'];
    $pref['et_menu_title'] = $_POST['et_menu_title'];
    $pref['et_menu_scrollspeeds'] = $_POST['et_menu_scrollspeeds'];
    $pref['et_menu_scrollspeedin'] = $_POST['et_menu_scrollspeedin'];
    $pref['et_menu_scrollspeedout'] = $_POST['et_menu_scrollspeedout'];
    $pref['et_menu_height'] = $_POST['et_menu_height'];

    $pref['et_trophy1_size'] = $_POST['et_trophy1_size'];
    $pref['et_trophy2_size'] = $_POST['et_trophy2_size'];
    $pref['et_trophy3_size'] = $_POST['et_trophy3_size'];
    $pref['et_trophyd1_size'] = $_POST['et_trophyd1_size'];
    $pref['et_trophyd2_size'] = $_POST['et_trophyd2_size'];
    $pref['et_trophyd3_size'] = $_POST['et_trophyd3_size'];
    $pref['et_trophym1_size'] = $_POST['et_trophym1_size'];
    $pref['et_trophym2_size'] = $_POST['et_trophym2_size'];
    $pref['et_trophym3_size'] = $_POST['et_trophym3_size'];

    $pref['et_event_order'] = $_POST['et_event_order'];
    $pref['et_event_ordertype'] = $_POST['et_event_ordertype'];

    $pref['et_avatar_size'] = $_POST['et_avatar_size'];

    $pref['et_theme'] = $_POST['et_theme'];
    $pref['et_ctheme_mtbgcolor'] = $_POST['et_ctheme_mtbgcolor'];
    $pref['et_ctheme_itbgcolor'] = $_POST['et_ctheme_itbgcolor'];
    $pref['et_ctheme_tdbgcolor'] = $_POST['et_ctheme_tdbgcolor'];

if (isset($_POST['et_enable_gold'])) 
{$pref['et_enable_gold'] = 1;}
else
{$pref['et_enable_gold'] = 0;}


if (isset($_POST['et_enable_avatar'])) 
{$pref['et_enable_avatar'] = 1;}
else
{$pref['et_enable_avatar'] = 0;}




if (isset($_POST['et_enable_menutrophies'])) 
{$pref['et_enable_menutrophies'] = 1;}
else
{$pref['et_enable_trophies'] = 0;}

if (isset($_POST['et_enable_menuedate'])) 
{$pref['et_enable_menuedate'] = 1;}
else
{$pref['et_enable_menuedate'] = 0;}

if (isset($_POST['et_enable_menuplace'])) 
{$pref['et_enable_menuplace'] = 1;}
else
{$pref['et_enable_menuplace'] = 0;}

if (isset($_POST['et_enable_menuecount'])) 
{$pref['et_enable_menuecount'] = 1;}
else
{$pref['et_enable_menuecount'] = 0;}

if (isset($_POST['et_enable_menupcount'])) 
{$pref['et_enable_menupcount'] = 1;}
else
{$pref['et_enable_menupcount'] = 0;}




    save_prefs();
    $led_msgtext = "Settings Saved";
}

$admin_title = "AACGC Trophy Room (Settings)";
//--------------------------------------------------------------------


if($pref['et_event_order'] == "event_id")
{$currentorder = "ID";}
if($pref['et_event_order'] == "event_name")
{$currentorder = "Name";}
if($pref['et_event_order'] == "event_date")
{$currentorder = "Date";}
if($pref['et_event_order'] == "event_place")
{$currentorder = "Place";}

$text .= "
<form method='post' action='" . e_SELF . "?update' id='confeventtracker'>
	<table style='" . ADMIN_WIDTH . "' class='fborder'>



		<tr>
			<td colspan='3' class='fcaption'><b>Layout Settings:</b></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Table Class Layout Option:<br><i>Changes the class of table data areas to give them a more detailed appearance. Your theme controls the outlook. Set to Custom and save to have options apear and set your own background colors.</i></td>
                        <td style='width:120px' class=''>
                        <select name='et_theme' size='1' class='tbox' style='width:100px'>
                        <option name='et_theme' value='".$pref['et_theme']."'>".$pref['et_theme']."</option>
                        <option name='et_theme' value='Layout 1'>Layout 1</option>
                        <option name='et_theme' value='Layout 2'>Layout 2</option>
                        <option name='et_theme' value='Layout 3'>Layout 3</option>
                        <option name='et_theme' value='Custom'>Custom</option>
                        <option name='et_theme' value='None'>None</option>
                        </td>
		<tr>";

if($pref['et_theme'] == "Custom")
{$text .= "
        	<tr>
			<td style='width:30%' class='forumheader3'>Main Tables Background color:</td>
			<td colspan='2'  class='forumheader3'>#<input class='tbox' type='text' size='15' name='et_ctheme_mtbgcolor' value='" . $tp->toFORM($pref['et_ctheme_mtbgcolor']) . "' /></td>
		</tr>
        	<tr>
			<td style='width:30%' class='forumheader3'>Inner Tables Background color:</td>
			<td colspan='2'  class='forumheader3'>#<input class='tbox' type='text' size='15' name='et_ctheme_itbgcolor' value='" . $tp->toFORM($pref['et_ctheme_itbgcolor']) . "' /></td>
		</tr>
        	<tr>
			<td style='width:30%' class='forumheader3'>TD Background color:</td>
			<td colspan='2'  class='forumheader3'>#<input class='tbox' type='text' size='15' name='et_ctheme_tdbgcolor' value='" . $tp->toFORM($pref['et_ctheme_tdbgcolor']) . "' /></td>
		</tr>
";}


$text .= "
		<tr>
			<td colspan='3' class='fcaption'><b>Main Settings:</b></td>
		</tr>
	        <tr>
			<td style='width:30%' class='forumheader3'>Page Title:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='25' name='et_pagetitle' value='" . $tp->toFORM($pref['et_pagetitle']) . "' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Number of Colums:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_colums' value='" . $tp->toFORM($pref['et_colums']) . "' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Order Events By:</td>
                        <td style='width:120px' class=''>
                        <select name='et_event_order' size='1' class='tbox' style='width:100px'>
                        <option name='et_event_order' value='".$pref['et_event_order']."'>".$currentorder."</option>
                        <option name='et_event_order' value='event_id'>ID</option>
                        <option name='et_event_order' value='event_name'>Name</option>
                        <option name='et_event_order' value='event_date'>Date</option>
                        <option name='et_event_order' value='event_place'>Place</option>
                        </td>

                        <td style='width:120px' class='forumheader3'>
                        <select name='et_event_ordertype' size='1' class='tbox' style='width:100px'>
                        <option name='et_event_ordertype' value='".$pref['et_event_ordertype']."'>".$pref['et_event_ordertype']."</option>
                        <option name='et_event_ordertype' value='ASC'>ASC</option>
                        <option name='et_event_ordertype' value='DESC'>DESC</option>
                        </td>
		<tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show User Avatars:</td>
		        <td colspan=2 class='forumheader3'>".($pref['et_enable_avatar'] == 1 ? "<input type='checkbox' name='et_enable_avatar' value='1' checked='checked' />" : "<input type='checkbox' name='et_enable_avatar' value='0' />")."</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Avatar Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='et_avatar_size' value='" . $tp->toFORM($pref['et_avatar_size']) . "' />px</td>
		</tr>



		<tr>
			<td colspan='3' class='fcaption'><b>Trophy Size Settings:</b></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>[Main Page] 1st Place Trophy Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_trophy1_size' value='" . $tp->toFORM($pref['et_trophy1_size']) . "' />(width in pixel)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>[Main Page] 2nd Place Trophy Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_trophy2_size' value='" . $tp->toFORM($pref['et_trophy2_size']) . "' />(width in pixel)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>[Main Page] 3rd Place Trophy Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_trophy3_size' value='" . $tp->toFORM($pref['et_trophy3_size']) . "' />(width in pixel)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>[Detail Page] 1st Place Trophy Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_trophyd1_size' value='" . $tp->toFORM($pref['et_trophyd1_size']) . "' />(width in pixel)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>[Detail Page] 2nd Place Trophy Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_trophyd2_size' value='" . $tp->toFORM($pref['et_trophyd2_size']) . "' />(width in pixel)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>[Detail Page] 3rd Place Trophy Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_trophyd3_size' value='" . $tp->toFORM($pref['et_trophyd3_size']) . "' />(width in pixel)</td>
		</tr>";

/*
$text .= "	<tr>
			<td style='width:30%' class='forumheader3'>[Menu] 1st Place Trophy Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_trophym1_size' value='" . $tp->toFORM($pref['et_trophym1_size']) . "' />(width in pixel)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>[Menu] 2nd Place Trophy Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_trophym2_size' value='" . $tp->toFORM($pref['et_trophym2_size']) . "' />(width in pixel)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>[Menu] 3rd Place Trophy Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_trophym3_size' value='" . $tp->toFORM($pref['et_trophym3_size']) . "' />(width in pixel)</td>
		</tr>";

*/


$text .= "	<tr>
			<td colspan='3' class='fcaption'><b>Menu Settings:</b></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Events Menu Title:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='50' name='et_menu_title' value='" . $tp->toFORM($pref['et_menu_title']) . "' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Events Menu Height:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_menu_height' value='" . $tp->toFORM($pref['et_menu_height']) . "' />px  (pixles)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Number of Past Events:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_menu_itemcount' value='" . $tp->toFORM($pref['et_menu_itemcount']) . "' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Scroll Speed On Start:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_menu_scrollspeeds' value='" . $tp->toFORM($pref['et_menu_scrollspeeds']) . "' />  (1 for slow, 10 for fast)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Scroll Speed On Mouseover:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_menu_scrollspeedin' value='" . $tp->toFORM($pref['et_menu_scrollspeedin']) . "' />  (1 for slow, 10 for fast, 0 for it to stop)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Scroll Speed On Mouseout:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='et_menu_scrollspeedout' value='" . $tp->toFORM($pref['et_menu_scrollspeedout']) . "' />  (1 for slow, 10 for fast)</td>
		</tr>




		<tr>
			<td colspan='3' class='fcaption'><b>Extra Settings:</b></td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Enable Gold System Support:</td>
		        <td colspan=2 class='forumheader3'>".($pref['et_enable_gold'] == 1 ? "<input type='checkbox' name='et_enable_gold' value='1' checked='checked' />" : "<input type='checkbox' name='et_enable_gold' value='0' />")."(shows orbs, must have gold sytem 4.x and gold orbs 1.x installed)</td>
	        </tr>

";


/*
$text .= "      <tr>
		        <td style='width:30%' class='forumheader3'>Show Event Trophies:</td>
		        <td colspan=2 class='forumheader3'>".($pref['et_enable_menutrophies'] == 1 ? "<input type='checkbox' name='et_enable_menutrophies' value='1' checked='checked' />" : "<input type='checkbox' name='et_enable_menutrophies' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Event Dates:</td>
		        <td colspan=2 class='forumheader3'>".($pref['et_enable_menuedate'] == 1 ? "<input type='checkbox' name='et_enable_menuedate' value='1' checked='checked' />" : "<input type='checkbox' name='et_enable_menuedate' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Event Place:</td>
		        <td colspan=2 class='forumheader3'>".($pref['et_enable_menuplace'] == 1 ? "<input type='checkbox' name='et_enable_menuplace' value='1' checked='checked' />" : "<input type='checkbox' name='et_enable_menuplace' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Total Events:</td>
		        <td colspan=2 class='forumheader3'>".($pref['et_enable_menuecount'] == 1 ? "<input type='checkbox' name='et_enable_menuecount' value='1' checked='checked' />" : "<input type='checkbox' name='et_enable_menuecount' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Event Counts (total in each place):</td>
		        <td colspan=2 class='forumheader3'>".($pref['et_enable_menupcount'] == 1 ? "<input type='checkbox' name='et_enable_menupcount' value='1' checked='checked' />" : "<input type='checkbox' name='et_enable_menupcount' value='0' />")."</td>
	        </tr>";

*/








$text .= "      <tr>
			<td colspan='3' class='fcaption' style='text-align: left;'><input type='submit' name='update' value='Save Settings' class='button' /></td>
		</tr>


</table>
</form>";





$ns->tablerender($admin_title, $text);
require_once(e_ADMIN . "footer.php");
?>
