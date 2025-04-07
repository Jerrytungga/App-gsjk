<?php

namespace App\Imports;

use App\Models\KaumSaleh;
use App\Models\Ksv;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class KaumSalehImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $importedCount = 0;
    private $skippedCount = 0;
    private $duplicateData = [];

    
    
    public function model(array $row)
    {
        $tgl_lahir = $this->convertToDate($row['tanggal_lahir']);
        $tgl_baptis = $this->convertToDate($row['tanggal_baptis']);

        // Cek duplikat berdasarkan nama dan tanggal lahir
        $exists = Ksv::where('nama', $row['nama'])
            ->where('tgl_lahir', $tgl_lahir)
            ->exists();

        if ($exists) {
            $this->skippedCount++;
            $this->duplicateData[] = "{$row['nama']} (Lahir: {$tgl_lahir})";
            return null;
        }

        $this->importedCount++;
        return new Ksv([
            'nama' => $row['nama'] ?? null,
            'gender' => $row['jenis_kelamin'] ?? null,
            'usia' => $row['usia'] ?? null,
            'telepon' => $row['telepon'] ?? null,
            'alamat' => $row['alamat'] ?? null,
            'tgl_lahir' => $tgl_lahir,
            'tgl_baptis' => $tgl_baptis,
            'lokal' => $row['lokal'] ?? null,
        ]);
    }

    public function getImportedCount()
    {
        return $this->importedCount;
    }

    public function getSkippedCount()
    {
        return $this->skippedCount;
    }

    public function getDuplicateData()
    {
        return $this->duplicateData;
    }

    private function convertToDate($date)
    {
        if (empty($date)) return null;

        try {
            if (is_numeric($date)) {
                // Konversi format serial Excel
                return Carbon::createFromDate(1899, 12, 30)->addDays($date)->format('Y-m-d');
            }
            return Carbon::parse($date)->format('Y-m-d');
        } catch (\Exception $e) {
            Log::error("⚠️ Format tanggal tidak valid: {$date}");
            return null;
        }
    }
}