@extends('template/sidebar_sales')
@section('content')
    @include('sweetalert::alert')

    <body>
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="icon_house"></i>Halaman Utama</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index_sales">Halaman Utama</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    {{-- GRAFIK RARI SALES --}}
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="panel white-bg">
                            <div class="panel-heading" style="color: black">
                                <h2><strong>Didi</strong></h2>
                            </div>
                            <canvas id="ChartDidi" position="relative" height="100%" width="100%"></canvas>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="panel white-bg">
                            <div class="panel-heading" style="color: black">
                                <h2><strong>Fendi</strong></h2>
                            </div>
                            <canvas id="ChartFendi" position="relative" height="100%" width="100%"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="panel white-bg">
                            <div class="panel-heading" style="color: black">
                                <h2><strong>Eri</strong></h2>
                            </div>
                            <canvas id="ChartEri" position="relative" height="100%" width="100%"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="panel white-bg">
                            <div class="panel-heading" style="color: black">
                                <h2><strong>Dewi</strong></h2>
                            </div>
                            <canvas id="ChartDewi" position="relative" height="100%" width="100%"></canvas>
                        </div>
                    </div>
                </div>
                {{-- GRAFIK END --}}
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <!--notification start-->
                        <section class="panel">
                          <header class="panel-heading">
                            Alerts
                          </header>
                          @foreach ( $notif as $pem)
                          <div class="panel-body">
                            <div class="alert alert-block alert-danger fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                  <i class="icon-remove"></i>
                                </button>
                                <a href="notifreport/{{$pem->ID_JADWAL }}" style="text-decoration: none; color: black"> Jadwal Anda Pada Tanggal {{$pem->TANGGAL }} dengan Jadwal {{$pem->JADWAL }}  Belum Diisi atau Dilaporkan</a>
                              </div>

                        </div>
                      @endforeach
                    </div>


                    <div class="col-lg-12">
                        <!--Project Activity start-->
                        <section class="panel">
                            <div class="panel-body progress-panel">

                                <div class="row">
                                    <div class="col-lg-8 task-progress pull-left">
                                        <h1>Jadwal Saya</h1>
                                    </div>
                                    <div class="col-lg-4">
                                        <span class="profile-ava pull-right">
                                            <img alt="" class="simple" src="img/avatar1_small.jpg">
                                            {{ Session::get('user')[1] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @if (Session::has('messages'))
                                <span class="label label-success">{{ Session::get('messages') }}</span>
                            @endif
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th><i class=""></i>Nama Sales</th>
                                        <th><i class=""></i>Kegiatan</th>
                                        <th><i class=""></i>Tanggal Kegiatan</th>
                                        <th><i class=""></i>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal as $item)
                                        <tr>
                                            <td>{{ $item->NAMA_KARYAWAN }}</td>
                                            <td>{{ $item->JADWAL }}</td>
                                            <td>{{ $item->TANGGAL }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-primary"
                                                        href="reportjadwal/{{ $item->ID_JADWAL }}">Report</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <ul class="pagination justify-content-center" style="margin-left: 12px">
                                {{ $jadwal2->links() }}
                            </ul>
                        </section>
                        <!--Project Activity end-->
                    </div>
                    <div class="col-lg-12">
                        <!--Project Activity start-->
                        <section class="panel">
                            <div class="panel-body progress-panel">
                                <div class="row">
                                    <div class="col-lg-8 task-progress pull-left">
                                        <h1>Jadwal Seluruh Sales</h1>
                                    </div>
                                    <div class="col-lg-4">
                                        <span class="profile-ava pull-right">
                                            <img alt="" class="simple" src="img/avatar1_small.jpg">
                                            {{ Session::get('user')[1] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @if (Session::has('messages'))
                                <span class="label label-success">{{ Session::get('messages') }}</span>
                            @endif
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th><i class=""></i>Nama Sales</th>
                                        <th><i class=""></i>Kegiatan</th>
                                        <th><i class=""></i>Tanggal Kegiatan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal2 as $item)
                                        <tr>
                                            <td>{{ $item->NAMA_KARYAWAN }}</td>
                                            <td>{{ $item->JADWAL }}</td>
                                            <td>{{ $item->TANGGAL }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            <ul class="pagination justify-content-center" style="margin-left: 12px">
                                {{ $jadwal2->links() }}
                            </ul>
                        </section>
                        <!--Project Activity end-->
                    </div>
                    <div class="col-lg-12">
                        <!--Project Activity start-->
                        <section class="panel">
                            <div class="panel-body progress-panel">
                                <div class="row">
                                    <div class="col-lg-8 task-progress pull-left">
                                        <h1>Rincian Kerja Saya</h1>
                                    </div>

                                    <div class="col-lg-4">
                                        <span class="profile-ava pull-right">
                                            <img alt="" class="simple" src="img/avatar1_small.jpg">
                                            {{ Session::get('user')[1] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @if (Session::has('messages'))
                                <span class="label label-success">{{ Session::get('messages') }}</span>
                            @endif
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kegiatan</th>
                                        <th>Keterangan</th>
                                        <th>Walk in</th>
                                        <th>Dokumentasi</th>
                                        <th>Upload Dokumentasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $data)
                                        <tr>

                                            <td>{{ $data->TANGGAL_LAPORAN }}</td>
                                            <td>
                                                {{ $data->KEGIATAN }}
                                            </td>
                                            <td>
                                                {{ $data->KETERANGAN }}
                                            </td>
                                            <td>{{ $data->WI }}</td>
                                            <td>
                                                <img src="{{ asset('storage/app/public/uploads/' . $data->name) }}"
                                                    height="120px" width="120px" alt="image">
                                            </td>

                                            <td>
                                                <a href="uploadfoto/{{ $data->Winter }}" class="btn btn-primary"
                                                    style="margin-right: 8px">Upload Dokumentasi</a>
                                            </td>
                                            <td>
                                                {{-- <a href="editreportharian/{{ $data->Winter }}" class="btn btn-warning"
                                                    style="margin-right: 8px">Ubah Data</a> --}}
                                                <div class="btn-group">
                                                    <a class="btn btn-success"
                                                        href="editreportharian/{{ $data->Winter }}"><i
                                                            class="icon_pencil-edit"></i>
                                                        Ubah</a>
                                                </div>
                                            </td>

                                            {{-- <td>
                                        <span class="profile-ava">
                                            <img alt="" class="simple" src="img/avatar1_small.jpg">
                                        </span>
                                    </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <ul class="pagination justify-content-center" style="margin-left: 12px">
                                {{ $jadwal2->links() }}
                            </ul>
                        </section>
                        <!--Project Activity end-->
                    </div>
            </section>
            <div class="text-right">
                <div class="credits">
                    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    All the links in the footer should remain intact.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    You can delete the links only if you purchased the pro version.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Licensing information: https://bootstrapmade.com/license/
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -->
                    {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
                </div>
            </div>
        </section>

        </section>
        <!-- container section end -->

        {{-- CHART DIDI START! --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js">
        </script>
        @php
            $bulanDD = [];
            $closingDD = [];
            $targetDD = [];
        @endphp

        @for ($i = 0; $i < $closingDidi->count(); $i++)
            @php
                array_push($bulanDD, $closingDidi[$i]->BulanName);
                array_push($closingDD, $closingDidi[$i]->closing);
                array_push($targetDD, $targetDidi[$i]->target);
            @endphp
        @endfor

        <script>
            let bulanDD = <?= '["' . implode('", "', $bulanDD) . '"]' ?>;
            let closingDD = <?= '["' . implode('", "', $closingDD) . '"]' ?>;
            let targetDD = <?= '["' . implode('", "', $targetDD) . '"]' ?>;

            for (let index = 0; index < targetDD.length; index++) {
                console.log(bulanDD[index]);
            }
            const dataDD = {
                labels: bulanDD,
                datasets: [{
                    label: 'Rencana (Ra)',
                    backgroundColor: '#FF4242',
                    data: targetDD,
                    datalabels: {
                        color: 'white',
                        anchor: 'end',
                        align: 'bottom'
                    }
                }, {
                    label: 'Realisasi (Ri)',
                    backgroundColor: '#3467C0',
                    data: closingDD,
                    datalabels: {
                        color: 'black',
                        anchor: 'end',
                        align: 'top'
                    }
                }],
            }; // TAMPILAN GRAFIK
            const configDD = {
                type: 'bar',
                data: dataDD,
                options: {},
                plugins: [ChartDataLabels]
            };
            const myChartDD = new
            Chart(document.getElementById('ChartDidi'), configDD);
        </script>
        {{-- CHART DIDI END. --}}

        {{-- CHART FENDI START! --}}
        @php
            $bulanFD = [];
            $closingFD = [];
            $targetFD = [];
        @endphp

        @for ($i = 0; $i < $closingFendi->count(); $i++)
            @php
                array_push($bulanFD, $closingFendi[$i]->BulanName);
                array_push($closingFD, $closingFendi[$i]->closing);
                array_push($targetFD, $targetFendi[$i]->target);
            @endphp
        @endfor

        <script>
            let bulanFD = <?= '["' . implode('", "', $bulanFD) . '"]' ?>;
            let closingFD = <?= '["' . implode('", "', $closingFD) . '"]' ?>;
            let targetFD = <?= '["' . implode('", "', $targetFD) . '"]' ?>;

            for (let index = 0; index < targetDD.length; index++) {
                console.log(bulanFD[index]);
            }

            const dataFD = {
                labels: bulanFD,
                datasets: [{
                    label: 'Rencana (Ra)',
                    backgroundColor: '#FF4242',
                    data: targetFD,
                    datalabels: {
                        color: 'white',
                        anchor: 'end',
                        align: 'bottom'
                    }
                }, {
                    label: 'Realisasi (Ri)',
                    backgroundColor: '#3467C0',
                    data: closingFD,
                    datalabels: {
                        color: 'black',
                        anchor: 'end',
                        align: 'top'
                    }
                }],
            };
            // TAMPILAN GRAFIK
            const configFD = {
                type: 'bar',
                data: dataFD,
                options: {},
                plugins: [ChartDataLabels]
            };
            const myChartFD = new Chart(
                document.getElementById('ChartFendi'),
                configFD
            );
        </script>
        {{-- CHART FENDI END. --}}

        {{-- CHART ERI START! --}}
        @php
            $bulanER = [];
            $closingER = [];
            $targetER = [];
        @endphp

        @for ($i = 0; $i < $closingEri->count(); $i++)
            @php
                array_push($bulanER, $closingEri[$i]->BulanName);
                array_push($closingER, $closingEri[$i]->closing);
                array_push($targetER, $targetEri[$i]->target);
            @endphp
        @endfor

        <script>
            let bulanER = <?= '["' . implode('", "', $bulanER) . '"]' ?>;
            let closingER = <?= '["' . implode('", "', $closingER) . '"]' ?>;
            let targetER = <?= '["' . implode('", "', $targetER) . '"]' ?>;

            for (let index = 0; index < targetER.length; index++) {
                console.log(bulanER[index]);
            }

            const dataER = {
                labels: bulanER,
                datasets: [{
                    label: 'Rencana (Ra)',
                    backgroundColor: '#FF4242',
                    data: targetER,
                    datalabels: {
                        color: 'white',
                        anchor: 'end',
                        align: 'bottom'
                    }
                }, {
                    label: 'Realisasi (Ri)',
                    backgroundColor: '#3467C0',
                    data: closingER,
                    datalabels: {
                        color: 'black',
                        anchor: 'end',
                        align: 'top'
                    }
                }],
            };
            // TAMPILAN GRAFIK
            const configER = {
                type: 'bar',
                data: dataER,
                options: {},
                plugins: [ChartDataLabels]
            };
            const myChartER = new Chart(
                document.getElementById('ChartEri'),
                configER
            );
        </script>
        {{-- CHART ERI END. --}}

        {{-- CHART DEWI START! --}}
        @php
            $bulanDW = [];
            $closingDW = [];
            $targetDW = [];
        @endphp

        @for ($i = 0; $i < $closingDewi->count(); $i++)
            @php
                array_push($bulanDW, $closingDewi[$i]->BulanName);
                array_push($closingDW, $closingDewi[$i]->closing);
                array_push($targetDW, $targetDewi[$i]->target);
            @endphp
        @endfor

        <script>
            let bulanDW = <?= '["' . implode('", "', $bulanDW) . '"]' ?>;
            let closingDW = <?= '["' . implode('", "', $closingDW) . '"]' ?>;
            let targetDW = <?= '["' . implode('", "', $targetDW) . '"]' ?>;

            for (let index = 0; index < targetDW.length; index++) {
                console.log(bulanDW[index]);
            }

            const dataDW = {
                labels: bulanDW,
                datasets: [{
                    label: 'Rencana (Ra)',
                    backgroundColor: '#FF4242',
                    data: targetDW,
                    datalabels: {
                        color: 'white',
                        anchor: 'end',
                        align: 'bottom'
                    }
                }, {
                    label: 'Realisasi (Ri)',
                    backgroundColor: '#3467C0',
                    data: closingDW,
                    datalabels: {
                        color: 'black',
                        anchor: 'end',
                        align: 'top'
                    }
                }],
            };
            // TAMPILAN GRAFIK
            const configDW = {
                type: 'bar',
                data: dataDW,
                options: {},
                plugins: [ChartDataLabels]
            };
            const myChartDW = new Chart(
                document.getElementById('ChartDewi'),
                configDW
            );
        </script>
        {{-- CHART DEWI END. --}}

        <!-- javascripts -->
        <script src="resources/js/jquery.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <!-- nicescroll -->
        <script src="resources/js/jquery.scrollTo.min.js"></script>
        <script src="resources/js/jquery.nicescroll.js" type="text/javascript"></script>
        <!--custome script for all page-->
        <script src="resources/js/scripts.js"></script>





    </body>

@endsection
