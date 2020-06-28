<?php include_once("partials/indexHeader.php"); ?>

            <div class="row" style="display: flex;">
                <div style="flex-grow: 1;">
                <a href="create.php" type="button" class="btn btn-success">Adicionar</a>
                    
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tabelas
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item disabled" href="index.php">Usuários</a>
                        <a class="dropdown-item" href="componente/componente.php">Componentes</a>
                        <a class="dropdown-item" href="casa/casa.php">Casas</a>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Deficiencia</th>
                            <th scope="col">Idade</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM usuario ORDER BY user_id ASC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
			                      echo '<th scope="row">'. $row['user_id'] . '</th>';
                            echo '<td>'. $row['userName'] . '</td>';
                            echo '<td>'. $row['userEmail'] . '</td>';
                            echo '<td>'. $row['userPhone'] . '</td>';

                            if($row['userType']==0 || $row['userType']==null ){
                                echo '<td>'. 'Usuário Comum' . '</td>';
                            } else{
                                echo '<td>'.  'Administrador' . '</td>';
                            } 
                            
                            echo '<td>'. $row['userDeficiency'] . '</td>';
                            echo '<td>'. $row['userAge'] . '</td>';
                            echo '<td>'. $row['userAddress'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="read.php?user_id='.$row['user_id'].'">Info</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="update.php?user_id='.$row['user_id'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?user_id='.$row['user_id'].'">Excluir</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
<?php include_once("partials/footer.php"); ?>