<?php
  $stream_opts = [
      "ssl" => [
          "verify_peer"=>false,
          "verify_peer_name"=>false,
      ]
  ];
  $response = file_get_contents("https://corona-api.com/countries",
                 false, stream_context_create($stream_opts));

  $data2 = json_decode($response, true);
  $i=0;
  foreach ($data2['data'] as $val)
    $i+=1;

    for($j=0;$j<$i;$j++)
    {
      echo $data2['data'][$j]['name'];
    }
  ?>
