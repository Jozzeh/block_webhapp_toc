function buildTOC(targetElement, tocParams){
  var searchElementArray = tocParams.htmlElements.split(',');
  var searchElementString = '';
  searchElementArray.forEach(function(value, index, currentArray){
    searchElementString = searchElementString + tocParams.parentClass + ' ' + value + ', ';
  });
  searchElementString = searchElementString.trim();
  searchElementString = searchElementString.slice(0, -1);

  var tocHtml = "<ul class='tocList'>";
  var tocCount = 1;
  $(searchElementString).each(function(){
    var idBuild = targetElement.attr('id') + '-' + tocCount;
    if($(this).attr('id') != '' && $(this).attr('id') != null){
      idBuild = $(this).attr('id');
    }else{
      $(this).attr('id', idBuild);
      tocCount = tocCount + 1;
    }

    tocHtml = tocHtml + "<li class='tocListItem'>";
      tocHtml = tocHtml + "<a data-anim='" + tocParams.animateScroll + "' data-offset='" + tocParams.scrollOffset + "' href='#" + idBuild + "'>"
        tocHtml = tocHtml + $(this).text();
      tocHtml = tocHtml + "</a>";
    tocHtml = tocHtml + "</li>";
  });
  tocHtml = tocHtml + "</ul>";

  targetElement.html(tocHtml);
}

$(document).ready(function(){

  $(document).on('click', '.tocList a', function(event){
    event.preventDefault();
    var topOffset = $( $.attr(this, 'href') ).offset().top - parseInt($(this).attr('data-offset'));
    if($(this).attr('data-anim') == '1'){
      $('html, body').animate({
          scrollTop: topOffset
      }, 500);
    }else{
      $('html, body').animate({
          scrollTop: topOffset
      }, 1);
    }
  });
});
