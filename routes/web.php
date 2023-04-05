<?php

use App\Http\Controllers\prosperobisa;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('template.t_index');
// });


// Tampilan Utama
Route::get('/', 'prosperobisa@bukalogin' );

// Register ///
Route::get('register', 'prosperobisa@bukaregister' );
Route::post('prosesregister','prosperobisa@prosesregister');

// Login
Route::post('login','prosperobisa@proseslogin');
Route::post('proseslogin','prosperobisa@proseslogin');

// Logout
Route::get('logout','prosperobisa@proseskeluar');

//Tampilan Index
Route::get('index_sales','prosperobisa@indexsales');
Route::get('index_admin','prosperobisa@indexadmin');
Route::get('index_au','prosperobisa@indexau');
Route::get('index_mana','prosperobisa@indexmana');
// Filter Pada tampilan Index Admin

Route::get('notifmana/{ID_KARYAWAN}/{ID_JADWAL}','prosperobisa@notifmana');
Route::get('notifreport/{ID_JADWAL}','prosperobisa@notifreport');

// Tampilan Master Pencatatan //

// - Pencatatan Karyawan
Route::get('pencatatan','prosperobisa@pencatatan');

// - View dan Proses  Tambah Karyawan
Route::get('tambahkaryawan','prosperobisa@tambahkar');
Route::post('prosestambah','prosperobisa@tambahkarya');

// - Validasi Akses Karyawan
Route::get('validasiakses','prosperobisa@validasiakses');
Route::post('ubahstatuskaryawan','prosperobisa@prosesubahstatuskaryawan');

// sender email penolakan karyawan
//test

Route::post('kirimemailpenolakan', 'MailController@SendEmail');


//- Hapus Karyawan

Route::get('hapusakun/{ID_KARYAWAN}','prosperobisa@proseshapusakun');

// - Proses Edit Karyawan
Route::get('editkaryawanbisa/{ID_KARYAWAN}','prosperobisa@editkaryawanbisa');
Route::post('masukineditkaryawan','prosperobisa@masukeditkaryawan');

// - View Target
Route::get('catattarget','prosperobisa@catattarget');

// - Proses Tambah Target
Route::post('prosestarget','prosperobisa@tambahtarget');

// - View Proses Ubah Target
Route::get('viewedittarget/{TG}','prosperobisa@viewtarget');
Route::post('editprosestarget','prosperobisa@edittargetproses');

// - View Proses Ubah Target

Route::get('hapustarget/{TG}','prosperobisa@proseshapustarget');

// - View Kriteria
Route::get('kriteriabisa','prosperobisa@catatkriteria');

// - Proses Tambah Kriteria
Route::post('tambahkriteria','prosperobisa@tambahkriteria');

// - View Penjadwalan
Route::get('penjadwalanbisa','prosperobisa@penjadwalan');

// - Proses Tambah Penjadwalan
Route::post('tambahjadwal','prosperobisa@tambahjadwal');

// - Proses Hapus Penjadwalan
Route::get('hapusjadwal/{ID_JADWAL}','prosperobisa@hapusjadwal');

// - View dan Proses Edit
Route::get('editjadwal/{ID_JADWAL}','prosperobisa@editjadwal');
Route::post('masukinlagijadwal','prosperobisa@masukjadwal');

// - View dan Proses Tambah Kategori Jadwal
Route::get('tambahkarjad','prosperobisa@tambahkarjad');
Route::post('inputkarjad','prosperobisa@masukkarjad');

// - View dan Proses Edit Kategori Jadwal
Route::get('editkarjad/{ID_KATJAD}','prosperobisa@editkarjad');
Route::post('masukinkarjad','prosperobisa@masukeditkarjad');

// - Hapus Kategori Jadwal
Route::get('hapuskarjad/{ID_KATJAD}','prosperobisa@prosesku');

// - Filter Tanggal Jadwal View Pencatatan Penjadwalan
Route::post('penjadwalanbisa/tanggalfilter','prosperobisa@filtertanggal');
// - Filter Tanggal Jadwal pada monitoringjadwal
Route::post('monitorjadwal/filtermonitortanggaljadwal','prosperobisa@filtermonitorjadwaltanggal');


// - Filter Tanggal Monitoring Laporan
Route::post('monitoringlaporan/tanggalfilterlaporan','prosperobisa@filtertanggallaporan');

// - Filter tanggal History Laporan Sales
Route::post('view_historyreport_sales/tanggalfilterlaporan','prosperobisa@filtertanggallaporansales');

