$( "select" ).change(function () {

  $("#barchartcanvas").remove();
  $( '<canvas id="barchartcanvas" class="barchart"></canvas>' ).insertAfter( ".col-12" );
  $country_id=document.getElementById('country').value;
  $link ="https://corona-api.com/countries";
  $.getJSON($link, function(data) {
    var recover= data['data'][$country_id]['latest_data']['recovered'];
    var active=data['data'][$country_id]['latest_data']['confirmed']-data['data'][$country_id]['latest_data']['recovered']-data['data'][$country_id]['latest_data']['deaths'];
    var death=data['data'][$country_id]['latest_data']['deaths'];
    if(recover!=0){
    var ctx = document.getElementById('barchartcanvas');
    var chart = new Chart(ctx, {
      type: 'horizontalBar',
      data : {
      labels: ["Confirmed"],
      datasets: [
        {
          label:["Recovered"],
          data: [recover],
          backgroundColor:"rgba(40,225,22,0.3)",
          borderColor:"rgba(2,149,0,1)",
          borderWidth:1,
          },{
          label:["Active"],
          data:[active],
          backgroundColor:"rgba(22,225,222,0.3)",
          borderColor:"rgba(0,149,140,1)",
          borderWidth:1
          },
        {
          label:["Deceased"],
          data: [death],
          backgroundColor:"rgba(79,86,86,0.3)",
          borderColor:"rgba(63,63,63,1)",
          borderWidth:1
        }
        ]
      },

      options: {
        responsive:true,
        maintainAspectRatio: false,
        scales: {
        xAxes: [{ stacked: true }],
        yAxes: [{ stacked: true, gridLines:{display:false}}]
        },
        tooltips: {
              mode: 'point'
        }
      }


    });
  }
  });

});
