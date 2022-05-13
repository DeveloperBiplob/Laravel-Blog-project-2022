<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New user</title>
    <style>
        section{
            width: 600px;
            margin: auto;
            border: 1px solid #000;
            padding: 20px;
        }
        .header p{
            text-align: justify;
        }
        table,th,td{
            border: 1px solid rgb(187, 168, 168);
            padding: 5px;
            border-collapse: collapse;
            text-align: left;
        }
    </style>
</head>
<body>
    <section>
        <div class="header">
            <h3>Hi..!</h3>
            <h3>{{ $user->name }}</h3>
            <p>You are successfully login. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi odit cum autem corporis eaque possimus numquam ad doloremque est necessitatibus? Dolor molestias unde suscipit voluptates facilis eum cupiditate eius aspernatur?</p>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>password</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Thanks for your login.</p>
        </div>
    </section>
</body>
</html>
