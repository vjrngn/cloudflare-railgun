<?php
require 'vendor/autoload.php';

$pingType = $_REQUEST['type'];
if ($pingType == 'origin') {
  $headers = pingOrigin();
  echo json_encode($headers);
} else if ($pingType == 'cloudflare') {
  $headers = pingCloudflare();
  echo json_encode($headers);
}

function pingOrigin () {
  $headers = [];
  exec('curl -kI https://128.199.87.22 -H "Host: www.anandguruprasad.com"', $headers);
  
  $formattedHeaders = [];
  foreach ($headers as $index => $val) {
    if ($headers[$index] == "") { continue; }
    list($header, $value) = preg_split('/( )/', $val);
    $formattedHeaders[$header] = $value;
  }
  
  return $formattedHeaders;
}

function pingCloudflare () {
  $headers = [];
  exec("curl -I https://www.anandguruprasad.com", $headers);

  $formattedHeaders = [];
  foreach ($headers as $index => $val) {
    if ($headers[$index] == "") { continue; }
    list($header, $value) = preg_split('/( )/', $val);
    $formattedHeaders[$header] = $value;
  }
  
  return $formattedHeaders;
}