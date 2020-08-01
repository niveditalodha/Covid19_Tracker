<?php
  $stream_opts = [
      "ssl" => [
          "verify_peer"=>false,
          "verify_peer_name"=>false,
      ]
  ];
  $response = file_get_contents("https://corona-api.com/timeline",
                 false, stream_context_create($stream_opts));

  $data1 = json_decode($response, true);
  $date_time = explode("T",$data1['data'][0]['updated_at']);
  $updatedTime= date('h:i a d/m/Y', strtotime($date_time[1]));

?>
