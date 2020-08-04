
<div class="tableparameter">
    <h2>Thông số kỹ thuật</h2>
    @switch($product['brand'])
        @case(1)
            @php
                $data = explode('@', $product['description']);
                $screen = $data[0];
                $screen = explode('|', $screen);
                $camera_before = $data[1];
                $camera_before = explode('|', $camera_before);
                $camera_after = $data[2];
                $camera_after = explode('|', $camera_after);
            @endphp
            <ul class="parameter ">
                <li>
                    <span>Công nghệ màn hình:</span>
                    <div>
                        {!! $screen['0'] !!}
                    </div>
                </li>
                <li>
                    <span>Chuẩn màn hình:</span>
                    <div>
                        {!! $screen['1'] !!}
                    </div>
                </li>
                <li>
                    <span>Độ phân giải:</span>
                    {!! $screen['2'] !!}
                </li>
                <li>
                    <span>Màn hình:</span>
                    <div>{!! $screen['3'] !!}</div>
                </li>
                <li>
                    <span>Độ phân giải camera trước:</span>
                    <div>
                        {!! $camera_before['0'] !!}
                    </div>
                </li>
                <li>
                    <span>Thông tin khác camera trước:</span>
                    <div>{!! $camera_before['1'] !!}</div>
                </li>
                <li>
                    <span>Độ phân giải camera sau:</span>
                    <div>{!! $camera_after['0'] !!}</div>
                </li>
                <li>
                    <span>Quay phim camera sau:</span>
                    <div>{!! $camera_after['1'] !!}</div>
                </li>
                <li>
                    <span>Đèn flash:</span>
                    <div>{!! $camera_after['2'] !!}</div>
                </li>
            </ul>
            @break
        @case(2)
            @php
                $data = explode('@', $product['description']);
                $screen = $data[0];
                $screen = explode('|', $screen);
                $hardware = $data[1];
                $hardware = explode('|', $hardware);
            @endphp
            <ul class="parameter ">
                <li>
                    <span>Công nghệ màn hình:</span>
                    <div>
                        {!! $screen['0'] !!}
                    </div>
                </li>
                <li>
                    <span>Độ phân giải:</span>
                    <div>
                        {!! $screen['1'] !!}
                    </div>
                </li>
                <li>
                    <span>Kích thước màn hình:</span>
                    <div>{!! $screen['2'] !!}</div>
                </li>
                <li>
                    <span>Loại CPU:</span>
                    <div>{!! $hardware['0'] !!}</div>
                </li>
                <li>
                    <span>Hệ điều hành:</span>
                    <div>
                        {!! $hardware['1'] !!}
                    </div>
                </li>
                <li>
                    <span>Số nhân:</span>
                    <div>{!! $hardware['2'] !!}</div>
                </li>
                <li>
                    <span>Tốc độ CPU</span>
                    <div>{!! $hardware['3'] !!}</div>
                </li>
                <li>
                    <span>Chíp đồ họa:</span>
                    <div>{!! $hardware['4'] !!}</div>
                </li>
                <li>
                    <span>Ram:</span>
                    <div>{!! $hardware['5'] !!}</div>
                </li>
            </ul>
            @break
        @case(3)
            @php
                $data = explode('@', $product['description']);
                $cpu = $data[0];
                $cpu = explode('|', $cpu);
                $hardware = $data[1];
                $hardware = explode('|', $hardware);
            @endphp
            <ul class="parameter ">
                <li>
                    <span>Hãng CPU</span>
                    <div>
                        <div>{!! $cpu['0'] !!}</div>
                    </div>
                </li>
                <li>
                    <span>Công nghệ CPU:</span>
                    <div>
                        <div>{!! $cpu['1'] !!}</div>
                    </div>
                </li>
                <li>
                    <span>Loại CPU:</span>
                    <div>{!! $cpu['2'] !!}</div>
                </li>
                <li>
                    <span>Tốc độ CPU:</span>
                    <div>{!! $cpu['3'] !!}</div>
                </li>
                <li>
                    <span>Tốc độ tối đa:</span>
                    <div>
                        <div>{!! $cpu['4'] !!}</div>
                    </div>
                </li>
                <li>
                    <span>Bộ nhớ đệm:</span>
                    <div>{!! $cpu['5'] !!}</div>
                </li>
                <li>
                    <span>Chip</span>
                    <div>{!! $hardware['0'] !!}</div>
                </li>
                <li>
                    <span>Tốc độ bus:</span>
                    <div>{!! $hardware['1'] !!}</div>
                </li>
                <li>
                    <span>Ram tối đa:</span>
                    <div>{!! $hardware['2'] !!}</div>
                </li>
            </ul>
            @break
        @case(4)
            @php
                $data = explode('|', $product['description']);
            @endphp
            <ul class="parameter ">
            <li>
                <span>Hiệu suất sạc</span>
                <div>
                    <div>{!! $data['0'] !!}</div>
                </div>
            </li>
            <li>
                <span>Dung lượng:</span>
                <div>
                    <div>{!! $data['1'] !!}</div>
                </div>
            </li>
            <li>
                <span>Thời gian sạc đầy:</span>
                <div>{!! $data['2'] !!}</div>
            </li>
            <li>
                <span>Nguồn vào:</span>
                <div>{!! $data['3'] !!}</div>
            </li>
            <li>
                <span>Lõi pin:</span>
                <div>
                    <div>{!! $data['4'] !!}</div>
                </div>
            </li>
            <li>
                <span>Kích thước:</span>
                <div>{!! $data['5'] !!}</div>
            </li>
            <li>
                <span>Trọng lượng</span>
                <div>{!! $data['6'] !!}</div>
            </li>
            <li>
                <span>Sản xuất:</span>
                <div>{!! $data['7'] !!}</div>
            </li>
        </ul>
            @break
        @case(6)
        @php
            $data = explode('|', $product['description']);
        @endphp
        <ul class="parameter ">
            <li>
                <span>Tương thích</span>
                <div>
                    <div>{!! $data['0'] !!}</div>
                </div>
            </li>
            <li>
                <span>Cổng sạc:</span>
                <div>
                    <div>{!! $data['1'] !!}</div>
                </div>
            </li>
            <li>
                <span>Công nghệ âm thanh:</span>
                <div>{!! $data['2'] !!}</div>
            </li>
            <li>
                <span>Thời gian sử dụng:</span>
                <div>{!! $data['3'] !!}</div>
            </li>
            <li>
                <span>Kết nối cùng lúc:</span>
                <div>
                    <div>{!! $data['4'] !!}</div>
                </div>
            </li>
            <li>
                <span>Khoảng cách kết nối:</span>
                <div>{!! $data['5'] !!}</div>
            </li>
            <li>
                <span>Phím điều khiển</span>
                <div>{!! $data['6'] !!}</div>
            </li>
            <li>
                <span>Trọng lượng:</span>
                <div>{!! $data['7'] !!}</div>
            </li>
        </ul>
            @break
    @endswitch
    <a class="viewparameterfull" href="#modal-pro-detail" rel="modal:open">Xem thêm cấu hình chi tiết</a>
</div>
