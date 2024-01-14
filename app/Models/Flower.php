<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Flower extends Model
{
    use HasFactory;
	use Searchable;
	
	protected $fillable = ['type','name','sku','description','price','username'];

	public function saveFlower($data)
	{
		$this->type = $data['type'];
		$this->name = $data['name'];
		$this->sku = $data['sku'];
		$this->description = $data['description'];		
		$this->price = $data['price'];	
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updateFlower($data)
	{
		$fl = $this::find($data['id']);
		$fl->type = $data['type'];
		$fl->name = $data['name'];
		$fl->sku = $data['sku'];
		$fl->description = $data['description'];		
		$fl->price = $data['price'];	
		$fl->username = auth()->user()->name;	
		$fl->save();
			return 1;
	}
	
	/**
     * Get the orders that the flower belongs to.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class,'flowers_orders','flowers_id','orders_id');
    }	
	
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'flower_index';
    }	
}
