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
			background-color: rgba(49, 125, 255, 0.8);
			width: 800px;
			height: 400px;
			margin-top: 150px;
			margin-left:calc(50% - 415px);
			padding: 15px;
			box-shadow: 10px 10px 5px grey;
			display:block;
		}
		p {
			color: #ffffff;
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
			margin-right: 25px;
			margin-left:80px;
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
			display: block;
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
			margin-right: 40px;
		}
		.Ano {
			width: 200px;
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
		<div class="divEstagiario">
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
			<input class="curricinput" name="curriculo" id="curriculo" type="text" placeholder="Curriculo" />
		</div>
		<div class="Empresa" hidden>
			<div class="texto">
				<p class="Nome">Nome:</p>
				<p class="endereco">Endereço:</p>
				<p class="pessoaContato">Nome da pessoa de contato:</p>
			</div>
			<div class="campo">
				<input class="nomeinput" name="nome" id="nome" type="text" placeholder="Nome" />
				<input class="enderecoinput" name="endereco" id="endereco" type="text" placeholder="Endereço" />
				<input class="pessoaContatoinput" name="pessoaContato" id="pessoaContato" type="text" placeholder="Nome" />
			</div>
			<p class="descricao">Descrição da empresa e produtos :</p>
			<input class="descricaoinput" name="descricao" id="descricao" type="text" placeholder="Descricao" />
		</div>
		<button class="Registrar" type="button">Registrar</button>
	</div>
</body>
</html>
