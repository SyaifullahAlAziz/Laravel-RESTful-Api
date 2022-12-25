<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Karcisapp;
use Illuminate\Support\Facades\DB;

class Karciscontroller extends Controller
{
    public function index()
    {
        $data['karcis'] = DB::table('karcis')
            ->join('kategori', 'karcis.id_kategori', '=', 'kategori.id_kategori')
            ->get();
        return view('page.karcis', $data);
    }

    public function tambahkarcis()
    {
        $data['karcis'] = DB::table('kategori')->get();


        return view('page.inputkarcis', $data);
    }

    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'id_kategori' => 'required',
            'tanggal' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'gambar' => 'mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect('input-karcis')
                ->withErrors($validator)
                ->withInput();
        } else {
            $filename = null;
            if ($r->gambar) {
                $file = $r->file('gambar');
                $filename = $file->getClientOriginalName();
                $file->move('gambar/', $filename);
            }

            $simpan = Karcisapp::insert([
                'id_kategori' => $r->id_kategori,
                'nama' => $r->nama,
                'harga' => $r->harga,
                'tanggal' => $r->tanggal,
                'gambar' => $filename,
            ]);
        }



        if ($simpan == TRUE) {
            return redirect()->route('karcis')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->route('input-karcis')->with('error', 'Data gagal disimpan');
        }
    }

    public function editkarcis($id)
    {
        $data['karcis'] = DB::table('karcis')->join('kategori', 'karcis.id_kategori', 'kategori.id_kategori')->where('karcis.id_karcis', $id)->first();
        $data['karcisx'] = DB::table('kategori')->get();
        return view('page.editkarcis', $data);
    }

    public function updatekarcis(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'id_kategori' => 'required',
            'nama' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-karcis')
                ->withErrors($validator)
                ->withInput();
        }

        if ($r->file('gambar') == '') {
            $simpan = karcisapp::where('id_kategori', $id)->update([
                'id_kategori' => $r->id_kategori,
                'nama' => $r->nama,
                'harga' => $r->harga,
            ]);
        } else {
            $fotolama = DB::table('karcis')->where('id_karcis', $id)->first();
            if ($fotolama->gambar != '') {
                unlink('gambar/' . $fotolama->gambar);
            }

            $file = $r->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->move('gambar/', $filename);

            $simpan = karcisapp::where('id_karcis', $id)->update([
                'id_kategori' => $r->id_kategori,
                'nama' => $r->nama,
                'harga' => $r->harga,
                'gambar' => $filename,
            ]);
        }

        if ($simpan == TRUE) {
            return redirect()->route('karcis')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('edit-karcis', $id)->with('error', 'Data gagal diubah');
        }
    }

    public function printkarcis($id)
    {
        $data['karcis'] = DB::table('karcis')->join('kategori', 'karcis.id_kategori', 'kategori.id_kategori')->where('karcis.id_karcis', $id)->first();
        $data['karcisx'] = DB::table('kategori')->get();


        return view('page.printkarcis', $data);
    }

    public function hapuskarcis($id)
    {
        $fotolama = DB::table('karcis')->where('id_karcis', $id)->first();
        if ($fotolama->gambar != '') {
            unlink('gambar/' . $fotolama->gambar);
        }
        $deleted = DB::table('karcis')->where('id_karcis', $id)->delete();

        if ($deleted == TRUE) {
            return redirect('karcis')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('input-karcis')->with('error', 'Data gagal dihapus');
        }
    }
}
