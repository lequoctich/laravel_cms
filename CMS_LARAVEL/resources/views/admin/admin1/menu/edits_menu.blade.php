@extends('admin.admin1.layout.master')

@section('content')
<?php
//dd($childMenuPage);
?>
<style>
        p:hover { 
            background-color: yellow;
            cursor:pointer;
        }
</style>
<h2>MENU MANAGER</h2>
<div id="content" style="margin-top:50px">
    <div class="container-fluid">
        <div class="row">   
            <!-- Content Column -->
            <div class="col-lg-4">
                <!-- Project Card Example -->
                <div class="card shadow">             
                    <div>
                            <div class="card bg-info text-white shadow">
                                <div class="card-body">
                                    <div class="Show All Category">
                                        <input type="text" class="form-control menuName" value="{{$menu[0]['name']}}" name="name">
                                    </div>
                                </div>
                            </div>
                    </div>
                    
                </div>


                <div class="card shadow">             
                        <div>
                                <div class="card bg-info text-white shadow">
                                    <div class="card-body">
                                            <div id="category-id" style='padding:20px'>
                                                <h3>PAGE ITEM</h3>
                                                @foreach($listPage as $item)
                                                    <p id="page_{{$item->id}}">{{$item->name}}</p>                                            
                                                @endforeach
                                                <h3>CATEGORY ITEMS</h3>
                                                @foreach($listCategory as $item)
                                                    <p id="category_{{$item->id}}">{{$item->name}}</p>                                            
                                                @endforeach
                                            </div>
                                    </div>
                                </div>
                        </div>      
                </div>

                <div class="card shadow"> 
                    <button id="changeMenu" class="btn btn-danger">ChangeMenu</button>
                </div>
                <!-- Color System -->                                              
            </div>
            <div class="col-lg-8 mb-8">
                    <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div id="child-menu"style='padding:20px'>
                        @foreach($childMenuPage as $item)
                            <p id="page_{{$item->id}}">{{$item->name}}</p>                                            
                        @endforeach
                        @foreach($childMenuCategory as $item)
                            <p id="category_{{$item->id}}">{{$item->name}}</p>                                            
                        @endforeach
                    </div>
                </div>
            </div>     
        </div>
    </div>
    @include('admin.admin1.layout.popup_message.message')
</div>

<script>
    
    $(document).ready(function(){
        $("#category-id p").click(function(){
            var CategoryId = $(this).attr("id");
            
            var html = $("#category-id #"+CategoryId).html();

            var childMenu = '<p id="'+CategoryId+'">'+html+'</p>';
            $("#child-menu #"+CategoryId).remove();
            $("#child-menu").append(childMenu);
           
        });


        $("#child-menu").on('click', 'p', function (){
            $(this).remove();
        })

        $('#changeMenu').click(function(){
            var childMenu = $('#child-menu').find('p');
            var CategoryId = [];
            var PageId = [];
            $.each(childMenu, function( index, value ) {
                arrId = value.id.split("_");
                if(arrId[0] == 'page'){
                    PageId.push(arrId[1]);
                }
                else if(arrId[0] == 'category'){
                    CategoryId.push(arrId[1]);
                }
            });
            
            var data = {
                'menuId':{{$menu[0]['id']}},
                'menuName':$(".menuName").val(),
                'pageId':PageId,
                'CategoryId':CategoryId,
                '_token': '{{ csrf_token() }}'
            }
           
            $.ajax({
                url: '{{$_ENV['APP_URL']}}admins/menus/ajax/edit_menu',
                type: 'PUT',
                data: data,
                success: function(response) {
                    if(response ==200){
                        $('#message-modal').modal('show'); 
                        return;
                    }
                    else{
                        console.log("error");
                    }
                   
                }
             });
                       
        })
    });
</script>
@endsection