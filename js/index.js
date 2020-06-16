$(document).on('click', '#leer', function () {
  $.ajax({
    url:"vista/leer.php",
    success:function(data){
      $('#resultado').html(data);
    }
  });
});
$(document).on('click', '#crear', function () {
  $.ajax({
    url:"vista/crear.php",
    success:function(data){
      $('#resultado').html(data);
    }
  });
});
