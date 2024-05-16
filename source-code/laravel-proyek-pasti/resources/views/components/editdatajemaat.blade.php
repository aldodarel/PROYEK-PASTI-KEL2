<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />

<div class="col-12 bg-white p-3">
    <div class="row">
        <div class="col-md-7 col-12">
            <div class="row col-lg-12 col-md-4 border-bottom">
                <div class="col-10">
                    <h2 class="text">Ubah Data Jemaat</h2>
                    <p class="text">Data Jemaat dapat dengan mudah mengetahui informasi seputar data jemaat</p>
                </div>
            </div>
            <div class="table-responsive col-md-12 col-12">
                <table class="mt-4 table">
                    <form action="/pendeta/data/jemaat/edit" method="POST">
                        @csrf
                        <tr>
                            @if (session()->has('berhasilupdatejemaat'))
                                <div class="alert alert-success" role="alert">
                                    <p>
                                        {{ session('berhasilupdatejemaat') }}
                                    </p>
                                </div>
                            @endif
                        </tr>
                        <tr>
                            <td>No NIK</td>
                            <td><input type="text" name="nik" class="form-control" id="inputJemaat"
                                    value="{{ $jemaat['nik'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="name" class="form-control" id="inputJemaat1"
                                    value="{{ $jemaat['name'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td><input type="text" name="no_telepon" class="form-control" id="inputJemaat10"
                                    value="{{ $jemaat['no_telepon'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <select name="jenis_kelamin" class="form-control" id="inputJemaat2" required disabled>

                                    <option value="Laki-laki"
                                        {{ $jemaat->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki laki</option>
                                    <option value="Perempuan"
                                        {{ $jemaat->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamat" class="form-control" id="inputJemaat3"
                                    value="{{ $jemaat['alamat'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="status" class="form-control" id="inputJemaat4" required disabled>

                                    <option value="Aktif" {{ $jemaat->status == 'Aktif' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="Meninggal" {{ $jemaat->status == 'Meninggal' ? 'selected' : '' }}>
                                        Meninggal</option>
                                    <option value="Pindah" {{ $jemaat->status == 'Pindah' ? 'selected' : '' }}>Pindah
                                    </option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Status Pernikahan</td>
                            <td>
                                <select name="status_pernikahan" class="form-control" id="inputJemaat5" required
                                    disabled>
                                    <option value="Menikah"
                                        {{ $jemaat->status_pernikahan == 'Menikah' ? 'selected' : '' }}>Menikah
                                    </option>
                                    <option value="Belum Menikah"
                                        {{ $jemaat->status_pernikahan == 'Belum Menikah' ? 'selected' : '' }}>Belum
                                        Menikah</option>
                                    <option value="Cerai Mati"
                                        {{ $jemaat->status_pernikahan == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td><input type="text" name="tempat_lahir" class="form-control" id="inputJemaat6"
                                    value="{{ $jemaat['tempat_lahir'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Keterangan Baptis</td>
                            <td>
                                <select name="baptis" class="form-control" id="inputJemaat7" required disabled>
                                    <option value="Ya" {{ $jemaat['baptis'] == 'Ya' ? 'selected' : '' }}>Ya
                                    </option>
                                    <option value="Tidak" {{ $jemaat['baptis'] == 'Tidak' ? 'selected' : '' }}>Tidak
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan Sidi</td>
                            <td>
                                <select name="sidi" class="form-control" id="inputJemaat8" required disabled>
                                    <option value="Ya" {{ $jemaat['sidi'] == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $jemaat['sidi'] == 'Tidak' ? 'selected' : '' }}>Tidak
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Sektor</td>
                            <td><select name="sektor_id" id="inputJemaat17" class="form-control" required disabled>
                                    <option disabled selected>Pilih sektor dibawah</option>
                                    <option value="{{ $jemaat->sektor_id }}" selected>{{ $jemaat->sektor->nama }}
                                    </option>
                                    @foreach ($sektors as $sektor)
                                        @if ($sektor['id'] != $jemaat->sektor_id)
                                            <option value="{{ $sektor['id'] }}">{{ $sektor['nama'] }}</option>
                                        @endif
                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <td>Sektor Role</td>
                            <td>
                                <select name="sektor_role" id="inputJemaat9" class="form-control" required disabled>
                                    <option value="Penanggung Jawab"
                                        {{ $jemaat->sektor_role == 'Penanggung Jawab' ? 'selected' : '' }}>Penanggung
                                        Jawab</option>
                                    <option value="Anggota" {{ $jemaat->sektor_role == 'Anggota' ? 'selected' : '' }}>
                                        Anggota</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            @foreach ($lampiran as $l)
                        <tr>
                            <td>Lampiran</td>
                            <td>
                                <a href="{{ $l }}">{{ explode('/', $l)[count(explode('/', $l)) - 1] }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="file" name="lampiran[]" class="form-control" id="lampiran_jemaat"
                                    disabled></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td><button type="button" class="btn btn-warning" onclick="editjemaat()">Ubah
                                    Jemaat</button></td>
                            <td><button type="submit" class="btn btn-success" id="tblSave" disabled>Simpan</button>
                            </td>
                        </tr>

                </table>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="col-12">
                @if ($jemaat['baptis'] == 'Ya')
                    <!-- Form Baptis -->
                    <h2 class="text">Ubah Data Baptis</h2>
                    <table class="mt-4 table">
                        <tr>
                            <td>Tanggal Baptis</td>
                            <td><input type="date" name="tgl_baptis" id="inputJemaat11" class="form-control"
                                    value="{{ $baptis['tgl_baptis'] }}"required disabled></td>
                        </tr>
                        <tr>
                            <td>Nama Pendeta</td>
                            <td><input type="text" name="nama_pendeta_baptis" id="inputJemaat12"
                                    class="form-control" value="{{ $baptis['nama_pendeta_baptis'] }}"required
                                    disabled></td>
                        </tr>
                        <tr>
                            <td>Nomor Surat Baptis</td>
                            <td><input type="text" name="nama_surat_baptis" id="inputJemaat13"
                                    class="form-control" value="{{ $baptis['no_surat_baptis'] }}"required disabled>
                            </td>
                        </tr>
                        @foreach ($file_surat_baptis as $l)
                            <tr>
                                <td>Lampiran</td>
                                <td>
                                    <a
                                        href="{{ $l }}">{{ explode('/', $l)[count(explode('/', $l)) - 1] }}</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td><input type="file" name="file_surat_baptis[]" class="form-control"
                                    id="lampiran_baptis" disabled></td>
                        </tr>
                    </table>
                @endif

                @if ($jemaat['sidi'] == 'Ya')
                    <!-- Form Sidi -->
                    <h2 class="text">Ubah Data Sidi</h2>
                    <table class="mt-4 table">
                        <tr>
                            <td>Tanggal Sidi</td>
                            <td><input type="date" name="tgl_sidi" id="inputJemaat14" class="form-control"
                                    value="{{ $sidi['tgl_sidi'] }}"required disabled></td>
                        </tr>
                        <tr>
                            <td>Nama Pendeta</td>
                            <td><input type="text" name="nama_pendeta_sidi" id="inputJemaat15"
                                    class="form-control" value="{{ $sidi['nama_pendeta_sidi'] }}"required disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor Surat Sidi</td>
                            <td><input type="text" name="nama_surat_sidi" id="inputJemaat16" class="form-control"
                                    value="{{ $sidi['no_surat_sidi'] }}"required disabled></td>
                        </tr>
                        @foreach ($file_surat_sidi as $l)
                            <tr>
                                <td>Lampiran</td>
                                <td>
                                    <a
                                        href="{{ $l }}">{{ explode('/', $l)[count(explode('/', $l)) - 1] }}</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td><input type="file" name="file_surat_sidi[]" class="form-control"
                                    id="lampiran_sidi" disabled></td>
                        </tr>
                        </form>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
<script>
    function editjemaat() {
        var elements = document.getElementById("inputJemaat"),
            elements1 = document.getElementById("inputJemaat1"),
            elements2 = document.getElementById("inputJemaat2"),
            elements3 = document.getElementById("inputJemaat3"),
            elements4 = document.getElementById("inputJemaat4"),
            elements5 = document.getElementById("inputJemaat5"),
            elements6 = document.getElementById("inputJemaat6"),
            elements7 = document.getElementById("inputJemaat7"),
            elements8 = document.getElementById("inputJemaat8"),
            elements9 = document.getElementById("inputJemaat9"),
            elements10 = document.getElementById("inputJemaat10"),
            elements11 = document.getElementById("inputJemaat11"),
            elements12 = document.getElementById("inputJemaat12"),
            elements13 = document.getElementById("inputJemaat13"),
            elements14 = document.getElementById("inputJemaat14"),
            elements15 = document.getElementById("inputJemaat15"),
            elements16 = document.getElementById("inputJemaat16"),
            elements17 = document.getElementById("inputJemaat17"),
            lampiran_jemaat = document.getElementById("lampiran_jemaat"),
            lampiran_baptis = document.getElementById("lampiran_baptis"),
            lampiran_sidi = document.getElementById("lampiran_sidi"),
            tblSave = document.getElementById("tblSave");

        var button = document.querySelector(".btn-warning");

        if (elements.disabled == true) {
            elements.disabled = false;
            elements1.disabled = false;
            elements2.disabled = false;
            elements3.disabled = false;
            elements4.disabled = false;
            elements5.disabled = false;
            elements6.disabled = false;
            elements7.disabled = false;
            elements8.disabled = false;
            elements9.disabled = false;
            elements10.disabled = false;
            elements11.disabled = false;
            elements12.disabled = false;
            elements13.disabled = false;
            elements14.disabled = false;
            elements15.disabled = false;
            elements16.disabled = false;
            elements17.disabled = false;
            lampiran_jemaat.disabled = false;
            lampiran_baptis.disabled = false;
            lampiran_sidi.disabled = false;
            tblSave.disabled = false;
            button.innerHTML = "Batal";
        } else {
            elements.disabled = true;
            elements1.disabled = true;
            elements2.disabled = true;
            elements3.disabled = true;
            elements4.disabled = true;
            elements5.disabled = true;
            elements6.disabled = true;
            elements7.disabled = true;
            elements8.disabled = true;
            elements9.disabled = true;
            elements10.disabled = true;
            elements11.disabled = true;
            elements12.disabled = true;
            elements13.disabled = true;
            elements14.disabled = true;
            elements15.disabled = true;
            elements16.disabled = true;
            elements17.disabled = true;
            lampiran_jemaat.disabled = true;
            lampiran_baptis.disabled = true;
            lampiran_sidi.disabled = true;
            tblSave.disabled = true;
            button.innerHTML = "Ubah Jemaat";
        }
    }
</script>
