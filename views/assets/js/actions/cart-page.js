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
});