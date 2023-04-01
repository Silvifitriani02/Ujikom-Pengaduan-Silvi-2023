<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pengaduan;
use App\Tanggapan;
use App\Pengaduanimage;
use Carbon\Carbon;
use App\Mail\SendTanggapan;
use App\user;
use App\Mail\SendStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::all();
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduan','user'));
    }

    public function cetakpengaduan()
    {
        $cetakpengaduan = DB::table('tb_tanggapan as u')->select(
            'u.id_tanggapan',
            'u.id_pengaduan',
            'u.tgl_tanggapan',
            'u.tanggapan',
            'b.*'
        )
        ->join('tb_pengaduan as b','b.id_pengaduan','=','u.id_pengaduan')
        ->get();

        return view('pengaduan.cetak-pengaduan', compact('cetakpengaduan'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.create')  ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

    		'tgl_pengaduan' => 'required',
    		// 'nik' => 'required',
            'isi_laporan' => 'required',
            'foto.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000|required',
    	]);

        // $nm = $request->foto;
        // $item = time().rand(100,999).".".$nm->getClientOriginalName();
        $uniqID = Carbon::now()->timestamp . uniqid();

        $nik = Auth::user()->nik;
        
        $data = new Pengaduan;
        $data->unique_id  = $uniqID;
        $data->tgl_pengaduan = $request->tgl_pengaduan;
        // $data->nik = $request->nik;
        $data->nik = $nik;
        $data->isi_laporan = $request->isi_laporan;

        foreach ($request->foto as $key => $image) {
            $pimage = new Pengaduanimage();
            $pimage->pengaduan_unique_id = $uniqID;

            $imageName = Carbon::now()->timestamp . $key . '.' . $request->foto[$key]->extension();
            $request->foto[$key]->move(public_path("images"), $imageName);

            $pimage->image = $imageName;
            $pimage->save();
        }

        $data->save();
        return redirect('/history');

        // $data = new Pengaduan;
        // //$data->id_pengaduan = $request->id_pengaduan;
        // $data->tgl_pengaduan = $request->tgl_pengaduan;
        // $data->nik = $request->nik;
        // $data->isi_laporan = $request->isi_laporan;
        // $data['foto']=
        // $request->file('foto')->store('assets/pengaduan','public');

        // $data->save();
 
        // Pengaduan::create([
    	// 	'tgl_pengaduan' => $request->tgl_pengaduan,
    	// 	'nik' => $request->nik,
        //     'isi_laporan' => $request->isi_laporan,
        //     'foto' => $request->foto,
        //     'status' => $request->status
    	// ]);

    	// return redirect('/pengaduan');
    
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        return view('pengaduan.show',compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan',$id)->first();

        // $nik = Auth::user()->nik;


        return view('pengaduan.edit', compact('pengaduan'));
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
        $this->validate($request, [
            'tanggapan' => 'required',
            // 'tgl_pengaduan' => 'required',
            // 'nik' => 'required',
            // 'isi_laporan' => 'required',
            // 'foto' => 'required'
        ]);

        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

            Tanggapan::create([
                'id_pengaduan' =>$pengaduan->id_pengaduan,
                'tgl_tanggapan' => Carbon::now()->format('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'nik' => $pengaduan->nik,
            ]);

            Pengaduan::where('id_pengaduan',$id)->update([
                'status' => 'proses'
            ]);

            $send_tanggapan = DB::table('tb_tanggapan as T')
            ->select('T.*','P.*','U.name','U.email')
            ->join('tb_pengaduan as P','T.id_pengaduan','=','P.id_pengaduan')
            ->join('users as U','P.nik','=','U.nik')
            ->where('P.id_pengaduan','=',$id)
            ->first();

            $data_tanggapan = [
                'nik'           => $send_tanggapan->nik,
                'name'          => $send_tanggapan->name, 
                'tgl_pengaduan' => $send_tanggapan->tgl_pengaduan,
                'tgl_tanggapan' => $send_tanggapan->tgl_tanggapan,
                'isi_laporan'   => $send_tanggapan->isi_laporan,
                'tanggapan'     => $send_tanggapan->tanggapan,
                'status'        => $send_tanggapan->status
            ];
    
            Mail::to($send_tanggapan->email)->send(new SendTanggapan($data_tanggapan));
            // 'tgl_pengaduan' => $request->tgl_pengaduan,
            // 'nik' => $request->nik,
            // 'isi_laporan' => $request->isi_laporan,
            // 'foto' => $request->file('foto')->store('assets/pengaduan', 'public')
        

        return redirect()->route('tanggapan')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengaduan::where('id_pengaduan',$id)->delete();
        return redirect()->route('pengaduan')->with('Data Berhasil di Hapus');
    }

    public function status($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

        $status_sekarang = $pengaduan->status;

        if ($status_sekarang == 'proses'){
            Pengaduan::where('id_pengaduan', $id)->update([
                'status' => 'selesai'
            ]);
        } 

        $send_status = DB::table('tb_tanggapan as T')
        ->select('T.*', 'P.*', 'U.name', 'U.email')
        ->join('tb_pengaduan as P', 'T.id_pengaduan', '=','P.id_pengaduan')
        ->join('users as U', 'P.nik', '=', 'U.nik')
        ->where('P.id_pengaduan', '=', $id)
        ->first();

        $data_tanggapan = [
            'nik' =>$send_status->nik,
            'name' =>$send_status->name,
            'tgl_pengaduan' =>$send_status->tgl_pengaduan,
            'tgl_tanggapan' =>$send_status->tgl_tanggapan,
            'isi_laporan' =>$send_status->isi_laporan,
            'tanggapan' =>$send_status->tanggapan,
            'status' =>$send_status->status,
        ];
        Mail::to($send_status->email)->send(new SendStatus($data_tanggapan));
        return redirect()->route('pengaduan');
    }

}