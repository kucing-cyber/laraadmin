<?php

namespace App\Http\Controllers\API;

use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\GTK;
use App\Model\tahun_ajaran;
use App\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\Rules\Unique;

class userController extends Controller
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
        return Siswa::latest()->paginate(15);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tahun()
    {
        return tahun_ajaran::latest()->get();
        //return DB::table('tahun_ajarans')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addtahun(Request $request){

        //return $request->all();

        $this->validate($request,[
            'Tahun_Ajaran' => 'required|max:191',
        ]);

        return tahun_ajaran::create($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createuser(Request $request){
        //return $request->all();
        $this->validate($request,[
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tgl_lahir' => ['required', 'string', 'min:8'],
        ]);
        return User::create([
            'name' => $request['nama'],
            'email' => $request['email'],
            'type' => $request['type'],
            'users_id' => $request['gtk_id'],
            'jabatan' => $request['jabatan'],
            'password' => Hash::make($request['tgl_lahir'])

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $uuid = Uuid::generate()->string;
        $request->merge([
            'users_id' => $uuid,
        ]);

        $this->validate($request,[
            'nama' => 'required|string|max:191',
            'NIPD' => 'required|unique:siswas',
            'NISN' => 'required|digits:10',
            'telp' => 'required|digits_between:9,13',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:191',
            'NIK' => 'required|string|digits_between:14,20',
            'nama_ayah' => 'required|string',
            'Telp_ayah' => 'digits_between:9,13',
            'nama_ibu' => 'required|string',
            'Tahun_Ajaran' => 'required|string',
            'Telp_ibu' => 'digits_between:9,13',
        ]);


        return Siswa::create([
            'nama'=>$request['nama'],
            'NIPD'=>$request['NIPD'],
            'jenis_kelamin'=>$request['jenis_kelamin'],
            'NISN'=>$request['NISN'],
            'tempat_lahir'=>$request['tempat_lahir'],
            'tgl_lahir' => $request['tgl_lahir'],
            'telp'=>$request['telp'],
            'NIK'=>$request['NIK'],
            'agama'=>$request['agama'],
            'alamat'=>$request['alamat'],
            'nama_ayah'=>$request['nama_ayah'],
            'thn_lahir_ayah'=>$request['thn_lahir_ayah'],
            'kerja_ayah'=>$request['kerja_ayah'],
            'NIK_ayah'=>$request['NIK_ayah'],
            'Telp_ayah'=>$request['Telp_ayah'],
            'nama_ibu'=>$request['nama_ibu'],
            'thn_lahir_ibu'=>$request['thn_lahir_ibu'],
            'kerja_ibu'=>$request['kerja_ibu'],
            'NIK_ibu'=>$request['NIK_ibu'],
            'Telp_ibu'=>$request['Telp_ibu'],
            'Golongan'=>$request['Golongan'],
            'Tahun_Ajaran'=>$request['Tahun_Ajaran'],
            'users_id'=>$request['users_id'],

        ]);
    }

    public function user()
    {
        return  auth('api')->user();

    }

    public function profile()
    {

        //return  auth('api')->user();
        if(auth('api')->user()->jabatan == 'siswa'){
            $user = auth('api')->user()->users_id;
            $ambil = siswa::where('users_id', $user)->get();
        } else {
            $user = auth('api')->user()->users_id;
            $ambil = GTK::where('gtk_id', $user)->get();
        }
        //$ambil = DB::table('siswas')->join('users','siswas.users_id','=','users.id')->where('users_id', '=', $user )->get();

        return $ambil;

        //$ambil = DB::table('siswas')->join('users','siswas.nama','=','users.name')->where('nama_id', '=', 'admin' )->get();
        //$ambil = DB::table('siswas')->join('users','siswas.nama','=','users.name')->get();

        //return ($ambil);
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
        $siswa = Siswa::findOrFail($id);
        $this->validate($request,[
            'nama' => 'required|string|max:191',
            'NISN' => 'required|digits:10',
            'telp' => 'required|digits_between:9,13',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:191',
            'nama_ayah' => 'required|string',
            'Telp_ayah' => 'digits_between:9,13',
            'nama_ibu' => 'required|string',
            'Telp_ibu' => 'digits_between:9,13',
        ]);
        $siswa->update($request->all());
        return ['message' => 'Data berhasil diubah'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userupdate(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['sometimes','required', 'string', 'min:8'],

        ]);

        $user =  auth('api')->user();
        $fotolama = $user->photo;
        if($request->photo != $fotolama){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path
            ('picture/profile/').$name);
            $request->merge([
                'photo' => $name,
            ]);

            $userPhoto = public_path('picture/profile/').$fotolama ;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }
        }

        if(!empty($request->password)){
            $request->merge([
                'password' => Hash::make($request['password'])
            ]);
        }

        //$user->update($request->all());

        $user->update([
            //$request->all()
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'photo' => $request['photo'],
            ]);
        return ['message' => 'Data user berhasil diubah'];



    }

    public function sisupdate(Request $request)
    {

      Siswa::Where('id', $request->id)->update([
        'nama'=>$request['nama'],
        'NIPD'=>$request['NIPD'],
        'jenis_kelamin'=>$request['jenis_kelamin'],
        'NISN'=>$request['NISN'],
        'tempat_lahir'=>$request['tempat_lahir'],
        'tgl_lahir' => $request['tgl_lahir'],
        'telp'=>$request['telp'],
        'NIK'=>$request['NIK'],
        'agama'=>$request['agama'],
        'alamat'=>$request['alamat'],
        'nama_ayah'=>$request['nama_ayah'],
        'thn_lahir_ayah'=>$request['thn_lahir_ayah'],
        'kerja_ayah'=>$request['kerja_ayah'],
        'NIK_ayah'=>$request['NIK_ayah'],
        'Telp_ayah'=>$request['Telp_ayah'],
        'nama_ibu'=>$request['nama_ibu'],
        'thn_lahir_ibu'=>$request['thn_lahir_ibu'],
        'kerja_ibu'=>$request['kerja_ibu'],
        'NIK_ibu'=>$request['NIK_ibu'],
        'Telp_ibu'=>$request['Telp_ibu'],
        'Golongan'=>$request['Golongan'],
        ]);

        //return $request->id;
      return ['message' => 'Data siswa berhasil diubah'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        // delete the user
        $siswa->delete();
        return ['message' => 'Data berhasil Dihapus'];
    }

    public function search(){
        if ($search = \Request::get('q')) {
            $users = Siswa::where(function($query) use ($search){
                $query->where('nama','LIKE',"%$search%")
                        ->orWhere('NIPD','LIKE',"%$search%");
            })->paginate(15);
        }else{
            $users = Siswa::latest()->paginate(15);
        }
        return $users;
    }
}
