<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Login</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("/ProjectMusicWeb/public/img/1739.jpg");
        }

        .container{
            display: grid;
            width: 900px;
            height: 200px;
            margin: 150px auto;
            grid-template-columns: 1fr 1fr;
            box-shadow: 0 0 10px 0 rgb(8, 31, 61);
        }

        .login-left{
            background: rgba(255, 255, 255, 0.5);
        }

        .login-right{
            background: white;
        }

        .login{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .form-group{
            margin-bottom: 10px;
        }
        .form-group label{
            width: 30%;
        }
    </style>
</head>
<body>