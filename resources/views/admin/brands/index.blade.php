@include('admin.includes.header')
<!--**********************************
    Content body start
***********************************-->
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
                        <h4 class="card-title">Brands Add</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('/admin_brand_store')}}" method="post" enctype="multipart/form-data">
                            	@csrf
                                <div class="form-row">
                                    <div class="col-sm-5">
                                        <input type="text" name="brand_name" class="form-control base_text_input" placeholder="Brand Name" required>
                                    </div>
                                    <div class="col mt-2 mt-sm-0">
                                        <button type="submit" class="btn btn-primary">add brand</button>
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
                                        <th width="50%">name</th>
                                        <th width="45%">operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($data)
                                    @foreach($data as $as)
                                        <tr>
                                            <td>{{$as->id}}</a></td>
                                            <td>{{$as->brand_name}}</td>
                                            <td>
                                                <button type="button" data-title="{{$as->id}}" class="btn btn-primary edit_modal" name="{{$as->id}}/{{$as->brand_name}}"><i class="mdi mdi-tooltip-edit"></i> Edit</button>

                                                <a onclick="return confirm('Are You Sure To Delete This')" href="{{url('/admin_brand_delete', $as->id)}}" class="btn btn-danger"><i class="mdi mdi-delete"></i> Delete</a>
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
            $('#brand_edit_name').val(name);
            $('#brand_edit_form').attr('action', '{{url('/admin_brand_update')}}/' + id);
            $('#exampleModalCenter').modal({ show: true });
        });
	});	
</script>
<div class="modal fade" id="exampleModalCenter" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="brand_edit_form" action="" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Brand Edit</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="brand_edit_name" name="brand_name" class="form-control base_text_input" placeholder="Brand Name">
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