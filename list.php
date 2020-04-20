 
<?php
// By Amila 
//include top header with nav and login and the cart

require_once './head_detail_botom.php';


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
 

if (isset($_GET['error'])) {

    $error = $_GET['error']; 

} else {

   $error = ''; 

}





?>
	<!-- End Header -->
	<div id="content">
		<div class="main">
			<div class="container">
				<div class="row">
					<div class="col-left sidebar col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<div class="inner-left">
							<div class="block block-layered-nav">
								<div class="block-title">
									<strong><span><?= $lang['Shop By']?></span></strong>
								</div>
								<dl id="narrow-by-list">
									<dt class="first"><?= $lang['Category']?></dt>
									<dd>
										<ol>
											<li><a href="#"><?= $lang['dresses']?></a></li>
											<li><a href="#"><?= $lang['JeansTrousers']?></a></li>
											<li><a href="#"><?= $lang['BlousesShirts']?></a></li>
											<li><a href="#"><?= $lang['TopsTShirts']?></a></li>
											<li><a href="#"><?= $lang['JacketsCoats']?></a></li>
											<li><a href="#"><?= $lang['Skirts']?></a></li>
										</ol>
									</dd>
									<dt><?= $lang['Price']?></dt>
									<dd class="block-price">
										<div class="price">
											<div class="range-wrap">
												<div class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="slider-range">
													<div style="left: 0%; width: 100%;" class="ui-slider-range ui-widget-header"></div>
													<a style="left: 0%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
													<a style="left: 100%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
												</div>
											</div>
											<div class="text-box">
												<div class="price-from"><span>$</span><input type="text" name="min" id="minPrice" class="priceTextBox pl" value="400"></div>
												<div class="price-to"><input type="text" name="max" id="maxPrice" class="priceTextBox pr" value="1000"></div>
												<a class="go" href="javascript:void(0)">Go</a>
											</div>
										</div>
									</dd>
									<dt><?= $lang['Color']?></dt>
									<dd class="block-color">
										<ol class="configurable-swatch-list">
											<li>
												<a href="grid.php?color=20" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/black.png" alt="Black" title="Black">
												</span>
												<span class="count">(5)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=27" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/blue.png" alt="Blue" title="Blue">
												</span>
												<span class="count">(1)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=221" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/brown.png" alt="Brown" title="Brown">
												</span>
												<span class="count">(2)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=17" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/charcoal.png" alt="Charcoal" title="Charcoal">
												</span>
												<span class="count">(3)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=19" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/orange.png" alt="Cognac" title="Cognac">
												</span>
												<span class="count">(7)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=24" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/green.png" alt="Green" title="Green">
												</span>
												<span class="count">(1)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=12" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/grey.png" alt="Grey" title="Grey">
												</span>
												<span class="count">(1)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=26" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/indigo.png" alt="Indigo" title="Indigo">
												</span>
												<span class="count">(5)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=13" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/ivory.png" alt="Ivory" title="Ivory">
												</span>
												<span class="count">(2)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=21" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/pink.png" alt="Pink" title="Pink">
												</span>
												<span class="count">(4)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=18" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/purple.png" alt="Purple" title="Purple">
												</span>
												<span class="count">(1)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=14" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/taupe.png" alt="Taupe" title="Taupe">
												</span>
												<span class="count">(1)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=22" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/white.png" alt="White" title="White">
												</span>
												<span class="count">(3)</span>
												</a>
											</li>
											<li>
												<a href="grid.php?color=23" class="swatch-link has-image">
												<span class="swatch-label">
												<img width="36" height="16" src="images/color/yellow.png" alt="Yellow" title="Yellow">
												</span>
												<span class="count">(3)</span>
												</a>
											</li>
										</ol>
									</dd>
									<dt><?= $lang['Size']?></dt>
									<dd class="block-size"> 
									</dd>
									<dt><?= $lang['Brand']?></dt>
									<dd class="block-brand">
										<ol>
											<li><a href="#"><?= $lang['dresses']?></a></li>
											<li><a href="#"><?= $lang['JeansTrousers']?></a></li>
											<li><a href="#"><?= $lang['BlousesShirts']?></a></li>
											<li><a href="#"><?= $lang['TopsTShirts']?></a></li>
											<li><a href="#"><?= $lang['JacketsCoats']?></a></li>
											<li><a href="#"><?= $lang['Skirts']?></a></li>
										</ol>
									</dd>
									<dt><?= $lang['Material']?></dt>
									<dd class="block-brand">
										<ol>
											<li><a href="#"><?= $lang['dresses']?></a></li>
											<li><a href="#"><?= $lang['JeansTrousers']?></a></li>
											<li><a href="#"><?= $lang['BlousesShirts']?></a></li>
											<li><a href="#"><?= $lang['TopsTShirts']?></a></li>
											<li><a href="#"><?= $lang['JacketsCoats']?></a></li>
											<li><a href="#"><?= $lang['Skirts']?></a></li>
										</ol>
									</dd>
								</dl>
							</div>
							<?php //require_once './vt-slider.php'; ?>
							<!--block-special-->										
						</div>
					</div>
					<div class="col-main col-lg-6 col-md-8 col-sm-8 col-xs-12">
						<div class="box-breadcrumbs">
							<div class="breadcrumbs">
								<ul>
									<li class="home">
										<a href="#" title="Go to Home Page">Home</a>
										<span>|</span>
									</li>
									 <?php 
                                                                        if($cat_id!=''){
                                                                            echo '<li><a href="grid.php">Category</a>
										<span>|</span>
									</li>
									<li class="category4">
										<strong>'.$cat_id.'</strong>
									</li>';
                                                                            
                                                                        }elseif ($collection!='') {
                                                                            
                                                                              echo '<a href="grid.php">Collection</a>
										<span>|</span>
									</li>
									<li class="category4">
										<strong>'.$collection.'</strong>
									</li>';
                                                                                
                                                                            } 
                                                                         
                                                                    
                                                                        ?>
								</ul>
							</div>
						</div>
						<div class="block-tag">
							<label><?= $lang['Hot Tag']?></label>
							<a href="#"><span><?= $lang['Sexy']?></span></a>
							<a href="#"><span><?= $lang['Casual']?></span></a>
							<a href="#"><span><?= $lang['Slim']?></span></a>
							<a href="#"><span><?= $lang['Sleeveless']?></span></a>
							<a href="#"><span><?= $lang['Lace']?></span></a>
							<a href="#"><span><?= $lang['Chiffon']?></span></a>
							<a href="#"><span><?= $lang['Black']?></span></a>
							<a href="#"><span><?= $lang['White']?></span></a>
							<a href="#"><span><?= $lang['Sleeveless']?></span></a>
							<a href="#"><span><?= $lang['Slim']?></span></a>
							<a href="#"><span><?= $lang['Chiffon']?></span></a>
							<a href="#"><span><?= $lang['Lace']?></span></a>
							<a href="#"><span><?= $lang['Sexy']?></span></a>
							<a href="#"><span><?= $lang['Casual']?></span></a>
							<a href="#"><span><?= $lang['Black']?></span></a>
							<a href="#"><span><?= $lang['Slim']?></span></a>	
							<span class="open-item closetag">open</span>
						</div>								
						<!--<div class="category-title">
							<h1>Auto Accessories</h1>
							</div>-->
						<div id="catalog-listing">
							<div class="category-products pro-list">
								<div class="toolbar-top">
									<div class="toolbar col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="box-top col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="sort-by col-lg-8 col-md-8 col-sm-8 col-xs-8">
												<ul class="select-order">
													<li><a href="#auto-accessories.php?dir=asc&amp;order=position" class="selected"><?= $lang['Position']?></a></li>
													<li><a href="#auto-accessories.php?dir=asc&amp;order=name"><?= $lang['Name']?></a></li>
													<li><a href="#auto-accessories.php?dir=asc&amp;order=price"><?= $lang['Price']?></a></li>
													<li><a class="desc" href="#auto-accessories.php?dir=desc&amp;order=position" title="Set Descending Direction"></a></li>
												</ul>
											</div>
											<div class="view-mode col-lg-4 col-md-4 col-sm-4 col-xs-4">
												<div class="inner">
													<label>View as</label>
													<!--<p class="view-mode">
														<strong class="grid" title="Grid">Grid</strong>
														<a class="list" title="List" href="#auto-accessories.php?mode=list">List</a>&nbsp;
														</p>-->
													<span class="btn-view-mode">
													<a href="grid.php" title="List" class="grid"><?= $lang['List']?>t</a>
													<a href="list.php" class="list">Grid</a>
													</span>
												</div>
											</div>
										</div>
										<div class="box-bottom col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="limiter col-lg-3 col-md-3 col-sm-3 col-xs-6">
												<div class="limiter-inner">
													<span><?= $lang['Show']?></span>
													<div class="wrap-show">
														<div class="selected-limiter">12</div>
														<ul class="select-limiter">
															<li><a href="#auto-accessories.php?limit=12" class="selected">12</a></li>
															<li><a href="#auto-accessories.php?limit=24">24</a></li>
															<li><a href="#auto-accessories.php?limit=36">36</a></li>
														</ul>
													</div>
													<label class="stylepp">per page</label>
												</div>
											</div>
											<div class="pager col-lg-6 col-md-6 col-sm-5 col-xs-6">
												<p class="amount">
													Items 1 to 12 of 16 total                    
												</p>
												<div class="pages">
													<strong><?= $lang['Pages'] ?></strong>
													<ol>
														<li class="current">1</li>
														<li><a href="#auto-accessories.php?p=2">2</a></li>
														<li>
															<a class="next i-next" href="#auto-accessories.php?p=2" title="Next">Next</a>
														</li>
													</ol>
												</div>
											</div>
											<!--end pages-->
											<div class="go-to-page col-lg-3 col-md-3 col-sm-4 col-xs-12">
												<div class="inner">
													<label><?= $lang['Go to page']?>:</label>
													<form action="#">
														<input type="text" id="gotopage1" name="p" value="1">
														<input type="submit" class="button" id="btnpage1" value="<?= $lang['Go']?>" name="subpage">
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php require_once './product_list.php';?>
								<div class="toolbar-bottom">
									<div class="toolbar col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="box-top col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="sort-by col-lg-8 col-md-8 col-sm-8 col-xs-8">
												<ul class="select-order">
													<li><a href="#auto-accessories.php?dir=asc&amp;order=position" class="selected"><?= $lang['Position']?></a></li>
													<li><a href="#auto-accessories.php?dir=asc&amp;order=name"><?= $lang['Name']?></a></li>
													<li><a href="#auto-accessories.php?dir=asc&amp;order=price"><?= $lang['Price']?></a></li>
													<li><a class="desc" href="#auto-accessories.php?dir=desc&amp;order=position" title="Set Descending Direction"></a></li>
												</ul>
											</div>
											<div class="view-mode col-lg-4 col-md-4 col-sm-4 col-xs-4">
												<div class="inner">
													<label>View as</label>
													<!--<p class="view-mode">
														<strong class="grid" title="Grid">Grid</strong>
														<a class="list" title="List" href="#auto-accessories.php?mode=list">List</a>&nbsp;
														</p>-->
													<span class="btn-view-mode">
													<a href="grid.php" title="List" class="grid">List</a>
													<a href="list.php" title="Grid" class="list">Grid</a>
													</span>
												</div>
											</div>
										</div>
										<div class="box-bottom col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="limiter col-lg-3 col-md-3 col-sm-3 col-xs-6">
												<div class="limiter-inner">
													<span><?= $lang['Show']?></span>
													<div class="wrap-show">
														<div class="selected-limiter">12</div>
														<ul class="select-limiter">
															<li><a href="#auto-accessories.php?limit=12" class="selected">12</a></li>
															<li><a href="#auto-accessories.php?limit=24">24</a></li>
															<li><a href="#auto-accessories.php?limit=36">36</a></li>
														</ul>
													</div>
													<label class="stylepp">per page</label>
												</div>
											</div>
											<div class="pager col-lg-6 col-md-6 col-sm-5 col-xs-6">
												<p class="amount">
													Items 1 to 12 of 16 total                    
												</p>
												<div class="pages">
													<strong><?= $lang['Pages']?></strong>
													<ol>
														<li class="current">1</li>
														<li><a href="#auto-accessories.php?p=2">2</a></li>
														<li>
															<a class="next i-next" href="#auto-accessories.php?p=2" title="Next">Next</a>
														</li>
													</ol>
												</div>
											</div>
											<!--end pages-->
											<div class="go-to-page col-lg-3 col-md-3 col-sm-4 col-xs-12">
												<div class="inner">
													<label><?= $lang['Go to page']?></label>
													<form action="#">
														<input type="text" id="gotopage" name="p" value="1">
														<input type="submit" class="button" id="btnpage" value="<?= $lang['Go']?>" name="subpage">
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>			
					</div>
					<?php //require_once './list_vt_slider.php'; ?>
				</div>
			</div>
		</div>
	</div>
   <?php 
        
                                        require_once './footer.php';
         include ("footerhtmlbottom.php");    
        ?>
