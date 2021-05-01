@extends('layout')
@section('content')

<!-- main Content Wrapper -->
<!-- Content Header (Page header) -->
<!-- <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div>
</section> -->

<!-- Main content -->

        <div class="row mt-5">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header p-2">
                        <h2 class="text-center font-weight-700">Profile</h2>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" id="updateForm">
                            @csrf
                            <input type="hidden" class="form-control" id="user_id" name="user_id"
                                placeholder="User Name" value="{{$users[0]->user_id}}">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-12 ml-2 col-form-label">User Name</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="user_name" name="user_name"
                                        placeholder="User Name" value="{{$users[0]->user_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName2" class="col-sm-12 ml-2 col-form-label">User Email</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="user_email" name="user_email"
                                        placeholder="User Email" value="{{$users[0]->user_email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-12 ml-2 col-form-label">User Password</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="user_password" name="user_password"
                                        placeholder="User Password">
                                </div>
                            </div>
                            <div class="text-center" role="alert" id="edit_error_area"
                                style="display: none; text-align:center;">
                            </div>
                            <!-- <div class="text-center" style="position:relative;">
                                
                            </div> -->
                            <div class="form-group mx-auto">
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary" onclick="update()">Profile
                                        Update</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

<!-- /.content -->
<!-- main Content Wrapper -->

<style>
.font-weight-700 {
    font-weight: 600;
}
</style>
<script>
function update() {
    $.ajax({
        type: "POST",
        url: "{{url('Admin/Profile-Update')}}",
        data: $('#updateForm').serialize(),
        success: function(data) {
            if (data['success'] == true) {
                setTimeout(function() {
                    window.location.href = "{{url('Admin/Dashboard')}}";
                }, 2000)
                $("#edit_error_area").show().removeClass();
                $("#edit_error_area").addClass("alert alert-success").html(data['message']);
                console.log(data)
            } else {
                $("#edit_error_area").show();
                $("#edit_error_area").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    })
}
</script>
@endsection