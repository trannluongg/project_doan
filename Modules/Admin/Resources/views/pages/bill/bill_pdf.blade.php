<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* roboto-100 - vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: "Roboto";
            font-style: normal;
            font-weight: 100;
            src: url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-100.eot");
            /* IE9 Compat Modes */
            src: local("Roboto Thin"), local("Roboto-Thin"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-100.eot?#iefix") format("embedded-opentype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-100.woff2") format("woff2"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-100.woff") format("woff"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-100.ttf") format("truetype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-100.svg#Roboto") format("svg");
            /* Legacy iOS */
        }
        /* roboto-300 - vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: "Roboto";
            font-style: normal;
            font-weight: 300;
            src: url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-300.eot");
            /* IE9 Compat Modes */
            src: local("Roboto Light"), local("Roboto-Light"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-300.eot?#iefix") format("embedded-opentype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-300.woff2") format("woff2"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-300.woff") format("woff"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-300.ttf") format("truetype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-300.svg#Roboto") format("svg");
            /* Legacy iOS */
        }
        /* roboto-300italic - vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: "Roboto";
            font-style: italic;
            font-weight: 300;
            src: url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-300italic.eot");
            /* IE9 Compat Modes */
            src: local("Roboto Light Italic"), local("Roboto-LightItalic"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-300italic.eot?#iefix") format("embedded-opentype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-300italic.woff2") format("woff2"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-300italic.woff") format("woff"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-300italic.ttf") format("truetype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-300italic.svg#Roboto") format("svg");
            /* Legacy iOS */
        }
        /* roboto-regular - vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: "Roboto";
            font-style: normal;
            font-weight: 400;
            src: url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-regular.eot");
            /* IE9 Compat Modes */
            src: local("Roboto"), local("Roboto-Regular"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-regular.eot?#iefix") format("embedded-opentype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-regular.woff2") format("woff2"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-regular.woff") format("woff"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-regular.ttf") format("truetype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-regular.svg#Roboto") format("svg");
            /* Legacy iOS */
        }
        /* roboto-100italic - vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: "Roboto";
            font-style: italic;
            font-weight: 100;
            src: url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-100italic.eot");
            /* IE9 Compat Modes */
            src: local("Roboto Thin Italic"), local("Roboto-ThinItalic"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-100italic.eot?#iefix") format("embedded-opentype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-100italic.woff2") format("woff2"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-100italic.woff") format("woff"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-100italic.ttf") format("truetype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-100italic.svg#Roboto") format("svg");
            /* Legacy iOS */
        }
        /* roboto-italic - vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: "Roboto";
            font-style: italic;
            font-weight: 400;
            src: url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-italic.eot");
            /* IE9 Compat Modes */
            src: local("Roboto Italic"), local("Roboto-Italic"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-italic.eot?#iefix") format("embedded-opentype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-italic.woff2") format("woff2"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-italic.woff") format("woff"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-italic.ttf") format("truetype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-italic.svg#Roboto") format("svg");
            /* Legacy iOS */
        }
        /* roboto-500 - vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: "Roboto";
            font-style: normal;
            font-weight: 500;
            src: url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-500.eot");
            /* IE9 Compat Modes */
            src: local("Roboto Medium"), local("Roboto-Medium"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-500.eot?#iefix") format("embedded-opentype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-500.woff2") format("woff2"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-500.woff") format("woff"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-500.ttf") format("truetype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-500.svg#Roboto") format("svg");
            /* Legacy iOS */
        }
        /* roboto-500italic - vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: "Roboto";
            font-style: italic;
            font-weight: 500;
            src: url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-500italic.eot");
            /* IE9 Compat Modes */
            src: local("Roboto Medium Italic"), local("Roboto-MediumItalic"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-500italic.eot?#iefix") format("embedded-opentype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-500italic.woff2") format("woff2"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-500italic.woff") format("woff"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-500italic.ttf") format("truetype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-500italic.svg#Roboto") format("svg");
            /* Legacy iOS */
        }
        /* roboto-700 - vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: "Roboto";
            font-style: normal;
            font-weight: 700;
            src: url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-700.eot");
            /* IE9 Compat Modes */
            src: local("Roboto Bold"), local("Roboto-Bold"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-700.eot?#iefix") format("embedded-opentype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-700.woff2") format("woff2"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-700.woff") format("woff"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-700.ttf") format("truetype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-700.svg#Roboto") format("svg");
            /* Legacy iOS */
        }
        /* roboto-700italic - vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: "Roboto";
            font-style: italic;
            font-weight: 700;
            src: url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-700italic.eot");
            /* IE9 Compat Modes */
            src: local("Roboto Bold Italic"), local("Roboto-BoldItalic"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-700italic.eot?#iefix") format("embedded-opentype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-700italic.woff2") format("woff2"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-700italic.woff") format("woff"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-700italic.ttf") format("truetype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-700italic.svg#Roboto") format("svg");
            /* Legacy iOS */
        }
        /* roboto-900 - vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: "Roboto";
            font-style: normal;
            font-weight: 900;
            src: url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-900.eot");
            /* IE9 Compat Modes */
            src: local("Roboto Black"), local("Roboto-Black"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-900.eot?#iefix") format("embedded-opentype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-900.woff2") format("woff2"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-900.woff") format("woff"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-900.ttf") format("truetype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-900.svg#Roboto") format("svg");
            /* Legacy iOS */
        }
        /* roboto-900italic - vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: "Roboto";
            font-style: italic;
            font-weight: 900;
            src: url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-900italic.eot");
            /* IE9 Compat Modes */
            src: local("Roboto Black Italic"), local("Roboto-BlackItalic"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-900italic.eot?#iefix") format("embedded-opentype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-900italic.woff2") format("woff2"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-900italic.woff") format("woff"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-900italic.ttf") format("truetype"), url("/../../../../public/fonts/roboto-v20-vietnamese_latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic-900italic.svg#Roboto") format("svg");
            /* Legacy iOS */
        }
        @font-face {
            font-family: "icon";
            src: url("/../../../../public/fonts/icon.eot");
            src: url("/../../../../public/fonts/icon.eot#iefix") format("embedded-opentype"), url("/../../../../public/fonts/icon.woff2") format("woff2"), url("/../../../../public/fonts/icon.woff") format("woff"), url("/../../../../public/fonts/icon.ttf") format("truetype"), url("/../../../../public/fonts/icon.svg?30481032#icon") format("svg");
            font-weight: normal;
            font-style: normal;
        }
        body, html{
            font-family: Roboto, sans-serif;
        }
        .content{
            width: 880px;
            position: relative;
        }
        .title h1, .title h2{
            text-align: center;
            margin: 0 0 8px 0;
            font-weight: 500;
        }

        .info > span{
            display: block;
            font-size: 20px;
            margin-bottom: 10px;
        }
        .info-bill{
            display: block;
            font-size: 20px;
            margin-bottom: 10px;
        }
        table{
            width: 100%;
        }

        table td{
            text-align: center;
        }
        table tr{
            font-weight: 500;
        }
        strong{
            font-weight: 500;
        }
        .sum-money{
            font-size: 20px;
            margin: 10px 0;
            font-weight: 500;
        }

        .shop{
            width: 300px;
            float: right;
        }
        .day{
            text-align: center;
            display: block;
        }

        .shop h4{
            margin: 10px 0;
            text-align: center;
            font-size: 18px;
            font-weight: 500;
        }

        .shop i{
            text-align: center;
            display: block;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="title">
            <h1>HL SHOP.com - Website Bán Hàng Điện Tử</h1>
            <h2>Đơn Hàng</h2>
        </div>
        <div class="info">
            <span><strong>Khách hàng:</strong> {{ $bill_detail['customer_name'] }}</span>
            <span><strong>Số điện thoại: </strong>{{ $bill_detail['customer_phone'] }}</span>
            <span><strong>Địa chỉ: </strong>{{ $bill_detail['customer_address'] }}</span>
            <strong class="info-bill">Thông tin chi tiết đơn hàng</strong>
            <table border="1" cellpadding="0" cellspacing="0">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá sản phẩm</th>
                </tr>
                @foreach($bill_detail['bill'] as $key => $value)
                    @php
                        $item = $value['item'];
                    @endphp
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>{{ $value['qty'] }}</td>
                        <td>{{ number_format($item['price'] * ((100-$item['sale']) / 100) ,0,",",".") . 'đ' }}</td>
                    </tr>
                @endforeach
            </table>
            <h4 class="sum-money">Tống tiền: <span>{{ number_format($bill_detail['sum_money'],0,",",".") . 'đ'}}</span></h4>
        </div>
        <div class="shop">
            <span class="day">
                Hà Nội, Ngày ... Tháng ... Năm ...
            </span>
            <h4>Chủ shop</h4>
            <i>(Ký và ghi rõ họ tên)</i>
        </div>
    </div>
</body>
</html>
