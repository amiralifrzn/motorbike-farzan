@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card" style="background-color: white;">
            @if($errors->any())
                <ul id="danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="model">Model</label>
                <input type="text" class="form-control" name="model" placeholder="model..." required>

                <label for="color">Color</label>
                <input type="text" class="form-control" name="color" placeholder="color..." required>

                <label for="weight">Weight</label>
                <input type="text" class="form-control" name="weight" placeholder="weight..." required>

                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" placeholder="price..." required>

                <label for="photo">photo</label>
                <input type="file" class="form-control" name="photo" placeholder="photo..." required>

                <br>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
