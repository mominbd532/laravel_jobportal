<div class="site-section block-15">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                <h2>Recent Blog</h2>
            </div>
        </div>


        <div class="nonloop-block-15 owl-carousel">

            @foreach($blogs as $blog)

                <div class="media-with-text">
                <div class="img-border-sm mb-4">
                    <a href="#" class="image-play">
                        @if(empty($blog->blog_photo))
                            <img  src="{{asset('avatar/logo.png')}}" alt="Image placeholder">

                        @else
                            <img src="{{asset('uploads/blog_photo')}}/{{$blog->blog_photo}}" alt="Image placeholder">
                        @endif
                    </a>
                </div>
                <h2 class="heading mb-0 h5"><a href="#">{{$blog->title}}</a></h2>
                <span class="mb-3 d-block post-date">{{$blog->created_at}} &bullet; By <a href="#">{{$blog->author_name }}</a></span>
                <p>{{$blog->details}}</p>
            </div>

                @endforeach




        </div>

        <div class="row">

        </div>
    </div>
</div>