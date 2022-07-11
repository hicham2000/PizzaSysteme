@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Order
                        <a style="float: right" href="{{route('pizzas.index')}}" class="btn btn-primary">View Pizza</a>
                        <a style="float: right " href="{{route('pizzas.create')}}" class="btn btn-primary me-3">Create Pizza</a>
                    </div>

                    <div class="card-body">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Phone/Email</th>
                                <th scope="col">Date/Time</th>
                                <th scope="col">Pizza</th>
                                <th scope="col">S.pizza</th>
                                <th scope="col">M.pizza</th>
                                <th scope="col">L.pizza</th>
                                <th scope="col">Total($)</th>
                                <th scope="col">Message</th>
                                <th scope="col">status</th>
                                <th scope="col">Accept</th>
                                <th scope="col">Reject</th>
                                <th scope="col">Completed</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>

                                <th>{{$order->user->name}}</th>
                                <td>{{$order->user->email}}<br>{{$order->phone}}</td>
                                <td>{{$order->date}}/{{$order->time}}</td>
                                <td>{{$order->pizza->name}}</td>
                                <td>{{$order->small_pizza}}</td>
                                <td>{{$order->medium_pizza}}</td>
                                <td>{{$order->large_pizza}}</td>
                                <td>{{$TotalPrice = $order->pizza->small_pizza_price * $order->small_pizza +
                                  $TotalPrice = $order->pizza->medium_pizza_price * $order->medium_pizza +
                                  $TotalPrice = $order->pizza->large_pizza_price * $order->large_pizza}}</td>
                                <td>{{$order->message}}</td>
                                <td>{{$order->status}}</td>
                                <form action="{{route('user.status',$order->id)}}" method="post">
                                    @csrf
                                    <td>
                                        <input name="status" type="submit" value="Accepted" class="btn-primary btn btn-sm">

                                    </td>
                                    <td>
                                        <input name="status" type="submit" value="Rejected" class="btn-danger btn btn-sm">
                                    </td>
                                    <td>
                                        <input name="status" type="submit" value="Cmpleted" class="btn-success btn btn-sm">
                                    </td>




                                </form>
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
