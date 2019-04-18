<div>
    <a href="{{ route('room.edit', ['id' => $room->id]) }}" 
        class="btn waves-effect waves-light btn-success">
        <i class="icofont icofont-check-circled"></i>Edit
    </a>
    <button class="btn waves-effect waves-light btn-danger btn-delete"
        data-url="{{ route('room.delete', ['id' => $room->id ]) }}">
        <i class="icofont icofont-eye-alt"></i>Delete
    </button>
</div>