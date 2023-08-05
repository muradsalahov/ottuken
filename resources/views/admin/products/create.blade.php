@include('admin.includes.header')
<!--**********************************
    Content body start
***********************************-->
<style type="text/css">
	.select2-selection__rendered {
    line-height: 35px !important;
}
.select2-container .select2-selection--single {
    height: 35px !important;
}
.select2-selection__arrow {
    height: 35px !important;
}
.select2-selection {
  border-color: #454545 !important;
}
.card-title {
	color: #4966f3 !important;
}
input[type=file] {
  width: 100%;
  max-width: 100%;
  color: #444;
  padding: 5px;
  background: #fff;
  border-radius: 5px;
  border: 1px solid #454545;
}

/*loadin style*/
#loading {
  position: fixed;
  display: block;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  text-align: center;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
}

#loading-image {
  position: absolute;
  top: 10%;
  left: 30%;
  z-index: 100;
}
/*#product_marketplace_div{
	display: none !important;
}*/
</style>
<div id="loading" style="display:none;">
  <img id="loading-image" src="{{asset('assets_admin/images/giphy.gif')}}" alt="Loading..." />
</div>

@if(isset($product_last_id->product_promo_code))
	@php $last_genereted_promo_code = $product_last_id->product_promo_code;@endphp
@else	
	@php $last_genereted_promo_code = null;@endphp
