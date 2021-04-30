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
			height: 200px;
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
		.estagiario {
			margin-right: 75px;
			margin-left:260px;
			height: 30px;
			width: 100px;
			cursor: pointer;
		}
		.empresa {
			height: 30px;
			width: 100px;
			cursor: pointer;
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
		
		.divEstagiario {
			padding-top: 20px;
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
		.Curso {
			width: 200px;
			margin-right: 95px;
		}
		.Ano {
			width: 200px;
			margin-right: 15px;
		}
		.pessoaContato {
			margin-right: 25px;
		}
		.endereco {
			margin-right: 115px;
		}
		.TituloEst {
			text-align: center;
			font-size: 30px;
		}
		.TituloEmp {
			text-align: center;
			font-size: 30px;
		}
		.senha {
			margin-right: 200px;
		}
		.selecao {
			text-align: center;
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
		.cursoinput {
			width: 240px;
			margin-left: 40px;
			margin-right: 40px;
		}
		.pessoaContatoinput {
			width: 280px;
			margin-left: 20px;
			margin-right: 20px;
		}
		.anoinput {
			width: 207px;
		}
		.enderecoinput {
			width: 207px;
		}
		.curricinput {
			width: 100%
		}
		.Registrar {
			height: 30px;
			width: 100px;
			cursor: pointer;
			float: right;
		}
		
	</style>
</head>

<body>
	<div class="centro">
		<div class="texto">
			<p style="float: left;" class="email">Email:</p>
			<p style="float: right;" class="senha">Senha:</p>
		</div>
		<div class="campo">
			<input class="emailinput" name="email" id="email" type="text" placeholder="exmplo@exemplo.com" />
			<input class="senhainput" name="senha" id="senha" type="password" placeholder="senha" />
		</div>
		<div class="texto2">
			<div class="campo2">
				<p class="confsenha">Confirmação da Senha:</p>
				<input class="confsenhainput" name="confsenha" id="confsenha" type="password" placeholder="senha" />
			</div>
			<p class="observacao">A senha deve conter: 6 ou + caracteres, 1 ou + letra maiúscula, caractere numérico e caractere especial</p>
		</div>
		<p class="selecao">Selecione o tipo de conta que deseja criar:</p>
		<button class="estagiario" type="button">Estagiário</button>
		<button class="empresa" type="button">Empresa</button>
		 
		<div class="divEstagiario" hidden>
			<p class="TituloEst">Estagiário</p>
			<div class="texto">
				<p style="float: left;" class="Nome">Nome:</p>
				<p style="float: right;" class="Ano">Ano de ingresso:</p>
				<p style="float: right;" class="Curso">Curso:</p>
			</div>
			<div class="campo">
				<input class="nomeinput" name="nome" id="nome" type="text" placeholder="Nome" />
				<input class="cursoinput" name="curso" id="curso" type="text" placeholder="Curso" />
				<input class="anoinput" name="ano" id="ano" type="text" placeholder="20XX" />
			
			</div>
			<p class="Minicurriculo">Minicurriculo:</p>
			<textarea class="curricinput" rows = "6" cols = "111" name = "description">Adicione um minicurriculo aqui...</textarea>
		</div>
		<div class="divEmpresa" hidden>
			<p class="TituloEmp">Empresa</p>
			<div class="texto">
				<p style="float: left;" class="Nome">Nome:</p>
				<p style="float: right;"class="endereco">Endereço:</p>
				<p style="float: right;"class="pessoaContato">Nome da pessoa de contato:</p>
			</div>
			<div class="campo">
				<input class="nomeinput" name="nome" id="nome" type="text" placeholder="Nome" />
				<input class="pessoaContatoinput" name="pessoaContato" id="pessoaContato" type="text" placeholder="Nome" />
				<input class="enderecoinput" name="endereco" id="endereco" type="text" placeholder="Endereço" />
			</div>
			<p class="descricao">Descrição da empresa e produtos :</p>
			<textarea class="descinput" rows = "6" cols = "111" name = "description">Adicione uma breve descrição da empresa e seus produtos aqui...</textarea>
		</div>
		<button hidden class="Registrar" type="button">Registrar</button>
	</div>
</body>
</html>
