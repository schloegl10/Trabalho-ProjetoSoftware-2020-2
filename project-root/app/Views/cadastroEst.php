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
			margin-top: 10px;
			cursor: pointer;
		}
		.alerta {
			background: rgba(255, 110, 110, 1);;
		}
		
	</style>
</head>

<body>
	<div class="centro">
		<p class="selecao">Selecione o tipo de conta que deseja criar:</p>
		<form class="" action="/cadastro" method="get">
			<button id="estagiario" name="estagiario" class="estagiario" type="submit">Estagiário</button>
			<button id="empresa" name="empresa" class="empresa" type="submit">Empresa</button>
		</form>
		<form class="" action="/cadastro" method="post">	
			<div class="texto">
				<p style="float: left;" class="email">Email:</p>
				<p style="float: right;" class="senha">Senha:</p>
			</div>
			<div class="campo">
				<input class="emailinput" name="email" id="email" type="text"  value="<?= set_value('email') ?>" placeholder="exmplo@exemplo.com" />
				<input class="senhainput" name="senha" id="senha" type="password" placeholder="senha"  value="<?= set_value('senha') ?>"/>
			</div>
			<div class="texto2">
				<div class="campo2">
					<p class="confsenha">Confirmação da Senha:</p>
					<input class="confsenhainput" name="confsenha" id="confsenha" type="password" placeholder="senha" value="<?= set_value('confsenha') ?>"/>
				</div>
				<p class="observacao">A senha deve conter: 6 ou + caracteres, 1 ou + letra maiúscula, caractere numérico e caractere especial</p>
			</div>
			<?php if ($est): ?>
			<div class="divEstagiario" >
					<p class="TituloEst">Estagiário</p>
					<div class="texto">
						<p style="float: left;" class="Nome">Nome:</p>
						<p style="float: right;" class="Ano">Ano de ingresso:</p>
						<p style="float: right;" class="Curso">Curso:</p>
					</div>
					<div class="campo">
						<input class="nomeinput" name="nome" id="nome" type="text" placeholder="Nome" value="<?= set_value('nome') ?>"/>
						<input class="cursoinput" name="curso" id="curso" type="text" placeholder="Curso" value="<?= set_value('curso') ?>"/>
						<input class="anoinput" name="ano" id="ano" type="text" placeholder="20XX" value="<?= set_value('ano') ?>"/>
					
					</div>
					<p class="Minicurriculo">Minicurriculo:</p>
					<textarea name="curriculo" class="curricinput" rows = "6" cols = "111" name = "description">Adicione um minicurriculo aqui...</textarea>
				</div>
				<?php endif; ?>
				<?php if ($emp): ?>
				<div class="divEmpresa">
					<p class="TituloEmp">Empresa</p>
					<div class="texto">
						<p style="float: left;" class="Nome">Nome:</p>
						<p style="float: right;"class="endereco">Endereço:</p>
						<p style="float: right;"class="pessoaContato">Nome da pessoa de contato:</p>
					</div>
					<div class="campo">
						<input class="nomeinput" name="nome" id="nome" type="text" placeholder="Nome" value="<?= set_value('nome') ?>"/>
						<input class="pessoaContatoinput" name="pessoaContato" id="pessoaContato" type="text" placeholder="Nome" value="<?= set_value('pessoaContato') ?>"/>
						<input class="enderecoinput" name="endereco" id="endereco" type="text" placeholder="Endereço" value="<?= set_value('endereco') ?>"/>
					</div>
					<p class="descricao">Descrição da empresa e produtos :</p>
					<textarea nome="descricao" class="descinput" rows = "6" cols = "111" name = "description">Adicione uma breve descrição da empresa e seus produtos aqui...</textarea>
				</div>
				<?php endif; ?>
			<?php if (isset($validation)): ?>
				<div style="witdth: 100%;">
					<div class="alerta" role="alert">
						<?= $validation->listErrors() ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ($emp || $est): ?>
				<button class="Registrar" type="submit">Registrar</button>
			<?php endif; ?>
		</form>
	</div>
</body>
</html>