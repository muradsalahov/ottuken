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
                                        <th width="35%">email</th>
                                        <th width="15%">created date</th>
                                        <th width="15%">operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($data)
                                    @foreach($data as $as)
                                        <tr>
                                            <td>{{$as->id}}</a></td>
                                            <td>{{$as->name}}</td>
                                            <td>{{$as->email}}</td>
                                            <td>{{$as->created_at}}</td>
                                            <td>
                                            	@if($as->user_type==0)
                                            	<a href="{{url('/admin_user_wishlist', $as->id)}}" class="btn btn-info"><i class="mdi mdi-eye toggle-password"></i> Wishlist</a>
                                                <a onclick="return confirm('Are You Sure To Delete This')" href="{{url('/admin_user_delete', $as->id)}}" class="btn btn-danger"><i class="mdi mdi-delete"></i> Delete</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>Məlumat tapılmadı</td>
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