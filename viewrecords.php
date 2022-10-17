<?php
    $title = 'Voir les messages'; 

    require_once 'includes/header.php'; 
    //require_once 'includes/auth_check.php';
    require_once 'db/conn.php'; 

    
    $results = $crud->getmessages();
?>


 <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Accueil</a></li>
          <li>Messages</li>
        </ol>
        <h2>Messages</h2>

      </div>
    </section><!-- End Breadcrumbs -->


    <table class="table" style="width: 70%;margin-left:auto;margin-right:auto;">
        <tr>
            
            <th>Nom Complet</th>
            <th>Email</th>
            <th>Titre</th>
            <th>Texte</th>
            <th>Actions</th>
        </tr>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
           <tr>
                <td><?php echo $r['name'] ?></td>
                <td><?php echo $r['email'] ?></td>
                <td><?php echo $r['titre'] ?></td>
                <td><?php echo $r['text'] ?></td>

                <td>
                    <a href="view.php?name=<?php echo $r['name'] ?>" class="btn btn-primary">Voir message</a>
                    <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement?');" href="delete.php?name=<?php echo $r['name'] ?>" class="btn btn-danger">Effacer</a>
                </td>
           </tr> 
        <?php }?>
    </table>

<?php require_once 'includes/footer.php'; ?>