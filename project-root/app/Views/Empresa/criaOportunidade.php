<div class='cadastraOportunidade'>
	<form class="" action="/Empresa/cadastraOportunidade" method="post">	
			<p class = 'tituloAlterarDados'>Cadastro de Oportunidade de Estágio</p>
				<div class="divEmpresa">
					<div class="texto">
						<p style="float: right;"class="remuneracao">Remuneração:</p>
						<p style="float: right;"class="horas">Quantidade de horas:</p>
					</div>
					<div class="campo">
						<input class="horasinput" name="horas" id="horas" type="text" placeholder="Horas" value="<?= set_value('horas') ?>"/>
						<input class="remuneracaoinput" name="remuneracao" id="remuneracao" type="text" placeholder="R$ XXXX,XX" value="<?= set_value('remuneracao') ?>"/>
					</div>
					<div class="texto">
						<p style="float: left;" class="minintegralizacao">Integralizacao Minima:</p>
						<p style="float: right;"class="maxintegralizacao">Integralizacao Maxima:</p>
					</div>
					<div class="campo">
						<input class="minintegralizacaoinput" name="minintegralizacao" id="minintegralizacao" type="text" placeholder="Integralizacao Minima" value="<?= set_value('minintegralizacao') ?>"/>
						<input class="maxintegralizacaoinput" name="maxintegralizacao" id="maxintegralizacao" type="text" placeholder="Integralizacao Maxima" value="<?= set_value('maxintegralizacao') ?>"/>
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
    </body>
</html>