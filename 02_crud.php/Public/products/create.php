<?php

require_once "../../database.php";
require_once "../../functions.php";

$errors = [];
$title = '';
$price = '';
$description = '';
$product = [
    'image' => ''
];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../../validate.php";

    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO products(title, image , description, price, create_date)
    VALUES(:title, :image, :description, :price, :date )
          ");

        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', date('Y:m:d H:i:s'));
        $statement->execute();
        header('Location: index.php');
    }
}



?>
<?php include_once "../../views/partials/header.php"; ?>
<p>
    <a href="index.php" class="btn btn-secondary">Go back to products</a>
</p>
<h1>Create new product</h1>

<?php include_once "../../views/products/form.php"; ?>


<!-- Optional JavaScript; choose one of the two! -->


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>


<!-- Option 2: Separate Popper and Bootstrap JS -->

<!--
    //   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    //   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    //   -->
</body>

</html>