<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KendaraanModel;
use App\Models\TransaksiModel;

class Kendaraan extends BaseController
{
    protected $kendaraan;
    protected $transaksi;

    public function __construct()
    {
        $this->kendaraan = new KendaraanModel();
        $this->transaksi = new TransaksiModel();
    }
    public function index()
    {
        $data['kendaraan'] = $this->kendaraan->findAll();
        // dd($data['kendaraan']);
        foreach ($data['kendaraan'] as $key => $value) {
            $value->transaksi =  $this->transaksi->where('transaksi_id', $value->kendaraan_id)->findAll();
        }
        return view('kendaraan', $data);
    }

    function tambah()
    {
        $data = $this->request->getPost();
        // dd($data);
        if (isset($data["tambah"])) {
            $this->kendaraan->insert($data);
            return redirect()->to(base_url('kendaraan'));
        } else return view('tambah_kendaraan');
    }
    function ubah($id = null)
    {
        $item = $this->request->getPost();
        if (isset($item['update'])) {
            $this->kendaraan->update($id, $item);
            return redirect()->to(base_url('kendaraan'));
        } else {
            $item['kendaraan'] = $this->kendaraan->where('kendaraan_id', $id)->first();
            return view('ubah_kendaraan', $item);
        }
    }
    function hapus($id = null)
    {
        try {
            $this->kendaraan->delete($id);
            return redirect()->to(base_url('kendaraan'));
        } catch (\Throwable $th) {
            return redirect()->to(base_url('kendaraan'));
        }
    }
}