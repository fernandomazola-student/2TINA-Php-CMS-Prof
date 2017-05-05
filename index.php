<?php include "includes/db.php"; ?>

<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

          <!-- Blog Entries Column -->
          <div class="col-md-8">


          <?php

          $query = "SELECT * FROM posts";
          $select_todos_posts = mysqli_query($connection, $query);

           while($row = mysqli_fetch_assoc($select_todos_posts)){
               $post_nome = $row['post_nome'];
               $post_autor = $row['post_autor'];
               $post_data = $row['post_data'];
               $post_imagem = $row['post_imagem'];
               $post_conteudo = $row['post_conteudo'];


              $post_data = date('d-m-Y', strtotime($post_data));

          ?>


              <h1 class="page-header">
                  Page Heading
                  <small>Secondary Text</small>
              </h1>

              <!-- First Blog Post -->
              <h2>
                  <a href="#"><?php echo $post_nome; ?></a>
              </h2>
              <p class="lead">
                  por <a href="index.php"><?php echo $post_autor; ?></a>
              </p>
              <p><span class="glyphicon glyphicon-time"></span><?php echo $post_data; ?></p>
              <hr>
              <img class="img-responsive" src="images/<?php echo $post_imagem;?>" alt="">
              <hr>
              <p><?php echo $post_conteudo; ?></p>
              <a class="btn btn-primary" href="#">Leia Mais <span class="glyphicon glyphicon-chevron-right"></span></a>

              <hr>


<?php } ?>



          </div>
            <!-- Blog Sidebar Widgets Column -->
          <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include "includes/footer.php"; ?>
