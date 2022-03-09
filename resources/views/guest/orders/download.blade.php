<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $type }}</title>
    <style media="screen">
        @font-face {
            font-family: 'ThSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'ThSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'ThSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'ThSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 18cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: "ThSarabunNew";
            font-size: 12px;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 50px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-family: "ThSarabunNew";
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 5px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 5px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }

        #watermark {
            position: fixed;
            font-family: "ThSarabunNew";
            font-weight: bold;
            top: 45%;
            width: 100%;
            text-align: center;
            opacity: .1;
            transform: rotate(30deg);
            transform-origin: 50% 50%;
            z-index: 1000;
            font-size: 80px;
        }
    </style>
</head>

<body>
    <div id="watermark">
        {{ $contactUs->locale(session()->get('locale'))->company }}
    </div>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ asset('images/logo/logo.png') }}">
        </div>
        <h1>
            {{ $type }}<br>{{ $order->code }}
        </h1>
        <div id="project">
            <div>{{ $contactUs->locale(session()->get('locale'))->company }}</div>
            <div>{{ $contactUs->locale(session()->get('locale'))->address }}</div>
            <div>{{ $contactUs->telephone }}</div>
        </div>
        <div id="company" class="clearfix">
            @php
            $billing = unserialize($order->billing);
            @endphp
            <div>{{ $billing['full_name'] }}</div>
            <div>{{ $billing['address_1'] }}</div>
            <div>{{ $billing['address_2'] }}</div>
            <div>{{ $billing['sub_district'] }}, {{ $billing['district'] }}, {{ $billing['province'] }}, {{ $billing['postal_code'] }} , ({{ $billing['country'] }})</div>
            <div>{{ $billing['telephone'] }}</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">{{ __('order.item description') }}</th>
                    <th>{{ __('order.amount') }}</th>
                    <th>{{ __('order.price') }}</th>
                    <th>{{ __('order.total') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                $items = unserialize($order->cart);
                @endphp
                @foreach ($items as $key => $item)
                <tr>
                    <td class="service">{{ $item['name'][session()->get('locale')] }}</td>
                    <td class="qty">{{ $item['quantity'] }}</td>
                    <td class="unit">{{ number_format($item['price']) }}</td>
                    <td class="total">{{ __('order.en bath') }} {{ number_format($item['total']) }} {{ __('order.th bath') }}</td>
                </tr>
                @endforeach
                @php
                $summary = unserialize($order->summary);
                $discount = $summary['total'] * $summary['coupon']['percentage'] / 100;
                @endphp
                <tr>
                    <td colspan="3">{{ __('order.total') }}</td>
                    <td class="total">{{ __('order.en bath') }} {{ number_format($summary['total']) }} {{ __('order.th bath') }}</td>
                </tr>
                <tr>
                    <td colspan="3">{{ __('order.discount') }}</td>
                    <td class="total">{{ __('order.en bath') }} {{ number_format($discount) }} {{ __('order.th bath') }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="grand total">{{ __('order.grand total') }}</td>
                    <td class="grand total">{{ __('order.en bath') }} {{ number_format($summary['grandTotal']) }} {{ __('order.th bath') }}</td>
                </tr>
            </tbody>
        </table>
        <div id="notices">
            <div>{{ __('order.note') }}:</div>
            <div class="notice">{{ __('order.success') }}</div>
        </div>
    </main>
</body>

</html>
