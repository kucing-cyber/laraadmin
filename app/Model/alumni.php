<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class alumni extends Model
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
    'photo', 'Tahun_Ajaran','angkatan', 'id_rombel','id_ekskul','no_skep','tgl_mutasi'
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
      'id' => 'string',
  ];

  public $timestamps = true;
}
