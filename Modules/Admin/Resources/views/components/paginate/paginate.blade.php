<div class="row mt-3">
    @php
    $total = $paginate['total_pages'];
    $previous = $paginate['links']['previous'] ?? '';
    $next = $paginate['links']['next'] ?? '';
    $page = $_GET['page'] ?? 1;
    @endphp

    @if($total > 1)
        <div class="col-sm-12 col-md-5">
{{--            <div class="dataTables_info">Showing 1 to 10 of 57 entries</div>--}}
        </div>
        <div class="col-sm-12 col-md-7">
            <div class="paging_simple_numbers justify-content-end d-flex">
                <ul class="pagination">
                    <li class="paginate_button page-item previous @if($previous == '') @php  echo 'disabled'  @endphp @endif">
                        <a href="{{ $previous }}" class="page-link">Previous</a>
                    </li>
                    @for($i = 1; $i <= $total; $i++)
                        <li class="paginate_button page-item @if($i == $page)  @php echo 'active'; @endphp @endif">
                            <a href="{{ $uri.'?page=' . $i }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="paginate_button page-item next @if($next == '') @php echo 'disabled'  @endphp @endif">
                        <a href="{{ $next }}" class="page-link">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    @endif
</div>
