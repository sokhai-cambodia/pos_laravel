@if(count($permissions) > 0)
    @foreach ($permissions as $permission)
        <tr>
            <th scope="row">1</th>
            <td>{{ $permission->name }}</td>
            <td>
                <label class="badge {{ $permission->use_for_action ? 'badge-success' :  'badge-danger'}}">
                        {{ $permission->use_for_action ? 'Yes' :  'No'}}
                </label>
            </td>
            <td>
                <div>
                    <a href="{{ route('permission.update', ['id' => $permission->id]) }}" 
                        class="btn waves-effect waves-light btn-success">
                        <i class="icofont icofont-check-circled"></i>Edit
                    </a>
                    <button class="btn waves-effect waves-light btn-danger btn-delete"
                        data-url="{{ route('permission.delete', ['id' => $permission->id ]) }}">
                        <i class="icofont icofont-eye-alt"></i>Delete
                    </button>
                </div>
                            
            </td>
        </tr>
    @endforeach
@else 
    <tr>
        <th colspan="4" class="text-center">No sub permission</th>
    </tr>
@endif