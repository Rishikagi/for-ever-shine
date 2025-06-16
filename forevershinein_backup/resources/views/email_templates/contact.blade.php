<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        * {
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f1f1f1;
        }
    </style>
</head>

<body>
    <table align="center" style="width: 600px; background: #fff;border-collapse: collapse;">
        <tr>
            <td>
               Name :  {!! $usr_name !!}
            </td>
        </tr>
        <tr>
            <td>
                Email : {!! $usr_email !!}
            </td>
        </tr>
        <tr>
            <td>
                Phone No. : {!! $usr_mobile !!}
            </td>
        </tr>
        <tr>
            <td>
                Subject : {!! $usr_sub !!}
            </td>
        </tr>
        <tr>
            <td>
               Message : {!! $usr_msg !!}
            </td>
        </tr>
    </table>
</body>
</html>
