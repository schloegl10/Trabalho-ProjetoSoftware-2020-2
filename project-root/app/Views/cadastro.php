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
			background-color: rgba(210, 210, 210, 0.8);
			width: 800px;
			margin-top: 150px;
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
			text-align: center;
		}
		a {
			background-color: white;
    		border: none;
			width: 250px;
			font-size:30px;
			display:inline-block;
			height: 60px;
			margin: 0px;
			box-shadow: 10px 10px 5px grey;
			color: black;
			font-family:"verdana";
			cursor:pointer;
			text-align: center;
			padding-top:40px;
			text-decoration:none;
		}
		.estagiario {
			margin-left: 40px;
			margin-right:200px;
			margin-bottom: 20px;
		}
	</style>
</head>

<body>
	<div class="centro">
		<p class="selecao">Selecione o tipo de conta que deseja criar:</p>
		<a href="/cadastroEstagiario" id="estagiario" name="estagiario" class="estagiario" type="submit">Estagiário</a>
		<a href="/cadastroEmpresa" id="empresa" name="empresa" class="empresa" type="submit">Empresa</a>
	</div>
</body>
</html>
