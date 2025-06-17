<?php   require_once("dbconnection.php");
    $query = " select * from tblfee ";
    $result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Agroculture.com</title>
        <script>
            function vfun1(){

            var fb = document.forms["form2"]["fb"].value;

                if(fb == null || fb == ""){
                    document.getElementById("errorbox").innerHTML = "Your message box is Empty, Type Something!!!";
                    return false;
                }

                if(fb != ""){
                    alert("Your message is sent Successfully. ")
                }
            }
        </script>
        <style>
            body{
                margin:0;
                padding:0;
                font-family: Arial;
            }
            .top_nav{
                position: fixed;
                top: 0;
                left: 0;
                width:100%;
                height: 60px;
                padding: 10px 90px;
                box-sizing: border-box;
                background: rgba(0, 0, 0, 0.5);
            }
            .logo{
                padding: 5px 10px;
                height: 50px;
                float: left;
                font-size: 25px;
                font-weight: bold;
                letter-spacing: 5px;
                text-transform: uppercase;
                color: rgb(97, 221, 86);
                -webkit-text-stroke-width: 1px;
                -webkit-text-stroke-color: #00ef6c;
                cursor:pointer;
            }
            .top_nav ul{
                list-style: none;
                float: right;
                margin: 0;
                padding: 0;
                display: flex;
            }
            .top_nav ul li a{
                line-height: 40px;
                color:#fff;
                padding: 8px 20px;
                text-decoration: none;
                text-transform: uppercase;
                font-size: 13px;
                letter-spacing: 3px;
                font-weight: bold;
                cursor:pointer;
            }
            .top_nav ul li a:hover{
                background: rgba(0,0,0,0.7);
                border-radius: 6px;
            }
            .top_nav ul li a.active{
                background: #e2472f;
                color:#fff;
                border-radius: 6px;
            }
            section{
                width: 100%;
                height: 100vh;
                background:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url('feedback1.jpg');
                background-size: auto;
                background-position: bottom : 1px;
            }
            .h1{
                margin-left: 630px;
	            color:#e3e6f4;
                font-size: 35px;
                padding-top:70px;
                font-family: 'Roboto', Times, serif;
                -webkit-text-stroke-width: 1.5px;
                -webkit-text-stroke-color: #020e46;
                letter-spacing: 1px;
            }
            .p{
                box-sizing: border-box;
                box-shadow: 8px 8px 100px darkblue;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%) ;
                border-radius: 8px;
                position: absolute;
                width: 500px;
                background-color: white;
                padding: 30px 50px 30px 30px;
            }
            textarea{
                width:100%;
                height:100px;
                font-size: 25px;
                border-radius: 5px;
                border: none;
                outline: none;
                color: wheat;
                font-family: sans-serif;
                padding: 10px;
                background:#00007a;
                resize: none;
            }
            textarea::placeholder{
                color: rgb(182, 163, 128);
            }
            #errorbox{
                text-align: center;
                font-size: 18px;
                color: rgb(255, 115, 0);
            }
            #btn{
                cursor: pointer;
                outline: none;
                border: none;
                border-radius: 5px;
                font-size: 20px;
                padding: 10px;
                width: 40%;
                margin-left: 34px;
                color: WHITE;
                background-color: #4873e9;
            }
            #btn:hover{
                background-color: WHITE;
                color: rgb(80, 43, 0);
                box-shadow: 0px 0px 10px rgba(0,0,224),
                            0px 0px 25px rgba(0,0,224),
                            0px 0px 50px rgba(0,0,224),
                            0px 0px 100px rgba(0,0,224);
            }
            .bottom_nav{
                position: fixed;
                bottom: 0;
                left: 0;
                width:100%;
                height: 60px;
                padding: 10px 90px;
                box-sizing: border-box;
                background: rgba(0, 0, 0, 0.5);
            }
            .bottom_nav ul{
                list-style: none;
                margin: 0;
                padding: 0;
                display: flex;
            }
            #button{
                font-size: 14px;
                position: relative;
                border-radius:30px;
                padding:8px 20px;
                background:  #4873e9;
                color:wheat;
                margin-top: 3px;
                border-color:  #4873e9;
                border-width: 2px;
                outline: none;
                letter-spacing: 3px;
                margin-right: 470px;
                cursor:pointer;
            }
            #button:hover{
                background: #c9cc13;
	            color: wheat;
	            box-shadow:  0 0 5px   #c9cc13,
	                         0 0 10px    #c9cc13,
	                         0 0 15px     #c9cc13,
	                         0 0 20px    #c9cc13;
            }
            #button2{
                font-size: 14px;
                position: relative;
                border-radius:30px;
                padding:8px 20px;
                background:  #4873e9;
                color:wheat;
                margin-top: 3px;
                border-color: #4873e9;
                border-width: 2px;
                outline: none;
                letter-spacing: 3px;
                margin-left: 470px;
                cursor:pointer;
            }
            #button2:hover{
                background: #cc1379;
	            color: wheat;
	            box-shadow:  0 0 5px  #cc1379,
	                         0 0 10px   #cc1379,
	                         0 0 15px    #cc1379,
	                         0 0 20px   #cc1379;
            }
        </style>
    </head>
    <body>
        <div class="wrap">
            <div class="top_nav">
                <div class="logo">KRISHI</div>
                <ul>
                    <li><a href="Index.php">Home</a></li>
                    <li><a href="About.php">About</a></li>
                    <li><a href="Help.php">Help</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                    <li><a class="active" href="Feedback.php">Feedback</a></li>
                </ul>
            </div>
            <section>
                <div class="h1">
                    <h1>FEEDBACK </h1>
                </div>
                <div class="p">
                    <form name="form2" onsubmit="return vfun1()" action="msg.php" method="POST">

                        <textarea name="fb" placeholder="You can type your message here."></textarea>

                        <br><br>
        
                        <div id="errorbox"></div>

                        <br>

                        <div>
                            <input type="reset" value="CANCEL" id="btn">
                            <input type="submit" name="" value="SEND" id="btn">
                        </div>

                    </form>
                </div>
                <div class="bottom_nav">
                    <ul>
                    <li><form action="Contact.php">
                        <input type="submit" value="Go Back" id="button">
                    </form></li>
                    <li><form action="Index.php">
                        <input type="submit" value="Go Home" id="button2">
                    </form></li>
                    </ul>
                </div>
            </section>
        </div>
    </body>
</html>