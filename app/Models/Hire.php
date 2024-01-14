<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Hire extends Model
{
    use HasFactory;
	use Searchable;
	
	protected $fillable = ['fromDate','fromTime','toDate','toTime','hireCost','hireDetails','florist_id','user_id'];

	public function saveHire($data)
	{
		$this->fromDate = $data['fromDate'];
		$this->fromTime = $data['fromTime'];
		$this->toDate = $data['toDate'];
		$this->toTime = $data['toTime'];	
		$this->hireCost = $data['hireCost'];
		$this->hireDetails = $data['hireDetails'];
		$this->status = $data['status'];		
		$this->florist_id = $data['florist_id'];		
		$this->user_id = auth()->user()->id;	
		$this->save();
			return 1;
	}

	public function updateHire($data)
	{
		$hr = $this::find($data['id']);
		$hr->fromDate = $data['fromDate'];
		$hr->fromTime = $data['fromTime'];	
		$hr->toDate = $data['toDate'];
		$hr->toTime = $data['toTime'];				
		$hr->hireCost = $data['hireCost'];
		$hr->hireDetails = $data['hireDetails'];
		$hr->status = $data['status'];		
		$hr->florist_id = $data['florist_id'];		
		$hr->user_id = auth()->user()->id;	
		$hr->save();
			return 1;
	}
	
	/**
     * Get the user that owns the hire.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
	
	/**
     * Get the florists that belong to the hire.
     */
    public function florists()
    {
        return $this->belongsToMany(Florist::class,'florists_hires','hires_id','florists_id');
    }
	
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'hire_index';
    }	

}