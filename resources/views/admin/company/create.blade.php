@include('admin.includes.header')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Add Company with Form</h4>
                        <a type="button" href="{{url('/admin_company')}}" class="btn btn-info my-2">back to all companies</a>
                </div>
            </div>
        </div>
		<div class="card">
		    <div class="card-body">
		        <div class="basic-form">
		            <form action="{{url('/admin_company_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
		                <div class="form-group row">
		                    <div class="col-sm-12">
		                        <input type="text" name="company_name" class="form-control base_text_input" placeholder="Company Name">
		                    </div>
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
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload Favicon</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="favicon" class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group row">
		                    <div class="col-sm-10">
		                        <button type="submit" class="btn btn-primary">add company</button>
		                    </div>
		                </div>
		            </form>
		        </div>
		    </div>
		</div>
	</div>
</div>		
<!--**********************************
    Content body end
***********************************-->

@include('admin.includes.footer')