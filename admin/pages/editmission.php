<?php
if(!defined("IN_ADMIN"))
{
	die("Direct access is not allowed!");
}
/*
 * File Name: addmission.php
 *
 * Purpose: Add's a mission to the database
 *
 * Author: Dan Taylor
 *
 * Date Created: 29th August 2005
 *
 */
if (isset($_POST["editMission"]))
{
	//print_r($_POST);
	$sql = "UPDATE ".$prefix."_missions 
			SET missiontitle='".$_POST["title"]."', 
				missiondescription='".$_POST["description"]."',
				img='".$_POST["banner"]."'
			WHERE missionid=".$_POST["id"].";";
			
	$result = mysql_query($sql) or die(mysql_error());
	//echo $result;
	echo "<p align=\"center\">Mission Updated<br /><a href=\"switchboard.php?pageref=missions\">Continue</a></p>";
	
}
else
{
$sql = "SELECT * FROM ".$prefix."_missions WHERE missionid=".$_GET["id"].";";
$result = mysql_query($sql) or die(mysql_error());
$mission = mysql_fetch_assoc($result);
?>
<form action="switchboard.php?pageref=editmission" method="post">
<table border="1" align="center">
<tr>
	<td width="20px">Mission Title</td>
	<td align="left"><input type="text" name="title" value="<?php echo stripslashes($mission["missiontitle"]); ?>"/></td>
</tr>
<tr>
	<td colspan="2" style="font-size: xx-small;" width="20px"><b>Note:</b> the title of your mission.</td>
</tr>
<tr>
	<td colspan="2" width="20px">Mission Description</td>
</tr>
<tr>
	<td colspan="2"><textarea name="description" cols="60" rows="20"><?php echo stripslashes($mission["missiondescription"]); ?></textarea></td>
</tr>
<tr>
	<td colspan="2" style="font-size: xx-small;"><b>Note:</b> A textual description of your mission.</td>
</tr>
<tr>
	<td>Mission Banner</td>
	<td><input type="text" name="banner" value="<?php echo stripslashes($mission["img"]); ?>"/></td>
</tr>
<tr>
	<td colspan="2" style="font-size: xx-small;"><b>Note:</b> the mission banner is a filename,<br />please ensure you have uploaded your file to the images/missions/ directory.</td>
</tr>
<tr>
	<td colspan="2"><input type="submit" name="editMission" value="Edit Mission" /></td>
</tr>
</table>
<input type="hidden" name="id" value="<?php echo $mission["missionid"]; ?>" />
</form>
<?php

}

?>