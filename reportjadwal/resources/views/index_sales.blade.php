@extends('template/sidebar_sales')
@section('content')

    <body>

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-laptop"></i> Halaman Utama</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index.html">Beranda</a></li>
                                {{-- <li><i class="fa fa-laptop"></i>Dashboard</li> --}}
                            </ol>
                        </div>
                    </div>
                    {{-- up header --}}
                    {{-- <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box blue-bg">
                            <i class="fa fa-cloud-download"></i>
                            <div class="count">6.674</div>
                            <div class="title">Download</div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                            <i class="fa fa-shopping-cart"></i>
                            <div class="count">7.538</div>
                            <div class="title">Purchased</div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box dark-bg">
                            <i class="fa fa-thumbs-o-up"></i>
                            <div class="count">4.362</div>
                            <div class="title">Order</div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box green-bg">
                            <i class="fa fa-cubes"></i>
                            <div class="count">1.426</div>
                            <div class="title">Stock</div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                </div> --}}
                    <!--/.row-->


                    {{-- <div class="row">
                    <div class="col-lg-9 col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><i class="fa fa-map-marker red"></i><strong>Countries</strong></h2>
                                <div class="panel-actions">
                                    <a href="index.html#" class="btn-setting"><i
                                            class="fa fa-rotate-right"></i></a>
                                    <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                                    <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <div class="panel-body-map">
                                <div id="map" style="height:380px;"></div>
                            </div>

                        </div>
                    </div> --}}
                    {{-- <div class="col-md-3">
                        <!-- List starts -->
                        <ul class="today-datas">
                            <!-- List #1 -->
                            <li>
                                <!-- Graph -->
                                <div><span id="todayspark1" class="spark"></span></div>
                                <!-- Text -->
                                <div class="datas-text">11,500 visitors/day</div>
                            </li>
                            <li>
                                <div><span id="todayspark2" class="spark"></span></div>
                                <div class="datas-text">15,000 Pageviews</div>
                            </li>
                            <li>
                                <div><span id="todayspark3" class="spark"></span></div>
                                <div class="datas-text">30.55% Bounce Rate</div>
                            </li>
                            <li>
                                <div><span id="todayspark4" class="spark"></span></div>
                                <div class="datas-text">$16,00 Revenue/Day</div>
                            </li>
                            <li>
                                <div><span id="todayspark5" class="spark"></span></div>
                                <div class="datas-text">12,000000 visitors every Month</div>
                            </li>
                        </ul>
                    </div>


                </div>


                <!-- Today status end --> --}}



                    {{-- <div class="row">

                    <div class="col-lg-9 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><i class="fa fa-flag-o red"></i><strong>Registered Users</strong></h2>
                                <div class="panel-actions">
                                    <a href="index.html#" class="btn-setting"><i
                                            class="fa fa-rotate-right"></i></a>
                                    <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                                    <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table bootstrap-datatable countries">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Country</th>
                                            <th>Users</th>
                                            <th>Online</th>
                                            <th>Performance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="img/Germany.png" style="height:18px; margin-top:-2px;"></td>
                                            <td>Germany</td>
                                            <td>2563</td>
                                            <td>1025</td>
                                            <td>
                                                <div class="progress thin">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                                        aria-valuenow="73" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 73%">
                                                    </div>
                                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                                        aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 27%">
                                                    </div>
                                                </div>
                                                <span class="sr-only">73%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="img/India.png" style="height:18px; margin-top:-2px;"></td>
                                            <td>India</td>
                                            <td>3652</td>
                                            <td>2563</td>
                                            <td>
                                                <div class="progress thin">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                                        aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 57%">
                                                    </div>
                                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                                        aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 43%">
                                                    </div>
                                                </div>
                                                <span class="sr-only">57%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="img/Spain.png" style="height:18px; margin-top:-2px;"></td>
                                            <td>Spain</td>
                                            <td>562</td>
                                            <td>452</td>
                                            <td>
                                                <div class="progress thin">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                                        aria-valuenow="93" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 93%">
                                                    </div>
                                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                                        aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 7%">
                                                    </div>
                                                </div>
                                                <span class="sr-only">93%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="img/India.png" style="height:18px; margin-top:-2px;"></td>
                                            <td>Russia</td>
                                            <td>1258</td>
                                            <td>958</td>
                                            <td>
                                                <div class="progress thin">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 20%">
                                                    </div>
                                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 80%">
                                                    </div>
                                                </div>
                                                <span class="sr-only">20%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="img/Spain.png" style="height:18px; margin-top:-2px;"></td>
                                            <td>USA</td>
                                            <td>4856</td>
                                            <td>3621</td>
                                            <td>
                                                <div class="progress thin">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 20%">
                                                    </div>
                                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 80%">
                                                    </div>
                                                </div>
                                                <span class="sr-only">20%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="img/Germany.png" style="height:18px; margin-top:-2px;"></td>
                                            <td>Brazil</td>
                                            <td>265</td>
                                            <td>102</td>
                                            <td>
                                                <div class="progress thin">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 20%">
                                                    </div>
                                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 80%">
                                                    </div>
                                                </div>
                                                <span class="sr-only">20%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="img/Germany.png" style="height:18px; margin-top:-2px;"></td>
                                            <td>Coloumbia</td>
                                            <td>265</td>
                                            <td>102</td>
                                            <td>
                                                <div class="progress thin">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 20%">
                                                    </div>
                                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 80%">
                                                    </div>
                                                </div>
                                                <span class="sr-only">20%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="img/Germany.png" style="height:18px; margin-top:-2px;"></td>
                                            <td>France</td>
                                            <td>265</td>
                                            <td>102</td>
                                            <td>
                                                <div class="progress thin">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 20%">
                                                    </div>
                                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 80%">
                                                    </div>
                                                </div>
                                                <span class="sr-only">20%</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div> --}}
                    <!--/col-->
                    {{-- <div class="col-md-3">

                        <div class="social-box facebook">
                            <i class="fa fa-facebook"></i>
                            <ul>
                                <li>
                                    <strong>256k</strong>
                                    <span>friends</span>
                                </li>
                                <li>
                                    <strong>359</strong>
                                    <span>feeds</span>
                                </li>
                            </ul>
                        </div>
                        <!--/social-box-->
                    </div>
                    <div class="col-md-3">

                        <div class="social-box google-plus">
                            <i class="fa fa-google-plus"></i>
                            <ul>
                                <li>
                                    <strong>962</strong>
                                    <span>followers</span>
                                </li>
                                <li>
                                    <strong>256</strong>
                                    <span>circles</span>
                                </li>
                            </ul>
                        </div>
                        <!--/social-box-->

                    </div>
                    <!--/col-->
                    <div class="col-md-3">

                        <div class="social-box twitter">
                            <i class="fa fa-twitter"></i>
                            <ul>
                                <li>
                                    <strong>1562k</strong>
                                    <span>followers</span>
                                </li>
                                <li>
                                    <strong>2562</strong>
                                    <span>tweets</span>
                                </li>
                            </ul>
                        </div>
                        <!--/social-box-->

                    </div>
                    <!--/col-->

                </div> --}}
                    <div class="row">

                        <div class="col-md-12 portlets">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="pull-left">Form Laporan</div>
                                    <div class="widget-icons pull-right">
                                        <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                        <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <div class="padd">

                                        <div class="form quick-post">
                                            <!-- Edit profile form (not working)-->
                                            <form class="form-horizontal">
                                                <!-- Title -->
                                                <div class="form-group">
                                                    <label class="control-label col-lg-2" for="title">Title</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" id="title">
                                                    </div>
                                                </div>
                                                <!-- Content -->
                                                <div class="form-group">
                                                    <label class="control-label col-lg-2" for="content">Content</label>
                                                    <div class="col-lg-10">
                                                        <textarea class="form-control" id="content"></textarea>
                                                    </div>
                                                </div>

                                                <!-- Date Picker -->
                                                <div class="form-group">
                                                    <label class="control-label  col-lg-2">Tanggal</label>
                                                    <div class="col-lg-10">
                                                        <input id="dp1" type="text" value="28-10-2013" size="16"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <!-- Cateogry -->
                                                {{-- <div class="form-group">
                                <label class="control-label col-lg-2">Category</label>
                                <div class="col-lg-10">
                                    <select class="form-control">
                                        <option value="">- Choose Cateogry -</option>
                                        <option value="1">General</option>
                                        <option value="2">News</option>
                                        <option value="3">Media</option>
                                        <option value="4">Funny</option>
                                    </select>
                                </div>
                            </div> --}}
                                                <!-- Tags -->
                                                {{-- <div class="form-group">
                                <label class="control-label col-lg-2" for="tags">Tags</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="tags">
                                </div>
                            </div> --}}
                                                <!-- Ckeditor -->


                                                <div class="form ">
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">Keterangan</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control ckeditor" name="editor1"
                                                                    rows="6"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <br>



                                                <!-- Buttons -->
                                                <div class="form-group">
                                                    <!-- Buttons -->
                                                    <div class="col-lg-offset-2 col-lg-9">
                                                        <button type="submit" class="btn btn-primary">Publish</button>
                                                        <button type="submit" class="btn btn-danger">Save Draft</button>
                                                        <button type="reset" class="btn btn-default">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                    <div class="widget-foot">
                                        <!-- Footer goes here -->
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- statics end -->




                    <!-- project team & activity start -->
                    <div class="row">
                        {{-- <div class="col-md-4 portlets">
                        <!-- Widget -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-left">Message</div>
                                <div class="widget-icons pull-right">
                                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="panel-body">
                                <!-- Widget content -->
                                <div class="padd sscroll">

                                    <ul class="chats">

                                        <!-- Chat by us. Use the class "by-me". -->
                                        <li class="by-me">
                                            <!-- Use the class "pull-left" in avatar -->
                                            <div class="avatar pull-left">
                                                <img src="img/user.jpg" alt="" />
                                            </div>

                                            <div class="chat-content">
                                                <!-- In meta area, first include "name" and then "time" -->
                                                <div class="chat-meta">John Smith <span class="pull-right">3
                                                        hours ago</span></div>
                                                Vivamus diam elit diam, consectetur dapibus adipiscing elit.
                                                <div class="clearfix"></div>
                                            </div>
                                        </li>

                                        <!-- Chat by other. Use the class "by-other". -->
                                        <li class="by-other">
                                            <!-- Use the class "pull-right" in avatar -->
                                            <div class="avatar pull-right">
                                                <img src="img/user22.png" alt="" />
                                            </div>

                                            <div class="chat-content">
                                                <!-- In the chat meta, first include "time" then "name" -->
                                                <div class="chat-meta">3 hours ago <span
                                                        class="pull-right">Jenifer Smith</span></div>
                                                Vivamus diam elit diam, consectetur fconsectetur dapibus adipiscing
                                                elit.
                                                <div class="clearfix"></div>
                                            </div>
                                        </li>

                                        <li class="by-me">
                                            <div class="avatar pull-left">
                                                <img src="img/user.jpg" alt="" />
                                            </div>

                                            <div class="chat-content">
                                                <div class="chat-meta">John Smith <span class="pull-right">4
                                                        hours ago</span></div>
                                                Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus
                                                consectetur dapibus adipiscing elit.
                                                <div class="clearfix"></div>
                                            </div>
                                        </li>

                                        <li class="by-other">
                                            <!-- Use the class "pull-right" in avatar -->
                                            <div class="avatar pull-right">
                                                <img src="img/user22.png" alt="" />
                                            </div>

                                            <div class="chat-content">
                                                <!-- In the chat meta, first include "time" then "name" -->
                                                <div class="chat-meta">3 hours ago <span
                                                        class="pull-right">Jenifer Smith</span></div>
                                                Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus
                                                consectetur dapibus adipiscing elit.
                                                <div class="clearfix"></div>
                                            </div>
                                        </li>

                                    </ul>

                                </div>
                                <!-- Widget footer -->
                                <div class="widget-foot">

                                    <form class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="Type your message here...">
                                        </div>
                                        <button type="submit" class="btn btn-info">Send</button>
                                    </form>


                                </div>
                            </div>


                        </div>
                    </div> --}}

                        <div class="col-lg-12">
                            <!--Project Activity start-->
                            <section class="panel">
                                <div class="panel-body progress-panel">
                                    <div class="row">
                                        <div class="col-lg-8 task-progress pull-left">
                                            <h1>Rincian Kerja Setiap Hari</h1>
                                        </div>
                                        <div class="col-lg-4">
                                            <span class="profile-ava pull-right">
                                                <img alt="" class="simple" src="img/avatar1_small.jpg">
                                                {{ Session::get('user')[1] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @if(Session::has('messages'))
                        <span class="label label-success">{{Session::get('messages')}}</span>
                        @endif
                        <table class="table table-hover personal-task">
                            <thead>
                                <tr>
                                            <th><i class="icon_profile"></i> Nama Sales</th>
                                            <th><i class="icon_profile"></i> Kegiatan</th>
                                            <th><i class="icon_calendar"></i>Tanggal Kegiatan</th>
                                            <th><i class="icon_mail_alt"></i> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwal as $item )
                                <tr>
                                                <td>{{ $item->NAMA_KARYAWAN }}</td>
                                                <td>{{ $item->JADWAL }}</td>
                                                <td>{{ $item->TANGGAL }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-primary" href="reportjadwal/{{$item->ID_JADWAL}}">Report</a>
                                                    </div>
                                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                            </section>
                            <!--Project Activity end-->
                        </div>
                    </div><br><br>


                    <!-- project team & activity end -->

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
            <!--main content end-->
        </section>
        <!-- container section start -->

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




            <!-- jquery ui -->
            <script src="resources/js/jquery-ui-1.9.2.custom.min.js"></script>

            <!--custom checkbox & radio-->
            <script type="resources/text/javascript" src="js/ga.js"></script>
            <!--custom switch-->
            <script src="resources/js/bootstrap-switch.js"></script>
            <!--custom tagsinput-->
            <script src="resources/js/jquery.tagsinput.js"></script>

            <!-- colorpicker -->

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
            <script src="resources/js/scripts.js"></script>
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