// - Filter Karyawan View Pencatatan Penjadwalan
Route::post('sembaranglah', 'prosperobisa@filterjadwal');
// - Filter Monitoring Kategori Hot
Route::post('filterhot', 'prosperobisa@filtermonitoringkategori');
// - Filter Monitoring Kategori Hot
Route::post('filterhotman', 'prosperobisa@filtermonitoringkategoriman');

// - View Penjadwalan Pameran
Route::get('penjadwalanpameran','prosperobisa@penjadwalanpameran');

// - Proses Penjadwalan Pameran
Route::post('prosespenjadwalanpameran', 'prosperobisa@prosespenjadwalanpameran');
// - Proses Penjadwalan Pameran
Route::get('vieweditpenjadwalanpameran/{ID_PAMERAN}','prosperobisa@vieweditpenjadwalanpameran');

Route::post('proseseditpenjadwalanpameran', 'prosperobisa@proseseditpenjadwalanpameran');
// - Proses Penjadwalan Pameran
Route::get('proseshapuspenjadwalanpameran/{ID_PAMERAN}','prosperobisa@proseshapuspenjadwalanpameran');

// - View Target Sales
Route::get('targetsales','prosperobisa@targetsales');
// - View Tambah Target Sales
Route::post('tambahtargetsales','prosperobisa@tambahtargetsales');


//-------------Monitoring----------------//

// - View Monitoring Jadwal
Route::get('monitorjadwal','prosperobisa@monitorjadwal');
Route::get('monitorjadwalpdf','exportpdf@downloadpdfjadwal');

//-------------Manajemen----------------//

//- Index Manajemen

//- Monitoring Jadwal
Route::get('monitorjadwalman','prosperobisa@monitorjadwalman');

// - Filter Tanggal Jadwal pada monitoringjadwal Manajemen
Route::post('monitorjadwalman/filtermonitortanggaljadwalman','prosperobisa@filtermonitorjadwaltanggalman');

//- Monitoring Customer
Route::get('monitoringcustman','prosperobisa@monitoringcustman');
Route::get('monitoringcust','prosperobisa@monitoringcust');
//- Monitoring Laporan
Route::get('monitoringlaporanman','prosperobisa@monitoringlaporanman');
Route::get('monitoringlaporan','prosperobisa@monitoringlaporan');

// - Filter Tanggal Monitoring Laporan
Route::post('monitoringlaporanman/tanggalfilterlaporan','prosperobisa@filtertanggallaporanman');


// - Prizinan Validasi Target
Route::get('validasitargetman','prosperobisa@validasitargetman');

// - Prizinan Validasi Target Non Aktiv
Route::get('hapustargetman/{TG}','prosperobisa@proseshapustargetman');
// - Prizinan Validasi Target Aktivasi
Route::get('ubahstatustarget/{TG}','prosperobisa@prosesubahstatustarget');

// - edit Proses Ubah Target
Route::get('viewedittargetman/{TG}','prosperobisa@viewtargetman');
Route::post('editprosestargetman','prosperobisa@edittargetprosesman');

// - Perizinan Karyawan
Route::get('pencatatan_man','prosperobisa@pencatatanman');

// - Proses Edit Karyawan manajemen
Route::get('editkaryawanbisaman/{ID_KARYAWAN}','prosperobisa@editkaryawanbisaman');
Route::post('masukineditkaryawanman','prosperobisa@masukeditkaryawanman');

// - View dan Proses  Tambah Karyawan Manajemen
Route::get('tambahkaryawanman','prosperobisa@tambahkarman');
Route::post('prosestambahman','prosperobisa@tambahkaryaman');





