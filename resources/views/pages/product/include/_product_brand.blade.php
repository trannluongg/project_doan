<div class="fs-ctbrand">
    <div class="owl-carousel fsicte owl-loaded owl-drag" data-items="7">
        <div class="owl-stage-outer">
            <div class="owl-stage" id="product-brand">
                @foreach($producer as $key => $p)
                <div class="owl-item" >
                    <div class="item">
                        <a href="/">
                            <div>
                                <img class="owl-lazy" style="width: 170px; height: 40px; object-fit: contain" src="{{ url('upload/producer/'. $p['avatar']) }}" alt="{{$p['name']}}" >
                            </div>
                            <p>{{$p['name']}}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
