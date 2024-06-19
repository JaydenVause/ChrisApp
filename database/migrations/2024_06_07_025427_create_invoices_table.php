<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("customer_name");
            $table->string("customer_email_address")->nullable();
            $table->string("customer_contact_number")->nullable();
            $table->string("customer_address");
            $table->date("invoice_date");
            $table->date("due_date");
            $table->string("terms")->nullable();
            $table->string("notes")->nullable();
            $table->timestamps();
            $table->double("tax");
            $table->double("net_price");
            $table->double("total_price");
            $table->double("paid")->default(0);
            $table->double("total_tax")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
