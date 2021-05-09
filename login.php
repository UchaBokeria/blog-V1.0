<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width:35%;
            height:80vh;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:space-around;
            color:white;
            border:1px solid black;
            border-radius:10px;
            margin:5vh 0 0 32.5%;
            background:black;
        }
        input{
            width:80%;
            height:6vh;
            border-radius:5px;
            border:0;
            outline:0;
            background:#1e1e1e;
            padding-left:5%;
            font-size:1.2vw;
            color:white;
        }
        input::placeholder{
            font-family:Lobster;
        }
        button{
            cursor:pointer;
            background:#1e1e1e;
            width: 30%;
            height:8vh;
            border-radius:10px;
            color:white;
            font-size:2vw;
            outline:0;
            border:0;
            font-family:Roboto;
        }
        h1{
            font-family:Roboto;
        }
    </style>
</head>
<body>
    <form action="checker.php" method="post">
        <h1>Log in</h1>
        <input type="text" name="" id="" placeholder="Username">
        <input type="password" name="" id="" placeholder="Password">
        <button>Login</button>
    </form>
</body>
</html>