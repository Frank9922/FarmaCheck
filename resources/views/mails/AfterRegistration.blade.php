<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body{
            font-family: poppins, sans-serif;
        }
        .container{
            width: 60%;
            margin: auto;
            background: #f2f2f2;
            padding: 2rem;
        }
        .message{
            width: 80%;
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
            color: #1C194D;;
        }
        .middle li span{
            text-decoration: underline;
            color: #1C194D;
        }
        .middle li span.dia{
            color: #483FEC;
        }
        .foot .contacto .contacto-a, .contacto-b{
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.2rem;
        }
        .foot .contacto .contacto-a span,.foot .contacto .contacto-b span{
            background: #483FEC;
            color: #ffffff;
            padding: 5px;
            border-radius: 50%;
        }
        label{
            cursor: pointer;
        }
    </style>
</head>
<body> 
     <!-- Asunto:¡Bienvenido a FarmaCheck! Comienza tu periodo de prueba hoy -->
    <div class="container">
        <div class="message">
            <div class="top">
                <h1>Hola <span>[Nombre]</span>,</h1>
            </div>
            <div class="middle">
                ¡Nos alegra darte la bienvenida a FarmaCheck!
                <p>
                    Estamos encantados de que te hayas unido a nuestra comunidad. 
                    FarmaCheck es tu aliado para gestionar y optimizar parte de tu trabajo.
                
                    <h3>¿Qué puedes esperar?</h3>
                    <li><span>Periodo de prueba</span>: Desde hoy, tienes acceso completo a todas las funcionalidades del sistema durante tu periodo de prueba <span class="dia">{{ $expiredDate }}</span>, hasta el dia.Explora y descubre cómo FarmaCheck puede ayudarte a mejorar tu eficiencia y productividad.</li>
                    <li><span>Continuidad del servicio</span>: Para seguir disfrutando de todas las ventajas de FarmaCheck después de tu periodo de prueba, asegúrate de realizar el abono correspondiente.Queremos que aproveches al máximo nuestra plataforma sin interrupciones.</li>
                </p>
                <h3>¿Necesitas ayuda?</h3>
                <p>Si tienes alguna pregunta o necesitas asistencia, no dudes en contactarnos. Estamos aquí para ayudarte en cada paso del camino.</p>
                
            </div>
            <div class="foot">
                <div class="contacto">
                    <div class="contacto-a">
                        <label for="mail"><span class="material-symbols-outlined">alternate_email</span></label>
                        <bold>Correo de soporte:</bold><a href="#" name="mail">admin@FarmaCheck.com</a>
                    </div>
                    <div class="contacto-b">
                        <label for="web"><span class="material-symbols-outlined">language</span></label>
                        <bold>Visítanos:</bold><a href="#" name="web">FarmaCheck.com</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</body>
</html>