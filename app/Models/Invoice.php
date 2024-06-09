<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

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
}
