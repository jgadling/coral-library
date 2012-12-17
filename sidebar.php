<div id="sidebar">
<h2>Other Species</h2>
<hr>
<?php
$species = mysql_query("select id, genus, species FROM corals WHERE genus = '" . mysql_real_escape_string($coraldata['genus']) . "' order by genus, species");
while( $row = mysql_fetch_assoc($species) ) {
  print("<a href=\"{$row['id']}.php\">{$row['genus']} {$row['species']}</a>\n");
}
?>
<br />
</div>
