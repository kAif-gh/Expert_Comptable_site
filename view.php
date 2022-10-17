<?php
    $title = 'Voir le message'; 

    require_once 'includes/header.php';   
    //require_once 'includes/auth_check.php';
    require_once 'db/conn.php'; 

    // Get message by name
    if(!isset($_GET['name'])){
        include 'includes/errormessage.php';

    } else{
        $name = $_GET['name'];
        $result = $crud->getmessageDetails($name);


?>


<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Accueil</a></li>
          <li>Message</li>
        </ol>
        <h2>Message</h2>

      </div>
    </section><!-- End Breadcrumbs -->

<div class="card text-center" >
  <div class="card-header">
      <?php echo $result['name']; ?>
    </div>
    <div class="card-body">
      <h5 class="card-title">
        <strong>
            <?php echo $result['titre']; ?>
        </strong> 
      </h5>
      <p class="card-text">
         <?php echo $result['text'];?>
      </p>
      <a href="index.php" class="btn btn-primary">Accueil</a>
    </div>
    <div class="card-footer text-muted">
      <?php echo $result['email'];  ?> 
  </div>
  <div>
     <a href="viewrecords.php" class="btn btn-info">Retour à la liste</a>
     <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement?');" href="delete.php?name=<?php echo $result['name'] ?>" class="btn btn-danger">Effacer</a> 
  </div>
  
</div>

<br/>



  
<?php } ?>
    

<?php require_once 'includes/footer.php'; ?> 