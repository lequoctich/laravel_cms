@extends('admin.admin1.layout.master')
<style>
    .child-2{margin-left:20%}
    .child-3{margin-left:30%}
    .child-4{margin-left:40%}
    .ml-1{margin-left:1px}
    .control-button{display: none}
    .control:hover>.control-button{
      display: block;
  }
</style>
@section('content')
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
        
              @php
                //$position = 1;
                function listMenu($listPage, $position){
                 
                  foreach($listPage as $key=>$page){   
                    echo '<div id="'.$page['id'].'" class="control child-'.$position.'">';              
                    echo '<p>'.$page['name'].'</p>';
                    echo "<div class='control-button'>";
                    echo '<button type="button" class="ml-1 btn btn-primary btn-xs" onclick="renameFunction(';
                    echo $page['id'];
                    echo ',';
                    echo "'".$page['name']."'";
                    echo ',';
                    echo "'".$page['slug']."'";
                    echo ')">rename</button>';
                    echo '<button type="button" class="ml-1 btn btn-warning btn-xs" onclick="addChildFunction('. $page['id'] .')">add</button>';
                    if($position >= 2){
                      echo '<button type="button" class="ml-1 btn btn-info btn-xs" onclick="removeChildFunction('. $page['id'] .')">remove</button>';
                    }
                    echo '<button type="button" class="ml-1 btn btn-danger btn-xs" onclick="deletePageFunction('. $page['id'] .')">delete</button>';
                    
                    echo "</div>";
                    echo "</div>";
                    if(isset($page['child'])){
                      listMenu($page['child'],$position+1);
                    }
                      
                  }
                }
               
                listMenu($listPage,1)
              @endphp
              
        </div>
       
      </div>
      <button type="button" class="ml-1 btn btn-warning btn-xs" onclick="addPage()">Add page</button> 
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
       
           @foreach ($listParentPage as $key=>$page)
            <div>
            {{$page['name']}}
            </div>
           @endforeach
        </div>
        
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
  @include('admin.admin1.page.popup')
  @include('admin.admin1.layout.popup_message.confirm-delete');
  <script>
    function renameFunction(id, nameMenu, slug){
      $("#edit-name-page").val(nameMenu);
      $("#edit-slug-page").val(slug);
      $("#rename-modal").modal('show');
      $( "#rename-button" ).off().on( "click" , function() {   
        //alert(id);
        data = {
          'name': $("#edit-name-page").val(),
          'slug': $("#edit-slug-page").val(),
          'id':id,
          '_token': '{{ csrf_token() }}'
        }
        $('#rename-button').attr('disabled','disabled'); 
        $.ajax({
          url: "{{$_ENV['APP_URL']}}admins/page/rename",
          type: 'POST',
          data: data,
          success: function(response, status) {
            $('#'+id+' p').html($("#edit-name-page").val());
            $("#rename-modal").modal('hide');
            $('#rename-button').removeAttr('disabled');
          }
        }); 
      });
    }

    function addChildFunction(id){
      $('.page').removeAttr('disabled').css('color','black');
      $("#page-"+id).attr('disabled','disabled').css('color','red'); 
      $("#add-child-modal").modal('show');
      
      $( "#add-child-button" ).off().on( "click" , function() {
          //a = $('#page-parent').val();
          $('#add-child-button').attr('disabled','disabled'); 
          data = {
            'idChild':$('#page-parent').val(),
            'idPage':id,
            '_token': '{{ csrf_token() }}'
          }

          $.ajax({
            url: "{{$_ENV['APP_URL']}}admins/page/add_child",
            type: 'POST',
            data: data,
            success: function(response, status) {
              location.reload(true);
            }
          });
      });
    }

    function removeChildFunction(pageId){
      //alert(pageId);
      data = {
        'pageId':pageId,
        '_token': '{{ csrf_token() }}'
      }

      $.ajax({
        url: "{{$_ENV['APP_URL']}}admins/page/remove_child",
        type: 'POST',
        data: data,
        success: function(response, status) {
          location.reload(true);
        }
      });
    }

    function deletePageFunction(pageId){
      $("#delete-confirm-modal").modal('show');
      $( "#agree-delete" ).off().on( "click" , function() {
        $('#agree-delete').attr('disabled','disabled'); 

        data = {
          'pageId':pageId,
          '_token': '{{ csrf_token() }}'
        }
  
        $.ajax({
          url: "{{$_ENV['APP_URL']}}admins/page/delete",
          type: 'DELETE',
          data: data,
          success: function(response, status) {
            location.reload(true);
          }
        });
      })
     
    }

    function addPage(id, nameMenu, slug){
      $("#edit-name-page").val(nameMenu);
      $("#edit-slug-page").val(slug);
      $("#rename-modal").modal('show');
      $( "#rename-button" ).off().on( "click" , function() {   
        //alert(id);
        data = {
          'name': $("#edit-name-page").val(),
          'slug': $("#edit-slug-page").val(),
          '_token': '{{ csrf_token() }}'
        }
        $('#rename-button').attr('disabled','disabled'); 
        $.ajax({
          url: "{{$_ENV['APP_URL']}}admins/page/add_page",
          type: 'POST',
          data: data,
          success: function(response, status) {
            location.reload(true);
          }
        }); 
      });
    }

  </script>

@endsection