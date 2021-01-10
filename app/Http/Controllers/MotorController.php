<?php

namespace App\Http\Controllers;

use App\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function add()
    {
        return view('motor.add');
    }

    public function store(Request $request)
    {
        $request->validate([
           'model' => 'required',
           'color' => 'required',
           'weight' => 'required|numeric',
           'price' => 'required|numeric',
           'photo' => 'required|image',
        ]);

        $file = $request->file('photo');
        $picName = $file->getClientOriginalName();
        $imagePath = '/storage/motors';
        $file->move(public_path($imagePath), $picName);

        $motor = new Motor();
        $motor->model = $request->input('model');
        $motor->color = $request->input('color');
        $motor->weight = $request->input('weight');
        $motor->price = $request->input('price');
        $motor->photo = $picName;
        $motor->save();
        return redirect()->back()->with('status', 'Profile added!');
    }

    public function list()
    {
        $motors = Motor::all();
        return view('motor.list', compact('motors'));
    }

    public function detail($id)
    {
        $motor = Motor::findOrFail($id);
        return view('motor.detail', compact('motor'));
    }

    public function edit($id)
    {
        $motor = Motor::findOrFail($id);
        return view('motor.edit', compact('motor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'model' => 'required',
            'color' => 'required',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'photo' => 'required|image',
        ]);

        $file = $request->file('photo');
        $picName = $file->getClientOriginalName();
        $imagePath = '/storage/motors';
        $file->move(public_path($imagePath), $picName);

        $motor = Motor::findOrFail($id);
        $motor->model = $request->input('model');
        $motor->color = $request->input('color');
        $motor->weight = $request->input('weight');
        $motor->price = $request->input('price');
        $motor->photo = $picName;
        $motor->save();
        return redirect()->back()->with('status', 'Profile updated!');
    }

    public function destroy($id)
    {
        Motor::destroy($id);
        return redirect()->back();
    }
}
