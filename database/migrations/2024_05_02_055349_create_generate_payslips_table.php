<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */


    public function up(): void
    {
        Schema::create('generate_payslips', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->string('year');
            $table->date('last_pay_date');
            $table->string('student_id');
            $table->string('class');
            $table->string('group');
            $table->string('pay_slip_type');
            $table->integer('amount');
            $table->integer('waiver');
            $table->integer('payable');
            $table->string('voucher_number')->nullable();
            $table->string('collect_date')->nullable();
            $table->integer('due_amount')->nullable();
            $table->integer('paid_amount')->nullable();
            $table->string('waiver_approaved_by')->nullable();
            $table->string('note')->nullable();
            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid');
            $table->string('school_code');
            $table->enum('action', ['approved', 'pending'])->default('approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generate_payslips');
    }
};
