<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
   protected $fillable=['path','size','title','user_id'];

   /**
    * Upload belongs to User.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user()
   {
   	// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
   	return $this->belongsTo(User::class);
   }

   public function thumb()
   {
     return '/images/thumbs/'.$this->path;
   }

   public function cover()
   {
     return '/images/'.$this->path;
   }
}
