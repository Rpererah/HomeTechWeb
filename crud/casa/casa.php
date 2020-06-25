<?php include_once("./../partials/indexHeader.php"); ?>

            <div class="row" style="display: flex;">
                <div style="flex-grow: 1;">
                <a href="casaCreate.php" class="btn btn-success">Adicionar</a>
                    
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tabelas
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="./../index.php">Usuários</a>
                        <a class="dropdown-item" href="./../componente/componente.php">Componentes</a>
                        <a class="dropdown-item disabled" href="casa/casa.php">Casas</a>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id da Casa</th>
                            <th scope="col">Id do Usuário</th>
                            <th scope="col">Nome do Usuário</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include './../banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM casa INNER JOIN
                        usuario ON casa.user_id = usuario.user_id
                        ORDER BY house_id ASC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
			                      echo '<th scope="row">'. $row['house_id'] . '</th>';
                                  echo '<td>'. $row['user_id'] . '</td>';
                                  echo '<td>'. $row['userName'] . '</td>';
                            echo '<td>'. $row['houseDescription'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="casaRead.php?house_id='.$row['house_id'].'">Info</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="casaUpdate.php?house_id='.$row['house_id'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="casaDelete.php?house_id='.$row['house_id'].'">Excluir</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

<?php include_once("./../partials/footer.php"); ?>