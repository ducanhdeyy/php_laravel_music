<!DOCTYPE html>
<html>

<head>
    <title>Đăng ký thành công</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Chào mừng bạn đến với trang web của chúng tôi!</h1>
    <p>Cảm ơn bạn đã đăng ký thành công trên trang web của chúng tôi.</p>
    <p>Bạn đã đăng ký với thông tin sau:</p>
    <ul>
        <li>Tên: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>link: <a href="http://127.0.0.1:8000">Web Music</a></li>
    </ul>
    <p>Xin vui lòng đăng nhập để truy cập vào tài khoản của bạn.</p>
    <p>Trân trọng,</p>
    <p>Đội ngũ quản trị viên</p>
</body>

</html>
