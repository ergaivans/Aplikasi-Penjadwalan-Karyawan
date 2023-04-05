<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Event;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Input;
use PhpParser\Node\Stmt\Return_;
use RealRashid\SweetAlert\Facades\Alert;
Use \Carbon\Carbon;




class prosperobisa extends Controller
{
    public function bukalogin()
    {
        return View('login');
    }

    public function bukaregister()
    {
        $jumlah_row = DB::table('karyawan')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_karyawan = (object) array('MAX_ID_NUMBER' => 'KA_001');
        } else {
            $id_t = 0;
            $id = DB::table('karyawan')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_KARYAWAN, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_KARYAWAN, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('karyawan')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_KARYAWAN, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_KARYAWAN, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_karyawan = DB::table('karyawan')->select(DB::raw('CONCAT("KA_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        return View('register')->with('id_karyawan', $id_karyawan);
    }

    public function indexadmin(Request $request)
    {
        $mytime = Carbon::now();
        $data = DB::table('karyawan')
            ->where('JABATAN', '=', 'Sales')
            ->get();
        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->where('jd.TANGGAL', '=', $mytime->toDateString())
            ->get();
        $tabelbaru = DB::table('kat_jadwal')->get();

        // Daffakayesss
        // GRAFIK RARI AKUMULASI START
        $year = Carbon::now()->year;

        $data3 = DB::table('target as t')
            ->select(DB::raw('date_format(TANGGAL_TARGET, "%m") as BulanDate'), DB::raw('date_format(TANGGAL_TARGET, "%M") as BulanName'), DB::raw('(SELECT SUM(x.TARGET) FROM target x WHERE date_format(x.TANGGAL_TARGET, "%m") <= date_format(t.TANGGAL_TARGET, "%m") AND date_format(x.TANGGAL_TARGET, "%Y") = "'.$year.'") as target'))
            ->where(DB::raw('date_format(t.TANGGAL_TARGET, "%Y")'), '=', $year)
            ->orderBy('BulanDate', 'asc')
            ->get();

        $query_dalam = DB::table('detailcustomer as dcs')
        ->select('bd.ID_BULAN', 'bd.NAMA_BULAN', DB::raw('SUM(CASE WHEN dcs.REALISASI_JML_UNIT IS NULL THEN 0 ELSE dcs.REALISASI_JML_UNIT END) as target'))
        ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', DB::raw('date_format(dcs.TANGGAL_REALISASI, "%m")'))
        ->where(DB::raw('date_format(dcs.TANGGAL_REALISASI, "%Y")'), '=', $year)
        ->orwhereNull(DB::raw('date_format(dcs.TANGGAL_REALISASI, "%Y")'))
        ->groupBy('bd.ID_BULAN')
        ->orderBy('bd.ID_BULAN', 'asc');

        $data4 = DB::table($query_dalam, 'tbl_1')
        ->select('ID_BULAN as BulanDate', 'NAMA_BULAN as BulanName', DB::raw('(SELECT CASE WHEN SUM(x.REALISASI_JML_UNIT) IS NULL THEN 0 ELSE SUM(x.REALISASI_JML_UNIT) END FROM detailcustomer x WHERE CAST(date_format(x.TANGGAL_REALISASI, "%m") AS UNSIGNED) <= CAST(tbl_1.ID_BULAN AS UNSIGNED) AND date_format(x.TANGGAL_REALISASI, "%Y") = '.$year.') as closing'))
        ->orderBy('BulanDate', 'asc')
        ->get();

        // GRAFIK RARI PER BULAN
        $datax = DB::table('target as tg')
            ->selectRaw('bd.ID_BULAN as BulanDate, bd.NAMA_BULAN as BulanName, SUM(CASE WHEN STATUS = 1 THEN TARGET ELSE 0 END) as target')
            ->rightJoin('bulan_dummy as bd', DB::raw('date_format(tg.TANGGAL_TARGET, "%m")'), '=', 'bd.ID_BULAN')
            ->where(DB::raw('date_format(tg.TANGGAL_TARGET, "%Y")'), '=', $year)
            ->groupBy('bd.ID_BULAN')
            ->orderBy('bd.ID_BULAN', 'asc')
            ->get();

        $datari = DB::table('detailcustomer as dcs')
            ->selectRaw('bd.ID_BULAN as BulanDate, bd.NAMA_BULAN as BulanName, CASE WHEN SUM(REALISASI_JML_UNIT) IS NULL THEN 0 ELSE SUM(REALISASI_JML_UNIT) END as closing')
            ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', DB::raw('date_format(dcs.TANGGAL_REALISASI, "%m")'))
            ->where(DB::raw('date_format(dcs.TANGGAL_REALISASI, "%Y")'), '=', $year)
            ->groupBy('bd.ID_BULAN', DB::raw('date_format(dcs.TANGGAL_REALISASI, "%Y")'))
            ->orderBy('bd.ID_BULAN', 'asc');

        $dataxx = DB::table($datari, 'tbl_1')
        ->select('bd.ID_BULAN', 'bd.NAMA_BULAN AS BulanName', DB::raw('CASE WHEN closing IS NULL THEN 0 ELSE closing END AS closing'))
        ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', 'tbl_1.BulanDate')
        ->orderBy('bd.ID_BULAN', 'asc')
        ->get();
        // GRAFIK AKUMULASI END

        //GRAFIK DIDI START
        //merah
        $data5 = DB::table('target_sales as t')
            ->select(DB::raw('date_format(TANGGAL, "%m") as BulanDate'), DB::raw('date_format(TANGGAL, "%M") as BulanName'), DB::raw('(SELECT SUM(x.TARGET) FROM target_sales x WHERE date_format(x.TANGGAL, "%m") <= date_format(t.TANGGAL, "%m") AND date_format(x.TANGGAL, "%Y") = "'.$year.'") as target'))
            ->where(DB::raw('date_format(t.TANGGAL, "%Y")'), '=', $year)
            ->orderBy('BulanDate', 'asc')
            ->get();
        //end merah

        //biru
        $query_dd2 = DB::table('grafik_sales')
        ->select(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT) as IDSALES'), DB::raw('IF(ID_AGENT > ID_SALES, NAMA_SALES, NAMA_AGENT) as NAMASALES'), 'BULAN_DATE AS ID_BULAN', 'BULAN_NAME', DB::raw('SUM(REALISASI_JML_UNIT) AS closing'))
        ->where(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT)'), '=', 'KA_003')
        ->whereNotNull('BULAN_DATE')
        ->where('TAHUN', '=', $year)
        ->groupBy('IDSALES', 'NAMASALES', 'ID_BULAN', 'BULAN_NAME')
        ->orderBy('BULAN_DATE', 'asc');

        $data6 = DB::table($query_dd2, 'tbl_1')
        ->select('bd.ID_BULAN', 'bd.NAMA_BULAN AS BulanName', DB::raw('CASE WHEN closing IS NULL THEN 0 ELSE closing END AS closing'))
        ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', 'tbl_1.ID_BULAN')
        ->orderBy('bd.ID_BULAN', 'asc')
        ->get();
        //end biru
        //GRAFIK DIDI END

        //GRAFIK FENDI START
        //merah
        $data7 = DB::table('target_sales as t')
            ->select(DB::raw('date_format(TANGGAL, "%m") as BulanDate'), DB::raw('date_format(TANGGAL, "%M") as BulanName'), DB::raw('(SELECT SUM(x.TARGET) FROM target_sales x WHERE date_format(x.TANGGAL, "%m") <= date_format(t.TANGGAL, "%m") AND date_format(x.TANGGAL, "%Y") = "'.$year.'") as target'))
            ->where(DB::raw('date_format(t.TANGGAL, "%Y")'), '=', $year)
            ->orderBy('BulanDate', 'asc')
            ->get();
        //end merah

        //biru
        $query_fd2 = DB::table('grafik_sales')
        ->select(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT) as IDSALES'), DB::raw('IF(ID_AGENT > ID_SALES, NAMA_SALES, NAMA_AGENT) as NAMASALES'), 'BULAN_DATE AS ID_BULAN', 'BULAN_NAME', DB::raw('SUM(REALISASI_JML_UNIT) AS closing'))
        ->where(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT)'), '=', 'KA_005')
        ->whereNotNull('BULAN_DATE')
        ->where('TAHUN', '=', $year)
        ->groupBy('IDSALES', 'NAMASALES', 'ID_BULAN', 'BULAN_NAME')
        ->orderBy('BULAN_DATE', 'asc');

        $data8 = DB::table($query_fd2, 'tbl_1')
        ->select('bd.ID_BULAN', 'bd.NAMA_BULAN AS BulanName', DB::raw('CASE WHEN closing IS NULL THEN 0 ELSE closing END AS closing'))
        ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', 'tbl_1.ID_BULAN')
        ->orderBy('bd.ID_BULAN', 'asc')
        ->get();
        //end biru
        //GRAFIK FENDI END

        //GRAFIK ERI START
        //merah
        $data9 = DB::table('target_sales as t')
            ->select(DB::raw('date_format(TANGGAL, "%m") as BulanDate'), DB::raw('date_format(TANGGAL, "%M") as BulanName'), DB::raw('(SELECT SUM(x.TARGET) FROM target_sales x WHERE date_format(x.TANGGAL, "%m") <= date_format(t.TANGGAL, "%m") AND date_format(x.TANGGAL, "%Y") = "'.$year.'") as target'))
            ->where(DB::raw('date_format(t.TANGGAL, "%Y")'), '=', $year)
            ->orderBy('BulanDate', 'asc')
            ->get();
        //end merah

        //biru
        $query_er2 = DB::table('grafik_sales')
        ->select(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT) as IDSALES'), DB::raw('IF(ID_AGENT > ID_SALES, NAMA_SALES, NAMA_AGENT) as NAMASALES'), 'BULAN_DATE AS ID_BULAN', 'BULAN_NAME', DB::raw('SUM(REALISASI_JML_UNIT) AS closing'))
        ->where(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT)'), '=', 'KA_006')
        ->whereNotNull('BULAN_DATE')
        ->where('TAHUN', '=', $year)
        ->groupBy('IDSALES', 'NAMASALES', 'ID_BULAN', 'BULAN_NAME')
        ->orderBy('BULAN_DATE', 'asc');

        $data10 = DB::table($query_er2, 'tbl_1')
        ->select('bd.ID_BULAN', 'bd.NAMA_BULAN AS BulanName', DB::raw('CASE WHEN closing IS NULL THEN 0 ELSE closing END AS closing'))
        ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', 'tbl_1.ID_BULAN')
        ->orderBy('bd.ID_BULAN', 'asc')
        ->get();
        //end biru
        //GRAFIK ERI END

        //GRAFIK DEWI START
        //merah
        $data11 = DB::table('target_sales as t')
            ->select(DB::raw('date_format(TANGGAL, "%m") as BulanDate'), DB::raw('date_format(TANGGAL, "%M") as BulanName'), DB::raw('(SELECT SUM(x.TARGET) FROM target_sales x WHERE date_format(x.TANGGAL, "%m") <= date_format(t.TANGGAL, "%m") AND date_format(x.TANGGAL, "%Y") = "'.$year.'") as target'))
            ->where(DB::raw('date_format(t.TANGGAL, "%Y")'), '=', $year)
            ->orderBy('BulanDate', 'asc')
            ->get();
        //end merah

        //biru
        $query_dw2 = DB::table('grafik_sales')
        ->select(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT) as IDSALES'), DB::raw('IF(ID_AGENT > ID_SALES, NAMA_SALES, NAMA_AGENT) as NAMASALES'), 'BULAN_DATE AS ID_BULAN', 'BULAN_NAME', DB::raw('SUM(REALISASI_JML_UNIT) AS closing'))
        ->where(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT)'), '=', 'KA_007')
        ->whereNotNull('BULAN_DATE')
        ->where('TAHUN', '=', $year)
        ->groupBy('IDSALES', 'NAMASALES', 'ID_BULAN', 'BULAN_NAME')
        ->orderBy('BULAN_DATE', 'asc');

        $data12 = DB::table($query_dw2, 'tbl_1')
        ->select('bd.ID_BULAN', 'bd.NAMA_BULAN AS BulanName', DB::raw('CASE WHEN closing IS NULL THEN 0 ELSE closing END AS closing'))
        ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', 'tbl_1.ID_BULAN')
        ->orderBy('bd.ID_BULAN', 'asc')
        ->get();
        //end biru
        //GRAFIK DEWI END

        $id_usr = $request->session()->get('user');
        if ($id_usr == null) {
            return Redirect::to('/');
        } else {
            return View('index_admin')
            ->with('kateg', $tabelbaru)
            ->with('kuy', $data)
            ->with('kams', $data2)
            //Daffakayess
            ->with('targetMarketing', $data3)
            ->with('closingLila', $data4)
            ->with('targetSales', $datax)
            ->with('closingSales', $dataxx)
            ->with('targetDidi', $data5)
            ->with('closingDidi', $data6)
            ->with('targetFendi', $data7)
            ->with('closingFendi', $data8)
            ->with('targetEri', $data9)
            ->with('closingEri', $data10)
            ->with('targetDewi', $data11)
            ->with('closingDewi', $data12);
        }
    }



    public function indexmana(Request $request)
    {
        $mytime = Carbon::now();
        $data = DB::table('karyawan')
            ->where('JABATAN', '=', 'Sales')
            ->get();
        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->where('jd.TANGGAL', '=', $mytime->toDateString())
            ->get();
        $tabelbaru = DB::table('kat_jadwal')->get();

        // Daffakayesss
        // GRAFIK RARI AKUMULASI START
        $year = Carbon::now()->year;

        $data3 = DB::table('target as t')
            ->select(DB::raw('date_format(TANGGAL_TARGET, "%m") as BulanDate'), DB::raw('date_format(TANGGAL_TARGET, "%M") as BulanName'), DB::raw('(SELECT SUM(x.TARGET) FROM target x WHERE date_format(x.TANGGAL_TARGET, "%m") <= date_format(t.TANGGAL_TARGET, "%m") AND date_format(x.TANGGAL_TARGET, "%Y") = "'.$year.'") as target'))
            ->where(DB::raw('date_format(t.TANGGAL_TARGET, "%Y")'), '=', $year)
            ->orderBy('BulanDate', 'asc')
            ->get();

        $query_dalam = DB::table('detailcustomer as dcs')
        ->select('bd.ID_BULAN', 'bd.NAMA_BULAN', DB::raw('SUM(CASE WHEN dcs.REALISASI_JML_UNIT IS NULL THEN 0 ELSE dcs.REALISASI_JML_UNIT END) as target'))
        ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', DB::raw('date_format(dcs.TANGGAL_REALISASI, "%m")'))
        ->where(DB::raw('date_format(dcs.TANGGAL_REALISASI, "%Y")'), '=', $year)
        ->orwhereNull(DB::raw('date_format(dcs.TANGGAL_REALISASI, "%Y")'))
        ->groupBy('bd.ID_BULAN')
        ->orderBy('bd.ID_BULAN', 'asc');

        $data4 = DB::table($query_dalam, 'tbl_1')
        ->select('ID_BULAN as BulanDate', 'NAMA_BULAN as BulanName', DB::raw('(SELECT CASE WHEN SUM(x.REALISASI_JML_UNIT) IS NULL THEN 0 ELSE SUM(x.REALISASI_JML_UNIT) END FROM detailcustomer x WHERE CAST(date_format(x.TANGGAL_REALISASI, "%m") AS UNSIGNED) <= CAST(tbl_1.ID_BULAN AS UNSIGNED) AND date_format(x.TANGGAL_REALISASI, "%Y") = '.$year.') as closing'))
        ->orderBy('BulanDate', 'asc')
        ->get();

        // GRAFIK RARI PER BULAN
        $datax = DB::table('target as tg')
            ->selectRaw('bd.ID_BULAN as BulanDate, bd.NAMA_BULAN as BulanName, SUM(CASE WHEN STATUS = 1 THEN TARGET ELSE 0 END) as target')
            ->rightJoin('bulan_dummy as bd', DB::raw('date_format(tg.TANGGAL_TARGET, "%m")'), '=', 'bd.ID_BULAN')
            ->where(DB::raw('date_format(tg.TANGGAL_TARGET, "%Y")'), '=', $year)
            ->groupBy('bd.ID_BULAN')
            ->orderBy('bd.ID_BULAN', 'asc')
            ->get();

        $dataxx = DB::table('detailcustomer as dcs')
            ->selectRaw('bd.ID_BULAN as BulanDate, bd.NAMA_BULAN as BulanName, CASE WHEN SUM(REALISASI_JML_UNIT) IS NULL THEN 0 ELSE SUM(REALISASI_JML_UNIT) END as closing')
            ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', DB::raw('date_format(dcs.TANGGAL_REALISASI, "%m")'))
            ->groupBy('bd.ID_BULAN')
            ->orderBy('bd.ID_BULAN', 'asc')
            ->get();
        // GRAFIK AKUMULASI END

        $id_usr = $request->session()->get('user');
        if ($id_usr == null) {
            return Redirect::to('/');
        } else {
            return View('index_mana')
            ->with('kateg', $tabelbaru)
            ->with('kuy', $data)
            ->with('kams', $data2)
            //Daffakayess
            ->with('targetMarketing', $data3)
            ->with('closingLila', $data4)
            ->with('targetSales', $datax)
            ->with('closingSales', $dataxx);
        }
    }
    public function indexau(Request $request)
    {
        $mytime = Carbon::now();
        // $bulan = $mytime->month();
        // $tahun = $mytime->year();
        $data = DB::table('karyawan')
            ->where('JABATAN', '=', 'Sales')
            ->get();
        $data2 = DB::table('jadwal as jd')->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')->where('jd.ID_KARYAWAN', '=', $request->session()->get('user')[0])->get();
        $data3 = DB::table('jadwal as jd')->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')->get();
        $data4 = DB::table('laporan as lp')
            ->leftjoin('files as f', 'f.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->select(DB::raw('lp.*, f.*, lp.ID_LAPORAN AS "Winter"'))
            ->where('lp.ID_KARYAWAN', '=', $request->session()->get('user')[0])
            ->get()->sortByDesc('TANGGAL_LAPORAN');

            $data5 = DB::table('pameran')
            ->where(DB::raw('DATE_FORMAT(TANGGAL_AWAL, "%m %Y")'), '=', $mytime->format('m Y') )
            ->get();
        return View('index_au')->with('kuy', $data)->with('jadwal', $data2)->with('jadwal2', $data3)->with('laporan', $data4)->with('jadpem', $data5);
    }
    public function proseslogin(Request $request)
    {
        $database =  DB::table('karyawan')
            ->where('ID_USER', '=',  $request->input('user'))
            ->where('PASSWORD', '=',  $request->input('password'))
            ->where('STATUS', '=', 1)
            ->get();

        if (count($database) == 1) {
            $log =  DB::table('karyawan')
                ->where('ID_USER', '=',  $request->input('user'))
                ->where('PASSWORD', '=',  $request->input('password'))
                ->first();
            // $request->session()->put('user', $log->NAMA_KARYAWAN);
            $request->session()->put('user', [$log->ID_KARYAWAN, $log->NAMA_KARYAWAN]);

            if ($log->JABATAN == 'Kepala Divisi') {
                Alert::success('Berhasil Masuk', 'Selamat Anda Berhasil Masuk Ke Tampilan Kepala Divisi');
                return Redirect::to('index_admin');
            } else if ($log->JABATAN == 'Agent') {
                Alert::success('Berhasil Masuk', 'Selamat Anda Berhasil Masuk Ke Tampilan Agent Under');
                return Redirect::to('index_au');
            } else if ($log->JABATAN == 'Manajemen') {
                Alert::success('Berhasil Masuk', 'Selamat Anda Berhasil Masuk Ke Tampilan Manajemen');
                return Redirect::to('index_mana');
            } else {
                Alert::success('Berhasil Masuk', 'Selamat Anda Berhasil Masuk Ke Tampilan Sales');
                return Redirect::to('index_sales');
            }
        } else {
            Alert::info('Informasi Akun', 'Mohon Maaf Atas Akun Anda Masih Dalam Proses Penangguhan Silahkan Cek Email Yang Anda Daftarkan Untuk Informasi Lengkap');
            return Redirect::to('/');

        }
    }
    public function prosesregister(Request $request)
    {
        $data = array(
            'ID_KARYAWAN' => $request->input('id_karyawan'),
            'ID_USER' => $request->input('id_user'),
            'PASSWORD' => $request->input('password'),
            'NAMA_KARYAWAN' => $request->input('nama'),
            'TTL' => $request->input('ttl'),
            'ALAMAT' => $request->input('alamat'),
            'EMAIL' => $request->input('email'),
            'BENDERA' => $request->input('bendera'),
            'NO_TLP' => $request->input('notelp'),
            'JABATAN' => $request->input('jabatan'),
            'STATUS' => $request->input('status')
        );

        DB::table('karyawan')->insert($data);
        return Redirect::to('./');
    }

    public function proseskeluar(Request $request)
    {
        $request->session()->forget('user');
        return View('login');
    }

    public function Pencatatan(Request $request)
    {
        $data = DB::table('karyawan AS k')
            ->selectRaw('k.*, m.NAMA_KARYAWAN AS "Manager"')
            ->where('k.status', '=', '1')
            ->leftJoin('karyawan AS m', 'k.id_penanggung', '=', 'm.id_karyawan')
            ->get();
        return View('pencatatan')->with('daftar', $data);
    }
    public function Pencatatanman(Request $request)
    {
        $data = DB::table('karyawan AS k')
            ->selectRaw('k.*, m.NAMA_KARYAWAN AS "Manager"')
            ->where('k.status', '=', '1')
            ->leftJoin('karyawan AS m', 'k.id_penanggung', '=', 'm.id_karyawan')
            ->get();
        return View('karyawanman')->with('daftar', $data);
    }
    public function indexsales(Request $request)
    {

        $notif = DB::table('notif as nt')
        ->join('jadwal as jd', 'jd.ID_JADWAL', '=', 'nt.ID_JADWAL' )
        ->select('nt.ID_KARYAWAN', 'jd.TANGGAL', 'nt.ID_JADWAL', 'jd.JADWAL')
        ->where('nt.ID_KARYAWAN', '=', $request->session()->get('user')[0])
        ->where('nt.STATUS', '=', 0)->get();

        // $mytime = Carbon::now();
        $data = DB::table('karyawan')
            ->where('JABATAN', '=', 'Sales')
            ->get();
        $data2 = DB::table('jadwal as jd')->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
        ->where('jd.ID_KARYAWAN', '=', $request->session()->get('user')[0])->simplePaginate(5);
        $data3 = DB::table('jadwal as jd')->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')->simplePaginate(10);
        $data4 = DB::table('laporan as lp')
            ->leftjoin('files as f', 'f.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->select(DB::raw('lp.*, f.*, lp.ID_LAPORAN AS "Winter"'))
            ->where('lp.ID_KARYAWAN', '=', $request->session()->get('user')[0])
            ->orderByDesc('TANGGAL_LAPORAN')->simplePaginate(10);

        // Daffakayesss
        $year = Carbon::now()->year;
        //GRAFIK DIDI START
        //merah
        $data5 = DB::table('target_sales as t')
            ->select(DB::raw('date_format(TANGGAL, "%m") as BulanDate'), DB::raw('date_format(TANGGAL, "%M") as BulanName'), DB::raw('(SELECT SUM(x.TARGET) FROM target_sales x WHERE date_format(x.TANGGAL, "%m") <= date_format(t.TANGGAL, "%m") AND date_format(x.TANGGAL, "%Y") = "'.$year.'") as target'))
            ->where(DB::raw('date_format(t.TANGGAL, "%Y")'), '=', $year)
            ->orderBy('BulanDate', 'asc')
            ->get();
        //end merah

        //biru
        $query_dd2 = DB::table('grafik_sales')
        ->select(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT) as IDSALES'), DB::raw('IF(ID_AGENT > ID_SALES, NAMA_SALES, NAMA_AGENT) as NAMASALES'), 'BULAN_DATE AS ID_BULAN', 'BULAN_NAME', DB::raw('SUM(REALISASI_JML_UNIT) AS closing'))
        ->where(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT)'), '=', 'KA_003')
        ->whereNotNull('BULAN_DATE')
        ->where('TAHUN', '=', $year)
        ->groupBy('IDSALES', 'NAMASALES', 'ID_BULAN', 'BULAN_NAME')
        ->orderBy('BULAN_DATE', 'asc');

        $data6 = DB::table($query_dd2, 'tbl_1')
        ->select('bd.ID_BULAN', 'bd.NAMA_BULAN AS BulanName', DB::raw('CASE WHEN closing IS NULL THEN 0 ELSE closing END AS closing'))
        ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', 'tbl_1.ID_BULAN')
        ->orderBy('bd.ID_BULAN', 'asc')
        ->get();
        //end biru
        //GRAFIK DIDI END

        //GRAFIK FENDI START
        //merah
        $data7 = DB::table('target_sales as t')
            ->select(DB::raw('date_format(TANGGAL, "%m") as BulanDate'), DB::raw('date_format(TANGGAL, "%M") as BulanName'), DB::raw('(SELECT SUM(x.TARGET) FROM target_sales x WHERE date_format(x.TANGGAL, "%m") <= date_format(t.TANGGAL, "%m") AND date_format(x.TANGGAL, "%Y") = "'.$year.'") as target'))
            ->where(DB::raw('date_format(t.TANGGAL, "%Y")'), '=', $year)
            ->orderBy('BulanDate', 'asc')
            ->get();
        //end merah

        //biru
        $query_fd2 = DB::table('grafik_sales')
        ->select(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT) as IDSALES'), DB::raw('IF(ID_AGENT > ID_SALES, NAMA_SALES, NAMA_AGENT) as NAMASALES'), 'BULAN_DATE AS ID_BULAN', 'BULAN_NAME', DB::raw('SUM(REALISASI_JML_UNIT) AS closing'))
        ->where(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT)'), '=', 'KA_005')
        ->whereNotNull('BULAN_DATE')
        ->where('TAHUN', '=', $year)
        ->groupBy('IDSALES', 'NAMASALES', 'ID_BULAN', 'BULAN_NAME')
        ->orderBy('BULAN_DATE', 'asc');

        $data8 = DB::table($query_fd2, 'tbl_1')
        ->select('bd.ID_BULAN', 'bd.NAMA_BULAN AS BulanName', DB::raw('CASE WHEN closing IS NULL THEN 0 ELSE closing END AS closing'))
        ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', 'tbl_1.ID_BULAN')
        ->orderBy('bd.ID_BULAN', 'asc')
        ->get();
        //end biru
        //GRAFIK FENDI END

        //GRAFIK ERI START
        //merah
        $data9 = DB::table('target_sales as t')
            ->select(DB::raw('date_format(TANGGAL, "%m") as BulanDate'), DB::raw('date_format(TANGGAL, "%M") as BulanName'), DB::raw('(SELECT SUM(x.TARGET) FROM target_sales x WHERE date_format(x.TANGGAL, "%m") <= date_format(t.TANGGAL, "%m") AND date_format(x.TANGGAL, "%Y") = "'.$year.'") as target'))
            ->where(DB::raw('date_format(t.TANGGAL, "%Y")'), '=', $year)
            ->orderBy('BulanDate', 'asc')
            ->get();
        //end merah

        //biru
        $query_er2 = DB::table('grafik_sales')
        ->select(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT) as IDSALES'), DB::raw('IF(ID_AGENT > ID_SALES, NAMA_SALES, NAMA_AGENT) as NAMASALES'), 'BULAN_DATE AS ID_BULAN', 'BULAN_NAME', DB::raw('SUM(REALISASI_JML_UNIT) AS closing'))
        ->where(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT)'), '=', 'KA_006')
        ->whereNotNull('BULAN_DATE')
        ->where('TAHUN', '=', $year)
        ->groupBy('IDSALES', 'NAMASALES', 'ID_BULAN', 'BULAN_NAME')
        ->orderBy('BULAN_DATE', 'asc');

        $data10 = DB::table($query_er2, 'tbl_1')
        ->select('bd.ID_BULAN', 'bd.NAMA_BULAN AS BulanName', DB::raw('CASE WHEN closing IS NULL THEN 0 ELSE closing END AS closing'))
        ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', 'tbl_1.ID_BULAN')
        ->orderBy('bd.ID_BULAN', 'asc')
        ->get();
        //end biru
        //GRAFIK ERI END

        //GRAFIK DEWI START
        //merah
        $data11 = DB::table('target_sales as t')
            ->select(DB::raw('date_format(TANGGAL, "%m") as BulanDate'), DB::raw('date_format(TANGGAL, "%M") as BulanName'), DB::raw('(SELECT SUM(x.TARGET) FROM target_sales x WHERE date_format(x.TANGGAL, "%m") <= date_format(t.TANGGAL, "%m") AND date_format(x.TANGGAL, "%Y") = "'.$year.'") as target'))
            ->where(DB::raw('date_format(t.TANGGAL, "%Y")'), '=', $year)
            ->orderBy('BulanDate', 'asc')
            ->get();
        //end merah

        //biru
        $query_dw2 = DB::table('grafik_sales')
        ->select(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT) as IDSALES'), DB::raw('IF(ID_AGENT > ID_SALES, NAMA_SALES, NAMA_AGENT) as NAMASALES'), 'BULAN_DATE AS ID_BULAN', 'BULAN_NAME', DB::raw('SUM(REALISASI_JML_UNIT) AS closing'))
        ->where(DB::raw('IF(ID_AGENT > ID_SALES, ID_SALES, ID_AGENT)'), '=', 'KA_007')
        ->whereNotNull('BULAN_DATE')
        ->where('TAHUN', '=', $year)
        ->groupBy('IDSALES', 'NAMASALES', 'ID_BULAN', 'BULAN_NAME')
        ->orderBy('BULAN_DATE', 'asc');

        $data12 = DB::table($query_dw2, 'tbl_1')
        ->select('bd.ID_BULAN', 'bd.NAMA_BULAN AS BulanName', DB::raw('CASE WHEN closing IS NULL THEN 0 ELSE closing END AS closing'))
        ->rightJoin('bulan_dummy as bd', 'bd.ID_BULAN', '=', 'tbl_1.ID_BULAN')
        ->orderBy('bd.ID_BULAN', 'asc')
        ->get();
        //end biru
        //GRAFIK DEWI END

        return View('index_sales')->with('kuy', $data)->with('jadwal', $data2)->with('jadwal2', $data3)->with('laporan', $data4)
            ->with('targetDidi', $data5)
            ->with('closingDidi', $data6)
            ->with('targetFendi', $data7)
            ->with('closingFendi', $data8)
            ->with('targetEri', $data9)
            ->with('closingEri', $data10)
            ->with('targetDewi', $data11)
            ->with('closingDewi', $data12)
            ->with('notif', $notif);
    }
    public function notifreport($ID_JADWAL)
    {


      DB::table('notif')
            ->where('ID_JADWAL', '=', $ID_JADWAL)
            ->delete();
            return Redirect::to('reportjadwal/'.$ID_JADWAL);

    }
    public function reportsales(Request $request)
    {
        $data = DB::table('karyawan')
            ->where('JABATAN', '=', 'Sales')
            ->get();
        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')->where('jd.ID_KARYAWAN', '=', $request->session()->get('user')[0])->orderByDesc('TANGGAL')->get();
        return View('report_sales')->with('kuy', $data)->with('jadwal', $data2);
    }
    public function historyreportsales(Request $request)
    {
        // $data = DB::table('karyawan')
        //     ->where('JABATAN', '=', 'Sales')
        //     ->get();
        //     $data2 = DB::table('jadwal as jd')
        //     ->join('karyawan as ka', 'ka.ID_KARYAWAN' , '=' , 'jd.ID_KARYAWAN')->where('jd.ID_KARYAWAN', '=', $request->session()->get('user')[0])->get();
        $data4 = DB::table('laporan as lp')
            ->leftjoin('files as f', 'f.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->select(DB::raw('lp.*, f.*, lp.ID_LAPORAN AS "Winter"'))
            ->where('lp.ID_KARYAWAN', '=', $request->session()->get('user')[0])
            ->get();
        return View('historyreport')->with('laporan', $data4);
    }
    public function filtertanggallaporansales(Request $request)
    {
        $tanggal = array(
            'tgl_awal' => date("Y-m-d", strtotime($request->input('tanggal_awal'))),
            'tgl_akhir' => date("Y-m-d", strtotime($request->input('tanggal_akhir')))
        );
        $object = json_decode(json_encode($tanggal), FALSE);
        $data4 = DB::table('laporan as lp')
            ->leftjoin('files as f', 'f.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->select(DB::raw('lp.*, f.*, lp.ID_LAPORAN AS "Winter"'))
            ->where('lp.ID_KARYAWAN', '=', $request->session()->get('user')[0])
            ->whereBetween('lp.TANGGAL_LAPORAN', [$object->tgl_awal, $object->tgl_akhir])
            ->orderBy('lp.TANGGAL_LAPORAN', 'ASC')
            ->get();
        return View('historyreport')->with('laporan', $data4);
    }
    public function filtertanggallaporan(Request $request)
    {
        $tanggal = array(
            'tgl_awal' => date("Y-m-d", strtotime($request->input('tanggal_awal'))),
            'tgl_akhir' => date("Y-m-d", strtotime($request->input('tanggal_akhir')))
        );
        $object = json_decode(json_encode($tanggal), FALSE);
        $data = DB::table('laporan as lp')
            ->select(DB::raw('count(ID_CUSTOMER) as jumlah'), 'lp.ID_LAPORAN', 'NAMA_KARYAWAN', 'TANGGAL_LAPORAN', 'KEGIATAN', 'KETERANGAN', 'DOKUMENTASI', 'WI', 'name')
            ->leftjoin('customer as cs', 'cs.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->join('karyawan as kar', 'kar.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->leftjoin('files as f', 'f.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->groupBy('lp.ID_LAPORAN', 'NAMA_KARYAWAN', 'TANGGAL_LAPORAN', 'KEGIATAN', 'KETERANGAN', 'DOKUMENTASI', 'WI', 'name')
            ->whereBetween('lp.TANGGAL_LAPORAN', [$object->tgl_awal, $object->tgl_akhir])
            ->orderBy('lp.TANGGAL_LAPORAN', 'ASC')
            ->get();
        return View('monitorlaporan')->with('laporan', $data);
    }

    public function filtertanggallaporanman(Request $request)
    {
        $tanggal = array(
            'tgl_awal' => date("Y-m-d", strtotime($request->input('tanggal_awal'))),
            'tgl_akhir' => date("Y-m-d", strtotime($request->input('tanggal_akhir')))
        );
        $object = json_decode(json_encode($tanggal), FALSE);
        $data = DB::table('laporan as lp')
            ->select(DB::raw('count(ID_CUSTOMER) as jumlah'), 'lp.ID_LAPORAN', 'NAMA_KARYAWAN', 'TANGGAL_LAPORAN', 'KEGIATAN', 'KETERANGAN', 'DOKUMENTASI', 'WI', 'name')
            ->leftjoin('customer as cs', 'cs.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->join('karyawan as kar', 'kar.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->leftjoin('files as f', 'f.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->groupBy('lp.ID_LAPORAN', 'NAMA_KARYAWAN', 'TANGGAL_LAPORAN', 'KEGIATAN', 'KETERANGAN', 'DOKUMENTASI', 'WI', 'name')
            ->whereBetween('lp.TANGGAL_LAPORAN', [$object->tgl_awal, $object->tgl_akhir])
            ->orderBy('lp.TANGGAL_LAPORAN', 'ASC')
            ->get();
        return View('monitorlaporanman')->with('laporan', $data);
    }
    public function tampilcust(Request $request)
    {

        $data = DB::table('customer')
            ->get();
        $data2 = DB::table('customer as cs')->leftjoin('detailcustomer as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->join('laporan as lp', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->join('karyawan as kar', 'kar.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->where('lp.ID_KARYAWAN', '=', $request->session()->get('user')[0])->get()->sortByDesc('ID_CUSTOMER');
        $data3 = DB::table('customer as cs')->select('cs.ID_CUSTOMER', DB::raw('MAX(CASE WHEN k.TIPE_KRITERIA IS NULL THEN 0 ELSE k.TIPE_KRITERIA END) AS TIPE_KRIT'))
            ->leftJoin('detailkriteria as dk', 'cs.ID_CUSTOMER', '=', 'dk.ID_CUSTOMER')
            ->leftJoin('kriteria as k', 'k.ID_KRITERIA', '=', 'dk.ID_KRITERIA')
            ->groupBy('cs.ID_CUSTOMER')->get();
        return View('tampilcustomer')->with('customer', $data)->with('karyawan', $data2)->with('kriteria', $data3);
    }


    public function penjadwalan(Request $request)
    {
        $tabelbaru = DB::table('kat_jadwal')->get();
        $jumlah_row = DB::table('jadwal')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_jadwal = (object) array('MAX_ID_NUMBER' => 'JD_001');
        } else {
            $id_t = 0;
            $id = DB::table('jadwal')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('jadwal')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_jadwal = DB::table('jadwal')->select(DB::raw('CONCAT("JD_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }

        $data = DB::table('karyawan')
            ->where('JABATAN', '=', 'Sales')
            ->get();
        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->get();
        return View('jadwalkar')->with('kateg', $tabelbaru)->with('kuy', $data)->with('id_jadwal', $id_jadwal)->with('kams', $data2);
    }
    public function targetsales(Request $request)
    {

        $jumlah_row = DB::table('target_sales')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_jadwal = (object) array('MAX_ID_NUMBER' => 'TS_001');
        } else {
            $id_t = 0;
            $id = DB::table('target_sales')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_TASEL, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_TASEL, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('target_sales')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_TASEL, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_TASEL, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_jadwal = DB::table('target_sales')->select(DB::raw('CONCAT("TS_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }

        $data = DB::table('karyawan')
            ->where('JABATAN', '=', 'Sales')
            ->get();
        $data2 = DB::table('target_sales as jd')
            ->select(DB::raw('DATE_FORMAT(jd.TANGGAL, "%M %Y") as TANGGAL '), 'TANGGAL as TG','ID_TASEL','TARGET')
            ->simplePaginate(12);
        return View('target_sales')->with('kuy', $data)->with('id_jadwal', $id_jadwal)->with('kams', $data2);
    }

    public function penjadwalanpameran(Request $request)
    {

        $jumlah_row = DB::table('pameran')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_jadwal = (object) array('MAX_ID_NUMBER' => 'JP_001');
        } else {
            $id_t = 0;
            $id = DB::table('pameran')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_PAMERAN, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_PAMERAN, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('pameran')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_PAMERAN, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_PAMERAN, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_jadwal = DB::table('pameran')->select(DB::raw('CONCAT("JP_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        $data = DB::table('pameran')->get();


        return View('penjadwalanpameran')->with('id_jadwal', $id_jadwal)->with('data', $data);
    }
    public function catatkriteria(Request $request)
    {
        $data = DB::table('kriteria')->get();
        $jumlah_row = DB::table('kriteria')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_kriteria = (object) array('MAX_ID_NUMBER' => 'KR_001');
        } else {
            $id_t = 0;
            $id = DB::table('kriteria')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('kriteria')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_kriteria = DB::table('kriteria')->select(DB::raw('CONCAT("KR_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        return View('kriteria')->with('kuy', $data)->with('id_kriteria', $id_kriteria);

        // $data = DB::table('kriteria')->get();
        // return View('kriteria')->with('kuy', $data);
    }
    public function catattarget(Request $request)
    {

        $data = DB::table('target')
        ->select(DB::raw('DATE_FORMAT(TANGGAL_TARGET, "%M %Y") as TANGGAL '), 'TANGGAL_TARGET as TG', 'TARGET', 'STATUS')
        ->simplePaginate(12);
        return View('catat_target')->with('kuy', $data);
    }



    public function validasitargetman(Request $request)
    {

        $data = DB::table('target')
        ->select(DB::raw('DATE_FORMAT(TANGGAL_TARGET, "%M %Y") as TANGGAL_TARGET '),'TANGGAL_TARGET as TG' ,'TARGET', 'STATUS')
        ->get();
        return View('validasitarget')->with('kuy', $data);
    }
    public function tambahkar(Request $request)
    {
        $jumlah_row = DB::table('karyawan')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_karyawan = (object) array('MAX_ID_NUMBER' => 'KA_001');
        } else {
            $id_t = 0;
            $id = DB::table('karyawan')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_KARYAWAN, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_KARYAWAN, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('karyawan')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_KARYAWAN, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_KARYAWAN, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_karyawan = DB::table('karyawan')->select(DB::raw('CONCAT("KA_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        return View('tambahkar')->with('id_karyawan', $id_karyawan);
    }

    public function tambahkarman(Request $request)
    {
        $jumlah_row = DB::table('karyawan')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_karyawan = (object) array('MAX_ID_NUMBER' => 'KA_001');
        } else {
            $id_t = 0;
            $id = DB::table('karyawan')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_KARYAWAN, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_KARYAWAN, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('karyawan')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_KARYAWAN, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_KARYAWAN, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_karyawan = DB::table('karyawan')->select(DB::raw('CONCAT("KA_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        return View('tambahkarman')->with('id_karyawan', $id_karyawan);
    }
    public function validasiakses(Request $request)
    {
        $data = DB::table('karyawan')
            ->where('status', '=', '0')
            ->get();
        return View('waitinguser')->with('daftar', $data);
    }


    public function proseshapusakun($ID_KARYAWAN)
    {
        $data = DB::table('karyawan')->where('ID_KARYAWAN', '=', $ID_KARYAWAN)->first();

        return View::make('hapus_agent')->with('edit', $data);

    }

    public function proseshapuspenjadwalanpameran($ID_PAMERAN)
    {
        DB::table('pameran')->where('ID_PAMERAN', '=', $ID_PAMERAN)->delete();
        return Redirect::to('penjadwalanpameran');
    }
    public function prosesubahstatustarget($TANGGAL_TARGET)
    {
        $data = array(
            'STATUS' => 1
        );
        DB::table('target')->where('TANGGAL_TARGET', '=', $TANGGAL_TARGET)->update($data);
        return Redirect::to('validasitargetman');
    }
    public function edittargetproses(Request $request)
    {
        $data = array(
            'TARGET' => $request->input('target'),
            'STATUS' => 0
        );
        DB::table('target')->where('TANGGAL_TARGET', '=', $request->input('tanggal'))->update($data);
        return Redirect::to('catattarget');
    }
    public function edittargetprosesman(Request $request)
    {
        $data = array(
            'TARGET' => $request->input('target'),
            'STATUS' => 1
        );
        DB::table('target')->where('TANGGAL_TARGET', '=', $request->input('tanggal'))->update($data);
        return Redirect::to('validasitargetman');
    }

    public function proseshapustarget($TANGGAL_TARGET)
    {
        $data = array(
            'STATUS' => 2
        );
        DB::table('target')->where('TANGGAL_TARGET', '=', $TANGGAL_TARGET)->update($data);
        return Redirect::to('catattarget');
    }
    public function proseshapustargetman($TANGGAL_TARGET)
    {
        $data = array(
            'STATUS' => 2
        );
        DB::table('target')->where('TANGGAL_TARGET', '=', $TANGGAL_TARGET)->update($data);
        return Redirect::to('validasitargetman');
    }
    public function tambahkarya(Request $request)
    {
        $data = array(
            'ID_KARYAWAN' => $request->input('id_karyawan'),
            'ID_USER' => $request->input('id_user'),
            'PASSWORD' => $request->input('password'),
            'NAMA_KARYAWAN' => $request->input('nama_karyawan'),
            'TTL' => $request->input('ttl'),
            'ALAMAT' => $request->input('alamat'),
            'EMAIL' => $request->input('email'),
            'NO_TLP' => $request->input('no_tlp'),
            'JABATAN' => $request->input('jabatan'),
            'STATUS' => $request->input('status')
        );

        DB::table('karyawan')->insert($data);
        return Redirect::to('pencatatan');
    }

    public function tambahkaryaman(Request $request)
    {
        $data = array(
            'ID_KARYAWAN' => $request->input('id_karyawan'),
            'ID_USER' => $request->input('id_user'),
            'PASSWORD' => $request->input('password'),
            'NAMA_KARYAWAN' => $request->input('nama_karyawan'),
            'TTL' => $request->input('ttl'),
            'ALAMAT' => $request->input('alamat'),
            'EMAIL' => $request->input('email'),
            'NO_TLP' => $request->input('no_tlp'),
            'JABATAN' => $request->input('jabatan'),
            'STATUS' => $request->input('status')
        );

        DB::table('karyawan')->insert($data);
        return Redirect::to('pencatatan_man');
    }
    public function tambahtarget(Request $request)
    {
        $data = array(
            'TANGGAL_TARGET' => $request->input('tanggal'),
            'TARGET' => $request->input('target'),
            'STATUS' => 0,
        );

        DB::table('target')->insert($data);
        return Redirect::to('catattarget');
    }
    public function tambahtargetsales(Request $request)
    {
        $data = array(
            'ID_TASEL' => $request->input('id_jadwal'),
            'TANGGAL' => $request->input('tanggal'),
            'TARGET' => $request->input('target'),
            'STATUS' => 0,
        );

        DB::table('target_sales')->insert($data);
        return Redirect::to('targetsales');
    }
    public function tambahkriteria(Request $request)
    {
        $data = array(
            'ID_KRITERIA' => $request->input('id_kriteria'),
            'NAMA_KRITERIA' => $request->input('nama_kriteria'),
            'TIPE_KRITERIA' => $request->input('nilai'),
        );

        DB::table('kriteria')->insert($data);
        return Redirect::to('kriteriabisa');
    }
    public function tambahjadwal(Request $request)
    {
        $tanggal_array = explode(",", $request->input('tanggal'));
        for ($p = 0; $p < count($tanggal_array); $p++) {

            $jumlah_row = DB::table('jadwal')->select(DB::raw('COUNT(*) as JML'))->first();
            if ($jumlah_row->JML == 0) {
                $id_jadwal = (object) array('MAX_ID_NUMBER' => 'JD_001');
            } else {
                $id_t = 0;
                $id = DB::table('jadwal')
                    ->select(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL) AS ID_TIPE'))
                    ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)'), 'desc')
                    ->first();
                for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                    $id_t++;
                    $idb = DB::table('jadwal')
                        ->select(DB::raw('count(CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)) as jumlah'))
                        ->where(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)'), '=', $id_t)
                        ->first();
                    if ($idb->jumlah == 0) {
                        $i = $id->ID_TIPE + 1;
                    }
                }
                $id_jadwal = DB::table('jadwal')->select(DB::raw('CONCAT("JD_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
            }

            $data = array(
                'ID_JADWAL' => $id_jadwal->MAX_ID_NUMBER ,
                'ID_KARYAWAN' => $request->input('id_karyawan'),
                'TANGGAL' => $tanggal_array[$p],
                'JADWAL' => $request->input('jenis'),
                'KETERANGAN' => $request->input('keterangan'),
            );
            DB::table('jadwal')->insert($data);
        }

        return Redirect::to('penjadwalanbisa');
    }

    public function tampilcustomer()
    {
        $data = DB::table('customer')->get();
        return View('tampilcustomer')->with('customer', $data);
    }
    public function reporthariansales()
    {
        $data = DB::table('laporan as lp')
            ->leftjoin('files as f', 'f.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->select(DB::raw('lp.*, f.*, lp.ID_LAPORAN AS "Winter"'))
            ->get()->sortByDesc('TANGGAL_LAPORAN');

        $jumlah_row = DB::table('laporan')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $ID_LAPORAN = (object) array('MAX_ID_NUMBER' => 'LA_001');
        } else {
            $id_t = 0;
            $id = DB::table('laporan')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_LAPORAN, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_LAPORAN, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('laporan')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_LAPORAN, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_LAPORAN, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $ID_LAPORAN = DB::table('laporan')->select(DB::raw('CONCAT("LA_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        $jumlah_row = DB::table('customer')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $ID_CUSTOMER = (object) array('MAX_ID_NUMBER' => 'CS_001');
        } else {
            $id_t = 0;
            $id = DB::table('customer')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_CUSTOMER, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_CUSTOMER, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('customer')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_CUSTOMER, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_CUSTOMER, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $ID_CUSTOMER = DB::table('customer')->select(DB::raw('CONCAT("CS_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        $data2 = DB::table('karyawan')->get();
        return View('reportharian_sales')->with('ID_LAPORAN', $ID_LAPORAN)->with('laporan', $data)->with('nama', $data2)->with('ID_CUSTOMER', $ID_CUSTOMER);
        // return view('reportharian_sales')->with('report_harian', $data);
    }
    public function prosesreporthariansales(Request $request)
    {
        $data = array(
            'ID_LAPORAN' => $request->input('id_report'),
            'ID_KARYAWAN' => $request->input('id_karyawan'),
            'KEGIATAN' => $request->input('kegiatan'),
            'TANGGAL_LAPORAN' => $request->input('tanggal'),
            'KETERANGAN' => $request->input('keterangan'),
            'DOKUMENTASI' => $request->input('dokumentasi'),
            'WI' => $request->input('kehadiran'),
        );

        DB::table('laporan')->insert($data);



        return Redirect::to('editreportharian/' . $request->input('id_report'));
    }

    public function createForm($ID_LAPORAN)
    {
        $data = DB::table('laporan')->where('ID_LAPORAN', '=', $ID_LAPORAN)->first();
        return view('uploadfoto')->with('laporan', $data);
    }
    public function notifmana($ID_KARYAWAN, $ID_JADWAL)
    {
        $cek = DB::table('notif')
        ->select(DB::raw('COUNT(*) as JML'))
        ->where('ID_KARYAWAN', '=', $ID_KARYAWAN)
        ->where('ID_JADWAL', '=', $ID_JADWAL)
        ->where('STATUS', '=', 0)
        ->first();

        if($cek->JML == 0){
            $data = array(
                'ID_KARYAWAN' => $ID_KARYAWAN,
                'ID_JADWAL' => $ID_JADWAL,
                'STATUS' => 0,
            );
            DB::table('notif')->insert($data);
        }
        return Redirect::to('monitorjadwal');
    }

    public function fileUpload(Request $req)
    {
        // $data=array(
        //     'ID_LAPORAN' => $req->input('ID_LAPORAN'),
        // );
        // DB::table('files')->insert($data);

        $req->validate([
            'ID_LAPORAN' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg,jfif|max:4096'
        ]);

        $fileModel = new File;
        $fileModel->ID_LAPORAN = $req->input('ID_LAPORAN');
        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            // $fileModel->save();

            // $data=array(
            //     'ID_LAPORAN' => $req->input('id_report'),
            // );
            // DB::table('files')->insert($data);

            // return Redirect::to('view_reportharian_sales')
            // ->with('success','File has been uploaded.')
            // ->with('file', $fileName);
        }
        $fileModel->save();
        return Redirect::to('view_historyreport_sales')
            ->with('success', 'File has been uploaded.')
            ->with('file', $fileName);
    }

    public function editdatareportharian($ID_LAPORAN)
    {
        $data = DB::table('laporan')->where('ID_LAPORAN', '=', $ID_LAPORAN)->first();
        $data2 = DB::table('customer as cs')->select('cs.ID_CUSTOMER', 'NAMA_CUSTOMER', 'NOTLP_CUS', 'SUMBER', 'dc.UNIT_MINAT', 'dc.KETERANGAN_UNIT', 'JENIS')->leftJoin('detailcustomer as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')->where('cs.ID_LAPORAN', '=', $ID_LAPORAN)->get();
        $data3 = DB::table('customer as cs')->select('cs.ID_CUSTOMER', DB::raw('MAX(CASE WHEN k.TIPE_KRITERIA IS NULL THEN 0 ELSE k.TIPE_KRITERIA END) AS TIPE_KRIT'))
            ->leftJoin('detailkriteria as dk', 'cs.ID_CUSTOMER', '=', 'dk.ID_CUSTOMER')
            ->leftJoin('kriteria as k', 'k.ID_KRITERIA', '=', 'dk.ID_KRITERIA')
            ->groupBy('cs.ID_CUSTOMER')->get();
        return View::make('reportharianedit_sales')->with('laporan', $data)->with('customer', $data2)->with('prospekcust', $data3);
    }

    public function proseseditdatareportharian(Request $request)
    {
        $data = array(
            'ID_LAPORAN' => $request->input('id_laporan'),
            'ID_KARYAWAN' => $request->input('id_karyawan'),
            'KEGIATAN' => $request->input('kegiatan'),
            'TANGGAL_LAPORAN' => $request->input('tanggal'),
            'KETERANGAN' => $request->input('keterangan'),
        );
        DB::table('laporan')->where('ID_LAPORAN', '=', $request->input('id_laporan'))->update($data);
        // DB::table('karyawan')->where('ID_KARYAWAN','=',$request->input('id_karyawan'))->update($data);
        return Redirect::to('view_historyreport_sales');
    }
    // public function editdatareportharian2($ID_LAPORAN)
    // {
    //     $data = DB::table('laporan')->where('ID_LAPORAN', '=', $ID_LAPORAN)->first();
    //     return View::make('reporteditsales')->with('laporan', $data);
    // }
    public function editdatareport($ID_LAPORAN)
    {
        $data = DB::table('laporan as lp')->join('karyawan as kar', 'lp.ID_KARYAWAN', '=', 'kar.ID_KARYAWAN')->where('ID_LAPORAN', '=', $ID_LAPORAN)->first();
        return View::make('editreportharian')->with('laporan', $data);
    }
    public function proseseditdatareport(Request $request)
    {
        $data = array(
            'KEGIATAN' => $request->input('kegiatan'),
            'TANGGAL_LAPORAN' => $request->input('tanggal'),
            'KETERANGAN' => $request->input('keterangan'),
            'DOKUMENTASI' => $request->input('dokumentasi'),
            'WI' => $request->input('jenis'),
        );
        DB::table('laporan')->where('ID_LAPORAN', '=', $request->input('id_report'))->update($data);
        // DB::table('karyawan')->where('ID_KARYAWAN','=',$request->input('id_karyawan'))->update($data);
        return Redirect::to('monitoringlaporan');
    }
    public function tambahcustomer($ID_LAPORAN)
    {
        $data = DB::table('laporan as lp')->join('karyawan as kar', 'lp.ID_KARYAWAN', '=', 'kar.ID_KARYAWAN')->where('ID_LAPORAN', '=', $ID_LAPORAN)->first();
        $data2 = DB::table('kriteria')->where('TIPE_KRITERIA', '=', '1')->get();
        $data3 = DB::table('kriteria')->where('TIPE_KRITERIA', '=', '2')->get();
        return View::make('tambahcustomer')->with('laporan', $data)->with('kriteria1', $data2)->with('kriteria2', $data3);
    }
    public function prosestambahcust(Request $request)
    {
        $data = array(
            'ID_LAPORAN' => $request->input('id_laporan'),
            'NAMA_CUSTOMER' => $request->input('nama_customer'),
            'NOTLP_CUS' => $request->input('notlp'),
            'SUMBER' => $request->input('sumber'),
            'JENIS' => 0

        );

        DB::table('customer')->insert($data);
        $maxid = DB::table('customer')->select(DB::raw('MAX(ID_CUSTOMER) AS MAXIDCUST'), 'ID_LAPORAN')->where('ID_LAPORAN', '=', $request->input('id_laporan'))->groupBy('ID_LAPORAN')->first();
        DB::table('detailkriteria')->where('ID_CUSTOMER', '=', $maxid->MAXIDCUST)->delete();
        $krit = $request->input('krit');
        if ($krit) {
            $total = count($krit);
            for ($i = 0; $i < $total; $i++) {
                $data_krit = array(
                    'ID_CUSTOMER' => $maxid->MAXIDCUST,
                    'ID_KRITERIA' => $krit[$i],
                );
                DB::table('detailkriteria')->insert($data_krit);
            }
        }


        $data3 = DB::table('customer as cs')->select('cs.ID_CUSTOMER', DB::raw('MAX(CASE WHEN k.TIPE_KRITERIA IS NULL THEN 0 ELSE k.TIPE_KRITERIA END) AS TIPE_KRIT'))
            ->leftJoin('detailkriteria as dk', 'cs.ID_CUSTOMER', '=', 'dk.ID_CUSTOMER')
            ->leftJoin('kriteria as k', 'k.ID_KRITERIA', '=', 'dk.ID_KRITERIA')
            ->where('cs.ID_CUSTOMER', '=', $maxid->MAXIDCUST)
            ->groupBy('cs.ID_CUSTOMER')->first();

        if ($data3->TIPE_KRIT == 2) {
            $jenis = 2;
        } elseif ($data3->TIPE_KRIT == 1) {
            $jenis = 1;
        } elseif ($data3->TIPE_KRIT == 0) {
            $jenis = 0;
        }


        $data = array(
            'ID_LAPORAN' => $request->input('id_laporan'),
            'NAMA_CUSTOMER' => $request->input('nama_customer'),
            'NOTLP_CUS' => $request->input('notlp'),
            'SUMBER' => $request->input('sumber'),
            'JENIS' => $jenis,

        );
        DB::table('customer')->where('ID_CUSTOMER', '=', $maxid->MAXIDCUST)->update($data);
        return Redirect::to('editreportharian/' . $request->input('id_laporan'))->with('message', 'Berhasil Mengedit Data');
    }
    public function filterjadwal(Request $request)
    {
        $tabelbaru = DB::table('kat_jadwal')->get();
        $filter_kategori = $request->input('selector');


        $jumlah_row = DB::table('jadwal')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_jadwal = (object) array('MAX_ID_NUMBER' => 'JD_001');
        } else {
            $id_t = 0;
            $id = DB::table('jadwal')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('jadwal')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_jadwal = DB::table('jadwal')->select(DB::raw('CONCAT("KR_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }

        $data = DB::table('karyawan')
            ->where('JABATAN', '=', 'Sales')
            ->get();
        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->where('jd.JADWAL', '=', $filter_kategori)
            ->get();
        return View('jadwalkar')->with('kateg', $tabelbaru)->with('kuy', $data)->with('id_jadwal', $id_jadwal)->with('kams', $data2)->with('filter_kategori', $filter_kategori);
    }
    public function filtermonitoringkategori(Request $request)
    {
        $filter_kategori = $request->input('selector');
        $data = DB::table('customer as cs')
            ->leftjoin('detailcustomer as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->join('laporan as lp', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->leftjoin('karyawan as kar', 'kar.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->where('cs.JENIS', '=', $filter_kategori)
            ->get();

        return View('monitorcust')->with('customer', $data);
    }
    public function filtermonitoringkategoriman(Request $request)
    {
        $filter_kategori = $request->input('selector');
        $data = DB::table('customer as cs')
            ->leftjoin('detailcustomer as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->join('laporan as lp', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->leftjoin('karyawan as kar', 'kar.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->where('cs.JENIS', '=', $filter_kategori)
            ->get();

        return View('monitorcustman')->with('customer', $data);
    }

    public function filterjadwalcus(Request $request)
    {

        $filter_kategori = $request->input('selector');

        $data = DB::table('customer as cs')
            ->join('laporan as lp', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->join('karyawan as kar', 'kar.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->where('cs.JENIS', '=', $filter_kategori)
            ->get();

        $data2 = DB::table('customer as cs')
            ->select('cs.ID_CUSTOMER', DB::raw('MAX(CASE WHEN k.TIPE_KRITERIA IS NULL THEN 0 ELSE k.TIPE_KRITERIA END) AS TIPE_KRIT'))
            ->leftJoin('detailkriteria as dk', 'cs.ID_CUSTOMER', '=', 'dk.ID_CUSTOMER')
            ->leftJoin('kriteria as k', 'k.ID_KRITERIA', '=', 'dk.ID_KRITERIA')
            ->groupBy('cs.ID_CUSTOMER')->get();

        return View('monitorcust')->with('customer', $data)->with('filter_kategori', $filter_kategori)->with('kriteria', $data2);
    }

    public function reportjadwal1($ID_JADWAL)
    {
        $data = DB::table('jadwal')->where('ID_JADWAL', '=', $ID_JADWAL)->first();
        $data2 = DB::table('laporan')->get();
        $data3 = DB::table('kat_jadwal')->get();

        $jumlah_row = DB::table('laporan')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $ID_LAPORAN = (object) array('MAX_ID_NUMBER' => 'LA_001');
        } else {
            $id_t = 0;
            $id = DB::table('laporan')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_LAPORAN, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_LAPORAN, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('laporan')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_LAPORAN, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_LAPORAN, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $ID_LAPORAN = DB::table('laporan')->select(DB::raw('CONCAT("LA_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }

        return View::make('reportjadwal_sales')->with('jadwal', $data)->with('ID_LAPORAN', $ID_LAPORAN)->with('laporan', $data2)->with('kat_jad', $data3);
    }

    public function prosesreportjadwal(Request $request)
    {
        $data = array(
            'ID_LAPORAN' => $request->input('id_report'),
            'ID_KARYAWAN' => $request->input('id_karyawan'),
            'KEGIATAN' => $request->input('kegiatan'),
            'TANGGAL_LAPORAN' => $request->input('tanggal'),
            'KETERANGAN' => $request->input('keterangan'),
            'DOKUMENTASI' => $request->input('dokumentasi'),
            'WI' => $request->input('kehadiran'),
        );
        DB::table('laporan')->insert($data);

        $data2 = array(
            // 'ID_KARYAWAN' => $request->input('id_karyawan'),
            // 'TANGGAL' => $request->input('tanggal'),
            'REALISASI_JADWAL' => $request->input('jenis')
        );
        DB::table('jadwal')
            ->where('ID_KARYAWAN', '=', $request->input('id_karyawan'))
            ->where('TANGGAL', '=', $request->input('tanggal'))
            ->update($data2);





        return Redirect::to('editreportharian/' . $request->input('id_report'));
    }

    public function monitoringlaporan()
    {
        $data = DB::table('laporan as lp')
            ->select(DB::raw('count(ID_CUSTOMER) as jumlah'), 'lp.ID_LAPORAN', 'NAMA_KARYAWAN', 'TANGGAL_LAPORAN', 'KEGIATAN', 'KETERANGAN', 'DOKUMENTASI', 'WI', 'name')
            ->leftjoin('customer as cs', 'cs.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->join('karyawan as kar', 'kar.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->leftjoin('files as f', 'f.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->groupBy('lp.ID_LAPORAN', 'NAMA_KARYAWAN', 'TANGGAL_LAPORAN', 'KEGIATAN', 'KETERANGAN', 'DOKUMENTASI', 'WI', 'name')
            ->get()
            ->sortByDesc('TANGGAL_LAPORAN');;
        return View('monitorlaporan')->with('laporan', $data);
    }
    public function monitoringlaporanman()
    {
        $data = DB::table('laporan as lp')
            ->select(DB::raw('count(ID_CUSTOMER) as jumlah'), 'lp.ID_LAPORAN', 'NAMA_KARYAWAN', 'TANGGAL_LAPORAN', 'KEGIATAN', 'KETERANGAN', 'DOKUMENTASI', 'WI', 'name')
            ->leftjoin('customer as cs', 'cs.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->join('karyawan as kar', 'kar.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->leftjoin('files as f', 'f.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->groupBy('lp.ID_LAPORAN', 'NAMA_KARYAWAN', 'TANGGAL_LAPORAN', 'KEGIATAN', 'KETERANGAN', 'DOKUMENTASI', 'WI', 'name')
            ->get()
            ->sortByDesc('TANGGAL_LAPORAN');;
        return View('monitorlaporanman')->with('laporan', $data);
    }

    public function monitoringcust()
    {

        $data = DB::table('customer as cs')
            ->leftjoin('detailcustomer as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->join('laporan as lp', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->leftjoin('karyawan as kar', 'kar.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->get()->sortByDesc('ID_CUSTOMER');
        return View('monitorcust')->with('customer', $data);
    }
    public function monitoringcustman()
    {

        $data = DB::table('customer as cs')
            ->leftjoin('detailcustomer as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->join('laporan as lp', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->leftjoin('karyawan as kar', 'kar.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->get();
        return View('monitorcustman')->with('customer', $data);
    }

    public function tambahkarjad(Request $request)
    {
        $jumlah_row = DB::table('kat_jadwal')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_karyawan = (object) array('MAX_ID_NUMBER' => 'KJ_001');
        } else {
            $id_t = 0;
            $id = DB::table('kat_jadwal')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_KATJAD, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_KATJAD, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('kat_jadwal')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_KATJAD, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_KATJAD, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_karyawan = DB::table('kat_jadwal')->select(DB::raw('CONCAT("KA_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        $data = DB::table('kat_jadwal')->get();
        return View('tambah_karjad')->with('kuy', $data)->with('id_katjad', $id_karyawan);
    }
    public function masukkarjad(Request $request)
    {
        $data = array(
            'ID_KATJAD' => $request->input('id_katjad'),
            'NAMA_KATJAD' => $request->input('nama_kategori')
        );
        DB::table('kat_jadwal')->insert($data);
        return Redirect::to('tambahkarjad');
    }

    public function prosespenjadwalanpameran(Request $request)
    {
        $data = array(
            'ID_PAMERAN' => $request->input('id_jadwal'),
            'NAMA_PAMERAN' => $request->input('nama_pameran'),
            'TANGGAL_AWAL' => $request->input('tanggal_awal'),
            'TANGGAL_AKHIR' => $request->input('tanggal_akhir'),
            'KETERANGAN' => $request->input('keterangan'),
        );
        DB::table('pameran')->insert($data);
        return Redirect::to('penjadwalanpameran');
    }
    public function editkarjad($ID_KATJAD)
    {
        $data = DB::table('kat_jadwal')->where('ID_KATJAD', '=', $ID_KATJAD)->first();
        return View::make('editkarjad')->with('reditkajat', $data);
    }

    public function vieweditpenjadwalanpameran($ID_PAMERAN)
    {
        $data = DB::table('pameran')->where('ID_PAMERAN', '=', $ID_PAMERAN)->first();
        return View::make('vieweditpenjadwalanpameran')->with('data', $data);
    }

    public function masukeditkarjad(Request $request)
    {
        $data = array(
            'ID_KATJAD' => $request->input('id_katjad'),
            'NAMA_KATJAD' => $request->input('nama_kategori')
        );
        DB::table('kat_jadwal')->where('ID_KATJAD', '=', $request->input('id_katjad'))->update($data);
        return Redirect::to('tambahkarjad')->with('message', 'Berhasil Mengedit Data');
    }

    public function proseseditpenjadwalanpameran(Request $request)
    {
        $data = array(

            'NAMA_PAMERAN' => $request->input('nama_pameran'),
            'TANGGAL_AWAL' => $request->input('tanggal_awal'),
            'TANGGAL_AKHIR' => $request->input('tanggal_akhir'),
            'KETERANGAN' => $request->input('keterangan'),
        );
        DB::table('pameran')->where('ID_PAMERAN', '=', $request->input('id_jadwal'))->update($data);
        return Redirect::to('penjadwalanpameran')->with('message', 'Berhasil Mengedit Data');
    }
    public function prosesku($ID_KATJAD)
    {
        DB::table('kat_jadwal')->where('ID_KATJAD', '=', $ID_KATJAD)->delete();
        return Redirect::to('tambahkarjad')->with('message', 'Berhasil Menghapus Data');
    }

    public function editkaryawanbisa($ID_KARYAWAN)
    {
        $data = DB::table('karyawan')->where('ID_KARYAWAN', '=', $ID_KARYAWAN)->first();
        return View::make('editkaryawan')->with('edit', $data);
    }
    public function editkaryawanbisaman($ID_KARYAWAN)
    {
        $data = DB::table('karyawan')->where('ID_KARYAWAN', '=', $ID_KARYAWAN)->first();
        return View::make('editkaryawanman')->with('edit', $data);
    }

    public function masukeditkaryawan(Request $request)
    {
        $data = array(
            'ID_KARYAWAN' => $request->input('id_karyawan'),
            'ID_USER' => $request->input('id_user'),
            'PASSWORD' => $request->input('password'),
            'NAMA_KARYAWAN' => $request->input('nama_karyawan'),
            'TTL' => $request->input('ttl'),
            'ALAMAT' => $request->input('alamat'),
            'EMAIL' => $request->input('email'),
            'NO_TLP' => $request->input('no_tlp'),
            'JABATAN' => $request->input('jabatan'),
            'STATUS' => $request->input('status')
        );

        DB::table('karyawan')->where('ID_KARYAWAN', '=', $request->input('id_karyawan'))->update($data);
        return Redirect::to('pencatatan')->with('message', 'Berhasil Mengedit Data');
    }
    public function masukeditkaryawanman(Request $request)
    {
        $data = array(
            'ID_USER' => $request->input('id_user'),
            'PASSWORD' => $request->input('password'),
            'NAMA_KARYAWAN' => $request->input('nama_karyawan'),
            'TTL' => $request->input('ttl'),
            'ALAMAT' => $request->input('alamat'),
            'EMAIL' => $request->input('email'),
            'NO_TLP' => $request->input('no_tlp'),
            'JABATAN' => $request->input('jabatan'),
            'STATUS' => $request->input('status')
        );

        DB::table('karyawan')->where('ID_KARYAWAN', '=', $request->input('id_karyawan'))->update($data);
        return Redirect::to('pencatatan_man')->with('message', 'Berhasil Mengedit Data');
    }

    public function filtertanggal(Request $request)
    {
        $tanggal = array(
            'tgl_awal' => date("Y-m-d", strtotime($request->input('tanggal_awal'))),
            'tgl_akhir' => date("Y-m-d", strtotime($request->input('tanggal_akhir')))
        );
        $object = json_decode(json_encode($tanggal), FALSE);

        $tabelbaru = DB::table('kat_jadwal')->get();
        $filter_kategori = $request->input('selector');



        $jumlah_row = DB::table('jadwal')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_jadwal = (object) array('MAX_ID_NUMBER' => 'JD_001');
        } else {
            $id_t = 0;
            $id = DB::table('jadwal')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('jadwal')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_jadwal = DB::table('jadwal')->select(DB::raw('CONCAT("KR_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }

        $data = DB::table('karyawan')
            ->where('JABATAN', '=', 'Sales')
            ->get();
        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->whereBetween('jd.TANGGAL', [$object->tgl_awal, $object->tgl_akhir])
            ->get();
        return View('jadwalkar')->with('kateg', $tabelbaru)->with('kuy', $data)->with('id_jadwal', $id_jadwal)->with('kams', $data2)->with('filter_kategori', $filter_kategori);
    }

    public function filtertanggaladmin(Request $request)
    {
        $tanggal = array(
            'tgl_awal' => date("Y-m-d", strtotime($request->input('tanggal_awal'))),
            'tgl_akhir' => date("Y-m-d", strtotime($request->input('tanggal_akhir')))
        );
        $object = json_decode(json_encode($tanggal), FALSE);

        $tabelbaru = DB::table('kat_jadwal')->get();
        $filter_kategori = $request->input('selector');



        $jumlah_row = DB::table('jadwal')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_jadwal = (object) array('MAX_ID_NUMBER' => 'JD_001');
        } else {
            $id_t = 0;
            $id = DB::table('jadwal')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('jadwal')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_JADWAL, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_jadwal = DB::table('jadwal')->select(DB::raw('CONCAT("KR_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }

        $data = DB::table('karyawan')
            ->where('JABATAN', '=', 'Sales')
            ->get();
        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->whereBetween('jd.TANGGAL', [$object->tgl_awal, $object->tgl_akhir])
            ->get();
        return View('index_admin')->with('kateg', $tabelbaru)->with('kuy', $data)->with('id_jadwal', $id_jadwal)->with('kams', $data2)->with('filter_kategori', $filter_kategori);
    }

    public function hapusjadwal($ID_JADWAL)
    {
        DB::table('jadwal')->where('ID_JADWAL', '=', $ID_JADWAL)->delete();
        return Redirect::to('penjadwalanbisa')->with('message', 'Berhasil Menghapus Data');
    }
    public function editjadwal($ID_JADWAL)
    {
        $tabelbaru = DB::table('kat_jadwal')->get();
        // $data = DB::table('jadwal')->where('ID_JADWAL', '=', $ID_JADWAL)->first();

        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->where('ID_JADWAL', '=', $ID_JADWAL)->first();
        return View::make('editjadwal')->with('kateg', $tabelbaru)->with('edit', $data2);
    }


    public function masukjadwal(Request $request)
    {
        $data = array(
            'ID_JADWAL' => $request->input('id_jadwal'),
            'ID_KARYAWAN' => $request->input('id_karyawan'),
            'TANGGAL' => $request->input('tanggal'),
            'JADWAL' => $request->input('jenis'),
            'KETERANGAN' => $request->input('keterangan'),
        );



        DB::table('jadwal')->where('ID_JADWAL', '=', $request->input('id_jadwal'))->update($data);
        return Redirect::to('penjadwalanbisa')->with('message', 'Berhasil Mengedit Data');
    }

    public function editjeniscus($ID_CUSTOMER)
    {
        $data = DB::table('customer')->where('ID_CUSTOMER', '=', $ID_CUSTOMER)->first();
        $data2 = DB::table('kriteria')->where('TIPE_KRITERIA', '=', '1')->get();
        $data3 = DB::table('kriteria')->where('TIPE_KRITERIA', '=', '2')->get();
        $data4 = DB::table('detailkriteria')->where('ID_CUSTOMER', '=', $ID_CUSTOMER)->get();
        return View::make('updatejeniscu')->with('edit', $data)->with('kriteria1', $data2)->with('kriteria2', $data3)->with('detail_kriteria', $data4);
    }
    public function masukjencus(Request $request)
    {
        DB::table('detailkriteria')->where('ID_CUSTOMER', '=', $request->input('id_customer'))->delete();
        $krit = $request->input('krit');
        if ($krit) {
            $total = count($krit);
            for ($i = 0; $i < $total; $i++) {
                $data_krit = array(
                    'ID_CUSTOMER' => $request->input('id_customer'),
                    'ID_KRITERIA' => $krit[$i],
                );
                DB::table('detailkriteria')->insert($data_krit);
            }
        }

        $data3 = DB::table('customer as cs')->select('cs.ID_CUSTOMER', DB::raw('MAX(CASE WHEN k.TIPE_KRITERIA IS NULL THEN 0 ELSE k.TIPE_KRITERIA END) AS TIPE_KRIT'))
            ->leftJoin('detailkriteria as dk', 'cs.ID_CUSTOMER', '=', 'dk.ID_CUSTOMER')
            ->leftJoin('kriteria as k', 'k.ID_KRITERIA', '=', 'dk.ID_KRITERIA')
            ->where('cs.ID_CUSTOMER', '=', $request->input('id_customer'))
            ->groupBy('cs.ID_CUSTOMER')->first();

        if ($data3->TIPE_KRIT == 2) {
            $jenis = 2;
        } elseif ($data3->TIPE_KRIT == 1) {
            $jenis = 1;
        } elseif ($data3->TIPE_KRIT == 0) {
            $jenis = 0;
        }


        $data = array(
            'ID_LAPORAN' => $request->input('id_laporan'),
            'NAMA_CUSTOMER' => $request->input('nama_customer'),
            'NOTLP_CUS' => $request->input('notlp'),
            'SUMBER' => $request->input('sumber'),
            'JENIS' => $jenis,

        );
        DB::table('customer')->where('ID_CUSTOMER', '=', $request->input('id_customer'))->update($data);
        return Redirect::to('daftarcustomer')->with('message', 'Berhasil Mengedit Data');
    }
    public function editjeniscus2($ID_CUSTOMER)
    {
        $data = DB::table('customer')->where('ID_CUSTOMER', '=', $ID_CUSTOMER)->first();
        $data2 = DB::table('kriteria')->where('TIPE_KRITERIA', '=', '1')->get();
        $data3 = DB::table('kriteria')->where('TIPE_KRITERIA', '=', '2')->get();
        $data4 = DB::table('detailkriteria')->where('ID_CUSTOMER', '=', $ID_CUSTOMER)->get();
        return View::make('updatejeniscu2')->with('edit', $data)->with('kriteria1', $data2)->with('kriteria2', $data3)->with('detail_kriteria', $data4);
    }
    public function masukjencus2(Request $request)
    {
        DB::table('detailkriteria')->where('ID_CUSTOMER', '=', $request->input('id_customer'))->delete();
        $krit = $request->input('krit');
        if ($krit) {
            $total = count($krit);
            for ($i = 0; $i < $total; $i++) {
                $data_krit = array(
                    'ID_CUSTOMER' => $request->input('id_customer'),
                    'ID_KRITERIA' => $krit[$i],
                );
                DB::table('detailkriteria')->insert($data_krit);
            }
        }

        $data3 = DB::table('customer as cs')->select('cs.ID_CUSTOMER', DB::raw('MAX(CASE WHEN k.TIPE_KRITERIA IS NULL THEN 0 ELSE k.TIPE_KRITERIA END) AS TIPE_KRIT'))
            ->leftJoin('detailkriteria as dk', 'cs.ID_CUSTOMER', '=', 'dk.ID_CUSTOMER')
            ->leftJoin('kriteria as k', 'k.ID_KRITERIA', '=', 'dk.ID_KRITERIA')
            ->where('cs.ID_CUSTOMER', '=', $request->input('id_customer'))
            ->groupBy('cs.ID_CUSTOMER')->first();

        if ($data3->TIPE_KRIT == 2) {
            $jenis = 2;
        } elseif ($data3->TIPE_KRIT == 1) {
            $jenis = 1;
        } elseif ($data3->TIPE_KRIT == 0) {
            $jenis = 0;
        }


        $data = array(
            'ID_LAPORAN' => $request->input('id_laporan'),
            'NAMA_CUSTOMER' => $request->input('nama_customer'),
            'NOTLP_CUS' => $request->input('notlp'),
            'SUMBER' => $request->input('sumber'),
            'JENIS' => $jenis,

        );
        DB::table('customer')->where('ID_CUSTOMER', '=', $request->input('id_customer'))->update($data);
        return Redirect::to('editreportharian/' . $request->input('id_laporan'))->with('message', 'Berhasil Mengedit Data');
    }

    public function tinjaucust($ID_CUSTOMER)
    {
        $jumlah_row = DB::table('detailcustomer')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $ID_DETAILCUST = (object) array('MAX_ID_NUMBER' => 'DC_001');
        } else {
            $id_t = 0;
            $id = DB::table('detailcustomer')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_DETAILCUST, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_DETAILCUST, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('detailcustomer')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_DETAILCUST, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_DETAILCUST, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $ID_DETAILCUST = DB::table('detailcustomer')->select(DB::raw('CONCAT("DC_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        $data = DB::table('customer')->where('ID_CUSTOMER', '=', $ID_CUSTOMER)->first();
        $data1 =  DB::table('customer as cs')->leftjoin('detailcustomer as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')->where('dc.ID_CUSTOMER', '=', $ID_CUSTOMER)->get();
        return View::make('tinjaucust')->with('id_dc', $ID_DETAILCUST)->with('customer', $data)->with('kams', $data1);
    }
    public function masuktincus(Request $request)
    {
        $data = array(
            'ID_DETAILCUST' => $request->input('id_dc'),
            'ID_CUSTOMER' => $request->input('id_customer'),
            'JML_UNIT' => $request->input('jumlah'),
            'UNIT_MINAT' => $request->input('tipe'),
            'KETERANGAN_UNIT' => $request->input('ket_unit'),
            'NOMINAL' => $request->input('nominal'),
            'TOWER' => $request->input('tower'),
            'LANTAI_UNIT' => $request->input('lantai'),

        );
        DB::table('detailcustomer')->insert($data);
        return Redirect::to('viewcustomer')->with('message', 'Berhasil Mengedit Data');
    }
    public function tinjaucust2($ID_CUSTOMER)
    {
        $jumlah_row = DB::table('detailcustomer')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $ID_DETAILCUST = (object) array('MAX_ID_NUMBER' => 'DC_001');
        } else {
            $id_t = 0;
            $id = DB::table('detailcustomer')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_DETAILCUST, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_DETAILCUST, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('detailcustomer')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_DETAILCUST, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_DETAILCUST, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $ID_DETAILCUST = DB::table('detailcustomer')->select(DB::raw('CONCAT("DC_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        $data = DB::table('customer')->where('ID_CUSTOMER', '=', $ID_CUSTOMER)->first();
        return View::make('tinjaucust2')->with('id_dc', $ID_DETAILCUST)->with('customer', $data);
    }
    public function masuktincus2(Request $request)
    {
        $data = array(
            // 'ID_LAPORAN' => $request->input('id_laporan'),
            'ID_DETAILCUST' => $request->input('id_dc'),
            'ID_CUSTOMER' => $request->input('id_customer'),
            'JML_UNIT' => $request->input('jumlah'),
            'UNIT_MINAT' => $request->input('tipe'),
            'KETERANGAN_UNIT' => $request->input('ket_unit'),
            'NOMINAL' => $request->input('nominal'),
            'TOWER' => $request->input('tower'),
            'LANTAI_UNIT' => $request->input('lantai'),
        );
        DB::table('detailcustomer')->insert($data);
        return Redirect::to('editreportharian/' . $request->input('id_laporan'));
    }

    public function validasicus($ID_DETAILCUST)
    {
        $data = DB::table('detailcustomer as dc')
            ->join('customer as cs', 'cs.ID_CUSTOMER', '=', 'dc.ID_CUSTOMER')
            ->where('ID_DETAILCUST', '=', $ID_DETAILCUST)->first();
        return View::make('updatevalidasi')->with('valid', $data);
    }

    public function updatevalidasicusku($ID_DETAILCUST)
    {
        $data = DB::table('detailcustomer as dc')
            ->join('customer as cs', 'cs.ID_CUSTOMER', '=', 'dc.ID_CUSTOMER')
            ->where('ID_DETAILCUST', '=', $ID_DETAILCUST)->first();
        return View::make('updatevalidasicus')->with('valid', $data);
    }
    public function viewtarget($TG)
    {
        $data = DB::table('target')
        ->select(DB::raw('DATE_FORMAT(TANGGAL_TARGET, "%M %Y") as TANGGAL_TARGET '), 'TANGGAL_TARGET as TG', 'TARGET', 'STATUS')
        ->where('TANGGAL_TARGET', '=', $TG)->first();
        return View::make('edittarget')->with('kuy', $data);

    }
    public function viewtargetman($TG)
    {
        $data = DB::table('target')
        ->select(DB::raw('DATE_FORMAT(TANGGAL_TARGET, "%M %Y") as TANGGAL_TARGET '), 'TANGGAL_TARGET as TG', 'TARGET', 'STATUS')
        ->where('TANGGAL_TARGET', '=', $TG)->first();
        return View::make('edittargetman')->with('kuy', $data);

    }
    public function upsmasukvalidasicus(Request $request)
    {
        $data = array(
            'TANGGAL_REALISASI' => $request->input('tanggal'),
            'REALISASI_UNIT' => $request->input('rl_unit'),
            'REALISASI_KET_UNIT' => $request->input('rl_ket_unit'),
            'REALISASI_JML_UNIT' => $request->input('rl_jml'),
            'REALISASI_NOMINAL' => $request->input('rl_nom'),
            'REALISASI_TOWER' => $request->input('rl_tower'),
            'REALISASI_LANTAI' => $request->input('rl_lantai'),
        );
        $jenis = 3;
        $data2 = array(
            'JENIS' => $jenis
        );
        DB::table('detailcustomer')->where('ID_DETAILCUST', '=', $request->input('id_dc'))->update($data);
        DB::table('customer')->where('ID_CUSTOMER', '=', $request->input('id_customer'))->update($data2);
        return Redirect::to('monitoringcust')->with('message', 'Berhasil Mengedit Data');
    }

    public function masukvalidasicus(Request $request)
    {
        $data = array(
            'ID_DETAILCUST' => $request->input('id_dc'),
            'ID_CUSTOMER' => $request->input('id_customer'),
            'JML_UNIT' => $request->input('jumlah'),
            'UNIT_MINAT' => $request->input('minat'),
            'NOMINAL' => $request->input('nominal'),
            'REALISASI_UNIT' => $request->input('rl_unit'),
            'REALISASI_JML_UNIT' => $request->input('rl_jml'),
            'REALISASI_NOMINAL' => $request->input('rl_nom'),
        );
        DB::table('detailcustomer')->where('ID_DETAILCUST', '=', $request->input('id_dc'))->update($data);
        return Redirect::to('monitoringcust')->with('message', 'Berhasil Mengedit Data');
    }

    public function daftarcus(Request $request)
    {

        $data = DB::table('customer as cs')
            ->join('laporan as lp', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->join('karyawan as kar', 'kar.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->where('lp.ID_KARYAWAN', '=', $request->session()->get('user')[0])->get()->sortByDesc('ID_CUSTOMER');

        $data2 = DB::table('customer as cs')
            ->leftjoin('detailcustomer as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->join('laporan as lp', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->join('karyawan as kar', 'kar.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->where('lp.ID_KARYAWAN', '=', $request->session()->get('user')[0])->get();
        // $data3 = DB::table('customer as cs')->select('cs.ID_CUSTOMER', DB::raw('MAX(CASE WHEN k.TIPE_KRITERIA IS NULL THEN 0 ELSE k.TIPE_KRITERIA END) AS TIPE_KRIT'))
        // ->leftJoin('detailkriteria as dk', 'cs.ID_CUSTOMER', '=', 'dk.ID_CUSTOMER')
        // ->leftJoin('kriteria as k', 'k.ID_KRITERIA', '=', 'dk.ID_KRITERIA')
        // ->groupBy('cs.ID_CUSTOMER')->get();
        return View('daftarcustomer')->with('customer', $data)->with('karyawan', $data2);
    }

    public function updateunitminat($ID_DETAILCUST)
    {
        $data = DB::table('detailcustomer as dc')
            ->join('customer as cs', 'cs.ID_CUSTOMER', '=', 'dc.ID_CUSTOMER')
            ->where('ID_DETAILCUST', '=', $ID_DETAILCUST)->first();
        return View::make('update_unit')->with('valid', $data);
    }
    public function updateunitminat2($ID_DETAILCUST)
    {
        $data = DB::table('detailcustomer as dc')
            ->join('customer as cs', 'cs.ID_CUSTOMER', '=', 'dc.ID_CUSTOMER')
            ->where('ID_DETAILCUST', '=', $ID_DETAILCUST)->first();
        return View::make('update_unit2')->with('valid', $data);
    }

    public function upmasukunit(Request $request)
    {
        $data = array(
            'JML_UNIT' => $request->input('jumlah'),
            'UNIT_MINAT' => $request->input('minat'),
            'NOMINAL' => $request->input('nominal'),
        );
        DB::table('detailcustomer')->where('ID_DETAILCUST', '=', $request->input('id_dc'))->update($data);
        return Redirect::to('daftarcustomer')->with('message', 'Berhasil Mengedit Data');
    }

    public function monitorjadwal()
    {
        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->orderBy('jd.TANGGAL', 'DESC')
            ->orderBy('ka.NAMA_KARYAWAN', 'ASC')
            ->get();
        $tabelbaru = DB::table('kat_jadwal')->get();
        return View('monitorjadwal')->with('jadwal', $data2)->with('kateg', $tabelbaru);
    }
    public function monitorjadwalpdf()
    {
        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->orderBy('jd.TANGGAL', 'DESC')
            ->orderBy('ka.NAMA_KARYAWAN', 'ASC')
            ->get();
        $tabelbaru = DB::table('kat_jadwal')->get();
        return View('monitorjadwalpdf')->with('jadwal', $data2)->with('kateg', $tabelbaru);
    }
    public function filtermonitorjadwaltanggal(Request $request)
    {
        $tanggal = array(
            'tgl_awal' => date("Y-m-d", strtotime($request->input('tanggal_awal'))),
            'tgl_akhir' => date("Y-m-d", strtotime($request->input('tanggal_akhir')))
        );
        $object = json_decode(json_encode($tanggal), FALSE);
        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->whereBetween('jd.TANGGAL', [$object->tgl_awal, $object->tgl_akhir])
            ->orderBy('jd.TANGGAL', 'DESC')
            ->orderBy('ka.NAMA_KARYAWAN', 'ASC')
            ->get();
        $tabelbaru = DB::table('kat_jadwal')->get();
        return View('monitorjadwal')->with('jadwal', $data2)->with('kateg', $tabelbaru);
    }
    public function monitorjadwalman()
    {
        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->orderBy('jd.TANGGAL', 'DESC')
            ->orderBy('ka.NAMA_KARYAWAN', 'ASC')
            ->get();
        $tabelbaru = DB::table('kat_jadwal')->get();
        return View('monitorjadwalman')->with('jadwal', $data2)->with('kateg', $tabelbaru);
    }
    public function filtermonitorjadwaltanggalman(Request $request)
    {
        $tanggal = array(
            'tgl_awal' => date("Y-m-d", strtotime($request->input('tanggal_awal'))),
            'tgl_akhir' => date("Y-m-d", strtotime($request->input('tanggal_akhir')))
        );
        $object = json_decode(json_encode($tanggal), FALSE);
        $data2 = DB::table('jadwal as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->whereBetween('jd.TANGGAL', [$object->tgl_awal, $object->tgl_akhir])
            ->orderBy('jd.TANGGAL', 'DESC')
            ->orderBy('ka.NAMA_KARYAWAN', 'ASC')
            ->get();
        $tabelbaru = DB::table('kat_jadwal')->get();
        return View('monitorjadwalman')->with('jadwal', $data2)->with('kateg', $tabelbaru);
    }

    // VALIDASI USER
    public function editvalidasi($ID_KARYAWAN)
    {
        $data = DB::table('karyawan')->where('ID_KARYAWAN', '=', $ID_KARYAWAN)->first();
        $data2 = DB::table('karyawan')
            ->whereIn('JABATAN', array('Sales', 'Kepala Divisi'))
            ->get();
        return View::make('validasi_user')->with('edit', $data)->with('kuy', $data2);
    }
    public function prosesubahstatuskaryawan(Request $request)
    {
        $data = array(
            'ID_KARYAWAN' => $request->input('id_karyawan'),
            'NAMA_KARYAWAN' => $request->input('nama'),
            'NO_TLP' => $request->input('notelp'),
            'TTL' => $request->input('ttl'),
            'ALAMAT' => $request->input('alamat'),
            'JABATAN' => $request->input('jabatan'),
            'ID_PENANGGUNG' => $request->input('id_karyawan_up'),
            'EMAIL' => $request->input('email'),
            'ID_USER' => $request->input('id_user'),
            'PASSWORD' => $request->input('password'),
            'STATUS' => 1
        );
        DB::table('karyawan')->where('ID_KARYAWAN', '=', $request->input('id_karyawan'))->update($data);
        return Redirect::to('pencatatan');
    }


    // Daffakayesss START!
    // PERIODE PENILAIAN
    public function periode()
    {
        $exclusion = DB::table('KARYAWAN as M')
            ->select('K.ID_KARYAWAN')
            ->leftJoin('KARYAWAN as K', 'M.ID_KARYAWAN', '=', 'K.ID_PENANGGUNG')
            ->join('LAPORAN as lp', 'lp.ID_KARYAWAN', '=', 'K.ID_KARYAWAN')
            ->join('CUSTOMER as cs', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->join('DETAILCUSTOMER as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->whereNotNull('k.ID_PENANGGUNG')
            ->whereNotNull('dc.REALISASI_JML_UNIT')
            ->groupBy('K.ID_KARYAWAN');

        $tbl_2 = DB::table('CUSTOMER as cs')
            ->select(
                'ky.ID_KARYAWAN',
                DB::raw('SUM(dc.REALISASI_JML_UNIT) as UNIT_TEREALISASI')
            )
            ->leftJoin('DETAILCUSTOMER as dc', 'cs.ID_CUSTOMER', '=', 'dc.ID_CUSTOMER')
            ->join('LAPORAN as lp', 'cs.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->join('KARYAWAN as ky', 'ky.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->groupBy('ky.ID_KARYAWAN');

        $tbl_3 = DB::table('KARYAWAN as M')
            ->select(
                'M.ID_KARYAWAN',
                DB::raw('SUM(dc.REALISASI_JML_UNIT) as CLOSING_AGENT_UNDER_TOTAL')
            )
            ->leftJoin('KARYAWAN as K', 'M.ID_KARYAWAN', '=', 'K.ID_PENANGGUNG')
            ->join('LAPORAN as lp', 'lp.ID_KARYAWAN', '=', 'K.ID_KARYAWAN')
            ->join('CUSTOMER as cs', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->join('DETAILCUSTOMER as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->whereNotNull('K.ID_PENANGGUNG')
            ->whereNotNull('dc.REALISASI_JML_UNIT')
            ->groupBy('M.ID_KARYAWAN');

        $tbl_4 = DB::table('laporan as lp')
            ->select(
                'kr.ID_KARYAWAN',
                DB::raw('COUNT(DISTINCT cs.ID_CUSTOMER) AS PELANGGAN'),
                'TBL_2.UNIT_TEREALISASI AS CLOSING',
                DB::raw('CASE WHEN TBL_3.CLOSING_AGENT_UNDER_TOTAL IS NULL THEN 0 ELSE TBL_3.CLOSING_AGENT_UNDER_TOTAL END AS CLOSING_AGENT_UNDER_TOTAL')
            )
            ->leftJoin('KARYAWAN as kr', 'lp.ID_KARYAWAN', '=', 'kr.ID_KARYAWAN')
            ->rightJoin('CUSTOMER as cs', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->leftJoinSub($tbl_2, 'TBL_2', function ($join) {
                $join->on('TBL_2.ID_KARYAWAN', '=', 'kr.ID_KARYAWAN');
            })
            ->leftJoinSub($tbl_3, 'TBL_3', function ($join) {
                $join->on('TBL_3.ID_KARYAWAN', '=', 'kr.ID_KARYAWAN');
            })
            ->whereNotIn('kr.ID_KARYAWAN', $exclusion)
            ->groupBy('kr.ID_KARYAWAN', 'TBL_2.UNIT_TEREALISASI', 'TBL_3.CLOSING_AGENT_UNDER_TOTAL');

        $tbl_5 = DB::table('laporan')
            ->select(
                'ID_KARYAWAN',
                DB::raw('SUM(CASE WHEN WI = 1 THEN 1 ELSE 0 END) AS WI_1')
            )
            ->groupBy('ID_KARYAWAN');

        $index4 = DB::table('KARYAWAN as kr')
            ->select(
                'kr.NAMA_KARYAWAN',
                DB::raw('(CASE WHEN TBL_5.WI_1 IS NULL THEN 0 ELSE TBL_5.WI_1 END) AS TOTAL_WI'),
                DB::raw('(CASE WHEN TBL_4.PELANGGAN IS NULL THEN 0 ELSE TBL_4.PELANGGAN END) AS PELANGGAN'),
                DB::raw('(CASE WHEN TBL_4.CLOSING IS NULL THEN 0 ELSE TBL_4.CLOSING END) AS CLOSING'),
                DB::raw('(CASE WHEN TBL_4.CLOSING_AGENT_UNDER_TOTAL IS NULL THEN 0 ELSE TBL_4.CLOSING_AGENT_UNDER_TOTAL END) AS CLOSING_AGENT_UNDER_TOTAL')
            )
            ->leftJoinSub($tbl_4, 'TBL_4', function ($join) {
                $join->on('kr.ID_KARYAWAN', '=', 'TBL_4.ID_KARYAWAN');
            })
            ->leftJoinSub($tbl_5, 'TBL_5', function ($join) {
                $join->on('kr.ID_KARYAWAN', '=', 'TBL_5.ID_KARYAWAN');
            })
            ->where('kr.JABATAN', '=', 'Sales')
            ->get();

        $targetpertahun = 1200;

        //Buat Nambah
        $jumlah_row = DB::table('kriteria')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_kriteria = (object) array('MAX_ID_NUMBER' => 'MP_001');
        } else {
            $id_t = 0;
            $id = DB::table('kriteria')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('kriteria')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_kriteria = DB::table('kriteria')->select(DB::raw('CONCAT("KR_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }

        $skala = DB::table('skala_penilaian')
            ->select(DB::raw('*'))
            ->get();

        // HARDCODE NGITUNG PENILAIAN
        $target_data = DB::table('kategori_penilaian')
            ->select('ID_KATEGORI', 'TARGET_KATEGORI')
            ->get();

        return View('periode')->with('kuy', $index4)->with('id_kriteria', $id_kriteria)->with('skala', $skala)
            ->with('target_data', $target_data)
            ->with('targetpertahun', $targetpertahun);
    }


    // FILTER PERIODE START.
    public function filter_periode(Request $request)
    {
        $tanggal = array(
            'tgl_awal' => date("Y-m-d", strtotime($request->input('tanggal_awal'))),
            'tgl_akhir' => date("Y-m-d", strtotime($request->input('tanggal_akhir')))
        );
        $object = json_decode(json_encode($tanggal), FALSE);

        $exclusion = DB::table('KARYAWAN as M')
            ->select('K.ID_KARYAWAN')
            ->leftJoin('KARYAWAN as K', 'M.ID_KARYAWAN', '=', 'K.ID_PENANGGUNG')
            ->join('LAPORAN as lp', 'lp.ID_KARYAWAN', '=', 'K.ID_KARYAWAN')
            ->join('CUSTOMER as cs', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->join('DETAILCUSTOMER as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->whereNotNull('k.ID_PENANGGUNG')
            ->whereNotNull('dc.REALISASI_JML_UNIT')
            ->groupBy('K.ID_KARYAWAN');

        //CLOSING
        $tbl_2 = DB::table('CUSTOMER as cs')
            ->select(
                'ky.ID_KARYAWAN',
                DB::raw('SUM(dc.REALISASI_JML_UNIT) as UNIT_TEREALISASI')
            )
            ->leftJoin('DETAILCUSTOMER as dc', 'cs.ID_CUSTOMER', '=', 'dc.ID_CUSTOMER')
            ->join('LAPORAN as lp', 'cs.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->join('KARYAWAN as ky', 'ky.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->whereBetween('dc.TANGGAL_REALISASI', [$object->tgl_awal, $object->tgl_akhir])
            ->groupBy('ky.ID_KARYAWAN');

        //CLOSING AGENT UNDER
        $tbl_3 = DB::table('KARYAWAN as M')
            ->select(
                'M.ID_KARYAWAN',
                DB::raw('SUM(dc.REALISASI_JML_UNIT) as CLOSING_AGENT_UNDER_TOTAL')
            )
            ->leftJoin('KARYAWAN as K', 'M.ID_KARYAWAN', '=', 'K.ID_PENANGGUNG')
            ->rightJoin('LAPORAN as lp', 'lp.ID_KARYAWAN', '=', 'K.ID_KARYAWAN')
            ->join('CUSTOMER as cs', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->join('DETAILCUSTOMER as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->whereNotNull('K.ID_PENANGGUNG')
            ->whereNotNull('dc.REALISASI_JML_UNIT')
            ->whereBetween('dc.TANGGAL_REALISASI',[$object->tgl_awal, $object->tgl_akhir])
            ->groupBy('M.ID_KARYAWAN');

            // dd($object->tgl_awal);
            // dd($object->tgl_akhir);
        //DATABASE
        $tbl_4 = DB::table('laporan as lp')
            ->select(
                'kr.ID_KARYAWAN',
                DB::raw('COUNT(DISTINCT cs.ID_CUSTOMER) AS PELANGGAN'),
                'TBL_2.UNIT_TEREALISASI AS CLOSING',
                DB::raw('CASE WHEN TBL_3.CLOSING_AGENT_UNDER_TOTAL IS NULL THEN 0 ELSE TBL_3.CLOSING_AGENT_UNDER_TOTAL END AS CLOSING_AGENT_UNDER_TOTAL')
            )
            ->leftJoin('KARYAWAN as kr', 'lp.ID_KARYAWAN', '=', 'kr.ID_KARYAWAN')
            ->leftJoin('CUSTOMER as cs', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->leftJoinSub($tbl_2, 'TBL_2', function ($join) {
                $join->on('TBL_2.ID_KARYAWAN', '=', 'kr.ID_KARYAWAN');
            })
            ->leftJoinSub($tbl_3, 'TBL_3', function ($join) {
                $join->on('TBL_3.ID_KARYAWAN', '=', 'kr.ID_KARYAWAN');
            })
            ->whereNotIn('kr.ID_KARYAWAN', $exclusion)
            ->whereBetween('lp.TANGGAL_LAPORAN', [$object->tgl_awal, $object->tgl_akhir])
            ->groupBy('kr.ID_KARYAWAN', 'TBL_2.UNIT_TEREALISASI', 'TBL_3.CLOSING_AGENT_UNDER_TOTAL');

        // WALK IN
        $tbl_5 = DB::table('laporan as lp')
            ->select(
                'ID_KARYAWAN',
                DB::raw('SUM(CASE WHEN WI = 1 THEN 1 ELSE 0 END) AS WI_1')
            )
            ->whereBetween('lp.TANGGAL_LAPORAN', [$object->tgl_awal, $object->tgl_akhir])
            ->groupBy('ID_KARYAWAN');

        $index4 = DB::table('KARYAWAN as kr')
            ->select(
                'kr.NAMA_KARYAWAN',
                DB::raw('(CASE WHEN TBL_5.WI_1 IS NULL THEN 0 ELSE TBL_5.WI_1 END) AS TOTAL_WI'),
                DB::raw('(CASE WHEN TBL_4.PELANGGAN IS NULL THEN 0 ELSE TBL_4.PELANGGAN END) AS PELANGGAN'),
                DB::raw('(CASE WHEN TBL_4.CLOSING IS NULL THEN 0 ELSE TBL_4.CLOSING END) AS CLOSING'),
                DB::raw('(CASE WHEN TBL_4.CLOSING_AGENT_UNDER_TOTAL IS NULL THEN 0 ELSE TBL_4.CLOSING_AGENT_UNDER_TOTAL END) AS CLOSING_AGENT_UNDER_TOTAL')
            )
            ->leftJoinSub($tbl_4, 'TBL_4', function ($join) {
                $join->on('kr.ID_KARYAWAN', '=', 'TBL_4.ID_KARYAWAN');
            })
            ->leftJoinSub($tbl_5, 'TBL_5', function ($join) {
                $join->on('kr.ID_KARYAWAN', '=', 'TBL_5.ID_KARYAWAN');
            })
            ->where('kr.JABATAN', '=', 'Sales')
            ->get();

        $targetpertahun = $request->input('var_target');
        // FILTER PERIODE END!

        //Buat Nambah
        $jumlah_row = DB::table('kriteria')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_kriteria = (object) array('MAX_ID_NUMBER' => 'MP_001');
        } else {
            $id_t = 0;
            $id = DB::table('kriteria')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('kriteria')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_kriteria = DB::table('kriteria')->select(DB::raw('CONCAT("KR_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }

        $skala = DB::table('skala_penilaian')
            ->select(DB::raw('*'))
            ->get();

        // HARDCODE NGITUNG PENILAIAN
        $target_data = DB::table('kategori_penilaian')
            ->select('ID_KATEGORI', 'TARGET_KATEGORI')
            ->get();

        $var_tgl_awal = date("Y-m-d", strtotime($request->input('tanggal_awal')));
        $var_tgl_akhir = date("Y-m-d", strtotime($request->input('tanggal_akhir')));

        return View('periode')->with('kuy', $index4)->with('id_kriteria', $id_kriteria)->with('skala', $skala)
            ->with('target_data', $target_data)->with('var_tgl_awal', $var_tgl_awal)->with('var_tgl_akhir', $var_tgl_akhir)
            ->with('targetpertahun', $targetpertahun);
    }

    //EXPORT EXCEL
    //COPAS QUERY INI...
    public function eksportExcel(Request $request)
    {
        $tanggal = array(
            'tgl_awal' => date("Y-m-d", strtotime($request->input('var_tgl_awal'))),
            'tgl_akhir' => date("Y-m-d", strtotime($request->input('var_tgl_akhir')))
        );
        $object = json_decode(json_encode($tanggal), FALSE);

        $exclusion = DB::table('KARYAWAN as M')
            ->select('K.ID_KARYAWAN')
            ->leftJoin('KARYAWAN as K', 'M.ID_KARYAWAN', '=', 'K.ID_PENANGGUNG')
            ->join('LAPORAN as lp', 'lp.ID_KARYAWAN', '=', 'K.ID_KARYAWAN')
            ->join('CUSTOMER as cs', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->join('DETAILCUSTOMER as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->whereNotNull('k.ID_PENANGGUNG')
            ->whereNotNull('dc.REALISASI_JML_UNIT')
            ->groupBy('K.ID_KARYAWAN');

        //CLOSING
        $tbl_2 = DB::table('CUSTOMER as cs')
            ->select(
                'ky.ID_KARYAWAN',
                DB::raw('SUM(dc.REALISASI_JML_UNIT) as UNIT_TEREALISASI')
            )
            ->leftJoin('DETAILCUSTOMER as dc', 'cs.ID_CUSTOMER', '=', 'dc.ID_CUSTOMER')
            ->join('LAPORAN as lp', 'cs.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->join('KARYAWAN as ky', 'ky.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->whereBetween('dc.TANGGAL_REALISASI', [$object->tgl_awal, $object->tgl_akhir])
            ->groupBy('ky.ID_KARYAWAN');

        //CLOSING AGENT UNDER
        $tbl_3 = DB::table('KARYAWAN as M')
            ->select(
                'M.ID_KARYAWAN',
                DB::raw('SUM(dc.REALISASI_JML_UNIT) as CLOSING_AGENT_UNDER_TOTAL')
            )
            ->leftJoin('KARYAWAN as K', 'M.ID_KARYAWAN', '=', 'K.ID_PENANGGUNG')
            ->join('LAPORAN as lp', 'lp.ID_KARYAWAN', '=', 'K.ID_KARYAWAN')
            ->join('CUSTOMER as cs', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->join('DETAILCUSTOMER as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->whereNotNull('K.ID_PENANGGUNG')
            ->whereNotNull('dc.REALISASI_JML_UNIT')
            ->whereBetween('dc.TANGGAL_REALISASI', [$object->tgl_awal, $object->tgl_akhir])
            ->groupBy('M.ID_KARYAWAN');

        //DATABASE
        $tbl_4 = DB::table('laporan as lp')
            ->select(
                'kr.ID_KARYAWAN',
                DB::raw('COUNT(DISTINCT cs.ID_CUSTOMER) AS PELANGGAN'),
                'TBL_2.UNIT_TEREALISASI AS CLOSING',
                DB::raw('CASE WHEN TBL_3.CLOSING_AGENT_UNDER_TOTAL IS NULL THEN 0 ELSE TBL_3.CLOSING_AGENT_UNDER_TOTAL END AS CLOSING_AGENT_UNDER_TOTAL')
            )
            ->leftJoin('KARYAWAN as kr', 'lp.ID_KARYAWAN', '=', 'kr.ID_KARYAWAN')
            ->rightJoin('CUSTOMER as cs', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->leftJoinSub($tbl_2, 'TBL_2', function ($join) {
                $join->on('TBL_2.ID_KARYAWAN', '=', 'kr.ID_KARYAWAN');
            })
            ->leftJoinSub($tbl_3, 'TBL_3', function ($join) {
                $join->on('TBL_3.ID_KARYAWAN', '=', 'kr.ID_KARYAWAN');
            })
            ->whereNotIn('kr.ID_KARYAWAN', $exclusion)
            ->whereBetween('lp.TANGGAL_LAPORAN', [$object->tgl_awal, $object->tgl_akhir])
            ->groupBy('kr.ID_KARYAWAN', 'TBL_2.UNIT_TEREALISASI', 'TBL_3.CLOSING_AGENT_UNDER_TOTAL');

        // WALK IN
        $tbl_5 = DB::table('laporan as lp')
            ->select(
                'ID_KARYAWAN',
                DB::raw('SUM(CASE WHEN WI = 1 THEN 1 ELSE 0 END) AS WI_1')
            )
            ->whereBetween('lp.TANGGAL_LAPORAN', [$object->tgl_awal, $object->tgl_akhir])
            ->groupBy('ID_KARYAWAN');

        $index4 = DB::table('KARYAWAN as kr')
            ->select(
                'kr.NAMA_KARYAWAN',
                DB::raw('(CASE WHEN TBL_5.WI_1 IS NULL THEN 0 ELSE TBL_5.WI_1 END) AS TOTAL_WI'),
                DB::raw('(CASE WHEN TBL_4.PELANGGAN IS NULL THEN 0 ELSE TBL_4.PELANGGAN END) AS PELANGGAN'),
                DB::raw('(CASE WHEN TBL_4.CLOSING IS NULL THEN 0 ELSE TBL_4.CLOSING END) AS CLOSING'),
                DB::raw('(CASE WHEN TBL_4.CLOSING_AGENT_UNDER_TOTAL IS NULL THEN 0 ELSE TBL_4.CLOSING_AGENT_UNDER_TOTAL END) AS CLOSING_AGENT_UNDER_TOTAL')
            )
            ->leftJoinSub($tbl_4, 'TBL_4', function ($join) {
                $join->on('kr.ID_KARYAWAN', '=', 'TBL_4.ID_KARYAWAN');
            })
            ->leftJoinSub($tbl_5, 'TBL_5', function ($join) {
                $join->on('kr.ID_KARYAWAN', '=', 'TBL_5.ID_KARYAWAN');
            })
            ->where('kr.JABATAN', '=', 'Sales')
            ->get();
        //..SAMPE SINI. DATA KESIMPEN DI INDEX 4

    }


    // KATEGORI PENILAIAN
    public function catatkategori(Request $request)
    {
        $data = DB::table('kategori_penilaian')->get();
        $jumlah_row = DB::table('kategori_penilaian')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_kategori = (object) array('MAX_ID_NUMBER' => 'KP_001');
        } else {
            $id_t = 0;
            $id = DB::table('kategori_penilaian')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_KATEGORI, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_KATEGORI, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('kategori_penilaian')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_KATEGORI, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_KATEGORI, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_kategori = DB::table('kategori_penilaian')->select(DB::raw('CONCAT("KP_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        return View('kategori')->with('kuy', $data)->with('id_kategori', $id_kategori);
    }
    public function tambahkategori(Request $request)
    {
        $data = array(
            'ID_KATEGORI' => $request->input('id_kategori'),
            'NAMA_KATEGORI' => $request->input('nama_kategori'),
            'TARGET_KATEGORI' => $request->input('target_kategori'),
            // 'SCORE_KATEGORI' => $request->input('score'),
            'KETERANGAN_KATEGORI' => $request->input('keterangan_kategori'),
        );

        DB::table('kategori_penilaian')->insert($data);
        return Redirect::to('kategori-penilaian');
    }
    // UPDATE KATEGORI
    public function editkategori($ID_KATEGORI)
    {
        $data = DB::table('kategori_penilaian')->where('ID_KATEGORI', '=', $ID_KATEGORI)->first();
        return View::make('ubah_kategori')->with('edit', $data);
    }
    public function ubahkategori(Request $request)
    {
        $data = array(
            'NAMA_KATEGORI' => $request->input('nama_kategori'),
            'TARGET_KATEGORI' => $request->input('target_kategori'),
            // 'SCORE_KATEGORI' => $request->input('score_kategori'),
            'KETERANGAN_KATEGORI' => $request->input('keterangan_kategori'),
        );
        DB::table('kategori_penilaian')->where('ID_KATEGORI', '=', request()->get('id_kategori'))->update($data);
        return Redirect::to('kategori-penilaian');
    }


    // SKALA PENILAIAN
    public function catatskala(Request $request)
    {
        $data = DB::table('skala_penilaian')->get();
        $jumlah_row = DB::table('skala_penilaian')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_skala = (object) array('MAX_ID_NUMBER' => 'SK_001');
        } else {
            $id_t = 0;
            $id = DB::table('skala_penilaian')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_SKALA, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_SKALA, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('skala_penilaian')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_SKALA, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_SKALA, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_skala = DB::table('skala_penilaian')->select(DB::raw('CONCAT("SK_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        return View('skala')->with('kuy', $data)->with('id_skala', $id_skala);
    }
    public function tambahskala(Request $request)
    {
        $data = array(
            'ID_SKALA' => $request->input('id_skala'),
            'SKALA_ATAS' => $request->input('skala_atas'),
            'SKALA_BAWAH' => $request->input('skala_bawah'),
            'KET_SKALA' => $request->input('ket_skala'),
        );

        DB::table('skala_penilaian')->insert($data);
        return Redirect::to('parameter-penilaian');
    }
    // UPDATE SKALA
    public function ubahskala($ID_SKALA)
    {
        $data = DB::table('skala_penilaian')->where('ID_SKALA', '=', $ID_SKALA)->first();
        return View::make('ubah_skala')->with('edit', $data);
    }
    public function edit_skala(Request $request)
    {
        $data = array(

            'SKALA_ATAS' => $request->input('skala_atas'),
            'SKALA_BAWAH' => $request->input('skala_bawah'),
            'KET_SKALA' => $request->input('ket_skala'),
        );
        DB::table('skala_penilaian')->where('ID_SKALA', '=', request()->get('id_skala'))->update($data);
        return Redirect::to('parameter-penilaian');
    }


    // AGENT UNDER
    public function pencatatanagent()
    {
        $data2 = DB::table('agent_under as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->get();


        return View('agent_under')->with('babi', $data2);
    }
    // TAMBAH AGENT UNDER
    public function tambah_au(Request $request)
    {
        $tabelbaru = DB::table('kat_jadwal')->get();
        $jumlah_row = DB::table('agent_under')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_au = (object) array('MAX_ID_NUMBER' => 'AU_001');
        } else {
            $id_t = 0;
            $id = DB::table('agent_under')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_AU, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_AU, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('agent_under')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_AU, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_AU, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_au = DB::table('agent_under')->select(DB::raw('CONCAT("AU_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }
        $data = DB::table('karyawan')
            ->where('JABATAN', '=', 'Sales')
            ->get();
        return View('tambah_au')->with('kateg', $tabelbaru)->with('kuy', $data)->with('id_au', $id_au);
    }
    public function tambahagent(Request $request)
    {
        $data = array(
            'ID_AU' => $request->input('id_au'),
            'ID_KARYAWAN' => $request->input('id_karyawan'),
            'NAMA_AU' => $request->input('nama_au'),
            'TELP_AU' => $request->input('telp_au'),
            'BENDERA' => $request->input('bendera'),
            'STATUS_AU' => $request->input('status_au')
        );

        DB::table('agent_under')->insert($data);
        return Redirect::to('agent-under');
    }

    public function ubahau($ID_AU)
    {
        $data1 = DB::table('agent_under')
            ->where('ID_AU', '=', $ID_AU)->first();
        $data = DB::table('agent_under as jd')
            ->join('karyawan as ka', 'ka.ID_KARYAWAN', '=', 'jd.ID_KARYAWAN')
            ->where('ID_AU', '=', $ID_AU)->first();
        return View::make('ubah_au')->with('item', $data1)->with('bis', $data);
    }
    public function editau(Request $request)
    {
        $data = array(
            'NAMA_AU' => $request->input('nama_au'),
            'TELP_AU' => $request->input('telp_au'),
            'BENDERA' => $request->input('bendera'),
            'STATUS_AU' => $request->input('status_au')
        );
        DB::table('agent_under')->where('ID_AU', '=', request()->get('id_au'))->update($data);
        return Redirect::to('agent-under');
    }

    // REKAP PENILAIAN
    // FILTER PERIODE START.
    public function rekapel(Request $request)
    {
        $tanggal = array(
            'tgl_awal' => date("Y-m-d", strtotime($request->input('tanggal_awal'))),
            'tgl_akhir' => date("Y-m-d", strtotime($request->input('tanggal_akhir')))
        );
        $object = json_decode(json_encode($tanggal), FALSE);

        $exclusion = DB::table('KARYAWAN as M')
            ->select('K.ID_KARYAWAN')
            ->leftJoin('KARYAWAN as K', 'M.ID_KARYAWAN', '=', 'K.ID_PENANGGUNG')
            ->join('LAPORAN as lp', 'lp.ID_KARYAWAN', '=', 'K.ID_KARYAWAN')
            ->join('CUSTOMER as cs', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->join('DETAILCUSTOMER as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->whereNotNull('k.ID_PENANGGUNG')
            ->whereNotNull('dc.REALISASI_JML_UNIT')
            ->groupBy('K.ID_KARYAWAN');

        //CLOSING
        $tbl_2 = DB::table('CUSTOMER as cs')
            ->select(
                'ky.ID_KARYAWAN',
                DB::raw('SUM(dc.REALISASI_JML_UNIT) as UNIT_TEREALISASI')
            )
            ->leftJoin('DETAILCUSTOMER as dc', 'cs.ID_CUSTOMER', '=', 'dc.ID_CUSTOMER')
            ->join('LAPORAN as lp', 'cs.ID_LAPORAN', '=', 'lp.ID_LAPORAN')
            ->join('KARYAWAN as ky', 'ky.ID_KARYAWAN', '=', 'lp.ID_KARYAWAN')
            ->whereBetween('dc.TANGGAL_REALISASI', [$object->tgl_awal, $object->tgl_akhir])
            ->groupBy('ky.ID_KARYAWAN');

        //CLOSING AGENT UNDER
        $tbl_3 = DB::table('KARYAWAN as M')
            ->select(
                'M.ID_KARYAWAN',
                DB::raw('SUM(dc.REALISASI_JML_UNIT) as CLOSING_AGENT_UNDER_TOTAL')
            )
            ->leftJoin('KARYAWAN as K', 'M.ID_KARYAWAN', '=', 'K.ID_PENANGGUNG')
            ->join('LAPORAN as lp', 'lp.ID_KARYAWAN', '=', 'K.ID_KARYAWAN')
            ->join('CUSTOMER as cs', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->join('DETAILCUSTOMER as dc', 'dc.ID_CUSTOMER', '=', 'cs.ID_CUSTOMER')
            ->whereNotNull('K.ID_PENANGGUNG')
            ->whereNotNull('dc.REALISASI_JML_UNIT')
            ->whereBetween('dc.TANGGAL_REALISASI', [$object->tgl_awal, $object->tgl_akhir])
            ->groupBy('M.ID_KARYAWAN');

        //DATABASE
        $tbl_4 = DB::table('laporan as lp')
            ->select(
                'kr.ID_KARYAWAN',
                DB::raw('COUNT(DISTINCT cs.ID_CUSTOMER) AS PELANGGAN'),
                'TBL_2.UNIT_TEREALISASI AS CLOSING',
                DB::raw('CASE WHEN TBL_3.CLOSING_AGENT_UNDER_TOTAL IS NULL THEN 0 ELSE TBL_3.CLOSING_AGENT_UNDER_TOTAL END AS CLOSING_AGENT_UNDER_TOTAL')
            )
            ->leftJoin('KARYAWAN as kr', 'lp.ID_KARYAWAN', '=', 'kr.ID_KARYAWAN')
            ->rightJoin('CUSTOMER as cs', 'lp.ID_LAPORAN', '=', 'cs.ID_LAPORAN')
            ->leftJoinSub($tbl_2, 'TBL_2', function ($join) {
                $join->on('TBL_2.ID_KARYAWAN', '=', 'kr.ID_KARYAWAN');
            })
            ->leftJoinSub($tbl_3, 'TBL_3', function ($join) {
                $join->on('TBL_3.ID_KARYAWAN', '=', 'kr.ID_KARYAWAN');
            })
            ->whereNotIn('kr.ID_KARYAWAN', $exclusion)
            ->whereBetween('lp.TANGGAL_LAPORAN', [$object->tgl_awal, $object->tgl_akhir])
            ->groupBy('kr.ID_KARYAWAN', 'TBL_2.UNIT_TEREALISASI', 'TBL_3.CLOSING_AGENT_UNDER_TOTAL');

        // WALK IN
        $tbl_5 = DB::table('laporan as lp')
            ->select(
                'ID_KARYAWAN',
                DB::raw('SUM(CASE WHEN WI = 1 THEN 1 ELSE 0 END) AS WI_1')
            )
            ->whereBetween('lp.TANGGAL_LAPORAN', [$object->tgl_awal, $object->tgl_akhir])
            ->groupBy('ID_KARYAWAN');

        $index4 = DB::table('KARYAWAN as kr')
            ->select(
                'kr.NAMA_KARYAWAN',
                DB::raw('(CASE WHEN TBL_5.WI_1 IS NULL THEN 0 ELSE TBL_5.WI_1 END) AS TOTAL_WI'),
                DB::raw('(CASE WHEN TBL_4.PELANGGAN IS NULL THEN 0 ELSE TBL_4.PELANGGAN END) AS PELANGGAN'),
                DB::raw('(CASE WHEN TBL_4.CLOSING IS NULL THEN 0 ELSE TBL_4.CLOSING END) AS CLOSING'),
                DB::raw('(CASE WHEN TBL_4.CLOSING_AGENT_UNDER_TOTAL IS NULL THEN 0 ELSE TBL_4.CLOSING_AGENT_UNDER_TOTAL END) AS CLOSING_AGENT_UNDER_TOTAL')
            )
            ->leftJoinSub($tbl_4, 'TBL_4', function ($join) {
                $join->on('kr.ID_KARYAWAN', '=', 'TBL_4.ID_KARYAWAN');
            })
            ->leftJoinSub($tbl_5, 'TBL_5', function ($join) {
                $join->on('kr.ID_KARYAWAN', '=', 'TBL_5.ID_KARYAWAN');
            })
            ->where('kr.JABATAN', '=', 'Sales')
            ->get();
        // FILTER PERIODE END!

        //Buat Nambah
        $jumlah_row = DB::table('kriteria')->select(DB::raw('COUNT(*) as JML'))->first();
        if ($jumlah_row->JML == 0) {
            $id_kriteria = (object) array('MAX_ID_NUMBER' => 'MP_001');
        } else {
            $id_t = 0;
            $id = DB::table('kriteria')
                ->select(DB::raw('CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL) AS ID_TIPE'))
                ->orderBy(DB::raw('CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL)'), 'desc')
                ->first();
            for ($i = 1; $i <= ($id->ID_TIPE + 1); $i++) {
                $id_t++;
                $idb = DB::table('kriteria')
                    ->select(DB::raw('count(CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL)) as jumlah'))
                    ->where(DB::raw('CONVERT(SUBSTRING(ID_KRITERIA, 4), DECIMAL)'), '=', $id_t)
                    ->first();
                if ($idb->jumlah == 0) {
                    $i = $id->ID_TIPE + 1;
                }
            }
            $id_kriteria = DB::table('kriteria')->select(DB::raw('CONCAT("KR_", LPAD(' . $id_t . ', 3, "0")) AS MAX_ID_NUMBER'))->first();
        }

        $skala = DB::table('skala_penilaian')
            ->select(DB::raw('*'))
            ->get();

        // HARDCODE NGITUNG PENILAIAN
        $target_data = DB::table('kategori_penilaian')
            ->select('ID_KATEGORI', 'TARGET_KATEGORI')
            ->get();

        return View('periode')->with('kuy', $index4)->with('id_kriteria', $id_kriteria)->with('skala', $skala)
            ->with('target_data', $target_data);
    }
    // daffakayesss END.
}
