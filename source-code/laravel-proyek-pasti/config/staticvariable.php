<?php

class StaticVariable
{
    static $navbarPendeta = [
        [
            "isGroup" => true,
            "name" => "Home",
            "url" => "/pendeta",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Data Keluarga",
                    "url" => "/pendeta/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat",
                    "url" => "/pendeta/data/jemaat",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ], [
                    "name" => "Data Statistik",
                    "url" => "/pendeta/data/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Sektor",
            "navbars" => [
                [
                    "name" => "Data Anggota Sektor",
                    "url" => "/pendeta/data/sektor/anggota",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Data Sektor",
                    "url" => "/pendeta/data/sektor",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Sektor",
                    "url" => "/pendeta/data/sektor/add",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Dana Keuangan",
            "navbars" => [
                [
                    "name" => "Kelola Keuangan",
                    "url" => "/pendeta/data/keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Kelola Keuangan Non-Aktif",
                    "url" => "/pendeta/data/keuangan/nonaktif",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pemasukan",
                    "url" => "/pendeta/data/dana-pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pengeluaran",
                    "url" => "/pendeta/data/dana-pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Laporan Keuangan",
            "navbars" => [
                [
                    "name" => "Kelola Laporan Keuangan",
                    "url" => "/pendeta/data/laporan-keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Kelola Laporan Keuangan Non-Aktif",
                    "url" => "/pendeta/data/laporan-keuangan/nonaktif",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Mingguan",
                    "url" => "/pendeta/data/laporan-keuangan/cari-mingguan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Bulanan",
                    "url" => "/pendeta/data/laporan-keuangan/cari-bulanan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Tahunan",
                    "url" => "/pendeta/data/laporan-keuangan/cari-tahunan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Renungan Ibadah",
            "navbars" => [
                [
                    "name" => "Lihat Renungan",
                    "url" => "/pendeta/renungan",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Renungan",
                    "url" => "/pendeta/tambah-renungan",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Jadwal Ibadah",
            "navbars" => [
                [
                    "name" => "Lihat Jadwal Ibadah",
                    "url" => "/pendeta/jadwal",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Jadwal Ibadah",
                    "url" => "/pendeta/tambah-jadwal",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Jadwal Pelayanan",
            "navbars" => [
                [
                    "name" => "Lihat Jadwal Pelayan",
                    "url" => "/pendeta/pelayanan",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Tata Ibadah",
            "navbars" => [
                [
                    "name" => "Lihat Tata Ibadah",
                    "url" => "/pendeta/detail/ibadah",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Tata Ibadah",
                    "url" => "/pendeta/tambah-tata",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Berita Gereja",
            "navbars" => [
                [
                    "name" => "Lihat Berita Gereja",
                    "url" => "/Beritapendeta",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Berita Gereja",
                    "url" => "/tambah-beritapendeta",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ]
    ];
    
    static $user = null;
    static $navbarBendahara = [
        [
            "name" => "Home",
            "url" => "/bendahara",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Data Keluarga",
                    "url" => "/bendahara/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat",
                    "url" => "/bendahara/data/jemaat",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ], [
                    "name" => "Data Statistik",
                    "url" => "/bendahara/data/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Dana Keuangan",
            "navbars" => [
                [
                    "name" => "Kelola Keuangan",
                    "url" => "/bendahara/data/keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Kelola Keuangan Non-Aktif",
                    "url" => "/bendahara/data/keuangan/nonaktif",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pemasukan",
                    "url" => "/bendahara/data/dana-pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pengeluaran",
                    "url" => "/bendahara/data/dana-pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Laporan Keuangan",
            "navbars" => [
                [
                    "name" => "Kelola Laporan Keuangan",
                    "url" => "/bendahara/data/laporan-keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Kelola Laporan Keuangan Non-Aktif",
                    "url" => "/bendahara/data/laporan-keuangan/nonaktif",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Mingguan",
                    "url" => "/bendahara/data/laporan-keuangan/cari-mingguan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Bulanan",
                    "url" => "/bendahara/data/laporan-keuangan/cari-bulanan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Tahunan",
                    "url" => "/bendahara/data/laporan-keuangan/cari-tahunan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Berita Gereja",
            "navbars" => [
                [
                    "name" => "Lihat Berita Gereja",
                    "url" => "/Beritabenda",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Berita Gereja",
                    "url" => "/tambah-beritabenda",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ]
    ];
    static $navbarPenatua = [
        [
            "name" => "Home",
            "url" => "/penatua",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Lihat Data Keluarga",
                    "url" => "/penatua/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Lihat Data Jemaat",
                    "url" => "/penatua/data/jemaat",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ], [
                    "name" => "Lihat Data Statistik",
                    "url" => "/penatua/data/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Dana Keuangan",
            "navbars" => [
                [
                    "name" => "Lihat Dana Pemasukan",
                    "url" => "/penatua/data/dana-pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Dana Pengeluaran",
                    "url" => "/penatua/data/dana-pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Laporan Keuangan",
            "navbars" => [
                [
                    "name" => "Lihat Laporan Keuangan",
                    "url" => "/penatua/data/laporan-keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Laporan Keuangan Non-Aktif",
                    "url" => "/penatua/data/laporan-keuangan/nonaktif",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Keuangan Mingguan",
                    "url" => "/penatua/data/laporan-keuangan/cari-mingguan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Keuangan Bulanan",
                    "url" => "/penatua/data/laporan-keuangan/cari-bulanan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Keuangan Tahunan",
                    "url" => "/penatua/data/laporan-keuangan/cari-tahunan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Renungan Ibadah",
            "navbars" => [
                [
                    "name" => "Lihat Renungan",
                    "url" => "/penatua/renungan",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Renungan",
                    "url" => "/penatua/tambah-renungan",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Jadwal Ibadah",
            "navbars" => [
                [
                    "name" => "Lihat Jadwal Ibadah",
                    "url" => "/penatua/jadwal",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ]
            ]
        ],

    ];
    
    static $navbarJemaat = [
        [
            "name" => "Home",
            "url" => "/jemaat",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Lihat Data Keluarga",
                    "url" => "/jemaat/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Lihat Data Jemaat",
                    "url" => "/jemaat/data/jemaat",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ], [
                    "name" => "Lihat Data Statistik",
                    "url" => "/jemaat/data/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Dana Keuangan",
            "navbars" => [
                [
                    "name" => "Lihat Dana Pemasukan",
                    "url" => "/jemaat/data/dana-pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Dana Pengeluaran",
                    "url" => "/jemaat/data/dana-pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
    ];
    static $navbarSekretaris = [
        [
            "name" => "Home",
            "url" => "/sekretaris",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Data Keluarga",
                    "url" => "/sekretaris/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat",
                    "url" => "/sekretaris/data/jemaat",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ], [
                    "name" => "Data Statistik",
                    "url" => "/sekretaris/data/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Dana Keuangan",
            "navbars" => [
                [
                    "name" => "Kelola Keuangan",
                    "url" => "/sekretaris/data/keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Kelola Keuangan Non-Aktif",
                    "url" => "/sekretaris/data/keuangan/nonaktif",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pemasukan",
                    "url" => "/sekretaris/data/dana-pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pengeluaran",
                    "url" => "/sekretaris/data/dana-pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Laporan Keuangan",
            "navbars" => [
                [
                    "name" => "Kelola Laporan Keuangan",
                    "url" => "/sekretaris/data/laporan-keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Kelola Laporan Keuangan Non-Aktif",
                    "url" => "/sekretaris/data/laporan-keuangan/nonaktif",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Mingguan",
                    "url" => "/sekretaris/data/laporan-keuangan/cari-mingguan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Bulanan",
                    "url" => "/sekretaris/data/laporan-keuangan/cari-bulanan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Tahunan",
                    "url" => "/sekretaris/data/laporan-keuangan/cari-tahunan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Berita Gereja",
            "navbars" => [
                [
                    "name" => "Lihat Berita Gereja",
                    "url" => "/Beritasekre",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Berita Gereja",
                    "url" => "/tambah-beritasekre",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ]
    ];
    static $navbartatausaha = [
        [
            "name" => "Home",
            "url" => "/tatausaha",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Data Keluarga",
                    "url" => "/tatausaha/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat",
                    "url" => "/tatausaha/data/jemaat",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ], [
                    "name" => "Data Statistik",
                    "url" => "/tatausaha/data/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Dana Keuangan",
            "navbars" => [
                [
                    "name" => "Kelola Keuangan",
                    "url" => "/tatausaha/data/keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Kelola Keuangan Non-Aktif",
                    "url" => "/tatausaha/data/keuangan/nonaktif",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pemasukan",
                    "url" => "/tatausaha/data/dana-pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pengeluaran",
                    "url" => "/tatausaha/data/dana-pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Laporan Keuangan",
            "navbars" => [
                [
                    "name" => "Kelola Laporan Keuangan",
                    "url" => "/tatausaha/data/laporan-keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Kelola Laporan Keuangan Non-Aktif",
                    "url" => "/tatausaha/data/laporan-keuangan/nonaktif",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Mingguan",
                    "url" => "/tatausaha/data/laporan-keuangan/cari-mingguan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Bulanan",
                    "url" => "/tatausaha/data/laporan-keuangan/cari-bulanan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Tahunan",
                    "url" => "/tatausaha/data/laporan-keuangan/cari-tahunan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
      
        [
            "isGroup" => true,
            "name" => "Pelayan Gereja",
            "navbars" => [
                [
                    "name" => "Lihat Data Pelayan",
                    "url" => "/tatausaha/pelayangereja",
                    "icon" => '<i class="fa fa-user" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Pelayan",
                    "url" => "/tatausaha/data/pelayan/add",
                    "icon" => '<i class="fa fa-user-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Berita Gereja",
            "navbars" => [
                [
                    "name" => "Lihat Berita Gereja",
                    "url" => "/Berita",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Berita Gereja",
                    "url" => "/tambah-berita",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ]
    ];
}
