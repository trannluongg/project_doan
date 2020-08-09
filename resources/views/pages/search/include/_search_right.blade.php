<div class="fs-ctf-cr">
    <div class="fs-ctf-head clearfix">
        <div class="fs-ctf-hl">
            <h1>
                <a href="javascript:;" title="Điện thoại Dưới 1 triệu ">Tìm kiếm sản phẩm</a>
            </h1>
        </div>
        <div class="fs-ctf-hr clearfix">
            <form action="{{ route('get.user.search') }}" id="price-sort">
                <select name="price_sort" id="pro-price_sort">
                    <option value="-1">--Giá--</option>
                    <option value="1" {{ request('price_sort') == 1 ? 'selected' : '' }}>Giá cao đến thấp</option>
                    <option value="2" {{ request('price_sort') == 2 ? 'selected' : '' }}>Giá thấp đến cao</option>
                </select>
            </form>
        </div>
    </div>

    @include('pages.search.include._result_search')
{{--    @include('pages.search.include._paginate')--}}
</div>
