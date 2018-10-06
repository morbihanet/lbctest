<?php

namespace LBC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    /** @var array */
    protected $guarded = ['id'];

    /**
     * @return mixed
     */
    public function contactRaw()
    {
        return $this->contact()->getResults();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->contact()->user();
    }
}
