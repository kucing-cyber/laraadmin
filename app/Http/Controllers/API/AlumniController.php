<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return alumni::latest()->paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $date = date("Y", time());
      // $request->merge([
      //   'thn' => $date,
      // ]);

      
      //for ($i = 0; $i < count([$request]); $i++) {
        // alumni::create([
          // 'nama'=>$request['$i.nama'],
          // 'NIPD'=>$request['NIPD'],
          // 'jenis_kelamin'=>$request['$i.jenis_kelamin'],
          // 'NISN'=>$request['NISN'],
          // 'tempat_lahir'=>$request['tempat_lahir'],
          // 'tgl_lahir' => $request['tgl_lahir'],
          // 'telp'=>$request['telp'],
          // 'NIK'=>$request['NIK'],
          // 'agama'=>$request['agama'],
          // 'alamat'=>$request['alamat'],
          // 'nama_ayah'=>$request['nama_ayah'],
          // 'thn_lahir_ayah'=>$request['thn_lahir_ayah'],
          // 'kerja_ayah'=>$request['kerja_ayah'],
          // 'NIK_ayah'=>$request['NIK_ayah'],
          // 'Telp_ayah'=>$request['Telp_ayah'],
          // 'nama_ibu'=>$request['nama_ibu'],
          // 'thn_lahir_ibu'=>$request['thn_lahir_ibu'],
          // 'kerja_ibu'=>$request['kerja_ibu'],
          // 'NIK_ibu'=>$request['NIK_ibu'],
          // 'Telp_ibu'=>$request['Telp_ibu'],
          // 'Golongan'=>$request['Golongan'],
          // 'Tahun_Ajaran'=>$request['Tahun_Ajaran'],
          // 'users_id'=>$request['users_id'],
          // "picture_id" => $request[$i],
          // "tahun_lulus" => $date,
        // ]);
        return $request;
        //return $count;
      //}
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
        //
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
