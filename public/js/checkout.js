
$(document).ready(function() {
	
	$('body').on('click', '#btn-process-checkout', function(e) {
        e.preventDefault();
		let $btnId = $(this).attr('item');
		Swal.fire({title: "Processing Failed!!",text: "Please Retry Again!",timer: 6000,showConfirmButton: true,type: "error"});
    });
	
	const getCart = () => {
		if (typeof window !== "undefined") {
			if (localStorage.getItem('florahcart')) {
				return JSON.parse(localStorage.getItem('florahcart'));
			}
		}
		return [];
	};
	
	const getList = () => {
		if (typeof window !== "undefined") {
			if (localStorage.getItem('florahlist')) {
				return JSON.parse(localStorage.getItem('florahlist'));
			}
		}
		return [];
	};

	let cartItems = getCart(), listHires = getList();
	
	const getCartTotal = () => {
		return cartItems.reduce((a, b) => {
			return a + (b.quantity*b.product.price)
		}, 0);
	};		
	const getListTotal = () => {
		return listHires.reduce((a, b) => {
			return a + (b.hours*b.florist.rates)
		}, 0);
	};
	
	
	let $selectedPage = $itemslist = $('.checkout-section'), $activePage = $($selectedPage).attr('id');
	if($activePage == "cart-checkout"){
		cartLoad();
	}else{
		listLoad();
	}
		
		
		
    function cartLoad(){
		let cartItems = getCart(), $itemslist = $('#cart-checkout').find('.checkout');
		let cartTotal = getCartTotal();
		let $checkoutLink = $($itemslist).find('#btn-checkout-cart');
		let $cartSubtotal = $($itemslist).find('.cart-subtotal');
			$cartSubtotal.html('$ ' + cartTotal);
		let $cartDelivery = $($itemslist).find('.cart-delivery'),totalinc = cartTotal + 0.00,$cartTotalinc = $($itemslist).find('.cart-totalinc'),$cartGrandtotal = $($itemslist).find('.cart-grandtotal');
			$cartDelivery.html('$ ' + 0.00); 
			$cartTotalinc.html('$ ' + totalinc);
			$cartGrandtotal.html('$ ' + totalinc);	
	};
	
    function listLoad(){
		let listHires = getList();
		let $hireslist = $('#list-checkout').find('.checkout');
		let listTotal = getListTotal(); 
		let $checkoutLink = $($hireslist).find('#btn-checkout-list');		
		let $listSubtotal = $($hireslist).find('.list-subtotal');
			$listSubtotal.html('$ ' + listTotal);
		let $listDelivery = $($hireslist).find('.list-delivery');
			$listDelivery.html('$ ' + 0.00);
		let totalinc = listTotal + 0.00;
		let $listTotalinc = $($hireslist).find('.list-totalinc');
			$listTotalinc.html('$ ' + totalinc);
		let $listGrandtotal = $($hireslist).find('.list-grandtotal');
			$listGrandtotal.html('$ ' + totalinc);		
	};	
	
	
});
