<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;


class CarController extends Controller
{
    public function index()
    {
        $cars = Cars::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        $brands = json_decode(file_get_contents(resource_path('json/cars.json')));
        return view('cars.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'brand' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $car = new Cars([
            'model' => $request->get('model'),
            'year' => $request->get('year'),
            'color' => $request->get('color'),
            'brand' => $request->get('brand'),
            'image' => $imageName
        ]);
        $car->save();

        return redirect()->route('cars.index')
            ->with('success', 'Carro cadastrado com sucesso.');
    }

    public function show(Cars $car)
    {
        return view('cars.show', compact('car'));
    }

    public function edit(Cars $car)
    {
        $brands = json_decode(file_get_contents(resource_path('json/cars.json')));
        return view('cars.edit', compact('car', 'brands'));
    }

    public function update(Request $request, Cars $car)
    {
        $request->validate([
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'brand' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'model' => $request->get('model'),
            'year' => $request->get('year'),
            'color' => $request->get('color'),
            'brand' => $request->get('brand'),
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $car->update($data);

        return redirect()->route('cars.index')
            ->with('success', 'Carro atualizado com sucesso.');
    }

    public function destroy(Cars $car)
    {
        $car->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Carro excluído com sucesso.');
    }
}
