$(document).ready(function() {
  $("#sipudaCarousel").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carouselSip-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carouselSip-item")
            .eq(i)
            .appendTo(".carouselSip-inner");
        } else {
          $(".carouselSip-item")
            .eq(0)
            .appendTo($(this).find(".carouselSip-inner"));
        }
      }
    }
  });
});
