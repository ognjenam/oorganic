<tr>
  <td class='text-capitalize'> {{$c -> category_ID}}</td>
  <td class='text-capitalize'> {{$c -> name}}</td>
  <td >
    {{$c -> productsNumber}}
  </td>

    <td>
      <a href="{{url('/dashboard/categories/edit/' . $c -> category_ID )}}">Edit</a>

    </td>


  <form  action="{{url('/dashboard/categories/delete/' . $c -> category_ID)}}" method="post">
    @csrf
    @method('DELETE')
    <td>
      <button class='btn-dashboard' type="submit" name="button">Delete</button>
    </td>
  </form>

</tr>
