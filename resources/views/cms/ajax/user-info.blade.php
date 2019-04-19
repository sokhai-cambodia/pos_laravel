<div class="card-sub">
    <div class="text-center">
        <img class="card-img-top" src="{{ $user->getPhoto() }}" alt="Card image cap" style="width: 50%; margin: 0 auto;">
    </div>
    <div class="card-block" style="margin-top: 10px">
        <h3 class="card-title text-center">{{ $user->last_name.' '.$user->first_name }}</h3>
        <h6 class="card-title text-center">{{ $user->role->name }}</h6>
        <div class="col-sm-12">
            <h4 class="sub-title">User Detail</h4>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group input-group-warning">
                        <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-queen"></i></label></span>
                        <input type="text" class="form-control" placeholder="input-group-warning" value="{{ $user->username }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group input-group-danger">
                        <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-volume-down"></i></label></span>
                        <input type="text" class="form-control" placeholder="input-group-danger" value="{{ $user->gender }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group input-group-success">
                        <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-volume-off"></i></label></span>
                        <input type="text" class="form-control" placeholder="input-group-success" value="{{ $user->dob }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group input-group-inverse">
                        <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-wifi"></i></label></span>
                        <input type="text" class="form-control" placeholder="input-group-inverse" value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group input-group-info">
                        <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-signal"></i></label></span>
                        <input type="text" class="form-control" placeholder="input-group-info" value="{{ $user->is_active ? 'active' : 'inactive' }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <h4 class="sub-title">Branches</h4>
            <div class="row">
                @foreach($branches as $branch)
                    <div class="col-sm-6">
                        <div class="border-checkbox-section">
                            <div class="border-checkbox-group border-checkbox-group-primary">
                                <input class="border-checkbox" type="checkbox" id="branch_{{$branch->id}}" value="{{$branch->id}}" name="branches[]" {{ UtilHelper::checked($branch->checked, 1) }}>
                                <label class="border-checkbox-label">{{$branch->name}}</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>