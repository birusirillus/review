<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use App\Models\Genre;
use App\Models\Tahun;
use App\Models\Negara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FilmController extends Controller
{
    public function filterByGenre($genre)
{
    $films = Film::whereHas('genreRelasi', function ($query) use ($genre) {
        $query->where('nama_genre', $genre);
    })->get();

    $genres = Genre::orderBy('nama_genre', 'asc')->get();

    return view('index', compact('films', 'genres'));
}

public function tambahDataUsers() {
    $users = User::all(); // Mengambil semua data user
    return view('index', compact('users')); // Kirim data ke view
}


    public function index() {
        $films = Film::with(['genreRelasi', 'tahunRelasi', 'negaraRelasi'])->get();
        $genres = Genre::orderBy('nama_genre', 'asc')->get();
        $years = Tahun::orderBy('tahun_rilis', 'desc')->get();
        $countries = Negara::orderBy('nama_negara', 'asc')->get();

        return view('index', compact('films', 'genres', 'years', 'countries'));
    }

    public function datalist()
    {
        $totalGenres = Film::distinct('genre')->count('genre');
        $totalYears = Film::distinct('tahun')->count('tahun');
        $totalFilms = Film::count();

        return view('admin.adminData', compact('totalGenres', 'totalYears', 'totalFilms'));
    }
    public function data_film(){
        $film = Film::all();
        return view('admin.film.data_film', compact('film'));
    }

    public function tambahFilm(){
        $genre = Genre::all();
        $tahun = Tahun::all();
        $negara = Negara::all();
        return view('admin.film.tambah_film', compact('genre','tahun', 'negara'));
    }
    public function tambahFilmProses(Request $request){
        $nama = $request->input('name');
        $aktor = $request->input('aktor');
        $deskripsi = $request->input('deskripsi');
        $durasi = $request->input('durasi');
        $genre = (int)$request->input('genre');
        $tahun = (int)$request->input('tahun');
        $negara = (int)$request->input('negara');
        $usia = $request->input('usia');
        $rating = $request->input('rating');
        $file_gambar = $request->file('gambar');
        $file_trailer = $request->file('trailer');

        if ($file_gambar) {
         $thumb1 = $file_gambar->getClientOriginalName();
         $path1 = public_path(). '/gambar_film';

         if(!File::exists($path1)){
             File::makeDirectory($path1, 0777, true, true);
         }
         $file_gambar->move($path1, $thumb1);
        } else {
            $thumb1 = null;
        }

        if ($file_trailer) {
            $thumb2 = $file_trailer->getClientOriginalName();
            $path = public_path(). '/vidio_trailer';

            if(!File::exists($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $file_trailer->move($path, $thumb2);
        } else {
            $thumb2 = null;
        }

        $film = new Film;
        $film->nama_film = $nama;
        $film->aktor_film = $aktor;
        $film->deskripsi = $deskripsi;
        $film->durasi = $durasi;
        $film->genre = $genre;
        $film->tahun = $tahun;
        $film->negara = $negara;
        $film->for_usia = $usia;
        $film->rating = $rating;
        $film->gambar_film = $thumb1;
        $film->trailer = $thumb2;
        $film->save();

        $film->genreRelasi()->attach($request->input('genre'));

        if($film){
            return redirect('/data_film')->with('succes','Film berhasil ditambahkan');
        } else{
            return redirect('/data_film')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function editFilm($id){
        $film = Film::where('id_film', $id)->first();
        $genre = Genre::all();
        $tahun = Tahun::all();
        $negara = Negara::all();
        return view('admin.film.edit_film', compact('film', 'genre','tahun', 'negara'));
    }

    public function editFilmProses(Request $request){
        $nama = $request->input('name');
        $aktor = $request->input('aktor');
        $deskripsi = $request->input('deskripsi');
        $durasi = $request->input('durasi');
        $genre = (int)$request->input('genre');
        $tahun = (int)$request->input('tahun');
        $negara = (int)$request->input('negara');
        $usia = $request->input('usia');
        $rating = $request->input('rating');
        $file_gambar = $request->file('gambar');
        $file_trailer = $request->file('trailer');

        if ($file_gambar) {
         $thumb1 = $file_gambar->getClientOriginalName();
         $path1 = public_path(). '/gambar_film';

         if(!File::exists($path1)){
             File::makeDirectory($path1, 0777, true, true);
         }
         $file_gambar->move($path1, $thumb1);
        } else {
            $thumb1 = null;
        }

        if ($file_trailer) {
            $thumb2 = $file_trailer->getClientOriginalName();
            $path = public_path(). '/vidio_trailer';

            if(!File::exists($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $file_trailer->move($path, $thumb2);
        } else {
            $thumb2 = null;
        }

        $film = new Film;
        $film->nama_film = $nama;
        $film->aktor_film = $aktor;
        $film->deskripsi = $deskripsi;
        $film->durasi = $durasi;
        $film->genre = $genre;
        $film->tahun = $tahun;
        $film->negara = $negara;
        $film->for_usia = $usia;
        $film->rating = $rating;
        $film->gambar_film = $thumb1;
        $film->trailer = $thumb2;
        $film->save();

        $film->genreRelasi()->attach($request->input('genre'));

        if($film){
            return redirect('/data_film')->with('succes','Film berhasil ditambahkan');
        } else{
            return redirect('/data_film')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function deleteFilm(Request $request){
        $id_film = $request->input('id_film');
        $query = Film::where('id_film', $id_film)->first();
        if (!$query) {
            return redirect('/data_film')->with('error', 'Data tidak ditemukan');
        }

        // Menghapus file gambar dan trailer jika ada
        $path1 = public_path(). 'gambar_film/' . $query->gambar_film;
        $path2 = public_path(). 'vidio_trailer/' . $query->trailer;

        if ($query->gambar_film && File::exists($path1)) {
            File::delete($path1);
        }

        if ($query->trailer && File::exists($path2)) {
            File::delete($path2);
        }

        $query->delete();
        if ($query) {
            return redirect('/data_film')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/data_film')->with('error', 'Data gagal dihapus');
        }
    }

    //Genre

    public function dataGenre(){
        $genre = Genre::all();
        return view('admin.genre.data_genre', compact('genre'));
    }

    public function tambahGenre(){
        return view('admin.genre.tambah_genre');
    }
    public function tambahGenreProses(Request $request){
        $id = $request->input('id_genre');
        $nama = $request->input('genre');

        $query = Genre::where('id_genre', $id)->first();
        if ($query) {
            return redirect('/tambah_genre')->with('error', 'nomer genre sudah ada');
        }

        $genre = new Genre;
        $genre->id_genre = $id;
        $genre->nama_genre = $nama;
        $genre->save();

        if($genre){
            return redirect('/data_genre')->with('succes','Genre berhasil ditambahkan');
        } else{
            return redirect('/data_genre')->with('error', 'Data gagal ditambahkan');
        }
    }
    public function deleteGenre(Request $request){
        $id_genre = $request->input('id_genre');
        $query = Genre::where('id_genre', $id_genre)->first();
        if (!$query) {
            return redirect('/data_genre')->with('error', 'Data tidak ditemukan');
        }
        $query->delete();
        if ($query) {
            return redirect('/data_genre')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/data_genre')->with('error', 'Data gagal dihapus');
        }
    }


    //TAHUN
    public function dataTahun(){
        $tahun = Tahun::all();
        return view('admin.tahun.data_tahun', compact('tahun'));
    }

    public function tambahTahun(){
        return view('admin.tahun.tambah_tahun');
    }
    function tambahTahunProses(Request $request){
        $id = $request->input('id_tahun');
        $th = $request->input('tahun');
        $query = Tahun::where('id_tahun', $id)->first();
        if ($query) {
            return redirect('/tambah_tahun')->with('error', 'nomer tahun sudah ada');
        }
        $tahun = new Tahun;
        $tahun->id_tahun = $id;
        $tahun->tahun_rilis = $th;
        $tahun->save();
        if($tahun){
            return redirect('/data_tahun')->with('succes','Tahun berhasil ditambahkan');
        } else{
            return redirect('/data_tahun')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function deleteTahun(Request $request){
        $id_tahun = $request->input('id_tahun');
        $query = Tahun::where('id_tahun', $id_tahun)->first();
        if (!$query) {
            return redirect('/data_tahun')->with('error', 'Data tidak ditemukan');
        }
        $query->delete();
        if ($query) {
            return redirect('/data_tahun')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/data_tahun')->with('error', 'Data gagal dihapus');
        }
    }


    //NEGARA
    public function dataNegara(){
        $negara = Negara::all();
        return view('admin.negara.data_negara', compact('negara'));
    }

    public function tambahNegara(){
        return view('admin.negara.tambah_negara');
    }
    function tambahNegaraProses(Request $request){
        $id = $request->input('id_negara');
        $nama = $request->input('negara');
        $query = Negara::where('id_negara', $id)->first();
        if ($query) {
            return redirect('/tambah_negara')->with('error', 'nomer negara sudah ada');
        }
        $negara = new Negara;
        $negara->id_negara = $id;
        $negara->nama_negara = $nama;
        $negara->save();
        if($negara){
            return redirect('/data_negara')->with('succes','Negara berhasil ditambahkan');
        }else{
            return redirect('/data_negara')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function deleteNegara(Request $request){
        $id_negara = $request->input('id_negara');
        $query = Negara::where('id_negara', $id_negara)->first();
        if (!$query) {
            return redirect('/data_negara')->with('error', 'Data tidak ditemukan');
        }
        $query->delete();
        if ($query) {
            return redirect('/data_negara')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/data_negara')->with('error', 'Data gagal dihapus');
        }
    }

    public function searchFilm(Request $request) {
        $search = $request->input('search_film');
        $film = Film::where('nama_film', 'LIKE', "%{$search}%")->get();
        return view('admin.film.data_film', compact('film'));
    }
}

