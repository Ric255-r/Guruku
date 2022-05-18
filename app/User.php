<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','roles','status','file','bidang','deskripsi','github_profile','dribbble_profile','bank','no_rek','kode_mentor','instagram_profile','twitter_profile','telp','statustelp',
        'cv','ktp','alamat','bidang','alasan', 'link_website'
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

    public function pengguna()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    public function detail()
    {
        return $this->hasMany(TransactionDetail::class, 'user_id');
    }

    public function join()
    {
        return $this->hasMany(Join::class, 'user_id');
    }

    public function joindetail()
    {
        return $this->hasMany(JoinDetail::class,'user_id');
    }

    public function men()
    {
        return $this->hasMany(Kelas::class, 'mentor_id');
    }

    public function torid()
    {
        return $this->hasMany(Mentor::class, 'user_id');
    }
    public function ben()
    {
        return $this->belongsTo(Bank::class, 'bank','id');
    }

    public function tor()
    {
        return $this->hasMany(Blog::class, 'author_id');
    }

    public function book()
    {
        return $this->hasMany(Bookmark::class, 'user_id');
    }
}
