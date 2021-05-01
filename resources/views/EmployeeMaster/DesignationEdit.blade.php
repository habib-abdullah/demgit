<form id="DesignationUpdate">
    @csrf
    <input type="hidden" class="form-control" id="designation_id" name="designation_id"
        value="{{$row->designation_id}}">
    <div class="form-group">
        <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span>
        <label>Designation</label>
        <input type="text" class="form-control form-control-user border-primary" value="{{$row->designation_name}}"
            id="designation_name" name="designation_name" placeholder="Enter Designation">
    </div>
    <div class="form-group">
        <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span>
        <label>Workshop Employee</label>
        <select class="form-control" name="workshop_emp" id="workshop_emp">
            @if($row->workshop_emp == 1)
            <option selected value="1">Yes</option>
            <option value="0">No</option>
            @else
            <option value="1">Yes</option>
            <option selected value="0">No</option>
            @endif
        </select>
    </div>
    <div class="form-group" style="display:none;">
        <label>Employee Status</label>
        <select class="form-control" name="emp_status" id="emp_status">
            <option selected value="1">True</option>
            <option value="0">False</option>
        </select>
    </div>
    <div class="form-group">
        <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span>
        <label>Working site</label>
        <select class="form-control" name="working_site" id="working_site">
            @if($row->working_site == 'main_site')
            <option selected value="main_site">Main site</option>
            <option value="customer_site">Workd at customer site</option>
            @else
            <option value="main_site">Main site</option>
            <option selected value="customer_site">Workd at customer site</option>
            @endif
        </select>
    </div>
</form>