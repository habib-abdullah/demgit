                              <form class="VisitorForm" id="AdminRole">
                               @csrf
                               <div class="card-body">
                                  <input type="hidden" name="type_id" id="type_id" value="{{$row->type_id}}">  
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="Visitor_name" id="Visitor_name" value="{{$row->type_name}}" autocomplete="off">
                                  <span name="error_form" id="Visitor_name_err"></span>
                                </div>
                                </div>
                              </form>