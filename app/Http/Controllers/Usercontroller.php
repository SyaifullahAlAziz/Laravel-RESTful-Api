<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Userapp;
use Illuminate\Support\Facades\DB;

class Usercontroller extends Controller
{
    public function index()
    {
        $data['user'] = DB::table('userapps')->get();
        // singkatan ddcadalah dump die
        //dd($data['user']);
        return view('page.user', $data);
    }
    public function tambahUser()
    {
        return view('page.inputuser');
    }
    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'nama' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'gambar' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-user')
                ->withErrors($validator)
                ->withInput();
        }

        $file = $r->file('gambar');
        $filename = $file->getClientOriginalName();
        $file->move('gambar/', $filename);

        $simpan = Userapp::insert([
            'nama' => $r->nama,
            'no_telpon' => $r->no_telpon,
            'alamat' => $r->alamat,
            'email' => $r->email,
            'jenis_kelamin' => $r->jenis_kelamin,
            'gambar' => $filename,
        ]);

        if ($simpan == TRUE) {
            return redirect('user')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('input-user')->with('error', 'Data gagal disimpan');
        }
    }
    public function edituser($id)
    {
        $data['user'] = DB::table('userapps')->where('id', $id)->first();
        return view('page.edituser', $data);
    }
    public function updateuser(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'nama' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-user')
                ->withErrors($validator)
                ->withInput();
        }

        if ($r->file('gambar') == '') {
            $simpan = Userapp::where('id', $id)->update([
                'nama' => $r->nama,
                'no_telpon' => $r->no_telpon,
                'alamat' => $r->alamat,
                'email' => $r->email,
                'jenis_kelamin' => $r->jenis_kelamin,
            ]);
        } else {
            $fotolama = DB::table('userapps')->where('id', $id)->first();
            if ($fotolama->gambar != '') {
                unlink('gambar/' . $fotolama->gambar);
            }

            $file = $r->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->move('gambar/', $filename);

            $simpan = Userapp::where('id', $id)->update([
                'nama' => $r->nama,
                'no_telpon' => $r->no_telpon,
                'alamat' => $r->alamat,
                'email' => $r->email,
                'jenis_kelamin' => $r->jenis_kelamin,
                'gambar' => $filename,
            ]);
        }

        if ($simpan == TRUE) {
            return redirect('user')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('input-user')->with('error', 'Data gagal diubah');
        }
    }

    public function hapususer($id)
    {
        $fotolama = DB::table('userapps')->where('id', $id)->first();
        if ($fotolama->gambar != '') {
            unlink('gambar/' . $fotolama->gambar);
        }
        $deleted = DB::table('userapps')->where('id', $id)->delete();

        if ($deleted == TRUE) {
            return redirect('user')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('input-user')->with('error', 'Data gagal dihapus');
        }
    }
}
