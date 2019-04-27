<tr>
    <td>
        <span class="product_no">1</span>
    </td>
    <td>
        <img src="{{ $product->getPhoto() }}" style="width: 92px; height: 92px;">
    </td>
    <td style="vertical-align:middle">
        <input type="hidden" name="inventory[][product_id]" class="product_id" value="{{ $product->id }}">
        {{ $product->name }}
    </td>
    <td style="vertical-align:middle">
        <select name="inventory[][unit_id]" class="form-control unit_id">
            @foreach ($units as $unit)
                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
            @endforeach
        </select>
    </td>
    <td style="vertical-align:middle">
        <input type="number" required step="0.01" min="1" name="inventory[][quantity]" class="form-control quantity"
placeholder="Enter Quanity" value="1">
    </td>
    <td style="vertical-align:middle">
        <button type="button" class="btn waves-effect waves-light btn-danger btn-delete">
           X
        </button>
    </td>
</tr>