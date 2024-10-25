<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayMirror</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: 	#000;
        
        }
        h1 {
            margin-top: 30px;
            animation: fadein 3s forwards ;
            align-items: center;
            color: #ffffff;
            
  font-family: "Bebas Neue", sans-serif;
  font-weight: 400;
  font-style: normal;
  font-size: 40px;
}
            
            
            
        
        img {
            ;
            padding: 10px;
            width: 50vh; /* Ajuste o tamanho da imagem aqui */
            height: auto; /* Mantém a proporção da imagem */
            margin: 0px; /* Espaçamento entre a imagem e o botão */
        }
        .btn-entrar {
            height: 50px;
            width: 50vh;
            font-size: 1.2em;
            color: white;
            background-color:#00FF00;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center; /* Centraliza o texto no botão */
        }
        .btn-entrar:hover {
            background-color: #0056b3;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2)
        }
        .tela_ap{
          
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 50vh;
            height: 50vh;
            margin: 0;
            font-family: Arial, sans-serif;
          
      
        }
        .container {
            
            align-items: center;
            justify-content: center;
            width: 100%;
            
            max-width: 800px;
        }
        .opcao {
            height: 50px;
            width: 50vh;
            font-size: 1.2em;
            color: white;
            background-color:#00FF00;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.5s;
            text-align: center;
            padding: 10px;
            font-family: "Bebas Neue", sans-serif;
  font-weight: 400;
  font-style: normal;
  font-size: 20px;
        }
        .opcao:hover {
            transform: scale(1.05);
            background-color: #0056b3;
            box-shadow: 5px 5px 5px rgba(77 , 15, 85, 0.5);
            background-color: #fff;
            color: #C71585;
        }
        .icone {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 25px;
            padding-top: 10px;
        }
        .ball {
  
  
  
}
@keyframes fadein {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}

    </style>
</head>
<body>
    <div class="tela_ap"> 

        <img class="ball" src="{{ asset('imgLogo/PayMirror4.png') }}" alt="PayMirror">
        
        
        <div class="container">
            <div class="opcao" onclick="location.href='/admin'">
                <div class="icone"><i class="fas fa-user-shield"></i></div>
                <span>Admin</span>
            </div>
            <div class="opcao" onclick="location.href='/funcionarios'">
                <div class="icone"><i class="fas fa-users"></i></div>
                <span>Funcionários</span>
            </div>
        </div>
        <h1>Bem-vindo ao PayMirror</h1>
    </div>
    </body>
</html>
