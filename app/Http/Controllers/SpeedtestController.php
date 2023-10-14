<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Speedtest;
use Illuminate\Support\Facades\Storage;

class SpeedtestController extends Controller
{
    public function sideBar()
    {
        $totalSpeedtests = Speedtest::count();

        return view('components.sidebar', compact('totalSpeedtests'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $totalSpeedtests = Speedtest::count();

    $speedtests = Speedtest::join('users', 'speedtests.user_id', '=', 'users.id')
    ->select('speedtests.*', 'users.name as user_name')
    ->get();
    return view('admin.index', compact('speedtests', 'totalSpeedtests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $totalSpeedtests = Speedtest::count();
            $users = DB::table('users')
            ->join('speedtests', 'users.id', '=', 'speedtests.user_id')
            ->select('users.name as people', 'speedtests.*')
            ->get();
            return view('admin.create', compact('users', 'totalSpeedtests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'description' => 'required|string|max:255',
            'user_id' => 'required',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/speedtest', $image->hashName());

        DB::table('speedtests')->insert([
            'name' => $request->name,
            'image' => $image->hashName(),
            'description' => $request->description,
            'user_id' => $request->user_id,
            'created_at' => now(),
        ]);

        return redirect()->route('speedtest.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $totalSpeedtests = Speedtest::count();
    $speedtest = Speedtest::join('users', 'speedtests.user_id', '=', 'users.id')
    ->select('speedtests.*', 'users.name as user_name')
    ->find($id);
        return view('admin.show', compact('speedtest', 'totalSpeedtests'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $totalSpeedtests = Speedtest::count();
        $speedtest = Speedtest::find($id);
        return view('Admin.update', compact('speedtest', 'totalSpeedtests'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'string|max:100',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'description' => 'string|max:255',
        ]);

        $speedtest = Speedtest::find($id);

if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/speedtest', $image->hashName());

            //delete old image
            Storage::delete('public/speedtest/'.$speedtest->image);

            //update post with new image
            $speedtest->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'description'   => $request->description,
                'updated_at' => now(),
            ]);

        } else {

            //update post without image
            $speedtest->update([
                'name'     => $request->name,
                'description'   => $request->description,
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('speedtest.index')->with(['success' => 'Data Berhasil Diubah!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Speedtest::find($id)->delete();
        return back();
    }

    public function detailPhoto(string $id){
        $speedtest = Speedtest::find($id);
        return view('admin.detailPhoto', compact('speedtest'));
    }
}
