<?php

namespace App\Domains\Invoice\Policies;

use App\Domains\Invoice\Models\Invoice;
use App\Domains\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Invoice $invoice): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Invoice $invoice): bool
    {
        return ! $invoice->getData('status', false, 'response');
    }

    public function delete(User $user, Invoice $invoice): bool
    {
        return ! $invoice->getData('status', false, 'response');
    }

    public function restore(User $user, Invoice $invoice): bool
    {
        return false;
    }

    public function forceDelete(User $user, Invoice $invoice): bool
    {
        return false;
    }
}
