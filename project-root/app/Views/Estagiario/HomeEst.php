
	<div class="alteraDados">
		<form class="" action="/cadastroEstagiario" method="post">	
			<p class = 'tituloSeguir'>Você está seguindo as Empresas:</p>
			<div class='lista'>
			<?php if (isset($empresas)): ?>
				<div style="witdth: 100%;">
					<?= implode(",", $empresas); ?>
				</div>
			<?php endif; ?>
			</div>
			<p class="confsenha">Id empresa:</p>
			<input class="idEmpinput" name="idEmp" id="idEmp" type="text" placeholder="ID"/>
			<button class="Registrar" type="submit">Seguir</button>
			<button class="parar" type="submit">Parar de Seguir</button>
		</form>
	</div>
</body>
</html>
