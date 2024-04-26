<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill</title>
</head>
<body>
    <table style="border-collapse: collapse;">
        <tr>
            <th colspan="6">Celestia</th>
        </tr>
        <tr>
            <th colspan="6">Delivery</th>
        </tr>
        <tr>
            <th colspan="6">086828981828</th>
        </tr>
        <tr>
            <th colspan="6"><hr></th>
        </tr>
        <tr>
            <th style="border: 1px solid black; padding: 5px;">No</th>
            <th style="border: 1px solid black; padding: 5px;">Pegawai</th>
            <th style="border: 1px solid black; padding: 5px;">Pelanggan</th>
            <th style="border: 1px solid black; padding: 5px;">Tanggal Dikirim</th>
            <th style="border: 1px solid black; padding: 5px;">Harga</th>
            <th style="border: 1px solid black; padding: 5px;">Status</th>
        </tr>
        @php $no = 1; @endphp
        @foreach ($data as $item)
            <tr>
                <td style="border: 1px solid black; padding: 5px;">{{ $no++ }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $item->pegawai->nama }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $item->pelanggan->nama }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $item->tanggal_dikirim }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $item->harga }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $item->status }}</td>
            </tr>
            <tr>
                <td colspan="6" style="border: 1px solid black; padding: 5px;">Terimakasih Telah Menggunakan Celestia Delivery</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-right: 20px;">
                    Kediri, {{ now()->format('d F Y') }}
                    <br>
                    Pegawai
                    <br>
                    <br>
                    <br>
                    <label>{{ Auth::user()->name }}</label>
                </td>
                
                <td colspan="3" style="padding-left: 20px;">
                    Kediri, {{ now()->format('d F Y') }}
                    <br>
                    Pembeli
                    <br>
                    <br>
                    <br>
                    {{ $item->pelanggan->nama }}
                </td>
            </tr>
            
        @endforeach
    </table>

    <!-- Display the QR code -->
    <div id="qrcode"></div>

    <!-- JavaScript to generate QR Code -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        // Generate QR Code
        var username = "{{ Auth::user()->name }} \n" + "Tanggal: {{ now()->format('d F Y') }}";
        var qrtext = "Ditanda tangan di PT PENJUALAN\n" + username;
        var qr = new QRCode(document.getElementById("qrcode"), {
            text: qrtext,
            width: 90,
            height: 90
        });

        // Delay printing with setTimeout
        setTimeout(function() {
            window.print();
        }, 500);
    </script>
</body>
</html>
