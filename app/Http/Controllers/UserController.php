<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.users.index');
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        return view('dashboard.users.store');
    }

    public function show($id)
    {
        return view('dashboard.users.show');
    }

    public function edit($id)
    {
        return view('dashboard.users.edit');
    }

    public function update(Request $request, $id)
    {
        return view('dashboard.users.update');
    }

    public function destroy($id)
    {
        return view('dashboard.users.destroy');
    }
}
