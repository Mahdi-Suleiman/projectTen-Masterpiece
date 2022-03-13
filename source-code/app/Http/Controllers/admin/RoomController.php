<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = Room::all();
        return view('layouts.admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:rooms,name',
            'description' => 'required',
            'image_url' => 'required',
            'price' => 'numeric',
        ]);

        Room::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'price' => $request->price,
        ]);

        return redirect()->back()->with(['message' => 'Room added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $room = Room::find($id);
        return view('layouts.admin.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|unique:rooms,name',
            'description' => 'required',
            'image_url' => 'required',
            'price' => 'numeric',
        ]);
        $room = Room::find($id);
        $room->update([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'price' => $request->price,

        ]);
        return redirect()->back()->with(['message' => 'Room updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $room = Room::find($id);
        $room->deleteOrFail();
        return redirect()->back()->with(['message' => 'Room Deleted Successfully']);
    }
}