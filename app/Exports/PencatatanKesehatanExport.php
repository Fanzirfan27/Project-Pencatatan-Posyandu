<?php

namespace App\Exports;

use App\Models\PencatatanKesehatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PencatatanKesehatanExport implements FromCollection,WithHeadings
{
    protected $data;
    
    public function __construct($data)
        {
            $this->data = $data;
        }
    
    public function collection()
        {
            return collect($this->data);
        }
    
    public function headings(): array
        {
            return ['Nama', 'Kategori', 'Jenis Pemeriksaan', 'Tanggal Pemeriksaan', 'Alamat', 'Jenis Kelamin', 'No Telepon'];
        }
}
