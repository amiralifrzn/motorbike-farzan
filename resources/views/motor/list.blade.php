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
                    <th scope="col">details</th>
                    @role('Admin')
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                    @endrole
                </tr>
                </thead>
                <tbody>
                    @foreach($motors as $motor)
                        <tr class="table-light">
                            <td>{{ $motor->model }}</td>
                            <td>{{ $motor->color }}</td>
                            <td>{{ $motor->weight }}</td>
                            <td>{{ $motor->price }}</td>
                            <td><img src="{{ URL::asset('storage/motors/' . $motor->photo) }}" /></td>
                            <td><a href="/motor/{{ $motor->id }}/detail" class="btn btn-primary">details</a></td>
                            @role('Admin')
                            <td><a href="/admin/motor/{{ $motor->id }}/edit" class="btn btn-warning">edit</a></td>

                            <td>
                                <form action="{{ url('/admin/motor/' . $motor->id . '/delete') }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                            </td>
                            @endrole
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
