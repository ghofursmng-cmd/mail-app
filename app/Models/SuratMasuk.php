<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_surat',
        'nomor_agenda',
        'nomor_surat',
        'asal_surat',
        'tanggal_terima',
        'perihal',
    ];
}
