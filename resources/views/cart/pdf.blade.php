<!DOCTYPE html>
<html>
<head>
    <title>Health City Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans; }
    </style>
</head>
<body>
<div>
    <div style="clear:both;">
        <table cellpadding="0" cellspacing="0" style="width:535.55pt; border-collapse:collapse;">
            <tbody>
            <tr style="height:35.45pt;">
                <td rowspan="6" style="width:241pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><a
                            href="{{URL::to('/')}}"
                            style="text-decoration:none;"><span
                                style="height:0pt; display:block; position:absolute; z-index:-65537;"><img
                                    src="{{URL::to('/')}}/img/1627386068_-----.001.png"
                                    width="281" height="62" alt=""
                                    style="margin: 0 auto 0 0; text-align: left; display: block; border-style: none;"></span></a><span
                            style="">&nbsp;</span></p>
                </td>
                <td rowspan="2" style="width:118.3pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span
                                style="">ТОО &quot;Город Здоровья&quot;</span></strong></p>
                </td>

            </tr>
            <tr style="height:1.15pt;">
                <td colspan="2" rowspan="2" style="width:62.5pt; vertical-align:top;">
                    <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                        <tbody>
                        <tr style="height:8.9pt;">
                            <td style="width:66.95pt; padding:1.95pt; vertical-align:top;">
                                <p style="margin-top:0pt; margin-bottom:0pt; margin-left: 15px; font-size:7pt;"><span
                                        style="">{{$data['locale'] === 'ru' ? 'Дата запроса' : 'Сұраныс уақыты'}}:</span></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="2" rowspan="2" style="width:111.8pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:7pt;text-align: right">
                      <span style="">{{\Carbon\Carbon::now()->format('d.m.Y H:i')}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:116.3pt; vertical-align:top;">
                    <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                        <tbody>
                        <tr style="height:11.8pt;">
                            <td style="width:104.3pt; padding-right:1.95pt; padding-left:1.95pt; vertical-align:middle;">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:7pt;"><strong><span
                                            style="">+ 7 (727) 331-3-331&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width:116.3pt; vertical-align:top;">
                    <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                        <tbody>
                        <tr style="height:11.8pt;">
                            <td style="width:104.3pt; padding-right:1.95pt; padding-left:1.95pt; vertical-align:middle;">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:7pt;"><strong><span
                                            style="">+ 7 (778) 021-19-77&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="2" rowspan="2" style="width:62.5pt; vertical-align:top;">
                    <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                        <tbody>
                        <tr style="height:8.9pt;">
                            <td style="width:66.95pt; padding:1.95pt; vertical-align:top;">
                                <p style="margin-top:0pt; margin-bottom:0pt;margin-left: 15px; font-size:7pt;"><span
                                        style="">Код:</span></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="2" rowspan="2" style="width:111.8pt; vertical-align:top;">
                    <table cellpadding="0" cellspacing="0" style="width:111.8pt; border-collapse:collapse;">
                        <tbody>
                        <tr style="height:8.9pt;">
                            <td style="width:107.9pt; padding:1.95pt; vertical-align:middle;">
                                <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:7pt;">
                                    <strong><span style="">{{$data['uuid']}}</span></strong></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr style="height:1.15pt;">
                <td rowspan="3" style="width:116.3pt; vertical-align:top;">
                    <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                        <tbody>
                        <tr style="height:14.35pt;">
                            <td style="width:104.3pt; padding-right:1.95pt; padding-left:1.95pt; padding-bottom:1.95pt; vertical-align:top;">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><a
                                        href="http://www.healthcity.kz/" style="text-decoration:none;"></a><a
                                        href="http://www.healthcity.kz/" style="text-decoration:none;"><strong><u><span
                                                    style=" font-size:7pt; color:#0645ad;">https://www.healthcity.kz</span></u></strong></a><a
                                        href="http://www.healthcity.kz/" style="text-decoration:none;"></a></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><br></p>
                </td>
                <td style="vertical-align:top;"><br></td>
            </tr>
            <tr>
                <td colspan="2" style="width:62.5pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td colspan="2" style="width:111.8pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="vertical-align:top;"><br></td>
            </tr>
            <tr>
                <td style="width:241pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td colspan="2" style="width:62.5pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td colspan="2" style="width:111.8pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="vertical-align:top;"><br></td>
            </tr>
            <tr>
                <td style="width:241pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:116.3pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:34.2pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td colspan="2" style="width:61.75pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td colspan="2" style="width:82.3pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
            </tr>
            <tr style="height:0pt;">
                <td style="width:237.2pt;"><br></td>
                <td style="width:120.6pt;"><br></td>
                <td style="width:33.95pt;"><br></td>
                <td style="width:28.1pt;"><br></td>
                <td style="width:33.45pt;"><br></td>
                <td style="width:78.35pt;"><br></td>
                <td style="width:3.9pt;"><br></td>
            </tr>
            </tbody>
        </table>
    </div>
    <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
        <tbody>
        <tr>
            <td style="width:534.6pt; vertical-align:top;">
                <table cellpadding="0" cellspacing="0" style="width:536.5pt; border-collapse:collapse;">
                    <tbody>
                    <tr style="height:13.1pt;">
                        <td style="width:11.7pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:11.9pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:11.95pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:126.05pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td colspan="3" style="width:123.7pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:58.55pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:66.55pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:62.95pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="vertical-align:top;"><br></td>
                    </tr>
                    <tr style="height:4.6pt;">
                        <td style="width:11.7pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:11.9pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:11.95pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:126.05pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td colspan="3"
                            style="width:123.7pt; border-bottom:0.88pt solid #d3d3d3; padding:1.95pt 1.95pt 1.51pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td colspan="3"
                            style="width:195.85pt; border-bottom:0.88pt solid #d3d3d3; padding:1.95pt 1.95pt 1.51pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="vertical-align:top;"><br></td>
                    </tr>
                    <tr style="height:4.6pt;">
                        <td style="width:11.7pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:11.9pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:11.95pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:126.05pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td colspan="3" style="width:123.7pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td colspan="3" style="width:195.85pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="vertical-align:top;"><br></td>
                    </tr>
                    <tr style="height:13.1pt;">
                        <td colspan="7"
                            style="width:300.9pt; border-bottom-style:solid; border-bottom-width:0.88pt; padding:1.95pt 1.95pt 1.51pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><strong><span
                                        style="">{{$data['locale'] === 'ru' ? 'Отделение' : 'Бөлім'}}</span></strong></p>
                        </td>
                        <td style="width:58.55pt; border-bottom-style:solid; border-bottom-width:0.88pt; padding:1.95pt 1.95pt 1.51pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;">
                                <strong><span style="">{{$data['locale'] === 'ru' ? 'Стоимость' : 'Бағасы'}}</span></strong></p>
                        </td>
                        <td style="width:66.55pt; border-bottom-style:solid; border-bottom-width:0.88pt; padding:1.95pt 1.95pt 1.51pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;">
                                <strong><span style="">{{$data['locale'] === 'ru' ? 'Кол-во' : 'Саны'}}</span></strong></p>
                        </td>
                        <td style="width:62.95pt; border-bottom-style:solid; border-bottom-width:0.88pt; padding:1.95pt 1.95pt 1.51pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;">
                                <strong><span style="">{{$data['locale'] === 'ru' ? 'Сумма' : 'Сомасы'}}</span></strong></p>
                        </td>
                        <td style="vertical-align:top;"><br></td>
                    </tr>
                    <tr style="height:24.4pt;">
                        <td style="width:11.7pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td colspan="6" style="width:285.3pt; padding:1.95pt; vertical-align:bottom;">
                            <p style="margin-top:5pt; margin-bottom:5pt; font-size:9pt;"><strong><span
                                        style="">{{$data['locale'] === 'ru' ? 'Клиническая лаборатория' : 'Клиникалық зертхана'}}:&nbsp;</span></strong></p>
                        </td>
                        <td style="width:58.55pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:66.55pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:62.95pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="vertical-align:top;"><br></td>
                    </tr>
                    <tr style="height:13.1pt;">
                        <td style="width:11.7pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:11.9pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td colspan="5" style="width:269.5pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span
                                        style="">{{$data['locale'] === 'ru' ? 'Наименование' : 'Атауы'}}:</span></strong></p>
                        </td>
                        <td style="width:58.55pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:66.55pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:62.95pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="vertical-align:top;"><br></td>
                    </tr>
                    @php
                        $count = 1;
                    @endphp
                    @foreach($data['items'] as $key=>$item)
                        <tr style="height:13.1pt;">
                            <td rowspan="2" style="width:11.7pt; padding:1.95pt; vertical-align:middle;">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                        style="">&nbsp;</span></p>
                            </td>
                            <td rowspan="2" style="width:11.9pt; padding:1.95pt; vertical-align:middle;">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                        style="">&nbsp;</span></p>
                            </td>
                            <td rowspan="2" style="width:11.95pt; padding:1.95pt; vertical-align:text-top;">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                        style="">{{$count}}</span></p>
                            </td>
                            @php
                                $count++;
                            @endphp
                            <td colspan="4" style="width:253.65pt; padding:1.95pt; vertical-align:bottom;">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;">{{$item->name}}</p>
                            </td>
                            <td style="width:58.55pt; padding:1.95pt; vertical-align:bottom;">
                                <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:8pt;">{{number_format($item->price,2,'.',', ')}}</p>
                            </td>
                            <td style="width:66.55pt; padding:1.95pt; vertical-align:bottom;">
                                <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:8pt;"><span
                                        style="">&nbsp;</span><span style="">1.00</span>
                                </p>
                            </td>
                            <td style="width:62.95pt; padding:1.95pt; vertical-align:bottom;">
                                <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:8pt;"><span
                                        style="">{{number_format($item->price,2,'.',', ')}}</span></p>
                            </td>
                            <td style="vertical-align:top;"><br></td>
                        </tr>
                        <tr style="height:10.85pt;">
                            <td colspan="3" style="width:205.35pt; vertical-align:top;">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                        style="">&nbsp;</span></p>
                            </td>
                            <td style="width:48.3pt; padding:1.95pt; vertical-align:top;">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                        style="">&nbsp;</span></p>
                            </td>
                            <td style="width:58.55pt; padding:1.95pt; vertical-align:bottom;">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                        style="">&nbsp;</span></p>
                            </td>
                            <td style="width:66.55pt; padding:1.95pt; vertical-align:bottom;">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                        style="">&nbsp;</span></p>
                            </td>
                            <td style="width:62.95pt; padding:1.95pt; vertical-align:bottom;">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                        style="">&nbsp;</span></p>
                            </td>
                            <td style="vertical-align:top;"><br></td>
                        </tr>
                    @endforeach
                    <tr style="height:4.6pt;">
                        <td style="width:11.7pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:11.9pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:11.95pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:126.05pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:11.1pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:56.5pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:48.3pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:58.55pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:66.55pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:62.95pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:28.05pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr style="height:13.1pt;">
                        <td colspan="7" style="width:300.9pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span
                                        style="">{{$data['locale'] === 'ru' ? 'К оплате' : 'Төлемге'}}:</span></strong></p>
                        </td>
                        <td style="width:58.55pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:66.55pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                        <td style="width:62.95pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:8pt;">
                                <strong><span style="">{{number_format($total,2,'.',', ')}}</span></strong></p>
                        </td>
                        <td style="width:28.05pt; padding:1.95pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:8pt;"><span
                                    style="">&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr style="height:0pt;">
                        <td style="width:15.6pt;"><br></td>
                        <td style="width:15.8pt;"><br></td>
                        <td style="width:15.85pt;"><br></td>
                        <td style="width:129.95pt;"><br></td>
                        <td style="width:15pt;"><br></td>
                        <td style="width:60.4pt;"><br></td>
                        <td style="width:52.2pt;"><br></td>
                        <td style="width:62.45pt;"><br></td>
                        <td style="width:70.45pt;"><br></td>
                        <td style="width:66.85pt;"><br></td>
                        <td style="width:31.95pt;"><br></td>
                    </tr>
                    </tbody>
                </table>
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><br></p>
            </td>
        </tr>
        </tbody>
    </table>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><span
            style="">&nbsp;</span></p>
    <div style="clear:both;">
        <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
            <tbody>
            <tr>
                <td style="width:0.3pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:198.45pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:137.6pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:28.35pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:170.05pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:0.3pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:198.45pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:137.6pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:28.35pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:170.05pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:0.3pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:198.45pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:137.6pt; vertical-align:top;">
                    <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                        <tbody>
                        <tr style="height:13.1pt;">
                            <td style="width:137.6pt; padding:1.95pt; vertical-align:top;">
                                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><span
                                        style=" color:#808080;">{{$data['locale'] === 'ru' ? 'Спасибо, что Вы выбрали' : 'Бізді таңдағаныңыз үшін рақмет!'}}</span></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><br></p>
                </td>
                <td style="width:28.35pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:170.05pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:0.3pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:198.45pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:137.6pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><img
                            src="{{URL::to('/')}}/img/1627386068_-----.001.png"
                            width="183" height="40" alt=""></p>
                </td>
                <td style="width:28.35pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
                <td style="width:170.05pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:1pt;"><span
                            style="">&nbsp;</span></p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
