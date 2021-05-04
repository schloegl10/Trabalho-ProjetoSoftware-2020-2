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
		
	</style>
</head>

<body>
	<div class="centro">
		<form class="" action="/Home/Empresa" method="post">	
			<p class = 'tituloAlterarDados'>Alterar Dados</p>
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
				<div class="divEmpresa">
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
					<textarea name="descricao" class="descinput" rows = "6" cols = "111">Adicione uma breve descrição da empresa e seus produtos aqui...</textarea>
				</div>
			<?php if (isset($validation)): ?>
				<div style="witdth: 100%;">
					<div class="alerta" role="alert">
						<?= $validation->listErrors() ?>
					</div>
				</div>
			<?php endif; ?>
			<button class="alterar" type="submit">Alterar</button>
		</form>
	</div>
	<div class='cadastraOportunidade'>
	<form class="" action="/Home/Empresa" method="post">	
			<p class = 'tituloAlterarDados'>Cadastro de Oportunidade de Estágio</p>
				<div class="divEmpresa">
					<div class="texto">
						<p style="float: left;" class="semestre">Semestre requerido:</p>
						<p style="float: right;"class="horas">Quantidade de horas:</p>
						<p style="float: right;"class="remuneração">Remuneração:</p>
					</div>
					<div class="campo">
						<input class="semestreinput" name="semestre" id="semestre" type="text" placeholder="Semestre" value="<?= set_value('semestre') ?>"/>
						<input class="horasinput" name="horas" id="horas" type="text" placeholder="Horas" value="<?= set_value('horas') ?>"/>
						<input class="remuneraçãoinput" name="remuneração" id="remuneração" type="text" placeholder="R$ XXXX,XX" value="<?= set_value('remuneração') ?>"/>
					</div>
					<p class="descricao">Descrição resumida da vaga:</p>
					<textarea name="descricao" class="descinput" rows = "6" cols = "111">Adicione uma breve descrição da vaga...</textarea>
					<p class="atividades">Atividades realizadas pelo estagiário:</p>
					<textarea name="atividades" class="atividadesinput" rows = "6" cols = "111">Lista de atividades que serão realizadas pelo estagiário...</textarea>
					<p class="habilidades">Habilidades requeridas para a vaga:</p>
					<textarea name="habilidades" class="habilidadesinput" rows = "6" cols = "111">Lista de habilidades requeridas para a vaga...</textarea>
				</div>
			<?php if (isset($validation)): ?>
				<div style="witdth: 100%;">
					<div class="alerta" role="alert">
						<?= $validation->listErrors() ?>
					</div>
				</div>
			<?php endif; ?>
			<button class="cadastrar" type="submit">Alterar</button>
		</form>
	</div>
	<div class='listaOportunidades'>
		<p class = 'tituloListaOportunidades'>Oportunidades de Estágio</p>
		<form class="" action="/Home/Empresa" method="get">
			<button class="atualizar" type="submit">Atualizar</button>
		</form>
		<?php if (isset($oportunidades)): ?>
				<div style="witdth: 100%;">
					<div class="alerta" role="alert">
						<?= $oportunidades->list() ?>
					</div>
				</div>
		<?php endif; ?>
	</div>
	<div class='editarOportunidade'>
	<form class="" action="/Home/Empresa" method="post">	
			<p class = 'tituloAlterarDados'>Editar Oportunidade de Estágio</p>
				<div class="divEmpresa">
						<p class='id'>ID oportunidade:</p>
						<input class="idinput" name="id" id="id" type="text" placeholder="ID" value="<?= set_value('id') ?>"/>
					<div class="texto">
						<p style="float: left;" class="semestre">Semestre requerido:</p>
						<p style="float: right;"class="horas">Quantidade de horas:</p>
						<p style="float: right;"class="remuneração">Remuneração:</p>
					</div>
					<div class="campo">
						<input class="semestreinput" name="semestre" id="semestre" type="text" placeholder="Semestre" value="<?= set_value('semestre') ?>"/>
						<input class="horasinput" name="horas" id="horas" type="text" placeholder="Horas" value="<?= set_value('horas') ?>"/>
						<input class="remuneraçãoinput" name="remuneração" id="remuneração" type="text" placeholder="R$ XXXX,XX" value="<?= set_value('remuneração') ?>"/>
					</div>
					<p class="descricao">Descrição resumida da vaga:</p>
					<textarea name="descricao" class="descinput" rows = "6" cols = "111">Adicione uma breve descrição da vaga...</textarea>
					<p class="atividades">Atividades realizadas pelo estagiário:</p>
					<textarea name="atividades" class="atividadesinput" rows = "6" cols = "111">Lista de atividades que serão realizadas pelo estagiário...</textarea>
					<p class="habilidades">Habilidades requeridas para a vaga:</p>
					<textarea name="habilidades" class="habilidadesinput" rows = "6" cols = "111">Lista de habilidades requeridas para a vaga...</textarea>
				</div>
			<?php if (isset($validation)): ?>
				<div style="witdth: 100%;">
					<div class="alerta" role="alert">
						<?= $validation->listErrors() ?>
					</div>
				</div>
			<?php endif; ?>
			<button class="cadastrar" type="submit">Alterar</button>
		</form>
	</div>
	<div class='listaSeguidores'>
		<p class = 'tituloListaSeguidores'>Lista de Seguidores</p>
		<form class="" action="/Home/Empresa" method="get">
			<button class="atualizar" type="submit">Atualizar</button>
		</form>
		<?php if (isset($oportunidades)): ?>
				<div style="witdth: 100%;">
					<div class="alerta" role="alert">
						<?= $oportunidades->list() ?>
					</div>
				</div>
		<?php endif; ?>
	</div>
</body>
</html>
