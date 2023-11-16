@php
use App\Models\Product;
$product = Product::where('status', 0)->orderBy('id', 'DESC')->get();
@endphp

<section class="content py-3">
    <div class="container">
        <div class="product-list mb-3">
            <h1 style="text-align: center;">SÁCH MỚI NHẤT</h1>
            <div class="product_list-s py-3">
                <div class="row">
                    @foreach($product as $key => $values)
                    <div class="col-md-3">
                        <div style="text-align: center;">
                            <img src="{{ asset('uploads/product_img/' . $values->image) }}" class="img-fluid" alt="{{ $values->image }}" style="width: 150px; height: 200px;">
                        </div>
                        <h4 style="text-align: center;">{{ $values->name }}</h4>
                        <h5 style="text-align: center;">{{ number_format($values->price, 0, '.', ',') }} VND</h5>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
