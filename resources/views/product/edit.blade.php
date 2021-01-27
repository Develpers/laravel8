@extends('product.layout')

@section('content')
<div class="container" style="padding-top: 5%"  >
	<div class="card"  style="padding-top: 2%" >
  
  <div class="card-body">
  <div><h3 class="card-title">Edit product</h3></div>	
    <p class="card-text"><div> <a class="btn btn-primary" href="{{ route('products.index')}}"> back</a></div>  
         <h5>Product name : {{ $product->name  }}  </h5></p>
    
  </div>
</div>

	
</div>

<div class="container"style="padding-top: 8%">
	<form action="{{ route('products.update', $product->id)}}" method="POST" >
		@csrf
    @method('PUT')

  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" name ="name" value="{{ $product->name  }}" class="form-control"  placeholder="product name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Price</label>
    <input type="text"  name ="price" value="{{ $product->price  }}" class="form-control"  placeholder="product Price">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Detail </label>
    <textarea class="form-control"  name ="detail"  rows="3">
      {!! $product->detail  !!}
    </textarea>
  </div>
  <div class="form-group">
            <button type="submit" class="btn btn-primary">updata</button>

        </div>
</form>
</div>





@endsection