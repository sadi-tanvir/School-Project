<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratePayslip extends Model
{
    use HasFactory;

    protected $table = "generate_payslips";
    protected $fillable = [
        "month",
        "year",
        "last_pay_date",
        "student_id",
        "class",
        "group",
        "pay_slip_type",
        "amount",
        "waiver",
        "payable",
        "voucher_number",
        "collect_date",
        "due_amount",
        "paid_amount",
        "waiver_approaved_by",
        "note",
        "payment_status",
        "school_code",
        "action",
    ];
}
