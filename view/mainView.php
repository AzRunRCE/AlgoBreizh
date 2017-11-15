<!DOCTYPE html>
<html lang="en">
<head>
  <title>Boutique</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/bootstrap.css">
  <link rel="stylesheet" href="style/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</head>
<body>
<?php showHeader(); ?>
<h1 class="pageTitle">AlgoBreizh - Accueil</h1>

<?php require 'footer.php'; ?>
</body>

</html>
