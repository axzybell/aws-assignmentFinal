<html>
    <head>
        <title>Login</title>
        <style>
        .login-form {
            background-color: white;
            color: black;
            border: 1px solid black;
            box-sizing: content-box;  
            width: 400px;
            height: 300px;
            padding: 30px; 
        }

        body {
            background: lightgray;
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            margin: 15%;      
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 76%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }
        .button:hover,.form button:active,.form button:focus {
            background: #43A047;
        }

        input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 76%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .white-box {
            background-color: white;
            color: black;
            border: 1px solid black;
            box-sizing: content-box;  
            width: 400px;
            height: 300px;
            padding: 30px;     
        }

    </style>
    </head>
    
    <body>
        <center>
            <form  method="POST" action="loginAction.php" class="white-box">
                <h1>Employee Management System</h1>
                <form class="login-form">
                <input type="text" name="username" placeholder="username"/>
                <input type="password" name="password" placeholder="password"/>
                <input type="submit" name="login" class="button">
                </form>
            </form>
        </center>
    </body>
</html>