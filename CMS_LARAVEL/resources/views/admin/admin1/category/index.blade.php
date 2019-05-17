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
                function listMenu($listCategory, $position){
                 
                  foreach($listCategory as $key=>$category){   
                    echo '<div id="'.$category['id'].'" class="control child-'.$position.'">';              
                    echo '<p>'.$category['name'].'</p>';
                    echo "<div class='control-button'>";
                    echo '<button type="button" class="ml-1 btn btn-primary btn-xs" onclick="renameFunction(';
                    echo $category['id'];
                    echo ',';
                    echo "'".$category['name']."'";
                    echo ',';
                    echo "'".$category['slug']."'";
                    echo ')">rename</button>';
                    echo '<button type="button" class="ml-1 btn btn-warning btn-xs" onclick="addChildFunction('. $category['id'] .')">add</button>';
                    if($position >= 2){
                      echo '<button type="button" class="ml-1 btn btn-info btn-xs" onclick="removeChildFunction('. $category['id'] .')">remove</button>';
                    }
                    echo '<button type="button" class="ml-1 btn btn-danger btn-xs" onclick="deleteCategoryFunction('. $category['id'] .')">delete</button>';
                    
                    echo "</div>";
                    echo "</div>";
                    if(isset($category['child'])){
                      listMenu($category['child'],$position+1);
                    }
                      
                  }
                }
               
                listMenu($listCategory,1)
              @endphp
              
        </div>
       
      </div>
      <button type="button" class="ml-1 btn btn-warning btn-xs" onclick="addCategory()">Add Category</button> 
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
       
           @foreach ($listParentCategory as $key=>$category)
            <div>
            {{$category['name']}}
            </div>
           @endforeach
        </div>
        
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
  @include('admin.admin1.category.popup')
  @include('admin.admin1.layout.popup_message.confirm-delete')
  <script>
    function renameFunction(id, nameMenu, slug){
      $("#edit-name-category").val(nameMenu);
      $("#edit-slug-category").val(slug);
      $("#rename-modal").modal('show');
      $( "#rename-button" ).off().on( "click" , function() {   
        //alert(id);
        data = {
          'name': $("#edit-name-category").val(),
          'slug': $("#edit-slug-category").val(),
          'id':id,
          '_token': '{{ csrf_token() }}'
        }
        $('#rename-button').attr('disabled','disabled'); 
        $.ajax({
          url: "{{$_ENV['APP_URL']}}admins/category/rename",
          type: 'POST',
          data: data,
          success: function(response, status) {
            $('#'+id+' p').html($("#edit-name-category").val());
            $("#rename-modal").modal('hide');
            $('#rename-button').removeAttr('disabled');
          }
        }); 
      });
    }

    function addChildFunction(id){
      $('.category').removeAttr('disabled').css('color','black');
      $("#category-"+id).attr('disabled','disabled').css('color','red'); 
      $("#add-child-modal").modal('show');
      
      $( "#add-child-button" ).off().on( "click" , function() {
          //a = $('#category-parent').val();
          $('#add-child-button').attr('disabled','disabled'); 
          data = {
            'idChild':$('#category-parent').val(),
            'idCategory':id,
            '_token': '{{ csrf_token() }}'
          }

          $.ajax({
            url: "{{$_ENV['APP_URL']}}admins/category/add_child",
            type: 'POST',
            data: data,
            success: function(response, status) {
              location.reload(true);
            }
          });
      });
    }

    function removeChildFunction(categoryId){
      //alert(categoryId);
      data = {
        'categoryId':categoryId,
        '_token': '{{ csrf_token() }}'
      }

      $.ajax({
        url: "{{$_ENV['APP_URL']}}admins/category/remove_child",
        type: 'POST',
        data: data,
        success: function(response, status) {
          location.reload(true);
        }
      });
    }

    function deleteCategoryFunction(categoryId){
      $("#delete-confirm-modal").modal('show');
      $( "#agree-delete" ).off().on( "click" , function() {
        $('#agree-delete').attr('disabled','disabled'); 

        data = {
          'categoryId':categoryId,
          '_token': '{{ csrf_token() }}'
        }
  
        $.ajax({
          url: "{{$_ENV['APP_URL']}}admins/category/delete",
          type: 'DELETE',
          data: data,
          success: function(response, status) {
            location.reload(true);
          }
        });
      })
     
    }

    function addCategory(id, nameMenu, slug){
      $("#edit-name-category").val(nameMenu);
      $("#edit-slug-category").val(slug);
      $("#rename-modal").modal('show');
      $( "#rename-button" ).off().on( "click" , function() {   
        //alert(id);
        data = {
          'name': $("#edit-name-category").val(),
          'slug': $("#edit-slug-category").val(),
          '_token': '{{ csrf_token() }}'
        }
        $('#rename-button').attr('disabled','disabled'); 
        $.ajax({
          url: "{{$_ENV['APP_URL']}}admins/category/add_category",
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