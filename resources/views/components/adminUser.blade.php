<tr>
  <td > {{$u -> user_ID}}</td>
  <td > {{$u -> username}}</td>
  <td > {{$u -> roleName}}</td>
  <td>{{$u -> email}}</td>
  <td>
    @if($u -> roleName == 'admin')
      -
    @else

    {{$u -> registration_date}}
    @endif



  </td>
  <td>{{$u -> last_active}}</td>
  @if($u -> active == 1)
  <td><i class="fa fa-circle green" aria-hidden="true"></i></td>

  @else
  <td><i class="fa fa-circle red" aria-hidden="true"></i></td>
  @endif

  @if($u -> path == null)
  <td>No image</td>
  @else
  <td><img src="{{asset('main/images/user/' . $u -> path)}}" alt="{{$u -> username}}" /></td>
  @endif


</tr>
