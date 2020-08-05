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
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css" rel="stylesheet">
    <title>Covid19 World</title>

    <?php include 'homepage_apidata.php';?>
    </head>
  <body>

    <section>
      <div class="dropdown">

        <select id="country" class="form-control selectpicker" data-live-search=true data-maxOptions="3" title="Select your Country" data-size="4">

          <?php include 'dropdown_country.php'; ?>
        </select>

      </div>
      <div class="lastUpdated">
        <span id="lastUpdated">

        </span>
      </div>
      <div>
        <div class="flex-container text-center">
          <div class="confirmed cases">
              <span class='case-title'>Confirmed</span>
              <br/><br/>
              <span id="newConfirmed" class="new-confirmed">
                <?php
                  echo '<i class="fa fa-arrow-up" aria-hidden="true"></i> ';
                  echo number_format($data1["data"][0]["new_confirmed"]);
                ?>
              </span><br/>
              <span id="confirmed" class="figure">
                <?php
                  echo number_format($data1["data"][0]["confirmed"]);
                ?>
              </span>
          </div>
          <div class="active cases">
            <span class='case-title'>Active</span>
            <br/><br/><br/>
            <span id="active" class="figure">
              <?php
                echo number_format($data1["data"][0]["active"]);
               ?>
            </span>
          </div>
          <div class="recovered cases">
            <span class='case-title'>Recovered</span>
            <br/><br/>
            <span id="newRecovered" class="new-recovered">
              <?php
                echo '<i class="fa fa-arrow-up" aria-hidden="true"></i> ';
                echo number_format($data1["data"][0]["new_recovered"]);
              ?>
            </span><br/>
            <span id="recovered" class="figure">
              <?php
                echo number_format($data1["data"][0]["recovered"]);
               ?>
            </span>
          </div>
          <div class="deaths cases">
            <span class='case-title'>Deceased</span>
            <br/><br/>
            <span id="newDeaths" class="new-deaths">
              <?php
                echo '<i class="fa fa-arrow-up" aria-hidden="true"></i> ';
                echo number_format($data1["data"][0]["new_deaths"]);
              ?>
            </span><br/>
            <span id="deaths" class="figure">
              <?php
                echo number_format($data1["data"][0]["deaths"]);
               ?>
            </span>
          </div>
        </div>
      </div>

      <div class="flex-container text-center top-padding">
          <div id="countryHeading">
            Global
          </div>
          <div id="ratios">
            <?php
              echo "Death Rate: ";
              echo round($data1['data'][0]['deaths']*100/$data1['data'][0]['confirmed'],2);
              echo "% <br/>";
              echo "Recovery Rate: ";
              echo round($data1['data'][0]['recovered']*100/$data1['data'][0]['confirmed'],2);
              echo "%";
            ?>
          </div>
      </div>
      <div id="perMillion">

      </div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <canvas id="barchartcanvas" class="barchart"></canvas>
          </div>
        </div>
      </div>
      <hr>
      <div class="copyright">
        Developed by Nivedita Lodha
      </div>
    </section>
    <script src="function.js" type="text/javascript"></script>
    <script src="chart.js" type="text/javascript"></script>

    <script src="chart_change.js" type="text/javascript"></script>
    <link href="style.css" rel="stylesheet">
  </body>
</html>
