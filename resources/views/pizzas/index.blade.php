@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Menu</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <a href="{{route('pizzas.index')}}" class="list-group-item list-group-item-action">View</a>
                            <a href="{{route('pizzas.create')}}" class="list-group-item list-group-item-action">Create</a>
                            <a href="{{route('user.order')}}" class="list-group-item list-group-item-action">Order</a>

                        </ul>



                    </div>
                </div>

            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">All Pizza</div>
                    <br>
                    <a href="{{route("pizzas.create")}}">                    <button class="btn btn-success" style="float: right">Add pizza</button>
                    </a>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table">
                            @if(count($pizzas)>0)
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">image</th>
                                    <th scope="col">name</th>
                                    <th scope="col">description</th>
                                    <th scope="col">category</th>
                                    <th scope="col">S.price</th>
                                    <th scope="col">M.price</th>
                                    <th scope="col">L.price</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($pizzas as $key=>$pizza)
                                    <tr class="Pizza{{$pizza->id}}">
                                        <th scope="row">{{$key+1}}</th>
                                        <td><img src="{{Storage::url($pizza->image)}}" width="80px"></td>
                                        <td>{{$pizza->name}}</td>
                                        <td>{{$pizza->description}}</td>
                                        <td>{{$pizza->category}}</td>
                                        <td>{{$pizza->small_pizza_price}}</td>
                                        <td>{{$pizza->medium_pizza_price}}</td>
                                        <td>{{$pizza->large_pizza_price}}</td>
                                        <td><a  class="btn btn-primary" href="{{route('pizzas.edit',$pizza->id)}}">Edit</a></td>
                                        <td><a  class="btn btn-danger delete " data-bs-toggle="modal" data-bs-target="#exampleModal{{$pizza->id}}">Delete</a></td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal{{$pizza->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <a type="button" class="btn btn-danger" href="{{route('pizzas.delete',$pizza->id)}}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @else  <p>No Pizza to show</p>
                                @endif


                                </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$pizzas->links()}}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
