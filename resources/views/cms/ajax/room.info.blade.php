<div class="card-sub">
        {{-- <div class="text-center">
                <img class="card-img-top" src="{{ $room->getPhoto() }}" alt="Card image cap" style="width: 50%; margin: 0 auto;">
        </div> --}}
        
        <div class="card-block" style="margin-top: 10px">
            <div class="col-sm-12">
                    <h4 class="sub-title">User Detail</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-warning">
                                <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-queen"></i></label></span>
                                <input type="text" class="form-control" placeholder="input-group-warning" value="{{ $room->id}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group input-group-danger">
                                <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-volume-down"></i></label></span>
                                <input type="text" class="form-control" placeholder="input-group-danger" value="{{ $room->room_no }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group input-group-success">
                                <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-volume-off"></i></label></span>
                                <input type="text" class="form-control" placeholder="input-group-success" value="{{ $room->branch_id->branch }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group input-group-inverse">
                                <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-wifi"></i></label></span>
                                <input type="text" class="form-control" placeholder="input-group-inverse" value="{{ $room->bed }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group input-group-info">
                                <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-signal"></i></label></span>
                                <input type="text" class="form-control" placeholder="input-group-info" value="{{ $room->status }}">
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>