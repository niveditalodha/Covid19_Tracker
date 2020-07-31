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
     $("#tbl").empty();
     $("#tbl").append('<thead><tr><th>States</th><th>Confirmed</th><th class="recovered">Recovered</th><th class="active">Active</th><th>Deceased</th></tr></thead>');
     var recovd=data_confirmed[0]['recovered'];
    for(var i=0;i<data_confirmed.length;i++){
      var state=data_confirmed[i]['provinceState'];
      if(state==null){
        var state="";
      }
      var conf=data_confirmed[i]['confirmed'];
      var recov=data_confirmed[i]['recovered'];
      var deaths=data_confirmed[i]['deaths'];
      var active=conf-recov-deaths;
      $('#tbl').append('<tr><td>'+state+'</td><td>'+conf+'</td><td class="recovered">'+recov+'</td><td class="active">'+active+'</td><td>'+deaths+'</td></tr>');

    }
    if(recovd==0){
    $('.recovered').hide();
    $('.active').hide();
  }
  });

});
