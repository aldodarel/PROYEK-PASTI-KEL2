<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" /> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        
        <div class="col-12 mt-5">
            <div class="table-responsive-sm">
            <table class="table table-light table-borderless">
                    <form class="mt-3" action="" method="GET" enctype="multipart/form-data">
                        <div class="form-group col-12 col-md-6 mt-3">
                            <label for="tahun">Masukkan Tahun Laporan Tahunan</label>
                            <input type="number" name="tahun" id="tahun" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 mt-2">
                            <button type="submit" class="btn btn-success">
                                Cari
                        </button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                     </form>
                </table>
            </div>
        </div>
    </div>
</div>