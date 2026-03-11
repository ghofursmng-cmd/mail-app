<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Keluar - {{ date('d M Y') }}</title>
    <style>
        body { font-family: 'Arial', sans-serif; color: #333; line-height: 1.5; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .header h1 { margin: 0; text-transform: uppercase; font-size: 24px; }
        .header p { margin: 5px 0; color: #666; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px 8px; text-align: left; font-size: 12px; }
        th { background-color: #f8f9fa; font-weight: bold; text-transform: uppercase; }
        .footer { margin-top: 40px; text-align: right; font-size: 12px; }
        @media print {
            .no-print { display: none; }
            body { padding: 0; }
            table { page-break-inside: auto; }
            tr { page-break-inside: avoid; page-break-after: auto; }
        }
    </style>
</head>
<body onload="if(window.location.search.indexOf('print') > -1) window.print()">
    <div class="header">
        <h1>Laporan Arsip Surat Keluar</h1>
        <p>Aplikasi Persuratan Digital - Modern Management System</p>
        <p>Tanggal Cetak: {{ date('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 40px;">No</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Tujuan Surat</th>
                <th>Perihal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratKeluars as $index => $surat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $surat->nomor_surat }}</td>
                <td>{{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d/m/Y') }}</td>
                <td style="font-weight: bold;">{{ $surat->tujuan_surat }}</td>
                <td>{{ $surat->perihal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak secara otomatis oleh sistem pada {{ date('H:i:s d/m/Y') }}</p>
    </div>

    <div class="no-print" style="margin-top: 20px; text-align: center;">
        <button onclick="window.print()" style="padding: 10px 20px; background: #059669; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">Klik untuk Cetak</button>
        <button onclick="window.history.back()" style="padding: 10px 20px; background: #64748b; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; margin-left: 10px;">Kembali</button>
    </div>
</body>
</html>
