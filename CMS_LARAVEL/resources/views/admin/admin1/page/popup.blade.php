{{--  model rename page popup  --}}
<div class="modal" id="rename-modal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" >
          <h4 class="modal-title">Nhập tên mới</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">               
              <div id="sortable" class="form-group" style="padding:10px;">
                <pre>
                 name: <input type="text" id="edit-name-page" class="title-slug" onkeyup="ChangeToSlug()"> 

                 slug: <input type="text" id="edit-slug-page" class="slug">       
                </pre>
              </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button id="rename-button" value="Submit" class="btn btn-primary">Change</button>
        </div>
        
      </div>
    </div>
  </div>                        
{{--  /model popup  --}}

{{-- add child page popup  --}}
<div class="modal" id="add-child-modal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header" >
              <h4 class="modal-title">Chon page Con</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">               
                  <div id="sortable" style="padding:10px;">
                        <div class="form-group">
                                <label for="sel1">Select list:</label>
                                <select class="form-control" id="page-parent">
                                    <option id="start-select" disabled selected hidden>Select your option</option>
                                    @foreach ($listParentPage as $key=>$page)
                                    <option value="{{$page['id']}}" id="page-{{$page['id']}}" class="page">
                                    {{$page['name']}}
                                    </option>
                                    @endforeach
                                  
                                </select>
                        </div>      
                  </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button id="add-child-button" value="Submit" class="btn btn-primary">Change</button>
            </div>
            
          </div>
        </div>
      </div>                        
    {{--  /model popup  --}}



