<?php
$mysqli = new mysqli("remotemysql.com","jxY5yDKprV","vz8LMspWAn"," jxY5yDKprV");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>
