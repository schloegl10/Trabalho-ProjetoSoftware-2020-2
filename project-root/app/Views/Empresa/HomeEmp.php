
	
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
