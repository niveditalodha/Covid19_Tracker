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
    <link href="style.css" rel="stylesheet">
    <title>Covid19 World</title>

    <?php include 'homepage_apidata.php';?>
    </head>
  <body style="margin-top:7%;max-width:100%;">

    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-3 text-center">
          <select id="country" class="selectpicker" data-live-search=true data-maxOptions="3" title="Select your Country" data-width="230px" data-size="5">

            <?php include 'dropdown_country.php'; ?>
          </select>
        </div>
        <div class ="col-4 col-sm-3 text-center">
          <span>Confirmed</span>
          <h3 id="confirmed">
            <?php
              echo $data1["data"][0]["confirmed"];
            ?>
          </h3><br/>
        </div>
        <div class ="col-4 col-sm-3 text-center">
          <span>Recovered</span>
          <h3 id="recovered">
            <?php
              echo $data1["data"][0]["recovered"];
             ?>
          </h3><br/>
        </div>
        <div class ="col-4 col-sm-3 text-center">
          <span>Deceased</span>
          <h3 id="deaths">
            <?php
              echo $data1["data"][0]["deaths"];
             ?>
          </h3><br/>
        </div>
      </div>
    </div>


    <script src="function.js" type="text/javascript"></script>
  </body>
</html>
