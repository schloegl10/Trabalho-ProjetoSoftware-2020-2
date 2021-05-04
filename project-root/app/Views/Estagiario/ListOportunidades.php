
	<div class="alteraDados">
		<p class = 'tituloSeguir'>Oportunidade:</p>
		<div class = 'item2'>
				<p style='float:left' class='tag'>ID |</p>
				<p style='float:left' class='tag'>Semestre |</p>
				<p style='float:left' class='tag'>Remuneracao |</p>
				<p style='float:left' class='tag'>Horas</p>
		</div>
		<div class='lista'>
		<?php if (isset($oportunidades)): ?>
			<div style="witdth: 100%;">
			<?php foreach($oportunidades as $oportunidade): ?>
			<div class = 'item'>
				<?= $oportunidade['id'] ?>
    			<?= $oportunidade['semestre'] ?>
				<?= $oportunidade['remuneracao'] ?>
				<?= $oportunidade['horas'] ?>
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
				<p class='tag'>Semestre</p>
				<?= $oportunidadeSelec['semestre'] ?>
				<p class='tag'>Remuneracao</p>
				<?= $oportunidadeSelec['remuneracao'] ?>
				<p class='tag'>Horas</p>
				<?= $oportunidadeSelec['horas'] ?>
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
