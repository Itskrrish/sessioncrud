<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function create()
    {
        return view('forms.create');
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

        $sessionData = (array) session()->get('user') ?? [];

        $updatedData = array_merge(
            $sessionData,
            [
                array(
                    'name' => $data['name'],
                    'phone' => $data['phone'],
                    'password' => $data['password'],
                    'role' => $data['role'],
                    'email' => $data['email'],
                    'image' => $data['image'] ?? null
                )
            ]
        );


        session()->put('user', $updatedData);

        return redirect()->route('home.index');

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