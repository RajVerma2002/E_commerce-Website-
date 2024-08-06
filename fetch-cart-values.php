<?php

//fetch_cart.php

session_start();

$total_price = 0;
$total_item = 0;
$output = '';


if(!empty($_SESSION["shopping_cart"]))
{
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$output .= '
	<ul class="header-cart-wrapitem w-full"
				>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								'.$values["product_name"].' 
							</a>

							<span class="header-cart-item-info">
							'.$values["product_color"].' x'.$values["product_size"].' x	'.$values["product_quantity"].' x $'.$values["product_price"].'
								
								
								<button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'" alt="delete"><i class="zmdi zmdi-delete"></i></button>
							</span>
							
							

						</div>
						
							
					</li>
</ul>
				
		




		
		
	
		
	';
		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;
	}
	
		$output .= '
	<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $'.number_format($total_price, 2).'
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shopping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shopping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>


	';
	
}
else
{
	$output .= '
    
    		Your Cart is Empty!
    
    ';
}

$data = array(
	'cart_details'		=>	$output,
	'total_price'		=>	'$' . number_format($total_price, 2),
	'total_item'		=>	$total_item
);	

echo json_encode($data);


?>