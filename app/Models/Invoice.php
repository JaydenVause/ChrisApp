<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invoice extends Model
{
    // Add this to the model to indicate the primary key type
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'customer_name',
        'customer_email_address',
        'customer_contact_number',
        'customer_address',
        'invoice_date',

        'due_date',
        'tax',
        'paid',
    ];

    // Optionally, you can add a boot method to generate the UUID
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
