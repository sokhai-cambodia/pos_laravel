<table class="table" id="export_area">
    <thead>
        <tr>
            <th>No</th>
            <th>Product</th>
            <th>Unit</th>                                   
            <th>Qty</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @php 
            $i = 1;
        @endphp
        @foreach ($invoice_details as $invoice_detail)
            <tr>
                <th>{{ $i++ }}</th>
                <td>{{ $invoice_detail->product_name }}</td>
                <td>{{ $invoice_detail->unit_name }}</td>
                <td>{{ $invoice_detail->quantity }}</td>
                <td>{{ $invoice_detail->price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>