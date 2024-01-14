<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use HasFactory; 
 	use Searchable;
	
	protected $fillable = ['orderDate','sku','items','subTotal','sRequest','status','user_id'];

	public function saveOrder($data)
	{
		$this->orderDate = $data['orderDate'];
		$this->sku = $data['sku'];	
		$this->items = $data['items'];
		$this->subTotal = $data['subTotal'];
		$this->sRequest = $data['sRequest'];
		$this->status = $data['status'];		
		$this->user_id = auth()->user()->id;
		$this->save();
			return 1;
	}

	public function updateOrder($data)
	{
		$od = $this::find($data['id']);
		$od->orderDate = $data['orderDate'];
		$od->sku = $data['sku'];	
		$od->items = $data['items'];
		$od->subTotal = $data['subTotal'];
		$od->sRequest = $data['sRequest'];
		$od->status = $data['status'];		
		$od->user_id = auth()->user()->id;
		$od->save();
			return 1;
	}

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
	
	/**
     * Get the flowers that belong to the order.
     */
    public function flowers()
    {
        return $this->belongsToMany(Flower::class,'flowers_orders','orders_id','flowers_id');
    }	
	
	/**
     * Get the bouquets that belong to the order.
     */
    public function bouquets()
    {
        return $this->belongsToMany(Bouquet::class,'bouquets_orders','orders_id','bouquets_id');
    }		
	
	
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'order_index';
    }	
}
