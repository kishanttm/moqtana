<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_type',

        // Individual
        'individual_name',
        'national_id',
        'mobile_number',
        'individual_email',
        'address',
        'individual_documents',

        // Business
        'company_name',
        'unified_number',
        'vat_number',
        'address_business',
        'ceo_name',
        'ceo_email',
        'representative_name',
        'representative_mobile',
        'representative_email',
        'accountant_name',
        'accountant_mobile',
        'accountant_email',
        'documents',
        'company_logo',
    ];

    /**
     * Get formatted client name (for listing)
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->client_type === 'business'
            ? ($this->company_name ?? '—')
            : ($this->individual_name ?? '—');
    }

    /**
     * Accessor for document URL
     */
    public function getDocumentUrlAttribute(): ?string
    {
        if ($this->client_type === 'business' && $this->documents) {
            return asset('storage/' . $this->documents);
        }

        if ($this->client_type === 'individual' && $this->individual_documents) {
            return asset('storage/' . $this->individual_documents);
        }

        return null;
    }

    /**
     * Accessor for logo URL
     */
    public function getLogoUrlAttribute(): ?string
    {
        return $this->company_logo ? asset('storage/' . $this->company_logo) : null;
    }
}
