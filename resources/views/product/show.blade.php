@extends('product.layout')

@section('content')
<div class="container" style="padding-top: 5%"  >
	<div class="card"  style="padding-top: 2%" >
  
  <div class="card-body">
  <div><h3 class="card-title">show product</h3></div>	
    <p class="card-text"><div> <a class="btn btn-primary" href="{{ route('products.index')}}"> back</a></div>  
         <h5>Product name : {{ $product->name  }}  </h5></p>
    
  </div>
</div>

	
</div>

<div class="container"style="padding-top: 8%">
 

		@csrf
  

  <div class="form-group">
    <label for="exampleFormControlInput1">{{ $product->name  }}</label>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">{{ $product->price  }}</label>
  </div>
  
  <div class="form-group">
      {!! $product->detail  !!}
  </div>

        
</div>
</div>





@endsection