@foreach ($products as $product)
    <div class=" col-sm-4 col-md-4">
        <div class="card  tables">
            <img class="card-img-top" src="{{ $product->getPhoto() }}" alt="Card image" style="width:100%; height:150px">
            <div class="text-center">
                <span>{{ $product->name }}</span>
            </div>
        </div>
    </div>    
@endforeach