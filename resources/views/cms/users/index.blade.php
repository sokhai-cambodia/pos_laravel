@extends('layouts.cms.template')
@section('header-src')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/assets/pages/data-table/extensions/select/css/select.dataTables.min.css')}}">
<script src="{{ asset('plugin/cms/assets/pages/data-table/extensions/select/js/select-custom.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
@endsection

@section('content')
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Users List</h5>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">User</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- Page-body start -->
                            <div class="page-body">
                                <!-- Single Select table start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Simple Initialization</h5>
                                        <span>Scroller is a plug-in for DataTables which enhances built-in scrolling features to allow large amounts of data to be rendered on page very quickly. This is done by Scroller through the use of a virtual rendering technique that will render only the part of the table that is actually required for the current view. Scroller assumes that all rows are of the same height (in order to preform the required calculations). Demo data in this example has 2,500 rows.</span>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="single-select" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Office</th>
                                                        <th>Age</th>
                                                        <th>Start date</th>
                                                        <th>Salary</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Tiger Nixon</td>
                                                        <td>System Architect</td>
                                                        <td>Edinburgh</td>
                                                        <td>61</td>
                                                        <td>2011/04/25</td>
                                                        <td>$320,800</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Jackson Bradshaw</td>
                                                        <td>Director</td>
                                                        <td>New York</td>
                                                        <td>65</td>
                                                        <td>2008/09/26</td>
                                                        <td>$645,750</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Olivia Liang</td>
                                                        <td>Support Engineer</td>
                                                        <td>Singapore</td>
                                                        <td>64</td>
                                                        <td>2011/02/03</td>
                                                        <td>$234,500</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bruno Nash</td>
                                                        <td>Software Engineer</td>
                                                        <td>London</td>
                                                        <td>38</td>
                                                        <td>2011/05/03</td>
                                                        <td>$163,500</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sakura Yamamoto</td>
                                                        <td>Support Engineer</td>
                                                        <td>Tokyo</td>
                                                        <td>37</td>
                                                        <td>2009/08/19</td>
                                                        <td>$139,575</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Thor Walton</td>
                                                        <td>Developer</td>
                                                        <td>New York</td>
                                                        <td>61</td>
                                                        <td>2013/08/11</td>
                                                        <td>$98,540</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Finn Camacho</td>
                                                        <td>Support Engineer</td>
                                                        <td>San Francisco</td>
                                                        <td>47</td>
                                                        <td>2009/07/07</td>
                                                        <td>$87,500</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Serge Baldwin</td>
                                                        <td>Data Coordinator</td>
                                                        <td>Singapore</td>
                                                        <td>64</td>
                                                        <td>2012/04/09</td>
                                                        <td>$138,575</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Zenaida Frank</td>
                                                        <td>Software Engineer</td>
                                                        <td>New York</td>
                                                        <td>63</td>
                                                        <td>2010/01/04</td>
                                                        <td>$125,250</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Zorita Serrano</td>
                                                        <td>Software Engineer</td>
                                                        <td>San Francisco</td>
                                                        <td>56</td>
                                                        <td>2012/06/01</td>
                                                        <td>$115,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jennifer Acosta</td>
                                                        <td>Junior Javascript Developer</td>
                                                        <td>Edinburgh</td>
                                                        <td>43</td>
                                                        <td>2013/02/01</td>
                                                        <td>$75,650</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cara Stevens</td>
                                                        <td>Sales Assistant</td>
                                                        <td>New York</td>
                                                        <td>46</td>
                                                        <td>2011/12/06</td>
                                                        <td>$145,600</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hermione Butler</td>
                                                        <td>Regional Director</td>
                                                        <td>London</td>
                                                        <td>47</td>
                                                        <td>2011/03/21</td>
                                                        <td>$356,250</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lael Greer</td>
                                                        <td>Systems Administrator</td>
                                                        <td>London</td>
                                                        <td>21</td>
                                                        <td>2009/02/27</td>
                                                        <td>$103,500</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jonas Alexander</td>
                                                        <td>Developer</td>
                                                        <td>San Francisco</td>
                                                        <td>30</td>
                                                        <td>2010/07/14</td>
                                                        <td>$86,500</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shad Decker</td>
                                                        <td>Regional Director</td>
                                                        <td>Edinburgh</td>
                                                        <td>51</td>
                                                        <td>2008/11/13</td>
                                                        <td>$183,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Michael Bruce</td>
                                                        <td>Javascript Developer</td>
                                                        <td>Singapore</td>
                                                        <td>29</td>
                                                        <td>2011/06/27</td>
                                                        <td>$183,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Donna Snider</td>
                                                        <td>Customer Support</td>
                                                        <td>New York</td>
                                                        <td>27</td>
                                                        <td>2011/01/25</td>
                                                        <td>$112,000</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Office</th>
                                                        <th>Age</th>
                                                        <th>Start date</th>
                                                        <th>Salary</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Select table end -->

                            </div>
                            <!-- Page-body end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-src')
<!-- data-table js -->
<script src="{{ asset('plugin/cms/bower_components/datatables.net/js/jquery.dataTables.min.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
<script src="{{ asset('plugin/cms/bower_components/datatables.net/js/jquery.dataTables.min.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
<script src="{{ asset('plugin/cms/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
<script src="{{ asset('plugin/cms/assets/pages/data-table/js/jszip.min.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
<script src="{{ asset('plugin/cms/assets/pages/data-table/js/pdfmake.min.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
<script src="{{ asset('plugin/cms/assets/pages/data-table/js/vfs_fonts.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
<script src="{{ asset('plugin/cms/assets/pages/data-table/extensions/select/js/dataTables.select.min.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
<script src="{{ asset('plugin/cms/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
<script src="{{ asset('plugin/cms/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
<script src="{{ asset('plugin/cms/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
<script src="{{ asset('plugin/cms/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
<script src="{{ asset('plugin/cms/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}" type="1dc35b20117229ba38203fd0-text/javascript"></script>
@endsection
