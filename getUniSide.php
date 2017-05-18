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
$id = $_GET['id'];
$res = $client->request('GET', 'http://unicorns.idioti.se/'.$id,[
  "headers" => [
    "Accept" => "application/json"
  ]
]);
$unicorn = json_decode($res->getBody());
print_r($unicorn);



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
			<input type="text" idFor="idUnic"><br>
			<a href="index.php?id=<?php echo $unicorn->id ?>" class="btn btn-default">Visa alla Enhörningar!</a>

			<p style="border-bottom: 0.1px solid black;">
		</div>

    <img src="<?php echo $unicorn->image; ?>" alt="unicorn"><br>
    <p style="width:200px"> <?php echo $unicorn->description; ?></p>
    <p> <?php echo $unicorn->reportedBy; ?></p>
    <p> <?php echo $unicorn->spottedWhen->date; ?></p>
    





</body>

</html>
