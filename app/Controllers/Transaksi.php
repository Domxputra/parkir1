<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KendaraanModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    protected $kendaraan;
    protected $transaksi;

    public function __construct()
    {
        $this->kendaraan = new KendaraanModel();
        $this->transaksi = new TransaksiModel();
    }

    function tambah($id_kendaraan =null)
    {
        $data = $this->request->getPost();
        if(isset($data["tambah"])){
            // dd($data);
            $this->transaksi->insert($data);
            return redirect()->to(base_url('kendaraan'));
        }else {
            $item = $this->kendaraan->where('kendaraan_id', $id_kendaraan)->first();
            return view('tambah_transaksi', ['kendaraan_id'=>$id_kendaraan, "data"=>$item]);
        }
    }
    function ubah($id=null)
    {
        $item = $this->request->getPost();
        if(isset($item['update'])){
            $this->transaksi->update($id, $item);
            return redirect()->to(base_url('kendaraan'));
        }else{
            $item['kendaraan'] = $this->kendaraan->where('kendaraan_id', $id)->first();
            return view('ubah_transaksi', $item);
        }
    }
    function hapus($id=null)
    {
        try {
            $this->transaksi->delete($id);
            return redirect()->to(base_url('kendaraan'));
        } catch (\Throwable $th) {
            return redirect()->to(base_url('kendaraan'));
        }
    }
}