$(document).ready(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  
//function loadrecord(){
//  $.ajax({
//    type: 'POST',
//    url:  '/crud/searchdata',
//    data: {},
//    success: function(data) {
//      var newResult = $.parseJSON(data)
//      if(newResult.success == 1) {
//        var data = newResult.result;
//        var noOfLoops = data.length;
//        var html = "";
//        for(x = 0; x < noOfLoops; x++) {
//          html += "<tr>";
//          html += '<td><img class="imgG" src="'+data[x].student_image+'"></td>';
//          html += "<td>"+data[x].student_fname+"</td>";
//          html += "<td>"+data[x].student_mname+"</td>";
//          html += "<td>"+data[x].student_lname+"</td>";
//          html += "<td>"+data[x].student_gender+"</td>";
//          html += "<td>"+data[x].student_address+"</td>";
//          html += "<td>"+data[x].student_course+"</td>";
//          html += "<td>"+data[x].student_school+"</td>";
//          html += '<td><a href="/crud/create" class="btn btn-success">ADD</a><a href="/crud/'+data[x].student_id+'/edit" class="btn btn-primary">EDIT</a></td>';
//          html += "</tr>";
//        }
//        $(".records").html(html);
//      }
//    }
//  });
//}
//  loadrecord();

  any();
  $('.searchinput').keyup(function(){
    any(this);
  });
  
  function any(eto) {
 
    var searchinput = $(eto).val();
          $.ajax({
            type: 'post',
            url:  '/crud/searchdata',
            data: {'searchinput': searchinput },
            success: function(data) {
              var newResult = $.parseJSON(data)
              if(newResult.success == 1) {
                var data = newResult.result;
                var noOfLoops = data.length;
                var html = "";
                for(x = 0; x < noOfLoops; x++) {
                  html += "<tr>";
                  html += '<td><img class="imgG" src="'+data[x].student_image+'"></td>';
                  html += "<td>"+data[x].student_fname+"</td>";
                  html += "<td>"+data[x].student_mname+"</td>";
                  html += "<td>"+data[x].student_lname+"</td>";
                  html += "<td>"+data[x].student_gender+"</td>";
                  html += "<td>"+data[x].student_address+"</td>";
                  html += "<td>"+data[x].student_course+"</td>";
                  html += "<td>"+data[x].student_school+"</td>";
                  html += '<td><a href="/crud/create" class="btn btn-success">ADD</a><a href="/crud/'+data[x].student_id+'/edit" class="btn btn-primary">EDIT</a><a href="/crud/destroy'+data[x].student_id+'" class="btn btn-danger">DELETE</a>';
                  html += "</tr>";
                }
                $(".records").html(html);
              }
            }
          });
  }
  
  
});