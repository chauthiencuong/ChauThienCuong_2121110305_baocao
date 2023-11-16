@php
use App\Models\Post;
$post = Post::where('status', 0)->orderBy('id', 'DESC')->paginate(3);
@endphp

<section class="content py-3">
    <div class="container">
        <div class="post-list mb-3">
            <h1 style="text-align: center;">BÀI VIẾT MỚI NHẤT</h1>
            <div class="post_list-s py-3">
                <div class="row">
                    @foreach($post as $key => $values)
                    <div class="col-md-4">
                        <div class="d-flex flex-column align-items-center">
                            <a href="{{ route('view_post', ['id' => $values->id]) }}">
                                <div style="text-align: center;">
                                    <img src="{{ asset('uploads/post_img/' . $values->image) }}" class="img-fluid" alt="{{ $values->image }}" style="width: 300px; height: 200px;">
                                </div>
                            </a>
                            <h4 style="text-align: center;">{{ $values->title }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $post->links('pagination::bootstrap-4', ['prev_text' => '', 'next_text' => '']) }}
            </div>
        </div>
    </div>
</section>
