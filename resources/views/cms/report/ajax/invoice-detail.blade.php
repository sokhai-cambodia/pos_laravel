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
                <td>{{ $invoice_detail->date }}</td>
                <td>{{ $invoice_detail->branch_name }}</td>
                <td>{{ $invoice_detail->room_no }}</td>
                <td>{{ $invoice_detail->invoice_no }}</td>
            </tr>
        @endforeach
    </tbody>
</table>