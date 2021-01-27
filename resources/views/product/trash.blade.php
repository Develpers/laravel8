@extends('product.layout')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"> Trashed Products </h1>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="{{ route('products.index')}}" role="button">home  </a>
    

    </p>
  </div>
</div>

  
<div class="container">
<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Detail</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @php
    $i = 0;
    @endphp
    
    @foreach ($products as $item)
 
    <tr>
      <th scope="row">{{++$i}}</th>
      <td>{{ $item->name }}</td>
    <td>{{ $item->price }} $ </td>
    <td>{{ $item->detail }} </td>

    <td>
    <div class="row"> 
      <div class="col-sm">  <a  class="btn btn-primary" href="{{ route('product.back.from.trash',$item->id)}}"> Restore </a> </div>
            <div class="col-sm">  <a  class="btn btn-danger" href="{{ route('product.delete.from.database',$item->id)}}">Deleted  </a> </div>

      </div>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
     {!! $products->links() !!}
</div>
@endsection