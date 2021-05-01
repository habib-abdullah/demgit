<!-- Insert Form  -->
<form id="SalesInquiryEditFrom">
    @csrf
    <input type="hidden" class="form-control" name="inquiry_id" id="inquiry_id" value="{{$data[0]->inquiry_id}}">
    <input type="hidden" class="form-control" name="item_id" id="item_id" value="{{$data[0]->item_id}}">
    <input type="hidden" class="form-control" name="attachment_id" id="attachment_id">
    <div class="form-group">
        <label>Item Description</label>
        <input type="text" class="form-control required_edit" name="edit_item_description" id="item_description"
            placeholder="Item Description" value="{{$data[0]->item_description}}">
    </div>
    <div class="form-group">
        <label>Item Qty</label>
        <input type="number" class="form-control required_edit" name="edit_item_quantity" id="item_quantity"
            placeholder="Item Quantity" value="{{$data[0]->item_quantity}}">
    </div>
    <div class="form-group">
        <label>Item Unit</label>
        <select class="form-control selectBox select2 required_edit" name="edit_item_unit" id="item_unit"
            style="width:100%;">
            <option selected disabled>Select</option>
            @if(count($uom) > 0)
            @foreach($uom as $client)
            @if($data[0]->uom_id == $client->uom_id)
            <option selected value="{{$client->uom_id}}">
                {{$client->uom_name}}
            </option>
            @else
            <option value="{{$client->uom_id}}">
                {{$client->uom_name}}
            </option>
            @endif
            @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label>Item Note</label>
        <input type="text" class="form-control required_edit" name="edit_item_note" id="item_note"
            placeholder="Item Note" value="{{$data[0]->item_note}}">
    </div>
    <!-- <div class="custom-file form-group">
        <label>Item Attachments</label>
        <input type="file" class=" form-control " id="item_attachments" name="edit_item_attachment[]" multiple>
    </div> -->
</form>
<!-- Insert Form  -->
