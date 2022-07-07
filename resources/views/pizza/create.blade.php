@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Menu</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <a href="{{route('pizza.index')}}" class="list-group-item list-group-item-action">View</a>
                            <a href="{{route('pizza.create')}}" class="list-group-item list-group-item-action">Create</a>

                        </ul>



                    </div>
                </div>
                @if(count($errors)>0)
                <div class="card">
                    <div class="card-body">

                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)

                                    <p>{{$error}}</p>


                                @endforeach
                            </div>

                    </div>
                </div>
                @endif
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pizza</div>


                    <form action="{{route('pizza.store')}}" method="post" enctype="multipart/form-data">
                        @csrf


                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" >Name of Pizza</label>
                            <input type="text" class="form-control" name="name" placeholder="Name of Pizza">
                        </div>
                        </br>
                        <div class="form-group">
                            <label for="description" >Description of Pizza</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        </br>
                        <div class="row">
                            <label class="col">Pizza price($)</label>
                            <input type="text" name="small_pizza_price" class="form-control col" placeholder="Small pizza price">
                            <input type="text" name="medium_pizza_price" class="form-control col" placeholder="Medium pizza price">
                            <input type="text" name="large_pizza_price" class="form-control col" placeholder="Large pizza price">
                        </div>
                        </br>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control" name="category">
                                <option value=""></option>
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="nonvegetarian">Non Vegetarian Pizza</option>
                                <option value="traditional">Traditional Pizza</option>
                            </select>

                        </div>
                        </br>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">

                        </div>
                        </br>

                        <div class="form-group text-center">
                            <label>Image</label>
                            <button class="btn btn-primary" type="submit">Save</button>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
