<style>
        .labelbold{
            font-weight: bold;
        }
        .item-rate {
            width: 100%;
            display: flex;
            align-items: center;
            padding-top: 18px;
            justify-content: space-between;
        }
        .fs-wrap {
			display: inline-block;
			cursor: pointer;
			line-height: 2;
			width: 100%;
		}
		.fs-dropdown {
			position: absolute;
			background-color: #FCF2E7;
			border: 1px solid #ddd;
			line-height: 1 !important;
			margin-top: 5px;
			z-index: 1000;
		}
    </style>
    
    <div class="modal fade" id="add-address-modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">@if(!empty($result)) Update @else Add New @endif Address</h5>
            <button type="button" class="close btnClose" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                     
                     <div class="widget">
                           <form id="address" action="{{ url('add-address') }}" class="form-signin" method="post" accept-charset="utf-8">
                              @csrf
                              <input value="@if(!empty($result)){{ $result['id'] }}@else{{ 0 }}@endif" type="hidden" name="id" required >
                              
                                 <div class="row">
                                       <div class="col-sm-6 mb-10" >
                                          <div class="form-group">
                                             <input class="form-control contact__form--input" required="" value="@if(!empty($result)) {{ $result['name'] }} @endif"
                                                placeholder="Name*" type="text" name="name"
                                                onkeypress="return /[A-Za-z ]/i.test(event.key)">
                                          </div>
                                       </div>
                                       <div class="col-sm-2 mb-10">
                                          <div class="form-group ">
                                             <div class="input-group">
                                                <div class="input-group-prepend">
                                                   <select class="form-control  contact__form--input code-select" name="phone_code" id="phone_code" required >
                                                      
                                                         <option value="91" selected  >+ 91</option>
                                                      
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-4 mb-10" >
                                          <div class="form-group">
                                             <input type="tel" maxlength="10" class="form-control  contact__form--input contact__form--input" placeholder="04 X XXX XXX" value="@if(!empty($result)) {{ $result['mobile'] }}@endif" style="width:100%;border-radius: 0 5px 5px 0;" onkeypress="return /[0-9 ]/i.test(event.key)" name="mobile">

                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-6 mb-10">
                                          <div class="form-group">
                                             <input class="form-control contact__form--input" type="email" value="@if(!empty($result)) {{ $result['email'] }} @endif" required
                                                placeholder="Email*" type="text" name="email" >
                                          </div>
                                       </div>


                                       <div class="col-sm-6 mb-10">
                                          <div class="form-group">
                                             <select class="country form-control  contact__form--input" name="country_id" id="country_id" data-state_id="@if(!empty($result)) {{ $result['state_id'] }} @else{{ '0' }}@endif" data-city_id="@if(!empty($result)) {{ $result['city_id'] }} @else{{ '0' }}@endif">
                                                <option value="101">India</option>
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-6 mb-10">
                                          <div class="form-group">
                                               @php $stateResult=\App\Models\State::orderBy('name','Asc')->where('country_id','101')->get(); @endphp
                                             
                                             <select class="form-control  contact__form--input statehtml" name="state_id" required data-placeholder="Select State">
                                                <option value="">--Select--</option>
                                                @foreach($stateResult as $con)
                                                    <option value="{{ $con['id'] }}">{{ ucfirst($con['name']) }}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-6 mb-10">
                                          <div class="form-group">
                                             <select class="form-control  contact__form--input cityHtml" name="city_id">
                                                <option value="">--Select--</option>
                                             </select>
                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-6 mb-15">
                                          <div class="form-group">
                                             <input required class="form-control  contact__form--input" 
                                                placeholder="605500" type="tel" value="@if(!empty($result)){{ $result['pincode'] }}@endif" name="pincode" onkeypress="return /[0-9 ]/i.test(event.key)" minlength="6" maxlength="6">
                                          </div>
                                       </div>

                                       <div class="col-sm-12 mb-15">
                                          <div class="form-group">
                                             <input required class="form-control contact__form--input" 
                                                placeholder="Address 1(House No, Building, Street, Area)*" type="text" value="@if(!empty($result)) {{ $result['address_line1'] }} @endif" name="address_line1">
                                          
                                             <input required="" class="form-control contact__form--input"
                                                placeholder="Address 2(House No, Building, Street, Area)" type="hidden" value="@if(!empty($result)) {{ $result['address_line2'] }} @endif" name="address_line2">
                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-6 mb-10">
                                          <div class="form-group">
                                             <select class="form-control contact__form--input" name="type_id" required >
                                                <option value="">Type</option>
                                                <option value="1" @if(!empty($result) && $result['type']=='1') selected @endif>Home</option>
                                                <option value="2" @if(!empty($result) && $result['type']=='2') selected @endif>Office</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="row m-20">
                                       <div class="col-sm-12">
                                             <button name="signupBtn" type="submit" value="true" id=""
                                                class="submit-address d-flex btn btn-primary primary__btn" style="align-items:center;">
                                                Submit <i class="fa fa-spinner fa-spin loading addressloader" style="font-size:16px;line-height: 2;display:none"></i>

                                             </button>
                                       </div>
                                    </div>
                                 </form>
                           </div>
                        </div>
                     </div>
               </div>
          </div>
          
        </div>
      </div>
    </div>

   
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script>

$("#phone_code").val('91');
$("#country_id").val('101');

$(".btnClose").click(function () {
   $("#add-address-modal-update").modal('hide');
   $("#add-address-modal-update").modal('hide');
});

$(document).ready(function(){
    $('.selectpicker').selectpicker('refresh');
    // $('.selectbox').fSelect();

//     $('.code-select').fSelect({
//       placeholder: 'Phone Code',
//       numDisplayed: 3,
//       overflowText: '{n} selected',
//       noResultsText: 'No results found',
//       searchText: 'Search',
//       showSearch: true
//   });
});

var selectedId=0;
var city_id=0;

getState();
getCity();

@if($result)
    $(".country").trigger('change');
@endif


$("form#address").submit(function(e) {
   
    e.preventDefault();

    var formId = $(this).attr('id');
    var formAction = $(this).attr('action');

    var form_data = new FormData(this);

    $.ajax({
        url: formAction,
        data: new FormData(this),
        dataType: 'json',
        type: 'post',
        beforeSend: function() {
            $('.addressloader').css('display', 'block');
        },
        error: function(xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {
                showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
            } else {
                showMsg('error', xhr.status + ': ' + xhr.statusText);
            }

            $('.addressloader').css('display', 'none');
        },
        success: function(data) {
            
            $('#add-address-modal-update').removeClass('is-visible');
            $('#add-address-modal-update').modal('toggle');

            getSavedAddress();
            if (data.error) {
                showMsg('error', data.message);
            } else {
                showMsg('success', data.message);
            }
            
            $('.addressloader').css('display', 'none');
        },
        cache: false,
        contentType: false,
        processData: false,
        timeout: 5000
    });
});
</script>
