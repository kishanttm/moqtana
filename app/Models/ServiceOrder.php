<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $table = 'service_order';

    protected $fillable = [
        'client_id',
        'service_type',
        'purpose',
        'consultation',
        'has_other_owners',
        'how_many',
        'ownership_percentage',
        'government_referral',
        'other_use_of_report',
        'delivery_date',
        'comment',
        'previous_valuation_report',
        'is_signed',
        'e_signature_path',
        'is_submitted',
        'created_by',
    ];

    protected $casts = [
        'has_other_owners' => 'boolean',
        'is_signed' => 'boolean',
        'is_submitted' => 'boolean',
        'delivery_date' => 'date',
    ];

    /**
     * Get the client associated with the service order.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the creator of the service order (optional user relationship).
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the pictures associated with the service order.
     */
    public function pictures()
    {
        return $this->hasMany(ServiceOrderPicture::class);
    }
}
