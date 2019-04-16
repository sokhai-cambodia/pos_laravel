<div>
    <a href="{{ route('category.edit', ['id' => $category->id]) }}" 
        class="btn waves-effect waves-light btn-success">
        <i class="icofont icofont-check-circled"></i>Edit
    </a>
    <button class="btn waves-effect waves-light btn-danger btn-delete"
        data-url="{{ route('category.delete', ['id' => $category->id ]) }}">
        <i class="icofont icofont-eye-alt"></i>Delete
    </button>
</div>