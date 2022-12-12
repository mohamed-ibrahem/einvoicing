<?php

namespace App\Domains\Receipt\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rps.document_item';

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class, 'invn_sbs_item_sid', 'sid');
    }
}
