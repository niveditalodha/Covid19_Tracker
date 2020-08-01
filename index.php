<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="style.css" rel="stylesheet">
    <title>Covid19 World</title>

    <?php include 'homepage_apidata.php';?>
    </head>
  <body style="margin-top:7%;max-width:100%;">

    <div class="container">
      <div class="row">
      <div class="col-12 text-center">
        <select id="country" class="selectpicker" data-live-search=true data-maxOptions="3" title="Select your Country" data-width="230px" data-size="5">

          <?php include 'dropdown_country.php'; ?>
        </select>
      </div>
    </div>
      <div class="row">
        <div class ="col-3 text-center">
          <span>Confirmed</span>
          <br/>
          <span id="newConfirmed">
            <?php
              echo '<i class="fa fa-arrow-up" aria-hidden="true"></i> ';
              echo $data1["data"][0]["new_confirmed"];
            ?>
          </span><br/>
          <span id="confirmed">
            <?php
              echo $data1["data"][0]["confirmed"];
            ?>
          </span>
        </div>
        <div class ="col-3 text-center">
          <span>Active</span>
          <br/><br/>
          <span id="active">
            <?php
              echo $data1["data"][0]["active"];
             ?>
          </span>
        </div>
        <div class ="col-3 text-center">
          <span>Recovered</span>
          <br/>
          <span id="newRecovered">
            <?php
              echo '<i class="fa fa-arrow-up" aria-hidden="true"></i> ';
              echo $data1["data"][0]["new_recovered"];
            ?>
          </span><br/>
          <span id="recovered">
            <?php
              echo $data1["data"][0]["recovered"];
             ?>
          </span>
        </div>
        <div class ="col-3 text-center">
          <span>Deceased</span>
          <br/>
          <span id="newDeaths">
            <?php
              echo '<i class="fa fa-arrow-up" aria-hidden="true"></i> ';
              echo $data1["data"][0]["new_deaths"];
            ?>
          </span><br/>
          <span id="deaths">
            <?php
              echo $data1["data"][0]["deaths"];
             ?>
          </span>
        </div>
      </div>
      <div class='row'>
        <span id="lastUpdated" class="col-12 text-center">
          
        </span>
      </div>
    </div>




    <script src="function.js" type="text/javascript"></script>
  </body>
</html>
