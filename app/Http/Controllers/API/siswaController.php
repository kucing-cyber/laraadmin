<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
//use App\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class siswaController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function soal()
    {
        return DB::table('pelajaran')
            ->Join('paket', 'pelajaran.id', '=','paket.pelajaran_id')
            ->select('pelajaran.*','paket.id', 'pelajaran.nama')
            ->get();
    //   $soal = DB::table('pelajaran')
        // ->join('paket', 'pelajaran_id', '=','pelajaran.id')
        // ->join('soal','paket.id', '=', 'paket.id')->get();
    }
    public function loadsoal()
    {
        $rombel = \Request::get('id');
        $dtRombel = DB::table('soal')->where('paket_id','=', $rombel)->get();
        return $dtRombel;
    }
    public function ujiansoal()
    {
        return DB::table('pelajaran1')
            ->Join('paket1', 'pelajaran1.id', '=','paket1.pelajaran_id')
            ->select('pelajaran1.*','paket1.id', 'pelajaran1.nama')
            ->get();
    //   $soal = DB::table('pelajaran')
        // ->join('paket', 'pelajaran_id', '=','pelajaran.id')
        // ->join('soal','paket.id', '=', 'paket.id')->get();
    }
    public function ujianloadsoal()
    {
        $rombel = \Request::get('id');
        $dtRombel = DB::table('soal1')->where('paket_id','=', $rombel)->get();
        return $dtRombel;
    }

    public function profile()
    {
        //return auth('api')->user();

        $user = auth('api')->user()->name;
        $ambil = DB::table('siswas')->join('users','siswas.nama','=','users.name')->where('nama', '=', $user )->get();

        return $ambil;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $siswa = User::findOrFail($id);
        return Validator::make($siswa, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $siswa->update($request->all());
        return ['message' => 'Data berhasil diubah'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
