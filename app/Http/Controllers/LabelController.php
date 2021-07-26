<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index()
    {
        $data = Label::all();
        return view('admin.label.index',compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        Label::create($request->all());
        return back()->with('success','Data berhasil ditambahkan!');
    }

    public function update(Request $request, Label $label)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        Label::find($label->id)->update($request->all());
        return back()->with('success','Data berhasil diupdate!');
    }

    public function destroy(Label $label)
    {
        Label::destroy($label->id);
        return back()->with('success','Data berhasil dihapus!');
    }
}
