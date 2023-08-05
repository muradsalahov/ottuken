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
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                	<div class="">
                		<a href="{{url('/admin_company_create')}}" type="button" class="btn btn-primary mb-2">Add Company</a>
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
                                        <th width="35%">name</th>
                                        <th width="20%">photo</th>
                                        <th width="20%">favicon</th>
                                        <th width="20%">operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($data)
                                    @foreach($data as $as)
                                        <tr>
                                            <td>{{$as->id}}</a></td>
                                            <td>{{$as->company_name}}</td>
                                            <td style="text-align: center;"><img src="{{asset('assets_admin/company_image/'.$as->photo)}}" style="width: 100px;height: 70px;border-radius: 0%;"></td>
                                            <td style="text-align: center;"><img src="{{asset('assets_admin/company_image/'.$as->favicon)}}" style="width: 30px;height: 30px;border-radius: 0%;"></td>
                                            <td>
                                                <a href="{{url('/admin_company_edit', $as->id)}}" class="btn btn-primary"><i class="mdi mdi-tooltip-edit"></i> Edit</a>
                                                <a onclick="return confirm('Are You Sure To Delete This')" href="{{url('/admin_company_delete', $as->id)}}" class="btn btn-danger"><i class="mdi mdi-delete"></i> Delete</a>
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
<!--**********************************
    Content body end
***********************************-->

@include('admin.includes.footer')
@include('admin.includes.datatable')