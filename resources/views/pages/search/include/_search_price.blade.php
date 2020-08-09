<div class="fs-ctf-ri">
    <h4 class="fs-ctf-ritit" data-toggle="collapse" data-target="#muc-gia" aria-expanded="true">Mức giá</h4>
    <div class="fs-ctf-ribox collapse in" id="muc-gia">
        <div class="fs-ctf-scroll mCustomScrollbar _mCS_2 mCS_no_scrollbar">
            <div id="mCSB_2" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0"
                 style="max-height: none;">
                <div id="mCSB_2_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                     style="position:relative; top:0; left:0;" dir="ltr">
                    <ul class="listfilterv4 filterPrice " data-query="muc-gia">
                        <li>
                            <input type="radio" id="duoi1" name="price"
                                   {{ request('price') == '1' ? 'checked' : ''}} value="1">
                            <label for="duoi1">Dưới 1 triệu</label><br>
                        </li>
                        <li>
                            <input type="radio" id="tu1den3" name="price"
                                   {{ request('price') == '13' ? 'checked' : ''}} value="13">
                            <label for="tu1den3">Từ 1 - 3 triệu</label><br>
                        </li>
                        <li>
                            <input type="radio" id="tu3den6" name="price"
                                   {{ request('price') == '36' ? 'checked' : ''}} value="36">
                            <label for="tu3den6">Từ 3 - 6 triệu</label><br>
                        </li>
                        <li>
                            <input type="radio" id="tu6den10" name="price"
                                   {{ request('price') == '610' ? 'checked' : ''}} value="610">
                            <label for="tu6den10">Từ 6 - 10 triệu</label><br>
                        </li>
                        <li>
                            <input type="radio" id="tu10den15" name="price"
                                   {{ request('price') == '1015' ? 'checked' : ''}} value="1015">
                            <label for="tu10den15">Từ 10 - 15 triệu</label><br>
                        </li>
                        <li>
                            <input type="radio" id="tren15" name="price"
                                   {{ request('price') == '15' ? 'checked' : ''}} value="15">
                            <label for="tren15">Trên 15 triệu</label><br>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
