<?php include "includes/header.php"; ?>
<?php ob_start(); ?>
    <div id="wrapper">

        <!-- Navigation -->
      <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bem vindo
                            <small>Gustavo</small>
                        </h1>

                        <div class="col-sm-6">


                         <?php
                            if(isset($_POST['enviar'])){

                                $cat_nome = $_POST['cat_nome'];

                                if($cat_nome == ""){
                                    echo "Insira uma categoria";
                                }
                                else {
                                    $query = "INSERT INTO categorias(cat_nome) VALUE('$cat_nome')";
                                    $resultado = mysqli_query($connection, $query);

                            if(!$resultado){
                                die("Não deu certo, porque: ") . mysqli_error($connection);
                            }
                                    else {
                                        echo "Categoria adicionada com sucesso";
                                    }

                                }


                            }

                            ?>

                          <form action="" method="post">
                            <div class="form-group">
                              <label for="cat_nome">Adicionar Categoria</label>
                              <input type="text" class="form-control" name="cat_nome">
                            </div>

                            <div class="form-group">
                            <input type="submit" class="btn btn-primary"
                            name="enviar" value="Adicionar">
                            </div>


                          </form>

                          <?php
                          if(isset($_GET['edit'])){
                            include "editar_categoria.php";
                          }

                           ?>
                          <!-- FECHA DIV SM 6-->
                        </div>


                        <div class="col-sm-6">


                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th> ID </th>
                                    <th> Nome da Categoria </th>
                                  </tr>
                                </thead>
                                <tbody>

                                <?php
                                $query = "SELECT * from categorias";
                                $select_categorias = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($select_categorias)){
                                      $cat_id = $row['cat_id'];
                                      $cat_nome = $row['cat_nome'];

                                      echo "<tr>";
                                      echo "<td>" . $cat_id . "</td>";
                                      echo "<td>" . $cat_nome . "</td>";
                                      echo "<td><a href='categorias.php?delete={$cat_id}'>Apagar</a></td>";
                                      echo "<td><a href='categorias.php?edit={$cat_id}'>Editar</a></td>";
                                      echo "</tr>";
                                    }

                                if (isset($_GET['delete']))
                              {
                                $apaga_cat_id = $_GET['delete'];
                                $query = "DELETE FROM categorias WHERE cat_id = {$apaga_cat_id}";
                                $apagandoId = mysqli_query($connection, $query);
                                header("Location: categorias.php");
                              }
                              ?>
                                </tbody>



                            </table>
                        </div>





                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/header.php"; ?>