</div>	
</body>
<script>
$(document).ready(function() {
     
    refrehCart();
});


$(document).on('click', '.number-spinner button', function () {    
	var btn = $(this),
		oldValue = btn.closest('.number-spinner').find('#qty').val().trim(),
		newVal = 0;
	
	if (btn.attr('data-dir') == 'up') {
            alert('aa');
		newVal = parseInt(oldValue) + 1;
	} else {
		if (oldValue > 1) {
			newVal = parseInt(oldValue) - 1;
		} else {
			newVal = 1;
		}
	}
	btn.closest('.number-spinner').find('#qty').val(newVal);
});



(function (win, doc) {
    'use strict';
    if (!doc.querySelector || !win.addEventListener || !doc.documentElement.classList) {
        return;
    }

    var Spinner = function(rootElement) {
        //Add button selector
        var addButtonSelector = '.js_spin-add';
        //Remove button selector
        var removeButtonSelector = '.js_spin-remove';
        //Number input selector
        var numberInputSelector = '.js_spin-input';
        //A variable to store the markup for the add button
        var addButtonMarkup = '<button type="hidden" class="input-text --add js_spin-add ">+</button>';
        //A variable to store the markup for the remove button
        var removeButtonMarkup = '<button type="hidden" class="input-text --remove js_spin-remove ">-</button>';
        //Variable to store the root's container
        var container;
        //A variable for the markup of the number input pattern
        var markup;
        //A variable to store a number input
        var numberInput;
        //Variable to store the add button
        var addButton;
        //Variable to store the remove button
        var removeButton;
        //Store max value
        var maxValue;
        //Store min value
        var minValue;
        //Store step value
        var step;
        //Store new value
        var newValue;
        //Variable to store the loop counter
        var i;

        //Initialisation function
        this.init = function() {
            container = rootElement;
            //Get the markup inside the number input container
            markup = container.innerHTML;
            //Create a button to decrese the value by 1
            markup += removeButtonMarkup;
            //Create a button to increase the value by 1
            markup += addButtonMarkup;
            //Update the container with the new markup
            //container.innerHTML = markup;

            //Get the add and remove buttons
            addButton = rootElement.querySelector(addButtonSelector);
            removeButton = rootElement.querySelector(removeButtonSelector);
            
            //Get the number input element
            numberInput = rootElement.querySelector(numberInputSelector);

            //Get min, max and step values
            if (numberInput.hasAttribute('max')) {
                maxValue = parseInt(numberInput.getAttribute('max'), 10);
            } else {
                maxValue = 99999;
            }
            if (numberInput.hasAttribute('min')) {
                minValue = parseInt(numberInput.getAttribute('min'), 10);
            } else {
                minValue = 0;
            }
            if (numberInput.hasAttribute('step')) {
                step = parseInt(numberInput.getAttribute('step'), 10);
            } else {
                step = 1;
            }

            //Change the number input type to text
            numberInput.setAttribute('type', 'text');
			
			//If there is there no pattern attribute, set it to only accept numbers
			if (!numberInput.hasAttribute('pattern')) {
				numberInput.setAttribute('pattern', '[0-9]');
			}

            //Add click events to the add and remove buttons
            addButton.addEventListener('click', add, false);  
            removeButton.addEventListener('click', remove, false);
        };

        //Methods for setting values
        this.setAddButtonMarkup = function(markup) {
            addButtonMarkup = markup;
        };

        this.setRemoveButtonMarkup = function(markup) {
            removeButtonMarkup = markup;
        };

        this.setAddButtonSelector = function(selector) {
            addButtonSelector = selector;
        };

        this.setRemoveSelector = function(selector) {
            removeButtonSelector = selector;
        };

        this.setNumberInputSelector = function(selector) {
            numberInputSelector = selector;
        };

        //Function to add one to the quantity value
        var add = function(ev) {
            newValue = parseInt(numberInput.value, 10) + step;
            //If the value is less than the max value
            if (newValue <= maxValue) {
                //Add one to the number input value
                numberInput.value = newValue;
                //Button is active
                removeButton.disabled = false;
            }
            //If the value is equal to the max value
            if (numberInput.value == maxValue || newValue > maxValue) {
                //Disable the button
                addButton.disabled = true;
            }
            ev.preventDefault();
        };
        //Function to subtract one from the quantity value
        var remove = function(ev) {
            newValue = parseInt(numberInput.value, 10) - step;
            //If the number input value is bigger than the min value, reduce the the value by 1
            if (newValue >= minValue) {
                numberInput.value = newValue;
                addButton.disabled = false;
            }
            //If the input value is the min value, add disabled property to the button
            if (numberInput.value == minValue || newValue < minValue) {
                removeButton.disabled = true;
            }
            ev.preventDefault();
        };
    };

    //Get all of the number input elements
    var spins = doc.querySelectorAll('.js_spin');
    //Store the total number of number inputs
    var spinsTotal = spins.length;
    //A variable to store one number inputs
    var spin;
    //A counter for the loop
    var i;
    //Loop through each number input
    for ( i = 0; i < spinsTotal; i = i + 1 ) {
        //Create a new Spin object for each number input
        spin = new Spinner(spins[i]);
        //Start the initialisation function
        spin.init();
    }

}(this, this.document));

</script>
</html>