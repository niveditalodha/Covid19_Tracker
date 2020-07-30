<?php

$stream_opts = [
    "ssl" => [
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ]
];
$response = file_get_contents("https://covid19.mathdro.id/api/countries/",
               false, stream_context_create($stream_opts));

$data = json_decode($response, true);
$i=0;
foreach ($data['countries'] as $val)
  $i+=1;


  $country_name="India";
  $response = file_get_contents("https://covid19.mathdro.id/api/countries/".$country_name,
                 false, stream_context_create($stream_opts));

  $data2 = json_decode($response, true);
  echo $data2['confirmed']['value'];


?>