@endif
<div class="content-body">
    <div class="container-fluid">
        @if(session()->has('message'))
        <div class="alert alert-success" style="color: #454545;background-color: #6aff6a;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Enter The Product</h4>
                        <a type="button" href="{{url('/admin_product')}}" class="btn btn-info my-2">back to all products</a>
                </div>
            </div>
        </div>
		<div class="card">
		    <div class="card-body">
		        <div class="basic-form">
		            <form action="{{url('/admin_product_store')}}" id="myform" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
		                    <div class="col-sm-8">  
					            <div class="mb-1">
			                        <h4 class="card-title">Promo Code</h4>
			                    </div>
			                    <div class="row">
			                    	<div class="col-sm-8">
			                        	<input type="text" name="product_promo_code" id="product_promo_code" class="form-control base_text_input" placeholder="Create Promo Code" value="{{$last_genereted_promo_code}}" required="">
			                    	</div>
			                    	<div class="col-sm-4">
				                        <button type="button" id="generate_promo_code" class="btn btn-primary">Generate</button>
			                    	</div>
			                    </div>
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <div class="col-sm-8">      
					            <div class="mb-1">
			                        <h4 class="card-title">Company</h4>
			                    </div>

					            <select class="form-control base_text_input dropdown-groups select2-hidden-accessible" id="company_id" name="company_id" data-select2-id="1" tabindex="-1" aria-hidden="true">
					                @if($data_company)
                                        <option  disabled="disabled" selected>Choose options...</option>
					                	@foreach($data_company as $ass)
					                		<option value="{{$ass->id}}">{{$ass->company_name}}</option>
					                	@endforeach
					                @endif	
					            </select>
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <div class="col-sm-8">
					            <div class="mb-1">
			                        <h4 class="card-title">Category</h4>
			                    </div>
					            <select class="form-control base_text_input dropdown-groups select2-hidden-accessible" id="category_id" name="category_id" data-select2-id="2" tabindex="-1" aria-hidden="true">
					                @if($data_category)
                                        <option  disabled="disabled" selected>Choose options...</option>
					                	@foreach($data_category as $ass)
					                		<option value="{{$ass->id}}">{{$ass->category_name}}</option>
					                	@endforeach
					                @endif	
					            </select>
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <div class="col-sm-8">
			                    <div class="mb-1">
			                        <h4 class="card-title">SubCategory</h4>
			                    </div>
			                    <select class="form-control base_text_input dropdown-groups select2-hidden-accessible" id="subcategory_id" name="subcategory_id" data-select2-id="3" tabindex="-1" aria-hidden="true">
			                        <option  disabled="disabled" selected>Choose options...</option> 
			                    </select>
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <div class="col-sm-8">
					            <div class="mb-1">
			                        <h4 class="card-title">Brand</h4>
			                    </div>
					            <select class="form-control base_text_input dropdown-groups select2-hidden-accessible" id="brand_id" name="brand_id" data-select2-id="4" tabindex="-1" aria-hidden="true">
					                @if($data_brands)
                                        <option  disabled="disabled" selected>Choose options...</option>
					                	@foreach($data_brands as $ass)
					                		<option value="{{$ass->id}}">{{$ass->brand_name}}</option>
					                	@endforeach
					                @endif	
					            </select>
		                    </div>
		                </div>
		                <span>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>
		                <div class="product_area" id="product_area" style="display:none">
			                <div class="form-group row">
			                    <div class="col-sm-8">  
						            <div class="mb-1">
				                        <h4 class="card-title">Product ID</h4>
				                    </div>
				                    <div class="row">
				                    	<div class="col-sm-8">
				                        	<div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text">Product ID</span>
	                                            </div>
	                                            <input type="text" id="product_link_id" data-title="" name="product_link_id" class="form-control base_text_input" placeholder="Write Product Id" value="" required="">
	                                        </div>
				                    	</div>
				                    	<div class="col-sm-1" id="product_marketplace_div">
				                    		<input type="text" id="product_marketplace" name="product_marketplace" data-title="" class="form-control base_text_input" value="US" required="">
				                    	</div>
				                    	
				                    	<div class="col-sm-3">
					                        <button type="button" id="get_api_button" class="btn btn-primary">Get API Data for ID</button>
				                    	</div>
				                    </div>
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <div class="col-sm-8">  
						            <div class="mb-1">
				                        <h4 class="card-title">Product Shop URL</h4>
				                    </div>
				                    <div class="row">
				                    	<div class="col-sm-12">
				                        	<div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text">Url</span>
	                                            </div>
	                                            <input type="text" id="product_url" name="product_url" class="form-control base_text_input" placeholder="product_url" value="" required="">
	                                        </div>
				                    	</div>
				                    </div>
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <div class="col-sm-8">  
						            <div class="mb-1">
				                        <h4 class="card-title">Product Name</h4>
				                    </div>
				                    <div class="row">
				                    	<div class="col-sm-12">
				                        	<div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text">Product Name</span>
	                                            </div>
	                                            <input type="text" id="product_name" name="product_name" class="form-control base_text_input" placeholder="product_name" value="" required="">
	                                        </div>
				                    	</div>
				                    </div>
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <div class="col-sm-8">  
						            <div class="mb-1">
				                        <h4 class="card-title">Product Description</h4>
				                    </div>
				                    <div class="row">
				                    	<div class="col-sm-12">
				                        	<div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text">Description</span>
	                                            </div>
	                                            <input type="textarea" id="description" name="description" class="form-control base_text_input" placeholder="description" value="" required="">
	                                        </div>
				                    	</div>
				                    </div>
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <div class="col-sm-12">
						            <div class="mb-1">
				                        <h4 class="card-title">Other Information</h4>
				                    </div>
				                    <div class="row">
				                    	<div class="col-sm-4">
				                        	<div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text">Price</span>
	                                            </div>
	                                            <input type="text" id="product_price" name="product_price" class="form-control base_text_input" placeholder="product_price" value="" required="">
	                                        </div>

				                        	<input type="hidden" id="product_price_number" name="product_price_number" value="">
				                    	</div>
				                    	<div class="col-sm-4">
				                        	<div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text">Comments</span>
	                                            </div>
	                                            <input type="text" id="product_comments" name="product_comments" class="form-control base_text_input" placeholder="product_comments" value="" required="">
	                                        </div>
				                    	</div>
				                    </div>
				                    <div class="row mt-2">
				                    	<div class="col-sm-4">
				                        	<div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text">InStock</span>
	                                            </div>
	                                            <input type="text" id="product_instock" name="product_instock" class="form-control base_text_input" placeholder="product_instock" value="" required="">
	                                        </div>
				                    	</div>
				                    	<div class="col-sm-4">
				                        	<div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text">Rating</span>
	                                            </div>
	                                            <input type="text" id="product_rating" name="product_rating" class="form-control base_text_input" placeholder="product_rating" value="" required="">
	                                        </div>
				                    	</div>
				                    </div>
				                    <div class="row mt-2">
				                    	
				                    </div>
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <div class="col-sm-8">
						            <div class="mb-1">
				                        <h4 class="card-title">Product Main Head Photo</h4>
				                    </div>
			                            <input type="file" name="product_main_photo" required="">
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <div class="col-sm-8">
						            <div class="mb-1">
				                        <h4 class="card-title">Product Doc Photos</h4>
				                    </div>
						            <div id="imageContainer">
						            	<div class="row">
						            		<div class="col-sm-11">
						            			<input type="file" id="doc_photo1" name="doc_photo1">
						            		</div>
						            		<div class="col-sm-1">
						        				<i class="fa fa-plus-circle" id="addButton" aria-hidden="true" style="font-size: 30px !important;color: green;cursor: pointer;"></i>
						            		</div>
						            	</div>
				                     	<div id="fileInputsContainer"></div>
				                    </div>
			                    </div>
			                </div>
			                <span>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>
			                <div class="form-group row">
			                	<div class="col-sm-8">
				                	<div class="mb-1">
						                <h4 class="card-title">Note: Api's All images url's</h4>
						            </div>
			                    
			                    	<input type="text" id="all_photo_product" class="form-control base_text_input">
			                    </div>
			                </div>
			            </div>
			            
	                    <div class="form-group row">
			                <div class="col-sm-10">
			                    <button type="submit" class="btn btn-primary">add product</button>
			                </div>
			            </div>
			               
		            </form>
		        </div>
		    </div>
		</div>
	</div>