//Report
Route::get('view_report_sales','prosperobisa@reportsales');
Route::get('view_reportharian_sales','prosperobisa@reporthariansales');
Route::post('proses_reportharian_sales','prosperobisa@prosesreporthariansales');
Route::get('hapusreportharian/{ID_LAPORAN}','prosperobisa@hapusdatareportharian');
Route::get('editreportharian/{ID_LAPORAN}','prosperobisa@editdatareportharian');
Route::post('proseseditreportharian','prosperobisa@proseseditdatareportharian');
// Route::get('editreportharian2/{ID_LAPORAN}','prosperobisa@editdatareportharian2');
Route::get('reportjadwal/{ID_JADWAL}','prosperobisa@reportjadwal1');
Route::post('proses_reportjadwal_sales','prosperobisa@prosesreportjadwal');
Route::get('editreport/{ID_LAPORAN}','prosperobisa@editdatareport');
Route::post('proseseditreport','prosperobisa@proseseditdatareport');
Route::get('editreportharian/updatejeniscus2/{ID_CUSTOMER}','prosperobisa@editjeniscus2');
Route::get('editreportharian/tinjaucus2/{ID_CUSTOMER}','prosperobisa@tinjaucust2');
Route::get('uploadfoto/{ID_LAPORAN}', 'prosperobisa@createForm');
Route::post('/upload-file', [prosperobisa::class, 'fileUpload'])->name('fileUpload');
Route::get('editreportharian/tambahcustomer/{ID_LAPORAN}','prosperobisa@tambahcustomer');
//Customer
Route::get('viewcustomer','prosperobisa@tampilcust');
Route::get('daftarcustomer','prosperobisa@daftarcus');
Route::get('updatejeniscus/{ID_CUSTOMER}','prosperobisa@editjeniscus');
Route::post('masukinjeniscus','prosperobisa@masukjencus');
Route::get('editreportharian/updatejeniscus2/{ID_CUSTOMER}','prosperobisa@editjeniscus2');
Route::get('view_historyreport_sales','prosperobisa@historyreportsales');
Route::post('masukinjeniscus2','prosperobisa@masukjencus2');
Route::get('coba','prosperobisa@coba');
Route::get('tinjaucus/{ID_CUSTOMER}','prosperobisa@tinjaucust');
Route::post('masukintinjaucus','prosperobisa@masuktincus');
Route::post('masukintinjaucus2','prosperobisa@masuktincus2');
Route::get('validasicus/{ID_DETAILCUST}','prosperobisa@validasicus');
Route::get('tinjaucus/updateunitminat/{ID_DETAILCUST}','prosperobisa@updateunitminat');
Route::get('viewcustomer/updateunitminat/{ID_DETAILCUST}','prosperobisa@updateunitminat2');
Route::get('updatevalidasicus/{ID_DETAILCUST}','prosperobisa@updatevalidasicusku');
Route::post('updatemasukvalidasicus','prosperobisa@upsmasukvalidasicus');
Route::post('masukvalidasicus','prosperobisa@masukvalidasicus');
Route::post('upmasukunit','prosperobisa@upmasukunit');
Route::post('filtercus', 'prosperobisa@filterjadwalcus');
Route::post('prosestambahcust','prosperobisa@prosestambahcust');


Route::post('index_admin/tanggalfilteradmin','prosperobisa@filtertanggaladmin');


Route::get('exportjadwal','exportexcel@exportjadwal');
Route::get('exportkaryawan','exportexcel@exportkaryawan');
Route::get('exportlaporan','exportexcel@exportlaporan');
Route::get('exportcustomer','exportexcel@exportcustomer');
Route::get('exportpenilaian','exportexcel@exportpenilaian');
Route::get('exportpdfjadwal','exportpdf@downloadpdfjadwal');



// Daffakayesss
// ----------------------PERIODE----------------------
Route::get('periode-penilaian','prosperobisa@periode');
Route::post('periode-penilaian/filter-periode','prosperobisa@filter_periode');

// ----------------------KATEGORI----------------------
Route::get('kategori-penilaian','prosperobisa@catatkategori');
Route::post('tambahkategori','prosperobisa@tambahkategori');
Route::get('ubah_kategori/{ID_KATEGORI}','prosperobisa@editkategori');
Route::post('ubahkategori','prosperobisa@ubahkategori');

// ----------------------SKALA----------------------
Route::get('parameter-penilaian','prosperobisa@catatskala');
Route::post('tambahskala','prosperobisa@tambahskala');
Route::get('ubah-parameter/{ID_SKALA}','prosperobisa@ubahskala');
Route::post('editskala','prosperobisa@edit_skala');

// ----------------------AGENT UNDER----------------------
Route::get('agent-under','prosperobisa@pencatatanagent');
Route::get('tambah-agent-under','prosperobisa@tambah_au');
Route::post('prosestambahau','prosperobisa@tambahagent');
Route::get('ubah_au/{ID_AU}','prosperobisa@ubahau');
Route::post('editau','prosperobisa@editau');

// ---------------------VALIDASI USER---------------------
Route::get('validasi_user/{ID_KARYAWAN}','prosperobisa@editvalidasi');
Route::post('ubahvalidasi','prosperobisa@ubahvalidasi');

// -------------------------REKAP-------------------------
Route::get('rekap-penilaian','prosperobisa@rekapel');

// --------------------GRAFIK PENILAIAN-------------------

// -------------------------EXCEL-------------------------
Route::post('eksportExcel', 'prosperobisa@eksportExcel');
