@extends('template/sidebar_man')
@section('content')
    @include('sweetalert::alert')

    <body>
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="icon_house"></i> Halaman Utama</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index_mana">Halaman Utama</a></li>
                        </ol>
                    </div>
                </div>

                {{-- GRAFIK START --}}
                <div class="row">
                    {{-- GRAFIK RARI DIV. MARKETING --}}
                    {{-- <div class="col-lg-12"> --}}
                    <div class="col-md-6 col-xl-3">
                        <div class="panel white-bg">
                            <div class="panel-heading" style="color: black">
                                <h2><strong>Grafik Akumulasi RA-RI</strong></h2>
                            </div>
                            {{-- <canvas id="ChartRaRi" position="relative" height="20%" width="100%"></canvas> --}}
                            <canvas id="ChartRaRi"></canvas>
                        </div>
                    </div>

                    {{-- RA-RI / Month --}}
                    {{-- <div class="col-lg-12"> --}}
                    <div class="col-md-6 col-xl-3">
                        <div class="panel white-bg">
                            <div class="panel-heading" style="color: black">
                                <h2><strong>Grafik RA-RI per Bulan</strong></h2>
                            </div>
                            {{-- <canvas id="ChartSales" position="relative" height="20%" width="100%"></canvas> --}}
                            <canvas id="ChartSales"></canvas>
                        </div>
                    </div>
                </div>
                {{-- GRAFIK END --}}

                <div class="row">
                    <div class="col-md-6 portlets">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><strong>Tabel Jadwal</strong></h2>
                                <div class="panel-actions">
                                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <!-- filter -->
                            <div class="panel-body">

                                <div class="col-lg-6" style="margin-top: 12px">
                                    {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search-bisa', 'onkeyup' => 'cari()', 'placeholder' => 'Nama Sales']) !!}</div>
                                <div class="col-lg-6">
                                    {!! Form::open(['id' => 'form_kategori_filter', 'class' => 'form-inline', 'style' => 'margin-top:12px']) !!}
                                    <select name="selector" class="form-control m-bot15" onchange="cari()" id="selector_id">
                                        <option value="default">--Pilih</option>
                                        @foreach ($kateg as $item)
                                            <option value="{{ $item->NAMA_KATJAD }}">
                                                {{ $item->NAMA_KATJAD }}</option>
                                        @endforeach
                                    </select>
                                    {!! Form::close() !!}
                                </div>

                                <script>
                                    function cari() {
                                        var nama = 2;
                                        var kategori = 3;

                                        // Declare variables
                                        var input, inputKat, valueKat, filter, table, tr, td, i, txtValueNama, txtValueKategori, cat, id_table,
                                            id_search;
                                        id_search = "search-bisa";
                                        id_table = "tabelku";

                                        input = document.getElementById(id_search);
                                        filter = input.value.toUpperCase();

                                        inputKat = document.getElementById('selector_id');
                                        valueKat = inputKat.options[inputKat.selectedIndex].value;

                                        table = document.getElementById(id_table);
                                        tr = table.getElementsByTagName("tr");

                                        // Loop through all table rows, and hide those who don't match the search query
                                        if (valueKat == 'default') {
                                            for (i = 0; i < tr.length; i++) {
                                                tdNama = tr[i].getElementsByTagName("td")[nama];

                                                if (tdNama) {
                                                    txtValueNama = tdNama.textContent || tdNama.innerText;
                                                    if (txtValueNama.toUpperCase().indexOf(filter) > -1) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
                                                }
                                            }

                                        } else if (valueKat == "default" && filter == "") {
                                            for (i = 0; i < tr.length; i++) {
                                                tr[i].style.display = "";
                                            }
                                        } else {
                                            for (i = 0; i < tr.length; i++) {
                                                tdNama = tr[i].getElementsByTagName("td")[nama];
                                                tdKategori = tr[i].getElementsByTagName("td")[kategori];
                                                if (tdNama && tdKategori) {
                                                    txtValueNama = tdNama.textContent || tdNama.innerText;
                                                    txtValueKategori = tdKategori.textContent || tdKategori.innerText;
                                                    if (txtValueNama.toUpperCase().indexOf(filter) > -1 && txtValueKategori == valueKat) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                </script>
                            </div>

                            <!-- Widget content -->
                            <table class="table table-striped table-advance table-hover" style='table-layout: fixed'
                                id="tabelku">
                                <tbody>
                                    <tr>
                                        <th><i class=""></i>No</th>
                                        <th><i class=""></i>Tanggal Kegiatan</th>
                                        <th><i class=""></i>Nama Sales</th>
                                        <th><i class=""></i>Kegiatan</th>
                                    </tr>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($kams as $item)

                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $item->TANGGAL }}</td>
                                            <td>{{ $item->NAMA_KARYAWAN }}</td>
                                            <td>{{ $item->JADWAL }}</td>
                                        </tr>

                                        @php
                                            $no++;
                                        @endphp


                                    @endforeach


                                </tbody>
                            </table>
                            <!-- Below line produces calendar. I am using FullCalendar plugin. -->
                            <div id="calendar"></div>


                        </div>

                    </div>

                    <!-- tampilan deteksi report karyawan  -->
                    <div class="col-lg-6">
                        <!--Project Activity start-->
                        <section class="panel">
                            <div class="panel-body progress-panel">
                                <div class="row">
                                    <div class="col-lg-8 task-progress pull-left">
                                        <h1>Report Sales</h1>
                                    </div>
                                    <div class="col-lg-4">
                                        <span class="profile-ava pull-right">
                                            <img alt="" class="simple" src="img/avatar1_small.jpg">
                                            {{ Session::get('user')[1] }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-hover personal-task">


                                <tbody>
                                    @foreach ($kams as $data)
                                        <tr>
                                            <td>{{ $data->TANGGAL }}</td>
                                            <td>{{ $data->NAMA_KARYAWAN }}</td>
                                            <td>{{ $data->JADWAL }}</td>



                                            @if ($data->REALISASI_JADWAL == 'Kanvasing')
                                                <td><span class="badge bg-success"> Kanvasing </span></td>
                                            @elseif ($data->REALISASI_JADWAL == 'Kantor' )
                                                <td><span class="badge bg-important"> Kantor </span></td>
                                            @elseif ($data->REALISASI_JADWAL == 'Pameran' )
                                                <td><span class="badge bg-warning"> Pameran </span></td>
                                            @elseif ($data->REALISASI_JADWAL == 'Flyering' )
                                                <td><span class="badge bg-important"> Flyering </span></td>
                                            @elseif ($data->REALISASI_JADWAL == 'OpenMeja' )
                                                <td><span class="badge bg-important"> Open Meja </span></td>
                                            @elseif ($data->REALISASI_JADWAL == 'Libur' )
                                                <td><span class="badge bg-important"> Off </span></td>
                                            @else
                                                <td><span class="badge bg-important"> Belum Report </span></td>
                                            @endif


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </section>
                    </div>
                </div><br><br>


                <!-- project team & activity end -->

            </section>
        </section>
        <!--main content end-->
        </section>
        <!-- container section start -->

        {{-- CHART RaRi START! --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js">
        </script>

        @php
            $bulanRaRi = [];
            $closingRaRi = [];
            $targetRaRi = [];
        @endphp

        @for ($i = 0; $i < $closingLila->count(); $i++)
            @php
                array_push($bulanRaRi, $closingLila[$i]->BulanName);
                array_push($closingRaRi, $closingLila[$i]->closing);
                array_push($targetRaRi, $targetMarketing[$i]->target);
            @endphp
        @endfor

        <script>
            let bulanRaRi = <?= '["' . implode('", "', $bulanRaRi) . '"]' ?>;
            let closingRaRi = <?= '["' . implode('", "', $closingRaRi) . '"]' ?>;
            let targetRaRi = <?= '["' . implode('", "', $targetRaRi) . '"]' ?>;

            const dataRaRi = {
                labels: bulanRaRi,
                datasets: [{
                    label: 'Rencana (Ra)',
                    backgroundColor: '#FF4242',
                    borderColor: '#FF4242',
                    data: targetRaRi,
                    datalabels: {
                        color: 'black',
                        anchor: 'end',
                        align: 'top'
                    }
                }, {
                    label: 'Realisasi (Ri)',
                    backgroundColor: '#47ABD8',
                    borderColor: '#47ABD8',
                    data: closingRaRi,
                    datalabels: {
                        color: 'black',
                        anchor: 'end',
                        align: 'top'
                    }
                }],
            };
            // TAMPILAN GRAFIK
            const configRaRi = {
                type: 'line',
                data: dataRaRi,
                options: {},
                plugins: [ChartDataLabels]
            };
            const myChartRaRi = new Chart(
                document.getElementById('ChartRaRi'),
                configRaRi
            );
        </script>
        {{-- CHART RaRi END --}}

        {{-- CHART Sales START --}}
        @php
            $bulanMonth = [];
            $closingMonth = [];
            $targetMonth = [];
            $targetNamaMonth = [];
        @endphp

        @for ($i = 0; $i < $closingSales->count(); $i++)
            @php
                array_push($bulanMonth, $closingSales[$i]->BulanName);
                array_push($closingMonth, $closingSales[$i]->closing);
                array_push($targetMonth, $targetSales[$i]->target);
                array_push($targetNamaMonth, $targetSales[$i]->BulanName);
            @endphp
        @endfor

        <script>
            let bulanMonth = <?= '["' . implode('", "', $bulanMonth) . '"]' ?>;
            let closingMonth = <?= '["' . implode('", "', $closingMonth) . '"]' ?>;
            let targetMonth = <?= '["' . implode('", "', $targetMonth) . '"]' ?>;
            let targetNamaMonth = <?= '["' . implode('", "', $targetNamaMonth) . '"]' ?>;

            // for (let index = 0; index < closingMonth.length; index++) {
            //     console.log(closingMonth[index]);
            // }

            for (let i = 0; i < closingMonth.length; i++) {
                if (closingMonth[i] === '') {
                    closingMonth[i] = 0;
                }
            }

            const dataMonth = {
                labels: bulanMonth,
                datasets: [{
                    label: 'Rencana (Ra)',
                    backgroundColor: '#FF4242',
                    data: targetMonth,
                    datalabels: {
                        color: 'white',
                        anchor: 'end',
                        align: 'bottom'
                    }
                }, {
                    label: 'Realisasi (Ri)',
                    backgroundColor: '#47ABD8',
                    data: closingMonth,
                    datalabels: {
                        color: 'black',
                        anchor: 'end',
                        align: 'top'
                    }
                }],
            };
            // TAMPILAN GRAFIK
            const configMonth = {
                type: 'bar',
                data: dataMonth,
                options: {},
                plugins: [ChartDataLabels],
            };

            const myChartMonth = new Chart(
                document.getElementById('ChartSales'),
                configMonth
            );
        </script>
        {{-- CHART Sales END --}}

        <!-- javascripts -->
        <script src="resources/js/jquery.js"></script>
        <script src="resources/js/jquery-ui-1.10.4.min.js"></script>
        <script src="resources/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="resources/js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="resources/js/jquery.scrollTo.min.js"></script>
        <script src="resources/js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="resources/assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="resources/js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="resources/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="resources/js/owl.carousel.js"></script>
        <!-- jQuery full calendar -->
        <!--script for this page only-->
        <script src="resources/js/calendar-custom.js"></script>
        <script src="resources/js/jquery.rateit.min.js"></script>
        <!-- custom select -->
        <script src="resources/js/jquery.customSelect.min.js"></script>
        <script src="resources/assets/chart-master/Chart.js"></script>

        <!--custome script for all page-->
        <script src="resources/js/scripts.js"></script>
        <!-- custom script for this page-->
        <script src="resources/js/sparkline-chart.js"></script>
        <script src="resources/js/easy-pie-chart.js"></script>
        <script src="resources/js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="resources/js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="resources/js/xcharts.min.js"></script>
        <script src="resources/js/jquery.autosize.min.js"></script>
        <script src="resources/js/jquery.placeholder.min.js"></script>
        <script src="resources/js/gdp-data.js"></script>
        <script src="resources/js/morris.min.js"></script>
        <script src="resources/js/sparklines.js"></script>
        <script src="resources/js/charts.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>
        <script>
            //knob
            $(function() {
                $(".knob").knob({
                    'draw': function() {
                        $(this.i).val(this.cv + '%')
                    }
                })
            });

            //carousel
            $(document).ready(function() {
                $("#owl-slider").owlCarousel({
                    navigation: true,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    singleItem: true

                });

            });

            //custom select box

            $(function() {
                $('select.styled').customSelect();
            });

            /* ---------- Map ---------- */
            $(function() {
                $('#map').vectorMap({
                    map: 'world_mill_en',
                    series: {
                        regions: [{
                            values: gdpData,
                            scale: ['#000', '#000'],
                            normalizeFunction: 'polynomial'
                        }]
                    },
                    backgroundColor: '#eef3f7',
                    onLabelShow: function(e, el, code) {
                        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                    }
                });
            });
        </script>

    </body>

@endsection
