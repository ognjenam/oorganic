<tr>
  <td > {{$p -> product_ID}} </td>
  <td class="py-1">
    <img src="{{asset('main/images/' . $p -> categoryName . '/' . $p -> path)}}" alt="{{$p -> name}}" />
  </td>
  <td class='text-capitalize'> {{$p -> name}}</td>
  <td class='product-descr'>
    {{$p -> description}}
  </td>
  <td> $ {{$p -> price}}</td>
  <td class='text-capitalize'> {{$p -> categoryName}} </td>



    <td>
        <a href="{{url('/dashboard/products/edit/' . $p -> product_ID)}}">Edit</a>
    </td>


  <form  action="{{url('/dashboard/products/delete/' . $p -> product_ID)}}" method="post">
    @csrf
    @method('DELETE')
    <td>
      <button class='btn-dashboard' type="submit" name="button">Delete</button>
    </td>
  </form>
</tr>
