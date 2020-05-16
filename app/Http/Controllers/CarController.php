<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Category;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('cars.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required|string',
            'description' => 'required|string',
            'rates' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required',
            'transmission' => 'required',
            'image' => 'required|image'
        ]);
        
        
        $newCar = new Car();
        $newCar->model = htmlspecialchars($request->model);
        $newCar->description = htmlspecialchars($request->description);
        $newCar->rates = $request->rates;
        $newCar->quantity = $request->quantity;
        $newCar->category_id = $request->category;
        $newCar->transmission = $request->transmission;

        $image = $request->file('image');
        $file_name = time().".".$image->getClientOriginalExtension();
        $file_destination = "images/";
        $image->move($file_destination, $file_name);

        $newCar->image =  $file_destination.$file_name;

        // dd($newCar);
     
        $newCar->save();
        
        return redirect()->back()->with('message', 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);

        return view('cars.show', compact('car'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $categories = Category::all();

        return view('cars.edit', compact('car', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'model' => 'required|string',
            'description' => 'required|string',
            'rates' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required',
            'transmission' => 'required',
            'image' => 'required|image'
        ]);
        
        
        $updateCar = Car::find($id);
        $updateCar->model = htmlspecialchars($request->model);
        $updateCar->description = htmlspecialchars($request->description);
        $updateCar->rates = $request->rates;
        $updateCar->quantity = $request->quantity;
        $updateCar->category_id = $request->category;
        $updateCar->transmission = $request->transmission;

        
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $file_name = time().".".$image->getClientOriginalExtension();
            $file_destination = "images/";
            $image->move($file_destination, $file_name);
            
            $updateCar->image = $file_destination.$file_name;
        }
        
        // dd($updateCar);
     
        $updateCar->save();
        
        return redirect()->back()->with('message', 'success');
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
    }

    
}
