<div class="fs-ctf-cl">
    <h2 class="fs-ctfl-tit">Bộ lọc</h2>
    <div class="fs-ctf-rmain">
        <form action="{{ route('get.user.search') }}" id="search-all">
            @include('pages.search.include._search_brand')
            @include('pages.search.include._search_price')
            <div id="reset-form">
                <a href="">Reset Form</a>
            </div>
        </form>
    </div>
</div>
