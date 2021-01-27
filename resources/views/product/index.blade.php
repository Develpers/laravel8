@extends('product.layout')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"> Products </h1>
    <p class="lead">
    	<a class="btn btn-primary btn-lg" href="{{ route('products.create')}}" role="button">Create  </a>
    <a class="btn btn-primary btn-lg" href="{{ route('product.trash')}}" role="button">Trash  </a>

    </p>
  </div>
</div>

  <div class="container">
      @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{$message}}
        </div>
      @endif
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
	  	<div class="col-sm"> <a  class="btn btn-success" href="{{ route('products.edit',$item->id)}}"> Edit </a></div>	
	    <div class="col-sm">	<a  class="btn btn-primary" href="{{ route('products.show',$item->id)}}"> show </a> </div>
	   <div class="col-sm"> <a  class="btn btn-danger" href="{{ route('soft.delete',$item->id)}}"> soft Delete </a></div>
    <!-- -----------------------------------------------------------
     <div class="col-sm">	        
          <form action="{{ route('products.destroy',$item->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"> Delete</button>
	        </form>
	     </div>
       ------------------------------------------------------------------------->
	  </div>
	  </td>
    </tr>
    @endforeach
  </tbody>
</table>
     {!! $products->links() !!}
</div>
@endsection