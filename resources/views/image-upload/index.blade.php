@extends('layouts.theme')

@section('content')
<h1>เพิ่มรูปการซัพพอตลูกค้า </h1>
<?php
session_start();
?>


<head>

    <title>Laravel 5.7 image upload example - HDTuto.com</title>

    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">

</head>

  

<body>

<div class="container">

   

    <div class="panel panel-primary">

      <div class="panel-heading"><h2>Laravel 5.7 image upload example - HDTuto.com</h2></div>

      <div class="panel-body">

   

        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

        </div>

        <img src="images/{{ Session::get('image') }}">

        @endif

  

        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

  

        <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">

  

                <div class="col-md-6">

                    <input type="file" name="image" class="form-control">

                </div>

   

                <div class="col-md-6">

                    <button type="submit" class="btn btn-success">Upload</button>

                </div>

   

            </div>

        </form>

  

      </div>

    </div>

</div>

</body>
	

@endsection



