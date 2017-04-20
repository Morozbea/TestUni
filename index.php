<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("vendor/autoload.php");
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use GuzzleHttp\Client;

$log = new Logger('TestUni');
$log->pushHandler(new StreamHandler('unicorns.log', Logger::INFO));

$client = new Client();
$res = $client->request('GET', 'http://unicorns.idioti.se/',[
  "headers" => [
    "Accept" => "application/json"
  ]
]);
$data = json_decode($res->getBody());



?>

<!DOCTYPE html>
<html>

<head>
  <title>Enhörningar</title>
  <h1>Enhörningar</h1>
 <link href="style.css" type="text/css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Raleway" type="text/css" rel="stylesheet" >
 <form action="index.php" method="get">

</head>

<body>
 	<p style="border-bottom: 0.1px solid black;">
		<div class="idEnhörning">
			<h2>id på enhörningar</h2>
			<input type="text" idFor="idUnic"><br>
			<button class="ShowOneU" type="submit" class="msgBtn" onClick="return false;" >Visa enhörning!</button>
			<button class="ShowAllU" type="submit" class="msgBtn" onClick="return false;" >Visa alla enhörningar!</button><br>
			<p style="border-bottom: 0.1px solid black;">
		</div>
	<p>Alla Enhörningar: </p>
		<div class="listofenhörning">
      <form action="response.php" method="get">
  			<ol>

          <?php
          foreach ($data as $unicorn) {
            echo "<li class='left'>$unicorn->name</li><br>";
            echo "<a href=<?php echo 'http://unicorns.idioti.se/1'> class='btn btn-default'>Läs mer...</n>";
     		    echo "<p style='border-bottom: 0.1px solid black;'><br>";
          }



          ?>
  			</ol>
      </form>
		</div>
</body>

</html>
