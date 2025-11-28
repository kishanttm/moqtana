<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_order';

    protected $fillable = [
        'client_id',
        'service_type',
        'purpose_id',
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
        'is_submited',
        'created_by',
        'service_order_number',
        'order_id',
        'status',
        'delete_reason'
    ];

    protected $casts = [
        'has_other_owners' => 'boolean',
        'is_signed' => 'boolean',
        'is_submited' => 'boolean',
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
     * Get the articles (GJP items) associated with the service order.
     */
    public function articles()
    {
        return $this->hasMany(GjpItem::class, 'service_order_id');
    }

    public function purposeOfValuation()
    {
        return $this->belongsTo(PurposeOfValuation::class, 'purpose_id');
    }

    public function test()
    {
    return $this->hasOne(Test::class, 'service_order_id');    }
}
