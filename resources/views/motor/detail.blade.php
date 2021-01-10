@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card" style="background-color: white;">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">model</th>
                    <th scope="col">color</th>
                    <th scope="col">weight</th>
                    <th scope="col">price</th>
                    <th scope="col">photo</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="table-light">
                        <td>{{ $motor->model }}</td>
                        <td>{{ $motor->color }}</td>
                        <td>{{ $motor->weight }}</td>
                        <td>{{ $motor->price }}</td>
                        <td><img src="{{ URL::asset('storage/motors/' . $motor->photo) }}" /></td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
