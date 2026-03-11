<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Keluar - {{ date('d M Y') }}</title>
    <style>
        body { font-family: 'Times New Roman', serif; color: #000; line-height: 1.2; padding: 10px; }
        .kop-surat { text-align: center; margin-bottom: 20px; border-bottom: 4px double #000; padding-bottom: 10px; }
        .kop-surat h2 { margin: 0; font-size: 20px; text-transform: uppercase; }
        .kop-surat h1 { margin: 0; font-size: 24px; text-transform: uppercase; font-weight: bold; }
        .kop-surat p { margin: 2px 0; font-size: 12px; font-style: italic; }
        
        .title { text-align: center; margin: 20px 0; }
        .title h3 { text-decoration: underline; text-transform: uppercase; margin: 0; font-size: 16px; }
        .title p { margin: 5px 0; font-size: 14px; }

        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 8px 5px; text-align: left; font-size: 12px; }
        th { background-color: #f2f2f2; font-weight: bold; text-align: center; text-transform: uppercase; }
        
        .ttd-container { margin-top: 40px; width: 100%; }
        .ttd-box { float: right; width: 300px; text-align: center; font-size: 14px; }
        .ttd-space { height: 80px; }
        .ttd-name { font-weight: bold; text-decoration: underline; }

        @media print {
            .no-print { display: none; }
            body { padding: 0; }
        }
    </style>
</head>
<body onload="if(window.location.search.indexOf('print') > -1) window.print()">
    <div class="kop-surat">
        <h2>PEMERINTAH REPUBLIK INDONESIA</h2>
        <h1>INSTANSI PERSURATAN DIGITAL</h1>
        <p>Jl. Jenderal Sudirman No. 123, Jakarta Pusat | Telp: (021) 555-0123</p>
        <p>Email: admin@mailapp.premium | Website: www.mailapp.premium</p>
    </div>

    <div class="title">
        <h3>REKAPITULASI ARSIP SURAT KELUAR</h3>
        <p>Periode s/d Tanggal: {{ date('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 30px;">NO</th>
                <th style="width: 150px;">NOMOR SURAT</th>
                <th style="width: 120px;">TANGGAL SURAT</th>
                <th>TUJUAN SURAT</th>
                <th>PERIHAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratKeluars as $index => $surat)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td>{{ $surat->nomor_surat }}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d/m/Y') }}</td>
                <td style="font-weight: bold;">{{ $surat->tujuan_surat }}</td>
                <td>{{ $surat->perihal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ttd-container">
        <div class="ttd-box">
            <p>Jakarta, {{ date('d F Y') }}</p>
            <p>Mengetahui,</p>
            <p><strong>Kepala Bagian Tata Usaha</strong></p>
            <div class="ttd-space"></div>
            <p class="ttd-name">( ............................................ )</p>
            <p>NIP. ........................................</p>
        </div>
        <div style="clear: both;"></div>
    </div>

    <div class="no-print" style="margin-top: 30px; text-align: center;">
        <button onclick="window.print()" style="padding: 12px 25px; background: #000; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">CETAK SEKARANG</button>
        <button onclick="window.history.back()" style="padding: 12px 25px; background: #666; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; margin-left:10px;">KEMBALI</button>
    </div>
</body>
</html>
