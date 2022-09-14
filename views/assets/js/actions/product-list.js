$(() => {
	// ------------ SHOP GRID LIST
	$('.view-mode li a').on('click', function() {
		var $proStyle = $(this).data('view');
		$('.view-mode li').removeClass('active');
		$(this).parent('li').addClass('active');
		$('.product-view').removeClass('product-grid product-list').addClass($proStyle);
	})
});