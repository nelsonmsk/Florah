<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Response;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index(Request $request)
    {
		if($request->has('search_text')){	
		    try{		
				$orders = Order::Search($request->search_text)->SimplePaginate(15) ; //Get all orders
				$status = '200';
				return view('orders.pages.index',compact('orders','status'));
				
			}catch(Exception $e){
				return view('orders.pages.index');
		    }
		}else{
			if(Auth::user()->isAdmin()){
				try{		
					$orders = Order::latest()->simplePaginate(15) ; //Get all orders
					$status = "200";
					return view('orders.pages.index',compact('orders','status'));
					
				}catch(Exception $e){
					return view('orders.pages.index');
				}
			}else{
				try{	
					$user = Auth::user();
					$orders = $user->orders()->latest()->simplePaginate(15) ; //Get all orders by user
					$status = "200";
					return view('orders.pages.index',compact('orders','status'));
					
				}catch(Exception $e){
					return view('orders.pages.index');
				}				
			}
		}
   }
   
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			return View('orders.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		try{
			$order = new Order();
			$data = $this->validate($request, [	
				'items'=>'required|max:250',		
				'subTotal'=>'required|max:12',	
				'sRequest'=>'required|max:150',	
				'status'=>'required|max:12',				
			]);
		   
		    $date = Date("Y-m-d");
			$data['orderDate'] = $date;
			$data['sku'] = "";			
			$Order = new Order($data);
		   	//save the order
			$user->orders()->save($Order);
			//retrieve this order
			$order = $user->orders()->latest();
			if($request->flowerIds){
				$f_ids = $request->flowerIds;
				//attach to the pivot table
				$order->flowers()->attach($f_ids);	
			}
			if($request->bouquetIds){
				$b_ids = $request->bouquetIds;
				//attach to the pivot table
				$order->bouquetIds()->attach($b_ids);	
			}
			$response = Response::json(['success' => ['message' => 'Order has been created successfully.'] ], 201); 
			return  $response;	
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'Order cannot be created, validation error!'] ], 422);
			return 	$response;		
		}	
    } 
	

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		if(Auth::user()->isAdmin()){		
			try{
				$order = Order::findOrFail($id); //Find Service of id = $id
				$status = '200';
				return View('orders.pages.show',compact('order','status'));	
			}catch(Exception $e){
				$response = Response::json(['error' => ['message' => 'Order cannot be found.'] ], 404);
				return 	$response;
		   }
		}else{
			try{
				$user = Auth::user();				
				$order = $user->orders()->findOrFail($id); //Find Service of id = $id
				$status = '200';
				return View('orders.pages.show',compact('order','status'));	
			}catch(Exception $e){
				$response = Response::json(['error' => ['message' => 'Order cannot be found.'] ], 404);
				return 	$response;
		   }
		}
    }
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */	
  public function edit($id)
    {
		try{		
			$order = Order::where('id', $id)->first(); //Find the first result where Order id = $id
			$status = '200';
			return View('orders.pages.edit',compact('order','status'));
			
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'Order cannot be found.'] ], 404);
			return 	$response;
	   }
 
   }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		try{
			$order = new Order();
			$data = $this->validate($request, [
				'orderDate'=>'required|date',			
				'sku'=>'required',
				'items'=>'required|max:250',		
				'subTotal'=>'required|max:12',	
				'sRequest'=>'required|max:150',	
				'status'=>'required|max:12',				
				'user_id'=>'required',				
			]);
			
		    $data['id'] = $id;
			//Get the user who made the order
			$user = User::find($id);			
			//save the order
			$user->orders()->fill($data)->save;
			//get assigned id of this order
			$order = $user->orders()->latest();
			//update the pivot table
			if($request->flowerIds){
				$f_ids = $request->flowerIds;			
				$order->flowers()->updatedExistingPivot($f_ids);
			}
			if($request->bouquetIds){
				$b_ids = $request->bouquetIds;
				$order->flowers()->updatedExistingPivot($b_ids);		
			}			
			$response = Response::json(['success' => ['message' => 'Order has been updated.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Order cannot be updated, validation error!'] ], 422);
			
			return 	$response;		
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		try{
			$order = Order::findOrFail($id); //Find Order of id = $id	
			if($order->flowers()){
				//detach all the flowers from the order
				$order->flowers()->detach();
			}
			if($order->bouquets()){
				//detach all the bouquets from the order
				$order->bouquets()->detach();
			}			
			$order->delete();
			$response = Response::json(['success' => ['message' => 'Order has been deleted.'] ], 200); 
			return  $response;	
			
		}catch(Exception $e){			
			$response = Response::json(['error' => ['message' => 'Order cannot be found.'] ], 404);			
			return 	$response;		
		}			
    }

}
