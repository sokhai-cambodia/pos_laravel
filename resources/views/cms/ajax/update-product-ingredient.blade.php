@foreach ($products as $product)
    <tr>
        <td>
            <img src="{{ asset(FileHelper::hasImage($product->photo)) }}" style="width: 92px; height: 92px;">
        </td>
        <td style="vertical-align:middle">
            <input type="hidden" name="i_product_id[]" class="i_product_id" value="{{ $product->id }}">
            {{ $product->name }}
        </td>
        <td style="vertical-align:middle">
            <select name="i_unit_id[]" class="form-control">
                @foreach ($units as $unit)
                    <option value="{{ $unit->id }}" {{ UtilHelper::selected($unit->id, $product->unit_id) }}>{{ $unit->name }}</option>
                @endforeach
            </select>
        </td>
        <td style="vertical-align:middle">
            <input type="number" required step="0.01" min="1" name="i_quantity_for_cut_stock[]" class="form-control"
        placeholder="Enter Quanity" value="{{ $product->quantity_for_cut_stock }}">
        </td>
        <td style="vertical-align:middle">
            <button type="button" class="btn waves-effect waves-light btn-danger btn-delete">
            X
            </button>
        </td>
    </tr>
@endforeach