<?php 
    $title = 'success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $name = $_POST['name'];
        $email = $_POST['email'];
        $titre = $_POST['titre'];
        $text = $_POST['text'];

        //Call function to insert and track if success or not
        $isSuccess = $crud->insertmessage($name, $email, $titre,$text);

        if($isSuccess){
          //SendEmail::SendMail($email, 'Félicitation', 'Vous nous avez contacté avec succès');
          include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }

    }
?>

<main id ="main">
       <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Accueil</a></li>
          <li>Success Page</li>
        </ol>
        <h2>Success Page</h2>

      </div>
  </section><!-- End Breadcrumbs -->






  <div class="card text-center">
    <div class="card-header">
      <?php echo $_POST['name']; ?>
    </div>
    <div class="card-body">
      <h5 class="card-title">
        <strong>
            <?php echo $_POST['titre']; ?>
        </strong> 
      </h5>
      <p class="card-text">
         <?php echo $_POST['text'];?>
      </p>
      <a href="index.php" class="btn btn-primary">Accueil</a>
    </div>
    <div class="card-footer text-muted">
      <?php echo $_POST['email'];  ?> 
    </div>
</div>

</main>
<?php 
    require_once 'includes/footer.php';
?>