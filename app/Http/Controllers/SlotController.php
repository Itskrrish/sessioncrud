<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slots;

class SlotController extends Controller
{


    public function create()
    {
        return view('slots.create');
    }




    public function index()
    {
        // session()->flush();
        $users = (array) session()->get('user') ?? [];
        return view('forms.index', compact('users'));
    }


    public function store(Request $request)
    {

        $data = $request->all();
        foreach ($data as $index => $value) {
            $slots[] =
                array(
                    'name' => $value['slot_name'],
                    'column1' => $value['slotc1'],
                    'column2' => $value['slotc2']

                );
        }
        Slot::insert($slots);

    }





    public function edit(Request $request, $id)
    {


        $sessionData = (array) session()->get('user') ?? [];

        $data = $sessionData[$id] ?? [];
        // dd($data);

        $home = $id;
        return view('forms.edit', compact('home', 'data'));

    }



    public function update(Request $request, $home)
    {
        $data = $request->all();

        $sessionData = (array) session()->get('user') ?? [];

        $sessionData[$home] = array(
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'role' => $data['role'],
            'email' => $data['email'],
            'image' => $data['image'] ?? null
        );


        session()->put('user', $sessionData);

        return redirect()->route('home.index');

    }



    public function destroy(Request $request, $home)
    {

        $sessionData = (array) session()->get('user') ?? [];

        unset($sessionData[$home]);


        session()->put('user', $sessionData);

        return redirect()->route('home.index');
    }
}