</div>
<script src="{{asset('assets_admin/js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
  	var counter = 1;
  
  	$('#addButton').click(function() {
  		counter++;
    	var inputName = 'doc_photo' + counter;

    	var fileInputHTML = '<div id="fileInputContainer_' + counter + '">';
			fileInputHTML += '<div class="row mt-2"><div class="col-sm-11"><input type="file" name="'+inputName+'" class="fileInput"></div>';
			fileInputHTML += '<div class="col-sm-1"><i class="fa fa-minus-circle removeButton mt-2" aria-hidden="true" data-container-id="' + counter + '" style="font-size: 30px;color: red;cursor: pointer;"></i></div></div>';
			fileInputHTML += '</div>';

    	$('#fileInputsContainer').append(fileInputHTML);
  	});

    $('#fileInputsContainer').on('click', '.removeButton', function() {
    	var containerID = $(this).data('container-id');
		$('#fileInputContainer_' + containerID).remove();
  	});
});
$(document).ready(function(){
	//$("#product_marketplace").hide();
	$("#company_id").change(function(){
		var companyName = $("#company_id option:selected").text();
		var companyNameLower = companyName.toLowerCase();
		$('#product_link_id').attr('data-title',companyNameLower);
		var product_data_title1 = companyNameLower;

		//$("#product_marketplace").hide();
		
		if (product_data_title1=='walmart') {
			//$("#product_marketplace").hide();
		}else{
			//$("#product_marketplace").show();
		}
		$("#product_area").show();
	});

	$("#get_api_button").click(function(){
		$("#loading").show();
		var product_id = $("#product_link_id").val();
		//from walmart
		var product_url_link = $("#product_url").val();
		//from walmart
		var product_data_title = $('#product_link_id').data('title');
		alert(product_data_title);
		if(product_data_title=='amazon'){
			alert('Axtaris URL ile axtarilir');
			var product_marketplace = $("#product_marketplace").val();
			if(product_marketplace){
				var marketplace = product_marketplace;
				marketplace = marketplace.toUpperCase();
			}else{
				var marketplace = "US";
			}
			$.ajax({
				url: "https://axesso-axesso-amazon-data-service-v1.p.rapidapi.com/amz/amazon-lookup-product?url="+product_url_link+"",
				method: "GET",
				headers: {
				"X-RapidAPI-Host": "axesso-axesso-amazon-data-service-v1.p.rapidapi.com",
				"X-RapidAPI-Key": "9e7edde96cmshef4f7ae33a8aa07p1ccfd4jsn9a84b20e19cd"
				},
				success: function(response) {
					$("#loading").hide();
					console.log(response);

					$("#myform input[name='product_name']").val(response.productTitle);
					if(response.productDescription){
						$("#myform input[name='description']").val(response.productDescription);
					}else{
						$("#myform input[name='description']").val(response.productTitle);
					}
					
					if(product_marketplace=='US'){
						/*$("#myform input[name='product_price']").val(response.result[0].price.symbol+''+response.result[0].price.current_price);
						$("#product_price_number").val(response.result[0].price.current_price);*/
						$("#myform input[name='product_price']").val('$'+response.price);
						$("#product_price_number").val(response.price);
						
					}else{
						/*var str = response.result[0].price.symbol+''+response.result[0].price.current_price;
						var newStr = str.slice(0, -2) + "." + str.slice(-2);
						$("#myform input[name='product_price']").val(newStr)

						var num = response.result[0].price.current_price;
						var result_num = (num / 100).toFixed(2);
						$("#product_price_number").val(result_num);*/
						$("#myform input[name='product_price']").val('€'+response.price);
						$("#product_price_number").val(response.price);
					}
					var rating_avg = (response.productRating).match(/(\d+\.\d+)/);
					$("#myform input[name='product_rating']").val(rating_avg[0]);
					$("#myform input[name='product_comments']").val(response.answeredQuestions);
					$("#myform input[name='product_instock']").val(response.warehouseAvailability);
					
					$("#myform input[name='product_link_id']").val(response.asin);
					$("#myform input[id='all_photo_product']").val(response.imageUrlList);
					
				},
				error: function(error) {
					$("#loading").hide();
					alert(error);
				}
			});
		}else if(product_data_title=='ebay'){
			alert('Axtaris PRODUCT LINK-i ile axtarilir');
			var product_marketplace = $("#product_marketplace").val();
			if(product_marketplace){
				var marketplace = product_marketplace;
				marketplace = marketplace.toUpperCase();
			}else{
				var marketplace = "US";
			}
			$.ajax({
				type: "GET",
				url: "{{url('get_ebay_data')}}",
				data: {url_link: product_url_link, marketplace_product: marketplace},
				success: function(response){
					$("#loading").hide();
					console.log(response);

					$("#myform input[name='product_name']").val(response.product_name);
					$("#myform input[name='description']").val(response.product_name);

					$("#myform input[name='product_price']").val(response.product_price);
					
					$("#myform input[name='product_comments']").val(response.feedback_count);
					$("#myform input[name='product_instock']").val(response.stock_details);
					$("#myform input[name='product_rating']").val(response.average_rating);

					$("#myform input[id='all_photo_product']").val(response.photo_ebay);

					var url = product_url_link;
					var startIndex = url.indexOf('itm/') + 4;
					var endIndex = url.indexOf('?');
					var ebay_id = url.substring(startIndex, endIndex);
					$("#product_link_id").val(ebay_id);

					/*var data = response.product_price;
					var regex = /[\d.,]+/; // Rakam ve nokta/virgül karakterlerini eşleştiren düzenli ifade

					var matches = data.match(regex);
					var price_number = parseFloat(matches[0].replace(/[^\d.]/g, ''));
					$("#product_price_number").val(price_number);*/
					
					if(marketplace=='US'){
						var data = response.product_price;
						var regex = /[\d.,]+/; // Rakam ve nokta/virgül karakterlerini eşleştiren düzenli ifade
						var matches = data.match(regex);
						var price_number = parseFloat(matches[0].replace(/[^\d.]/g, ''));
						$("#product_price_number").val(price_number);
					}else{
						var data = response.product_price;
						var regex = /\d+,\d+/;
						var matches = data.match(regex);
						var price_number = parseFloat(matches[0].replace(/,/g, '.'));
						$("#product_price_number").val(price_number);
					}
					
					
				},
				error: function(error) {
					$("#loading").hide();
					alert(error);
				}
			});
		}else if(product_data_title=='walmart'){
			alert('Axtaris PRODUCT LINK-i ile axtarilir');
			$.ajax({
				url: "https://axesso-walmart-data-service.p.rapidapi.com/wlm/walmart-lookup-product?url="+product_url_link+"",
				type: "GET",
				dataType: "json",
				headers: {
				"X-RapidAPI-Host": "axesso-walmart-data-service.p.rapidapi.com", // CURLOPT_HTTPHEADER ile aynı
				"X-RapidAPI-Key": "9e7edde96cmshef4f7ae33a8aa07p1ccfd4jsn9a84b20e19cd" // CURLOPT_HTTPHEADER ile aynı
				},
				success: function(response) {
					$("#loading").hide();
					console.log(response);
					$("#myform input[name='product_name']").val(response.item.props.pageProps.initialData.data.product.name);
					$("#myform input[name='description']").val(response.item.props.pageProps.initialData.data.product.shortDescription);

					$("#myform input[name='product_price']").val(response.item.props.pageProps.initialData.data.product.priceInfo.currentPrice.priceString);
					//$("#myform input[name='product_review']").val(response.item.props.pageProps.initialData.data.product.numberOfReviews);
					$("#myform input[name='product_comments']").val(response.item.props.pageProps.initialData.data.product.numberOfReviews);
					$("#myform input[name='product_instock']").val(response.item.props.pageProps.initialData.data.product.availabilityStatus);

					
					var str = response.item.props.pageProps.initialData.data.reviews.averageOverallRating;
					var num = parseFloat(str);
					var result = num.toFixed(1);
					$("#myform input[name='product_rating']").val(result);
					$("#myform input[id='product_link_id']").val(response.item.props.pageProps.initialData.data.product.usItemId);
					var urls = [];

					var data_all_photos = response.item.props.pageProps.initialData.data.product.imageInfo.allImages;
					$.each(data_all_photos, function(index, element) {
						urls.push(element.url);
					});
					var result = urls.join(",");
					$("#myform input[id='all_photo_product']").val(result);

					var data = response.item.props.pageProps.initialData.data.product.priceInfo.currentPrice.priceString;
					var regex = /[\d.,]+/;

					var matches = data.match(regex);
					var price_number = parseFloat(matches[0].replace(/[^\d.]/g, ''));
					$("#product_price_number").val(response.item.props.pageProps.initialData.data.product.priceInfo.currentPrice.price);
				},
				error: function(error) {
					$("#loading").hide();
					alert(error);
				}
			});
		}else if(product_data_title=='aliexpress'){
			alert('Axtaris ITEM ID-i ile axtarilir');
			$.ajax({
				url: "https://ali-express-data-service.p.rapidapi.com/item/itemInfo?itemId="+product_id+"&target_language=en",
				type: "GET",
				dataType: "json",
				headers: {
				"X-RapidAPI-Host": "ali-express-data-service.p.rapidapi.com", // CURLOPT_HTTPHEADER ile aynı
				"X-RapidAPI-Key": "9e7edde96cmshef4f7ae33a8aa07p1ccfd4jsn9a84b20e19cd" // CURLOPT_HTTPHEADER ile aynı
				},
				success: function(response) {
					$("#loading").hide();
					console.log(response);
					$("#myform input[name='product_name']").val(response.title);
					$("#myform input[name='description']").val(response.original_title);

					$("#myform input[name='product_price']").val('$'+response.price);
					//$("#myform input[name='product_review']").val(response.item.props.pageProps.initialData.data.product.numberOfReviews);
					$("#myform input[name='product_comments']").val(response.features.reviews);
					$("#myform input[name='product_instock']").val('IN_STOCK');
					$("#myform input[name='product_rating']").val(response.features.rating);

					$("#myform input[id='all_photo_product']").val(response.pic_url);
					$("#myform input[id='product_url']").val(response.detail_url);
					$("#product_price_number").val(response.price);

				},
				error: function(error) {
					$("#loading").hide();
					alert(error);
				}
			});
		}else{
			alert('API MOVCUD DEYIL!');
		}
		
	});

	$("#category_id").change(function(){
		var category_id = $(this).val();
		if (category_id) {
			$.ajax({
				type: "GET",
				url: "{{url('admin_subcategory_load')}}",
				data: {category_id: category_id},
				success: function(res){
					$("#subcategory_id").empty();
					$.each(res,function(key,value){
						$("#subcategory_id").append('<option value="'+key+'">'+value+'</option>');
					});
				}
			});
		}
		else {
			$("#subcategory_id").empty();
			$("#subcategory_id").append('<option value="">Select a subcategory</option>');
		}
	});

	var length = 10;
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	function generate_random_code(length,chars) {
		var code = "";
		for (var i = 0; i < length; i++) {
			var index = Math.floor(Math.random() * chars.length);
			code += chars[index];
		}
		return code;
	}
	$("#generate_promo_code").click(function(){
		var promo_code = generate_random_code(length,chars);
		if(promo_code){
			$.ajax({
				type: "GET",
				url: "{{url('check_promo_code')}}",
				data: {promo_code: promo_code},
				success: function(res){
					var let = JSON.parse(res);
					if(let==1){
						alert("This promo code exists in the table, regenerate!");
						$("#product_promo_code").empty();
					}else{
						$("#product_promo_code").val(promo_code);
					}
				}
			});
		}
		
	});
		
	
	
});

</script>		
<!--**********************************
    Content body end
***********************************-->

@include('admin.includes.footer')