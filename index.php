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

    <?php include 'homepage_apidata.php';?>
    </head>
  <body>

    <div class="container">
      <div class="row">
        <div class ="col-12 col-sm-4 text-center">
          <h3 id="confirmed">
            <?php
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
        <?php include 'dropdown_country.php'; ?>
      </select>
      <br/><br/>
      <table class="table" id="tbl">
        
      </table>

    <script src="function.js" type="text/javascript"></script>
  </body>
</html>
