@extends('layouts.cms.template')

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
                            <h5>Edit With Button</h5>
                            <span>Click on buttons to perform actions</span>
                          </div>
                          <div class="card-block">
                            <div class="table-responsive">
                              <table class="table table-striped table-bordered" id="example-2">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>First</th>
                                    <th>Last</th>
                                    <th>Nickname</th>
                                  <th class="tabledit-toolbar-column"></th></tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Mark
                                      
                                    </span><input class="tabledit-input form-control input-sm" name="First Name" value="Mark
                                      
                                    " style="display: none;" disabled="" type="text"></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Otto
                                      
                                    </span><input class="tabledit-input form-control input-sm" name="Last Name" value="Otto
                                      
                                    " style="display: none;" disabled="" type="text"></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">@mdo</span>
                                      <select class="tabledit-input form-control input-sm" name="Nickname" disabled="" style="display:none;">
                                        <option value="1">@mdo</option>
                                        <option value="2">@fat</option>
                                        <option value="3">@twitter</option>
                                      </select>
                                    </td>
                                  <td style="white-space: nowrap; width: 1%;"><div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                           <div class="btn-group btn-group-sm" style="float: none;"><button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;"><span class="icofont icofont-ui-edit"></span></button><button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light" style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button></div>
                                           <button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none;">Save</button>
                                           <button type="button" class="tabledit-confirm-button btn btn-sm btn-danger" style="display: none; float: none;">Confirm</button>
                                           <button type="button" class="tabledit-restore-button btn btn-sm btn-warning" style="display: none; float: none;">Restore</button>
                                       </div></td></tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Jacob
                                      
                                    </span><input class="tabledit-input form-control input-sm" name="First Name" value="Jacob
                                      
                                    " style="display: none;" disabled="" type="text"></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Thorntonkk
                                      
                                    </span><input class="tabledit-input form-control input-sm" name="Last Name" value="Thorntonkk
                                      
                                    " style="display: none;" disabled="" type="text"></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">@mdo</span>
                                      <select class="tabledit-input form-control input-sm" name="Nickname" disabled="" style="display:none;">
                                        <option value="1">@mdo</option>
                                        <option value="2">@fat</option>
                                        <option value="3">@twitter</option>
                                      </select>
                                    </td>
                                  <td style="white-space: nowrap; width: 1%;"><div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                           <div class="btn-group btn-group-sm" style="float: none;"><button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;"><span class="icofont icofont-ui-edit"></span></button><button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light" style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button></div>
                                           <button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none;">Save</button>
                                           <button type="button" class="tabledit-confirm-button btn btn-sm btn-danger" style="display: none; float: none;">Confirm</button>
                                           <button type="button" class="tabledit-restore-button btn btn-sm btn-warning" style="display: none; float: none;">Restore</button>
                                       </div></td></tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Larry
                                      
                                    </span><input class="tabledit-input form-control input-sm" name="First Name" value="Larry
                                      
                                    " style="display: none;" disabled="" type="text"></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">the Bird
                                      
                                    </span><input class="tabledit-input form-control input-sm" name="Last Name" value="the Bird
                                      
                                    " style="display: none;" disabled="" type="text"></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">@mdo</span>
                                      <select class="tabledit-input form-control input-sm" name="Nickname" disabled="" style="display:none;">
                                        <option value="1">@mdo</option>
                                        <option value="2">@fat</option>
                                        <option value="3">@twitter</option>
                                      </select>
                                    </td>
                                  <td style="white-space: nowrap; width: 1%;"><div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                           <div class="btn-group btn-group-sm" style="float: none;"><button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;"><span class="icofont icofont-ui-edit"></span></button><button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light" style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button></div>
                                           <button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none;">Save</button>
                                           <button type="button" class="tabledit-confirm-button btn btn-sm btn-danger" style="display: none; float: none;">Confirm</button>
                                           <button type="button" class="tabledit-restore-button btn btn-sm btn-warning" style="display: none; float: none;">Restore</button>
                                       </div></td></tr>
                                </tbody>
                              </table>
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