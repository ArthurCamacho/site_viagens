<?php
    require_once("topo.php");
    require_once("conexao.php");
    require_once("funcoes.php");
    if(validarSessao() && $_SESSION['idUsuario']<>0){
?>
	<div class="container-login100" style="margin-top:-9em;"> 
		
		<div style="margin-left:30px">Cadastre seus dependentes <br>(menores de 18 anos)<br><a href='cadastrese.php' title="Faça seu cadastro">
			<img src="images/dependentes.png" style="margin-left:30px;"></a>
		</div>
		<div style="margin-left:30px">Veja os cursos com <br>Inscrições Abertas<br><a href='listarcursoslocais.php?tipoconsulta=1'>
			<img src="images/canal.png" style="margin-right:30px;" 
			title="Veja os cursos com inscrições abertas"></a></div>
	</div>
	<?php
	}
	else { ?>
		
		<div class="container-login100">
			<div><a href='listarcursoslocais.php?tipoconsulta=1'>
				<img src="images/canal.png" style="margin-right:30px;" title="Veja os cursos com inscrições abertas"></a></div><div class="wrap-login100" style="margin-top:-200px;">
			
					<div id="texto" >
						<p>Sistema para inscrições em cursos livres, 
							pesquise os <a href='listarcursoslocais.php?tipoconsulta=2'>locais</a> e 
							<a href='listarcursoslocais.php?tipoconsulta=1'>cursos</a> disponíveis, 
							<a href='cadastrese.php'>cadastre-se</a> e inscreva-se!</p>
					</div>

					
			</div><div><a href='cadastrese.php' title="Faça seu cadastro">
				<img src="images/discussao.png" style="margin-left:30px;"></a></div>
		</div>
	<?php
	}
	
	?>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>