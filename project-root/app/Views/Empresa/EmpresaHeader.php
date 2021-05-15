<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MOE</title>
	<meta name="description" content="Mural de Oportunidade de Estágio">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- STYLES -->

	<style {csp-style-nonce}>
		body {
			background-color: rgba(98, 211, 255, 0.1);
            margin: 0px;
		}
		.centro {
			background-color: rgba(210, 210, 210, 0.8);
			width: 800px;
			margin-top: 25px;
			margin-left:calc(50% - 415px);
			padding: 15px;
			box-shadow: 10px 10px 5px grey;
			display:block;
		}
		.cadastraOportunidade {
			background-color: rgba(210, 210, 210, 0.8);
			width: 800px;
			margin-top: 25px;
			margin-left:calc(50% - 415px);
			padding: 15px;
			box-shadow: 10px 10px 5px grey;
			display:block;
		}
		.editarOportunidade {
			background-color: rgba(210, 210, 210, 0.8);
			width: 800px;
			margin-top: 25px;
			margin-left:calc(50% - 415px);
			padding: 15px;
			box-shadow: 10px 10px 5px grey;
			display:block;
		}
		.listaSeguidores {
			background-color: rgba(210, 210, 210, 0.8);
			width: 800px;
			margin-top: 25px;
			margin-left:calc(50% - 415px);
			padding: 15px;
			box-shadow: 10px 10px 5px grey;
			display:block;
		}
		.listaOportunidades {
			background-color: rgba(210, 210, 210, 0.8);
			width: 800px;
			margin-top: 25px;
			margin-left:calc(50% - 415px);
			padding: 15px;
			box-shadow: 10px 10px 5px grey;
			display:block;
		}
		p {
			color: black;
			font-size:20px;
			font-family:"verdana";
			margin: 0px 0px 5px 0px;
		}
		a {
			background-color: white;
    		border: none;
			width: 250px;
			font-size:30px;
			display:inline-block;
			height: 100px;
			margin: 0px;
			box-shadow: 10px 10px 5px grey;
			color: black;
			font-family:"verdana";
			cursor:pointer;
			text-align: center;
			padding-top:40px;
			text-decoration:none;
		}
        .nav-link {
            background-color: white;
    		border: none;
			width: 230px;
			font-size:20px;
			display:inline-block;
			height: 40px;
			margin: 0px;
			box-shadow: none;
			color: black;
			font-family:"verdana";
			cursor:pointer;
			text-align: center;
			padding-top:15px;
			text-decoration:none;
        }
        .navbar-brand {
            background-color: white;
    		border: none;
			width: 100px;
			font-size:20px;
			display:inline-block;
			height: 40px;
			margin: 0px;
			box-shadow: none;
			color: black;
			font-family:"verdana";
			cursor:pointer;
			text-align: center;
			padding-top:15px;
			text-decoration:none;
        }
		.texto {
			display: inline-block;
			overflow: hidden;
			width: 100%;
		}
		.campo {
			display: inline-block;
			width: 100%;
			margin-bottom:5px;
		}
		.texto2 {
			display: inline-block;
			overflow: hidden;
			width:100%;
		}
		.campo2 {
			float: left;
			display: block;
			width: 300px;
		}
		.divEmpresa {
			padding-top: 20px;
		}
		.observacao {
			font-size: 12px;
			float: right;
			width:400px;
		}
		.Nome {
			width: 200px;
		}
		.pessoaContato {
			margin-right: 25px;
		}
		.endereco {
			margin-right: 115px;
		}
		.senha {
			margin-right: 200px;
		}
		.emailinput {
			width:350px;
			margin-right: 165px;
		}
		.senhainput {
			width: 265px;
		}
		.confsenhainput {
			width: 265px;
		}
		.nomeinput {
			width: 240px;
			
		}
		.pessoaContatoinput {
			width: 280px;
			margin-left: 20px;
			margin-right: 20px;
		}
		.enderecoinput {
			width: 207px;
		}
		.alterar {
			height: 30px;
			width: 100px;
			margin-top: 10px;
			cursor: pointer;
		}
		.cadastrar {
			height: 30px;
			width: 100px;
			margin-top: 10px;
			cursor: pointer;
		}
		.alerta {
			background: rgba(255, 110, 110, 1);;
		}
		.tituloAlterarDados {
			text-align: center;
			font-size: 40px;
		}
		.tituloListaSeguidores {
			text-align: center;
			font-size: 40px;
		}
		.tituloListaOportunidades {
			text-align: center;
			font-size: 40px;
		}
		.horas {
			margin-right: 100px;
		}
		.remuneracao {
			margin-right: 50px;
		}
		.cursoinput {
			width: 230px;
			margin-right: 38px;
		}
		.horasinput {
			width: 250px;
			margin-right: 60px;
		}
		.remuneracaoinput {
			width: 190px;
		}
        .container {
            background: white;
            display: inline-block;
            width: 100%;
        }
		
        .lista {
            background: rgba(200, 200, 200, 1);
        }
        .item {
            width: 100%;
        }
        .item2 {
            width: 100%;
            height: 30px;
            background: rgba(180, 180, 180, 1);
        }
        .tag {
            margin-right: 5px;
            font-size: 13px;
        }
        
	</style>
</head>

  <body>
    <?php
      $uri = service('uri');
     ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a style='float:left' class="navbar-brand" href="/">MOE</a>
            <a style='float:left'class="nav-link" href="/Empresa/Home">HOME</a>
            <a style='float:left' class="nav-link"  href="/Empresa/AlteraDados">Alterar Dados</a>
            <a style='float:left'class="nav-link" href="/Empresa/cadastraOportunidade">Cria Oportunidade</a>
            <a style='float:left'class="nav-link" href="/Empresa/alteraOportunidade">Altera Oportunidade</a>
            <a style='float:right'class="nav-link" href="/logout">Logout</a>
        </div>
    </nav>