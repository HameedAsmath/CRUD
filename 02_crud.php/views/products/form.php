<?php
if (!empty($errors)) : ?>

    <div class="alert alert-danger">
        <?php foreach ($errors as $error) : ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<form action="" method="POST" enctype="multipart/form-data">

    <?php if ($product['image']) : ?>
        <img src="/<?php echo $product['image'] ?>" class="update-image">


    <?php endif; ?>

    <div class="mb-3">
        <label class="form-label">Product-Image</label>
        <input type="file" name="image" class="form-control">

    </div>

    <div class="mb-3">
        <label class="form-label">Product-title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title ?>">

    </div>

    <div class="mb-3">
        <label class="form-label">Product-description</label>
        <textarea type="text" name="description" class="form-control"> <?php echo $description ?></textarea>

    </div>


    <div class="mb-3">
        <label class="form-label">Product price</label>
        <input type="number" step="0.1" name="price" class="form-control" value="<?php echo $price ?>">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>