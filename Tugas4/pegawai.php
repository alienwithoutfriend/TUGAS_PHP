<?php

class Pegawai
{
    public $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;
    // Const & Static
    static $no = 0;
    const PT = 'SINAR JAYA ABADI';


    // konstruktor (nip, nama, jabatan, agama, status)
    public function __construct($nip, $nama, $jabatan, $agama, $status)
    {
        // Inisialisasi
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
        self::$no++;
    }

    public function setGajiPokok()
    {
        // setGajiPokok (gunakan switch case : manager=>15jt, asmen=>10jt, kabag=>7jt, staff=>4jt)
        switch ($this->jabatan) {
            case 'Manager':
                $gajiPokok = 15 * 1000000;
                break;
            case 'Asmen':
                $gajiPokok = 10 * 1000000;
                break;
            case 'Kabag':
                $gajiPokok = 7 * 1000000;
                break;
            case 'Staff':
                $gajiPokok = 4 * 1000000;
                break;
            default:
                $gajiPokok = 0;
                break;
        }
        return $gajiPokok;
    }

    public function setTunjab()
    {
        // setTunjab = 20% dari Gaji Pokok
        $tunJab = 20 / 100 * $this->setGajiPokok();
        return $tunJab;
    }

    public function setTunkel()
    {
        // setTunkel= 10% dari Gaji Pokok untuk sudah menikah (ternary)
        $tunKel = ($this->status == 'Menikah') ? $this->setGajiPokok() * 10 / 100 : 0;
        return $tunKel;
    }

    public function setGajiKotor()
    {
        $gajiKotor = $this->setGajiPokok() + $this->setTunjab() + $this->setTunkel();
        return $gajiKotor;
    }

    public function setZakatProfesi()
    {
 
        $zakat = ($this->agama == 'Islam' && $this->setGajiPokok() >= 6 * 1000000) ? ($this->setGajiPokok() * 2.5 / 100) : 0;
        return $zakat;
    }


    public function setGajiBersih()
    {
        $gajiBersih = $this->setGajiKotor() - $this->setZakatProfesi();
        return $gajiBersih;
    }

    public function cetak()
    {

        echo '
        <div class="col mb-3 mx-0">
            <div class="card" style="width: 18.9rem; max-height: 50em">
            <h5 class="card-title text-center text-light p-1 mb-0 bg-primary small">No. ' . self::$no . '</h5>
                <div class="card-body">
                    <h5 class="card-title mt-0">' . $this->nama . '</h5>
                    <h6 class="card-subtitle mb-2 text-muted">' . $this->nip . ' | ' . $this->jabatan . '</h6>
                    <hr class="border border-warning border-1 opacity-100 mb-3 mt-0 my-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Agama: ' . $this->agama . ' </li>
                        <li class="list-group-item">Status: ' . $this->status . ' </li>
                        <li class="list-group-item">Gaji Pokok: Rp.' . number_format($this->setGajiPokok(), 2, ',', '.') . '</li>
                        <li class="list-group-item">Tunjangan Jabatan: Rp.' . number_format($this->setTunjab(), 2, ',', '.') . '</li>
                        <li class="list-group-item">Tunjangan Keluarga: Rp.' . number_format($this->setTunkel(), 2, ',', '.') . ' </li>
                        <li class="list-group-item">Zakat Profesi: Rp.' . number_format($this->setZakatProfesi(), 2, ',', '.') . ' </li>
                        <li class="list-group-item">Gaji Kotor: Rp.' . number_format($this->setGajiKotor(), 2, ',', '.') . ' </li>
                        <li class="list-group-item">Gaji Bersih: Rp.' . number_format($this->setGajiBersih(), 2, ',', '.') . '</li>
                    </ul>
                </div>
                <h5 class="card-title text-center text-succes bg-info p-1 small">' . self::PT . '</h5>
            </div>
        </div>
        ';
    }
}