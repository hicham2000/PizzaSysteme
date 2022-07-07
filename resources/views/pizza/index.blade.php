@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">All Pizza</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                            <table class="table">
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
                                    <td><button  class="btn btn-primary">Edit</button></td>
                                    <td><a  class="btn btn-danger delete " href="{{route('pizza.delete',$pizza->id)}}">Delete</a></td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
