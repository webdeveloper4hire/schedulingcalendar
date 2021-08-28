<?php require_once('../Connections/calendarcon.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_connection, $connection);
$query_rssched = "SELECT * FROM sched_tb WHERE sched_id = " . $_GET['sched_id'] . "";
$rssched = mysql_query($query_rssched, $connection) or die(mysql_error());
$row_rssched = mysql_fetch_assoc($rssched);
$totalRows_rssched = mysql_num_rows($rssched);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="Php Error Message" />
<meta name="Keywords" content="error message, php, mysql, perl, framework, microsoft, windows, linux, server, host, tutorial, how to fix error message" />
<meta name="Author" content="webdeveloper4hire@gmail.com" />
<meta name="Distribution" content="Global" />
<title><?php echo $clientalias ;?></title>
<style type="text/css">

::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	-webkit-box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
</head>
<body>
<div id="container">

<h1>Scheduled Zoom Meeting</h1>
<p>
<?php do { ?>
<table border="0" cellpadding="5" cellspacing="0">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Title:</td>
      <td><?php echo $row_rssched['title']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Division:</td>
      <td><?php echo $row_rssched['division']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Secretariat:</td>
      <td><?php echo $row_rssched['co_host_person']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Secretariat Email:</td>
      <td><?php echo $row_rssched['contact_email']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Date:</td>
      <td><?php echo $row_rssched['start_date']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Time:</td>
      <td><?php echo $row_rssched['start_time']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">End Date:</td>
      <td><?php echo $row_rssched['end_date']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">End Time:</td>
      <td><?php echo $row_rssched['end_time']; ?></td>
    </tr>
    <!--<tr valign="baseline">
      <td nowrap="nowrap" align="right">Meeting ID:</td>
      <td><?php echo $row_rssched['meeting_id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td><?php echo $row_rssched['password']; ?></td>
    </tr>-->
    <tr>
      <td nowrap="nowrap" align="right">Attachment:</td>
      <td><a href="<?php echo $row_rssched['others']; ?>">VIEW</a></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Approved:</td>
      <td><a href="edit_sched.php?sched_id=<?php echo $row_rssched['sched_id']; ?>" title="Update"><?php echo $row_rssched['approved']; ?></a></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Options:</td>
      <td><a href="index.php">BACK TO ZOOM CALENDAR</a><br />
      <a href="upload_form.php">ADD ZOOM MEETING/WEBINAR</a>
      </td>
    </tr>
  </table>
  <?php } while ($row_rssched = mysql_fetch_assoc($rssched)); ?>
  </p>
</body>
</html>
<?php
mysql_free_result($rssched);
?>