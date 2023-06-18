@include('admin.includes.header')
<!--**********************************
    Content body start
***********************************-->
<style type="text/css">
	.form-control {
		border: 1px solid #0a1a48;
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
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Edit Company with Form</h4>
                        <a type="button" href="{{url('/admin_company')}}" class="btn btn-info my-2">back to all companies</a>
                </div>
            </div>
        </div>
		<div class="card">
		    <div class="card-body">
		        <div class="basic-form">
		            <form action="{{url('/admin_company_update',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
		                <div class="form-group row">
		                    <div class="col-sm-12">
		                        <input type="text" name="company_name" class="form-control" placeholder="Company Name" value="{{$data->company_name}}" required>
		                    </div>
		                </div>
		                <div style="border-top: 1px solid #656c736b; width: 100%;"></div>
		                	<div><h4 class="card-title">Photo</h4></div>
		                	<div class="col-md-2">
                            	<img src="{{asset('assets_admin/company_image')}}/{{$data->photo}}" height="100" width="100">
                        	</div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload Photo</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div style="border-top: 1px solid #656c736b; width: 100%;"></div>
                        
		                	<div><h4 class="card-title">Photo</h4></div>
		                	<div class="col-md-2">
                            	<img src="{{asset('assets_admin/company_image')}}/{{$data->favicon}}" height="50" width="50">
                        	</div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload Favicon</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="favicon" class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div style="border-top: 1px solid #656c736b; width: 100%;"></div>
                        <div class="form-group row">
		                    <div class="col-sm-10 mt-1">
		                        <button type="submit" class="btn btn-primary">Edit company</button>
		                    </div>
		                </div>
		            </form>
		        </div>
		    </div>
		</div>
	</div>
</div>	
<script type="text/javascript">
    $(document).ready(function() {
    $( "#company" ).addClass('mm-active');
    });
</script>	
<!--**********************************
    Content body end
***********************************-->

@include('admin.includes.footer')