<form id="SalesOrderItemEditForm">
    <input type="hidden" class="form-control form-control-user" id="sales_order_id" name="sales_order_id"
        autocomplete=" off" placeholder="Enter Item Description" value="{{$sales[0]->sales_order_id}}">
    <input type="hidden" class="form-control form-control-user  " id="item_id" name="item_id" autocomplete=" off"
        placeholder="Enter Item Description" value="{{$items[0]->item_id ?? ''}}">
    @csrf
    <div class="form-group">
        <lable>Description</lable>
        <input type="text" class="form-control form-control-user isrequired " id="item_description"
            name="item_description" autocomplete=" off" placeholder="Enter Item Description"
            value="{{$items[0]->item_description ?? ''}}">
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <lable>Receiving Date</lable>
                <input type="datetime-local" class="form-control form-control-user isrequired " id="receive_date"
                    name="receive_date" autocomplete=" off" placeholder="Enter Site Name"
                    value="{{$items[0]->receive_date ?? ''}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable>Delivery Date</lable>
                <input type="datetime-local" class="form-control form-control-user isrequired " id="delivery_date"
                    name="delivery_date" autocomplete=" off" placeholder="Enter Item Delivery Date"
                    value="{{$items[0]->delivery_date ?? ''}}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <lable>UOM</lable>
                <select id="id" class="form-control select4" name="uom_id" id="uom_id" style="width: 100%;">
                    @if(count($unit) > 0)
                    @foreach($unit as $row)
                    @if($row->uom_id == $items[0]->uom_id)
                    <option selected value="{{$row->uom_id}}">
                        {{$row->uom_name}}
                    </option>
                    @else
                    <option value="{{$row->uom_id}}">
                        {{$row->uom_name}}
                    </option>
                    @endif
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable>Qty</lable>
                <input type="number" class="form-control form-control-user isrequired " id="item_quantity"
                    name="item_quantity" autocomplete=" off" placeholder="Enter Item Quantity"
                    value="{{$items[0]->item_quantity ?? ''}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable>Rate</lable>
                <input type="number" class="form-control form-control-user isrequired " id="item_rate" name="item_rate"
                    autocomplete=" off" placeholder="Enter Item Rate" value="{{$items[0]->item_rate ?? ''}}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <lable>Gross Total</lable>
                <input type="number" class="form-control form-control-user isrequired " id="gross_total"
                    name="gross_total" autocomplete=" off" value="{{$items[0]->gross_total ?? ''}}" readonly>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable>VAT</lable>
                <input type="number" class="form-control form-control-user isrequired " id="vat_total" name="vat_total"
                    autocomplete=" off" value="{{$items[0]->vat_total ?? ''}}" readonly>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable>Net</lable>
                <input type="number" class="form-control form-control-user isrequired " id="net_total" name="net_total"
                    autocomplete=" off" value="{{$items[0]->net_total ?? ''}}" readonly>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <lable> Interval</lable>
                <!-- <input type="text" class="form-control form-control-user isrequired " id="time_interval"
                    name="time_interval" autocomplete=" off" value="{{$items[0]->time_interval ?? ''}}"> -->
                <select class="form-control form-control-user isrequired " id="time_interval"
                    name="time_interval">
                    <option selected disabled>Select</option>
                    @if($items[0]->time_interval == "Min")
                    <option value="Min" selected>Min</option>
                    <option value="Hour">Hour</option>
                    @else
                    <option value="Min">Min</option>
                    <option value="Hour" selected>Hour</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable> Time/Unit</lable>
                <input type="text" class="form-control form-control-user isrequired " id="time_unit" name="time_unit"
                    autocomplete=" off" value="{{$items[0]->time_unit ?? ''}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable> Cost/Unit</lable>
                <input type="text" class="form-control form-control-user isrequired " id="cost_unit" name="cost_unit"
                    value="{{$items[0]->cost_unit ?? ''}}" autocomplete=" off">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable> Total (Mins)</lable>
                <input type="time" class="form-control form-control-user isrequired " id="total_time" name="total_time"
                    value="{{$items[0]->total_time ?? ''}}" autocomplete=" off" readonly>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <lable> Note </lable>
                <input type="text" class="form-control form-control-user isrequired " id="item_note" name="item_note"
                    value="{{$items[0]->item_note ?? ''}}" autocomplete=" off">
            </div>
        </div>
    </div>
</form>