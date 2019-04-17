<div>
    <a href="{{ route('user.edit', ['id' => $user->id]) }}" 
        class="btn waves-effect waves-light btn-success">
        <i class="icofont icofont-check-circled"></i>Edit
    </a>
    <button class="btn waves-effect waves-light btn-danger btn-delete"
        data-url="{{ route('user.delete', ['id' => $user->id ]) }}">
        <i class="icofont icofont-eye-alt"></i>Delete
    </button>
</div>