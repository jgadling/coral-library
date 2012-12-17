<?php
include('connect.php');
if( !preg_match('/^\d+$/', $_REQUEST['coral_id']) ) {
    // Digits only please.
    exit;
}
$res = mysql_query("select * from corals where id = {$_REQUEST['coral_id']}");
$coraldata = mysql_fetch_assoc($res);

$imgres = mysql_query("select * from coral_images where coral_id = {$_REQUEST['coral_id']}");
$images = array();
while( $imgrow = mysql_fetch_assoc($imgres) ) {
  $images[$imgrow['url']] = $imgrow['caption'];
}

$title = "{$coraldata['genus']} {$coraldata['species']}";
include('header.php');
?>
<div id="coralinfo">
<h1><?php print "{$coraldata['genus']} {$coraldata['species']}"; ?></h1>
<h3><?php print "{$coraldata['surname']}" ?></h3>
<div id="distribution">
  <img src="maps/<?php print $coraldata['map']; ?>" id="distmap" /><br />
  <?php print $coraldata['map_caption']; ?>
</div>
<br />
<span class="description">
<b>Description:</b>
<?php print $coraldata['caption']; ?>
</span>
<br />
<span class="color">
<b>Color:</b> <?php print $coraldata['color']; ?>
</span>
<br />
<span class="habitat">
<b>Habitat:</b> <?php print $coraldata['habitat']; ?>
</span>
<br />
<span class="abundance">
<b>Abundance:</b> <?php print $coraldata['abundance']; ?>
</span>
<br />
<span class="similar">
<b>Similar Species:</b> <?php print $coraldata['similar_species']; ?>
</span>
<br />
<br />
<small class="attribution">
<?php print $coraldata['attribution']; ?>
</small>

<?php foreach( $images as $url => $caption ) { ?>
  <br />
  <img src="images/large/<?php print $url; ?>"><br />
  <?php print $caption; ?><br />
<?php } ?>
</div>
<?php 
include('sidebar.php');
include('footer.php');
?>
