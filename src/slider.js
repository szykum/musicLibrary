$(function() {
  var inWrap = $('.insideSlider'),
  $item = $('.item');
  function itemNext() {
    inWrap.animate({left: '-200%'}, 1000, function() {
      inWrap.css('left', '-100%');
      $('.item').last().after($('.item').first());
    });
  }
   itemrInterval = setInterval(itemNext, 4000);
});
