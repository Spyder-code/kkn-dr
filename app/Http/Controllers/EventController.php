<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::all();
        return view('admin.event.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:mp4,mov,mkv,qt,3gp,avi,wmv|max:10240',
        ]);

        if ($files = $request->file('file')) {
            $profileImage = $request->title.'.mp4';
            $path = $files->storeAs('public/event', $profileImage);
            $url = Storage::url($path);
            $videoUrl = url($url);
            Event::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'title' => $request->title,
                'description' => $request->description,
                'file' => $videoUrl,
            ]);
            return back()->with('success','Terima kasih untuk partisipasinya. Nantikan penggumuman selanjutnya!');
        }else{
            return back()->with('danger','Data tidak berhasil terkirim. Pastikan semua data terisi dan sesuai!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
