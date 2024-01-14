<?php

namespace App\Http\Controllers;

use App\Models\Bouquet;
use App\Models\BouquetType;
use App\Models\GalleryImage;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Response;

class BouquetsController extends Controller
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
				$bouquets = Bouquet::Search($request->search_text)->SimplePaginate(15) ; //Get all bouquets
				$status = '200';
				return view('bouquets.pages.index',compact('bouquets','status'));
				
			}catch(Exception $e){
				return view('bouquets.pages.index');
		    }
		}else{
		    try{
				$bouquetTypes = BouquetType::all();
				$bouquetsImages = GalleryImage::latest()->where('ref_class','Bouquets')->simplePaginate(15) ; //Get all flowers					
				$bouquets = Bouquet::latest()->simplePaginate(15) ; //Get all bouquets
				$status = '200';
				return view('bouquets.pages.index',compact('bouquets','bouquetTypes','bouquetsImages','status'));
				
			}catch(Exception $e){
				return view('bouquets.pages.index');
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
		$bouquetTypes = BouquetType::all();	
		return View('bouquets.pages.create',compact('bouquetTypes'));
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
			$bouquet = new Bouquet();
			$data = $this->validate($request, [
				'type'=>'required|max:60',			
				'name'=>'required|max:60',
				'sku'=>'required|max:30',		
				'description'=>'required|max:120',	
				'price'=>'required|max:9',				
			]);
		   
			$bouquet->saveBouquet($data);
			
			$response = Response::json(['success' => ['message' => 'Bouquet has been created successfully.'] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Bouquet cannot be created, validation error!'] ], 422);
			
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
			$bouquet = Bouquet::findOrFail($id); //Find Service of id = $id
			$galleryImage = GalleryImage::where('ref_class','Flowers')
											->where('ref_id',$id)->get();
			$status = '200';
			return View('bouquets.pages.show',compact('bouquet','galleryImage','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Bouquet cannot be found.'] ], 404);
			
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
			$bouquet = Bouquet::where('id', $id)->first(); //Find the first result where Bouquet id = $id
		    $bouquetTypes = BouquetType::all();			
			$status = '200';
			return View('bouquets.pages.edit',compact('bouquet','bouquetTypes','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Bouquet cannot be found.'] ], 404);
			
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
			$bouquet = new Bouquet();
			$data = $this->validate($request, [
				'type'=>'required|max:60',			
				'name'=>'required|max:60',
				'sku'=>'required|max:30',		
				'description'=>'required|max:120',	
				'price'=>'required|max:9',					
				'username'=>'required',				
			]);
			
		    $data['id'] = $id;
			
			$bouquet->updateBouquet($data);
			
			$response = Response::json(['success' => ['message' => 'Bouquet has been updated.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Bouquet cannot be updated, validation error!'] ], 422);
			
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
			$bouquet = Bouquet::findOrFail($id); //Find Bouquet of id = $id			
			$bouquet->delete();
			
			$response = Response::json(['success' => ['message' => 'Bouquet has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Bouquet cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }

}
