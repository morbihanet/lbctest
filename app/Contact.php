<?php

namespace LBC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contact extends Model
{
    /** @var array */
    protected $guarded = ['id'];

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * @return HasMany
     */
    public function addressesRaw()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * @return mixed
     */
    public function addresses()
    {
        return $this->addressesRaw()->getResults();
    }
}
