<?php require_once "assets/nav.php"; require_once "assets/abre-banco.php"; ?>
<div id="main" class="container-fluid">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<div id="top" class="row">
		<div class="col-md-1">
			<h2>Usuários</h2>
		</div>
		<span></span>
		<div class="col-md-9">
			<input type="text" name="teste" id="teste" class="w-100" placeholder="Pesquise um usuario">
		</div>

		<div class="col-md-2">
			<!-- Chama o Formulário para adicionar alunos -->
			<a href="?page=fadd_usu" class="btn btn-primary pull-right h2">Novo Usuário</a> 
		</div>
	</div>
	<div>
		<?php
			require_once 'mensagens.php';
			$quantidade = 5;

			$pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
			$inicio = ($quantidade * $pagina) - $quantidade;
			$selectQ = "SELECT * FROM usuario ORDER BY id LIMIT $quantidade OFFSET $inicio";

			$selectP = $conexao ->prepare($selectQ);
			$selectP->SetFetchMode(PDO::FETCH_ASSOC);
			$selectP->execute();
		?>
	</div>
	<!--top - Lista dos Campos-->
	<hr/>
	<div id="bloco-list-pag">	
		<div id="list" class="row">
			<div class="table-responsive col-xs-12">
				<?php
					echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
					echo "<thead><tr>";
					echo "<td><strong>ID</strong></td>"; 
					echo "<td><strong>Nome do usuário</strong></td>"; 
					echo "<td><strong>Usuário</strong></td>";
					echo "<td class='d-none d-md-table-cell'><strong>Senha</strong></td>";
					echo "<td class='d-none d-md-table-cell'><strong>E-mail</strong></td>";
					echo "<td class='d-none d-md-table-cell'><strong>Nível</strong></td>";
					echo "<td class='d-none d-md-table-cell'><strong>Ativo</strong></td>";
					echo "<td class='d-none d-md-table-cell'><strong>Data cad/ed</strong></td>";
					echo "<td class='actions'><strong>Ações</strong></td>"; 
					echo "</tr></thead><tbody>";

					while($dados = $selectP->fetch()){ 
						echo "<tr>";
						echo "<td>".$dados['id']."</td>";
						echo "<td>".$dados['nome']."</td>";
						echo "<td>".$dados['usuario']."</td>";
						echo "<td class='d-none d-md-table-cell'>".$dados['senha']."</td>";
						echo "<td class='d-none d-md-table-cell'>".$dados['email']." </td>";
						echo "<td class='d-none d-md-table-cell'>".$dados['nivel']."</td>";
						if($dados['ativo'] == 1){
							echo "<td class='d-none d-md-table-cell'>SIM</td>";
						}else if($dados['ativo'] == 0){
							echo "<td class='d-none d-md-table-cell'>NÃO</td>";
						}
						echo "<td class='d-none d-md-table-cell'>".date('d/m/Y',strtotime($dados['dt_cadastro']))."</td>";
						echo "<td><div class='btn-group btn-group-xs'>";
						echo "<a class='btn btn-info btn-xs' href=?page=view_usu&id=".$dados['id']."> Detalhar </a>";
						echo "<a class='btn btn-warning btn-xs' href=?page=fedita_usu&id=".$dados['id']."> Editar </a>";
						if($dados['ativo'] == 1){
							echo "<a class='btn btn-danger btn-xs'  href=?page=block_usu&id=".$dados['id']."> Bloquear </a>";
						}else if($dados['ativo'] == 0){
							echo "<a class='btn btn-success btn-xs'  href=?page=ativa_usu&id=".$dados['id'].">&nbsp;&nbsp;&nbsp;Ativar&nbsp;&nbsp;</a></div></td>";
						}
					}
					echo "</tr></tbody></table>";
				?>				
			</div><!-- Div Table -->
		</div><!--list-->

		<!-- PAGINAÇÃO -->
		<div id="bottom" class="row">
			<div class="col-md-12">
				<?php
					try{
						$selectQ2 = "SELECT id FROM usuario";
						$selectP2 = $conexao ->prepare($selectQ2);
						$selectP2->execute();
						$numTotal = $selectP2->rowcount();
						$totalpagina = (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);
	
						$exibir = 3;
	
						$anterior = (($pagina-1) <= 0) ? 1 : $pagina - 1;
						$posterior = (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;
						
						echo "<ul class='pagination'>";
						echo "<li class='page-item'><a class='page-link' href='?page=lista_usu&pagina=1" . (isset($_GET['teste']) ? "&teste=" . $_GET['teste'] : "") . "'> Primeira</a></li>";
						echo "<li class='page-item'><a class='page-link' href=\"?page=lista_usu&pagina=$anterior" . (isset($_GET['teste']) ? "&teste=" . $_GET['teste'] : "") . "\"> Anterior</a></li>";
					
					echo "<li class='page-item'><a class='page-link' href='?page=lista_usu&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";
					
					for($i = $pagina+1; $i < $pagina+$exibir; $i++){
						if($i <= $totalpagina)
						echo "<li class='page-item'><a class='page-link' href='?page=lista_usu&pagina=".$i."'> ".$i." </a></li> ";
					}
					
					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_usu&pagina=$posterior\"> Pr&oacute;xima</a></li> ";
					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_usu&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";
					
				}catch(PDOException $e){
					throw $e;
				}
				?>	
			</div>
		</div><!--bottom-->
	</div>
</div><!--main-->