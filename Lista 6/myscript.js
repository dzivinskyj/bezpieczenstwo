function podmiana(){
  var x = document.getElementsByClassName("nr_konta");
  for(var i = 0; i < x.length; i++){
    if(x[i].innerHTML=="11111111111111111111111111")
      x[i].innerHTML = "00000000000000000000000000";
  }
}
function podmiana2(){
  var x = document.getElementById("nr_konta");
  console.log(x.value.split(' ').join(''));
  if(x.value.split(' ').join('') == "00000000000000000000000000")
    x.value = "11111111111111111111111111";
}
