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
        "class_position",
        "group",
        "class_position",
        "section",
        "category",
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
        "collected_by_name",
        "collected_by_email",
        "collected_by_phone",
        "payment_status",
        "school_code",
        "action",
    ];
}
