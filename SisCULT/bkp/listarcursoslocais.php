<?php
require_once("topo.php");
require_once("conexao.php");
require_once("funcoes.php");

    echo "<h3>Listagem de Cursos</h3>";
    echo "<p>Você deve estar cadastrado e logado para fazer sua inscrição em quaisquer cursos.</p>";
    try{
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $valorAnterior="";
            echo "<table border = '1'>";
                
            if(isset($_GET['tipoconsulta'])){
                $sql="SELECT tbturmas.id,
                    tbturmas.descricao as turma,
                    tbturmas.horainicio,
                    tbturmas.horatermino,
                    tbcursos.nome as nomecurso,
                    tblocais.nome as nomelocal,
                    tbpessoas.nome as nomeprofessor 
                    FROM tbturmas,tbcursos,tblocais,tbpessoas
                    where tbturmas.idCurso = tbcursos.id AND
                    tbturmas.idLocal = tblocais.id AND
                    tbturmas.idprofessor = tbpessoas.id AND
                    tbturmas.ano =  YEAR(NOW())";
                if($_GET['tipoconsulta']==1){//por curso
                    $sql=$sql." order by nomecurso,tbturmas.horainicio,turma";
                    echo "<tr><th>Curso</th><th>Local</th><th>Turma</th>
                    <th>Professor</th><th>Horário</th><th></th></tr>";
                }else if($_GET['tipoconsulta']==2){//por local
                    $sql=$sql." order by nomelocal,tbturmas.horainicio,turma";
                    echo "<tr><th>Local</th><th>Curso</th><th>Turma</th>
                    <th>Professor</th><th>Horário</th><th></th></tr>";
                }else {//redireciona
                    header("location:index.php");
                }
                $consulta = $conn->query($sql);
                
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    if(empty($valorAnterior)){
                        if($_GET['tipoconsulta']==1){
                        $valorAnterior=$linha['nomecurso'];
                        echo "<tr><td colspan='6' style='color:white;background-color:rgb(5, 96, 133);'>{$linha['nomecurso']}</td></tr>
                        <tr><td></td><td>{$linha['nomelocal']}</td>";
                        }else if($_GET['tipoconsulta']==2){
                            $valorAnterior=$linha['nomelocal'];
                            echo "<tr><td colspan='6' style='color:white;background-color:rgb(5, 96, 133);'>{$linha['nomelocal']}</td></tr>
                            <tr><td></td><td>{$linha['nomecurso']}</td>";
                        }
                    } else{
                        if($_GET['tipoconsulta']==1){
                            if($valorAnterior==$linha['nomecurso']){
                                echo "<td></td><td>{$linha['nomelocal']}</td>";
                            } else{       
                                $valorAnterior=$linha['nomecurso'];         
                                echo "<tr><td colspan='6' style='color:white;background-color:rgb(5, 96, 133);'>{$linha['nomecurso']}</td></tr>
                                <tr><td></td><td>{$linha['nomelocal']}</td>";}

                            }else if($_GET['tipoconsulta']==2){
                                if($valorAnterior==$linha['nomelocal']){
                                    echo "<td></td><td>{$linha['nomecurso']}</td>";
                                } else{  
                                $valorAnterior=$linha['nomelocal'];
                                echo "<tr><td colspan='6' style='color:white;background-color:rgb(5, 96, 133);'>{$linha['nomelocal']}</td></tr>
                                <tr><td></td><td>{$linha['nomecurso']}</td>";
                            }
                        }
                        
                       // echo "entrou no else empty<br>";
                       // echo "<td>{$linha['nomelocal']}</td><td>{$linha['nomecurso']}</td>";
                    }
                        echo "<td>{$linha['turma']}</td>
                        <td>{$linha['nomeprofessor']}</td>
                        <td>{$linha['horainicio']} - {$linha['horatermino']}</td>";
                        if(isset($_SESSION['idUsuario']))
                            echo "<td><a href='inscreverse.php?id={$linha['id']}' 
                            alt='Editar' title='Editar'>
                            <span class='material-symbols-outlined'>edit_note</span></a>
                            </td>";
                        else
                            echo "<td></td>";
                        echo "</tr>";
                    
                }
                echo "</table>";
            }
        }else {
            echo "<p>Problemas ao realizar o envio dos
            dados para pesquisa, clique 
                <a href='index.php'>aqui</a>
                para voltar.</p>";
        }
    }catch(Exception $e) {
        echo "<p class='erro'>Ocorreu um erro: " . $e->getMessage() . "</p>";
    }
require_once("rodape.php");
?>