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
      $('.table-payments').show();    

    }
    else
    {
      $('.table-sales').show();  
      $('.table-payments').hide(); 
    }
});

if($('#payments').is(':checked')) 
{
  $('.table-sales').hide();    
  $('.table-payments').show();    
}
else if($('#sales').is(':checked'))
{ 
  $('.table-sales').show(); 
  $('.table-payments').hide();
}

function functionPassword(){
  var password = document.getElementById("password");
  var eye = document.getElementById("eye");
  if (password.type === "password") 
  {
    password.type = "text";
  } 
  else 
  {
    password.type = "password";
  }
  if (eye.src === "http://127.0.0.1:8000/img/eye-open.svg") 
  {
    eye.src = "http://127.0.0.1:8000/img/eye-close.svg"
  }
  else 
  {
    eye.src = "http://127.0.0.1:8000/img/eye-open.svg"
  }
  
}



