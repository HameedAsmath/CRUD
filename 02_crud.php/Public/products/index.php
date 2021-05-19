<?php
require_once "../../database.php";


$search = $_GET['search'] ?? '';
if ($search) {
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
    $statement->bindValue(':title', "%$search%");
} else {
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
}


$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include_once "../../views/partials/header.php"; ?>
<h1>Products Crud</h1>
<p>
    <a href="create.php" class="btn btn-success">Create Product</a>
</p>
<form>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search products" name="search" value="<?php echo $search ?>">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">create_date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $i => $product) : ?>


            <tr>
                <th scope="row"><?php echo $i + 1 ?></th>
                <td><img src="/<?php echo $product['image'] ?>" class="thumb-image" /></td>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['create_date'] ?></td>
                <td>
                    <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-outline-primary btn-sm"> Edit </a>
                    <form method="POST" action="delete.php" style="display:inline-block">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
</body>

</html>