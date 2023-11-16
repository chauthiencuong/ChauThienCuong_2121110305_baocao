@php
use App\Models\Product;
$products = Product::where('status', 0)->orderBy('id', 'DESC')->paginate(4);
@endphp

<section class="content py-3">
    <div class="container">
        <div class="product-list mb-3">
            <h1 style="text-align: center;">SÁCH MỚI NHẤT</h1>
            <div class="product_list-s py-3">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-3">
                        <div style="text-align: center;">
                            <img src="{{ asset('uploads/product_img/' . $product->image) }}" class="img-fluid" alt="{{ $product->image }}" style="width: 150px; height: 200px;">
                        </div>
                        <h4 style="text-align: center;">{{ $product->name }}</h4>
                        <h5 style="text-align: center;">{{ number_format($product->price, 0, '.', ',') }} VND</h5>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Hiển thị phân trang giữa và dưới -->
            <div class="d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-4', ['prev_text' => '', 'next_text' => '']) }}
            </div>

    </div>
    </div>
</section>
