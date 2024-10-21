<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        *{
            transition: all 200ms ease;
        }
        body{
            font-family: poppins, sans-serif;
        }
        html {
        font-size: 14px;
        }
        .container{
            width: 50%;
            margin: auto;
            background: #5d61f7;
            padding: 2rem;
        }
        .message{
            padding:  1rem 2rem;
            margin: auto;
            border-radius: 1rem;
            background: #ffffff;
             /* background: #483FEC; */
        }
        h1,h2,h3{
            margin: 5px;
        }
        li{
            margin: 0.5rem;
        }
        .top span{
            color: #7c89fd;;
        }
        .middle li span{
            text-decoration: underline;
            color: #1C194D;
        }
        .middle li span.dia{
            color: #5d61f7;
        }
        .foot .contacto .contacto-a, .contacto-b{
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.2rem;
        }
        .foot .contacto .contacto-a span,.foot .contacto .contacto-b span{
            background: #5d61f7;
            color: #ffffff;
            padding: 5px;
            border-radius: 50%;
            font-size: 1.5rem;
        }

        label{
            cursor: pointer;
        }
        /* responsive */
        @media screen and (max-width: 768px) {
            .container{
                width: 95%;
                padding: 1rem;
            }
            .foot b{
                display: none;
            }
        }
    </style>
</head>
<body> 
    <div class="container">
        <div class="message">
            <div class="top">
                <h1>Hola {{$name}}<span></span>,</h1>
            </div>
            <div class="middle">
                ¡Nos alegra darte la bienvenida a Enfar-MedGuide!
                <p>
                Este es tu link para restablecer la contraseña:
                <a href="{{$link}}" target="_blank">Restablecer Contraseña</a>
            
                </p>

            </div>
            <div class="foot">
                <div class="contacto">
                    <div class="contacto-a">
                        <label for="mail"><span class="material-symbols-outlined">alternate_email</span></label>
                        <b>Correo de soporte:</b><a href="#" name="mail">admin@Enfar-MedGuide.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</body>
</html>