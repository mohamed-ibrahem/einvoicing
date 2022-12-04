<?php

namespace App\Domains\Invoice\Models;

use App\Domains\Base\Models\Concerncs\HasDataObject;
use App\Domains\Branch\Concerns\BelongsToBranch;
use Database\Factories\InvoiceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;
    use BelongsToBranch;
    use HasDataObject;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'uuid', 'branch_id', 'data', 'response',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'collection',
        'response' => 'collection',
    ];

    /**
     * @inheritDoc
     * @return InvoiceFactory
     */
    protected static function newFactory(): InvoiceFactory
    {
        return new InvoiceFactory();
    }

    /**
     * Get the invoice lines collection.
     *
     * @return HasMany
     */
    public function invoiceLines(): HasMany
    {
        return $this->hasMany(InvoiceLine::class);
    }
}
