@push('penjualan')
    @if ($penjualan)
    @foreach ($penjualan as $p)  
        <tr>
            <td>{{$p->produk_id}}</th>
            <td>{{$p->kuantitas}}</th>
        </tr>
    @endforeach
    @endif
@endpush