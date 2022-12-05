<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Domains\Branch\Models\Branch;
use App\Domains\Branch\Policies\BranchPolicy;
use App\Domains\Invoice\Models\Invoice;
use App\Domains\Invoice\Policies\InvoicePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Branch::class => BranchPolicy::class,
        Invoice::class => InvoicePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
