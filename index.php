<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//PSR-4 autoload
$loader = require __DIR__ . '/vendor/autoload.php';

//Simple rooting
$routes = explode('/',trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));

//Start Factory
$start = new Dalev\Api\Resources();

//Get recource instance
$resource = $start->getResourceService($routes[0]);

//Default message
$message = array('error' => true, 'message' => 'You are truing to access none existing resource');

if ($resource != null) {
//Check different methods
  switch ($_SERVER['REQUEST_METHOD']) {
    case 'PUT':
      $message = $resource->create($_POST);
      break;

    case 'POST':
      $message = $resource->update($_POST);
      break;

    case 'DELETE':
      $message = $resource->delete($_POST);
      break;

    case 'GET':
    //Every Resource can have additional data formats by default get all (limit start)
    //If isset $_GET id should return one record
    //Test Urls for aggregations
    //http://app.dev/visitors/aggegation?DateTo=2017-09-10&DateFrom=2017-04-01
    //http://app.dev/visitors/aggegation?DateTo=2017-09-10&DateFrom=2017-04-01
      $message = $resource->read($_GET, isset($routes[1]) ? $routes[1] : '');
      break;

    default:
    //Default message for no Resource found.
      $message = array('error' => true, 'message' => 'You are truing to access none existing method');
      break;
  }
}

echo json_encode($message);
