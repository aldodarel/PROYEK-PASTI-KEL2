<?php
$header_title = 'Tambah Data Jemaat';
?>
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 p-3 bg-white rounded shadow">
    @include('components.headerform')

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group mt-3 col-6">
                <label for="no_kk">NO KK</label>
                <input disabled type="text" value="{{ $keluarga['no_kk'] }}" name="no_kk" id="no_kk"
                    class="form-control">
            </div>
            <div class="form-group mt-3 col-6">
                <label for="name">Nama Keluarga</label>
                <input type="text" name="nama_keluarga" id="nama_keluarga" value="{{ $keluarga['nama_keluarga'] }}"
                    disabled class="form-control">
            </div>

            <div class="form-group mt-3 col-6">
                <label for="nik">No NIK</label>
                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                    placeholder="" value="{{ old('nik') }}">
                @error('nik')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3 col-6">
                <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3 col-6">
                <label for="name">Nomor Telepon</label>
                <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon"
                    placeholder="" value="{{ old('no_telepon') }}">
                @error('no_telepons')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3 col-6">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                    placeholder="" value="{{ old('username') }}">
                @error('username')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3 col-6">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <div class="form-check">
                    <input value="Laki-laki" class="form-check-input" type="radio" name="jenis_kelamin"
                        id="jenis_kelamin1">
                    <label class="form-check-label" for="jenis_kelamin1">
                        Laki Laki
                    </label>
                </div>
                <div class="form-check">
                    <input value="Perempuan" class="form-check-input" type="radio" name="jenis_kelamin"
                        id="jenis_kelamin2">
                    <label class="form-check-label" for="jenis_kelamin2">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="form-group mt-3 col-6">
                <label for="posisi_di_keluarga">Posisi Di Keluarga</label>
                <select name="posisi_di_keluarga" id="posisi_di_keluarga" class="form-control">
                    <option disabled selected>Pilih posisi</option>
                    <option value="Suami">Suami</option>
                    <option value="Istri">Istri</option>
                    <option value="Anak">Anak</option>
                </select>
            </div>
            <div class="form-group mt-3 col-6">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                    name="tempat_lahir" placeholder="" value="{{ old('tempat_lahir') }}">
                @error('tempat_lahir')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            {{-- TODO: Need to format date --}}
            <div class="form-group mt-3 col-6">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                    name="tanggal_lahir" placeholder="" value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mt-3 col-6">
                <label for="status">Status Anggota</label>
                <select name="status" id="status" class="form-control">
                    <option disabled selected>Pilih status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Meninggal">Meninggal</option>
                    <option value="Pindah">Pindah</option>
                </select>
            </div>

            <div class="form-group mt-3 col-6">
                <label for="status_pernikahan">Status Pernikahan</label>
                <select name="status_pernikahan" id="status_pernikahan" class="form-control">
                    <option disabled selected>Pilih status pernikahan</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                </select>
            </div>

            {{-- TODO: Need to format date --}}
            {{-- <div class="form-group mt-3 col-6">
                <label for="tanggal_baptis">Tanggal Baptis</label>
                <input type="date" class="form-control @error('tanggal_baptis') is-invalid @enderror"
                    name="tanggal_baptis" placeholder="" value="{{ old('tanggal_baptis') }}">
                @error('tanggal_baptis')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div> --}}
            <!-- Tambahan untuk memilih apakah seseorang telah dibaptis atau tidak -->
            <div class="form-group mt-3 col-6">
                <label for="baptis">Sudah dibaptis?</label>
                <div class="form-check">
                    <input value="Ya" class="form-check-input" type="radio" name="baptis" id="baptis1">
                    <label class="form-check-label" for="baptis1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input value="Tidak" class="form-check-input" type="radio" name="baptis" id="baptis2">
                    <label class="form-check-label" for="baptis2">
                        Tidak
                    </label>
                </div>
            </div>

            <!-- Field tambahan untuk tanggal baptis, nama pendeta baptis, dan nomor surat baptis -->
            <div id="additional_fields" style="display: none;">
                <!-- Garis pemisah -->
                <div class="col-12">
                    <hr>
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="tanggal_baptis">Tanggal Baptis</label>
                    <input type="date" class="form-control @error('tanggal_baptis') is-invalid @enderror"
                        name="tanggal_baptis" placeholder="" value="{{ old('tanggal_baptis') }}">
                    @error('tanggal_baptis')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="nama_pendeta">Nama Pendeta Baptis</label>
                    <input type="text" class="form-control @error('nama_pendeta') is-invalid @enderror"
                        name="nama_pendeta" placeholder="" value="{{ old('nama_pendeta') }}">
                    @error('nama_pendeta')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="nomor_surat_baptis">Nomor Surat Baptis</label>
                    <input type="text" class="form-control @error('nomor_surat_baptis') is-invalid @enderror"
                        name="nomor_surat_baptis" placeholder="" value="{{ old('nomor_surat_baptis') }}">
                    @error('nomor_surat_baptis')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="surat_baptis">Surat Baptis</label>
                    <input type="file" class="form-control @error('surat_baptis') is-invalid @enderror"
                        name="surat_baptis[]" placeholder="" id="surat_baptis" multiple
                        value="{{ old('surat_baptis') }}">
                    @error('surat_baptis')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Garis pemisah -->
                <div class="col-12">
                    <hr>
                </div>
            </div>

            {{-- TODO: Need to format date --}}
            {{-- <div class="form-group mt-3 col-6">
                <label for="tanggal_sidih">Tanggal Sidi</label>
                <input type="date" class="form-control @error('tanggal_sidih') is-invalid @enderror"
                    name="tanggal_sidih" placeholder="" value="{{ old('tanggal_sidih') }}">
                @error('tanggal_sidih')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div> --}}
            <!-- Tambahan untuk memilih apakah seseorang telah disidi atau tidak -->
            <div class="form-group mt-3 col-6">
                <label for="sidi">Sudah disidi?</label>
                <div class="form-check">
                    <input value="Ya" class="form-check-input" type="radio" name="sidi" id="sidi1">
                    <label class="form-check-label" for="sidi1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input value="Tidak" class="form-check-input" type="radio" name="sidi" id="sidi2">
                    <label class="form-check-label" for="sidi2">
                        Tidak
                    </label>
                </div>
            </div>

            <!-- Field tambahan untuk tanggal sidi, nama pendeta sidi, dan nomor surat sidi -->
            <div id="additional_sidi_fields" style="display: none;">
                <div class="col-12">
                    <hr>
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="tanggal_sidi">Tanggal Sidi</label>
                    <input type="date" class="form-control @error('tanggal_sidi') is-invalid @enderror"
                        name="tanggal_sidi" placeholder="" value="{{ old('tanggal_sidi') }}">
                    @error('tanggal_sidi')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="nama_pendeta_sidi">Nama Pendeta Sidi</label>
                    <input type="text" class="form-control @error('nama_pendeta_sidi') is-invalid @enderror"
                        name="nama_pendeta_sidi" placeholder="" value="{{ old('nama_pendeta_sidi') }}">
                    @error('nama_pendeta_sidi')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="nomor_surat_sidi">Nomor Surat Sidi</label>
                    <input type="text" class="form-control @error('nomor_surat_sidi') is-invalid @enderror"
                        name="nomor_surat_sidi" placeholder="" value="{{ old('nomor_surat_sidi') }}">
                    @error('nomor_surat_sidi')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 col-6">
                    <label for="surat_baptis">Surat Sidi</label>
                    <input type="file" class="form-control @error('surat_sidi') is-invalid @enderror"
                        name="surat_sidi[]" placeholder="" id="surat_sidi" multiple
                        value="{{ old('surat_sidi') }}">
                    @error('surat_sidi')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <hr>
                </div>
            </div>


            {{-- TODO: Remember to add to varibel $sktors in controller --}}
            <div class="form-group mt-3 col-6">
                <label for="sektor_id">Sektor</label>
                <select name="sektor_id" id="sektor_id" class="form-control">
                    <option disabled selected>Pilih sektor dibawah</option>
                    @foreach ($sektors as $sektor)
                        <option value="{{ $sektor['id'] }}">{{ $sektor['nama'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3 col-6">
                <label for="sektor_role">Sektor Role</label>
                <select name="sektor_role" id="sektor_role" class="form-control">
                    <option disabled selected>Pilih posisi jemaat di sektor</option>
                    <option value="Penanggung Jawab">Penanggung Jawab</option>
                    <option value="Anggota">Anggota</option>
                </select>
            </div>
            <div class="form-group mt-3 col-6">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="5"
                    class="form-control @error('tempat_lahir') is-invalid @enderror" name="alamat" placeholder=""
                    value="{{ old('alamat') }}"></textarea>
                @error('alamat')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
            <div class="form-group mt-3 col-6">
                <label for="lampiran">Lampiran</label>
                <input type="file" class="form-control @error('lampiran') is-invalid @enderror" name="lampiran[]"
                    placeholder="" id="lampiran" multiple value="{{ old('lampiran') }}">
                @error('lampiran')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mt-3 col-6">
                <label for="profile">Profile</label>
                <input type="file" class="form-control @error('profile') is-invalid @enderror" name="profile[]"
                    placeholder="" value="{{ old('profile') }}">
                @error('profile')
                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex col-2 gap-3 mt-4">
                <button type="submit" class="btn btn-success ms-auto">
                    Simpan
                </button>
                <button type="reset" class="btn btn-secondary">
                    Reset
                </button>
                <a href="{{ route('pendeta.datakeluarga') }}" class="btn btn-primary">
                    <span>Kembali</span>
                </a>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var optionRadios = document.querySelectorAll('input[name="baptis"], input[name="sidi"]');
        var additionalFields = document.getElementById('additional_fields');
        var additionalSidiFields = document.getElementById('additional_sidi_fields');

        // Fungsi untuk menampilkan atau menyembunyikan formulir tambahan berdasarkan status opsi yang dipilih
        function toggleAdditionalFields(option, additionalFieldsElement) {
            if (option === 'Ya') {
                additionalFieldsElement.style.display = 'block';
            } else {
                additionalFieldsElement.style.display = 'none';
            }
        }

        // Event listener untuk setiap opsi
        optionRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (this.name === 'baptis') {
                    toggleAdditionalFields(this.value, additionalFields);
                }

                if (this.name === 'sidi') {
                    toggleAdditionalFields(this.value, additionalSidiFields);
                }
            });
        });

        // Memastikan formulir tambahan muncul jika opsi sudah terpilih saat halaman dimuat
        optionRadios.forEach(function(radio) {
            if (radio.checked) {
                if (radio.name === 'baptis') {
                    toggleAdditionalFields(radio.value, additionalFields);
                }

                if (radio.name === 'sidi') {
                    toggleAdditionalFields(radio.value, additionalSidiFields);
                }
            }
        });
    });
</script>
