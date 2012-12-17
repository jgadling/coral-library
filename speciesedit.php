<?php
if( !preg_match('/^\d+$/', $_REQUEST['coral_id']) ) {
  exit;
}
include('connect.php');
?>
<html>
<head><title>Edit</title></head>
<body>
<form action="speciesedit.php?coral_id=<?php print $_REQUEST['coral_id']; ?>" method="post">
<input type="hidden" name="coral_id" value="<?php print $_REQUEST['coral_id']; ?>">
<input type="hidden" name="editing" value="1">

<?php
if( $_REQUEST['editing'] ) {
    mysql_query("UPDATE corals SET genus = '" . mysql_real_escape_string($_REQUEST['genus']) . "', species = '" . mysql_real_escape_string($_REQUEST['species']) . "', abundance = '" . mysql_real_escape_string($_REQUEST['abundance']) . "', caption = '" . mysql_real_escape_string($_REQUEST['caption']) . "', similar_species = '" . mysql_real_escape_string($_REQUEST['similar_species']) . "', habitat = '" . mysql_real_escape_string($_REQUEST['habitat']) . "', color = '" . mysql_real_escape_string($_REQUEST['color']) . "' WHERE id = " . mysql_real_escape_string($_REQUEST['coral_id']));
}
$dbrow = mysql_query("select * from corals where id = {$_REQUEST['coral_id']}");
$row = mysql_fetch_assoc($dbrow);
?>
<?php print $row['genus'] . ' ' . $row['species']; ?><br />
Genus: <textarea rows="5" cols="80" wrap="virtual" name="genus"><?php print htmlspecialchars($row['genus']); ?></textarea><br/>
Species: <textarea rows="5" cols="80" wrap="virtual" name="species"><?php print htmlspecialchars($row['species']); ?></textarea><br/>
Description: <textarea rows="5" cols="80" wrap="virtual" name="caption"><?php print htmlspecialchars($row['caption']); ?></textarea><br/>
Similar Species: <textarea rows="5" cols="80" wrap="virtual" name="similar_species"><?php print htmlspecialchars($row['similar_species']); ?></textarea><br/>
Color: <textarea rows="5" cols="80" name="color" wrap="virtual"><?php print htmlspecialchars($row['color']); ?></textarea><br/>
Habitat: <textarea rows="5" cols="80" name="habitat" wrap="virtual"><?php print htmlspecialchars($row['habitat']); ?></textarea><br/>
Abundance: <textarea rows="5" cols="80" name="abundance" wrap="virtual"><?php print htmlspecialchars($row['abundance']); ?></textarea><br/>

<input type="submit" name="submit" value="submit">

</body>

</html>
