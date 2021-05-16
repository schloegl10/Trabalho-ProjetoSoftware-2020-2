
	
	<div class="listaOportunidades">
		<p class = 'tituloListaOportunidades'>Oportunidades:</p>
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
		<?php if (isset($validationOp)): ?>
			<div style="witdth: 100%;">
				<div class="alerta" role="alert">
					<?= $validationOp->listErrors() ?>
				</div>
			</div>
		<?php endif; ?>
		<form class="" action="/Empresa/Home" method="post">	
			<p class="confsenha">Id oportunidade:</p>
			<input class="idEmpinput" name="idEmp" id="idEmp" type="text" placeholder="ID"/>
			<button class="Registrar" type="submit">Pesquisar</button>
		</form>
		<div class='lista'>
		<?php if (isset($oportunidadeSelec)): ?>
			<div style="witdth: 100%;">
			<div class = 'item'>
				<p class='tag'>Id empresa</p>
				<?= $oportunidadeSelec['idemp'] ?>
				<p class='tag'>Nome empresa</p>
				<?= $oportunidadeSelec['nomeEmp'] ?>
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
	<div class="listaSeguidores">
		<p class = 'tituloListaSeguidores'>Lista de Seguidores:</p>
		<div class = 'item2'>
				<p style='float:left' class='tag'>ID |</p>
				<p style='float:left' class='tag'>Nome |</p>
				<p style='float:left' class='tag'>Curso |</p>
				<p style='float:left' class='tag'>Ano</p>
		</div>
		<div class='lista'>
		<?php if (isset($oportunidades)): ?>
			<div style="witdth: 100%;">
			<?php foreach($estagiarios as $estagiario): ?>
			<div class = 'item'>
				<?= $estagiario['id'] ?>
    			<?= $estagiario['nome'] ?>
				<?= $estagiario['curso'] ?>
				<?= $estagiario['ano'] ?>
			</div>
    		<?php endforeach; ?>
			
			</div>
		<?php endif; ?>
		</div>
		<?php if (isset($validationEst)): ?>
			<div style="witdth: 100%;">
				<div class="alerta" role="alert">
					<?= $validationEst->listErrors() ?>
				</div>
			</div>
		<?php endif; ?>
		<form class="" action="/Empresa/Home" method="get">	
			<p class="confsenha">Id oportunidade:</p>
			<input class="idEmpinput" name="idEst" id="idEst" type="text" placeholder="ID"/>
			<button class="Registrar" type="submit">Pesquisar</button>
		</form>
		<div class='lista'>
		<?php if (isset($estagSelec)): ?>
			<div style="witdth: 100%;">
			<div class = 'item'>
				<p class='tag'>Nome</p>
				<?= $estagSelec['nome'] ?>
				<p class='tag'>Curso</p>
				<?= $estagSelec['curso'] ?>
				<p class='tag'>Ano</p>
				<?= $estagSelec['ano'] ?>
				<p  class='tag'>Curriculo</p>
				<?= $estagSelec['curriculo'] ?>
			</div>			
			</div>
		<?php endif; ?>
		</div>
	</div>
</body>
</html>
