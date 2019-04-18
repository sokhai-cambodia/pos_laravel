<div>
    <a href="{{ route('role.edit', ['id' => $role->id]) }}" 
        class="btn waves-effect waves-light btn-success">
        <i class="icofont icofont-check-circled"></i>Edit
    </a>
    <button class="btn waves-effect waves-light btn-danger btn-delete"
        data-url="{{ route('role.delete', ['id' => $role->id ]) }}">
        <i class="icofont icofont-eye-alt"></i>Delete
    </button>
</div>