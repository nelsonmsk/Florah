<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\User;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Response;

class HiresController extends Controller
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
				$hires = Hire::Search($request->search_text)->SimplePaginate(15) ; //Get all hires
				$status = "200";
				return view('hires.pages.index',compact('hires','status'));
				
			}catch(Exception $e){
				return view('hires.pages.index');
		    }
		}else{
			if(Auth::user()->isAdmin()){
				try{		
					$hires = Hire::latest()->simplePaginate(15) ; //Get all hires
					$status = "200";
					return view('hires.pages.index',compact('hires','status'));
					
				}catch(Exception $e){
					return view('hires.pages.index');
				}
			}else{
				try{	
					$user = Auth::user();
					$hires = $user->hires()->latest()->simplePaginate(15) ; //Get all hires by user
					$status = "200";
					return view('hires.pages.index',compact('hires','status'));
					
				}catch(Exception $e){
					return view('hires.pages.index');
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
			return View('hires.pages.create');
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
			$data = $this->validate($request, [
				'fromDate'=>'required|date|before:toDate',			
				'fromTime'=>'required',
				'toDate'=>'required|date|after:fromDate',			
				'toTime'=>'required',
				'hireCost'=>'required|max:9',		
				'hireDetails'=>'required|max:120',
				'status'=>'required|max:12',					
			]);
		   
		   $Hire = new Hire($data);
		   	//save the hire
			$user->hires()->save($Hire);
			//retrieve this hire
			$hire = $user->hires()->latest();
			if($request->floristIds){
				$ids = $request->floristIds;
				//attach to the pivot table
				$hire->florists()->attach($ids);
			}
			$response = Response::json(['success' => ['message' => 'Hire has been created successfully.'] ], 201); 
			return  $response;	
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'Hire cannot be created, validation error!'] ], 422);
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
				$hire = Hire::findOrFail($id); //Find Service of id = $id
				$status = '200';
				return View('hires.pages.show',compact('hire','status'));
			}catch(Exception $e){
				$response = Response::json(['error' => ['message' => 'Hire cannot be found.'] ], 404);	
				return 	$response;
		   }
		}else{
			try{
				$user = Auth::user();
				$hire = $user->hires()->findOrFail($id); //Find Service of id = $id
				$status = '200';
				return View('hires.pages.show',compact('hire','status'));
			}catch(Exception $e){
				$response = Response::json(['error' => ['message' => 'Hire cannot be found.'] ], 404);	
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
			$hire = Hire::where('id', $id)->first(); //Find the first result where Hire id = $id
			$status = '200';
			return View('hires.pages.edit',compact('hire','status'));
			
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'Hire cannot be found.'] ], 404);
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
			$data = $this->validate($request, [
				'fromDate'=>'required|date|before:toDate',			
				'fromTime'=>'required',
				'toDate'=>'required|date|after:fromDate',			
				'toTime'=>'required',
				'hireCost'=>'required|max:9',		
				'hireDetails'=>'required|max:120',
				'status'=>'required|max:12',						
				'user_id'=>'required',				
			]);
			
		    $data['id'] = $id;
			//Get the user who made the hire
			$user = User::find($id);			
			//save the hire
			$user->hires()->fill($data)->save;
			//get assigned id of this hire
			$hire = $user->hires()->latest();
			if($request->floristIds){
				//attach to the pivot table
				$ids = $request->floristIds;			
				$hire->florists()->updatedExistingPivot($ids);
			}
			$response = Response::json(['success' => ['message' => 'Hire has been updated.'] ], 200); 	
			return  $response;	
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'Hire cannot be updated, validation error!'] ], 422);
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
			$hire = Hire::findOrFail($id); //Find Hire of id = $id		
			//detach all the florists from the hire
			$hire->florists()->detach();			
			$hire->delete();
			$response = Response::json(['success' => ['message' => 'Hire has been deleted.'] ], 200); 
			return  $response;	
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'Hire cannot be found.'] ], 404);
			return 	$response;		
		}			
    }

}

