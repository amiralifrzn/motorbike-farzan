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
            <form action="{{ url('/admin/motor/' . $motor->id . '/update' ) }}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="model">Model</label>
                <input type="text" class="form-control" name="model" placeholder="model..." value="{{ $motor->model }}" required>

                <label for="color">Color</label>
                <input type="text" class="form-control" name="color" placeholder="color..." value="{{ $motor->color }}" required>

                <label for="weight">Weight</label>
                <input type="text" class="form-control" name="weight" placeholder="weight..." value="{{ $motor->weight }}" required>

                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" placeholder="price..." value="{{ $motor->price }}" required>


                <label for="photo">photo</label>
                <input type="file" class="form-control" name="photo" placeholder="photo..." value="{{ $motor->photo }}" required>
                <img src="{{ URL::asset('storage/motors/' . $motor->photo) }}" />
                <br>
                <input type="submit" class="btn btn-primary">
                <a href="/admin/list">back to list</a>
            </form>
        </div>
    </div>
@endsection
