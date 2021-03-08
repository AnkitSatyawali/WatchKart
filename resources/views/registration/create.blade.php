<html>
    <head>
        
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">

        <link href="/css/register.css" rel="stylesheet" type="text/css">
    
        <link herf="/css/fontawesome.css" rel="stylesheet" type="text/css">
        
    </head>

    <body>

        <div class="main">
                <img class="background" src="images/wave.png">

                <div class="leftside">
                    <div class="home_link_div">
                        <a class="nolistyle" href="/">
                            <div class="home_link">
                                Watchkart
                            </div>
                        </a>     
                    </div>
                    <img class="leftimage" src="images/bg.svg">
                </div>

                <div class="rightside">
                    <form class="form" action="/register" method="POST">
                        {{csrf_field()}}
                        <div class="usericon">
                            <img class="avatar" src="images/avatar.svg">
                            <div class="caption">
                                Welcome
                            </div>
                            @foreach($errors->all() as $error)
                                <div class="err">
                                    {{$error}}
                                </div>
                            @endforeach
                        </div>

                        <div class="inp username">
                            <img class="icons" src="/images/user-solid.svg">
                            <input type="text" name="name" id="inputName" placeholder="Username" required>
                        </div>

                        <div class="inp email">
                            <img class="icons" src="/images/at-solid.svg">
                            <input type="email" name="email" id="inputEmail" placeholder="Email" required>
                        </div>
                        
                        <!-- <div class="inp phone">
                            <img class="icons" src="/images/phone-alt-solid.svg">
                            <input type="number" name="phone" id="inputNumber" placeholder="Ex-9876543210">
                        </div> -->
                        
                        <div class="inp password">
                            <img class="icons" src="/images/lock-solid.svg">
                            <input type="password" name="password" id="inputPassword" placeholder="Password" minlength="8" required>
                        </div>
                        
                        <div class="inp confirm_password">
                            <img class="icons" src="/images/lock-solid.svg">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" minlength="8" required>
                        </div>

                        <div class="submit-btn">
                            <button type="submit" class="btn">Signin</button>
                        </div>

                        <div class="option">
                            Already have an account? <a href="/login">Login</a>
                        </div>
                    </form>
                </div>
        </div>

    </body>

</html>