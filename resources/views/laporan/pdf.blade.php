<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f7fc;
        }

        h2 {
            text-align: center;
            color: #3c4b64;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #e0e0e0;
            padding: 12px;
            text-align: center;
            font-size: 14px;
        }

        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        td {
            background-color: white;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #6c757d;
        }

        .table-container {
            margin-top: 30px;
        }

        .logo {
            width: 150px;
            margin: 0 auto;
        }

        .header-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header-info div {
            font-size: 14px;
            color: #3c4b64;
        }

        .header-info .date {
            text-align: right;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header-info">
        <div class="company-name">
            <strong> PT.Winnicode Garuda Teknologi</strong><br>
            <span>Bantul, Yogyakarta</span>
        </div>
        <div class="date">
            <strong>Tanggal: </strong> {{ date('d M Y') }}
        </div>
    </div>

    <!-- Title Section -->
    <h2>Rekap/Laporan Absensi Pegawai</h2>

    <!-- Table Section -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensis as $absensi)
                    <tr>
                        <td>{{ $absensi->nama }}</td>
                        <td>{{ $absensi->jabatan }}</td>
                        <td>{{ $absensi->waktu_masuk }}</td>
                        <td>{{ $absensi->waktu_keluar ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; {{ date('Y') }} PT.Winnicode Garuda Teknologi. Semua hak dilindungi oleh perusahaan.</p>
    </div>

</body>
</html>
