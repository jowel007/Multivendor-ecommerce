@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Products</h4>
                  <a href="{{ url('admin/add-edit-product') }}" style="max-width: 150px; float:right; display :inline-block"  class="btn btn-block btn-primary">Add product</a>
                  {{-- <p class="card-description">
                    Add class <code>.table-bordered</code>
                  </p> --}}
                  
                  @if(Session::has('success_message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <strong>Success:</strong> {{ Session::get('success_message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif
                  <div class="table-responsive pt-3">
                    <table id="products" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            product Name
                          </th>
                          <th>
                            product Code
                          </th>
                          <th>
                            product Color
                          </th>
                          <th>
                            Category
                          </th>
                          <th>
                            Section
                          </th>
                          <th>
                            Added By
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $product)
                        
                        <tr>
                          <td>
                            {{ $product['id'] }}
                          </td>
                          <td>
                            {{ $product['product_name'] }}
                          </td>
                          <td>
                            {{ $product['product_code'] }}
                          </td>
                          <td>
                            {{ $product['product_color'] }}
                          </td>
                          <td>
                            {{ $product['category']['category_name'] }}
                          </td>
                          <td>
                            {{ $product['section']['name'] }}
                          </td>
                          <td>
                              @if ($product['admin_type']=="vendor")
                                <a target="_blank" href="{{ url('admin/view-vendor-details/'.$product['admin_id']) }}">{{ ucfirst($product['admin_type'] ) }}</a>
                              @else
                                {{ ucfirst($product['admin_type']) }}
                              @endif
                          </td>
                          <td>
                            @if ($product['status']==1)
                              <a class="updateProductStatus" id="product-{{ $product['id'] }}" product_id="{{ $product['id'] }}" href="javascript:void(0)"><i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i></a>
                            @else
                            <a class="updateProductStatus" id="product-{{ $product['id'] }}" product_id="{{ $product['id'] }}" href="javascript:void(0)"><i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="InActive"></i></a>
                            @endif
                          </td>
                          <td>
                            <a href="{{ url('admin/add-edit-product/'.$product['id']) }}"><i style="font-size: 25px" class="mdi mdi-pencil-box"></i>
                            <?php /*<a title="category" class="confirmDelete" href="{{ url('admin/delete-category/'.$category['id']) }}"><i style="font-size: 25px" class="mdi mdi-file-excel-box"></i>*/ ?>
                            <a href="javascript:void(0)" class="confirmDelete" module="product" moduleid="{{ $product['id'] }}"><i style="font-size: 25px" class="mdi mdi-file-excel-box"></i>
                          </td>

                        </tr>
    
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted &amp; made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>

@endsection