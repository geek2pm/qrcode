<?php
require __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/phpqrcode.php';
use flight\Engine;
$app = new Engine();

Flight::set('flight.views.path', 'qrcodeviews');

$app->route('GET /', function(){
    Flight::render('index');
});

$app->route('GET /create', function(){
  $text = Flight::request()->query->text;
  return QRcode::png($text, false, 'L', 8, 1);
});

$app->route('GET /create/text/@text', function($text){
  return QRcode::png($text, false, 'L', 8, 1);
});

$app->route('GET /create/wifi/@ssid/@passwd', function($ssid,$passwd){
  $url = Flight::request()->query->url;
  return QRcode::png($url, false, 'L', 8, 1);
});

$app->route('POST /create', function(){
    $text=Flight::request()->data->text;
    return QRcode::png($text, false, 'L', 8, 1);
});

$app->map('notFound', function(){
    Flight::render('404');
    // Flight::render('404', array('title' => 'Home Page','uname'=>$uname));
});

$app->before('start', function(&$params, &$output){
    header("Access-Control-Allow-Origin: *");
});

$app->start();
?>
