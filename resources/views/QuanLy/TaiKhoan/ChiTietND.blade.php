<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Thông tin chi tiết người dùng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 30px;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        li {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #666;
            font-size: 16px;
        }
        span {
            color: #333;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="admin">

        @include('left')
        
        
        <div class="admin_right">
            <div class="container">
                <h2>Thông tin chi tiết</h2>
                <ul>
                    <li><label>ID:</label> <?php echo $user->id; ?></li>
                    <li><label>Full Name:</label> <?php echo $user->fullname; ?></li>
                    <li><label>Username:</label> <?php echo $user->username; ?></li>
                    @if(session('user')->role== 'QL')
                        @if($user->role== 'QL')
                        <li><label>Password:</label>******</li>
                        @else
                        <li><label>Password:</label> <?php echo $user->password; ?></li>
                        @endif
                    @else
                    <li><label>Password:</label>******</li>
                    @endif
                    <li><label>Address:</label> <?php echo $user->address; ?></li>
                    <li><label>Phone:</label> <?php echo $user->phone; ?></li>
                    <li><label>Email:</label> <?php echo $user->email; ?></li>
                    <li><label>Role:</label> <?php echo $user->role; ?></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>

