<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class BouquetType extends Model
{
    use HasFactory;
	use Searchable;
	
	protected $fillable = ['name'];

	public function saveBouquetType($data)
	{
		$this->name = $data['name'];	
		$this->save();
			return 1;
	}

	public function updateBouquetType($data)
	{
		$sv = $this::find($data['id']);
		$sv->name = $data['name'];	
		$sv->save();
			return 1;
	}
	
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'bouquetType_index';
    }	
}
