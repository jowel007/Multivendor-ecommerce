@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Update Vendor Details</h3>
             
            </div>
            <div class="col-12 col-xl-4">
              <div class="justify-content-end d-flex">
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021) </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                    <a class="dropdown-item" href="#">January - March</a>
                    <a class="dropdown-item" href="#">March - June</a>
                    <a class="dropdown-item" href="#">June - August</a>
                    <a class="dropdown-item" href="#">August - November</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @if ($slug=="personal")

    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
           <div class="card-body">
              <h4 class="card-title">Update Vendor Personal Information</h4>

              @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error:</strong> {{ Session::get('error_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              @if(Session::has('success_message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong>Success:</strong> {{ Session::get('success_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              
              <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                    <label>Vendor username/Email</label>
                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly>
                 </div>

                 <div class="form-group">
                    <label for="vendor_name"> Name </label>
                    <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->name }}" id="vendor_name" name="vendor_name">
                 </div>

                 <div class="form-group">
                    <label for="vendor_address"> Address </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['address'] }}" id="vendor_address" name="vendor_address">
                 </div>

                 <div class="form-group">
                    <label for="vendor_city"> City </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['city'] }}" id="vendor_city" name="vendor_city">
                 </div>

                 <div class="form-group">
                    <label for="vendor_state"> State </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['state'] }}" id="vendor_state" name="vendor_state">
                 </div>

                 <div class="form-group">
                    <label for="vendor_country"> Country </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['country'] }}" id="vendor_country" name="vendor_country">
                 </div>

                 <div class="form-group">
                    <label for="vendor_pincode"> PinCode </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['pincode'] }}" id="vendor_pincode" name="vendor_pincode">
                 </div>

                 <div class="form-group">
                    <label for="vendor_mobile">Mobile</label>
                    <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->mobile }}" maxlength="11" minlength="11" id="vendor_mobile" name="vendor_mobile">
                 </div>

                <div class="form-group">
                  <label for="vendor_image">Image</label>
                  <input type="file" class="form-control" id="vendor_image" name="vendor_image">
                @if (!empty(Auth::guard('admin')->user()->image))
                  <a target="_blank" href="{{ url('admin/images/photos/'.Auth::guard('admin')->user()->image) }}">View Image</a>
                  <input type="hidden" name="current_vendor_image" value="{{ Auth::guard('admin')->user()->image }}">
                @endif
                </div>
                 
                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                 <button class="btn btn-light">Cancel</button>
              </form>
           </div>
        </div>
     </div>


    </div>

    @elseif ($slug=="business")

    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
           <div class="card-body">
              <h4 class="card-title">Update Vendor Business Information</h4>

              @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error:</strong> {{ Session::get('error_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              @if(Session::has('success_message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong>Success:</strong> {{ Session::get('success_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              
              <form class="forms-sample" action="{{ url('admin/update-vendor-details/business') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                    <label>Vendor username/Email</label>
                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly>
                 </div>

                 <div class="form-group">
                    <label for="shop_name">Shop Name </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['shop_name'] }}" id="shop_name" name="shop_name">
                 </div>

                 <div class="form-group">
                    <label for="shop_address">Shop Address </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['shop_address'] }}" id="shop_address" name="shop_address">
                 </div>

                 <div class="form-group">
                    <label for="shop_city">Shop City </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['shop_city'] }}" id="shop_city" name="shop_city">
                 </div>

                 <div class="form-group">
                    <label for="shop_state">Shop State </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['shop_state'] }}" id="shop_state" name="shop_state">
                 </div>

                 <div class="form-group">
                    <label for="shop_country">Shop Country </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['shop_country'] }}" id="shop_country" name="shop_country">
                 </div>

                 <div class="form-group">
                    <label for="shop_pincode">Shop PinCode </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['shop_pincode'] }}" id="shop_pincode" name="shop_pincode">
                 </div>

                 <div class="form-group">
                    <label for="shop_mobile"> Mobile</label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['shop_mobile'] }}" maxlength="11" minlength="11" id="shop_mobile" name="shop_mobile">
                 </div>

                <div class="form-group">
                  <label for="business_licence_number">Business Lincence Number </label>
                  <input type="text" class="form-control" value="{{ $vendorDetails['business_licence_number'] }}" id="business_licence_number" name="business_licence_number">
                </div>

                <div class="form-group">
                  <label for="pan_number">PAN Number </label>
                  <input type="text" class="form-control" value="{{ $vendorDetails['pan_number'] }}" id="pan_number" name="pan_number">
                </div>

              <div class="form-group">
                <label for="gst_number">GST Number </label>
                <input type="text" class="form-control" value="{{ $vendorDetails['gst_number'] }}" id="gst_number" name="gst_number">
              </div>

                <div class="form-group">
                  <label for="address_proof">Address Proof</label>
                  <select name="address_proof" class="form-control" id="address_proof">
                    <option value="passport" @if ($vendorDetails['address_proof']=="passport") selected @endif>Passport</option>
                    <option value="Voting card" @if ($vendorDetails['address_proof']=="Voting card") selected @endif>Voting card</option>
                    <option value="N Id" @if ($vendorDetails['address_proof']=="N Id") selected @endif>National Id</option>
                    <option value="Driving Licence" @if ($vendorDetails['address_proof']=="Driving Licence") selected @endif>Driving Licence</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="address_proof_image">Address Proof Image</label>
                  <input type="file" class="form-control" id="address_proof_image" name="address_proof_image">
                @if (!empty($vendorDetails['address_proof_image']))
                  <a target="_blank" href="{{ url('admin/images/proofs/'.$vendorDetails['address_proof_image']) }}">View Image</a>
                  <input type="hidden" name="current_address_proof" value="{{ $vendorDetails['address_proof_image'] }}">
                @endif
                </div>
                 
                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                 <button class="btn btn-light">Cancel</button>
              </form>
           </div>
        </div>
     </div>


    </div>
    @elseif ($slug=="bank")

    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
           <div class="card-body">
              <h4 class="card-title">Update Vendor Bank Information</h4>

              @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error:</strong> {{ Session::get('error_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              @if(Session::has('success_message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong>Success:</strong> {{ Session::get('success_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              
              <form class="forms-sample" action="{{ url('admin/update-vendor-details/bank') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                    <label>Vendor username/Email</label>
                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly>
                 </div>

                 <div class="form-group">
                    <label for="account_holder_name">Account Holder Name </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['account_holder_name'] }}" id="account_holder_name" name="account_holder_name">
                 </div>

                 <div class="form-group">
                    <label for="bank_name">Bank Name </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['bank_name'] }}" id="bank_name" name="bank_name">
                 </div>

                 <div class="form-group">
                    <label for="account_number">Account Number </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['account_number'] }}" id="account_number" name="account_number">
                 </div>

                 <div class="form-group">
                    <label for="bank_ifsc_code">Bank IFSC Number </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['bank_ifsc_code'] }}" id="bank_ifsc_code" name="bank_ifsc_code">
                 </div>
                 
                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                 <button class="btn btn-light">Cancel</button>
              </form>
           </div>
        </div>
     </div>


    </div>

    @endif
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html --> @include('admin.layout.footer')
    <!-- partial -->
  </div>
  

@endsection