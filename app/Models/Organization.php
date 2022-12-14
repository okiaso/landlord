<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Concerns\HasUuids;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant;

class Organization extends Tenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    protected $table = "organizations";

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'plan',
            'name'
        ];
    }
}
