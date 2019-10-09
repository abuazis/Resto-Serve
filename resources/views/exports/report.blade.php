<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .date-invoice {
            padding-left: 209px;
        }
    </style>
</head>
@php
    use Illuminate\Support\Carbon;
@endphp
<body>
    <div class="invoice-box rtl">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">
                            </td>

                            <td class="date-invoice" style="text-align: right;">
                                Report #: 065<br>
                                Berlaku Dari: {{ Carbon::now()->format('M') }} 1, {{ Carbon::now()->year }}<br>
                                Sampai: {{ Carbon::now()->format('M') }} 31, {{ Carbon::now()->year }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2" style="padding-top: 60px;">
                    <table>
                        <tr>
                            <td style="padding-right: 400px; padding-bottom: 50px;">
                                Pizza Serve, Inc.
                                17148 Pekayon Jaya
                                Bekasi City, CA 17148
                            </td>

                            <td style="text-align: right; padding-bottom: 50px;">
                                Resto Serve Corp<br>
                                Administrator<br>
                                admin@resto.co.id
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
                    Incomes
                </td>

                <td style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
                    Results
                </td>
            </tr>

            <tr class="details">
                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    Pemesanan Restoran
                </td>

                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    Rp. {{number_format($jauh, 0, ',', '.')}}
                </td>
            </tr>

            <tr class="heading">
                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    Pemesanan Jarak Jauh
                </td>

                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    Rp. {{number_format($dekat, 0, ',', '.')}}
                </td>
            </tr>

            <tr class="item">
                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    Adsense Web
                </td>

                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    -
                </td>
            </tr>

            <tr class="item">
                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    Tip Pegawai
                </td>

                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    -
                </td>
            </tr>

            <tr class="item last">
                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    Parkir Kendaraan
                </td>

                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    -
                </td>
            </tr>

            <tr class="item last">
                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    Penjualan Souvenir
                </td>

                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    -
                </td>
            </tr>

            <tr class="item last">
                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    Loyalti Pusat
                </td>

                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                    -
                </td>
            </tr>

            <tr class="total">
                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">

                <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                   Total: Rp. {{number_format($total, 0, ',', '.')}}
                </td>
            </tr>
        </table>

        <div class="signature" style="margin-top: 300px;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/8c/Signature_of_BTS%27_Jungkook.png" width="30%" style="float: right;" alt=""><br><br><br><br><br><br><br>
            <span style="float: right; display: inline-block; margin-right: 25px">Director Of RestoServe</span>
        </div>
    </div>
</body>
</html>
