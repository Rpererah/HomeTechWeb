<?php include_once("./../partials/indexHeader.php"); ?>

            <div class="row" style="display: flex;">
                <div style="flex-grow: 1;">
                <a href="createComponente.php" class="btn btn-success">Adicionar</a>
                    
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tabelas
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="./../index.php">Usuários</a>
                        <a class="dropdown-item disabled" href="componente/componente.php">Componentes</a>
                        <a class="dropdown-item" href="./../casa/casa.php">Casas</a>
                    </div>
                </div>
                <table class="table table-striped" style="margin:auto;">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Id do Componente</th>
                            <th scope="col">Id da Casa</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include './../banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM componente ORDER BY comp_id ASC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
			                      echo '<th scope="row" class="text-center">'. $row['comp_id'] . '</th>';
                                  echo '<td>'. $row['house_id'] . '</td>';
                            echo '<td>'. $row['compDescription'] . '</td>';
                            echo '<td>'. $row['compName'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="readComponente.php?comp_id='.$row['comp_id'].'">Info</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="updateComponente.php?comp_id='.$row['comp_id'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="deleteComponente.php?comp_id='.$row['comp_id'].'">Excluir</a>';
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