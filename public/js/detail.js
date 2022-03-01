  function myfunc() {
  var value = document.getElementById("time").value;
  var target = document.getElementById("target_time");
  var text = '';
  if(value === '16:00:00'){
    text = '16:00';
  }
  else if(value === '17:00:00'){
    text = '17:00';
  }
  else if(value === '18:00:00'){
    text = '18:00';
  }
  else if(value === '19:00:00'){
    text = '19:00';
  }
  else if(value === '20:00:00'){
    text = '20:00';
  }
  else if(value === '21:00:00'){
    text = '21:00';
  }
  else if(value === '22:00:00'){
    text = '22:00';
  }
  else if(value === '23:00:00'){
    text = '23:00';
  }
  target.innerHTML = text;
}
function func() {
  var value = document.getElementById("num_of_users").value;
  var target = document.getElementById("target_num");
  var text = '';
  if(value === '1'){
    text = '1人';
  }
  else if(value === '2'){
    text = '2人';
  }
  else if(value === '3'){
    text = '3人';
  }
  else if(value === '4'){
    text = '4人';
  }
  else if(value === '5'){
    text = '5人';
  }
  else if(value === '6'){
    text = '6人';
  }
  target.innerHTML = text;
}