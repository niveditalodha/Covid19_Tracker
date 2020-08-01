$('.selectpicker').selectpicker();
$( "select" ) .change(function () {
  $country_id=document.getElementById('country').value;
  $link ="https://corona-api.com/countries";
  $.getJSON($link, function(data) {
    document.getElementById('confirmed').innerHTML=data['data'][$country_id]['latest_data']['confirmed'];
    document.getElementById('recovered').innerHTML=data['data'][$country_id]['latest_data']['recovered'];
    document.getElementById('deaths').innerHTML=data['data'][$country_id]['latest_data']['deaths'];
  });
});
