// some scripts
String.prototype.permalink = function () {
    return this.toString().trim().toLowerCase().replace(/\s/g, "-");
};

$(".add-to-cart-btn").on("click", function(){

	var pid = $(this).data("pid");
	$.ajax({
		url: BASE_URL + "shop/add-to-cart",
		type: "GET",
		dataType: "html",
		data: {product_id: pid},
		success: function(res){
			window.location.reload();
		},			
	})
})

$(".product-quantity").on("change", function(e){
	e.preventDefault();
	let quantity = $(this).val();
    $.ajax({
		url: BASE_URL + "shop/update-cart",
        type: "GET",
        dataType: "html",
        data: {pid: $(this).data("pid"), pquantity: $(this).val()},
        success: function(res){
		   window.location.reload();
        },
    })
})


$('select[name="category"]').on('change', function(){
	var category_id = $(this).val();
	if(category_id){
		$.ajax({
			url: BASE_URL + "/cms/recom/" + category_id,
			type: "GET",
			dataType: "JSON", 
			success: function(data) {
				$('select[name="product"]');
				$.each(data, (id, products) => {
					$('select[name="product"]').append('<option value="' + id + '">' + products + '</option>');
				});	
			}
		});
	} else {
		$('select[name="product"]').empty();
	}
});


// $('.send-recommended').on('click', function(){
// 	console.log($('#product-drop').val($(this).val()))
// 	console.log($('#product-drop').val())



$('.origin-field').on('focusout', function(){
    $('.target-field').val($(this).val().permalink());
});

$(document).ready(function() {
	$('#summernote').summernote({
		height: 220,
	});
  });

  $('.image-upload').change(function(e){
	var fileName = e.target.files[0].name;
	$('.custom-file-label').html(fileName);
	});

// jquery ready start
$(document).ready(function() {
	// jQuery code

  // var html_download = '<a href="http://bootstrap-ecommerce.com/templates.html" class="btn btn-dark rounded-pill" style="font-size:13px; z-index:100; position: fixed; bottom:10px; right:10px;">Download theme</a>';
  //  $('body').prepend(html_download);
    

	//////////////////////// Prevent closing from click inside dropdown
    $(document).on('click', '.dropdown-menu', function (e) {
      e.stopPropagation();
    });


    

	//////////////////////// Bootstrap tooltip
	if($('[data-toggle="tooltip"]').length>0) {  // check if element exists
		$('[data-toggle="tooltip"]').tooltip()
	} // end if

    
}); 



