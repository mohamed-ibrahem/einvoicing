<?php

namespace App\Domains\Receipt\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Document extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rps.document';

    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'rps.document_item.doc_sid', 'rps.document.sid');
    }
}
