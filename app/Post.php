<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{

	use Searchable;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
	}
	
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function comment(){
    	return $this->hasMany(Comment::class);
    }
}
