<?php

namespace App\Http\Controllers\API;

use App\Model\kelas_reguler;
use App\Model\anggota_rombel;
use Webpatser\Uuid\Uuid;
use App\GTK;
use App\siswa;
use App\Http\Controllers\Controller;
use App\Model\rombel;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid as UuidUuid;

class rombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return kelas_reguler::latest()->paginate(20);

    }

    public function nonrombel()
    {
      return siswa::where('id_rombel', '')->latest()->paginate(20);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function anggota()
    {
      $rombel = \Request::get('id');
      $dtRombel = anggota_rombel::where('id_rombel', $rombel)->get();


      return $dtRombel;
      //return anggota_rombel::latest()->paginate(20);
     //return ['message', 'route berhasil'];
    }

    public function kelas(Request $request)
    {

        $id = $request['siswa.id'];
       anggota_rombel::create([
           'id_rombel'=>$request['id_rombel'],
           'id_siswa'=>$request['siswa.users_id'],
           'nama_siswa'=>$request['siswa.nama'],
           'NIPD'=>$request['siswa.NIPD'],
           'NISN'=>$request['siswa.NISN'],
           'JK'=>$request['siswa.jenis_kelamin'],
       ]);

        siswa::where('id', $id)->update(['id_rombel'=>$request['id_rombel']]);

      return $id;
    //    return $request['siswa.users_id'];
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
        'jenis_rombel' => 'required|string|max:191',
        'tingkat_pendidikan'=> 'required|string|max:191',
        'kejuruan'=>'required|string|max:191',
        'nama_rombel'=> 'required|string|max:191',
        'wali_kelas'=> 'required|string|max:191|unique:kelas_regulers',
      ]);

        $id = Uuid::generate()->string;
        $request->merge([
            'id_rombel' => $id,
        ]);

      return kelas_reguler::create($request->all());
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
        $rombel = kelas_reguler::findOrFail($id);

        $this->validate($request,[
            'jenis_rombel' => 'required|string|max:191',
            'tingkat_pendidikan'=> 'required|string|max:191',
            'kejuruan'=>'required|string|max:191',
            'nama_rombel'=> 'required|string|max:191',
            'wali_kelas'=> 'required|string|max:191',
          ]);

        $rombel->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rombel = kelas_reguler::findOrFail($id);

        $rombel->delete();
    }


    public function delanggota()
    {
        $id = \Request::get('id');
        $anggota = anggota_rombel::findOrFail($id);
        $user = $anggota->id_siswa;
        siswa::where('users_id', $user)->update(['id_rombel'=>'']);

        $anggota->delete();
        // return $user;
        // $rombel->delete();
    }
}
