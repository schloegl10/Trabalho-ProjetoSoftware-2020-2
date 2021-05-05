
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
    </body>
</html>