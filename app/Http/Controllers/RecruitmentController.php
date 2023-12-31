<?php

namespace App\Http\Controllers;

use App\Models\logwa;
use App\Traits\WablasTrait;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        if(strlen($keyword)){
            $datapeserta = Recruitment::where('nama', 'like', "%$keyword%")
            ->orWhere('formasi', 'like', "%$keyword%")->orWhere('nohp', 'like', "%$keyword%")->orWhere('NIK', 'like', "%$keyword%")->orWhere('Universitas', 'like', "%$keyword%")->paginate(10);
        }else{
            $datapeserta = Recruitment::orderBy('id', 'asc')->paginate(10);
        }
        // $datapeserta = Recruitment::paginate();
        return view('admin.recruitment.recruitment', compact('datapeserta'));
    }

    public function sendwa(Request $request, $id){
        $recruitment = Recruitment::find($id);
        // dd($recruitment->Nama);
        $tgl_kirim = date("Y-m-d");
        $jam_kirim = date("H:i:s");
        $pesan = 
            "Assalamu'alaikum Wr. Wb. 

Kepada Yth. *".$recruitment->Nama. 

"*

RS Sarkies 'Aisyiyah Kudus mengucapkan *SELAMAT! Anda Lolos Proses Seleksi Wawancara Pegawai.* Kami mengundang Bapak/Ibu untuk melakukan tahapan berikutnya yaitu ". "*"."Medical Check Up (MCU) Calon Pegawai"."*"." yang akan dilaksanakan pada:


Hari, tgl : Kamis, 07 Desember 2023
Jam       : "."08.00 WIB - Selesai"."
Tempat  : RS Sarkies 'Aisyiyah Kudus 

Perlengkapan yang harus dibawa:
KTP/Kartu Identitas lainnya

Harap memperhatikan hal-hal berikut ini:
1. Harap datang tepat waktu
2. Memakai pakaian rapih, sopan dan bersepatu (perempuan wajib berjilbab)
3. Harap puasa minimal 7 jam untuk pemeriksaan

* "."*"."Biaya Pemeriksaan Kesehatan (MCU) adalah Rp. 240.000 (dibayarkan saat proses MCU selesai)."."*"."

*Mohon konfirmasi kesediaan Bapak/Ibu untuk menerima ataupun menolak undangan kami.* 

Demikian informasi yang dapat kami sampaikan, atas perhatiannya kami sampaikan terimakasih.  

Salam sehat, salam hebat. 

Panitia Rekruitmen Pegawai
RS Sarkies ". "'Aisyiyah". " Kudus";
            
            // dd($pesan);

        $kumpulan_data = [];
        $data['phone'] = $recruitment->nohp;
        $data['message'] = $pesan;
        $data['secret'] = false;
        $data['retry'] = false;
        $data['isGroup'] = false;
        array_push($kumpulan_data, $data);
        $sendwa = WablasTrait::sendText($kumpulan_data);

        if($sendwa){
            $validasi = [
                'nama' => $recruitment->Nama,
                'nohp' => $recruitment->nohp,
                'tgl_kirim' => $tgl_kirim,
                'jam_kirim' => $jam_kirim,
                'pesan' => $pesan,
            ];
            logwa::create($validasi);
            return redirect()->back()->with('success', 'Berhasil mengirim notifikasi');
        }else{
            return redirect()->back()->withErrors('Gagagl mengirim notifikasi');
        };
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
