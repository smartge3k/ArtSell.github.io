<?php	
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

	function get_cat(){
		global $mysqli;
		$query = "SELECT * from categories";
		$run = mysqli_query($mysqli, $query);
		if(mysqli_num_rows($run) > 0){
			While($row = mysqli_fetch_array($run)){
				$cat_id = $row['categoryid'];
				$cat_name = $row['categoryname'];

				echo "<option style ='padding:2px'>
				<li><a href='products.php?cat=$cat_id'>$cat_name</a></li>
                </option>";
			}
		}
	}

	function get_cat_as_select_option(){
	global $mysqli;
		$query = "SELECT * from categories";
		$run = mysqli_query($mysqli, $query);
		if(mysqli_num_rows($run) > 0){
			While($row = mysqli_fetch_array($run)){
				$cat_id = $row['categoryid'];
				$cat_name = $row['categoryname'];
				
				echo"<option value='$cat_id'>$cat_name</option>";
			}
		}
	}


	function get_pro_by_cat(){
	
			$cat_id = $_GET['cat'];
			global $mysqli;
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price, rating FROM products where product_cat = '$cat_id'  ORDER BY id ASC");
if($results){ 
$products_item = '<ul class="products">';
$conc = "-";
    $multi = "2"; 
    $currency = '&#36;';
while($obj = $results->fetch_object())
{
    $rating = $obj->rating * 2;
$products_item .= <<<EOT
	<li class="product">
	<form method="post" action="cart_update.php">
	<div class="product-content"><h3 style="color:orange">{$obj->product_name}</h3>
	<div class="product-thumb"><img src="images/{$obj->product_code}$conc{$obj->product_img_name}" width="200px" height="180px" ></div>
	<div class="product-desc" style="margin-bottom:10px; font-size:13px;">{$obj->product_desc}</div>
	<div class="product-info">
	<fieldset>
	<label style="color:orange">
    	Price {$currency}{$obj->price}
    </label>
	<label>
		<input style="color:orange" type="hidden" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
    	<label style="color:orange">
    	<span>Ratting  </span>
        <div class="ratings">
       <div class="empty-stars"></div>
       <div class="full-stars" style="width:{$rating}0%"></div>
</div>
    </label>
	
	</fieldset>
	<input type="hidden" name="product_code" value="{$obj->product_code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div style="color:orange" align="center"><button type="submit" style="background-color:orange;">Add TO Cart</button></div>
	</div></div>
	</form>
	</li>
EOT;
        }
        $products_item .= '</ul>';
        echo $products_item;
        }
  }



	function get_users_of_type($pg) {
		//$pg = sanitize($pg);
		GLOBAL $mysqli;

		if ($pg == 1) {
			$result = $mysqli->query("SELECT `UserId`, `username`, `userphone`, `usermail`, `userpass` FROM `user` WHERE satus = 0");
		}
		else if ($pg == 2) {
			$result = $mysqli->query("SELECT `UserId`, `username`, `userphone`, `usermail`, `userpass` FROM `user` WHERE satus = 0 ORDER BY UserId");
		}
		else if ($pg == 3) {
			$result = $mysqli->query("SELECT `UserId`, `username`, `userphone`, `usermail`, `userpass` FROM `user` WHERE satus = 1");
		}
		else {
			$result = $mysqli->query("SELECT `UserId`, `username`, `userphone`, `usermail`, `userpass` FROM `user` WHERE UserId = -1");
		}			
		
		return $result;
	}

	function isAdmin() {				
		return logged_in() ? ((user_rank($_SESSION['user_id'])) > 6 ? true : false) : false;
	}

	function delete_user($user_id, $sender_id) {
		//$sender_id = sanitize($sender_id);
		//$user_id = sanitize($user_id);
		GLOBAL $con;

		if (user_rank($sender_id) > 6 && user_rank($user_id) < 6){
			return $con->query("UPDATE `user` SET `U_Active`=0 WHERE U_ID = $user_id");
		}
		else if (user_rank($sender_id) == 8){
			return $con->query("UPDATE `user` SET `U_Active`=0 WHERE U_ID = $user_id");
		}

		return false;
	}


	function is_deleted($user_id) {
		//$user_id = sanitize($user_id);
		GLOBAL $con;


		$result = $con->query("SELECT `U_Active` FROM `user` WHERE U_ID = $user_id");
		while($row = $result->fetch_assoc()) {							
			if ($row["U_Active"] == 0)
				return true;
			else
				return false; 			
		}
	}

	function user_data($user_id) {
		$data = array();
		$user_id = (int)$user_id;
		GLOBAL $mysqli;
		
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();
		
		if ($func_num_args > 1) {
			unset ($func_get_args[0]);
			
			$fields = '`' . implode('`,`',$func_get_args) . '`';
			$data = ($mysqli->query("SELECT $fields FROM `user` WHERE UserId = $user_id"));
			return $data->fetch_assoc();
		}
	}

	function logged_in() {
       
         return (isset($_SESSION['user_id'])) ? true : false;
	}


	function email_exists($email) {
		//$uniid = sanitize($email);
		GLOBAL $con;
		$result = $con->query("SELECT COUNT(`U_ID`) AS 'SearchedItem'  FROM `user` WHERE U_Email = '$email'");
		while($row = $result->fetch_assoc()) {							
			if ($row["SearchedItem"] == 0)
				return false;
			else
				return true; 			
		}
	}
?>
