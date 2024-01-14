$(document).ready(function() {

    $('body').on('click', '#clearList', function(e) {
        e.preventDefault();
		emptyList();
		listStatus();
    });

    $('body').on('click', '#addhire-btn', function(e) {
        e.preventDefault();
		let $florist = $(this).attr('hire');
        addToList($florist);
    });

    $('body').on('click', '#hire-cancel', function(e) {
        e.preventDefault();
		let $hireId = $(this).attr('hire');
        deleteHire($hireId);
    });
	
	$('body').on('click', '#list-btn-down', function(e) {
        e.preventDefault();
		let $btnId = $(this).attr('row');
		let $hinput = $('.list-row').find('input#'+ $btnId);
		let	$hvalue = $hinput.val();
		let $num = Number($hvalue) - 1;
		if($num != 0){
			$hinput.val($num);
			updateList($btnId,$num);
			setTimeout(listLoad,240);
			listStatus();
		} else {
			 $hinput.val(1);
		}
    });
	
	$('body').on('click', '#list-btn-up', function(e) {
        e.preventDefault();	
		let $btnId = $(this).attr('row');
		let $hinput = $('.list-row').find('input#'+ $btnId);
		let	$hvalue = $hinput.val();
		let $num = Number($hvalue) + 1;
			$hinput.val($num);
			updateList($btnId,$num);
			setTimeout(listLoad,240);
			listStatus();
    });
	
	const addHire = (hire, cb) => {
		let list = [];
		let status = false;
		if (typeof window !== "undefined") {
			if (localStorage.getItem('florahlist')) {
				list = JSON.parse(localStorage.getItem('florahlist'));
			}
			if(list.length > 0){
				list.map((key,value) =>{
					if (key.id == JSON.parse(hire).id){
						status = true;
					}
				});
			}
			if (status == true){
			  Swal.fire({title: "Failed!!",text: "You have already added this Florist to List!",timer: 6000,showConfirmButton: true,type: "error"});
			} else {
				list.push({
					florist: JSON.parse(hire),
					hours: 1,
					id: JSON.parse(hire).id
				});
				localStorage.setItem('florahlist', JSON.stringify(list));
				 Swal.fire({title: "Done!!",text: "Florist added to List!",timer: 6000,showConfirmButton: true,type: "success"});
				cb();
			}
		}
	};

	const hireTotal = () => {
		if (typeof window !== "undefined") {
			if (localStorage.getItem('florahlist')) {
				return JSON.parse(localStorage.getItem('florahlist')).length;
			}
		}
		return 0;
	};

	const getList = () => {
		if (typeof window !== "undefined") {
			if (localStorage.getItem('florahlist')) {
				return JSON.parse(localStorage.getItem('florahlist'));
			}
		}
		return [];
	};

	const updateList = (hireIndex, hours) => {
		let list = [];
		if (typeof window !== "undefined") {
			if (localStorage.getItem('florahlist')) {
				list = JSON.parse(localStorage.getItem('florahlist'));
			}
			list[hireIndex].hours = hours;
			localStorage.setItem('florahlist', JSON.stringify(list));
		}
	};

	const removeHire = (hireIndex) => {
		let list = [];
		let status = false;
		if (typeof window !== "undefined") {
			if (localStorage.getItem('florahlist')) {
				list = JSON.parse(localStorage.getItem('florahlist'));
				list.splice(hireIndex, 1);
				localStorage.setItem('florahlist', JSON.stringify(list));
				Swal.fire({title: "Done!!",text: "Florist has been deleted from List!",timer: 6000,showConfirmButton: true,type: "success"});
			}
		}
	};

	const emptyList = ()=> {
		if(typeof window !== "undefined"){
			let listLength = hireTotal();
			if(listLength > 0){
				localStorage.removeItem('florahlist');
				setTimeout(listLoad,240);
			}
		}
	};
	const listStatus = () => {
		let listState = getList();
		let $hirenotif = $('.navbar-nav-right').find('.getList');
		let $hirenotify = $($hirenotif).find('.count');
			$hirenotify.html(listState.length);			
	};	
	
	
	const addToList = (hire) => {
		addHire(hire, () => {});
		listStatus();
	};

	let listHires = getList();
		listLoad();
		listStatus();

	const handleChange = index => event => {
		let updatedListHires = listHires;
		if(event.target.value == 0){
			updatedListHires[index].quantity = 1;
		}else{
			updatedListHires[index].quantity = event.target.value;
		}
		listHires = [...updatedListHires];
		updateList(index, event.target.value);
	};

	const deleteHire = (index) => {
		removeHire(index);
		setTimeout(listLoad,240);
		listStatus();		
	};

	const getTotal = () => {
		return listHires.reduce((a, b) => {
			return a + (b.hours*b.florist.rates)
		}, 0);
	};

    function listLoad(){
		let listHires = getList();
		let $hireslist = $('.list-section').find('.list');
		let $listheader = $($hireslist).find('.list-header');
			$listheader.html('You have <b>' + listHires.length  + '</b> hires in your list');
		let $hiresList = $($hireslist).find('.list-row');
		let name = "name",email = "email",rates = "rates",experience = "experience";
		let listView = [];
		let listTotal = 0; let totalHires = 0; let totalHours = 0;
		let $checkoutLink = $($hireslist).find('#btn-checkout-list');
		
		if (listHires.length == 0) {
				listView += '<div class="card mb-3 list-row"><div class="card-body"><div class="d-flex justify-content-between">';
				listView += '<h3 class="list-alert" hire="1">No Hires have been added to the List !!</h3></div></div></div>';
				$checkoutLink.addClass('disabled');
		}else{
			listView += '<div class="card mb-3 list-row"><div class="d-flex justify-content-between"><div class="d-flex flex-row align-items-center"><div class="ms-3"><div><h5>Details</h5></div></div></div>';
			listView += '<div class="d-flex flex-row align-items-center"><div class="number-input"><h5>Hours</h5></div><div class="hire-cost"><h5 class="mb-0">Cost</h5></div><a href="#!" id="hire-cancel" class="hire-cancel"></a></div></div>';
			for ( let a = 0; a < listHires.length; a++) {
				listView += '<div class="card mb-3"><div class="card-body"><div class="d-flex justify-content-between">';
				listView += '<div class="d-flex flex-row align-items-center"><div><img src=" ./images/florists/f1.jpg " class="img-fluid rounded-3" alt="Shopping hire" style="width: 65px;"></div>';
				listView += '<div class="ms-3"><h5>' + listHires[a].florist[name] + '</h5><p class="small mb-0">' + listHires[a].florist[email] + ' | ' + listHires[a].florist[experience] + '</p></div></div>';
				listView += '<div class="d-flex flex-row align-items-center"><div class="number-input"><button row="'+ a +'" id="list-btn-down" class="btn btn-minus px-2" ><i class="fas fa-minus"></i></button>';
				listView += '<input id="'+ a +'" min="0" name="hours" value=' + listHires[a].hours + ' type="number" class="form-control form-control-sm hours" /><button row="'+ a +'" id="list-btn-up" class="btn btn-plus px-2"><i class="fas fa-plus"></i></button></div>';
				listView += '<div class="hire-cost"><h5 class="mb-0">$' + listHires[a].hours * listHires[a].florist[rates]  + '</h5></div><a href="#!" id="hire-cancel" class="hire-cancel" hire="' + a +'"><i class="fas fa-trash-alt"></i></a></div></div></div></div><hr>';
				listTotal += listHires[a].hours * listHires[a].florist[rates];
				totalHours += listHires[a].hours;
			}
			listView += '</div>';
			$checkoutLink.removeClass('disabled');
		}
		$hiresList.replaceWith(listView);
		let $summaryHires = $($hireslist).find('.summary-hires');
			$summaryHires.html(listHires.length );
		let $summaryHours = $($hireslist).find('.summary-hours');
			$summaryHours.html( totalHours);
		let $summaryTotal = $($hireslist).find('.summary-total');
			$summaryTotal.html('$ ' + listTotal);			
		let $listSubtotal = $($hireslist).find('.list-subtotal');
			$listSubtotal.html('$ ' + listTotal);
		let $listTransport = $($hireslist).find('.list-transport');
			$listTransport.html('$ ' + 0.00);
		let totalinc = listTotal + 0.00;
		let $listTotalinc = $($hireslist).find('.list-totalinc');
			$listTotalinc.html('$ ' + totalinc);
		let $listGrandtotal = $($hireslist).find('.list-grandtotal');
			$listGrandtotal.html('$ ' + totalinc);		
	};
			
});
