<!DOCTYPE html>
<html lang="en">
<head>
  <title>Price List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
</head>
<body>

<div class="container">
  <h2>Item Price List</h2> <div class="col-md-3"> <a href="{{route('pricecreate')}}" class="btn btn-primary">Add Product</a> <br></div>
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif  
@if (session('danger'))
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif

@if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif
<br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>SN</th>
        <th>Name</th>
        <th>Unit</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
        @foreach ($datas as $key=>$data)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$data->item->name}}</td>
            <td>{{$data->unit->name}}</td>
            <td>{{$data->price}}</td>  
            <td><a href="{{route('priceedit',$data->id)}}" class="btn btn-info">Edit</a> <a href="{{route('pricedelete',$data->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach
      
     
    </tbody>
  </table>
</div>

</body>

</html>

