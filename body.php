<?php 
        include './products.php';
        static $dem=0;
        if ($_POST) {
          // Kiểm tra xem 'Name' và 'Price' có tồn tại và không rỗng
          if (isset($_POST['Name'], $_POST['Price']) && !empty($_POST['Name']) && !empty($_POST['Price'])) {
              // Nếu phương thức là 'ADD', thêm sản phẩm mới
              if ($_POST['method'] === 'ADD') {
                  $products[] = ['name' => $_POST['Name'], 'price' => $_POST['Price'],'image'=>''];
                  print_r($_POST);
              } 
              // Nếu không, cập nhật sản phẩm tại vị trí index
              else if($_POST['method'] === 'EDIT'){
                  $products[$_GET['index']] = ['name' => $_POST['Name'], 'price' => $_POST['Price'],'image'=>''];
              }else{
                  unset($products[$_GET['index']]); 
              }
          }else if(isset($_POST['value'])){
            if($_POST['value']=='YES')
            unset($products[$_GET['index']]); 

          }else if(isset($_POST['submit'])){
            $target_dir = "img/";//Đây là thư mục đích trên server, nơi file tải lên sẽ được lưu trữ.
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);// đường dẫn tới file
            $products[$_GET['index']]['image'] = $target_file;
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
          }
      }
      
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>

<div class="container">
<table class="table mt-3">
  <thead>
    <tr style="border-top: solid 1px #000 ;">
      <th scope="col">STT</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
  <?php foreach ($products as $index => $product): ?> 
     <tr>
        <th scope="row"><?php echo ++$dem; ?></th>
        <td><?php echo htmlspecialchars($product['name']); ?></td>
        <td><?php echo htmlspecialchars($product['price']); ?></td>
        <td>
          <?php if($product["image"]==''):?>
          <form action="index.php?index=<?= $index?>" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Tải lên Ảnh" name="submit">
          </form>
          <?php else:?>
            <img src="<?= $target_file?>" width="30px" alt="">
          <?php endif?>
        <td>
          <!-- Truyền name và price qua URL -->
          <a href="edit.php?name=<?php echo urlencode($product['name']); ?>&price=<?php echo urlencode($product['price']); ?> &index=<?php echo $index; ?>">
            <i class="fa-solid fa-pen-to-square mx-2"></i>
          </a>   
          <a href="delete.php?name=<?php echo urlencode($product['name']); ?>&price=<?php echo urlencode($product['price']); ?> &index=<?php echo $index; ?>">
            <i class="fa-solid fa-trash"></i>
          </a>
        </td>
     </tr> 
<?php endforeach; ?> 


  </tbody>
</table>
</div>
</body>
</html>