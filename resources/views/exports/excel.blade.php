<table>
    <tr>
        <th colspan="8" style="text-align: center;">Laporan Order {{$carbon->now()->subMonths(0)->format('M')}}</th>
    </tr>
    <tr class="heading">
        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            ID Order
        </th>

        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            Nama Pelanggan
        </th>

        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            No Meja
        </th>

        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            Alamat
        </th>

        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            Waktu Order
        </th>

        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            Keterangan
        </th>

        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            Status Order
        </th>

        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            Total Pembayaran
        </th>
    </tr>

    @foreach($orders as $order)
        <tr class="details">
            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                {{$order->id}}
            </td>

            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                {{$order->nama_pelanggan}}
            </td>

            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                {{$order->no_meja}}
            </td>

            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                {{$order->alamat}}
            </td>

            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                {{$order->waktu_order}}
            </td>

            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                {{$order->keterangan}}
            </td>

            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                {{$order->status_order}}
            </td>

            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                Rp. {{number_format($order->total_pembayaran, 0, ',', '.')}}
            </td>
        </tr>
    @endforeach
</table>

<table>
    <tr>
        <th colspan="8" style="text-align: center;">Laporan Transaksi {{$carbon->now()->subMonths(0)->format('M')}}</th>
    </tr>
    <tr class="heading">
        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            No#
        </th>

        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            Nama Pelanggan
        </th>

        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            Total Bayar
        </th>

        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            Uang Dibayar
        </th>

        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            Total Kembali
        </th>
    </tr>

    @foreach($transaksis as $tran)
        <tr class="details">
            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                {{$loop->iteration}}
            </td>

            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                {{$tran->nama_pelanggan}}
            </td>

            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                Rp. {{number_format($tran->total_bayar, 0, ',', '.')}}
            </td>

            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                Rp. {{number_format($tran->uang_dibayar, 0, ',', '.')}}
            </td>

            <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
                Rp. {{number_format($tran->total_kembali, 0, ',', '.')}}
            </td>
        </tr>
    @endforeach
</table>

<table>
    <tr>
        {{-- <td></td> --}}
        <th colspan="2" style="text-align: center;">Laporan Pemasukan {{$carbon->now()->subMonths(0)->format('M')}}</th>
    </tr>
    <tr class="heading">
        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            Incomes
        </th>
        <th style="border: 1px solid grey; padding-bottom: 10px; text-align: center; padding-top: 10px; background: #ACE8D4;">
            Results
        </th>
    </tr>

    <tr class="details">
        <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
            Pemesanan Restoran
        </td>

        <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
            Rp. {{number_format($dekat, 0, ',', '.')}}
        </td>
    </tr>

    <tr class="heading">
        <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
            Pemesanan Jarak Jauh
        </td>

        <td style="border: 1px solid grey; padding: 5px; padding-left: 20px; background: #ddd;">
            Rp. {{number_format($jauh, 0, ',', '.')}}
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
