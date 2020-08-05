$(function(){
  $link ="https://corona-api.com/timeline";
  $.getJSON($link,function(data){
    var recover= data['data'][0]['recovered'];
    var active=data['data'][0]['active'];
    var death=data['data'][0]['deaths'];

  var ctx = document.getElementById('barchartcanvas');
  var chart = new Chart(ctx, {
   type: 'horizontalBar',
   data : {
    labels: ["Confirmed"],
    datasets: [
      {
        label:["Recovered"],
        data: [recover],
        backgroundColor:"rgb(120,255,108,0.4)",
        borderColor:"#292929",
        borderWidth:1,
        },{
        label:["Active"],
        data:[active],
        backgroundColor:"rgb(180,255,233,0.4)",
        borderColor:"#292929",
        borderWidth:1
        },
      {
        label:["Deceased"],
        data: [death],
        backgroundColor:"rgb(149,149,149,0.4)",
        borderColor:"#292929",
        borderWidth:1
      }
    ]
  },

  options: {
    responsive:true,
    maintainAspectRatio: false,
    scales: {
      xAxes: [{ stacked: true,

              ticks: {
                fontColor: "#A0A0A0",
                beginAtZero: true,
                userCallback: function(value, index, values) {
                return value.toLocaleString();
            }
              }
            }],
      yAxes: [{ stacked: true,
                gridLines:{
                  display:false
                },
                ticks: {
                  fontColor: "#A0A0A0",
                },
              }]
    },
    tooltips: {
            mode: 'point',
            callbacks: {
              label: function (tooltipItem, data) {
                var tooltipValue = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                return parseInt(tooltipValue).toLocaleString();
              }
            }
          },
    legend: {
      labels: {
         fontColor: '#A0A0A0'
      }
   },
  }
});
});

});
