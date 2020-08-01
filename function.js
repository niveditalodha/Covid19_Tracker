$link ="https://corona-api.com/timeline";
$.getJSON($link,function(data){
  var date = data['data'][0]['updated_at'];
  var date=new Date(date).toLocaleString("kok-IN", {timeZone: 'Asia/Kolkata'});
  document.getElementById('lastUpdated').innerHTML="Last Updated : "+date;
});
$('.selectpicker').selectpicker();
$( "select" ) .change(function () {
  $country_id=document.getElementById('country').value;
  $link ="https://corona-api.com/countries";
  $.getJSON($link, function(data) {
    document.getElementById('confirmed').innerHTML=data['data'][$country_id]['latest_data']['confirmed'];
    document.getElementById('recovered').innerHTML=data['data'][$country_id]['latest_data']['recovered'];
    document.getElementById('active').innerHTML=data['data'][$country_id]['latest_data']['confirmed']-data['data'][$country_id]['latest_data']['recovered']-data['data'][$country_id]['latest_data']['deaths'];
    document.getElementById('deaths').innerHTML=data['data'][$country_id]['latest_data']['deaths'];
    document.getElementById('newConfirmed').innerHTML="<i class='fa fa-arrow-up' aria-hidden='true'></i> "+data['data'][$country_id]['today']['confirmed'];
    document.getElementById('newRecovered').innerHTML="";
    document.getElementById('newDeaths').innerHTML="<i class='fa fa-arrow-up' aria-hidden='true'></i> "+data['data'][$country_id]['today']['deaths'];
    var date = data['data'][$country_id]['updated_at'];
    var date=new Date(date).toLocaleString("kok-IN", {timeZone: 'Asia/Kolkata'});
    document.getElementById('lastUpdated').innerHTML="Last Updated : "+date;
  });
});
