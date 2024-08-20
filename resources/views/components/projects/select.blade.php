@props(['value' => null, 'users' => [], 'is_active' => null])

<select {{ $attributes->class([
    'form-select',
    'mb-3',
]) }}>
    @if($is_active)
        <option {{ ($value == 1) ? 'selected' : null }} value="1">Активен</option>
        <option {{ ($value != 1) ? 'selected' : null }} value="0">Не активен</option>
    @else

        <option @empty($value) selected @endempty disabled >{{$slot}}</option>
        @foreach($users as $name => $id)
            <option value="{{ $id }}" {{ ($id == $value) ? 'selected' : null }}>
                {{ $name }}
            </option>
        @endforeach
    @endif

</select>