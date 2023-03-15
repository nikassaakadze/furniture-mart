
<?php

include('../includes/connect.php');
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
          <h1>No result found</h1>
        ";
      }else{

    while ($row_data = mysqli_fetch_assoc($result)) {
      $avaliable = $row_data['avaliable'];
      ?>
      <div class="product_card">
        <a href='./product.php?product=<?= $row_data['_id'] ?>&color=<?= $row_data['color'] ?>' class='btn list-group-item-primary'>
          <div class="product_card_hero">
            <img src="./admin/images/<?= $row_data['hero_1'] ?>" alt="">
          </div>
        </a>
        <div class="product_card_footer">
          <h3 class="product_card_name-typography-2">
            <?= $row_data['name'] ?>
          </h3>
          <div class="card_footer_options d-flex-aic">
            <div class="ft_tocart">
              <i class="bi bi-bag-plus"></i>
              <span>Add to cart</span>
            </div>
            <div class="ft_view">
              <i class="bi bi-currency-dollar"></i>
              <span><?= $row_data['price'] ?></span>
            </div>
          </div>
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
      <h1>No result found</h1>
    ";
  }else{

    while ($row_data = mysqli_fetch_assoc($result)) {
      $avaliable = $row_data['avaliable'];
      ?>
            <div class="product_card">
              <a href="./product.php?product=<?= $row_data['_id'] ?>&color=<?= $row_data['color'] ?>">
              <div class="product_card_hero">
                <img src="./admin/images/<?= $row_data['hero_1'] ?>" alt="">
              </div>
              </a>
              <div class="product_card_footer">
                <h3 class="product_card_name-typography-2">
                  <?= $row_data['name'] ?>
                </h3>
                <div class="card_footer_options d-flex-aic">
                  <div class="ft_tocart" data_id="<?= $row_data['_id'] ?>" >
                    <i class="bi bi-bag-plus"></i>
                    <span>Add to cart</span>
                  </div>
                  <div class="cart_btn_loeader">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif?20170503175831" alt="">
                  </div>
                  <div class="ft_view">
                    <i class="bi bi-currency-dollar"></i>
                    <?= $row_data['price'] ?>
                  </div>
                </div>
              </div>
            </div>
    <?php }} }?>