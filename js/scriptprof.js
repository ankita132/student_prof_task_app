$(document).ready(function(){
$('.all').click(function(){
function showall(){
 // console.log("A");
  $.ajax({
type:"POST",
url:"showall.php",
data:{"called":"true"},
dataType:'html',
success:function(response){
   $(".card-content").html(response);
}
  });
}
showall();
});

$('.assigned').click(function(){
  function show(){
   // console.log("A");
    $.ajax({
  type:"POST",
  url:"show.php",
  data:{"called":"true"},
  dataType:'html',
  success:function(response){
     $(".card-content").html(response);
  }
    });
  }
  show();
});



});
