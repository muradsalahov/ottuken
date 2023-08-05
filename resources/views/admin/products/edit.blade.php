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
<div class="content-body">
    <div class="container-fluid">
        @if(session()->has('message'))
        <div class="alert alert-success" style="color: #454545;background-color: #6aff6a;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif
        <div class="row page-titles mx-0" style="margin-bottom: 0px !important;">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Edit Product</h4>
                        <a type="button" href="{{url('/admin_product')}}" class="btn btn-info my-2">back to all products</a>
                </div>
            </div>
        </div>
		<div class="card">
		    <div class="card-body">
		        <div class="basic-form">
		            <form action="{{url('/update_product_single_data',$data->id)}}" id="myform" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
		                    <div class="col-sm-8">  
					            <div class="mb-1">
			                        <h4 class="card-title">Promo Code</h4>
			                    </div>
			                    <div class="row">
			                    	<div class="col-sm-8">
			                        	<input type="text" name="product_promo_code" id="product_promo_code" class="form-control base_text_input" placeholder="Create Promo Code" value="{{$data->product_promo_code}}" required="">
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
					                	@foreach($data_company as $ass)
					                		@if(($ass->id)==($data->company_id))
			                                    @php $selected='selected'; @endphp
			                                @else
			                                    @php $selected=null; @endphp
			                                @endif
					                		<option value="{{$ass->id}}" {{$selected}}>{{$ass->company_name}}</option>
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
					            <select class="form-control base_text_input dropdown-groups select2-hidden-accessible" id="category_id" data-select2-id="2" tabindex="-1" aria-hidden="true">
					                @if($data_category)
					                	@foreach($data_category as $ass)
					                		@if(($ass->id)==($data->category_id))
			                                    @php $selected='selected'; @endphp
			                                @else
			                                    @php $selected=null; @endphp
			                                @endif
					                		<option value="{{$ass->id}}" {{$selected}}>{{$ass->category_name}}</option>
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
			                    	@if($data_subcategory)
					                	@foreach($data_subcategory as $ass)
					                		@if(($ass->id)==($data->subcategory_id))
			                                    @php $selected='selected'; @endphp
			                                @else
			                                    @php $selected=null; @endphp
			                                @endif
					                		<option value="{{$ass->id}}" {{$selected}}>{{$ass->subcategory_name}}</option>
					                	@endforeach
					                @endif
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
					                	@foreach($data_brands as $ass)
					                		@if(($ass->id)==($data->brand_id))
			                                    @php $selected='selected'; @endphp
			                                @else
			                                    @php $selected=null; @endphp
			                                @endif
					                		<option value="{{$ass->id}}" {{$selected}}>{{$ass->brand_name}}</option>
					                	@endforeach
					                @endif	
					            </select>
		                    </div>
		                </div>
		                <hr style="border-top: 1px solid rgb(0 0 0) !important;width: 66%;margin-right: 100%;">
		                <div class="product_area" id="product_area">
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
	                                            <input type="text" id="product_link_id" data-title="" name="product_link_id" class="form-control base_text_input" placeholder="Write Product Id" value="{{$data->product_link_id}}" required="">
	                                        </div>
				                    	</div>
				                    	<div class="col-sm-1" id="product_marketplace_div">
				                    		<input type="text" id="product_marketplace" name="product_marketplace" data-title="" class="form-control base_text_input" value="{{$data->product_marketplace}}" required="">
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
	                                            <input type="text" id="product_url" name="product_url" class="form-control base_text_input" placeholder="product_url" value="{{$data->product_url}}" required="">
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
	                                            <input type="text" id="product_name" name="product_name" class="form-control base_text_input" placeholder="product_name" value="{{$data->product_name}}" required="">
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
	                                            <input type="textarea" id="description" name="description" class="form-control base_text_input" placeholder="description" value="{{$data->description}}" required="">
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
	                                            <input type="text" id="product_price" name="product_price" class="form-control base_text_input" placeholder="product_price" value="{{$data->product_price}}" required="">
	                                        </div>

				                        	<input type="hidden" id="product_price_number" name="product_price_number" value="{{$data->product_price_number}}">
				                    	</div>
				                    	<div class="col-sm-4">
				                        	<div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text">Comments</span>
	                                            </div>
	                                            <input type="text" id="product_comments" name="product_comments" class="form-control base_text_input" placeholder="product_comments" value="{{$data->product_comments}}" required="">
	                                        </div>
				                    	</div>
				                    </div>
				                    <div class="row mt-2">
				                    	<div class="col-sm-4">
				                        	<div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text">InStock</span>
	                                            </div>
	                                            <input type="text" id="product_instock" name="product_instock" class="form-control base_text_input" placeholder="product_instock" value="{{$data->product_instock}}" required="">
	                                        </div>
				                    	</div>
				                    	<div class="col-sm-4">
				                        	<div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text">Rating</span>
	                                            </div>
	                                            <input type="text" id="product_rating" name="product_rating" class="form-control base_text_input" placeholder="product_rating" value="{{$data->product_rating}}" required="">
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
				                    <br>
			                            <div class="row">
					                        <div class="col-md-4">
					                            <img src="{{asset('assets_admin/product_image/'.$data->product_main_photo)}}" style="width: 270px;height: 190px;border-radius: 0%;">
					                        </div>
					                        <div class="col-md-8">
					                            <input type="file" name="product_main_photo">
					                        </div>
					                    </div>
			                    </div>
			                </div>
			                
			            </div>
			            
	                    <div class="form-group row">
			                <div class="col-sm-10">
			                    <button type="submit" class="btn btn-primary">Update product main data</button>
			                </div>
			            </div>
		            </form>
		            <hr style="border-top: 1px solid rgb(0 0 0) !important;width: 66%;margin-right: 100%;">
			        @if(session()->has('message_doc_deleted'))
					<div class="alert alert-success" style="color: #454545;background-color: #6aff6a;">
					    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
					    {{session()->get('message_doc_deleted')}}
					</div>
					@endif
					@if(session()->has('message_doc_updated'))
					<div class="alert alert-success" style="color: #454545;background-color: #6aff6a;">
					    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
					    {{session()->get('message_doc_updated')}}
					</div>
					@endif
			        
			        <div class="row">
			        	<div class="col-sm-8">
			        		<div class="row">
				        	@if($data_product_docs)
						    	@foreach($data_product_docs as $key => $doc)
						    	<div class="col-md-4">
						    		<div class="card text-white bg-primary">
						    			<div class="card-header">
						                    <a onclick="return confirm('Are You Sure To Delete This')" href="{{url('/admin_product_doc_delete', $doc->id)}}" class="btn btn-danger btn-card" style="margin-left: 75%;">Delete</a>
						                </div>
						                <div class="card-body mb-0">
						                    <img src="{{asset('assets_admin/product_docs_image/'.$doc->product_doc_name)}}" style="width: 270px;height: 190px;border-radius: 0%;">
						                </div>
						                <div class="card-footer bg-transparent border-0 text-white">
						                	<form action="{{url('/admin_product_doc_update',$doc->id)}}" id="myform_doc_update" method="post" enctype="multipart/form-data">
	                    					@csrf
							                	<div class="row">
							                		<div class="col-sm-8">
							                			<input type="file" id="updated_doc_photo" name="updated_doc_photo" required>
							                		</div>
							                		<div class="col-sm-4">
							                			<input type="submit" class="btn btn-info btn-card" value="update">
							                		</div>
							                	</div>
						                	</form>
		                    			</div>
						            </div>
						        </div>
						    	@endforeach
						    @endif
							</div>
						</div>
			        </div>
			        <hr style="border-top: 1px solid rgb(0 0 0) !important;width: 66%;margin-right: 100%;">
		            <form action="{{url('/admin_product_doc_insert',$data->id)}}" id="myform_doc_insert" method="post" enctype="multipart/form-data">
		            	@csrf
		            	<div class="form-group row">
			                <div class="col-sm-8">
						        <div class="mb-1">
				                    <h4 class="card-title">Add Doc Photos</h4>
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
			            <div class="form-group row">
				            <div class="col-sm-10">
				                <button type="submit" class="btn btn-primary">Insert product new docs</button>
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
	$("#product_price").change(function(){
	var data = $("#product_price").val();
	var number = data.match(/\b\d+(\.\d+)?\b/); // \b kelime sınırı ekledik
	$("#product_price_number").removeAttr('value');
	$("#product_price_number").val(number[0]); // ilk elemanı aldık
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