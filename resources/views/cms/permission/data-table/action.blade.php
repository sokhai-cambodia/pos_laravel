<div class="dropdown-success dropdown open">
    <button class="btn btn-success dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="icofont icofont-check-circled"></i>Action
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
        <a class="dropdown-item waves-light waves-effect" href="{{ route('permission.update', ['id' => $permission->id]) }}">Edit</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item waves-light waves-effect btn-delete" 
            href="javascript:void(0)"
            data-url="{{ route('permission.delete', ['id' => $permission->id ]) }}">Delete
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item waves-light waves-effect view-info" 
            href="javascript:void(0)"
            data-id="{{ $permission->id }}">View Info</a>
    </div>
</div>
    