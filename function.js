function init(){
  $link ="https://corona-api.com/timeline";
  $.getJSON($link, function(data) {
    document.getElementById('newConfirmed').innerHTML = "<i class='fa fa-arrow-up' aria-hidden='true'></i> "+data['data'][0]['new_confirmed'].toLocaleString();
    document.getElementById('confirmed').innerHTML = data['data'][0]['confirmed'].toLocaleString();
    document.getElementById('active').innerHTML = data['data'][0]['active'].toLocaleString();
    document.getElementById('newRecovered').innerHTML = "<i class='fa fa-arrow-up' aria-hidden='true'></i> "+data['data'][0]['new_recovered'].toLocaleString();
    document.getElementById('recovered').innerHTML = data['data'][0]['recovered'].toLocaleString();
    document.getElementById('newDeaths').innerHTML = "<i class='fa fa-arrow-up' aria-hidden='true'></i> "+data['data'][0]['new_deaths'].toLocaleString();
    document.getElementById('deaths').innerHTML = data['data'][0]['deaths'].toLocaleString();
    document.getElementById('ratios').innerHTML = 'Death Rate: '+(data["data"][0]["deaths"]*100/data['data'][0]['confirmed']).toFixed(2)+'\
                                                    % <br/>\
                                                    Recovery Rate:\
                                                    '+(data["data"][0]["recovered"]*100/data["data"][0]["confirmed"]).toFixed(2)+'%';
  });
  $link = "https://corona-api.com/countries";
  $.getJSON($link, function(data) {

    for(var i =0; i<data['data'].length;i++){
      $('select').append('<option value = "'+i+'">'+data['data'][i]['name']+'</option>');
    }
    $('.selectpicker').selectpicker('refresh');
  });

}

$link ="https://corona-api.com/timeline";
$.getJSON($link,function(data){
  var date = data['data'][0]['updated_at'];
  var date=new Date(date).toLocaleString("kok-IN", {timeZone: 'Asia/Kolkata'});
  document.getElementById('lastUpdated').innerHTML="Last Updated : "+date;
});
$( "select" ) .change(function () {
  $country_id=document.getElementById('country').value;
  $link ="https://corona-api.com/countries";
  $.getJSON($link, function(data) {
    document.getElementById('confirmed').innerHTML=data['data'][$country_id]['latest_data']['confirmed'].toLocaleString();
    document.getElementById('recovered').innerHTML=data['data'][$country_id]['latest_data']['recovered'].toLocaleString();
    document.getElementById('active').innerHTML=(data['data'][$country_id]['latest_data']['confirmed']-data['data'][$country_id]['latest_data']['recovered']-data['data'][$country_id]['latest_data']['deaths']).toLocaleString();
    document.getElementById('deaths').innerHTML=data['data'][$country_id]['latest_data']['deaths'].toLocaleString();
    document.getElementById('newConfirmed').innerHTML="<i class='fa fa-arrow-up' aria-hidden='true'></i> "+data['data'][$country_id]['today']['confirmed'].toLocaleString();
    document.getElementById('newRecovered').innerHTML="";
    document.getElementById('newDeaths').innerHTML="<i class='fa fa-arrow-up' aria-hidden='true'></i> "+data['data'][$country_id]['today']['deaths'].toLocaleString();
    var date = data['data'][$country_id]['updated_at'];
    var date=new Date(date).toLocaleString("kok-IN", {timeZone: 'Asia/Kolkata'});
    document.getElementById('lastUpdated').innerHTML="Last Updated : "+date;
    document.getElementById('countryHeading').innerHTML=data['data'][$country_id]['name'];
    if(data['data'][$country_id]['latest_data']['calculated']['death_rate']==null){
      var deathrate=0
    }
    else{
      var deathrate=data['data'][$country_id]['latest_data']['calculated']['death_rate'].toFixed(2);
    }
    if(data['data'][$country_id]['latest_data']['calculated']['recovery_rate']==null){
      var recoveryrate=0
    }
    else{
      var recoveryrate=data['data'][$country_id]['latest_data']['calculated']['recovery_rate'].toFixed(2);
    }
    var change="Death Rate: "+deathrate+"%";
    change=change+"<br/>Recovery Rate: "+recoveryrate+"%";
    document.getElementById('ratios').innerHTML=change;
    document.getElementById('perMillion').innerHTML="Cases Per Million Population: "+data['data'][$country_id]['latest_data']['calculated']['cases_per_million_population'];

  });
});
