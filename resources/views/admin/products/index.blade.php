@include('admin.includes.header')
<!--**********************************
    Content body start
***********************************-->
<style type="text/css">
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
        @if(session()->has('message_error'))
        <div class="alert alert-danger" style="color: #fff;background-color: #f94a4a;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message_error')}}
        </div>
        @endif
        <div class="row page-titles mx-0" style="margin-bottom: 0px !important;">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                	<div class="">
                		<a href="{{url('/admin_product_create')}}" type="button" class="btn btn-primary mb-2">Add Product</a>
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
                                        <th>Id</th>
                                        <th>Promo Code</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Price</th>
                                        <th>Rating</th>
                                        <th>Stock</th>
                                        <th>Comments</th>
                                        <th>Update At</th>
                                        <th>Show Front</th>
                                        <th width="19%">operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($data)
                                    @foreach($data as $as)
                                        <tr>
                                            <td>{{$as->id}}</a></td>
                                            <td>{{$as->product_promo_code}}</a></td>
                                            <td><a href="{{$as->product_url}}" target="_blank" style="color: black;">{{$as->product_name}}</a></td>
                                            <td>{{$as->company->company_name}}/{{$as->product_marketplace}}</td>
                                            <td>{{$as->product_price}}</td>
                                            <td>{{$as->product_rating}}</td>
                                            <td>{{$as->product_instock}}</td>
                                            <td>{{$as->product_comments}}</td>
                                            <td>{{$as->updated_at}}</td>
                                            <td>
                                              <div class="form-group">
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                                                  <label class="form-check-label" for="gridCheck">
                                                    Check
                                                  </label>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                                <a href="{{url('/admin_product_edit', $as->id)}}" class="btn btn-primary"><i class="mdi mdi-tooltip-edit"></i> Edit</a>
                                                <a href="{{url('/admin_product_update_for_api', $as->id)}}" class="btn btn-success"><i class="mdi mdi-update"></i> Update</a>
                                                <a onclick="return confirm('Are You Sure To Delete This')" href="{{url('/admin_product_delete', $as->id)}}" class="btn btn-danger"><i class="mdi mdi-delete"></i> Delete</a>
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
        $('.btn-success').click(function() {
            $("#loading").show();
        });
    });
</script>
<!--**********************************
    Content body end
***********************************-->

@include('admin.includes.footer')
@include('admin.includes.datatable')