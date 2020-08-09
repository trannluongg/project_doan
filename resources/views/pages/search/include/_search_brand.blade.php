<div class="fs-ctf-ri">
    <h4 class="fs-ctf-ritit" data-toggle="collapse" data-target="#hang-san-xuat" aria-expanded="true">Hãng sản xuất</h4>
    <div class="fs-ctf-ribox collapse in" id="hang-san-xuat" aria-expanded="true" style="">
        <div class="fs-ctf-risearch">
            <input class="txtthuonghieu" type="text" placeholder="Tìm thương hiệu">
        </div>
        <div class="fs-ctf-scroll mCustomScrollbar _mCS_1">
            <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside">
                <div id="mCSB_1_container" class="mCSB_container">
                    <ul class="listfilterv4  filterBrand" data-query="hang-san-xuat">
                        @foreach($producers as $producer)
                            <li>
                                <input type="radio" id="producer-{{ $producer['id'] }}" name="producer" {{ request('producer') == $producer['id'] ? 'checked' : ''}} value="{{ $producer['id'] }}">
                                <label for="producer-{{ $producer['id'] }}">{{ $producer['name'] }}</label><br>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
