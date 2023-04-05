@extends('template/sidebar')
@section('content')

    <body>
        <section id="container" class="">
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-table"></i> Pencatatan</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index_admin">Halaman Utama</a></li>
                                <li><i class=""></i>Pencatatan</li>
                                <li><i class=""></i>Pencatatan Karyawan</li>
                                <li><i class=""></i>Validasi</li>
                                <li><i class=""></i>Penolakan Akses Agent</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Tabel Kategori Penilaian
                                </header>
                                <div class="panel-body">
                                    {!! Form::open(['url' => '/kirimemailpenolakan', 'class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">ID Karyawan</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('id_karyawan', $edit->ID_KARYAWAN, ['class' => 'form-control', 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Karyawan</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('nama', $edit->NAMA_KARYAWAN, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">No. Telp</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('notelp', $edit->NO_TLP, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('email', $edit->EMAIL, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Title Penolakan </label>
                                        <div class="col-sm-10">
                                            {!! Form::text('title', 'Mail Penolakan Pendaftaran Akun Agent dan Akses Kepada Prospero Marketing Aplication ', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Keterangan Penolakan </label>
                                        <div class="col-sm-10">
                                            {!! Form::textarea(
    'body',
    'Terima kasih telah menghubungi saya kembali tentang keputusan perekrutan Green Foundation. Walau saya kecewa bahwa saya tidak terpilih untuk posisi Social Media Campaign, namun saya sangat menghargai dan berterima kasih atas kesempatan yang diberikan untuk melakukan wawancara pekerjaan tersebut dan bertemu dengan beberapa anggota tim Green Foundation.

Saya benar-benar menikmati belajar lebih banyak tentang Green Foundation dan akan senang untuk dipertimbangkan untuk setiap lowongan pekerjaan di masa depan yang mungkin tersedia.

Jika memungkinkan dan memiliki waktu luang, saya ingin meminta umpan balik maupun saran perihal aplikasi dan wawancara saya. Saya yakin setiap detail yang dapat diberikan akan membantu pencarian pekerjaan saya di masa depan.

Sekali lagi terima kasih atas waktu dan pertimbangannya, Ibu Siwi. Saya berharap jalan kita bisa bertemu lagi, dan saya berharap seluruh tim di Green Foundation terus berkembang dan menebarkan manfaat. Terakhir, apabila ada project yang mungkin bisa saya bantu dengan keahlian saya, Ibu Siwi bisa menghubungi saya melalui email Ayu@gmail.com maupun nomor Whatsapps 085 xxx xxx xxx. ',
    ['class' => 'form-control'],
) !!}

                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary simpan" type="submit">Simpan</button>
                                        <a href="../pencatatan" class="btn btn-danger" style="margin-left: 1%">batal</a>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </section>
        </section>

        </section>

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
        <<script src="resources/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
            <script src="resources/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
            <!--script for this page only-->
            <script src="resources/js/calendar-custom.js"></script>
            <script src="resources/js/jquery.rateit.min.js"></script>
            <!-- custom select -->
            <script src="resources/js/jquery.customSelect.min.js"></script>
            <script src="resources/assets/chart-master/Chart.js"></script>
            <!-- jquery ui -->
            <script src="resources/js/jquery-ui-1.9.2.custom.min.js"></script>
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
            <script src="resources/js/jquery.slimscroll.min.js"></script>

            <!--custom checkbox & radio-->
            <script type="text/javascript" src="resources/js/ga.js"></script>
            <!--custom switch-->
            <script src="resources/js/bootstrap-switch.js"></script>
            <!--custom tagsinput-->
            <script src="resources/js/jquery.tagsinput.js"></script>

            <!-- bootstrap-wysiwyg -->
            <script src="resources/js/jquery.hotkeys.js"></script>
            <script src="resources/js/bootstrap-wysiwyg.js"></script>
            <script src="resources/js/bootstrap-wysiwyg-custom.js"></script>
            <script src="resources/js/moment.js"></script>
            <script src="resources/js/bootstrap-colorpicker.js"></script>
            <script src="resources/js/daterangepicker.js"></script>
            <script src="resources/js/bootstrap-datepicker.js"></script>
            <!-- ck editor -->
            <script type="text/javascript" src="resources/assets/ckeditor/ckeditor.js"></script>
            <!-- custom form component script for this page-->
            <script src="resources/js/form-component.js"></script>
            <!-- custome script for all page -->
            <script src="js/scripts.js"></script>

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
