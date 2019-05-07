<tr >
    <td scope="row" style="width: 50px;" class="no">1</td>
    <td>
        <input type="hidden" name="product_id[]" class="product_id" value="{{ $product->id }}">
        {{ $product->name }}
    </td>
    <td style="text-align: center" style="width: 50px;">
        <input type="number"  name="qty[]" class="form-control qty"  value="1">
    </td>
    <td style="text-align: center">
        <input type="hidden" name="price[]" class="price" value="{{ $product->price }}">
        <span class="span_price">{{ $product->price }}</span>
    </td>
    <td style="text-align: center">
        <span class="span_total">{{ $product->price }}</span>
    </td>
    <td style="width: 50px;">
        <button type="button" class="btn waves-effect waves-light btn-danger btn-delete">
            X
        </button>
    </td>
</tr>