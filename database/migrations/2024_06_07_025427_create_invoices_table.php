<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;






// "customer_name" => "required",
// "customer_address" => "required",
// "customer_email_address" => "required",
// "customer_contact_number" => "required", 
// "invoice_date" => "required",
// "payment_terms" => "required",
// "due_date" => "required",
// "services" => "required",


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string("customer_name");
            $table->string("customer_email_address");
            $table->string("customer_contact_number");
            $table->string("customer_address");
            $table->date("invoice_date");
            $table->date("due_date");
            $table->string("terms");
            $table->string("notes");
            $table->timestamps();
            $table->double("tax");
            $table->double("net_price");
            $table->double("total_price");
            $table->double("paid")->default(0);
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
