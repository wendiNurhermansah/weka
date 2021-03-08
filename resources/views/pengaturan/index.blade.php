@extends('layouts.app')
@section('title', ' | Pengaturan')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-gear mr-1"></i>
                        PENGATURAN
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Harap perbarui informasi di bawah ini</h6>
                {{-- main --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Nama situs</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Kode Pin</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Tel</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Pembulatan</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="bahasa">Bahasa</label>
                                <select class="form-control" id="bahasa" name="bahasa">
                                    <option>Indonesia</option>
                                    <option>English</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="tampilkanProduk">Tampilkan Produk</label>
                                <select class="form-control" id="tampilkanProduk" name="tampilkanProduk">
                                    <option>Nama</option>
                                    <option>Photo</option>
                                    <option>Both</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="tema">Tema</label>
                                <select class="form-control" id="tema" name="tema">
                                    <option>Default</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Batas Tampilan Produk</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="gayaTema">Gaya Tema</label>
                                <select class="form-control" id="gayaTema" name="gayaTema">
                                    <option>Blue</option>
                                    <option>Black</option>
                                    <option>Green</option>
                                    <option>Yellow</option>
                                    <option>Purple</option>
                                    <option>Red</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="displayKeyboard">Display Keyboard</label>
                                <select class="form-control" id="displayKeyboard" name="displayKeyboard">
                                    <option>No</option>
                                    <option>Yes</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="overselling">Overselling</label>
                                <select class="form-control" id="overselling" name="overselling">
                                    <option>Diaktifkan</option>
                                    <option>Nonaktifkan</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="penambahanBarang">Penambahan Barang</label>
                                <select class="form-control" id="penambahanBarang" name="penambahanBarang">
                                    <option>Tingkatkan Jumlah Item yang Ada</option>
                                    <option>Tambahkan Item Baru</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="beberapaToko">Beberapa Toko</label>
                                <select class="form-control" id="beberapaToko" name="beberapaToko">
                                    <option>Diaktifkan</option>
                                    <option>Nonaktifkan</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="kategoriDefault">Kategori Default</label>
                                <select class="form-control" id="kategoriDefault" name="kategoriDefault">
                                    <option>General</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Kode Mata Uang</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="pelangganDefault">Pelanggan Default</label>
                                <select class="form-control" id="pelangganDefault" name="pelangganDefault">
                                    <option>Walk-in Client</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="tandaTerima">Tanda Terima Cetak Otomatis</label>
                                <select class="form-control" id="tandaTerima" name="tandaTerima">
                                    <option>Nonaktifkan</option>
                                    <option>Diaktifkan</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="timezone">Timezone</label>
                            <select class="form-control" id="timezone" name="timezone">
                                <option value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa</option>
                                <option value="America/Adak">(GMT-10:00) Hawaii-Aleutian</option>
                                <option value="Etc/GMT+10">(GMT-10:00) Hawaii</option>
                                <option value="Pacific/Marquesas">(GMT-09:30) Marquesas Islands</option>
                                <option value="Pacific/Gambier">(GMT-09:00) Gambier Islands</option>
                                <option value="America/Anchorage">(GMT-09:00) Alaska</option>
                                <option value="America/Ensenada">(GMT-08:00) Tijuana, Baja California</option>
                                <option value="Etc/GMT+8">(GMT-08:00) Pitcairn Islands</option>
                                <option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US & Canada)</option>
                                <option value="America/Denver">(GMT-07:00) Mountain Time (US & Canada)</option>
                                <option value="America/Chihuahua">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                <option value="America/Dawson_Creek">(GMT-07:00) Arizona</option>
                                <option value="America/Belize">(GMT-06:00) Saskatchewan, Central America</option>
                                <option value="America/Cancun">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                <option value="Chile/EasterIsland">(GMT-06:00) Easter Island</option>
                                <option value="America/Chicago">(GMT-06:00) Central Time (US & Canada)</option>
                                <option value="America/New_York">(GMT-05:00) Eastern Time (US & Canada)</option>
                                <option value="America/Havana">(GMT-05:00) Cuba</option>
                                <option value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                <option value="America/Caracas">(GMT-04:30) Caracas</option>
                                <option value="America/Santiago">(GMT-04:00) Santiago</option>
                                <option value="America/La_Paz">(GMT-04:00) La Paz</option>
                                <option value="Atlantic/Stanley">(GMT-04:00) Faukland Islands</option>
                                <option value="America/Campo_Grande">(GMT-04:00) Brazil</option>
                                <option value="America/Goose_Bay">(GMT-04:00) Atlantic Time (Goose Bay)</option>
                                <option value="America/Glace_Bay">(GMT-04:00) Atlantic Time (Canada)</option>
                                <option value="America/St_Johns">(GMT-03:30) Newfoundland</option>
                                <option value="America/Araguaina">(GMT-03:00) UTC-3</option>
                                <option value="America/Montevideo">(GMT-03:00) Montevideo</option>
                                <option value="America/Miquelon">(GMT-03:00) Miquelon, St. Pierre</option>
                                <option value="America/Godthab">(GMT-03:00) Greenland</option>
                                <option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires</option>
                                <option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                                <option value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
                                <option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                                <option value="Atlantic/Azores">(GMT-01:00) Azores</option>
                                <option value="Europe/Belfast">(GMT) Greenwich Mean Time : Belfast</option>
                                <option value="Europe/Dublin">(GMT) Greenwich Mean Time : Dublin</option>
                                <option value="Europe/Lisbon">(GMT) Greenwich Mean Time : Lisbon</option>
                                <option value="Europe/London">(GMT) Greenwich Mean Time : London</option>
                                <option value="Africa/Abidjan">(GMT) Monrovia, Reykjavik</option>
                                <option value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                <option value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                <option value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                <option value="Africa/Algiers">(GMT+01:00) West Central Africa</option>
                                <option value="Africa/Windhoek">(GMT+01:00) Windhoek</option>
                                <option value="Asia/Beirut">(GMT+02:00) Beirut</option>
                                <option value="Africa/Cairo">(GMT+02:00) Cairo</option>
                                <option value="Asia/Gaza">(GMT+02:00) Gaza</option>
                                <option value="Africa/Blantyre">(GMT+02:00) Harare, Pretoria</option>
                                <option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                                <option value="Europe/Minsk">(GMT+02:00) Minsk</option>
                                <option value="Asia/Damascus">(GMT+02:00) Syria</option>
                                <option value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                <option value="Africa/Addis_Ababa">(GMT+03:00) Nairobi</option>
                                <option value="Asia/Tehran">(GMT+03:30) Tehran</option>
                                <option value="Asia/Dubai">(GMT+04:00) Abu Dhabi, Muscat</option>
                                <option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                                <option value="Asia/Kabul">(GMT+04:30) Kabul</option>
                                <option value="Asia/Yekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                <option value="Asia/Tashkent">(GMT+05:00) Tashkent</option>
                                <option value="Asia/Kolkata">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                <option value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
                                <option value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
                                <option value="Asia/Novosibirsk">(GMT+06:00) Novosibirsk</option>
                                <option value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)</option>
                                <option value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                <option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                <option value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                <option value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                <option value="Australia/Perth">(GMT+08:00) Perth</option>
                                <option value="Australia/Eucla">(GMT+08:45) Eucla</option>
                                <option value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                <option value="Asia/Seoul">(GMT+09:00) Seoul</option>
                                <option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                                <option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
                                <option value="Australia/Darwin">(GMT+09:30) Darwin</option>
                                <option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
                                <option value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                <option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
                                <option value="Australia/Lord_Howe">(GMT+10:30) Lord Howe Island</option>
                                <option value="Etc/GMT-11">(GMT+11:00) Solomon Is., New Caledonia</option>
                                <option value="Asia/Magadan">(GMT+11:00) Magadan</option>
                                <option value="Pacific/Norfolk">(GMT+11:30) Norfolk Island</option>
                                <option value="Asia/Anadyr">(GMT+12:00) Anadyr, Kamchatka</option>
                                <option value="Pacific/Auckland">(GMT+12:00) Auckland, Wellington</option>
                                <option value="Etc/GMT-12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                <option value="Pacific/Chatham">(GMT+12:45) Chatham Islands</option>
                                <option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                                <option value="Pacific/Kiritimati">(GMT+14:00) Kiritimati</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="halamanPurnaJual">Halaman Purna Jual</label>
                            <select class="form-control" id="halamanPurnaJual" name="halamanPurnaJual">
                                <option>Tanda Terima</option>
                                <option>POS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formatTanggal" class="font-weight-bold">Format Tanggal</label>
                            <input class="form-control" type="text" value="" id="formatTanggal" name="formatTanggal">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diskonDefault" class="font-weight-bold">Diskon Default</label>
                            <input class="form-control" type="text" value="" id="diskonDefault" name="diskonDefault">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formatWaktu" class="font-weight-bold">Format Waktu</label>
                            <input class="form-control" type="text" value="" id="formatWaktu" name="formatWaktu">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pajakPesananDefault" class="font-weight-bold">Pajak Pesanan Default</label>
                            <input class="form-control" type="text" value="" id="pajakPesananDefault" name="pajakPesananDefault">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="emailDefault" class="font-weight-bold">Email default</label>
                            <input class="form-control" type="text" value="" id="emailDefault" name="emailDefault">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="barisPerHalaman">Baris per Halaman</label>
                            <select class="form-control" id="barisPerHalaman" name="barisPerHalaman">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dukunganRTL">Dukungan RTL</label>
                            <select class="form-control" id="dukunganRTL" name="dukunganRTL">
                                <option>Nonaktifkan</option>
                                <option>Diaktifkan</option>
                            </select>
                        </div>
                    </div>
                </div>
                {{-- barcode --}}
                <div class="bg-light p-4 mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">ws barcode type </label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">ws barcode chars </label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">flag chars</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">item code stars</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">item code chars</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">weight stars</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">weight chars</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">weight divide by</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- email --}}
                <div class="bg-light p-4 mb-3">
                    <div class="form-group bg-muted">
                        <label for="namaPelanggan" class="font-weight-bold">Protokol Email</label>
                        <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                    </div>
                </div>
                {{-- DESIMAL --}}
                <div class="bg-light p-4 mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">desimal</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">desimal kuantitas</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">format mata uang</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">pemisah desimal</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">ribuan pemisah</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold"> tampilkan simbol mata uang</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">simbol mata uang</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- STRIPE --}}
                <div class="bg-light p-4 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Stripe</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Stripe Secret Key</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Stripe Kunci yang Dapat Dipublikasikan</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- SHORTKEY --}}
                <div class="bg-light p-4 mb-3">
                    <div class="mb-3">
                        Silakan atur pintasan sesuka Anda, Anda dapat menggunakan F1 - F2 atau kombinasi tombol lainnya dengan Crtl, Alt dan Shift.
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Fokus tambahkan / cari input barang</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Tambahkan Pelanggan</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Toggle Category Slider</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Batalkan Penjualan</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Tangguhkan Penjualan</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Cetak Pesanan</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Cetak Bill</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Finalisasi Penjualan</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Penjualan Hari Ini</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div><div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Tagihan Terbuka</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Tutup Penjualan</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
