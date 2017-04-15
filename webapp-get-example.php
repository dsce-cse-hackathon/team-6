<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance Management System</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
	<style type="text/css">
	.header {
		text-align: center;
}
    </style>
  </head>
<body>
  <div class="container">
  	<br/>
  	<div class="jumbotron">
  		<h1 class="header">Welcome to<br/>NFC based<br/>Attendance System</h1>
  		<p><span class="glyphicon glyphicon-chevron-right"></span>Install NFC Tools on your Device!</p>
  		<p><span class="glyphicon glyphicon-chevron-right"></span> Click on button below and tap on the card!</p>
  	<?php 
		
	//initial call back domain
	$callback = "http://dsce.in/hackathon/webapp-get-example.php";
		
	//Adding callback tag infos.
	$callback .= "?tagid={TAG-ID}";
	$callback .= "&tagsize={TAG-SIZE}";
	$callback .= "&tagmaxsize={TAG-MAXSIZE}";
	$callback .= "&tagtype={TAG-TYPE}";
	$callback .= "&tagiswritable={TAG-ISWRITABLE}";
	$callback .= "&tagcanmakereadonly={TAG-CANMAKEREADONLY}";
		
	//Adding callback tag records.
	$callback .= "&ndef-text={NDEF-TEXT}";
	$callback .= "&ndef-uri={NDEF-URI}"; 
		
    	//Just an anchor
	$callback .= "#result";
	?>
  		<p><a class="btn btn-primary btn-lg" role="button" href="nfc://scan/?callback=<?php echo urlencode($callback); ?>"><span class="glyphicon glyphicon-hand-up"></span> Touch to scan NFC Tag</a></p>
	</div>
	</header>
	
	<?php 
	if (isset($_GET["tagid"])){
	?>
	
	<br/><br/>
	<a name="result"></a>
	<div class="jumbotron">
	
  		<h1>Results</h1>
  		
  		<?php
  		//Recover TAG ID
  		if (isset($_GET["tagid"]) && !empty($_GET["tagid"])){
  		?>
  			<p><span class="glyphicon glyphicon-tag"></span> TAG ID</p>
  			<div class="panel panel-default">
			  <div class="panel-body">
			    <?php echo $_GET["tagid"]; ?>
			  </div>
			</div>
  			<?php	
  		}
  		?>
		
		<?php
		//Recover TAG SIZE
  		if (isset($_GET["tagsize"]) && !empty($_GET["tagsize"])){
  		?>
  			<p><span class="glyphicon glyphicon-tag"></span> TAG SIZE</p>
  			<div class="panel panel-default">
			  <div class="panel-body">
			    <?php echo $_GET["tagsize"]; ?>
			  </div>
			</div>
  			<?php	
  		}
  		?>
		
		<?php
		//Recover TAG MAX SIZE
  		if (isset($_GET["tagmaxsize"]) && !empty($_GET["tagmaxsize"])){
  		?>
  			<p><span class="glyphicon glyphicon-tag"></span> TAG MAX SIZE</p>
  			<div class="panel panel-default">
			  <div class="panel-body">
			    <?php echo $_GET["tagmaxsize"]; ?>
			  </div>
			</div>
  			<?php	
  		}
  		?>
		
		<?php
		//Recover TAG TYPE
  		if (isset($_GET["tagtype"]) && !empty($_GET["tagtype"])){
  		?>
  			<p><span class="glyphicon glyphicon-tag"></span> TAG TYPE</p>
  			<div class="panel panel-default">
			  <div class="panel-body">
			    <?php echo $_GET["tagtype"]; ?>
			  </div>
			</div>
  			<?php	
  		}
  		?>
	
		<?php
		//Recover TAG IS WRITABLE
  		if (isset($_GET["tagiswritable"]) && !empty($_GET["tagiswritable"])){
  		?>
  			<p><span class="glyphicon glyphicon-tag"></span> TAG IS WRITABLE ?</p>
  			<div class="panel panel-default">
			  <div class="panel-body">
			    <?php echo $_GET["tagiswritable"]; ?>
			  </div>
			</div>
  			<?php	
  		}
  		?>
  		
		<?php
		//Recover TAG CAN MAKE READ ONLY
  		if (isset($_GET["tagcanmakereadonly"]) && !empty($_GET["tagcanmakereadonly"])){
  		?>
  			<p><span class="glyphicon glyphicon-tag"></span> TAG CAN MAKE READ ONLY ?</p>
  			<div class="panel panel-default">
			  <div class="panel-body">
			    <?php echo $_GET["tagcanmakereadonly"]; ?>
			  </div>
			</div>
  			<?php	
  		}
  		?>
		
  		<?php
  		//Recover NDEF TEXT
  		if (isset($_GET["ndef-text"]) && !empty($_GET["ndef-text"])){
  		?>
  			<p><span class="glyphicon glyphicon-tag"></span> NDEF-TEXT</p>
  			<div class="panel panel-default">
			  <div class="panel-body">
			    <?php echo $_GET["ndef-text"]; ?>
			  </div>
			</div>
  			<?php	
  		}
  		?>
		
		<?php
		//Recover NDEF URL
  		if (isset($_GET["ndef-uri"]) && !empty($_GET["ndef-uri"])){
  		?>
  			<p><span class="glyphicon glyphicon-tag"></span> NDEF-URI</p>
  			<div class="panel panel-default">
			  <div class="panel-body">
			    <?php echo $_GET["ndef-uri"]; ?>
			  </div>
			</div>
  			<?php	
  		}
  		?>
	</div>
	<?php 
	}
	$actual_link = 'http://'.$_SERVER['REQUEST_URI'].$_SERVER['PHP_SELF'];
	//echo $actual_link;
	$rest = substr($actual_link, -229, 11);
	echo $rest;
	//header("location:inside.php"); 
	?>	
</div>

<?php
// create a connection between php and mysql database
$hostname = "localhost";

$username = "dscecse";

$password = "sg3043il";

// your database name
$databaseName = "dscecse";

// create The connection
$connect = mysqli_connect($hostname, $username, $password);
mysqli_select_db($connect, $databaseName);

// the mysql query
$query = "SELECT name FROM table WHERE rfid='$rest'";

$result = mysqli_query($connect, $query);
echo "$result";

// using while loop to dispaly data from database
while($row = mysqli_fetch_array($result))
  {

    echo "$row[0] <br>";
	

  }

// free your result
  mysqli_free_result($result);
	// close the connection
  mysqli_close($connect);
	
// create The connection
$connect = mysqli_connect($hostname, $username, $password);
mysqli_select_db($connect, $databaseName);
 $quer = "INSERT INTO user (rfid) VALUES('$rest')";
 $resul = mysqli_query($connect, $quer);

// using while loop to dispaly data from database
while($rw = mysqli_fetch_array($resul))
  {

    echo "$rw[0] <br>";
	

  }

// free your result
  mysqli_free_result($result);
// close the connection
  mysqli_close($connect);
 ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<!--<script src="script.js"></script>-->
		
  </body>
</html>
</body>
</html>
