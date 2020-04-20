
 



<!DOCTYPE HTML>
<html lang="en-US">
	<?php 
        
      
        if(isset($_GET['cat'])) {
             $cat_id = $_GET['cat'];
        } else {
             $cat_id= '';
        }
        
         if(isset($_GET['collection'])) {
             $collection = $_GET['collection'];
        } else {
             $collection= '';
        }
        
        require_once './header_products.php';?>
	<body>
		<div class="wrapper">
			 <?php 
                   
                         
                         require_once './he_products.php'; ?>
		</div>
<!--		<div class="block-slidebar">
			<button class="close-menu" type="button"><span>close menu</span></button>
			<ul class="nav-menu clearfix">
				<li class="active">
					<a title="Home" href="home.html" class="active"><span>Home</span></a>
				</li>
				<li class="level0 nav-1 parent">
					<a href="products.php?cat=Corssbody" class="">
					<span>Corssbody</span>
					</a>
					<ul class="level0">
						<li class="level1 nav-1-1 first">
							<a href="products.php?cat=new">
							<span>New Arrivals</span>
							</a>
						</li>
						<li class="level1 nav-1-2">
							<a href="products.php?cat=tops">
							<span>Tops & Blouses</span>
							</a>
						</li>
						<li class="level1 nav-1-3">
							<a href="products.php?cat=pants">
							<span>Pants & Denim</span>
							</a>
						</li>
						<li class="level1 nav-1-4 last">
							<a href="products.php?cat=dress">
							<span>Dresses & Skirts</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="level0 nav-2 parent">
					<a href="products.php?cat=Satchel" class="">
					<span>Satchel</span>
					</a>
					<ul class="level0">
						<li class="level1 nav-2-1 first">
							<a href="products.php?cat=new">
							<span>New Arrivals</span>
							</a>
						</li>
						<li class="level1 nav-2-2">
							<a href="products.php?cat=shirt">
							<span>Shirts</span>
							</a>
						</li>
						<li class="level1 nav-2-3">
							<a href="products.php?cat=tees">
								<span>Tees, Knits and Polos</span>
							</a>
						</li>
						<li class="level1 nav-2-4">
							<a href="products.php?cat=pants">
							<span>Pants &amp; Denim</span>
							</a>
						</li>
						<li class="level1 nav-2-5 last">
							<a href="products.php?cat=blazers">
							<span>Blazers</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="level0 nav-3 parent">
					<a href="products.php?cat=totes">
					<span>Totes</span>
					</a>
					<ul class="level0">
						<li class="level1 nav-3-1 first">
							<a href=products.php?cat=eyewear">
							<span>Eyewear</span>
							</a>
						</li>
						<li class="level1 nav-3-2">
							<a href="products.php?cat=jewelry">
							<span>Jewelry</span>
							</a>
						</li>
						<li class="level1 nav-3-3">
							<a href="products.php?cat=Shoes">
							<span>Shoes</span>
							</a>
						</li>
						<li class="level1 nav-3-4 last">
							<a href="products.php?cat=bags">
							<span>Bags & Luggage</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="level0 nav-4 parent">
					<a href="products.php?cat=lw">
					<span>Ladies Wallets</span>
					</a>
					<ul class="level0">
						<li class="level1 nav-4-1 first">
							<a href="products.php?cat=books">
							<span>Books & Music</span>
							</a>
						</li>
						<li class="level1 nav-4-2">
							<a href="products.php?cat=bed">
							<span>Bed & Bath</span>
							</a>
						</li>
						<li class="level1 nav-4-3">
							<a href="products.php?cat=electronics">
							<span>Electronics</span>
							</a>
						</li>
						<li class="level1 nav-4-4 last">
							<a href="products.php?cat=electronics">
							<span>Decorative Accents</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="level0 nav-5 parent">
					<a href="products.php?cat=sweatshirts">
					<span>Sweatshirts</span>
					</a>
					<ul class="level0">
						<li class="level1 nav-5-1 first">
							<a href="products.php?cat=women">
							<span>Women</span>
							</a>
						</li>
						<li class="level1 nav-5-2">
							<a href="products.php?cat=men">
							<span>Men</span>
							</a>
						</li>
						<li class="level1 nav-5-3">
							<a href="products.php?cat=accessories">
							<span>Accessories</span>
							</a>
						</li>
						<li class="level1 nav-5-4 last">
							<a href="products.php?cat=home">
							<span>Home & Decor</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="level0 nav-6">
					<a href="products.php?cat=jackets">
					<span>Jackets & Coats</span>
					</a>
				</li>
			</ul>
		</div>-->

<div class="margin10px">
    
    <br>
    <br>
    <hr>
</div>
<?php 


 require_once './footer_product.php';?>
	</body>
</html>