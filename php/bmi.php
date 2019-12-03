<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $h = $_GET['height'];
  $minReq = 18.5 * pow($h, 2);
  $normalReq = 22 * pow($h, 2);
  $maxReq = 25 * pow($h, 2);
  header("Access-Control-Allow-Origin: *");
  echo(json_encode([sprintf("%.3f", $minReq), sprintf("%.3f", $normalReq), sprintf("%.3f", $maxReq)]));
}
