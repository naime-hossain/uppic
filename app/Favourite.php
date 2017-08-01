<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['ip_address','upload_id'];

    /**
     * Favourite belongs to Upload.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function upload()
    {
    	// belongsTo(RelatedModel, foreignKey = upload_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Upload::class);
    }
}
