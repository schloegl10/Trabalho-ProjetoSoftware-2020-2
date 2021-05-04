
	<div class="alteraDados">
		<form class="" action="/cadastroEstagiario" method="post">	
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
					<textarea name="curriculo" class="curricinput" rows = "6" cols = "111">Adicione um minicurriculo aqui...</textarea>
				</div>
			<?php if (isset($validation)): ?>
				<div style="witdth: 100%;">
					<div class="alerta" role="alert">
						<?= $validation->listErrors() ?>
					</div>
				</div>
			<?php endif; ?>
			<button class="Registrar" type="submit">Alterar</button>
		</form>
	</div>
</body>
</html>
