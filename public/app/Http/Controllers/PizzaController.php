<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaStoreRequiest;
use App\Http\Requests\PizzaUpdateRequiest;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pizzas = Pizza::paginate(5);
        return view('pizzas.index',compact('pizzas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizzas.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaStoreRequiest $request)
    {
        //
        $path = $request->image->store('public/pizzas');
        Pizza::create([
            'name' => $request->name,
            'description' => $request->description,
            'small_pizza_price' => $request->small_pizza_price,
            'medium_pizza_price' => $request->medium_pizza_price,
            'large_pizza_price' => $request->large_pizza_price,
            'category'=>$request->category,
            'image' => $path,

        ]);
        return redirect()->route('pizzas.index')->with('message','Pizza added succefuly ');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pizza = Pizza::find($id);

        if (!$pizza){
            return redirect()->route('pizzas.index');
        }
        else{
            return view('pizzas.edit',compact('pizza'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaUpdateRequiest $request, $id)
    {
        //
        $pizza = Pizza::find($id);
          if (!$pizza){
              return redirect()->route('pizzas.index');

          }
          else{
              if ($request->has('image')){
                  $path = $request->image->store('public/pizzas');
              }else{
                  $path = $pizza->image;
              }

              $pizza->name = $request->name;
              $pizza->description = $request->description;
              $pizza->small_pizza_price = $request->small_pizza_price;
              $pizza->medium_pizza_price = $request->medium_pizza_price;
              $pizza->large_pizza_price = $request->large_pizza_price;
              $pizza->category = $request->category;
              $pizza->image = $path;
              $pizza->save();
              return redirect()->route('pizzas.index')->with('message','Pizza updated succefuly ');

          }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pizza = Pizza::find($id);
        if($pizza){
            $pizza->delete();
            return redirect()->route('pizzas.index')->with('message','Pizza deleted succefuly ');

        }
        else{
            return redirect()->route('pizzas.index');


        }

    }
}
