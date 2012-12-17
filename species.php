<?php
$title = 'Species';
include('connect.php');
include('header.php');
?>
<?php 
$genus = '';
$res = mysql_query("select id, genus, species from corals order by genus, species");
$genus = array();
$lastGenus = '';
while( $row = mysql_fetch_assoc($res) ) {
  if( $lastGenus != $row['genus'] ) {
    $lastGenus = $row['genus'];
    $genus[$row['genus']] = array();
  }
  $genus[$row['genus']][] = '<a href="' . $row['id'] . '.php">' . "{$row['genus']} {$row['species']}</a>\n";
}
$columns = 3;
foreach( $genus as $name => $list ) {
  print("<div class=\"genus\">\n");
  print("<h2>$name</h2>\n");
  print("<hr>\n");

  $items = ceil(count($list)/$columns);
  if( $items < 4 ) { $items = count($list); }
  $count = 0;
  print("<div class=\"column\">\n");
  foreach( $list as $link ) {
    if( $count++ >= $items ) {
      $count = 1;
      print("</div>\n<div class=\"column\">\n");
    }
    print $link;
  }
  print("</div>");
  print("</div>");
  print("<br style=\"clear: both;\">\n");
}
?>
</div>


<?php
include('footer.php');
?>
