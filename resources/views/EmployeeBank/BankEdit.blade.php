@extends('layout')

@section('content')




<section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <a href="{{route('Employee-Bank-Show')}}" style="font-size: 18px;"><i class="fas fa-arrow-circle-left"></i></a>  Edit Employee Bank Detail
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="EmployeeBankUpdateForm" enctype="multipart/form-data">
                @csrf 
                <div class="form-row justify-content-center mt-3">
               
                <input type="hidden" class="form-control"  id="emp_bank_id" value="{{$detail->emp_bank_id}}"name="emp_bank_id">
                <!-- <input type="text" class="form-control" value="{{Session::get('employee_id')}}" id="emp_id" name="emp_id"> -->
                <div class="form-group col-md-4">
                      <label>Employee Name</label>
                      <select class="form-control" name="emp_name" id="emp_name">
                      <option selected disabled>select</option>  
                      @foreach($row as $rows)
                        @if($rows->employee_id == $detail->employee_id)
                      <option selected value="{{$rows->employee_id}}">{{$rows->first_name}} 
                        {{$rows->last_name}}</option>
                        
                        @else
                        <option value="{{$rows->employee_id}}">{{$rows->first_name}} 
                        {{$rows->last_name}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                  <label>Bank Name</label>
                    <input type="text" class="form-control" value="{{$detail->bank_name}}"name="emp_bank_name" id="emp_bank_name" placeholder="Enter Bank Name">
                  </div>     
                </div>  

                <div class="form-row justify-content-center mt-2">
                  
                  <div class="form-group col-md-4">
                      <label>Branch Name</label>
                      <input type="text" class="form-control" value="{{$detail->branch_name}}" name="emp_branch_name" id="emp_branch_name" placeholder="Enter Branch Name">
                  </div>

                  <div class="form-group col-md-4">
                     <label>Account Number</label>
                     <input type="text" class="form-control" value="{{$detail->account_number}}" name="emp_ac_no" id="emp_ac_no" placeholder="Enter Account Number">
                  </div>

                </div>

                <div class="form-row justify-content-center mt-2">
                  <div class="form-group col-md-4">
                      <label>Account Type</label>
                      <input type="text" class="form-control" value="{{$detail->account_type}}"name="emp_ac_type" id="emp_ac_type" placeholder="Enter Account Type">
                  </div>

                  <div class="form-group col-md-4">
                      <label>IFSC Code</label>
                      <input type="text" class="form-control" value="{{$detail->ifsc_code}}" name="emp_ifsc_code" id="emp_ifsc_code" placeholder="Enter IFSC Code">
                  </div>
                </div>  
                <div class="form-row justify-content-center mt-2">  
                  <div class="form-group col-md-4">
                      <label>IBAN</label>
                      <input type="text" class="form-control" value="{{$detail->iban}}" name="emp_iban_no" id="emp_iban_no" placeholder="Enter IBAN no">
                  </div>

                  <div class="form-group col-md-4 mt-1">
                     <label>Bank Passbook</label>
                     <input type="file" value="" accept="image/x-png,image/jpeg" name="bank_passbook_img" id="bank_passbook_img">

                     <img src="http://localhost/Al_Chisty/public/Employee/Bank_Pasbook_Images/{{$detail->bank_passbook_image}}" alt="No image available" style="width:100px;height:auto;">
                     <div class="bank_passbook_img_err"></div>
                  </div>
                </div>        

                <div class="form-row justify-content-center mt-2">
                  <div class="form-group">
                  <span id="emp_bank_error_area" style="display: none;"class="m-auto"></span>
                    <button type="button" id="emp_submit" class="btn btn-primary m-auto" onclick="EmployeeBankDetailUpdate()">Submit
                     </button>
                  </div>
                </div>      
              </form>
            </div>
          </div>
        </div>
      </div>
</section>                 
            <!-- /.card -->
<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
         
<script>
$(document).ready(function(){

  $("#emp_name").select2({
    theme:"classic",
    width: 'resolve'
  });

});
function EmployeeBankDetailUpdate()
{
    var emp_name_val = $("#emp_name").val();
    var emp_bank_name_val = $("#emp_bank_name").val();
    var emp_branch_name_val = $("#emp_branch_name").val();
    var emp_ac_no_val = $("#emp_ac_no").val();
    var emp_ac_type_val = $("#emp_ac_type").val();
    var emp_ifsc_code_val = $("#emp_ifsc_code").val();
    var emp_iban_no_val = $("#emp_iban_no").val();

        if(emp_name_val == '' || emp_bank_name_val == '' || emp_branch_name_val == '' || emp_ac_no_val == '' || emp_ac_type_val == '' || emp_ifsc_code_val == '' || emp_iban_no_val == '' )
        {
            $("#emp_bank_error_area").show();
            $("#emp_bank_error_area").addClass("alert alert-danger").html("All Field Must be Required");
            return false;
        }
        else
        {
            $("#emp_bank_error_area").hide();
            $("#emp_bank_error_area").removeClass("alert alert-danger");
        }
        
  var Employee_Bank_Form = document.getElementById('EmployeeBankUpdateForm');
          var form_data = new FormData(Employee_Bank_Form);

               $.ajax({
              type : "POST",
              url : "{{route('Employee-Bank-Detail-Update')}}",
              data : form_data,
              processData : false,
              contentType : false,
              success : function(data){
                console.log(data);
          if(data["success"] == true)
          {
              swal({
                  title: "Updated..!",
                  text: "Employee Bank Detail Updated Successfully...",
                  icon: "success",
                });
              window.location.href="{{route('Employee-Bank-Show')}}";

          }else
          {
              $("#emp_bank_error_area").show();
              $("#emp_bank_error_area").addClass("alert alert-danger").html(data['message']).css({
                "color": "#fff"});
              window.location.href="{{route('Employee-Bank-Show')}}";
          }
            }
      });
}

</script>
@endsection


                          