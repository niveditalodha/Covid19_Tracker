<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Covid19 World</title>
    </head>
  <body>

    <div class="container">
      <div class="row">
        <div class ="col-12 col-sm-4 text-center">
          <h3 id="confirmed">
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
              echo $data1["confirmed"]["value"];

            ?>
          </h3><br/>
          <span>Confirmed</span>
        </div>
        <div class ="col-12 col-sm-4 text-center">
          <h3 id="recovered">
            <?php
              echo $data1["recovered"]["value"];
             ?>
          </h3><br/>
          <span>Recovered</span>
        </div>
        <div class ="col-12 col-sm-4 text-center">
          <h3 id="deaths">
            <?php
              echo $data1["deaths"]["value"];
             ?>
          </h3><br/>
          <span>Deceased</span>
        </div>
      </div>
    </div>
    <br/><br/>
      <select id="country" name="country" class="form-control">
        <option value="none" selected disabled hidden>
            Select an Option</option>
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

            for($j=0;$j<$i;$j++)
            {
              echo "<option value='";
              echo $data['countries'][$j]['name'];
              echo "'>";
              echo $data['countries'][$j]['name'];
              echo "</option>";
            }
          ?>
      </select>
      <br/><br/>
      <table class="table" id="tbl">
        <thead>
          <tr>
            <th>States</th>
            <th>Confirmed</th>
            <th>Recovered</th>
            <th>Active</th>
            <th>Deceased</th>
          </tr>
        </thead>
      </table>
      <script type="text/javascript">

        $( "select" ) .change(function () {
          $country_name=document.getElementById('country').value;
          $link ="https://covid19.mathdro.id/api/countries/"+$country_name;
          console.log($link);
          $.getJSON($link, function(data) {
            document.getElementById('confirmed').innerHTML=data['confirmed']['value'];
            document.getElementById('recovered').innerHTML=data['recovered']['value'];
            document.getElementById('deaths').innerHTML=data['deaths']['value'];


          });
          $.getJSON($link+"/confirmed",function(data_confirmed){
             $("#tbl").find("tr:gt(0)").remove();

            for(var i=0;i<data_confirmed.length;i++){
              var state=data_confirmed[i]['provinceState'];
              if(state==null){
                var state="";
              }
              var conf=data_confirmed[i]['confirmed'];
              var recov=data_confirmed[i]['recovered'];
              var deaths=data_confirmed[i]['deaths'];
              var active=conf-recov-deaths;
              $('#tbl').append('<tr><td>'+state+'</td><td>'+conf+'</td><td>'+recov+'</td><td>'+active+'</td><td>'+deaths+'</td></tr>');


            }
          });

        });

        </script>
        <?php

         ?>



  </body>
</html>
