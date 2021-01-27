@extends('product.layout')

@section('content')
<div class="container" style="padding-top: 5%"  >
	<div class="card"  style="padding-top: 2%" >
  
  <div class="card-body">
  	<h5 class="card-title">Create product</h5>
    <p class="card-text"></p>
    
  </div>
</div>

	
</div>

<div class="container"style="padding-top: 8%">
	<form action="{{ route('products.store')}}" method="POST" >
		@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" name ="name" class="form-control"  placeholder="product name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Price</label>
    <input type="text"  name ="price"class="form-control"  placeholder="product Price">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Detail </label>
    <textarea class="form-control"  name ="detail" rows="3"></textarea>
  </div>
  <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>

        </div>
</form>
</div>





@endsection