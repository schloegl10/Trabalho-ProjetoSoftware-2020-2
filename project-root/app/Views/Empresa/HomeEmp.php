
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
						<p style="float: right;"class="remuneracao">Remuneração:</p>
						<p style="float: right;"class="horas">Quantidade de horas:</p>
					</div>
					<div class="campo">
						<input class="semestreinput" name="semestre" id="semestre" type="text" placeholder="Semestre" value="<?= set_value('semestre') ?>"/>
						<input class="horasinput" name="horas" id="horas" type="text" placeholder="Horas" value="<?= set_value('horas') ?>"/>
						<input class="remuneracaoinput" name="remuneração" id="remuneração" type="text" placeholder="R$ XXXX,XX" value="<?= set_value('remuneração') ?>"/>
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
			<button class="cadastrar" type="submit">Cadastrar</button>
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
						<p style="float: right;"class="remuneracao">Remuneração:</p>
						<p style="float: right;"class="horas">Quantidade de horas:</p>
					</div>
					<div class="campo">
						<input class="semestreinput" name="semestre" id="semestre" type="text" placeholder="Semestre" value="<?= set_value('semestre') ?>"/>
						<input class="horasinput" name="horas" id="horas" type="text" placeholder="Horas" value="<?= set_value('horas') ?>"/>
						<input class="remuneracaoinput" name="remuneração" id="remuneração" type="text" placeholder="R$ XXXX,XX" value="<?= set_value('remuneração') ?>"/>
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
