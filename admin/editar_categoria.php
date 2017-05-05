<form action="" method="post">
                            <div class="form-group">
                              <label for="cat_nome">Editar Categoria</label>
                              <?php
                                if (isset($_GET['edit'])) {
                                  $cat_id = $_GET['edit'];
                                  $query = "SELECT * from categorias WHERE cat_id = $cat_id";
                                  $select_categorias = mysqli_query($connection, $query);

                                      while($row = mysqli_fetch_assoc($select_categorias)){
                                        $cat_id = $row['cat_id'];
                                        $cat_nome = $row['cat_nome'];
                                        ?>
                                        <input type="text" class="form-control" name="cat_nome" value="<?php if(isset($cat_nome)){ echo $cat_nome;} ?>">
                                    <?php   }
                                }

                               ?>

                            </div>

                            <div class="form-group">
                            <input type="submit" class="btn btn-primary"
                            name="editar" value="Editar">
                            </div>

                            <?php
                            if(isset($_POST['editar'])){
                              $nome = $_POST['cat_nome'];
                              $query = "UPDATE categorias SET cat_nome = '$nome' WHERE cat_id = $cat_id";
                              $resultado = mysqli_query($connection, $query);

                              if($resultado){
                                echo "Dados atualizados";
                              }
                            }

                             ?>

                          </form>
