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
                        Harap perbarui informasi di bawah ini
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
                            <label for="nama_situs" class="font-weight-bold">Nama situs</label>
                            <input class="form-control" type="text" value="{{$pengaturan->nama_situs}}" id="nama_situs" name="nama_situs">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_pin" class="font-weight-bold">Kode Pin</label>
                            <input class="form-control" type="text" value="{{$pengaturan->kode_pin}}" id="kode_pin" name="kode_pin">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telepon" class="font-weight-bold">Telepon</label>
                            <input class="form-control" type="text" value="{{$pengaturan->telepon}}" id="telepon" name="telepon">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pembulatan" class="font-weight-bold">Pembulatan</label>
                            <select class="form-control" id="pembulatan" value="{{$pengaturan->pembulatan}}" name="pembulatan">
                                <option>Membulatkan ke terdekat 0,05</option>
                                <option>Membulatkan ke terdekat 0,50</option>
                                <option>Membulatkan ke nomor terdekat (integer)</option>
                                <option>Membulatkan ke nomor berikutnya (integer)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="bahasa">Bahasa</label>
                                <select class="form-control" id="bahasa" value="{{$pengaturan->bahasa}}" name="bahasa">
                                    <option>Indonesia</option>
                                    <option>English</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="tampilkan_produk">Tampilkan Produk</label>
                                <select class="form-control" id="tampilkan_produk" value="{{$pengaturan->tampilkan_produk}}" name="tampilkan_produk">
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
                                <select class="form-control" id="tema" value="{{$pengaturan->tema}}" name="tema">
                                    <option>Default</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="batas_tampilan_produk" class="font-weight-bold">Batas Tampilan Produk</label>
                            <input class="form-control" type="text" value="{{$pengaturan->batas_tampilan_produk}}" id="batas_tampilan_produk" name="batas_tampilan_produk">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="gaya_tema">Gaya Tema</label>
                                <select class="form-control" id="gaya_tema" value="{{$pengaturan->gaya_tema}}" name="gaya_tema">
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
                                <label for="display_keyboard">Display Keyboard</label>
                                <select class="form-control" id="display_keyboard" value="{{$pengaturan->display_keyboard}}" name="display_keyboard">
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
                                <select class="form-control" id="overselling" value="{{$pengaturan->overselling}}" name="overselling">
                                    <option>Diaktifkan</option>
                                    <option>Nonaktifkan</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="penambahan_barang">Penambahan Barang</label>
                                <select class="form-control" id="penambahan_barang" value="{{$pengaturan->penambahan_barang}}" name="penambahan_barang">
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
                                <label for="beberapa_toko">Beberapa Toko</label>
                                <select class="form-control" id="beberapa_toko" value="{{$pengaturan->beberapa_toko}}" name="beberapa_toko">
                                    <option>Diaktifkan</option>
                                    <option>Nonaktifkan</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="kategori_default">Kategori Default</label>
                                <select class="form-control" id="kategori_default" value="{{$pengaturan->kategori_default}}" name="kategori_default">
                                    <option>Pilih Kategori Default</option>
                                    <option>General</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_mata_uang" class="font-weight-bold">Kode Mata Uang</label>
                            <input class="form-control" type="text" value="" id="kode_mata_uang" value="{{$pengaturan->kode_mata_uang}}" name="kode_mata_uang">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="pelanggan_default">Pelanggan Default</label>
                                <select class="form-control" id="pelanggan_default" value="{{$pengaturan->pelanggan_default}}" name="pelanggan_default">
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
                                <label for="tanda_terima_cetak_otomatis">Tanda Terima Cetak Otomatis</label>
                                <select class="form-control" id="tanda_terima_cetak_otomatis" value="{{$pengaturan->tanda_terima_cetak_otomatis}}" name="tanda_terima_cetak_otomatis">
                                    <option>Nonaktifkan</option>
                                    <option>Diaktifkan</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="timezone">Timezone</label>
                            <select class="form-control" id="timezone" value="{{$pengaturan->timezone}}" name="timezone">
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
                            <label for="halaman_purna_jual">Halaman Purna Jual</label>
                            <select class="form-control" id="halaman_purna_jual" value="{{$pengaturan->halaman_purna_jual}}" name="halaman_purna_jual">
                                <option>Tanda Terima</option>
                                <option>POS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="format_tanggal" class="font-weight-bold">Format Tanggal</label>
                            <input class="form-control" type="date" value="{{$pengaturan->format_tanggal}}" id="format_tanggal" name="format_tanggal">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diskon_default" class="font-weight-bold">Diskon Default</label>
                            <input class="form-control" type="text" value="{{$pengaturan->diskon_default}}" id="diskon_default" name="diskon_default">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="format_waktu" class="font-weight-bold">Format Waktu</label>
                            <input class="form-control" type="text" value="{{$pengaturan->format_waktu}}" id="format_waktu" name="format_waktu">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pajak_pesanan_default" class="font-weight-bold">Pajak Pesanan Default</label>
                            <input class="form-control" type="text" value="{{$pengaturan->pajak_pesanan_default}}" id="pajak_pesanan_default" name="pajak_pesanan_default">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_default" class="font-weight-bold">Email default</label>
                            <input class="form-control" type="text" value="{{$pengaturan->email_default}}" id="email_default" name="email_default">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="baris_per_halaman">Baris per Halaman</label>
                            <select class="form-control" id="baris_per_halaman" value="{{$pengaturan->baris_per_halaman}}" name="baris_per_halaman">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dukungan_rtl">Dukungan RTL</label>
                            <select class="form-control" id="dukungan_rtl" value="{{$pengaturan->dukungan_rtl}}" name="dukungan_rtl">
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
                                <label for="ws_barcode_type" class="font-weight-bold">ws barcode type </label>
                                <input class="form-control" type="text" value="{{$pengaturan->ws_barcode_type}}" id="ws_barcode_type" name="ws_barcode_type">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ws_barcode_chars" class="font-weight-bold">ws barcode chars </label>
                                <select class="form-control" id="ws_barcode_chars" value="{{$pengaturan->ws_barcode_chars}}" name="ws_barcode_chars">
                                    <option>Weight qty</option>
                                    <option>Harga</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="flag_chars" class="font-weight-bold">flag chars</label>
                                <input class="form-control" type="text" value="{{$pengaturan->flag_chars}}" id="flag_chars" name="flag_chars">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_code_stars" class="font-weight-bold">item code stars</label>
                                <input class="form-control" type="text" value="{{$pengaturan->item_code_stars}}" id="item_code_stars" name="item_code_stars">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_code_chars" class="font-weight-bold">item code chars</label>
                                <input class="form-control" type="text" value="{{$pengaturan->item_code_chars}}" id="item_code_chars" name="item_code_chars">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="weight_stars" class="font-weight-bold">weight stars</label>
                                <input class="form-control" type="text" value="{{$pengaturan->weight_stars}}" id="weight_stars" name="weight_stars">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="weight_chars" class="font-weight-bold">weight chars</label>
                                <input class="form-control" type="text" value="{{$pengaturan->weight_chars}}" id="weight_chars" name="weight_chars">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="weight_divide_by" class="font-weight-bold">weight divide by</label>
                                <input class="form-control" type="text" value="{{$pengaturan->weight_devide_by}}" id="weight_divide_by" name="weight_divide_by">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- email --}}
                <div class="bg-light p-4 mb-3">
                    <div class="form-group bg-muted">
                        <label for="protokol_email" class="font-weight-bold">Protokol Email</label>
                        <select class="form-control" id="protokol_email" value="{{$pengaturan->protokol_email}}" name="protokol_email">
                            <option>PHP Mail Function</option>
                            <option>Send Mail</option>
                            <option>SMTP</option>
                        </select>
                    </div>
                </div>
                {{-- DESIMAL --}}
                <div class="bg-light p-4 mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="desimal" class="font-weight-bold">desimal</label>
                                <select class="form-control" id="desimal" value="{{$pengaturan->desimal}}" name="desimal">
                                    <option>Nonaktifkan</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="desimal_kuantitas" class="font-weight-bold">desimal kuantitas</label>
                                <select class="form-control" id="desimal_kuantitas" value="{{$pengaturan->desimal_kuantitas}}" name="desimal_kuantitas">
                                    <option>Nonaktifkan</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="format_mata_uang" class="font-weight-bold">format mata uang</label>
                                <select class="form-control" id="format_mata_uang" value="{{$pengaturan->format_mata_uang}}" name="format_mata_uang">
                                    <option>Nonaktifkan</option>
                                    <option>Diaktifkan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pemisah_desimal" class="font-weight-bold">pemisah desimal</label>
                                <select class="form-control" id="pemisah_desimal" value="{{$pengaturan->pemisah_desimal}}" name="pemisah_desimal">
                                    <option>Dot(.)</option>
                                    <option>Koma(,)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ribuan_pemisah" class="font-weight-bold">ribuan pemisah</label>
                                <select class="form-control" id="ribuan_pemisah" value="{{$pengaturan->ribuan_pemisah}}" name="ribuan_pemisah">
                                    <option>Dot(.)</option>
                                    <option>Koma(,)</option>
                                    <option>Spasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tampilkan_simbol_mata_uang" class="font-weight-bold"> tampilkan simbol mata uang</label>
                                <select class="form-control" id="tampilkan_simbol_mata_uang" value="{{$pengaturan->tampilkan_simbol_mata_uang}}" name="tampilkan_simbol_mata_uang">
                                    <option>Nonaktifkan</option>
                                    <option>Sebelum</option>
                                    <option>Setelah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="simbol_mata_uang" class="font-weight-bold">simbol mata uang</label>
                                <input class="form-control" type="text" id="simbol_mata_uang" value="{{$pengaturan->simbol_mata_uang}}" name="simbol_mata_uang">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- STRIPE --}}
                <div class="bg-light p-4 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stripe" class="font-weight-bold">Stripe</label>
                                <select class="form-control" id="stripe" value="{{$pengaturan->stripe}}" name="stripe">
                                    <option>Nonaktifkan</option>
                                    <option>Diaktifkan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stripe_secret_key" class="font-weight-bold">Stripe Secret Key</label>
                                <input class="form-control" type="text" value="{{$pengaturan->stripe_secret_key}}" id="stripe_secret_key" name="stripe_secret_key">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stripe_kunci_yang_dapat_dipublikasikan" class="font-weight-bold">Stripe Kunci yang Dapat Dipublikasikan</label>
                                <input class="form-control" type="text" value="{{$pengaturan->stripe_kunci_yang_dapat_dipublikasikan}}" id="stripe_kunci_yang_dapat_dipublikasikan" name="stripe_kunci_yang_dapat_dipublikasikan">
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
                                <label for="fokus_tambahkan_cari_input_barang" class="font-weight-bold">Fokus tambahkan / cari input barang</label>
                                <input class="form-control" type="text" value="{{$pengaturan->fokus_tambahkan_cari_input_barang}}" id="fokus_tambahkan_cari_input_barang" name="fokus_tambahkan_cari_input_barang">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tambahkan_pelanggan" class="font-weight-bold">Tambahkan Pelanggan</label>
                                <input class="form-control" type="text" value="{{$pengaturan->tambahkan_pelanggan}}" id="tambahkan_pelanggan" name="tambahkan_pelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="toggle_category_slider" class="font-weight-bold">Toggle Category Slider</label>
                                <input class="form-control" type="text" value="{{$pengaturan->toggle_category_slider}}" id="toggle_category_slider" name="toggle_category_slider">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="batalkan_penjualan" class="font-weight-bold">Batalkan Penjualan</label>
                                <input class="form-control" type="text" value="{{$pengaturan->batalkan_penjualan}}" id="batalkan_penjualan" name="batalkan_penjualan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tangguhkan_penjualan" class="font-weight-bold">Tangguhkan Penjualan</label>
                                <input class="form-control" type="text" value="{{$pengaturan->tangguhkan_penjualan}}" id="tangguhkan_penjualan" name="tangguhkan_penjualan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cetak_pesanan" class="font-weight-bold">Cetak Pesanan</label>
                                <input class="form-control" type="text" value="{{$pengaturan->cetak_pesanan}}" id="cetak_pesanan" name="cetak_pesanan">
                            </div>cetakPesanan
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cetak_bill" class="font-weight-bold">Cetak Bill</label>
                                <input class="form-control" type="text" value="{{$pengaturan->cetak_bill}}" id="cetak_bill" name="cetak_bill">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="finalisasi_penjualan" class="font-weight-bold">Finalisasi Penjualan</label>
                                <input class="form-control" type="text" value="{{$pengaturan->finalisasi_penjualan}}" id="finalisasi_penjualan" name="finalisasi_penjualan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="penjualan_hari_ini" class="font-weight-bold">Penjualan Hari Ini</label>
                                <input class="form-control" type="text" value="{{$pengaturan->penjualan_hari_ini}}" id="penjualan_hari_ini" name="penjualan_hari_ini">
                            </div>
                        </div><div class="col-md-4">
                            <div class="form-group">
                                <label for="tagihan_terbuka" class="font-weight-bold">Tagihan Terbuka</label>
                                <input class="form-control" type="text" value="{{$pengaturan->tagihan_terbuka}}" id="tagihan_terbuka" name="tagihan_terbuka">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tutup_penjualan" class="font-weight-bold">Tutup Penjualan</label>
                                <input class="form-control" type="text" value="{{$pengaturan->tutup_penjualan}}" id="tutup_penjualan" name="tutup_penjualan">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">

    (function () {
            'use strict';
            $('.input-file').each(function () {
                var $input = $(this),
                    $label = $input.next('.js-labelFile'),
                    labelVal = $label.html();

                $input.on('change', function (element) {
                    var fileName = '';
                    if (element.target.value) fileName = element.target.value.split('\\').pop();
                    fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label
                        .removeClass('has-file').html(labelVal);
                });
            });
        })();

        function tampilkanPreview(gambar, idpreview) {
            $('#result').attr({
            'src': '-',
            'alt': ''
            });
            var gb = gambar.files;
            for (var i = 0; i < gb.length; i++) {
                var gbPreview = gb[i];
                var imageType = /image.*/;
                var preview = document.getElementById(idpreview);
                var reader = new FileReader();
                if (gbPreview.type.match(imageType)) {
                    preview.file = gbPreview;
                    reader.onload = (function (element) {
                        return function (e) {
                            element.src = e.target.result;
                        };
                    })(preview);
                    reader.readAsDataURL(gbPreview);
                    console.log(element.src);
                } else {
                    $.confirm({
                        title: '',
                        content: 'Tipe file tidak boleh! harus format gambar (png, jpg)',
                        icon: 'icon icon-close',
                        theme: 'modern',
                        closeIcon: true,
                        animation: 'scale',
                        type: 'red',
                        buttons: {
                            ok: {
                                text: "ok!",
                                btnClass: 'btn-primary',
                                keys: ['enter'],
                                action: add()
                            }
                        }
                    });
                }
            }
        }

        function add(){
            save_method = "add";
            $('#form').trigger('reset');
            $('#formTitle').html('Tambah Data');
            $('input[name=_method]').val('POST');
            $('#txtAction').html('');
            $('#reset').show();
            $('#name').focus();
            $('#result').attr({
                'src': '-',
                'alt': ''
            });
            $('#changeText').html('Browse Image');
            $('#preview').attr({
            'src': '-',
            'alt': ''
            });
        }
</script>
@endsection
