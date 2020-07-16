<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Model\ekskul;
use App\Model\anggota_ekskul;
use App\siswa;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return ekskul::latest()->paginate(15);
    }

    public function loadekskul()
    {
        $rombel = \Request::get('id');
        $dtRombel = anggota_ekskul::where('id_ekskul', $rombel)->get();


        return $dtRombel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nonekskul()
    {
        return siswa::where('id_ekskul', '')->latest()->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'jenis_ekskul' => 'required|string|max:191',
        'nama_ekskul'=> 'required|string|max:191',
        'pembina'=>'required|string|max:191',
      ]);

      $id = Uuid::generate()->string;
      $request->merge([
          'id' => $id,
      ]);

        ekskul::create($request->all());
    //   return ekskul::create($request->all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function anggotaekskul(Request $request)
    {

      $idsiswa = $request['siswa.id'];

      $id = Uuid::generate()->string;
      $request->merge([
        'id_gen' => $id,
      ]);

      anggota_ekskul::create([
        'id'=>$request['id_gen'],
        'id_ekskul'=>$request['id'],
        'id_siswa'=>$request['siswa.users_id'],
        'nama_siswa'=>$request['siswa.nama'],
        'NIPD'=>$request['siswa.NIPD'],
        'NISN'=>$request['siswa.NISN'],
        'JK'=>$request['siswa.jenis_kelamin'],
      ]);

      siswa::where('id', $idsiswa)->update(['id_ekskul'=>$request['id']]);

      //return $request->all();
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
      $ekskul = ekskul::findOrFail($id);

      $this->validate($request,[
        'jenis_ekskul' => 'required|string|max:191',
        'nama_ekskul'=> 'required|string|max:191',
        'pembina'=>'required|string|max:191',
      ]);

      $ekskul->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ekskul = ekskul::findOrFail($id);
      $ekskul->delete();
    }

    public function delekskul()
    {
        $id = \Request::get('id');
        $anggota = anggota_ekskul::findOrFail($id);
        $user = $anggota->id_siswa;
        siswa::where('users_id', $user)->update(['id_ekskul'=>'']);

        $anggota->delete();
        //return $id;
    }
}
