<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Native CSS -->
  <style>
      @page {
          margin: 0;
          margin-top: 40px;
      }
      body {
          padding: 0;
          margin: 0;
      }
      * {
        font-family: 'Mansalva', cursive;
      }
      h3 {
          font-size : 1.25rem;
          margin-bottom: 10px;
      }
      span {
          font-size: 0.85rem;
      }
      table {
          margin: auto;
      }
      td {
          width: auto;
          font-size: 0.73rem;
          padding-left: 3px;
          padding-bottom: 5px;
          padding-right: 3px;
      }
      .alamat {
        font-size: 0.80rem !important;
      }
      .footer {
          margin-left: 6px;
          margin-right: 6px;
      }
  </style>

  <!-- Icon -->
  <link rel="icon" href="{{asset('img/icon.png')}}">

  <title>Receipt | All Presented In Deliciousness</title>
</head>

<body>

    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 justify-content-center pt-5 text-center">
                <center>
                    <h3>RestoServe Pizza's Home</h3>
                    <span class="alamat">Jln. Grinedwall Famile R. Miller<br>Bintara Jaya, Bekasi City<br>021-44233857</span><br>
                    <h5>{{$date}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$time}}</h5>
                    <center>
                        <table class="mt-4 mx-auto">
                            @foreach($receipts as $receipt)
                            <tr>
                                <td class="pr-2 pl-2 pb-3">{{$receipt->menu['nama_menu']}}</td>
                                <td class="pr-2 pl-2 pb-3">Rp. {{number_format($receipt->menu['harga'], 0, ',', '.')}}</td>
                                <td class="pr-2 pl-2 pb-3">{{$receipt->jumlah}}x</td>
                                <td class="pr-2 pl-2 pb-3">Rp. {{number_format($receipt->menu['harga'] * $receipt->jumlah, 0, ',', '.')}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="pr-2 pl-2 pb-3"></td>
                                <td class="pr-2 pl-2 pb-3"></td>
                                <td class="pr-2 pl-2 pb-3"></td>
                                <td class="pr-2 pl-2 pb-3">--------</td>
                            </tr>
                            <tr>
                                <td class="pr-2 pl-2"></td>
                                <td class="pr-2 pl-2"></td>
                                <td class="pr-2 pl-2">Ds</td>
                                <td class="pr-2 pl-2">0%</td>
                            </tr>
                            <tr>
                                <td class="pr-2 pl-2 pb-3"></td>
                                <td class="pr-2 pl-2 pb-3"></td>
                                <td class="pr-2 pl-2 pb-3">T</td>
                                <td class="pr-2 pl-2 pb-3">Rp. {{number_format($receipt->transaction->total_bayar, 0, ',', '.')}}</td>
                            </tr>
                            <tr>
                                <td class="pr-2 pl-2"></td>
                                <td class="pr-2 pl-2"></td>
                                <td class="pr-2 pl-2">Py</td>
                                <td class="pr-2 pl-2">Rp. {{number_format($receipt->transaction->uang_dibayar, 0, ',', '.')}}</td>
                            </tr>
                            <tr>
                                <td class="pr-2 pl-2"></td>
                                <td class="pr-2 pl-2"></td>
                                <td class="pr-2 pl-2">Bk</td>
                                <td class="pr-2 pl-2">Rp. {{number_format($receipt->transaction->total_kembali, 0, ',', '.')}}</td>
                            </tr>
                        </table>
                        </center>
                        <span>============================</span><br /><br />
                        <img src="{{ public_path()}}/img/barcode.png" width="85%">
                        <span class="footer">Terima Kasih Telah Berkunjung Ke Restoran Kami</span>
                </center>
            </div>
        </div>
    </div>

</body>

</html>
