<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">

<link href="/css/register.css" rel="stylesheet" type="text/css">
<link herf="/css/fontawesome.css" rel="stylesheet" type="text/css">
<style type="text/css">

        input{
            height:3rem;
        }
        i{
            padding-top:1.2rem;
        }
        .icons{
            margin-top: 0.3rem;
        }

</style>
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
            <form class="form" action="/resetPassword" method="POST">
                {{csrf_field()}}
                <div class="usericon">
                    <img class="avatar" src="images/avatar.svg">
                    
                    <div class="caption">Welcome</div>
                    <div class="caption">Enter your email</div>
                    @foreach($errors->all() as $error)
                    <div class="err">
                                {{$error}}
                    </div>
                    @endforeach
                </div>

                <div class="inp email">
                    <img class="icons" src="/images/at-solid.svg">
                    <input type="email" name="email" id="inputEmail" placeholder="Enter Email" required>
                </div>

                

                <div class="submit-btn">
                    <button type="submit" class="btn">Send</button>
                </div>

            </form>
        </div>
    </div>
</body>
</html>
