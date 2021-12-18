<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Auth;
use DB;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data_aduan = Pengaduan::all();
         return view('admin.index')->with('pengaduan',$data_aduan);
    }
    
    public function index2()
    {
         $data_aduan = Pengaduan::all();
         return view('user.riwayat')->with('pengaduan',$data_aduan);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           
            'nopelanggan'   => 'required',
            'nama'          => 'required',
            'alamat'        => 'required',
            'kategori'      => 'required',
            'keterangan'    => 'required',
            'fotoaduan'     => 'required',
         
        ]);
        $data_aduan = new Pengaduan();
        $data_aduan->users_id = request()->user()->id;
        // $data_aduan->user_id= Auth::user()->id;
        $data_aduan->nopelanggan = $request->nopelanggan;
        $data_aduan->nama = $request->nama;
        $data_aduan->alamat= $request->alamat;
        $data_aduan->kategori = $request->kategori;
        $data_aduan->keterangan = $request->keterangan;
        $data_aduan->fotoaduan = $request->fotoaduan;

        // if ($request->file('fotoaduan')) {
        //     // $image_name = $request->file('fotoaduan')->store('img','public');
        //     // $data_aduan->fotoaduan = $image_name;

        // }

        if (
            $data_aduan->fotoaduan &&
            file_exists(storage_path('app/public/' . $data_aduan->fotoaduan))
        ) {
            \Storage::delete('public/' . $data_aduan->fotoaduan);
        }
        $image_name = $request->file('fotoaduan')->store('img', 'public');
        $data_aduan->fotoaduan = $image_name;

        $data_aduan->save();
        return redirect()
            ->back()
            ->with('success', 'Data berhasil ditambahkan');
    
            // fungsi eloquent untuk menambah data
            // Pengaduan::create($request->all());
            // jika data berhasil ditambahkan, akan kembali ke halaman utama
            // return redirect()->back()
            //->with('success', 'Data Berhasil Ditambahkan');
            
    
      
        // Pengaduan::create($request->all());
        // return redirect()->route('aduan','pengaduan');


        // $rules = array(
        //     'user_id' => 'required',
        //     'nopelanggan' => 'required',
        //     'nama' => 'required',
        //     'alamat' => 'required',
        //     'kategori' => 'required',
        //     'keterangan' => 'required',
        //     'fotoaduan' => 'required',
        // );
        // $validator = Validator::make(Input::all(), $rules);
 
        // // process the login
        // if ($validator->fails()) {
        //     return Redirect::to('user/create')
        //         ->withErrors($validator);
        // } else {
        //     // store
        //     $data_aduan = new Tukangjamu;
        //     $data_aduan->user_id      = Input::get('user_id ');
        //     $data_aduan->nopelanggan  = Input::get('nopelanggan');
        //     $data_aduan->nama         = Input::get('nama');
        //     $data_aduan->alamat       = Input::get('alamat');
        //     $data_aduan->kategori     = Input::get('kategori');
        //     $data_aduan->keterangan   = Input::get('keterangan');
        //     $data_aduan->fotoaduan    = Input::get('fotoaduan');
        //     $data_aduan->save();
 
        //     // redirect
        //     Session::flash('message', 'Berhasil membuat tukang jamu!');
        //     return Redirect::to('user.create');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_aduan = Pengaduan::find($id);
        return view('user.show'.compact('data_aduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_aduan = Pengaduan::find($id);
        return view('admin.edit', compact('data_aduan'));
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
        $data_aduan = Pengaduan::find($id);
        $data_aduan->status = $request->status;
        $data_aduan->balasan = $request->balasan;
        $data_aduan->tgleksekusi = $request->tgleksekusi;

        if (
            $data_aduan->fotobalasan &&
            file_exists(storage_path('app/public/' . $data_aduan->fotobalasan))
        ) {
            \Storage::delete('public/' . $data_aduan->fotobalasan);
        }
        $image_name = $request->file('fotobalasan')->store('img', 'public');
        $data_aduan->fotobalasan = $image_name;

        $data_aduan->save();
        return redirect()->route('aduan.store', 'pengaduan');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data_aduan = Pengaduan::find($id);
            if ($data_aduan != null) {
                    $data_aduan-> delete();
                    return redirect() -> route ('aduan.index');
            }
        return redirect() -> route ('user.create');
    }
}