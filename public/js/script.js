$(document).ready(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  $('.searchinput').keyup(function(){
    var searchinput = $(this).val();
    $.ajax({
      type: 'Get',
      url:  '/crud/searchdata',
      data: {'searchinput': searchinput },
      success: function(data) {
        var newResult = $.parseJSON(data)
        console.log(newResult)
      }
    });
  });
  
  
});