<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        td {
            vertical-align:top;
        }
        .information h3 {
            color: #03a3dd;
        }
        th, tfoot tr td{
            background: #03a3dd;
            color: #fff;
            padding: 5px;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="90%" align="center">
        <tr>
            <td align="left" style="width: 40%">
                <h3>{{$quote->customer->name}}</h3>
                    {{$quote->address_info["address"]}}<br/>
                    {{$quote->address_info["postal_code"]}} {{$quote->address_info["city"]}}<br/>
                    {{$quote->address_info["province"]}}, {{$quote->address_info["country"]}}<br/>
                    <br/><br/>
                    Date: {{$quote->date}}
                    Quote code: {{$quote->code}}
            </td>
            <td align="right" style="width: 40%">
                <h3>{{$preferences->company_name}}</h3>
                {{$preferences->address_info["address"]}}<br/>
                {{$preferences->address_info["postal_code"]}} {{$preferences->address_info["city"]}}<br/>
                {{$preferences->address_info["province"]}}, {{$preferences->address_info["country"]}}<br/>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="quote">
    <table width="85%" align="center">
        <thead>
        <tr>
            <th style="text-align: left">Description</th>
            <th style="text-align: center;">Quantity</th>
            <th style="text-align: right;">Price</th>
            @if ($quote->tdtype == "Lineal (Discount first)")
            <th style="text-align: center;">Discount%</th>
            <th style="text-align: center;">&nbsp;&nbsp;Tax%&nbsp;&nbsp;</th>
            @elseif ($quote->tdtype == "Lineal (Tax first)")
            <th style="text-align: center;">&nbsp;&nbsp;Tax%&nbsp;&nbsp;</th>
            <th style="text-align: center;">Discount%</th>
            @endif
            <th style="text-align: right;">Total</th>
        </tr>
        </thead>
        <tbody>
            @foreach($quote->lines as $line)
            <tr>
                <td style="text-align: justify">{{ $line->description}}</td>
                <td style="text-align: center">{{ $line->units }}</td>
                <td style="text-align: right">{{ $line->price_unit }} {{$quote->currency}}</td>
                @if ($quote->tdtype == "Lineal (Discount first)")
                    <td style="text-align: center">Discount%</td>
                    <td style="text-align: center">Tax%</td>
                    <td style="text-align: right">{{ ($line->price_unit*$line->units) }} {{$quote->currency}}</td>
                @elseif ($quote->tdtype == "Lineal (Tax first)")
                    <td style="text-align: center">{{$line->tax}}%</td>
                    <td style="text-align: center">{{$line->discount}}%</td>
                    <td style="text-align: right">{{ ($line->price_unit*$line->units)*(1+($line->tax/100)) }} {{$quote->currency}}</td>
                @else
                    <td style="text-align: right">{{ $line->price_unit*$line->units }} {{$quote->currency}}</td>
                @endif
            </tr>
            @endforeach
        </tbody>

        <tfoot>
        <tr>
            @if ($quote->tdtype == "Lineal (Discount first)")
            <td colspan="6" style="text-align: right">Total: 0</td>
            @elseif ($quote->tdtype == "Lineal (Tax first)")
            <td colspan="6" style="text-align: right">Total: 0</td>
            @else
            <td colspan="4" style="text-align: right">Total: 0</td>
            @endif
        </tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
        </tr>
    </table>
</div>
</body>
</html>
