<div>
    <a href="{{ route('branch.update', ['id' => $branch->id]) }}" 
        class="btn waves-effect waves-light btn-success">
        <i class="icofont icofont-check-circled"></i>Edit
    </a>
    <button class="btn waves-effect waves-light btn-danger btn-delete"
        data-url="{{ route('branch.delete', ['id' => $branch->id ]) }}">
        <i class="icofont icofont-eye-alt"></i>Delete
    </button>
</div>