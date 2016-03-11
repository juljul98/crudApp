$(document).ready(function() {
  
//  var getHash = window.location.hash.replace('#','');
//  var getLink  = window.location.hash.replace('/','').split('#');
//  $('a[href^="/'+getLink[getLink.length - 1]+'#'+getHash+'"]').parent('li').addClass('active').siblings().removeClass('active');
//  window.location.hash = '';
  $('#table01').DataTable();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  
  $('.navMobileClick a').click(function(e){
    $('.navBar').slideToggle();
    e.preventDefault();
  });
});