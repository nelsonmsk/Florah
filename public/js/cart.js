$(document).ready(function() {

    $('body').on('click', '#clearCart', function(e) {
        e.preventDefault();
		emptyCart();
		cartStatus();
    });

    $('body').on('click', '#additem-btn', function(e) {
        e.preventDefault();
		let $product = $(this).attr('item');
        addToCart($product);
    });

    $('body').on('click', '#item-cancel', function(e) {
        e.preventDefault();
		let $itemId = $(this).attr('item');
        deleteItem($itemId);
    });
	
	$('body').on('click', '#cart-btn-down', function(e) {
        e.preventDefault();
		let $btnId = $(this).attr('row');
		let $qinput = $('.cart-row').find('input#'+ $btnId);
		let	$qvalue = $qinput.val();
		let $num = Number($qvalue) - 1;
		if($num != 0){
			$qinput.val($num);
			updateCart($btnId,$num);
			setTimeout(cartLoad,240);
			cartStatus();
		} else {
			 $qinput.val(1);
		}
    });
	
	$('body').on('click', '#cart-btn-up', function(e) {
        e.preventDefault();	
		let $btnId = $(this).attr('row');
		let $qinput = $('.cart-row').find('input#'+ $btnId);
		let	$qvalue = $qinput.val();
		let $num = Number($qvalue) + 1;
			$qinput.val($num);
			updateCart($btnId,$num);
			setTimeout(cartLoad,240);
			cartStatus();
    });
	
	const addItem = (item, cb) => {
		let cart = [];
		let status = false;
		if (typeof window !== "undefined") {
			if (localStorage.getItem('florahcart')) {
				cart = JSON.parse(localStorage.getItem('florahcart'));
			}
			if(cart.length > 0){
				cart.map((key,value) =>{
					if (key.id == JSON.parse(item).id){
						status = true;
					}
				});
			}
			if (status == true){
			  Swal.fire({title: "Failed!!",text: "You have already added this Product to Cart!",timer: 6000,showConfirmButton: true,type: "error"});
			} else {
				cart.push({
					product: JSON.parse(item),
					quantity: 1,
					id: JSON.parse(item).id
				});
				localStorage.setItem('florahcart', JSON.stringify(cart));
				 Swal.fire({title: "Done!!",text: "Product added to Cart!",timer: 6000,showConfirmButton: true,type: "success"});
				cb();
			}
		}
	};

	const itemTotal = () => {
		if (typeof window !== "undefined") {
			if (localStorage.getItem('florahcart')) {
				return JSON.parse(localStorage.getItem('florahcart')).length;
			}
		}
		return 0;
	};

	const getCart = () => {
		if (typeof window !== "undefined") {
			if (localStorage.getItem('florahcart')) {
				return JSON.parse(localStorage.getItem('florahcart'));
			}
		}
		return [];
	};

	const updateCart = (itemIndex, quantity) => {
		let cart = [];
		if (typeof window !== "undefined") {
			if (localStorage.getItem('florahcart')) {
				cart = JSON.parse(localStorage.getItem('florahcart'));
			}
			cart[itemIndex].quantity = quantity;
			localStorage.setItem('florahcart', JSON.stringify(cart));
		}
	};

	const removeItem = (itemIndex) => {
		let cart = [];
		let status = false;
		if (typeof window !== "undefined") {
			if (localStorage.getItem('florahcart')) {
				cart = JSON.parse(localStorage.getItem('florahcart'));
				cart.splice(itemIndex, 1);
				localStorage.setItem('florahcart', JSON.stringify(cart));
				Swal.fire({title: "Done!!",text: "Product has been deleted from Cart!",timer: 6000,showConfirmButton: true,type: "success"});
			}
		}
	};

	const emptyCart = ()=> {
		if(typeof window !== "undefined"){
			let cartLength = itemTotal();
			if(cartLength > 0){
				localStorage.removeItem('florahcart');
				setTimeout(cartLoad,240);
			}
		}
		
	};

	const addToCart = (item) => {
		addItem(item, () => {});
		cartStatus();
	};
	
	const cartStatus = () => {
		let cartState = getCart();
		let $itemsnotif = $('.navbar-nav-right').find('.getCart');
		let $itemsnotify = $($itemsnotif).find('.count');
			$itemsnotify.html(cartState.length);
	};	

	let cartItems = getCart();
		cartLoad();
		cartStatus();
		

	const handleChange = index => event => {
		let updatedCartItems = cartItems;
		if(event.target.value == 0){
			updatedCartItems[index].quantity = 1;
		}else{
			updatedCartItems[index].quantity = event.target.value;
		}
		cartItems = [...updatedCartItems];
		updateCart(index, event.target.value);
	};

	const deleteItem = (index) => {
		removeItem(index);
		setTimeout(cartLoad,240);
		cartStatus();
	};

	const getTotal = () => {
		return cartItems.reduce((a, b) => {
			return a + (b.quantity*b.product.price)
		}, 0);
	};


    function cartLoad(){
		let cartItems = getCart(), $itemslist = $('.cart-section').find('.cart'), $cartheader = $($itemslist).find('.cart-header');
		let $itemsList = $($itemslist).find('.cart-row'), name = "name",description = "description",price = "price",quantity = "quantity", cartView = [],cartTotal = 0,totalItems = 0;
		$cartheader.html('You have <b>' + cartItems.length  + '</b> items in your cart');
		let $checkoutCart = $($itemslist).find('#btn-checkout-cart');
		if (cartItems.length == 0) {
				cartView += '<div class="card mb-3 cart-row"><div class="card-body"><div class="d-flex justify-content-between">';
				cartView += '<h3 class="cart-alert" item="1">No Items have been added to the Cart !!</h3></div></div></div>';
				$checkoutCart.addClass('disabled');
		}else{
			cartView += '<div class="card mb-3 cart-row">'; 
			for ( let a = 0; a < cartItems.length; a++) {
				cartView += '<div class="card mb-3"><div class="card-body"><div class="d-flex justify-content-between">';
				cartView += '<div class="d-flex flex-row align-items-center"><div><img src=" ./images/gallery/g1.jpg " class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;"></div>';
				cartView += '<div class="ms-3"><h5>' + cartItems[a].product[name] + '</h5><p class="small mb-0">' + cartItems[a].product[description] + '</p></div></div>';
				cartView += '<div class="d-flex flex-row align-items-center"><div class="number-input"><button row="'+ a +'" id="cart-btn-down" class="btn btn-minus px-2" ><i class="fas fa-minus"></i></button>';
				cartView += '<input id="'+ a +'" min="0" name="quantity" value=' + cartItems[a].quantity + ' type="number" class="form-control form-control-sm quantity" /><button row="'+ a +'" id="cart-btn-up" class="btn btn-plus px-2"><i class="fas fa-plus"></i></button></div>';
				cartView += '<div class="item-cost"><h5 class="mb-0">$' + cartItems[a].quantity * cartItems[a].product[price]  + '</h5></div><a href="#!" id="item-cancel" class="item-cancel" item="' + a +'"><i class="fas fa-trash-alt"></i></a></div></div></div></div><hr>';
				cartTotal += cartItems[a].quantity * cartItems[a].product[price];
				totalItems += cartItems[a].quantity;
			}
			cartView += '</div>';
			$checkoutCart.removeClass('disabled');
		}
		$itemsList.replaceWith(cartView);
		let $summaryItems = $($itemslist).find('.summary-items'),$summaryTotal = $($itemslist).find('.summary-total'),$cartSubtotal = $($itemslist).find('.cart-subtotal');
			$summaryItems.html(totalItems );
			$summaryTotal.html('$ ' + cartTotal);
			$cartSubtotal.html('$ ' + cartTotal);
		let $cartShipping = $($itemslist).find('.cart-shipping'),totalinc = cartTotal + 0.00,$cartTotalinc = $($itemslist).find('.cart-totalinc'),$cartGrandtotal = $($itemslist).find('.cart-grandtotal');
			$cartShipping.html('$ ' + 0.00); 
			$cartTotalinc.html('$ ' + totalinc);
			$cartGrandtotal.html('$ ' + totalinc);	
	};
	
});
