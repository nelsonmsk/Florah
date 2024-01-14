<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\FlowerType;
use App\Models\GalleryImage;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Response;


class FlowersController extends Controller
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
				$flowers = Flower::Search($request->search_text)->SimplePaginate(15) ; //Get all flowers
				$status = '200';
				return view('flowers.pages.index',compact('flowers','status'));
				
			}catch(Exception $e){
				return view('flowers.pages.index');
		    }
		}else{
		    try
			{
				$flowerTypes = FlowerType::all();
				$flowersImages = GalleryImage::latest()->where('ref_class','Flowers')->simplePaginate(15) ; //Get all flower Images				
				$flowers = Flower::latest()->simplePaginate(15) ; //Get all flowers
				$status = '200';
				return view('flowers.pages.index',compact('flowers','flowerTypes','flowersImages','status'));
				
			}catch(Exception $e){
				return view('flowers.pages.index');
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
		$flowerTypes = FlowerType::all();
		return View('flowers.pages.create',compact('flowerTypes'));
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
			$flower = new Flower();
			$data = $this->validate($request, [
				'type'=>'required|max:60',			
				'name'=>'required|max:60',
				'sku'=>'required|max:30',		
				'description'=>'required|max:120',	
				'price'=>'required|max:9',				
			]);
		   
			$flower->saveFlower($data);
			
			$response = Response::json(['success' => ['message' => 'Flower has been created successfully.'] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Flower cannot be created, validation error!'] ], 422);
			
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
			$flower = Flower::findOrFail($id); //Find Flower of id = $id
			$galleryImage = GalleryImage::where('ref_class','Flowers')
											->where('ref_id',$id)->get();
			$status = '200';
			return View('flowers.pages.show',compact('flower','galleryImage','status'));
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Flower cannot be found.'] ], 404);
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
			$flower = Flower::where('id', $id)->first(); //Find the first result where Flower id = $id
		    $flowerTypes = FlowerType::all();			
			$status = '200';
			return View('flowers.pages.edit',compact('flower','flowerTypes','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Flower cannot be found.'] ], 404);
			
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
			$flower = new Flower();
			$data = $this->validate($request, [
				'type'=>'required|max:60',			
				'name'=>'required|max:60',
				'sku'=>'required|max:30',		
				'description'=>'required|max:120',	
				'price'=>'required|max:9',					
				'username'=>'required',				
			]);
			
		    $data['id'] = $id;
			
			$flower->updateFlower($data);
			
			$response = Response::json(['success' => ['message' => 'Flower has been updated.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Flower cannot be updated, validation error!'] ], 422);
			
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
			$flower = Flower::findOrFail($id); //Find Flower of id = $id			
			$flower->delete();
			
			$response = Response::json(['success' => ['message' => 'Flower has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Flower cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }

}
