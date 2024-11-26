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
        <h1 class="text-center text-danger">you want delete product</h1>
        <form action="index.php?index=<?= $_GET['index']?>" method="post" class="d-flex justify-content-center gap-2">
            <input class="btn btn-success" type="submit" name="value" value="YES">
            <input class="btn btn-danger" type="submit" name="value" value="NO">

        </form>
        
    </div>
</body>
</html>