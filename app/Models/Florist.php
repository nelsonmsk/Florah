<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Florist extends Model
{
    use HasFactory;
	use Searchable;
	
	protected $fillable = ['name','email','phone','bio','experience','speciality','rates','username'];

	public function saveFlorist($data)
	{
		$this->name = $data['name'];
		$this->email = $data['email'];
		$this->phone = $data['phone'];
		$this->bio = $data['bio'];	
		$this->experience = $data['experience'];		
		$this->speciality = $data['speciality'];
		$this->rates = $data['rates'];		
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updateFlorist($data)
	{
		$fl = $this::find($data['id']);
		$fl->name = $data['name'];
		$fl->email = $data['email'];
		$fl->phone = $data['phone'];
		$fl->bio = $data['bio'];
		$fl->experience = $data['experience'];		
		$fl->speciality = $data['speciality'];
		$fl->rates = $data['rates'];			
		$fl->username = auth()->user()->name;	
		$fl->save();
			return 1;
	}
	
	/**
     * Get the hires that the florist belongs to.
     */
    public function hires()
    {
        return $this->belongsToMany(Hire::class,'florists_hires','florists_id','hires_id');
    }	
	
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'florist_index';
    }	
}