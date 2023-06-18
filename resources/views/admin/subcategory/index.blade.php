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
  border-color: #454545 !important; /* example */
}
</style>
<div class="content-body">
    <div class="container-fluid">
        @if(session()->has('message'))
        <div class="alert alert-success" style="color: #454545;background-color: #6aff6a;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif
		<div class="row">
			<div class="col-xl-9 col-xx1-12">
				<div class="card">
                    <div class="card-header">
                        <h4 class="card-title">SubCategory Add</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('/admin_subcategory_store')}}" method="post" enctype="multipart/form-data">
                            	@csrf
                                <div class="form-row">
                                    <div class="col-sm-4">
                                        <input type="text" name="subcategory_name" class="form-control base_text_input" placeholder="Category Name">
                                    </div>
                                    <div class="col-sm-3">
                                    	<div data-select2-id="123">
					                        <div data-select2-id="122">
					                            <div data-select2-id="121">
					                                <select class="form-control base_text_input dropdown-groups select2-hidden-accessible" id="category_id" name="category_id" data-select2-id="1" tabindex="-1" aria-hidden="true">
					                                    @if($data_category)
                                                            <option  disabled="disabled" selected>Choose options...</option>
					                                    	@foreach($data_category as $ass)
					                                    		<option value="{{$ass->id}}">{{$ass->category_name}}</option>
					                                    	@endforeach
					                                    @endif	
					                                </select>
					                            </div>
					                        </div>
					                    </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="level" class="form-control base_text_input" placeholder="Level">
                                    </div>
                                    <div class="col mt-3 mt-sm-0">
                                        <button type="submit" class="btn btn-primary">add subcategory</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
		</div>		        
				            
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="5%">id</th>
                                        <th width="30%">name</th>
                                        <th width="30%">category name</th>
                                        <th width="10%">level</th>
                                        <th width="25%">operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($data)
                                    @foreach($data as $as)
                                        <tr>
                                            <td>{{$as->id}}</a></td>
                                            <td>{{$as->subcategory_name}}</td>
                                            <td>
                                                @if($as->category)
                                                    @php $category_id=$as->category->id; @endphp
                                                    {{$as->category->category_name}}
                                                @else 
                                                    @php $category_id=null; @endphp
                                                    <span style="color:#a9a7a7;">Null</span>  
                                                @endif 
                                            </td>
                                            <td>{{$as->level}}</td>
                                            <td>
                                                <button type="button" data-title="{{$as->id}}" class="btn btn-primary edit_modal" name="{{$as->id}}/{{$as->subcategory_name}}/{{$as->level}}/{{$category_id}}"><i class="mdi mdi-tooltip-edit"></i> Edit</button>

                                                <a onclick="return confirm('Are You Sure To Delete This')" href="{{url('/admin_subcategory_delete', $as->id)}}" class="btn btn-danger"><i class="mdi mdi-delete"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>Not Data Found</td>
                                    </tr>
                                @endif  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets_admin/js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
        $('.edit_modal').on('click', function(e){
		    var id_name=this.name;
            var split_value = id_name.split('/');
            var id = split_value[0];
            var name = split_value[1];
            var level = split_value[2];
            var category_id = split_value[3];
            $("#subcategory_id").select2().select2('val',category_id);
            $('#subcategory_edit_name').val(name);
            $('#subcategory_edit_level').val(level);
            $('#subcategory_edit_form').attr('action', '{{url('/admin_subcategory_update')}}/' + id);
            $('#exampleModalCenter').modal({ show: true });
        });
	});	
</script>
<div class="modal fade" id="exampleModalCenter" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="subcategory_edit_form" action="" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Category Edit</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="subcategory_edit_name" name="subcategory_name" class="form-control base_text_input" placeholder="Category Name">
                </div>
                <div class="modal-body">
                    <div data-select2-id="123">
                        <div data-select2-id="122">
                            <div data-select2-id="121">
                                <select class="form-control base_text_input dropdown-groups select2-hidden-accessible" id="subcategory_id" name="category_id" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                    @if($data_category)
                                        <option  disabled="disabled" selected>Choose options...</option>
                                        @foreach($data_category as $ass)
                                            <option value="{{$ass->id}}">{{$ass->category_name}}</option>
                                        @endforeach
                                    @endif  
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <input type="number" id="subcategory_edit_level" name="level" class="form-control base_text_input" placeholder="Level">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
@include('admin.includes.footer')
@include('admin.includes.datatable')