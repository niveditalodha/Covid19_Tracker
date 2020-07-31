<?php
  $stream_opts = [
      "ssl" => [
          "verify_peer"=>false,
          "verify_peer_name"=>false,
      ]
  ];
  $response = file_get_contents("https://covid19.mathdro.id/api/countries/",
                 false, stream_context_create($stream_opts));

  $data2 = json_decode($response, true);
  $i=0;
  foreach ($data2['countries'] as $val)
    $i+=1;

    for($j=0;$j<$i;$j++)
    {
      echo "<option value='";
      echo $data2['countries'][$j]['name'];
      echo "'>";
      echo $data2['countries'][$j]['name'];
      echo "</option>";
    }
  ?>
