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

   /**
    * Upload has many Favourites.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function favourites()
   {
     // hasMany(RelatedModel, foreignKeyOnRelatedModel = upload_id, localKey = id)
     return $this->hasMany(Favourite::class);
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
