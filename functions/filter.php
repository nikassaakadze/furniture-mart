
<?php

include('C:\xampp\htdocs\ecommerce\includes\connect.php');
  if(
    isset($_POST['category']) || 
    isset($_POST['min_val']) || 
    isset($_POST['max_val']) || 
    isset($_POST['color'])){
     $min_price = $_POST['min_val'];
     $max_price = $_POST['max_val'];
  $select_products = 
  "SELECT * FROM  `products` WHERE price > $min_price && price < $max_price ";
  if(isset($_POST['category']) && $_POST['category'] != ''){
    $select_products .="AND category IN('".$_POST['category']."')";
  }
  if(isset($_POST['color']) && $_POST['color'] != ''){
    $select_products .="AND color IN('".$_POST['color']."')";
  }
  $result = mysqli_query($conn, $select_products);
  $result_count = mysqli_num_rows($result);
  if(!$result_count > 0){
    echo "
      <h1>შედეგი ვერ მოიძებნა</h1>
    ";
  }else{

    while ($row_data = mysqli_fetch_assoc($result)) {
      $avaliable = $row_data['avaliable'];
      ?>
        <div class='product-card'>
          <a href='./product.php?product=<?= $row_data['_id'] ?>&color=<?= $row_data['color'] ?>' class='btn list-group-item-primary'>
            <div class='flip-card'>
              <div class='flip-card-inner'>
                <div class='flip-card-front'>
                  <img src='./admin/images/<?= $row_data['hero_1'] ?>' class='card-img-top' alt=''>
                </div>
                <div class='flip-card-back'>
                  <img src='./admin/images/<?= $row_data['hero_2'] ?>' class='card-img-top' alt=''>
                </div>
              </div>
            </div>
          </a>
          <div class='product-card-info'>
            <h4 class='product-card-name'><?= $row_data['name'] ?></h4>
          </div>
          <div class="product-card-drawer d-flex-aic-jcsb">
          <h6 class='product-card-price'><span class="valuta-icon">₾</span> - <?= $row_data['price'] ?>.00</h6>
            <?php
            if ($row_data['avaliable'] > 0) {
              echo "
                  <div class='product-card-avaliability'>
                    <span>მარაგშია: $avaliable</span>
                  </div>
                ";
            } else {
              echo "
                  <div class='product-card-avaliability not-avalibale'>
                    <span>მარაგი ამოიწურა</span>
                  </div>
                ";
            }
            ;
            ?>
          </div>
          <div class="product-card-tocart">
            <a class="d-flex-aic-jcc add-to-cart-button" href='./index.php?add_to_cart=<?= $row_data['_id'] ?>'>
              <i class="bi bi-bag"></i>
            </a>
          </div>
      </div>
    <?php }}} ?>

<?php

if (isset($_POST['max']) || isset($_POST['min'])) {
  $min_val = (int) $_POST['max'];
  $max_val = (int) $_POST['min'];
  $keyword =  $_POST['search_keyword'];
  $select_products = "SELECT * FROM  `products` WHERE name  like '%$keyword%' && price > '$min_val' && price < '$max_val'  ";
  $result = mysqli_query($conn, $select_products);
  $result_count = mysqli_num_rows($result);
  if(!$result_count > 0){
    echo "
      <h1>შედეგი ვერ მოიძებნა</h1>
    ";
  }else{

    while ($row_data = mysqli_fetch_assoc($result)) {
      $avaliable = $row_data['avaliable'];
      ?>
        <div class='product-card'>
          <a href='./product.php?product=<?= $row_data['_id'] ?>&color=<?= $row_data['color'] ?>' class='btn list-group-item-primary'>
            <div class='flip-card'>
              <div class='flip-card-inner'>
                <div class='flip-card-front'>
                  <img src='./admin/images/<?= $row_data['hero_1'] ?>' class='card-img-top' alt=''>
                </div>
                <div class='flip-card-back'>
                  <img src='./admin/images/<?= $row_data['hero_2'] ?>' class='card-img-top' alt=''>
                </div>
              </div>
            </div>
          </a>
          <div class='product-card-info'>
            <h4 class='product-card-name'><?= $row_data['name'] ?></h4>
          </div>
          <div class="product-card-drawer d-flex-aic-jcsb">
          <h6 class='product-card-price'><span class="valuta-icon">₾</span> - <?= $row_data['price'] ?>.00</h6>
            <?php
            if ($row_data['avaliable'] > 0) {
              echo "
                  <div class='product-card-avaliability'>
                    <span>მარაგშია: $avaliable</span>
                  </div>
                ";
            } else {
              echo "
                  <div class='product-card-avaliability not-avalibale'>
                    <span>მარაგი ამოიწურა</span>
                  </div>
                ";
            }
            ;
            ?>
          </div>
          <div class="product-card-tocart">
            <a class="d-flex-aic-jcc add-to-cart-button" href='./index.php?add_to_cart=<?= $row_data['_id'] ?>'>
              <i class="bi bi-bag"></i>
            </a>
          </div>
      </div>
    <?php }} }?>