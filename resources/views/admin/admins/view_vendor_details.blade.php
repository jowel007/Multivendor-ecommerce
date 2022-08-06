@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Vendor Details</h3>
              <h6 class="font-weight-normal mb-0"><a href="{{ url('admin/admins/vendor') }}">Back to Vendor</h6>
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
    

    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
           <div class="card-body">
              <h4 class="card-title">Personal Information</h4>
    
                 <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" value="{{ $vendorDetails['vendor_personal']['email'] }}" readonly>
                 </div>

                <div class="form-group">
                  <label for="vendor_name"> Name </label>
                  <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['name'] }}" id="vendor_name" name="vendor_name">
               </div>

                 <div class="form-group">
                    <label for="vendor_address"> Address </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['address'] }}" id="vendor_address" name="vendor_address">
                 </div>

                 <div class="form-group">
                    <label for="vendor_city"> City </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['city'] }}" id="vendor_city" name="vendor_city">
                 </div>

                 <div class="form-group">
                    <label for="vendor_state"> State </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['state'] }}" id="vendor_state" name="vendor_state">
                 </div>

                 <div class="form-group">
                    <label for="vendor_country"> Country </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['country'] }}" id="vendor_country" name="vendor_country">
                 </div>

                 <div class="form-group">
                    <label for="vendor_pincode"> PinCode </label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['pincode'] }}" id="vendor_pincode" name="vendor_pincode">
                 </div>

                 <div class="form-group">
                    <label for="vendor_mobile">Mobile</label>
                    <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['mobile'] }}" maxlength="11" minlength="11" id="vendor_mobile" name="vendor_mobile">
                 </div>

                @if (!empty($vendorDetails['image']))
                <div class="form-group">
                  <label for="vendor_image">Image</label>
                  
                  <br><img style="width: 200px" src="{{ url('admin/images/photos/'.$vendorDetails['image']) }}">
                
                </div>
                @endif 
                 
              
           </div>
        </div>
     </div>


    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">Business Information</h4>
              
              <div class="form-group">
                <label for="vendor_name">Shop Name </label>
                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_name'] }}" id="vendor_name" name="vendor_name">
              </div>

               <div class="form-group">
                  <label for="vendor_address">Shop Address </label>
                  <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_address'] }}" id="vendor_address" name="vendor_address">
               </div>

               <div class="form-group">
                  <label for="vendor_city">Shop City </label>
                  <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_city'] }}" id="vendor_city" name="vendor_city">
               </div>

               <div class="form-group">
                  <label for="vendor_state">Shop State </label>
                  <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_state'] }}" id="vendor_state" name="vendor_state">
               </div>

               <div class="form-group">
                  <label for="vendor_country">Shop Country </label>
                  <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_country'] }}" id="vendor_country" name="vendor_country">
               </div>

               <div class="form-group">
                  <label for="vendor_pincode">Shop PinCode </label>
                  <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_pincode'] }}" id="vendor_pincode" name="vendor_pincode">
               </div>

               <div class="form-group">
                  <label for="vendor_mobile">Shop Mobile</label>
                  <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_mobile'] }}" maxlength="11" minlength="11" id="vendor_mobile" name="vendor_mobile">
               </div>

              <div class="form-group">
                <label>Shop Website</label>
                <input class="form-control" value="{{ $vendorDetails['vendor_business']['shop_website'] }}" readonly>
              </div>

              <div class="form-group">
                <label>Shop Email</label>
                <input class="form-control" value="{{ $vendorDetails['vendor_business']['shop_email'] }}" readonly>
              </div>

              <div class="form-group">
                <label>Address Proof</label>
                <input class="form-control" value="{{ $vendorDetails['vendor_business']['address_proof'] }}" readonly>
              </div>

              <div class="form-group">
                <label>Business License Number</label>
                <input class="form-control" value="{{ $vendorDetails['vendor_business']['business_licence_number'] }}" readonly>
              </div>

              <div class="form-group">
                <label>GST Number</label>
                <input class="form-control" value="{{ $vendorDetails['vendor_business']['gst_number'] }}" readonly>
              </div>

              <div class="form-group">
                <label>PAN Number</label>
                <input class="form-control" value="{{ $vendorDetails['vendor_business']['pan_number'] }}" readonly>
              </div>

              @if (!empty($vendorDetails['vendor_business']['address_proof_image']))
              <div class="form-group">
                <label for="vendor_image">Image</label>
                
                <br><img style="width: 200px" src="{{ url('admin/images/proofs/'.$vendorDetails['vendor_business']['address_proof_image']) }}">
              
              </div>
              @endif
 
            
         </div>
      </div>
    </div>


    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">Bank Information</h4>
  
               <div class="form-group">
                  <label>Account Holder Name</label>
                  <input class="form-control" value="{{ $vendorDetails['vendor_bank']['account_holder_name'] }}" readonly>
               </div>

              <div class="form-group">
                <label for="vendor_name">Bank Name </label>
                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_bank']['bank_name'] }}" id="vendor_name" name="vendor_name">
             </div>

               <div class="form-group">
                  <label for="vendor_address"> Account Number </label>
                  <input type="text" class="form-control" value="{{ $vendorDetails['vendor_bank']['account_number'] }}" id="vendor_address" name="vendor_address">
               </div>

               <div class="form-group">
                  <label for="vendor_city"> Bank IFSC Number </label>
                  <input type="text" class="form-control" value="{{ $vendorDetails['vendor_bank']['bank_ifsc_code'] }}" id="vendor_city" name="vendor_city">
               </div>
               
            
         </div>
      </div>
   </div>


    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html --> @include('admin.layout.footer')
    <!-- partial -->
  </div>
  

@endsection