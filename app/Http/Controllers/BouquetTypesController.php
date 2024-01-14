<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;

use App\Models\BouquetType;


class BouquetTypesController extends Controller
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
				$bouquetTypes = BouquetType::search($request->search_text)->SimplePaginate(15);
				return View('bouquetTypes.pages.index',compact('bouquetTypes'));	
				
			}catch(Exception $e){
				return View('bouquetTypes.pages.index');
		   } 			
        }else{		
		    try{
				$bouquetTypes = BouquetType::latest()->simplePaginate(15);//Get all BouquetTypes
				return View('bouquetTypes.pages.index',compact('bouquetTypes'));

			}catch(Exception $e){
				return View('bouquetTypes.pages.index');
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
		return	View('bouquetTypes.pages.create');
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
			$bouquetType = new BouquetType();
			$data = $this->validate($request, [
				'name'=>'required|max:15',
			]);
	 
			$bouquetType->saveBouquetType($data);
			$response = Response::json(['success' => ['message' => 'BouquetType has been created successfully.','data' => $bouquetType,] ], 201); 

			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'BouquetType cannot be created, validation error!'] ], 422);
			
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
		try{
			$bouquetType = BouquetType::findOrFail($id); //Find BouquetType of id = $id
			$status = '200';
			return View('bouquetTypes.pages.show',compact('bouquetType','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'BouquetType cannot be found.'] ], 404);
			
			return 	$response;
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
			$bouquetType = BouquetType::where('id', $id)->first(); //Find the first result where BouquetType id = $id
			$status = '200';
			return View('bouquetTypes.pages.edit',compact('bouquetType','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'BouquetType cannot be found.'] ], 404);
			
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
			$bouquetType = new BouquetType();
			$data = $this->validate($request, [
				'name'=>'required|max:15',
			]);
		    $data['id'] = $id;
			
			$bouquetType->updateBouquetType($data);
			
			$response = Response::json(['success' => ['message' => 'BouquetType has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'BouquetType cannot be updated, validation error!'] ], 422);
			
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
			$bouquetType = BouquetType::findOrFail($id); //Find BouquetType of id = $id
			$bouquetType->delete();
			
			$response = Response::json(['success' => ['message' => 'BouquetType  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'BouquetType cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }

}
