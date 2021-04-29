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
		}
		.centro {
			background-color: rgba(49, 125, 255, 1);
			width: 400px;
			height: 300px;
			margin-top: 150px;
			margin-left:calc(50% - 200px);
			padding: 15px;
			box-shadow: 10px 10px 5px grey;
		}
		p {
			color: #ffffff;
			font-size:30px;
			font-family:"verdana";
			width:150px;
			margin:0px;
		}

		.email {
			margin:0px 0px 15px 160px;
		}
		.senha {
			margin:0px 0px 15px 150px;
		}
		.conta {
			margin:0px 0px 0px 125px;
			font-size:15px;
			width: 150px;
		}
		input {
			height: 25px;
			width: 245px;
			margin-left: 71px;
			line-height:25px;
			padding-left:7px;
			border-radius:5px;

		}
		.login {
			width:175px;
			height:40px;
			margin-top: 15px;
			margin-left: 107px;
			margin-bottom: 35px;
			background-color: #616161;
			color: #ffffff;
			border:none;
			cursor:pointer;
			box-shadow: 2px 2px 2px black;

		}
		a {
			background-color: Transparent;
    		border: none;
			font-size:15px;
			color: #ffffff;
			font-family:"verdana";
			padding-bottom:30px;
			cursor:pointer;
			margin-left: 90px;
			
		}
		.erro {
			color: red;
			margin-top:10px;
			margin-left:42px;
			font-size: 15px;
			width:315px;
		}
		
	</style>
</head>


<body>

	<div class="centro">
		<p class="email">Email:</p>
		<input class="emailinput" name="email" id="email" type="text" placeholder="exmplo@exemplo.com" />
		<p class="senha">Senha:</p>
		<input class="senhainput" name="senha" id="senha" type="password" placeholder="senha" />
		<button class="login" type="button">Login</button>
		<a href="/cadastro"><u>Não tenho conta: Cadastrar</u></a>
		<p class="erro" hidden>Senha/Email incorretos, tente novamente</p>
	</div>


</body>
</html>
