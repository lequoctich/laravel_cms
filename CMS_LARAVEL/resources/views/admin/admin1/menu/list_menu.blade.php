
@extends('admin.admin1.layout.master')

@section('content')
<script type="text/javascript">
//reload lai trang khi nhan nut back
window.addEventListener( "pageshow", function ( event ) {
        var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
        if ( historyTraversal ) {
        window.location.reload();
         }
    });
</script>
<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <thead>
              <tr>
                <th>Name</th>
                <th>local</th>
                <th>child</th>
                <th></th>         
              </tr>
            </thead>
           
            <tbody id='containMenu'>
              @include('admin.admin1.menu.list_menu_ajax')
            </tbody>
          
          </table>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sort-modal">
              SORT MENU
          </button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-menu">
            Add Menu
          </button>
          {{--  model sort menu popup  --}}
            <div class="modal" id="sort-modal">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header" >
                    <h4 class="modal-title">hãy kéo thả menu</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">               
                        <div id="sortable" style="padding:10px;">
                            @foreach ($listMenu as $id => $value )
                            <li class="bg-gradient-info text-white" style="padding:10px;margin:10px;cursor:move" id="{{$value['id']}}">{{$value['name']}}</li>
                            @endforeach
                        </div>

                  </div>
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button id="sort-menu" value="Submit" class="btn btn-primary">Change</button>
                  </div>
                  
                </div>
              </div>
            </div>    
            <script>    
                $("#sortable" ).sortable();
                $("#sortable" ).disableSelection();
                $("#sort-menu").click(function(){
                  $("#sort-menu").attr('disabled','disabled');
                  var idMenu = $("#sortable").find('li');
                  var id = [];
                  var index = 0;
                  $.each(idMenu, function( index, value ) {
                    id.push([value.id,index+1]);
                  });

                  var data = {'_token': '{{ csrf_token() }}','id':id}
                  
                  $.post("{{$_ENV['APP_URL']}}admins/menus/ajax/sort_menu",data, function(data, status){
                    $('#containMenu').html(data);

                    $('#sort-modal').modal('hide'); 
                    $("#sort-menu").removeAttr('disabled');         
                  });
                  
                });              
          </script>                    
          {{--  /model popup  --}}

          {{--ADD MENU--}}
           
           <div class="modal" id="add-menu">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header" >
                  <h4 class="modal-title">add name</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">               
                    <input type="text" id="name-menu" placeholder="nhap ten">
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button id="add-name" value="Submit" class="btn btn-primary">Change</button>
                </div>
                
              </div>
            </div>
          </div>
          <script>
           $("#add-name").click(function(){
            $("#add-menu").attr('disabled','disabled'); 
            var name = $("#name-menu").val();
            
            var data = {'_token': '{{ csrf_token() }}','menuName':name}

            $.post("{{$_ENV['APP_URL']}}admins/menus/ajax/add_menu",data, function(data, status){
              $('#containMenu').html(data);
              $('#add-menu').modal('hide'); 
              $("#add-menu").removeAttr('disabled');   
            });   
           })
                        
          </script>                  
          {{--/ADDMENU--}}
          {{--delete pop up--}}
          @include('admin.admin1.layout.popup_message.confirm-delete')
          <script>
            function deleteMenu(id){
              var data = {
                'menuId':id,
                '_token': '{{ csrf_token() }}'
              }
              $("#delete-confirm-modal").modal('show');
              //dung off() de khong bi lap lai su kien
              $( "#agree-delete" ).off().on( "click" , function() {   
                  $('#agree-delete').attr('disabled','disabled'); 
                  $.ajax({
                    url: "{{$_ENV['APP_URL']}}admins/menus/ajax/delete_menu",
                    type: 'DELETE',
                    data: data,
                    success: function(response, status) {
                      $('#containMenu').html(response);
                      $('#delete-confirm-modal').modal('hide');     
                      $('#agree-delete').removeAttr('disabled');           
                    }
                 });   
              });
            };
           
          </script>
          {{--delete pop up--}}

        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


@endsection
     