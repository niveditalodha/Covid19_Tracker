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
});

});
