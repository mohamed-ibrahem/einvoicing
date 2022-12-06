<?php

namespace App\Domains\Invoice\Models;

use App\Domains\Base\Models\Concerncs\HasDataObject;
use Database\Factories\InvoiceLineFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceLine extends Model
{
    use HasFactory;
    use HasDataObject;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'uuid', 'data',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'collection',
    ];

    /**
     * {@inheritDoc}
     *
     * @return InvoiceLineFactory
     */
    protected static function newFactory(): InvoiceLineFactory
    {
        return new InvoiceLineFactory();
    }

    /**
     * Get the associated invoice model.
     *
     * @return BelongsTo
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
