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
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>
 	<p style="border-bottom: 0.1px solid black;">
		<div class="idEnhörning">
			<h2>id på enhörningar</h2>
      <div class="form-group">
        <form action="getUniSide.php" method="get">
                          <label for="id">Id number: </label>

                          <input type="number" id="id" name="id" class="form-control">

                          <input type="submit" value="Visa enhörning!" class="btn btn-success">
                        </form>
      </div>



			<p style="border-bottom: 0.1px solid black;">
		</div>
	<p>Alla Enhörningar: </p>
		<div class="listofenhörning">
      <form action="response.php" method="get">
  			<ol>

          <?php
          foreach ($data as $unicorn) {
            echo "<li class='left'>$unicorn->name</li><br>";
          ?>

            <a href="getUniSide.php?id=<?php echo $unicorn->id ?>" class="btn btn-default">Continue</a>
            <?php
     		    echo "<p style='border-bottom: 0.1px solid black;'><br>";
          }
          ?>
  			</ol>
      </form>
		</div>
</body>

</html>
