<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            
        }
        .header, .footer {
            
        }
        .content {
            margin-top: 20px;
        }
        .details {
            width: 100%;
            border-collapse: collapse;
        }
        .details th, .details td {
    
            padding: 2px;
            text-align: left;
        }
        .detail th, .detail td {
            border-style:solid;
            padding: 2px;
            text-align: left;
        }
        p {
            text-transform: capitalize;
        }
    </style>
</head>
<body >
    <div class="container">
        <div class="header">
            <h4 style="text-align: center;">Formulir Permohonan Benih</h4>
            <p style="margin-top:10px;">Kepada Yth.<br>Kepala BSIP Kalimantan Timur<br>di Tempat</p>
        </div>
        <div class="content">
            <p> Dengan Hormat,<br>
                Saya yang bertanda tangan dibawah ini :
            </p>
            <table class="details">
                <tr>
                    <td width="100">Nama</td>
                    <td width="10">:</td>
                    <td width="300"><span>{{ $payment->user->name }}</span></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td width="300">{{ $payment->user->alamat }}</td>
                </tr>
                <tr>
                    <td>No. HP / Tlpn</td>
                    <td>:</td>
                    <td width="300">{{ $payment->user->noTlpn }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td width="300">{{ $payment->user->pekerjaan }}</td>
                </tr>
            </table>
            <p text-transform: uppercase;> Kami bermohon Untuk<br>
                @if($payment->jenispembayaran_id == 1)
                <b>Bahan Deseminasi</b>
                @endif
               
            </p>  

            <table class="details detail">
                <thead>
                    <tr class="text-center">
                        <th width="20">No.</th>
                        <th>Nama Varitas</th>
                        <th width="50">Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payment->itemvaritas as $no=>$data)
                        
                    
                    <tr>
                        <td>{{ $no+1 }}.</td>
                        <td>{{ $data->relasitblvaritas->varitas }}</td>
                        <td>{{ $data->jumlah }}</td>
                        <td>@rupiah($data->relasitblvaritas->harga)</td>
                        <td>@rupiah($data->total)</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Rencana Pengambilan : Hari {{ $tgl }} Tanggal {{ $tanggal }} <br> Bibit/Benih tersebut akan kami tanam dilahan yang berlokasi di :</p>
            <table style="font-size: 11pt;">
                <tr >
                    <td>Desa</td>
                    <td>:</td>
                    <td>{{ $payment->kelurahan->kelurahan }}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td>{{ $payment->kelurahan->kecamatan->kecamatan }}</td>
                </tr>
                <tr>
                    <td>Kabupaten / Kota</td>
                    <td>:</td>
                    <td>{{ $payment->kelurahan->kecamatan->kota->kota }}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td>{{ $payment->kelurahan->kecamatan->kota->provinsi->provinsi }}</td>
                </tr>
            </table>
            <p>Demikian permohonan ini kami sampaikan, atas perhatiannya kami ucapkan termikasih.</p>
            <table style="float: right; margin-right:80px;">
                <tr>
                    <td style="height: 120px;   text-align: center;">Pemohon</td>
                </tr>
               
                <tr>
                    <td style="height: 100px; text-align: center;">{{ $payment->user->name }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>