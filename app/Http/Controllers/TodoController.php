<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index()
    {
        $get_todo = Todo::orderBy('created_at', 'desc')->get();
        return view('Home', compact('get_todo'));
    }

    public function store(Request $request)
    {
        $this->validation($request->all());
        Todo::create([
            'todo' => $request->add_todo,
        ]);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validation($request->all());
        $Todos = Todo::find($id);
        $Todos->update([
            'todo' => $request->add_todo,
        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        $Todos = Todo::find($id);
        $Todos->delete();
        return redirect()->back();
    }

    private function validation($form_validation)
    {
        $validation = Validator::make($form_validation, [
            'add_todo' => 'required',
        ]);
        if ($validation->fails()) {
            redirect()->back()->send();
            exit;
        }
    }
}