<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Category;

class CarController extends Controller

{
    public function carList()
    {   
        $cars = Car::all();
        return view('cars.list', compact('cars'));
    }



    public function carAdd()
    {
        $categories = Category::all();
        return view('cars.add', compact('categories'));
    }



    public function carSave(Request $request)
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
        alert()->success('Added Successfully');
        return redirect()->back();

    }



    public function carInfo($id)
    {
        $car = Car::find($id);

        return view('cars.info', compact('car'));   
    }



    public function carEdit($id)
    {
        $car = Car::find($id);
        $categories = Category::all();

        return view('cars.edit', compact('car', 'categories'));
    }

    

    public function carUpdate(Request $request, $id)
    {
        $request->validate([
            'model' => 'required|string',
            'description' => 'required|string',
            'rates' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required',
            'transmission' => 'required',
            'image' => 'image'
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

     
        $updateCar->save();
        alert()->success('Updated Successfully');
        return redirect()->back();
    }

    public function carDelete($id) {

        $car = Car::find($id);
        $car->delete();
        alert()->success('Deleted Successfully');
        return redirect('/cars');
    }


}
