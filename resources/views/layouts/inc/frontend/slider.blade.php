<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

    <div class="carousel-inner">
        @foreach($sliders as $key=> $slide)
        <div class="carousel-item {{ $key=='0' ? 'active' : ''}}" data-bs-interval="10000">
            <img src="{{asset('storage/slider/'.$slide->image)}}" class="d-block w-100" alt="...">

            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h2>
                        <span>{{$slide->title}}</span>
                        to Boost your Brand Name &amp; Sales
                    </h2>
                    <p>
                        {{$slide->description}}
                    </p>
                    <div>
                        <a href="#" class="btn btn-slider">
                            Get Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>