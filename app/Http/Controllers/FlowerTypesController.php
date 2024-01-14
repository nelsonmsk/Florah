<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;

use App\Models\FlowerType;


class FlowerTypesController extends Controller
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
				$flowerTypes = FlowerType::search($request->search_text)->SimplePaginate(15);
				return View('flowerTypes.pages.index',compact('flowerTypes'));	
				
			}catch(Exception $e){
				return View('flowerTypes.pages.index');
		   } 			
        }else{		
		    try{
				$flowerTypes = FlowerType::latest()->simplePaginate(15);//Get all FlowerTypes
				return View('flowerTypes.pages.index',compact('flowerTypes'));

			}catch(Exception $e){
				return View('flowerTypes.pages.index');
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
		return	View('flowerTypes.pages.create');
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
			$flowerType = new FlowerType();
			$data = $this->validate($request, [
				'name'=>'required|max:15',
			]);
	 
			$flowerType->saveFlowerType($data);
			$response = Response::json(['success' => ['message' => 'FlowerType has been created successfully.','data' => $flowerType,] ], 201); 

			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'FlowerType cannot be created, validation error!'] ], 422);
			
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
			$flowerType = FlowerType::findOrFail($id); //Find FlowerType of id = $id
			$status = '200';
			return View('flowerTypes.pages.show',compact('flowerType','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'FlowerType cannot be found.'] ], 404);
			
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
			$flowerType = FlowerType::where('id', $id)->first(); //Find the first result where FlowerType id = $id
			$status = '200';
			return View('flowerTypes.pages.edit',compact('flowerType','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'FlowerType cannot be found.'] ], 404);
			
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
			$flowerType = new FlowerType();
			$data = $this->validate($request, [
				'name'=>'required|max:15',
			]);
		    $data['id'] = $id;
			
			$flowerType->updateFlowerType($data);
			
			$response = Response::json(['success' => ['message' => 'FlowerType has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'FlowerType cannot be updated, validation error!'] ], 422);
			
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
			$flowerType = FlowerType::findOrFail($id); //Find FlowerType of id = $id
			$flowerType->delete();
			
			$response = Response::json(['success' => ['message' => 'FlowerType  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'FlowerType cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
		
}

