<?php
  $stream_opts = [
      "ssl" => [
          "verify_peer"=>false,
          "verify_peer_name"=>false,
      ]
  ];
  $response = file_get_contents("https://covid19.mathdro.id/api/",
                 false, stream_context_create($stream_opts));

  $data1 = json_decode($response, true);

?>
