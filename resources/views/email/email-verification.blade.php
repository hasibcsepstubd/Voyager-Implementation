<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Confirm your email address</h2>

<div>
    <p>Thanks for creating an account with Moneybagbd.com.
    To use your account, you’ll first need to confirm your email address
        <b>{{ URL::to('register/verify/' . $confirmation_code) }}</b></p>

    <p>If you have questions about your account, please contact us.</p><br/>

    Thanks,<br/>
    Moneny Bag BD<br/>

</div>

</body>
</html>