function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('hours').innerHTML =
  h;
  document.getElementById('minutes').innerHTML =
  m;
  document.getElementById('seconds').innerHTML =
  s;
  var t = setTimeout(startTime, 500);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

var checkboxes = $('.checkboxes [type="checkbox"]');
checkboxes.on('change', function() {
    var el = this;
    checkboxes.each(function() {
        if (this != el){
           this.checked = false;
        }
        else if (this == el){
          this.checked = true;
        } 
    });
    if($('#payments').is(':checked')) {
      $('.table-sales').hide();
    }
    else
    {
      $('.table-sales').show();   
    }
});

if($('#payments').is(':checked')) 
{
  $('.table-sales').hide();    
}
else if($('#sales').is(':checked'))
{ 
  $('.table-sales').show(); 
}