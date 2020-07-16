<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class siswa extends Model
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'NIPD', 'jenis_kelamin', 'NISN', 'tempat_lahir', 'tgl_lahir', 'telp',
        'NIK', 'agama', 'alamat', 'nama_ayah', 'thn_lahir_ayah', 'kerja_ayah', 'NIK_ayah',
        'Telp_ayah', 'nama_ibu', 'thn_lahir_ibu', 'kerja_ibu', 'NIK_ibu', 'Telp_ibu', 'Golongan', 'users_id',
        'photo', 'Tahun_Ajaran','angkatan', 'id_rombel','id_ekskul'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = true;

}

