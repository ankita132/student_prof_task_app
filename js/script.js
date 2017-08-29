$(document).ready(function(){
$('.all').click(function(){
function showall(){
  console.log("A");
  $.ajax({
type:"POST",
url:"showall.php",
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
    console.log("A");
    $.ajax({
  type:"POST",
  url:"showstudent.php",
  dataType:'html',
  success:function(response){
     $(".card-content").html(response);
  }
    });
  }
  show();
});

});
