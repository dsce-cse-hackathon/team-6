<html>
    <head><title>Attendance</title></head>
    <body>
        <script src="script.js"></script>
        <h1>This card belongs to</h1>

          <?php
          include 'webapp-get-example.php';
          echo $rest;
// create a connection between php and mysql database
$hostname = "localhost";

$username = "root";

$password = "";

// your database name
$databaseName = "root";

// create The connection
$connect = mysqli_connect($hostname, $username, $password);
mysqli_select_db($connect, $databaseName);

// the mysql query
$query = "SELECT name FROM `users` WHERE id=1";

$result = mysqli_query($connect, $query);

// using while loop to dispaly data from database
while($row = mysqli_fetch_array($result))
  {

    echo "$row[0] <br>";

  }
  
// free your result
  mysqli_free_result($result);

// close the connection
  mysqli_close($connect);
 ?>
 
    </body>
</html>