<?php

namespace App\Http\Controllers\API;

use App\GTK;
use Webpatser\Uuid\Uuid;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class gtkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GTK::latest()->paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      //return $request -> all();
        $this->validate($request,[
            'nama' => 'required|string|max:191',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tgl_lahir' => 'required|date',
            'jabatan' => 'required|string|max:191',
            'mapel' => 'required|string|max:191',
            'TMT' => 'required|string|max:191',
            'SK' => 'required|string|max:191',
            'telp' => 'required|digits_between:9,13',
        ]);

        $uuid = Uuid::generate()->string;
        $request->merge([
            'gtk_id' => $uuid,
        ]);

        return GTK::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $GTK = GTK::findOrFail($id);

        $this->validate($request,[
            'nama' => 'required|string|max:191',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tgl_lahir' => 'required|date',
            'jabatan' => 'required|string|max:191',
            'telp' => 'required|digits_between:9,13',
        ]);

        $GTK->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $GTK = GTK::findOrFail($id);
        $GTK->delete();
    }

    public function search(){
        if ($search = \Request::get('q')) {
            $users = GTK::where(function($query) use ($search){
                $query->where('nama','LIKE',"%$search%")
                        ->orWhere('email','LIKE',"%$search%");
            })->paginate(15);
        }else{
            $users = GTK::latest()->paginate(15);
        }
        return $users;
    }

}
