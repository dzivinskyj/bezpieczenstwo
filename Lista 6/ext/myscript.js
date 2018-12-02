
  var x = document.getElementsByClassName("nr_konta");
  for(var i = 0; i < x.length; i++){
    if(x[i].innerHTML=="11111111111111111111111111")
      x[i].innerHTML = "00000000000000000000000000";
    }

  var x2 = document.getElementById("nr_konta");
  console.log(x2.value.split(' ').join(''));
  if(x2.value.split(' ').join('') == "00000000000000000000000000")
    x2.value = "11111111111111111111111111";
