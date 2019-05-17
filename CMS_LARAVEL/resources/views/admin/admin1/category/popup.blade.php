{{--  model rename category popup  --}}
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
                 name: <input type="text" id="edit-name-category" class="title-slug" onkeyup="ChangeToSlug()"> 

                 slug: <input type="text" id="edit-slug-category" class="slug">       
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

{{-- add child category popup  --}}
<div class="modal" id="add-child-modal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header" >
              <h4 class="modal-title">Chon Category Con</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">               
                  <div id="sortable" style="padding:10px;">
                        <div class="form-group">
                                <label for="sel1">Select list:</label>
                                <select class="form-control" id="category-parent">
                                    <option id="start-select" disabled selected hidden>Select your option</option>
                                    @foreach ($listParentCategory as $key=>$category)
                                    <option value="{{$category['id']}}" id="category-{{$category['id']}}" class="category">
                                    {{$category['name']}}
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



