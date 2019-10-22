<?php
session_start();

function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 

// Opens a connection to a MySQL server
$connection=mysql_connect ('localhost', 'ruaz2865_mpdk', '081268680908');
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db('ruaz2865_mpdk', $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

if(!empty($_GET['id_peserta'])){
	$and = " and id_peserta= '".$_GET['id_peserta']."'";
}else{
	$and = "";
}

	$query = "SELECT * FROM peserta WHERE 1 ".$and." order by id_peserta asc";
	$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
$i=1;
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'nama="' . parseToXML(strtoupper($row['nama_peserta'])) . '" ';
  echo 'address="' . parseToXML($row['alamat']) . '" ';
  echo 'email="' . parseToXML($row['email']) . '" ';
  echo 'nope="' . parseToXML($row['nope']) . '" ';
  echo 'ket="' . parseToXML($row['ket']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'id="' . $row['id_peserta'] . '" ';
  echo '/>';
  $i++;
}

// End XML file
echo '</markers>';

?>