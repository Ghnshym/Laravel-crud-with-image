<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    @include('layout.app');
    <div class="container">
      <h2>Register here </h2>
        <div class="container">
            @if($message= Session::get('message'))
                <div class="alert alert-success alert-block alert-dismissible"> <strong>{{ $message }}</strong></div>
            @endif
        </div>
        <form action="{{ route('create.user') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">Enter Name :</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
              @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Email :</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
              </div>
              
              <div class="mb-3">
                <label class="form-label">Enter Phone :</label>
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                @if($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
              @endif
              </div>
              <div class="mb-3">
                <label  class="form-label">Upload Your photo :</label>
                <input type="file" class="form-control" name="photo" >
                @if($errors->has('photo'))
                <span class="text-danger">{{ $errors->first('photo') }}</span>
              @endif
              </div>
            <div class="mb-3">
              <label  class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
              @if($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>