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
            <form method="POST" enctype="multipart/form-data" action="/pengaturan/{{$pengaturan->id}}">
                @method('PATCH')
                @csrf
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
                                <option value="Membulatkan ke terdekat 0,05" {{ $pengaturan->pembulatan == 'Membulatkan ke terdekat 0,05' ? 'selected' : '' }}>Membulatkan ke terdekat 0,05</option>
                                <option value="Membulatkan ke terdekat 0,50" {{ $pengaturan->pembulatan == 'Membulatkan ke terdekat 0,50' ? 'selected' : '' }}>Membulatkan ke terdekat 0,50</option>
                                <option value="Membulatkan ke nomor terdekat (integer)" {{ $pengaturan->pembulatan == 'Membulatkan ke nomor terdekat (integer)' ? 'selected' : '' }}>Membulatkan ke nomor terdekat (integer)</option>
                                <option value="Membulatkan ke nomor berikutnya (integer)" {{ $pengaturan->pembulatan == 'Membulatkan ke nomor berikutnya (integer)' ? 'selected' : '' }}>Membulatkan ke nomor berikutnya (integer)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="bahasa">Bahasa</label>
                                <select class="form-control" id="bahasa" value="{{$pengaturan->bahasa}}" name="bahasa">
                                    <option value="Indonesia" {{ $pengaturan->bahasa == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                    <option value="English" {{ $pengaturan->bahasa == 'English' ? 'selected' : '' }}>English</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="tampilkan_produk">Tampilkan Produk</label>
                                <select class="form-control" id="tampilkan_produk" value="{{$pengaturan->tampilkan_produk}}" name="tampilkan_produk">
                                    <option value="Nama" {{ $pengaturan->tampilkan_produk == 'Nama' ? 'selected' : '' }}>Nama</option>
                                    <option value="Photo" {{ $pengaturan->tampilkan_produk == 'Photo' ? 'selected' : '' }}>Photo</option>
                                    <option value="Both" {{ $pengaturan->tampilkan_produk == 'Both' ? 'selected' : '' }}>Both</option>
                                </select>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="tema">Tema</label>
                                <select class="form-control" id="tema" value="{{$pengaturan->tema}}" name="tema">
                                    <option>Default</option>
                                </select>
                            </div>
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
                            <div class="form-group">
                                <label for="gaya_tema">Gaya Tema</label>
                                <select class="form-control" id="gaya_tema" value="{{$pengaturan->gaya_tema}}" name="gaya_tema">
                                    <option value="blue" {{ $pengaturan->gaya_tema == 'blue' ? 'selected' : '' }}>Blue</option>
                                    <option value="black" {{ $pengaturan->gaya_tema == 'black' ? 'selected' : '' }}>Black</option>
                                    <option value="green" {{ $pengaturan->gaya_tema == 'green' ? 'selected' : '' }}>Green</option>
                                    <option value="yellow" {{ $pengaturan->gaya_tema == 'yellow' ? 'selected' : '' }}>Yellow</option>
                                    <option value="purple" {{ $pengaturan->gaya_tema == 'purple' ? 'selected' : '' }}>Purple</option>
                                    <option value="red" {{ $pengaturan->gaya_tema == 'red' ? 'selected' : '' }}>Red</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_keyboard">Display Keyboard</label>
                                <select class="form-control" id="display_keyboard" value="{{$pengaturan->display_keyboard}}" name="display_keyboard">
                                    <option value="No" {{ $pengaturan->display_keyboard == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Yes" {{ $pengaturan->display_keyboard == 'Yes' ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="overselling">Overselling</label>
                                <select class="form-control" id="overselling" value="{{$pengaturan->overselling}}" name="overselling">
                                    <option value="Diaktifkan" {{ $pengaturan->overselling == 'Diaktifkan' ? 'selected' : '' }}>Diaktifkan</option>
                                    <option value="Nonaktifkan" {{ $pengaturan->overselling == 'Nonaktifkan' ? 'selected' : '' }}>Nonaktifkan</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="penambahan_barang">Penambahan Barang</label>
                                <select class="form-control" id="penambahan_barang" value="{{$pengaturan->penambahan_barang}}" name="penambahan_barang">
                                    <option value="Tingkatkan Jumlah Item yang Ada" {{ $pengaturan->penambahan_barang == 'Tingkatkan Jumlah Item yang Ada' ? 'selected' : '' }}>Tingkatkan Jumlah Item yang Ada</option>
                                    <option value="Tambahkan Item Baru" {{ $pengaturan->penambahan_barang == 'Tambahkan Item Baru' ? 'selected' : '' }}>Tambahkan Item Baru</option>
                                </select>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="beberapa_toko">Beberapa Toko</label>
                                <select class="form-control" id="beberapa_toko" value="{{$pengaturan->beberapa_toko}}" name="beberapa_toko">
                                    <option value="Diaktifkan" {{ $pengaturan->beberapa_toko == 'Diaktifkan' ? 'selected' : '' }}>Diaktifkan</option>
                                    <option value="Nonaktifkan" {{ $pengaturan->beberapa_toko == 'Nonaktifkan' ? 'selected' : '' }}>Nonaktifkan</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="kategori_default">Kategori Default</label>
                                <select class="form-control" id="kategori_default" value="{{$pengaturan->kategori_default}}" name="kategori_default">
                                    <option value="Pilih Kategori Default" {{ $pengaturan->kategori_default == 'Pilih Kategori Default' ? 'selected' : '' }}>Pilih Kategori Default</option>
                                    <option value="General" {{ $pengaturan->kategori_default == 'General' ? 'selected' : '' }}>General</option>
                                </select>
                            </div>
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
                            <div class="form-group">
                                <label for="pelanggan_default">Pelanggan Default</label>
                                <select class="form-control" id="pelanggan_default" value="{{$pengaturan->pelanggan_default}}" name="pelanggan_default">
                                    <option>Walk-in Client</option>
                                </select>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanda_terima_cetak_otomatis">Tanda Terima Cetak Otomatis</label>
                                <select class="form-control" id="tanda_terima_cetak_otomatis" value="{{$pengaturan->tanda_terima_cetak_otomatis}}" name="tanda_terima_cetak_otomatis">
                                    <option value="Diaktifkan" {{ $pengaturan->tanda_terima_cetak_otomatis == 'Diaktifkan' ? 'selected' : '' }}>Diaktifkan</option>
                                    <option value="Nonaktifkan" {{ $pengaturan->tanda_terima_cetak_otomatis == 'Nonaktifkan' ? 'selected' : '' }}>Nonaktifkan</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="timezone">Timezone</label>
                            <select class="form-control" id="timezone" value="{{$pengaturan->timezone}}" name="timezone">
                                <option value="(GMT-11:00) Midway Island, Samoa" {{ $pengaturan->timezone == '(GMT-11:00) Midway Island, Samoa' ? 'selected' : '' }}>(GMT-11:00) Midway Island, Samoa</option>
                                <option value="(GMT-10:00) Hawaii-Aleutian" {{ $pengaturan->timezone == '(GMT-10:00) Hawaii-Aleutian' ? 'selected' : '' }}>(GMT-10:00) Hawaii-Aleutian</option>
                                <option value="(GMT-10:00) Hawaii" {{ $pengaturan->timezone == '(GMT-10:00) Hawaii' ? 'selected' : '' }}>(GMT-10:00) Hawaii</option>
                                <option value="(GMT-09:30) Marquesas Islands" {{ $pengaturan->timezone == '(GMT-09:30) Marquesas Islands' ? 'selected' : '' }}>(GMT-09:30) Marquesas Islands</option>
                                <option value="(GMT-09:00) Gambier Islands" {{ $pengaturan->timezone == '(GMT-09:00) Gambier Islands' ? 'selected' : '' }}>(GMT-09:00) Gambier Islands</option>
                                <option value="(GMT-09:00) Alaska" {{ $pengaturan->timezone == '(GMT-09:00) Alaska' ? 'selected' : '' }}>(GMT-09:00) Alaska</option>
                                <option value="(GMT-08:00) Tijuana, Baja California" {{ $pengaturan->timezone == '(GMT-08:00) Tijuana, Baja California' ? 'selected' : '' }}>(GMT-08:00) Tijuana, Baja California</option>
                                <option value="(GMT-08:00) Pitcairn Islands" {{ $pengaturan->timezone == '(GMT-08:00) Pitcairn Islands' ? 'selected' : '' }}>(GMT-08:00) Pitcairn Islands</option>
                                <option value="(GMT-08:00) Pacific Time (US & Canada)" {{ $pengaturan->timezone == '(GMT-08:00) Pacific Time (US & Canada)' ? 'selected' : '' }}>(GMT-08:00) Pacific Time (US & Canada)</option>
                                <option value="(GMT-07:00) Mountain Time (US & Canada)" {{ $pengaturan->timezone == '(GMT-07:00) Mountain Time (US & Canada)' ? 'selected' : '' }}>(GMT-07:00) Mountain Time (US & Canada)</option>
                                <option value="(GMT-07:00) Chihuahua, La Paz, Mazatlan" {{ $pengaturan->timezone == '(GMT-07:00) Chihuahua, La Paz, Mazatlan' ? 'selected' : '' }}>(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                <option value="(GMT-07:00) Arizona" {{ $pengaturan->timezone == '(GMT-07:00) Arizona' ? 'selected' : '' }}>(GMT-07:00) Arizona</option>
                                <option value="(GMT-06:00) Saskatchewan, Central America" {{ $pengaturan->timezone == '(GMT-06:00) Saskatchewan, Central America' ? 'selected' : '' }}>(GMT-06:00) Saskatchewan, Central America</option>
                                <option value="(GMT-06:00) Guadalajara, Mexico City, Monterrey" {{ $pengaturan->timezone == '(GMT-06:00) Guadalajara, Mexico City, Monterrey' ? 'selected' : '' }}>(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                <option value="(GMT-06:00) Easter Island" {{ $pengaturan->timezone == '(GMT-06:00) Easter Island' ? 'selected' : '' }}>(GMT-06:00) Easter Island</option>
                                <option value="(GMT-06:00) Central Time (US & Canada)" {{ $pengaturan->timezone == '(GMT-06:00) Central Time (US & Canada)' ? 'selected' : '' }}>(GMT-06:00) Central Time (US & Canada)</option>
                                <option value="(GMT-05:00) Eastern Time (US & Canada)" {{ $pengaturan->timezone == '(GMT-05:00) Eastern Time (US & Canada)' ? 'selected' : '' }}>(GMT-05:00) Eastern Time (US & Canada)</option>
                                <option value="(GMT-05:00) Cuba" {{ $pengaturan->timezone == '(GMT-05:00) Cuba' ? 'selected' : '' }}>(GMT-05:00) Cuba</option>
                                <option value="(GMT-05:00) Bogota, Lima, Quito, Rio Branco" {{ $pengaturan->timezone == '(GMT-05:00) Bogota, Lima, Quito, Rio Branco' ? 'selected' : '' }}>(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                <option value="(GMT-04:30) Caracas" {{ $pengaturan->timezone == '(GMT-04:30) Caracas' ? 'selected' : '' }}>(GMT-04:30) Caracas</option>
                                <option value="(GMT-04:00) Santiago" {{ $pengaturan->timezone == '(GMT-04:00) Santiago' ? 'selected' : '' }}>(GMT-04:00) Santiago</option>
                                <option value="(GMT-04:00) La Paz" {{ $pengaturan->timezone == '(GMT-04:00) La Paz' ? 'selected' : '' }}>(GMT-04:00) La Paz</option>
                                <option value="(GMT-04:00) Faukland Islands" {{ $pengaturan->timezone == '(GMT-04:00) Faukland Islands' ? 'selected' : '' }}>(GMT-04:00) Faukland Islands</option>
                                <option value="(GMT-04:00) Brazil" {{ $pengaturan->timezone == '(GMT-04:00) Brazil' ? 'selected' : '' }}>(GMT-04:00) Brazil</option>
                                <option value="(GMT-04:00) Atlantic Time (Goose Bay)" {{ $pengaturan->timezone == '(GMT-04:00) Atlantic Time (Goose Bay)' ? 'selected' : '' }}>(GMT-04:00) Atlantic Time (Goose Bay)</option>
                                <option value="(GMT-04:00) Atlantic Time (Canada)" {{ $pengaturan->timezone == '(GMT-04:00) Atlantic Time (Canada)' ? 'selected' : '' }}>(GMT-04:00) Atlantic Time (Canada)</option>
                                <option value="(GMT-03:30) Newfoundland" {{ $pengaturan->timezone == '(GMT-03:30) Newfoundland' ? 'selected' : '' }}>(GMT-03:30) Newfoundland</option>
                                <option value="(GMT-03:00) UTC-3" {{ $pengaturan->timezone == '(GMT-03:00) UTC-3' ? 'selected' : '' }}>(GMT-03:00) UTC-3</option>
                                <option value="(GMT-03:00) Montevideo" {{ $pengaturan->timezone == '(GMT-03:00) Montevideo' ? 'selected' : '' }}>(GMT-03:00) Montevideo</option>
                                <option value="(GMT-03:00) Miquelon, St. Pierre" {{ $pengaturan->timezone == '(GMT-03:00) Miquelon, St. Pierre' ? 'selected' : '' }}>(GMT-03:00) Miquelon, St. Pierre</option>
                                <option value="(GMT-03:00) Greenland" {{ $pengaturan->timezone == '(GMT-03:00) Greenland' ? 'selected' : '' }}>(GMT-03:00) Greenland</option>
                                <option value="(GMT-03:00) Buenos Aire" {{ $pengaturan->timezone == '(GMT-03:00) Buenos Aire' ? 'selected' : '' }}>(GMT-03:00) Buenos Aires</option>
                                <option value="(GMT-03:00) Brasilia" {{ $pengaturan->timezone == '(GMT-03:00) Brasilia' ? 'selected' : '' }}>(GMT-03:00) Brasilia</option>
                                <option value="(GMT-02:00) Mid-Atlantic" {{ $pengaturan->timezone == '(GMT-02:00) Mid-Atlantic' ? 'selected' : '' }}>(GMT-02:00) Mid-Atlantic</option>
                                <option value="(GMT-01:00) Cape Verde Is." {{ $pengaturan->timezone == '(GMT-01:00) Cape Verde Is.' ? 'selected' : '' }}>(GMT-01:00) Cape Verde Is.</option>
                                <option value="(GMT-01:00) Azores" {{ $pengaturan->timezone == '(GMT-01:00) Azores' ? 'selected' : '' }}>(GMT-01:00) Azores</option>
                                <option value="(GMT) Greenwich Mean Time : Belfast" {{ $pengaturan->timezone == '(GMT) Greenwich Mean Time : Belfast' ? 'selected' : '' }}>(GMT) Greenwich Mean Time : Belfast</option>
                                <option value="(GMT) Greenwich Mean Time : Dublin" {{ $pengaturan->timezone == '(GMT) Greenwich Mean Time : Dublin' ? 'selected' : '' }}>(GMT) Greenwich Mean Time : Dublin</option>
                                <option value="(GMT) Greenwich Mean Time : Lisbon" {{ $pengaturan->timezone == '(GMT) Greenwich Mean Time : Lisbon' ? 'selected' : '' }}>(GMT) Greenwich Mean Time : Lisbon</option>
                                <option value="(GMT) Greenwich Mean Time : London" {{ $pengaturan->timezone == '(GMT) Greenwich Mean Time : London' ? 'selected' : '' }}>(GMT) Greenwich Mean Time : London</option>
                                <option value="(GMT) Monrovia, Reykjavik" {{ $pengaturan->timezone == '(GMT) Monrovia, Reykjavik' ? 'selected' : '' }}>(GMT) Monrovia, Reykjavik</option>
                                <option value="(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna" {{ $pengaturan->timezone == '(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna' ? 'selected' : '' }}>(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                <option value="(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague" {{ $pengaturan->timezone == '(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague' ? 'selected' : '' }}>(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                <option value="(GMT+01:00) Brussels, Copenhagen, Madrid, Paris" {{ $pengaturan->timezone == '(GMT+01:00) Brussels, Copenhagen, Madrid, Paris' ? 'selected' : '' }}>(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                <option value="(GMT+01:00) West Central Africa" {{ $pengaturan->timezone == '(GMT+01:00) West Central Africa' ? 'selected' : '' }}>(GMT+01:00) West Central Africa</option>
                                <option value="(GMT+01:00) Windhoek" {{ $pengaturan->timezone == '(GMT+01:00) Windhoek' ? 'selected' : '' }}>(GMT+01:00) Windhoek</option>
                                <option value="(GMT+02:00) Beirut" {{ $pengaturan->timezone == '(GMT+02:00) Beirut' ? 'selected' : '' }}>(GMT+02:00) Beirut</option>
                                <<option value="(GMT+02:00) Cairo" {{ $pengaturan->timezone == '(GMT+02:00) Cairo' ? 'selected' : '' }}>(GMT+02:00) Cairo</option>
                                <option value="(GMT+02:00) Gaza" {{ $pengaturan->timezone == '(GMT+02:00) Gaza' ? 'selected' : '' }}>(GMT+02:00) Gaza</option>
                                <option value="(GMT+02:00) Harare, Pretoria" {{ $pengaturan->timezone == '(GMT+02:00) Harare, Pretoria' ? 'selected' : '' }}>(GMT+02:00) Harare, Pretoria</option>
                                <option value="(GMT+02:00) Jerusalem" {{ $pengaturan->timezone == '(GMT+02:00) Jerusalem' ? 'selected' : '' }}>(GMT+02:00) Jerusalem</option>
                                <option value="(GMT+02:00) Minsk" {{ $pengaturan->timezone == '(GMT+02:00) Minsk' ? 'selected' : '' }}>(GMT+02:00) Minsk</option>
                                <option value="(GMT+02:00) Syria" {{ $pengaturan->timezone == '(GMT+02:00) Syria' ? 'selected' : '' }}>(GMT+02:00) Syria</option>
                                <option value="(GMT+03:00) Moscow, St. Petersburg, Volgograd" {{ $pengaturan->timezone == '(GMT+03:00) Moscow, St. Petersburg, Volgograd' ? 'selected' : '' }}>(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                <option value="(GMT+03:00) Nairobi" {{ $pengaturan->timezone == '(GMT+03:00) Nairobi' ? 'selected' : '' }}>(GMT+03:00) Nairobi</option>
                                <option value="(GMT+03:30) Tehran" {{ $pengaturan->timezone == '(GMT+03:30) Tehran' ? 'selected' : '' }}>(GMT+03:30) Tehran</option>
                                <option value="(GMT+04:00) Abu Dhabi, Muscat" {{ $pengaturan->timezone == '(GMT+04:00) Abu Dhabi, Muscat' ? 'selected' : '' }}>(GMT+04:00) Abu Dhabi, Muscat</option>
                                <option value="(GMT+04:00) Yerevan" {{ $pengaturan->timezone == '(GMT+04:00) Yerevan' ? 'selected' : '' }}>(GMT+04:00) Yerevan</option>
                                <option value="(GMT+04:30) Kabul" {{ $pengaturan->timezone == '(GMT+04:30) Kabul' ? 'selected' : '' }}>(GMT+04:30) Kabul</option>
                                <option value="(GMT+05:00) Ekaterinburg" {{ $pengaturan->timezone == '(GMT+05:00) Ekaterinburg' ? 'selected' : '' }}>(GMT+05:00) Ekaterinburg</option>
                                <option value="(GMT+05:00) Tashkent" {{ $pengaturan->timezone == '(GMT+05:00) Tashkent' ? 'selected' : '' }}>(GMT+05:00) Tashkent</option>
                                <option value="(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi" {{ $pengaturan->timezone == '(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi' ? 'selected' : '' }}>(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                <option value="(GMT+05:45) Kathmandu" {{ $pengaturan->timezone == '(GMT+05:45) Kathmandu' ? 'selected' : '' }}>(GMT+05:45) Kathmandu</option>
                                <option value="(GMT+06:00) Astana, Dhaka" {{ $pengaturan->timezone == '(GMT+06:00) Astana, Dhaka' ? 'selected' : '' }}>(GMT+06:00) Astana, Dhaka</option>
                                <option value="(GMT+06:00) Novosibirsk" {{ $pengaturan->timezone == '(GMT+06:00) Novosibirsk' ? 'selected' : '' }}>(GMT+06:00) Novosibirsk</option>
                                <option value="(GMT+06:30) Yangon (Rangoon)" {{ $pengaturan->timezone == '(GMT+06:30) Yangon (Rangoon)' ? 'selected' : '' }}>(GMT+06:30) Yangon (Rangoon)</option>
                                <option value="(GMT+07:00) Bangkok, Hanoi, Jakarta" {{ $pengaturan->timezone == '(GMT+07:00) Bangkok, Hanoi, Jakarta' ? 'selected' : '' }}>(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                <option value="(GMT+07:00) Krasnoyarsk" {{ $pengaturan->timezone == '(GMT+07:00) Krasnoyarsk' ? 'selected' : '' }}>(GMT+07:00) Krasnoyarsk</option>
                                <option value="(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi" {{ $pengaturan->timezone == '(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi' ? 'selected' : '' }}>(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                <option value="(GMT+08:00) Irkutsk, Ulaan Bataar" {{ $pengaturan->timezone == '(GMT+08:00) Irkutsk, Ulaan Bataar' ? 'selected' : '' }}>(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                <option value="(GMT+08:00) Perth" {{ $pengaturan->timezone == '(GMT+08:00) Perth' ? 'selected' : '' }}>(GMT+08:00) Perth</option>
                                <option value="(GMT+08:45) Eucla" {{ $pengaturan->timezone == '(GMT+08:45) Eucla' ? 'selected' : '' }}>(GMT+08:45) Eucla</option>
                                <option value="(GMT+09:00) Osaka, Sapporo, Tokyo" {{ $pengaturan->timezone == '(GMT+09:00) Osaka, Sapporo, Tokyo' ? 'selected' : '' }}>(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                <option value="(GMT+09:00) Seoul" {{ $pengaturan->timezone == '(GMT+09:00) Seoul' ? 'selected' : '' }}>(GMT+09:00) Seoul</option>
                                <option value="(GMT+09:00) Yakutsk" {{ $pengaturan->timezone == '(GMT+09:00) Yakutsk' ? 'selected' : '' }}>(GMT+09:00) Yakutsk</option>
                                <option value="(GMT+09:30) Adelaide" {{ $pengaturan->timezone == '(GMT+09:30) Adelaide' ? 'selected' : '' }}>(GMT+09:30) Adelaide</option>
                                <option value="(GMT+09:30) Darwin" {{ $pengaturan->timezone == '(GMT+09:30) Darwin' ? 'selected' : '' }}>(GMT+09:30) Darwin</option>
                                <option value="(GMT+10:00) Brisbane" {{ $pengaturan->timezone == '(GMT+10:00) Brisbane' ? 'selected' : '' }}>(GMT+10:00) Brisbane</option>
                                <option value="(GMT+10:00) Hobart" {{ $pengaturan->timezone == '(GMT+10:00) Hobart' ? 'selected' : '' }}>(GMT+10:00) Hobart</option>
                                <option value="(GMT+10:00) Vladivostok" {{ $pengaturan->timezone == '(GMT+10:00) Vladivostok' ? 'selected' : '' }}>(GMT+10:00) Vladivostok</option>
                                <option value="(GMT+10:30) Lord Howe Island" {{ $pengaturan->timezone == '(GMT+10:30) Lord Howe Island' ? 'selected' : '' }}>(GMT+10:30) Lord Howe Island</option>
                                <option value="(GMT+11:00) Solomon Is., New Caledonia" {{ $pengaturan->timezone == '(GMT+11:00) Solomon Is., New Caledonia' ? 'selected' : '' }}>(GMT+11:00) Solomon Is., New Caledonia</option>
                                <option value="(GMT+11:00) Magadan" {{ $pengaturan->timezone == '(GMT+11:00) Magadan' ? 'selected' : '' }}>(GMT+11:00) Magadan</option>
                                <option value="(GMT+11:30) Norfolk Island" {{ $pengaturan->timezone == '(GMT+11:30) Norfolk Island' ? 'selected' : '' }}>(GMT+11:30) Norfolk Island</option>
                                <option value="(GMT+12:00) Anadyr, Kamchatka" {{ $pengaturan->timezone == '(GMT+12:00) Anadyr, Kamchatka' ? 'selected' : '' }}>(GMT+12:00) Anadyr, Kamchatka</option>
                                <option value="(GMT+12:00) Auckland, Wellington" {{ $pengaturan->timezone == '(GMT+12:00) Auckland, Wellington' ? 'selected' : '' }}>(GMT+12:00) Auckland, Wellington</option>
                                <option value="(GMT+12:00) Fiji, Kamchatka, Marshall Is." {{ $pengaturan->timezone == '(GMT+12:00) Fiji, Kamchatka, Marshall Is.' ? 'selected' : '' }}>(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                <option value="(GMT+12:45) Chatham Islands" {{ $pengaturan->timezone == '(GMT+12:45) Chatham Islands' ? 'selected' : '' }}>(GMT+12:45) Chatham Islands</option>
                                <option value="(GMT+13:00) Nukualofa" {{ $pengaturan->timezone == '(GMT+13:00) Nukualofa' ? 'selected' : '' }}>(GMT+13:00) Nukualofa</option>
                                <option value="(GMT+14:00) Kiritimati" {{ $pengaturan->timezone == '(GMT+14:00) Kiritimati' ? 'selected' : '' }}>(GMT+14:00) Kiritimati</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="halaman_purna_jual">Halaman Purna Jual</label>
                            <select class="form-control" id="halaman_purna_jual" value="{{$pengaturan->halaman_purna_jual}}" name="halaman_purna_jual">
                                <option value="Tanda Terima" {{ $pengaturan->halaman_purna_jual == 'Tanda Terima' ? 'selected' : '' }}>Tanda Terima</option>
                                <option value="POS" {{ $pengaturan->halaman_purna_jual == 'POS' ? 'selected' : '' }}>POS</option>
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
                                <option value="10" {{ $pengaturan->baris_per_halaman == '10' ? 'selected' : '' }}>10</option>
                                <option value="25" {{ $pengaturan->baris_per_halaman == '25' ? 'selected' : '' }}>25</option>
                                <option value="50" {{ $pengaturan->baris_per_halaman == '50' ? 'selected' : '' }}>50</option>
                                <option value="100" {{ $pengaturan->baris_per_halaman == '100' ? 'selected' : '' }}>100</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dukungan_rtl">Dukungan RTL</label>
                            <select class="form-control" id="dukungan_rtl" value="{{$pengaturan->dukungan_rtl}}" name="dukungan_rtl">
                                <option value="Nonaktifkan" {{ $pengaturan->dukungan_rtl == 'Nonaktifkan' ? 'selected' : '' }}>Nonaktifkan</option>
                                <option value="Diaktifkan" {{ $pengaturan->dukungan_rtl == 'Diaktifkan' ? 'selected' : '' }}>Diaktifkan</option>
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
                                    <option value="Weight qty" {{ $pengaturan->ws_barcode_chars == 'Weight qty' ? 'selected' : '' }}>Weight qty</option>
                                    <option value="Harga" {{ $pengaturan->ws_barcode_chars == 'Harga' ? 'selected' : '' }}>Harga</option>
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
                            <option value="PHP Mail Functio" {{ $pengaturan->protokol_email == 'PHP Mail Functio' ? 'selected' : '' }}>PHP Mail Function</option>
                            <option value="Send Mail" {{ $pengaturan->protokol_email == 'Send Mail' ? 'selected' : '' }}>Send Mail</option>
                            <option value="SMTP" {{ $pengaturan->protokol_email == 'SMTP' ? 'selected' : '' }}>SMTP</option>
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
                                    <option value="Nonaktifkan" {{ $pengaturan->desimal == 'Nonaktifkan' ? 'selected' : '' }}>Nonaktifkan</option>
                                    <option value="1" {{ $pengaturan->desimal == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $pengaturan->desimal == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $pengaturan->desimal == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $pengaturan->desimal == '4' ? 'selected' : '' }}>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="desimal_kuantitas" class="font-weight-bold">desimal kuantitas</label>
                                <select class="form-control" id="desimal_kuantitas" value="{{$pengaturan->desimal_kuantitas}}" name="desimal_kuantitas">
                                    <option value="Nonaktifkan" {{ $pengaturan->desimal_kuantitas == 'Nonaktifkan' ? 'selected' : '' }}>Nonaktifkan</option>
                                    <option value="1" {{ $pengaturan->desimal_kuantitas == '1' ? 'selected' : '' }}>1</option>
                                    <option value="1" {{ $pengaturan->desimal_kuantitas == '1' ? 'selected' : '' }}>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="format_mata_uang" class="font-weight-bold">format mata uang</label>
                                <select class="form-control" id="format_mata_uang" value="{{$pengaturan->format_mata_uang}}" name="format_mata_uang">
                                    <option value="Nonaktifkan" {{ $pengaturan->format_mata_uang == 'Nonaktifkan' ? 'selected' : '' }}>Nonaktifkan</option>
                                    <option value="Diaktifkan" {{ $pengaturan->format_mata_uang == 'Diaktifkan' ? 'selected' : '' }}>Diaktifkan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pemisah_desimal" class="font-weight-bold">pemisah desimal</label>
                                <select class="form-control" id="pemisah_desimal" value="{{$pengaturan->pemisah_desimal}}" name="pemisah_desimal">
                                    <option value="Dot(.)" {{ $pengaturan->pemisah_desimal == 'Dot(.)' ? 'selected' : '' }}>Dot(.)</option>
                                    <option value="Koma(,)" {{ $pengaturan->pemisah_desimal == 'Koma(,)' ? 'selected' : '' }}>Koma(,)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ribuan_pemisah" class="font-weight-bold">ribuan pemisah</label>
                                <select class="form-control" id="ribuan_pemisah" value="{{$pengaturan->ribuan_pemisah}}" name="ribuan_pemisah">
                                    <option value="Dot(.)" {{ $pengaturan->ribuan_pemisah == 'Dot(.)' ? 'selected' : '' }}>Dot(.)</option>
                                    <option value="Koma(,)" {{ $pengaturan->ribuan_pemisah == 'Koma(,)' ? 'selected' : '' }}>Koma(,)</option>
                                    <option value="Spasi" {{ $pengaturan->ribuan_pemisah == 'Spasi' ? 'selected' : '' }}>Spasi</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tampilkan_simbol_mata_uang" class="font-weight-bold"> tampilkan simbol mata uang</label>
                                <select class="form-control" id="tampilkan_simbol_mata_uang" value="{{$pengaturan->tampilkan_simbol_mata_uang}}" name="tampilkan_simbol_mata_uang">
                                    <option value="Nonaktifkan" {{ $pengaturan->tampilkan_simbol_mata_uang == 'Nonaktifkan' ? 'selected' : '' }}>Nonaktifkan</option>
                                    <option value="Sebelum" {{ $pengaturan->tampilkan_simbol_mata_uang == 'Sebelum' ? 'selected' : '' }}>Sebelum</option>
                                    <option value="Setelah" {{ $pengaturan->tampilkan_simbol_mata_uang == 'Setelah' ? 'selected' : '' }}>Setelah</option>
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
                                    <option value="Nonaktifkan" {{ $pengaturan->stripe == 'Nonaktifkan' ? 'selected' : '' }}>Nonaktifkan</option>
                                    <option value="Diaktifkan" {{ $pengaturan->stripe == 'Diaktifkan' ? 'selected' : '' }}>Diaktifkan</option>
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
                            </div>
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
            </form>
            </div>
        </div>
    </div>
@endsection

