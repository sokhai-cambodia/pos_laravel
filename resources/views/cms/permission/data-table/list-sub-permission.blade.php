
@if(count($permissions) > 0)
    <ul>
        @foreach ($permissions as $permission)
            <li>
                {{ $permission->name }}
                <label class="badge {{ $permission->use_for_action ? 'badge-success' :  'badge-danger'}}">
                    {{ $permission->use_for_action ? 'Yes' :  'No'}}
                </label>
            </li> 
        @endforeach
    </ul>
@else
    <label class="badge badge-danger">No sub permission</label>
@endif