<?php
//ini di branch tbrating
namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Mentor;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Kelas extends Model
{
    protected $table = 'kelasbaru';
    //protected $primaryKey = 'slug';
    protected $fillable = [
        'file','kelas','slug','deskripsi','harga','murid','jenis','kategori','tingkat', 'materi', 'konsultansi','link_konsul','sertifikat','topik','mentor_id','kategori_slug',
        'topik_slug','status','pic_serti','materi'
    ];
    protected $hidden = [

    ];

    public function murid()
    {
        return $this->hasMany(Transaction::class, 'murid');
    }
    public function video()
    {
        return $this->hasMany(Video::class, 'products_id');
    }

    public function trans()
    {
        return $this->belongsTo(TransactionDetail::class, 'products_id','id');
        //ini awlnya slug->id
    }

    public function check()
    {
        return $this->hasMany(TransactionDetail::class, 'products_id');
    }

    public function utkjoin()
    {
        return $this->hasMany(JoinDetail::class, 'products_id');
    }
    public function kate()
    {
        return $this->belongsTo(kategori::class, 'kategori','kategori');
    }
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id','kode_mentor');
        //return $this->belongsTo(Mentor::class, 'mentor_id','id');
        //return $this->belongsTo(Mentor::class, 'mentor_id','id');
        //return $this->belongsTo(Kelas::class, 'products_id', 'id');
    }

    public function videodetails()
    {
        return $this->hasMany(VideoDetails::class, 'products_id');
    }

    public function kel()
    {
        return $this->hasMany(ModelRatingKelas::class, 'id_kelas');
    }

    public function kuis()
    {
        return $this->hasMany(ModelKuis::class, 'kelas_id');
    }

    public function bloge()
    {
        return $this->hasMany(Blog::class, 'kelas_id');
    }
    //public function url()
    //{
    //    return URL::route('kelas.show', array('id' => $this->id, 'slug' => Str::slug($this->kelas)));
    //}
    //public function getUrlAttribute()
    //{
    //    URL::route('kelas.show', array('id' => $this->id, 'slug' => Str::slug($this->kelas)));
    //}
    //URL::orderBy('id', 'DESC');

    //public function stump()
    //{
    //    return Str::limit($this->content, 500);
    //}
}
