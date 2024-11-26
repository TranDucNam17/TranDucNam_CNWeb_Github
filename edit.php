<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-danger">EDIT PROCESS</h1>
        <form action="index.php?index=<?php echo urlencode($_GET['index']); ?>" method="post" >
            
            <div class="form-group">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="Name" value="<?= $_GET['name'] ?>">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Price</label>
                <input type="text" class="form-control" name="Price" value="<?= $_GET['price']?>">
            </div>
            <input class="btn btn-success mt-3" type="submit" value="EDIT" name="method"></a>
            
        </form>
    </div>
</body>
</html>