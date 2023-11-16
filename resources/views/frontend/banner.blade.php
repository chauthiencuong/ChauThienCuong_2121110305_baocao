

@php
use App\Models\Banner;

$banner = [
    ['status', '=', 0],
];

$banner = Banner::where($banner)
    ->orderBy( 'id','DESC')->get();
@endphp

<div class="banner" >
  <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            @php $index = 1; @endphp
            @foreach($banner as $key => $row)
                @if($index == 1)
                    <div class="carousel-item active">
                    <img src="{{ asset('uploads/banner_img/' . $row->image) }}" class="d-block w-100" width="300" height="150" alt="{{ $row->image }}">
                    </div>
                @else
                    <div class="carousel-item">
                    <img src="{{ asset('uploads/banner_img/' . $row->image) }}" class="d-block w-100" width="300" height="150" alt="{{ $row->image }}">
                        </div>
                @endif
                @php $index++; @endphp
            @endforeach
        </div>

        <button class="carousel-control-prev-back" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<style>
    .carousel-control-prev-back,
    .carousel-control-next-next {
    display: none; /* Ẩn dấu mũi tên trước và sau */
}

</style>

