<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kategoriapp;
use Illuminate\Support\Facades\DB;

class Kategoricontroller extends Controller
{
    public function index()
    {
        $data['kategori'] = DB::table('kategori')->get();
        return view('page.kategori', $data);
    }
    public function tambahKategori()
    {
        return view('page.inputkategori');
    }
    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'nama_kategori' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-kategori')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Kategoriapp::insert([
            'nama_kategori' => $r->nama_kategori,
            'harga' => $r->harga,
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('kategori')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->route('input-kategori')->with('error', 'Data gagal disimpan');
        }
    }

    public function editKategori($id)
    {
        $data['kategori'] = DB::table('kategori')->where('id_kategori', $id)->first();
        return view('admin.pegawai.edit', $data);
    }

    public function updateKategori(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'nama_kategori' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-kategori')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = kategoriapp::where('id_kategori', $id)->update([
            'nama_kategori' => $r->nama_kategori,
            'harga' => $r->harga,
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('kategori')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('edit-kategori', $id)->with('error', 'Data gagal diubah');
        }
    }

    public function hapusKategori($id)
    {
        $deleted = DB::table('kategori')->where('id_kategori', $id)->delete();

        if ($deleted == TRUE) {
            return redirect('kategori')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('input-kategori')->with('error', 'Data gagal dihapus');
        }
    }
}
