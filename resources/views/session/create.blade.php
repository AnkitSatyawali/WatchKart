<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">

<link href="/css/register.css" rel="stylesheet" type="text/css">
<link herf="/css/fontawesome.css" rel="stylesheet" type="text/css">
<!-- <link href="/css/bootstrap.css" rel="stylesheet"> -->
              
</head>
<body>
<div class="main">
        <img class="background" src="images/wave.png">

        <div class="leftside">
            <div class="home_link_div">
                <a class="nolistyle" href="/"><div class="home_link">Watchkart</div></a>     
            </div>
            <img class="leftimage" src="images/bg.svg">
        </div>
        
        <div class="rightside">
            <form class="form" action="/login" method="post">
                {{csrf_field()}}
                <div class="usericon">
                    <img class="avatar" src="images/avatar.svg">
                    
                    <div class="caption">Welcome Again</div>
                    
                    @foreach($errors->all() as $error)
                            <div class="err">
                                {{$error}}
                            </div>
                    @endforeach

                    @if($flash=session('message'))
                    <div class="register_msg">
                        {{$flash}}
                    </div>
                    @endif
                </div>

                <div class="inp username">
                    <img class="icons" src="/images/at-solid.svg">
                    <input type="email" name="email" id="inputEmail" placeholder="Email" required>
                </div>

                <div class="inp password">
                    <img class="icons" src="/images/lock-solid.svg">
                    <input type="password" name="password" id="inputPassword" placeholder="Password" minlength="8" required>
                </div>
                

                <div class="submit-btn">
                    <button type="submit" class="btn">Login</button>
                </div>
                <div class="option">
                    <a href="/resetPassword">Forgot Password ?</a>
                </div>        
                <div class="option">
                    Don't have an account yet? <a href="/register">Create One</a>
                </div>

            </form>
        </div>
    </div>
</body>
</html>