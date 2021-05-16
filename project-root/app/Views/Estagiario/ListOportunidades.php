
	<div class="alteraDados">
		<p class = 'tituloSeguir'>Oportunidade:</p>
		<div class = 'item2'>
				<p style='float:left' class='tag'>ID |</p>
				<p style='float:left' class='tag'>Curso |</p>
				<p style='float:left' class='tag'>Remuneracao |</p>
				<p style='float:left' class='tag'>Horas |</p>
				<p style='float:left' class='tag'>Itegralizacao Minima |</p>
				<p style='float:left' class='tag'>Itegralizacao Maxima |</p>
				<p style='float:left' class='tag'>Empresa</p>
		</div>
		<div class='lista'>
		<?php if (isset($oportunidades)): ?>
			<div style="witdth: 100%;">
			<?php foreach($oportunidades as $oportunidade): ?>
			<div class = 'item'>
				<?= $oportunidade['id'] ?>
    			<?= $oportunidade['curso'] ?>
				<?= $oportunidade['remuneracao'] ?>
				<?= $oportunidade['horas'] ?>
				<?= $oportunidade['minintegralizacao'] ?>
				<?= $oportunidade['maxintegralizacao'] ?>
				<?= $oportunidade['empresa']['nome'] ?>
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
		<form class="" action="/Estagiario/buscaOportunidade" method="post">	
			<p class="confsenha">Id oportunidade:</p>
			<input class="idEmpinput" name="idEmp" id="idEmp" type="text" placeholder="ID"/>
			<button class="Registrar" type="submit">Pesquisar</button>
		</form>
		<div class='lista'>
		<?php if (isset($oportunidadeSelec)): ?>
			<div style="witdth: 100%;">
			<div class = 'item'>
				<p class='tag'>Id empresa</p>
				<?= $oportunidade['empresa']['id'] ?>
				<p class='tag'>Nome empresa</p>
				<?= $oportunidade['empresa']['nome'] ?>
				<p class='tag'>Curso</p>
				<?= $oportunidadeSelec['curso'] ?>
				<p class='tag'>Remuneracao</p>
				<?= $oportunidadeSelec['remuneracao'] ?>
				<p class='tag'>Horas</p>
				<?= $oportunidadeSelec['horas'] ?>
				<p class='tag'>Integralizacao Minima</p>
				<?= $oportunidadeSelec['minintegralizacao'] ?>
				<p class='tag'>Integralizacao Maxima</p>
				<?= $oportunidadeSelec['maxintegralizacao'] ?>
				<p  class='tag'>Habilidades</p>
				<?= $oportunidadeSelec['habilidades'] ?>
				<p  class='tag'>Atividades</p>
				<?= $oportunidadeSelec['atividades'] ?>
				<p class='tag'>Descrição</p>
				<?= $oportunidadeSelec['descricao'] ?>
			</div>			
			</div>
		<?php endif; ?>
		</div>
	</div>
</body>
</html>
