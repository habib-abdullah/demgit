@extends('layout')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Items Description</div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#ItemStoreModal">Add Item</button>

                            <div class="modal fade" id="ItemStoreModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-primary">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Items</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form id="ItemStoreForm">
                                                @csrf
                                                <div class="form-group">
                                                    <lable>Name</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required "
                                                        id="item_title" name="item_title" autocomplete="off"
                                                        placeholder="Enter item name">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Description</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="item_description" name="item_description" autocomplete="off"
                                                        placeholder="Enter item description">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Size</lable>
                                                    <select class="form-control select2" name="size_id" id="size_id"
                                                        style="width: 100%;">
                                                        <option selected disabled>Select</option>
                                                        @if(count($sizes) > 0)
                                                        @foreach($sizes as $size)
                                                        <option value="{{$size->size_id}}">{{$size->size_title}}
                                                        </option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Grade</lable>
                                                    <select class="form-control select2" name="grade_id" id="grade_id"
                                                        style="width: 100%;">
                                                        <option selected disabled>Select</option>
                                                        @if(count($grades) > 0)
                                                        @foreach($grades as $grade)
                                                        <option value="{{$grade->grade_id}}">{{$grade->grade_title}}
                                                        </option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Material Type</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="item_material_type" name="item_material_type"
                                                        autocomplete="off" placeholder="Enter material form">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Material Form</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="item_material_form" name="item_material_form"
                                                        autocomplete="off" placeholder="Enter item form">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Current Price</lable>
                                                    <input type="number"
                                                        class="form-control form-control-user border-primary required"
                                                        id="item_price" name="item_price" autocomplete="off"
                                                        placeholder="Enter item price">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer ">
                                            <div class="form-row mt-3 mx-auto">
                                                <div class="form-group text-center">
                                                    <span id="show_error" style="display: none;" class="m-auto"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" id="btnSubmit" onclick="ItemStore()"
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Items List</h6>
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="ItemDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Grade</th>
                            <th>Material Type</th>
                            <th>Material Form</th>
                            <th>Current Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ItemEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Item</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="ItemEditForm">
                    @csrf
                    <input type="hidden" id="items_id" name="item_id">
                    <div class="form-group">
                        <lable>Name</lable>
                        <input type="text" class="form-control form-control-user border-primary item_input "
                            id="items_title" name="item_title" autocomplete="off" placeholder="Enter item name">
                    </div>
                    <div class="form-group">
                        <lable>Description</lable>
                        <input type="text" class="form-control form-control-user border-primary item_input"
                            id="items_description" name="item_description" autocomplete="off"
                            placeholder="Enter item description">
                    </div>
                    <div class="form-group">
                        <lable>Size</lable>
                        <select class="form-control select2" name="size_id" id="sizes_id" style="width: 100%;">
                            <option disabled>Select</option>
                            @if(count($sizes) > 0)
                            @foreach($sizes as $size)
                            <option value="{{$size->size_id}}">{{$size->size_title}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Grade</lable>
                        <select class="form-control select2" name="grade_id" id="grades_id" style="width: 100%;">
                            <option disabled>Select</option>
                            @if(count($grades) > 0)
                            @foreach($grades as $grade)
                            <option value="{{$grade->grade_id}}">{{$grade->grade_title}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Material Type</lable>
                        <input type="text" class="form-control form-control-user border-primary item_input"
                            id="items_material_type" name="item_material_type" autocomplete="off"
                            placeholder="Enter material form">
                    </div>
                    <div class="form-group">
                        <lable>Material Form</lable>
                        <input type="text" class="form-control form-control-user border-primary item_input"
                            id="items_material_form" name="item_material_form" autocomplete="off"
                            placeholder="Enter item form">
                    </div>
                    <div class="form-group">
                        <lable>Current Price</lable>
                        <input type="number" class="form-control form-control-user border-primary item_input"
                            id="items_price" name="item_price" autocomplete="off" placeholder="Enter item price">
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="form-row mt-3 mx-auto">
                    <div class="form-group text-center">
                        <span id="item_edit_show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnUpdate" onclick="ItemUpdate()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ItemViewModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Item Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group">
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Title </b>
                        <a class="float-right" id="title_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Description </b>
                        <a class="float-right" id="description_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Material Type </b>
                        <a class="float-right" id="material_type_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Material Form </b>
                        <a class="float-right" id="material_form_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Size </b>
                        <a class="float-right" id="size_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Grade </b>
                        <a class="float-right" id="grade_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Price </b>
                        <a class="float-right" id="price_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Created At </b>
                        <a class="float-right" id="created_at"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Updated At </b>
                        <a class="float-right" id="updated_at"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Current Status </b>
                        <a class="float-right" id="status_view"></a>
                    </li>
                </ul>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script type="text/javascript">
var base_url = "{{url('/')}}";
$(function() {

    var tables = $("#ItemDataTable").DataTable({
        "autoWidth": true,
    "responsive": true,
    dom: 'lBfrtip',
    buttons: [
      // 'excel', 'print'
      // { "extend": 'pageLength', "className": 'btn btn-default btn-sm px-4' },
      {
        "extend": 'excel',
        "text": 'Export',
        "className": 'btn btn-default btn-sm px-4 mx-1'
      },
      {
        "extend": 'print',
        "text": 'Print',
        "className": 'btn btn-default btn-sm px-4 mx-1'
      }
    ],
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "{{route('Item-Show')}}",
            // data: {
            //   client_id: ""
            // }
        },
        columns: [{
                data: 'item_id',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },

            {
                data: 'item_title',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'item_description',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'grade_title',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'size_title',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'item_material_type',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'item_material_form',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'item_price',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            // {
            //   data: 'status',
            //   render: function(data) {
            //     if (data == 1) {
            //       return 'Active';
            //     } else {
            //       return 'Inactive';
            //     }
            //   },
            //   'searchable': false,
            //   'orderable': false,
            //   'class': 'text-center',
            // },
            {
                data: 'action',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            }
        ]
    });

    $("#size_id").select2({
        theme: "classic",
        width: 'resolve'
    });
    $("#grade_id").select2({
        theme: "classic",
        width: 'resolve'
    });

});

function ItemStore() {
    var fields = $("input[class*='required']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
            var value = currentElement.replaceAll('_', ' ');
            $("#show_error").removeClass().html('');
            $("#show_error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
            return false;
        } else {
            $("#show_error").hide().removeClass().html('');
        }
    }

    $("#btnSubmit").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "{{route('Item-Store')}}",
        data: $("#ItemStoreForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnSubmit").prop("disabled", false);
            $("#show_error").removeClass().html('').show();
            $("#show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnSubmit").prop("disabled", false);
            console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#show_error").removeClass().html('').show();
                $("#show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#ItemStoreModal").modal('hide');
                    $("#show_error").removeClass().html('').hide();
                    $("#ItemStoreForm")[0].reset();
                    tables = $("#ItemDataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("show_error").removeClass().show().html('');
                    $("show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#show_error").removeClass().html('').show();
                $("#show_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}

function ItemEdit(item_id) {
    var url_edit = base_url + "/Admin/Item-" + item_id + "-Edit";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        console.log(data[0]);
        // return false;
        // 
        $("#items_id").val(data[0]['item_id']);
        $("#items_title").val(data[0]['item_title']);
        $("#items_description").val(data[0]['item_description']);
        $("#sizes_id").val(data[0]['size_id']);
        $("#grades_id").val(data[0]['grade_id']);
        $("#items_material_type").val(data[0]['item_material_type']);
        $("#items_material_form").val(data[0]['item_material_form']);
        $("#items_price").val(data[0]['item_price']);

        $("#ItemEditModal").modal('show');
    });
}

function ItemView(item_id) {
    var url_edit = base_url + "/Admin/Item-" + item_id + "-View";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        // console.log(data[0]);
        // return false;

        $("#title_view").text(data[0]['item_title']);
        $("#description_view").text(data[0]['item_description']);
        $("#material_type_view").text(data[0]['item_material_type']);
        $("#material_form_view").text(data[0]['item_material_form']);
        $("#size_view").text(data[0]['grade_title']);
        $("#grade_view").text(data[0]['size_title']);
        $("#price_view").text(data[0]['item_price']);
        $("#created_at").text(data[0]['created_at']);
        $("#updated_at").text(data[0]['updated_at']);

        if (data[0]['status'] == 1) {
            $("#status_view").text('Active');
        } else {
            $("#status_view").text('Inactive');
        }

        $("#ItemViewModal").modal('show');
    });
}

function ItemUpdate() {
    var fields = $("input[class*='item_input']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#item_edit_show_error").removeClass().html('');
            $("#item_edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#item_edit_show_error").hide().removeClass().html('');
        }
    }

    $("#btnUpdate").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "{{route('Item-Update')}}",
        data: $("#ItemEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnUpdate").prop("disabled", false);
            $("#item_edit_show_error").removeClass().html('').show();
            $("#item_edit_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnUpdate").prop("disabled", false);
            console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#item_edit_show_error").removeClass().html('').show();
                $("#item_edit_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#ItemEditModal").modal('hide');
                    $("#ItemEditForm")[0].reset();
                    $("#item_edit_show_error").removeClass().html('').hide();
                    tables = $("#ItemDataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("item_edit_show_error").removeClass().show().html('');
                    $("item_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#item_edit_show_error").removeClass().html('').show();
                $("#item_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                return false;
            }
        }
    });
}

function ItemRemove(item_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("{{route('Item-Remove')}}", {
                item_id: item_id
            }, function(data) {
                console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Item has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let ItemDataTable = $("#ItemDataTable").dataTable();
                    ItemDataTable.fnPageChange('first', 1);
                } else {
                    swal("Oops something went wrong, please check!", {
                        icon: "error",
                    });
                }
            });
        } else {
            swal("Your record is safe!");
        }
    });
}
</script>

@endsection