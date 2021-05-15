<div class='editarOportunidade'>
	
			<p class = 'tituloAlterarDados'>Editar Oportunidade de Estágio</p>
				<div class="divEmpresa">
                    <form class="" action="/Empresa/alteraOportunidade" method="get">
						<p class='id'>ID oportunidade:</p>
						<input class="idOp" name="idOp" id="idOp" type="text" placeholder="ID" value="<?= set_value('id', $oportunidade['id']) ?>"/>
                        <button class="cadastrar" type="submit">Carregar</button>
                    </form>
                    <form class="" action="/Empresa/alteraOportunidade" method="post">	
					<div class="texto">
						<p style="float: left;" class="curso">Curso:</p>
						<p style="float: right;"class="remuneracao">Remuneração:</p>
						<p style="float: right;"class="horas">Quantidade de horas:</p>
					</div>
					<div class="campo">
						<input class="cursoinput" name="curso" id="curso" type="text" placeholder="curso" value="<?= set_value('curso') ?>"/>
						<input class="horasinput" name="horas" id="horas" type="text" placeholder="Horas" value="<?= set_value('horas') ?>"/>
						<input class="remuneracaoinput" name="remuneracao" id="remuneracao" type="text" placeholder="R$ XXXX,XX" value="<?= set_value('remuneração') ?>"/>
					</div>
					<div class="texto">
						<p style="float: left;" class="minIntegralizacao">Integralizacao Minima:</p>
						<p style="float: right;"class="maxIntegralizacao">Integralizacao Maxima:</p>
					</div>
					<div class="campo">
						<input class="minIntegralizacaoinput" name="minIntegralizacao" id="minIntegralizacao" type="text" placeholder="Integralizacao Minima" value="<?= set_value('minIntegralizacao') ?>"/>
						<input class="maxIntegralizacaoinput" name="maxIntegralizacao" id="maxIntegralizacao" type="text" placeholder="Integralizacao Maxima" value="<?= set_value('maxIntegralizacao') ?>"/>
					</div>
					<p class="descricao">Descrição resumida da vaga:</p>
					<textarea name="descricao" class="descinput" rows = "6" cols = "111"><?php if (isset($oportunidade['descricao'])): ?><?= $oportunidade['descricao'] ?><?php else: ?>Adicione uma breve descrição da vaga...<?php endif; ?></textarea>
					<p class="atividades">Atividades realizadas pelo estagiário:</p>
					<textarea name="atividades" class="atividadesinput" rows = "6" cols = "111"><?php if (isset($oportunidade['atividades'])): ?><?= $oportunidade['atividades'] ?><?php else: ?>Lista de atividades que serão realizadas pelo estagiário...<?php endif; ?></textarea>
					<p class="habilidades">Habilidades requeridas para a vaga:</p>
					<textarea name="habilidades" class="habilidadesinput" rows = "6" cols = "111"><?php if (isset($oportunidade['habilidades'])): ?><?= $oportunidade['habilidades'] ?><?php else: ?>Lista de habilidades requeridas para a vaga...<?php endif; ?></textarea>
                    <button class="cadastrar" type="submit">Alterar</button>
		            </form>
				</div>
			<?php if (isset($validation)): ?>
				<div style="witdth: 100%;">
					<div class="alerta" role="alert">
						<?= $validation->listErrors() ?>
					</div>
				</div>
			<?php endif; ?>
			
	</div>
    </body>
</html>