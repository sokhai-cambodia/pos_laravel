<div>
    <a href="{{ route('unit.update', ['id' => $unit->id]) }}" 
        class="btn waves-effect waves-light btn-success">
        <i class="icofont icofont-check-circled"></i>Edit
    </a>
    <button class="btn waves-effect waves-light btn-danger btn-delete"
        data-url="{{ route('unit.delete', ['id' => $unit->id ]) }}">
        <i class="icofont icofont-eye-alt"></i>Delete
    </button>
</div>