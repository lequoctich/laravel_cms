
<?php
 // dd($listMenu);
?>

@foreach ($listMenu as $id => $value )
<tr>
    <td>{{$value['name']}}</td>
    <td>{{$value['local']}}</td>
    <td>
    @if(isset($value['child']))
        @foreach ($value['child'] as $childMenu)
        <p class="bg-gradient-success text-white" style="padding:2px" >
            {{$childMenu['name']}}
        </p>
        @endforeach
    
        
    @endif
    </td>
    <td>
    <div style="padding: auto;">
        <a href='{{$_ENV['APP_URL']}}/admins/menus/edits/{{$value['id']}}' class="btn btn-primary">edit</a>
        @if(!isset($value['child']))
        <button type="submit" value="{{$value['id']}}" class="btn btn-danger delete-menu" onclick="deleteMenu({{$value['id']}})">delete</button>      
        @endif
       
    </div>
    </td>
</tr>
@endforeach