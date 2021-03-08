<!doctype html>
<html lang="en">

    <head>

        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="/css/register.css">  
        
        <style>
            input{
                height:3rem;
            }
            i{
                padding:1.2rem;
            }
        </style>
  
    </head>

    <body>
        <div class="main">
            <img class="background" src="/images/wave.png">

            <div class="leftside">
                <div class="home_link_div">
                    <a class="nolistyle" href="/"><div class="home_link">Watchkart</div></a>     
                </div>
                <img class="leftimage" src="/images/bg.svg">
            </div>

            <div class="rightside">
                <form class="form" action="/changePassword/{{$email}}" method="POST">
                    {{csrf_field()}}
                    <div class="usericon">
                        <img class="avatar" src="/images/avatar.svg">
                        
                        <div class="caption">Reset password</div>
                        @foreach($errors->all() as $error)
                        <div class="err">
                                    {{$error}}
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="inp password">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="inputPassword" minlength='8' placeholder="Password" required>
                    </div>
                    
                    <div class="inp confirm_password">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation" minlength='8' placeholder="Confirm Password" required>
                    </div>

                    <div class="submit-btn">
                        <button type="submit" class="btn">Change password</button>
                    </div>

                </form>
            </div>
        </div>      
    </body>
</html>