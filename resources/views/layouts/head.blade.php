<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,regular,500,600,700,800,900"
          rel="stylesheet" />
    <link rel="shortcut icon" href="{{asset("storage/images/icon1.svg")}}">

    @vite([
    "resources/sass/reset.scss",
    "resources/sass/style.scss"])
    <title>@yield("title")</title>
</head>