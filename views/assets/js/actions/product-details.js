$(() => {
	// ------------ INCREMENT AND DECREMENT PRODUCT
	$(".qtybutton").on("click", function(){
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		if($button.text() === "+"){
		  var newVal = parseFloat(oldValue) + 1;
		}else{
		  // Don't allow decrementing below zero
		  if(oldValue > 0){
		    var newVal = parseFloat(oldValue) - 1;
		  }else{
		    newVal = 1;
		  }
		}
		$button.parent().find("input").val(newVal);
	});
	// ------------ Best selling active
	$('.related-product-active').owlCarousel({
		loop: true,
		nav: true,
		autoplay: false,
		autoplayTimeout: 5000,
		navText: ['<i class="ion-ios-arrow-back"></i>', '<i class="ion-ios-arrow-forward"></i>'],
		item: 4,
		margin: 30,
		responsive: {
			0: {
			  items: 1
			},
			576: {
			  items: 2
			},
			768: {
			  items: 3
			},
			992: {
			  items: 3
			},
			1100: {
			  items: 3
			},
			1200: {
			  items: 4
			}
		}
	})
	// ------------ PRODUCT ZOOM
	$(".zoompro").elevateZoom({
		gallery: "gallery",
		galleryActiveClass: "active",
		zoomWindowWidth: 300,
		zoomWindowHeight: 100,
		scrollZoom: false,
		zoomType: "inner",
		cursor: "crosshair"
	});
});