<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

<h2>Dear {{$name}},</h2>

<div>
    <p>Method: <strong>Exchange</strong></p>
    <p>Gateway: <strong>{{$content['Exchange']}}</strong></p>
    <p>Amount: <strong>{{$content->received_amount}}</strong></p>
    <p>Transaction ID: <strong>{{$content->trx_id}}</strong></p>
    <p>Date: <strong>{{$content->created_at}}</strong></p>

    Thanks,<br/>
    {{$name}},<br/>
    Email: {{$email}}<br/>

</div>

</body>
</html>