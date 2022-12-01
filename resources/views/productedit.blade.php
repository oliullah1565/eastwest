<!DOCTYPE html>
<html lang="en">
<head>
  <title>Price Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
</head>
<body>

<div class="container">
  <h2>Item Price Edit</h2> 
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
           
  <form  action="{{route('priceupdate',$data->id)}}" method="POST">
    @csrf
   
     <div class="form-group">
      <label for="exampleFormControlitem">Item select</label>
      <select class="form-control" id="exampleFormControlitem" name="item_id">
        <option value="">Select One</option>
        @foreach ($items as $item)
          <option value="{{$item->id}}" @if ($item->id==$data->item_id) selected @endif>{{$item->name}}</option>
          
        @endforeach
        
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlitem">Unit select</label>
      <select class="form-control" id="exampleFormControlitem" name="unit_id">
        <option value="">Select One</option>
        @foreach ($units as $unit)
          <option value="{{$unit->id}}" @if ($unit->id==$data->unit_id) selected @endif>{{$unit->name}}</option>
        @endforeach
        
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPrice">Price</label>
      <input type="text" class="form-control" value="{{$data->price}}" id="exampleInputPrice" name="price" placeholder="Enter Price">
    </div>
   
    <button type="submit" class="btn btn-primary">Update</button> <a href="{{route('pricelist')}}" class="btn btn-danger">Back</a> <br>
  </form>
</div>

</body>

</html>

