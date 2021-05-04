
	<div class="alteraDados">
		<form class="" action="/Estagiario/Home" method="post">	
			<p class = 'tituloSeguir'>Você está seguindo as Empresas:</p>
			<div class = 'item2'>
    				<p style='float:left' class='tag'>ID</p>
					<p style='float:left' class='tag'>Nome</p>
					<p style='float:left' class='tag'>Email</p>
					<p style='float:left' class='tag'>Endereco</p>
					<p style='float:left' class='tag'>Pessoa de Contato</p>
			</div>
			<div class='lista'>
			<?php if (isset($empresas)): ?>
				<div style="witdth: 100%;">
				<?php foreach($empresas as $empresa): ?>
				<div class = 'item'>
    				<?= $empresa['id'] ?>
					<?= $empresa['nome'] ?>
					<?= $empresa['email'] ?>
					<?= $empresa['endereco'] ?>
					<?= $empresa['pessoaContato'] ?>
				</div>
    			<?php endforeach; ?>
				
				</div>
			<?php endif; ?>
			</div>
			<?php if (isset($validation)): ?>
				<div style="witdth: 100%;">
					<div class="alerta" role="alert">
						<?= $validation->listErrors() ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if (isset($inexistente)): ?>
				<div style="witdth: 100%;">
					<div class="alerta" role="alert">
						<p style='float:left' class='tag'>Você não está seguindo essa empresa</p>
					</div>
				</div>
			<?php endif; ?>
			<p class="confsenha">Id empresa:</p>
			<input class="idEmpinput" name="idEmp" id="idEmp" type="text" placeholder="ID"/>
			<button class="parar" type="submit">Parar de Seguir</button>
		</form>
	</div>
</body>
</html>
