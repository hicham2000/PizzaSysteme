@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Costomers</li>
                    </ol>

                </nav>
                <div class="card">
                    <div class="card-header">Customers
                        <a style="float: right" href="{{route('pizzas.index')}}" class="btn btn-primary">View Pizza</a>
                        <a style="float: right " href="{{route('pizzas.create')}}" class="btn btn-primary me-3">Create Pizza</a>
                    </div>

                    <div class="card-body">
                        <table class="table ">
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                <th scope="col">Membre since</th>
                                <th scope="col">Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>

                                    <th>{{$user->name}}</th>
                                    <td>{{$user->email}}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('D M Y') }}</td>
                                    <td><a  class="btn btn-danger delete " data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">Delete</a></td>


                                </tr>
                                <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a type="button" class="btn btn-danger" href="{{route('user.delete',$user->id)}}">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
