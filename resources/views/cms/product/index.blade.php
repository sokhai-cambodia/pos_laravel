@extends('layouts.cms.template') 
@section('header-src')
     <!-- Data Table Css -->
  

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
            <h5>Product Category</h5>
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
            <li class="breadcrumb-item"><a href="#!">Product Category Category</a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- [ breadcrumb ] end -->
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-body">


          {{-- table --}}
          <div class="card">
            <div class="card-header">
              <h5>DOM/Jquery</h5>
              <span>Events assigned to the table can be exceptionally useful for user interaction, however you must be aware that DataTables will add and remove rows from the DOM as they are needed (i.e. when paging only the visible elements are actually available in the DOM). As such, this can lead to the odd hiccup when working with events.</span>
            </div>
            <div class="card-block">
              <div class="table-responsive dt-responsive">
                <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-xs-12 col-sm-12 col-sm-12 col-md-6"><div class="dataTables_length" id="dom-jqry_length"><label>Show <select name="dom-jqry_length" aria-controls="dom-jqry" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-xs-12 col-sm-12 col-md-6"><div id="dom-jqry_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="dom-jqry"></label></div></div></div><div class="row"><div class="col-xs-12 col-sm-12"><table id="dom-jqry" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="dom-jqry_info">
                  <thead>
                    <tr role="row"><th class="sorting" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 219px;">Name</th><th class="sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-label="Position: activate to sort column descending" aria-sort="ascending" style="width: 327px;">Position</th><th class="sorting" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 160px;">Office</th><th class="sorting" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 74px;">Age</th><th class="sorting" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 151px;">Start date</th><th class="sorting" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 107px;">Salary</th></tr>
                  </thead>
                  <tbody>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                  <tr role="row" class="odd">
                      <td class="">Garrett Winters</td>
                      <td class="sorting_1">Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr><tr role="row" class="even">
                      <td class="">Airi Satou</td>
                      <td class="sorting_1">Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
                    </tr><tr role="row" class="odd">
                      <td class="">Paul Byrd</td>
                      <td class="sorting_1">Chief Financial Officer (CFO)</td>
                      <td>New York</td>
                      <td>64</td>
                      <td>2010/06/09</td>
                      <td>$725,000</td>
                    </tr><tr role="row" class="even">
                      <td class="">Rhona Davidson</td>
                      <td class="sorting_1">Integration Specialist</td>
                      <td>Tokyo</td>
                      <td>55</td>
                      <td>2010/10/14</td>
                      <td>$327,900</td>
                    </tr><tr role="row" class="odd">
                      <td class="">Brielle Williamson</td>
                      <td class="sorting_1">Integration Specialist</td>
                      <td>New York</td>
                      <td>61</td>
                      <td>2012/12/02</td>
                      <td>$372,000</td>
                    </tr><tr role="row" class="even">
                      <td class="">Colleen Hurst</td>
                      <td class="sorting_1">Javascript Developer</td>
                      <td>San Francisco</td>
                      <td>39</td>
                      <td>2009/09/15</td>
                      <td>$205,500</td>
                    </tr><tr role="row" class="odd">
                      <td class="">Ashton Cox</td>
                      <td class="sorting_1">Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                    </tr><tr role="row" class="even">
                      <td class="">Michael Silva</td>
                      <td class="sorting_1">Marketing Designer</td>
                      <td>London</td>
                      <td>66</td>
                      <td>2012/11/27</td>
                      <td>$198,500</td>
                    </tr><tr role="row" class="odd">
                      <td class="">Jena Gaines</td>
                      <td class="sorting_1">Office Manager</td>
                      <td>London</td>
                      <td>30</td>
                      <td>2008/12/19</td>
                      <td>$90,560</td>
                    </tr><tr role="row" class="even">
                      <td class="">Dai Rios</td>
                      <td class="sorting_1">Personnel Lead</td>
                      <td>Edinburgh</td>
                      <td>35</td>
                      <td>2012/09/26</td>
                      <td>$217,500</td>
                    </tr></tbody>
                  <tfoot>
                    <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                  </tfoot>
                </table></div></div><div class="row"><div class="col-xs-12 col-sm-12 col-md-5"><div class="dataTables_info" id="dom-jqry_info" role="status" aria-live="polite">Showing 1 to 10 of 20 entries</div></div><div class="col-xs-12 col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dom-jqry_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dom-jqry_previous"><a href="#" aria-controls="dom-jqry" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dom-jqry" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dom-jqry" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="dom-jqry_next"><a href="#" aria-controls="dom-jqry" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
              </div>
            </div>
          </div>

          {{-- end table --}}


        </div>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('footer-src')
@include('layouts.cms.data-table')
@endsection