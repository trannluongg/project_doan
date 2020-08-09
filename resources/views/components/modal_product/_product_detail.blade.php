<div id="modal-pro-detail" class="modal modal-form">
    <div class="modal-header">
        <h2 class="title">{{ 'Thông tin chi tiết ' .$product['name'] }}</h2>
    </div>
    <div class="modal-body scroll">
        @switch($product['brand'])
            @case(1)
            @php
                $data           = explode('@', $product['description']);
                $screen         = $data[0];
                $screen         = explode('|', $screen);
                $camera_before  = $data[1];
                $camera_before  = explode('|', $camera_before);
                $camera_after   = $data[2];
                $camera_after   = explode('|', $camera_after);
                $hardware       = $data[3];
                $hardware       = explode('|', $hardware);
                $file           = $data[4];
                $file           = explode('|', $file);
                $thietke        = $data[5];
                $thietke        = explode('|', $thietke);
                $connect        = $data[6];
                $connect        = explode('|', $connect);
                $thongtinthem   = $data[7];
                $thongtinthem   = explode('|', $thongtinthem);
                $baohanh        = $data[8];
                $baohanh        = explode('|', $baohanh);
            @endphp
            <ul class="parameterfull">﻿
                <li><label>Màn hình</label></li>
                <li>
                    <span>Công nghệ màn hình</span>
                    <div>{!! $screen[0] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Độ phân giải</span>
                    <div>{!! $screen[1] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Màn hình rộng</span>
                    <div>{!! $screen[2]  ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Mặt kính cảm ứng</span>
                    <div>{!! $screen[3] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Camera trước</label>
                </li>
                <li>
                    <span>Độ phân giải</span>
                    <div>{!! $camera_before[0]  ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Thông tin khác</span>
                    <div>{!! $camera_before[1]  ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Camera sau</label>
                </li>
                <li>
                    <span>Độ phân giải</span>
                    <div>{!! $camera_after[0]  ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Quay phim</span>
                    <div>{!! $camera_after[1]  ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Đèn Flash</span>
                    <div>{!! $camera_after[2] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Phần cứng</label>
                </li>
                <li>
                    <span>CPU</span>
                    <div>{!! $hardware[0] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Số nhân</span>
                    <div>{!! $hardware[1] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Chip</span>
                    <div>{!! $hardware[2] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Ram</span>
                    <div>{!! $hardware[3] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>GPU</span>
                    <div>{!! $hardware[4] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Bộ nhớ</label>
                </li>
                <li>
                    <span>ROM</span>
                    <div>{!! $file[0] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Hỗ trợ SD</span>
                    <div>{!! $file[1] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Thiết kế</label>
                </li>
                <li>
                    <span>Chất liệu</span>
                    <div>{!! $thietke[0] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Kích thước</span>
                    <div>{!! $thietke[1] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Trọng lượng</span>
                    <div>{!! $thietke[2] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Kết nối</label>
                </li>
                <li>
                    <span>Sim</span>
                    <div>{!! $connect[0] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Khe cắm sim</span>
                    <div>{!! $connect[1] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Wifi</span>
                    <div>{!! $connect[2] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Bluetooh</span>
                    <div>{!! $connect[3] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Cổng sạc</span>
                    <div>{!! $connect[4] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Thông tin thêm</label>
                </li>
                <li>
                    <span>Pin</span>
                    <div>{!! $thongtinthem[0] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Chế độ sạc nhanh</span>
                    <div>{!! $thongtinthem[1] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Bảo hành</label>
                </li>
                <li>
                    <span>Hệ điều hành</span>
                    <div>{!! $baohanh[0] ?? 'Đang cập nhật'  ?? 'Đang cập nhật' !!}</div>
                </li>
            </ul>
            @break
            @case(2)
            @php
                $data           = explode('@', $product['description']);
                $screen         = $data[0];
                $screen         = explode('|', $screen);
                $hardware       = $data[1];
                $hardware       = explode('|', $hardware);
                $file           = $data[2];
                $file           = explode('|', $file);
                $camera         = $data[3];
                $camera         = explode('|', $camera);
                $connect        = $data[4];
                $connect        = explode('|', $connect);
                $thieke         = $data[5];
                $thieke         = explode('|', $thieke);
                $pin            = $data[6];
                $pin            = explode('|', $pin);
                $baohanh        = $data[7];
                $baohanh        = explode('|', $baohanh);
            @endphp
            <ul class="parameterfull">﻿
                <li>
                    <label>Màn hình</label></li>
                <li>
                    <span>Công nghệ màn hình</span>
                    <div>{!! $screen[0] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Độ phân giải</span>
                    <div>{!! $screen[1] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Kích thước màn hình</span>
                    <div>{!! $screen[2] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Phần cứng</label>
                </li>
                <li>
                    <span>Loại CPU</span>
                    <div>{!! $hardware[0] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Hệ đình hình</span>
                    <div>{!! $hardware[1] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Số nhân</span>
                    <div>{!! $hardware[2] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Tốc độ CPU</span>
                    <div>{!! $hardware[3] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Chíp đồ họa</span>
                    <div>{!! $hardware[4] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Ram</span>
                    <div>{!! $hardware[5] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Bộ nhớ, lưu trữ</label>
                </li>
                <li>
                    <span>Rom</span>
                    <div>{!! $file[0] ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Thẻ nhớ ngoài</span>
                    <div>{!! $file[0] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Hỗ trợ thẻ tối đa</span>
                    <div>{!! $file[0] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Chụp hình</label>
                </li>
                <li>
                    <span>Camera sau</span>
                    <div>{!! $camera[0] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Camera trước</span>
                    <div>{!! $camera[1] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Đèn flash</span>
                    <div>{!! $camera[2] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Tính năng ngân hàng</span>
                    <div>{!! $camera[3] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Kết nối</label>
                </li>
                <li>
                    <span>Số khe sim</span>
                    <div>{!! $connect[0] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Loại Sim</span>
                    <div>{!! $connect[1] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Wifi</span>
                    <div>{!! $connect[2] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Bluetooth</span>
                    <div>{!! $connect[3] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>GPS</span>
                    <div>{!! $connect[4] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Cổng kết nối</span>
                    <div>{!! $connect[5] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Thiết kế & Trọng lượng</label>
                </li>
                <li>
                    <span>Chất lượng</span>
                    <div>{!! $thieke[0] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Kích thước</span>
                    <div>{!! $thieke[1] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>TRọng lượng</span>
                    <div>{!! $thieke[2] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Pin và dung lượng</label>
                </li>
                <li>
                    <span>Loại pin</span>
                    <div>{!! $pin[0] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Dung lượng</span>
                    <div>{!! $pin[1] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Bảo hành</label>
                </li>
                <li>
                    <span>Thời gian bảo hành</span>
                    <div>{!! $baohanh[0] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Xuất xứ</span>
                    <div>{!! $baohanh[1] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Năm SX</span>
                    <div>{!! $baohanh[2] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
            </ul>
            @break
            @case(3)
            @php
                $data           = explode('@', $product['description']);
                $dongsp         = $data[0];
                $dongsp         = explode('|', $dongsp);
                $bomach         = $data[1];
                $bomach         = explode('|', $bomach);
                $ram            = $data[2];
                $ram            = explode('|', $ram);
                $dia            = $data[3];
                $dia            = explode('|', $dia);
                $dohoa          = $data[4];
                $dohoa          = explode('|', $dohoa);
                $screen         = $data[5];
                $screen         = explode('|', $screen);
                $amthanh            = $data[6];
                $amthanh            = explode('|', $amthanh);
                $giaotiepmang       = $data[6];
                $giaotiepmang       = explode('|', $giaotiepmang);
                $webcam             = $data[7];
                $webcam             = explode('|', $webcam);
                $pin                = $data[8];
                $pin                = explode('|', $pin);
                $kichthuoc          = $data[9];
                $kichthuoc          = explode('|', $kichthuoc);
                $thongtinthem       = $data[10];
                $thongtinthem       = explode('|', $thongtinthem);

            @endphp
            <ul class="parameterfull">﻿
                <li><label>Thông tin dòng sản phẩm</label></li>
                <li>
                    <span>Hãng CP</span>
                    <div>{!! $dongsp[0] ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Công nghệ CPU</span>
                    <div>{!! $dongsp[1] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Loại CPU</span>
                    <div>{!! $dongsp[2] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Tốc độ CPU</span>
                    <div>{!! $dongsp[3] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Tốc độ tối đa</span>
                    <div>{!! $dongsp[4] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Bộ nhớ đệm</span>
                    <div>{!! $dongsp[5]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Bo mạch</label>
                </li>
                <li>
                    <span>Chíp</span>
                    <div>{!! $bomach[0]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Tốc độ Bus</span>
                    <div>{!! $bomach[1] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Ram</label>
                </li>
                <li>
                    <span>Dung lượng</span>
                    <div>{!! $ram[0] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Loại Ram</span>
                    <div>{!! $ram[1]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Tốc độ bus Ram</span>
                    <div>{!! $ram[2] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Số lượng khe</span>
                    <div>{!! $ram[3] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Đĩa</label>
                </li>
                <li>
                    <span>Loại đĩa</span>
                    <div>{!! $dia[0]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Dung lượng đĩa</span>
                    <div>{!! $dia[1]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Đồ họa</label>
                </li>
                <li>
                    <span>Chíp đồ họa</span>
                    <div>{!! $doahoa[0] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Bộ nhớ đồ họa</span>
                    <div>{!! $doahoa[1] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Màn hình</label>
                </li>
                <li>
                    <span>Kích thước</span>
                    <div>{!! $screen[0]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Độ phân giải</span>
                    <div>{!! $screen[1]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Công nghệ màn hình</span>
                    <div>{!! $screen[2]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Âm thanh</label>
                </li>
                <li>
                    <span>Kênh âm thanh</span>
                    <div>{!! $amthanh[0]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Cổng giao tiếp</span>
                    <div>{!! $amthanh[1] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Tính năng mở rộng</span>
                    <div>{!! $amthanh[2]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Giao tiếp mạng</label>
                </li>
                <li>
                    <span>LAN</span>
                    <div>{!! $giaotiepmang[0] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Chuẩn WIFI</span>
                    <div>{!! $giaotiepmang[1]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Webcam</label>
                </li>
                <li>
                    <span>Độ phân giải</span>
                    <div>{!! $webcam[0]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Pin</label>
                </li>
                <li>
                    <span>Loại pin</span>
                    <div>{!! $pin[0]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Kiểu pin</span>
                    <div>{!! $pin[1]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Kích thước & trọng lượng</label>
                </li>
                <li>
                    <span>Kích thước</span>
                    <div>{!! $kichthuoc[0] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Trọng lượng</span>
                    <div>{!! $kichthuoc[1]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Chất liệu</span>
                    <div>{!! $kichthuoc[2]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <label>Thông tin khác</label>
                </li>
                <li>
                    <span>Bảo hành</span>
                    <div>{!! $thongtinthem[0]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Xuất xứ</span>
                    <div>{!! $thongtinthem[1] ?? 'Đang cập nhật' ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Năm sx</span>
                    <div>{!! $thongtinthem[2]  ?? 'Đang cập nhật'?? 'Đang cập nhật' !!}</div>
                </li>
            </ul>
            @break
            @case(4)
            @php
                $data           = explode('|', $product['description']);
            @endphp
            <ul class="parameterfull">﻿
                <li>
                    <span>Hiệu suất sạc</span>
                        <div>{!! $data['0'] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Dung lượng:</span>
                        <div>{!! $data['1'] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Thời gian sạc đầy:</span>
                    <div>{!! $data['2'] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Nguồn vào:</span>
                    <div>{!! $data['3'] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Lõi pin:</span>
                        <div>{!! $data['4'] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Kích thước:</span>
                    <div>{!! $data['5'] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Trọng lượng</span>
                    <div>{!! $data['6'] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Sản xuất:</span>
                    <div>{!! $data['7'] ?? 'Đang cập nhật' !!}</div>
                </li>
            </ul>
            @break
            @case(6)
            @php
                $data           = explode('|', $product['description']);
            @endphp
            <ul class="parameterfull">﻿
                <li>
                    <span>Tương thích</span>
                    <div>
                        <div>{!! $data['0'] ?? 'Đang cập nhật' !!}</div>
                    </div>
                </li>
                <li>
                    <span>Cổng sạc:</span>
                    <div>
                        <div>{!! $data['1'] ?? 'Đang cập nhật' !!}</div>
                    </div>
                </li>
                <li>
                    <span>Công nghệ âm thanh:</span>
                    <div>{!! $data['2'] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Thời gian sử dụng:</span>
                    <div>{!! $data['3'] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Kết nối cùng lúc:</span>
                    <div>
                        <div>{!! $data['4'] ?? 'Đang cập nhật' !!}</div>
                    </div>
                </li>
                <li>
                    <span>Khoảng cách kết nối:</span>
                    <div>{!! $data['5'] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Phím điều khiển</span>
                    <div>{!! $data['6'] ?? 'Đang cập nhật' !!}</div>
                </li>
                <li>
                    <span>Trọng lượng:</span>
                    <div>{!! $data['7'] ?? 'Đang cập nhật' !!}</div>
                </li>
            </ul>
            @break
        @endswitch
    </div>
</div>
