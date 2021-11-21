<!DOCTYPE HTML>
<html>
<head>
    <title>Новая заявка с сайта</title>
</head>
<body>
<h1>Новая заявка с сайта</h1>
<br>
<p>Имя отправителя : {{$name}}</p>
<p>Телефон : {{$phone}}</p>
@isset($email)
    <p>Email : {{$email}}</p>
@endisset
@isset($comments)
    <p>Коммент : {{$comments}}</p>
@endisset
@isset($page)
    <p>Со страницы : {{$page}}</p>
@endisset
@isset($url)
    <p>Ссылка : {{$url}}</p>
@endisset
</body>
</html>
