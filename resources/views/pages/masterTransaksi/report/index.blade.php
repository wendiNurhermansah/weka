@php
$template = App\Models\Template::select('id', 'logo', 'logo_title')->first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title --> 
    <link rel="icon" href="{{ asset('images/logo/'.$template->logo_title) }}" type="image/x-icon">
    <title>{{ config('app.name') }} @yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">

    <style>
        .border2 {
          border: 1px solid black;
        }
    </style>

</head>
<body class="light" style="font-family: Arial, Helvetica, sans-serif">
    <div class="container my-4 pb-3" style="background-color:#FC8C4F !important">
        <div class="justify-content-center">
            <div class="">
                <div class="ml-3 font-weight-bold">
                    <p class="m-0">KANTOR WILAYAH : <span class="font-weight-light">DJP JAKARTA 1</span></p>
                    <p>KANTOR PELAYANAN PBB : <span class="font-weight-light">JAKARTA CEMPAKA PUTIH</span></p>
                </div>
                <div style="background-color: #FAC2AA !important">
                    <div class="text-center fs-18 font-weight-bolder" style="margin-top: -10px">
                        <p class="m-0">SURAT PEMBERITAHUAN PAJAK TERHUTANG</p>
                        <P>PAJAK BUMI DAN BANGUNAN TAHUN</P>
                    </div>
                    <div class="container" style="margin-top: -10px">
                        <div class="row">
                            <div class="col-8">
                                <p>NO.SPPT(NOP) : <span class="font-weight-bold">xx.xx.xxx.xxx.xxx.xxx.x</span></p>
                            </div>
                            <div class="col-4">
                                <p>NPWP : <span class="font-weight-bolder">BELUM ADA</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="margin-top: -10px">
                        <div class="row">
                            <div class="col border2 bg-transparent" style="border-right: none">
                                <p class="text-center">LETAK OBJEK PAJAK</p>
                                <div>
                                    <p class="m-0">JL : <span class="font-weight-bold">xxxxxxxxxx</span></p>
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="mr-40">RT : <span class="font-weight-bold">xxx</span></p>
                                        </div>
                                        <div class="col-10">
                                            <p>RW : <span class="font-weight-bold">xxx</span></p>
                                        </div>
                                    </div>
                                    <div style="margin-top: -13px">
                                        <p class="m-0">RAWASARI</p>
                                        <p class="m-0">CEMPAKA PUTIH</p>
                                        <p class="m-0">JAKARTA PUSAT</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col border2 bg-transparent">
                                <p class="text-center">LETAK OBJEK PAJAK</p>
                                <div>
                                    <p class="m-0"><span class="font-weight-bold">xxxxxxxxxx</span></p>
                                    <p class="m-0">JL : <span class="font-weight-bold">xxxxxxxxxx</span></p>
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="mr-40">RT : <span class="font-weight-bold">xxx</span></p>
                                        </div>
                                        <div class="col-10">
                                            <p>RW : <span class="font-weight-bold">xxx</span></p>
                                        </div>
                                    </div>
                                    <div style="margin-top: -13px">
                                        <p class="m-0">RAWASARI</p>
                                        <p class="m-0">JAKARTA PUSAT</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2 border2 bg-transparent" style="border-right: none">
                                <P class="text-center mt-2">OBJEK PAJAK</P>
                            </div>
                            <div class="col-2 border2 bg-transparent" style="border-right: none">
                                <P class="text-center mt-2">LUAS(M2)</P>
                            </div>
                            <div class="col-1 border2 bg-transparent" style="border-right: none">
                                <P class="text-center mt-2">KELAS</P>
                            </div>
                            <div class="col-7 border2 bg-transparent" style="border-bottom: ">
                                <P class="text-center m-0">NJOP(Rp)</P>
                                <div class="row">
                                    <div class="col">
                                        <p style="border-top: 1px solid black; border-right: 1px solid black; width: 110%; margin-left: -15px !important" class="text-center m-0">PER M2</p>
                                    </div>
                                    <div class="col">
                                        <p style="border-top: 1px solid black; width: 110.5%; margin-left: -15px !important" class="text-center m-0">JUMLAH</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 border2 bg-transparent" style="border-top: none; border-right: none">
                                <P class="m-0">BUMI</P>
                                <P>BANGUNAN</P>
                            </div>
                            <div class="col-2 border2 bg-transparent" style="border-right: none; border-top: none">
                                <P class="m-0 text-right">972</P>
                                <P class="text-right">1.064</P>
                            </div>
                            <div class="col-1 border2 bg-transparent" style="border-right: none; border-top: none">
                                <P class="text-center m-0">B49</P>
                                <P class="text-center">A02</P>
                            </div>
                            <div class="col-7 border2 bg-transparent" style="border-top: none">
                                <div class="row">
                                    <div class="col">
                                        <div class="pr-3" style="border-right: 1px solid black; height: 100%; margin-right: -15px">
                                            <p class="text-right m-0">3.745.000</p>
                                            <p class="text-right">968.000</p>
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <p class="m-0 mr-5">3.640.140.000</p>
                                        <p class="mr-5">1.029.111.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row border2 pb-2" style="border-top: none">
                            <div class="col-4 bg-transparent pr-0" style="border-top: none">
                                <p class="font-weight-bold m-0">NJOP sebagai dasar pengenaan PBB</p>
                                <p class="m-0">NJOPTKP (NJOP Tidak Kena Pajak)</p>
                                <p class="m-0">NJOP untuk perhitungan PBB</p>
                                <p class="m-0">NJKP (Nilai Jual Kena Pajak)</p>
                                <p class="m-0">Pajak Bumi dan Bangunan yang Terutang</p>
                            </div>
                            <div class="col-1 p-0">
                                <p class="m-0">=</p>
                                <p class="m-0">=</p>
                                <p class="m-0">=</p>
                                <span class="m-0">=
                                    <span>40%</span>
                                </span><br>
                                <span class="m-0">=
                                    <span>0.5%</span>
                                </span>
                            </div>
                            <div class="col-sm-1 p-0">
                                <p class="m-0">&nbsp;</p>
                                <p class="m-0">&nbsp;</p>
                                <p class="m-0">&nbsp;</p>
                                <p class="m-0">x</p>
                                <p class="m-0">x</p>
                            </div>
                            <div class="col-2 p-0">
                                <p class="m-0">&nbsp;</p>
                                <p class="m-0">&nbsp;</p>
                                <p class="m-0">&nbsp;</p>
                                <p class="m-0">4.658.092.000</p>
                                <p class="m-0">1.863.236.000</p>
                            </div>
                            <div class="col-4 p-0">
                                <div class="text-right m-r-65">
                                    <p class="m-0">4.670.092.000</p>
                                    <p class="m-0">12.000.000</p>
                                    <p class="m-0">4.658.092.000</p>
                                    <p class="m-0">1.863.236.000</p>
                                    <p class="m-0">9.316.184</p>
                                </div>
                            </div>
                        </div>
                        <div class="row border2" style="border-top: none">
                            <div class="col-9">
                                <p class="font-weight-bold">PAJAK BUMI DAN BANGUNAN YANG HARUS DIBAYAR (Rp)</p>
                            </div>
                            <div class="col-3 text-right">
                                <p class="font-weight-bold m-r-50">9.316.184</p>
                            </div>
                            <div class="m-l-15">
                                <p class="mt-n3 mb-0">SEMBILAN JUTA TIGA RATUS ENAM BELAS RIBU SERATUS DELAPAN PULUH EMPAT RUPIH</p>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-6 border2" style="border-top: none; border-bottom: none">
                                <span class="font-weight-bold">TGL JATUH TEMPO </span><span>29 AGU 2005</span>
                                <p class="font-weight-bold m-0">TEMPAT PEMBAYARAN</p>
                                <p class="m-0">BANK MANDIRI SEAMEN CLUB</p>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <p class="m-0">JAKARTA, 03 JAN 2005</p>
                                    <span>PJ.</span><span class="font-weight-bold">KEPALA KANTOR</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 border2">
                                <p class="m-0 font-weight-bold">SPPT DAN STTS PBB BUKAN MERUPAKAN BUKTI PEMILIKAN HAK</p>
                                <P class="m-0 font-weight-bold">INFORMASI PADA SPPT INI ADALAH KONDISI OBJEK PAJAK PER 1 JANUARI TAHUN PAJAK</P>
                                <p class="m-0 font-weight-bold">NJOP DIGUNAKAN UNTUK TUJUAN PERPAJAKAN</p>
                            </div>
                            <div class="col-4 pb-0">
                                <p class="m-t-35 ml-1">NIP :</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="m-0">33105060203269RAAA4A4704</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3"></div>
                <div style="background-color: #FAC2AA !important">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 border2">
                                <div class="row">
                                    <label class="col-md-4 m-0">NAMA WP</label>
                                    <label class="col-md-8 m-0">: <span class="font-weight-bold">xxx xxxxx</span></label>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 m-0">Letak Objek Pajak</label>
                                    <label class="col-md-8 m-0">: <span>Kecamatan CEMPAKA PUTIH</span><br><span class="ml-2">Desa/Kel RAWASARI</span></label>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 m-0">No. SPPT (NOP)</label>
                                    <label class="col-md-8 m-0">: <span class="font-weight-bold">xx.xx.xxx.xxx.xxx.xxxx.x</span></label>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 m-0">SPPT Tahun/Rp.</label>
                                    <label class="col-md-8 m-0">: 2005 - 9.316.184</label>
                                </div>
                            </div>
                            <div class="col-6 border2" style="border-left: none">
                                <div class="row">
                                    <label class="col-md-3 m-0">Diterima tgl</label>
                                    <label class="col-md-9 m-0">: 24 September 2020</label>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 m-0">Tanda Tangan</label>
                                    <label class="col-md-9 m-0">:</label>
                                </div>
                                <hr class="mt-5 mb-1" style="border-top: 1px dashed">
                                <p class="text-center">Nama Terang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <!-- JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</html>
