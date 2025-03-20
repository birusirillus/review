<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'film';
    protected $primaryKey = 'id_film';
    protected $fillable = ['nama_film', 'aktor_film', 'trailer', 'gambar_film', 'deskripsi','for_usia', 'genre', 'tahun', 'negara', 'rating', 'durasi'];

    public function genreRelasi()
    {
        return $this->belongsToMany(Genre::class,'film_genre', 'film_id', 'genre_id');
    }

    public function tahunRelasi()
    {
        return $this->hasOne(Tahun::class, 'id_tahun', 'tahun');
    }

    public function negaraRelasi()
    {
        return $this->hasOne(Negara::class, 'id_negara', 'negara');
    }

    public function komentarRelasi(){
        return $this->hasMany(Komentar::class, 'id_film', 'id_film');
    }
    public function getEmbedTrailerAttribute()
    {
        if (Str::contains($this->trailer, 'youtu.be')) {
            return Str::replace('youtu.be/', 'www.youtube.com/embed/', explode('?', $this->trailer)[0]);
        }

        if (Str::contains($this->trailer, 'watch?v=')) {
            return Str::replace('watch?v=', 'embed/', explode('?', $this->trailer)[0]);
        }

        return $this->trailer;
    }

}

