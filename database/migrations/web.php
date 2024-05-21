<?php

use App\Http\Controllers\Backend\AdmitCard\AddAdmitCardController;
use App\Http\Controllers\Backend\CommonSetting\AddAcademicSessionController;
use App\Http\Controllers\Backend\CommonSetting\AddAcademicYearController;
use App\Http\Controllers\Backend\CommonSetting\AddBoardExamController;
use App\Http\Controllers\Backend\CommonSetting\AddCategoryController;
use App\Http\Controllers\Backend\CommonSetting\AddClassController;
use App\Http\Controllers\Backend\CommonSetting\AddClassExamController;
use App\Http\Controllers\Backend\CommonSetting\AddClassWiseGroupController;
use App\Http\Controllers\Backend\CommonSetting\AddClassWiseSectionController;
use App\Http\Controllers\Backend\CommonSetting\AddClassWiseShiftController;

use App\Http\Controllers\Backend\CommonSetting\AddGroupController;
use App\Http\Controllers\Backend\CommonSetting\AddPeriodController;
use App\Http\Controllers\Backend\CommonSetting\AddSectionController;
use App\Http\Controllers\Backend\CommonSetting\AddShiftController;
use App\Http\Controllers\Backend\CommonSetting\AddSubjectController;
use App\Http\Controllers\Backend\CommonSetting\AddSubjectSetupController;

use App\Http\Controllers\Backend\CommonSetting\InstituteInfoController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\ExamResult\MarkInputController;
use App\Http\Controllers\Backend\ExamSetting\FourthSubjectController;
use App\Http\Controllers\Backend\NEDUBD\NEDUBDController;
use App\Http\Controllers\Backend\NEDUBD\SchoolAdminController;
use App\Http\Controllers\Backend\Student\StudentController;
use App\Http\Controllers\Backend\Student\UpdateStudentBasicInfoController;
use App\Http\Controllers\Backend\Student\UpdateStudentClassInfoController;
use App\Http\Controllers\Backend\Student\StudentProfileUpdateController;
use App\Http\Controllers\Backend\Student\UploadPhotoController;
use App\Http\Controllers\Backend\Student\MigrateStudentController;
use App\Http\Controllers\Backend\Student\UpdateStudentController;
use App\Http\Controllers\Backend\Student\BasicAddStudentController;
use App\Http\Controllers\Backend\Student\studentReports\StudentDetailsController;
use App\Http\Controllers\Backend\Student\studentReports\addShortListController;
use App\Http\Controllers\Backend\Student\studentReports\StudentListWithPhotoController;
use App\Http\Controllers\Backend\Student\studentReports\EsifListController;
use App\Http\Controllers\Backend\Student\UploadExcelFileController;

// Online Application
use App\Http\Controllers\Backend\OnlineApplication\ListOfApplicantController;


// student accounts
use App\Http\Controllers\Backend\Student_Account\PaySlipCollectionController;
use App\Http\Controllers\Backend\Student_Account\PrintUnpaidPaySlipController;
use App\Http\Controllers\Backend\Student_Account\CollectUnpaidPaySlipController;
use App\Http\Controllers\Backend\Student_Account\DeletePaySlipController;
use App\Http\Controllers\Backend\Student_Account\NewStdAddPaySlipController;
use App\Http\Controllers\Backend\Student_Account\NewOldStdAddPaySlipController;
// generate pay slips
use App\Http\Controllers\Backend\Student_Account\GeneratePayslipController;

use App\Http\Controllers\Backend\Student_Account\EditGeneratedPayslipController;
use App\Http\Controllers\Backend\Student_Account\GenerateMultiplePayslipController;
use App\Http\Controllers\Backend\Student_Account\QuickCollectionController;
// Student Accounts => Others
use App\Http\Controllers\Backend\Student_Account\Others\FromFeeController;
use App\Http\Controllers\Backend\Student_Account\Others\DonationController;
use App\Http\Controllers\Backend\Student_Account\Others\OthersFeeController;
use App\Http\Controllers\Backend\Student_Account\Others\FineFailController;
// Student Accounts => Others
use App\Http\Controllers\Backend\Student_Account\Reports\DailyCollectionReportController;
use App\Http\Controllers\Backend\Student_Account\Reports\geneTranferInquiriController;
use App\Http\Controllers\Backend\Student_Account\Reports\DuePaySummaryController;
use App\Http\Controllers\Backend\Student_Account\Reports\HeadWiseSummaryController;
use App\Http\Controllers\Backend\Student_Account\Reports\TransferToAccountsController;
use App\Http\Controllers\Backend\Student_Account\Reports\PaidInvoiceController;
use App\Http\Controllers\Backend\Student_Account\Reports\OuthTransInquiryController;
use App\Http\Controllers\Backend\Student_Account\Reports\ListOfDueOrPayController;
use App\Http\Controllers\Backend\Student_Account\Reports\ListOfHeadWiseController;
use App\Http\Controllers\Backend\Student_Account\Reports\ListOfMonthWiseFeesController;
use App\Http\Controllers\Backend\Student_Account\Reports\ListOfSepecialDiscountController;
use App\Http\Controllers\Backend\Student_Account\Reports\ListOfFineOrFailOrAbsentController;
use App\Http\Controllers\Backend\Student_Account\Reports\ListOfDonationController;
use App\Http\Controllers\Backend\Student_Account\Reports\ListOfFormFeesController;
use App\Http\Controllers\Backend\Student_Account\Reports\MonthlyPaidDetailsController;


use App\Http\Controllers\Backend\Teacher\TeacherController;
use App\Http\Controllers\Frontend\Auth\AuthController;
use App\Http\Controllers\Backend\ExamResult\ExamResultController;
use App\Http\Controllers\Backend\ExamResult\ExamProcessController;


// Basic Setting => Fees Setting
use App\Http\Controllers\Backend\FeesSetting\AddFeeTypeController;
use App\Http\Controllers\Backend\FeesSetting\FeesSetupController;
use App\Http\Controllers\Backend\FeesSetting\AddPaySlipTypeController;
use App\Http\Controllers\Backend\FeesSetting\PaySlipSetupController;
use App\Http\Controllers\Backend\FeesSetting\WaiverTypeController;
use App\Http\Controllers\Backend\FeesSetting\WaiverSetupController;
use App\Http\Controllers\Backend\FeesSetting\ReportFeesSettings\AllFeesController;
use App\Http\Controllers\Backend\FeesSetting\ReportFeesSettings\AllPaySlipController;
use App\Http\Controllers\Backend\FeesSetting\ReportFeesSettings\IndividualPaySlipController;
use App\Http\Controllers\Backend\FeesSetting\ReportFeesSettings\IndividualWaiverController;
// Basic Setting => Exam Setting
use App\Http\Controllers\Backend\ExamSetting\AddGradePointController;
use App\Http\Controllers\Backend\ExamSetting\AddShortCodeController;
use App\Http\Controllers\Backend\ExamSetting\GradeSetupController;
use App\Http\Controllers\Backend\ExamSetting\SetExamMarksController;
use App\Http\Controllers\Backend\ExamSetting\SetShortCodeController;
use App\Http\Controllers\Backend\ExamSetting\AddReportNameController;
use App\Http\Controllers\Backend\ExamSetting\AddSignatureController;
use App\Http\Controllers\Backend\ExamSetting\ExamPublishController;
use App\Http\Controllers\Backend\ExamSetting\SetGrandFinalController;
use App\Http\Controllers\Backend\ExamSetting\SequentialWiseExamController;
use App\Http\Controllers\Backend\ExamSetting\SetSignatureController;
use App\Http\Controllers\Backend\ExamSetting\ViewExamPublishController;
use App\Http\Controllers\Backend\ExamSetting\ViewExamMarkSetUpController;

use App\Http\Controllers\Backend\GrandFinal\GrandFinalController;
use App\Http\Controllers\Backend\GrandFinal\GrandFinalListController;

use App\Http\Controllers\Backend\Message\AddContactController;
use App\Http\Controllers\Backend\Message\SendMSGController;
use App\Http\Controllers\Backend\Message\ExcelMSGController;
use App\Http\Controllers\Backend\Message\AddMsgController;

use App\Http\Controllers\Backend\ReportsExamsReports\ReportsExamsReportsController;
use App\Http\Controllers\Backend\AdmitCard\SetAdmitCardController;
use App\Http\Controllers\Backend\AdmitCard\PrintAdmitCardController;
use App\Http\Controllers\Backend\AdmitCard\PrintSeatPlanController;
use App\Http\Controllers\Backend\AdmitCard\AddAdmitInstructionController;
use App\Http\Controllers\Backend\AdmitCard\ListAdminInstructionController;
use App\Http\Controllers\Backend\AdmitCard\ExamBlankSheetController;
use App\Http\Controllers\Backend\StudentAttendence\AttendenceController;
use App\Http\Controllers\Backend\ReportStudentAttendence\ReportStudentAttendenceController;
use App\Http\Controllers\Backend\Student\StudentReports\admissionSummaryController;
use App\Http\Controllers\Backend\Student\StudentReports\classSectionSTdTotalController;
use App\Http\Controllers\Backend\Student\StudentReports\listOfMigrateStudentListController;
use App\Http\Controllers\Backend\Student\StudentReports\religionWiseStudentSummaryController;
use App\Http\Controllers\Backend\Student\StudentReports\studentIdCardController;
use App\Http\Controllers\Backend\Student\StudentReports\StudentProfileController;
use App\Http\Controllers\Backend\Student\StudentReports\testimonialController;
use App\Http\Controllers\Backend\Student\StudentReports\trasnferCertificateController;
use App\Http\Controllers\Backend\Student\StudentReports\trasnferCertificateListController;


// General Accounts
use App\Http\Controllers\Backend\GeneralAccounts\CashPaymentVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\CashReceiptVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\BankPaymentVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\BankReceiptVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\JournalVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\ContraVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\VoucherPostingController;
// General Accounts => Reports (General Accounts)
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\AccountsVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\CashBookController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\BankBookController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\JournalBookController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\IncomeExpenseSummaryController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\TrialBalanceController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\BalanceSheetController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\IncomeStatementController;
// General Accounts => MyAccount
use App\Http\Controllers\Backend\GeneralAccounts\MyAccount\CurrentBalanceController;
use App\Http\Controllers\Backend\GeneralAccounts\MyAccount\PersonalStatementController;
use App\Http\Controllers\Backend\GeneralAccounts\MyAccount\AllStatementController;


// Assessment
use App\Http\Controllers\Backend\Assessment\AssessmentInputController;
// Assessment => Basic Setting
use App\Http\Controllers\Backend\Assessment\BasicSetting\ParadarsitaSuchokController;
use App\Http\Controllers\Backend\Assessment\BasicSetting\ParadarsitaSuchokExcelController;
use App\Http\Controllers\Backend\Assessment\BasicSetting\ParadarsitaSuchokMatraController;
use App\Http\Controllers\Backend\Assessment\BasicSetting\ParadarsitaSuchokMatra_2_Controller;
use App\Http\Controllers\Backend\Assessment\BasicSetting\AddNoipunnoNameController;
use App\Http\Controllers\Backend\Assessment\BasicSetting\SetupAssParadarsitaNoipunnoController;
use App\Http\Controllers\Backend\Assessment\BasicSetting\ParadarsitaSuchokExamController;
// Assessment => Assessment Reports
use App\Http\Controllers\Backend\Assessment\AssessmentReports\SubjectWiseReportController;
use App\Http\Controllers\Backend\Assessment\AssessmentReports\AllSubjectWiseController;
use App\Http\Controllers\Backend\Assessment\AssessmentReports\NoipunnoReportController;
use App\Http\Controllers\Backend\Assessment\AssessmentReports\NoipunnoAllSubjectController;
use App\Http\Controllers\Backend\Assessment\AssessmentReports\NoipunnoMullaonPrintController;
use App\Http\Controllers\Backend\Assessment\AssessmentReports\NoipunnoBIController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login-user', [AuthController::class, 'loginUser'])->name('login-user');



Route::prefix('dashboard')->group(function () {
    Route::get('/{schoolCode}', [DashboardController::class, 'index'])->name('dashboard.index');
    // NEDUBD Module
    Route::get('/addAdmin/{schoolCode}', [NEDUBDController::class, 'addAdmin']);
    Route::post('/create-admin', [NEDUBDController::class, 'createAdmin'])->name('admin.add');
    Route::get('/addSchoolInfo/{schoolCode}', [NEDUBDController::class, 'addSchoolInfo']);
    Route::post('/create-schoolInfo', [NEDUBDController::class, 'createSchoolInfo'])->name('schoolInfo.add');



    // Online Application
    Route::get('/onlineApplication/listOfApplicant/{schoolCode}', [ListOfApplicantController::class, 'ListOfApplicantView'])->name("listOfApplicant.view");
    Route::get('/onlineApplication/onlineApplicationForm/{schoolCode}', [ListOfApplicantController::class, 'OnlineApplicationForm'])->name("onlineApplicationForm.view");
    Route::get('/onlineApplication/blankApplicationForm/{schoolCode}', [ListOfApplicantController::class, 'BlankApplicationForm'])->name("blankApplicationForm.view");
    Route::get('/onlineApplication/reportApplication/{schoolCode}', [ListOfApplicantController::class, 'ReportApplicationView'])->name("reportApplication.view");


    // student module
    Route::post('/create-student', [StudentController::class, 'addStudent'])->name('student.add');
    Route::get('/add-student/{schoolCode}', [StudentController::class, 'AddStudentForm'])->name('AddStudentForm');



    //Update Student Basdic Info

    Route::get('/updateStudentBasicInfo/{schoolCode}', [UpdateStudentBasicInfoController::class, 'updateStudentBasicInfo'])->name('updateStudentBasicInfo');
    Route::get('/getData/{schoolCode}', [UpdateStudentBasicInfoController::class, 'getData'])->name('getData');
    Route::put('/updateData/{schoolCode}', [UpdateStudentBasicInfoController::class, 'updateStudentBasic'])->name('updateStudent');


    //Update student Student Class Info
    Route::get('/studentClassInfo/{schoolCode}', [UpdateStudentClassInfoController::class, 'studentClassInfo'])->name('studentClassInfo');
    Route::get('/getStudentClassData/{schoolCode}', [UpdateStudentClassInfoController::class, 'getStudentClassData'])->name('getStudentClassData');
    Route::put('/updateStudentClass/{schoolCode}', [UpdateStudentClassInfoController::class, 'updateStudentClass'])->name('updateStudentClass');
    Route::delete('/deleteStudent/{schoolCode}/{ids}', [UpdateStudentClassInfoController::class, 'delete'])->name('deleteStudent');


    //update student profile
    Route::get('/studentProfileUpdate/{schoolCode}', [StudentProfileUpdateController::class, 'studentProfileUpdate'])->name('studentProfileUpdate');
    Route::get('/findData/{schoolCode}', [StudentProfileUpdateController::class, 'findData'])->name('studentData');

    //Update Student ->Add Student
    Route::get('/getStudent/{schoolCode}', [BasicAddStudentController::class, 'getStudent'])->name('getStudent');
    Route::post('/postStudent', [BasicAddStudentController::class, 'postStudent'])->name('postStudent');


    //update student
    Route::get('/student_update/{id}/{schoolCode}', [UpdateStudentController::class, 'student_update'])->name('student_update');
    Route::put('/students/{id}', [UpdateStudentController::class, 'updateStudent'])->name('students.update');

    //update student ExcelFile
    Route::get('/uploadExelFile/{schoolCode}', [UploadExcelFileController::class, 'uploadExelFile'])->name('uploadExelFile');
    Route::get('/download-demo/{schoolCode}', [UploadExcelFileController::class, 'downloadDemo'])->name('download.demo');
    Route::post('/upload-excel', [UploadExcelFileController::class, 'uploadExcel'])->name('upload.excel');


    //upload photo student
    Route::get('/uploadStudentPhoto/{schoolCode}', [UploadPhotoController::class, 'uploadStudentPhoto'])->name('StudentPhoto');
    Route::post('/updatePhoto/{schoolCode}', [UploadPhotoController::class, 'updatePhoto'])->name('updatePhoto');
    Route::post('/update-student-image/{schoolCode}/{id}', [UploadPhotoController::class, 'updateImage'])->name('update.student.image');
    Route::get('/uploadPhoto/{schoolCode}', [UploadPhotoController::class, 'uploadPhoto'])->name('uploadPhoto');




    //Migrate Student
    Route::get('/migrateStudent/{schoolCode}', [MigrateStudentController::class, 'migrateStudent'])->name('migrateStudent');






    // Student Report

    Route::get('/admissionSummary/{schoolCode}', [admissionSummaryController::class, 'admission_summary'])->name('admissionSummary');

    Route::get('/admissionSummaryDownload/{schoolCode}', [admissionSummaryController::class, 'addmission_summary_download']);

    Route::post('/admissionSummaryDownload/{schoolCode}', [admissionSummaryController::class, 'downloadAdmisionSummaryPdf'])->name('admissionSummaryDownload');






    Route::get('/classSectionSTdTotal/{schoolCode}', [classSectionSTdTotalController::class, 'classSectionSTdTotal'])->name('classSectionSTdTotal');

    Route::get('/classSectionStdtotalDownload/{schoolCode}', [classSectionSTdTotalController::class, 'classSectionStdTotalDownloadpdf']);

    Route::post('/classSectionStdtotalDownload/{schoolCode}', [classSectionSTdTotalController::class, 'classSectionStdTotalDownloadpdf'])->name('classSectionStdTotalDownload');





    Route::get('/e_sifLists/{schoolCode}', [EsifListController::class, 'e_sifList']);
    Route::get('/listOfMigrateStudent/{schoolCode}', [listOfMigrateStudentListController::class, 'listOfMigrateStudent']);
    Route::get('/religionWiseStudentSummary/{schoolCode}', [religionWiseStudentSummaryController::class, 'religion_wise_student_summary']);
    Route::get('/studentDetails/{schoolCode}', [StudentDetailsController::class, 'studentDetails']);

    Route::get('/getStudentID/{schoolCode}/{class}', [StudentDetailsController::class, 'getStudentID']);
    Route::post('/StudentDetailsPrint/{schoolCode}', [StudentDetailsController::class, 'StudentDetailsPrint'])->name('StudentDetailsPrint');

    Route::get('/studentIdCard/{schoolCode}', [studentIdCardController::class, 'student_id_card']);

    Route::get('/studentListWithPhoto/{schoolCode}', [StudentListWithPhotoController::class, 'studentListWithPhoto'])->name('studentListWithPhoto');
    Route::post('/listStudent', [StudentListWithPhotoController::class, 'viewStudentListPhoto'])->name('viewStudentListPhoto');


    Route::get('/studentProfile/{schoolCode}', [StudentProfileController::class, 'student_profile']);
    Route::get('/studentShortList/{schoolCode}', [addShortListController::class, 'studentShortList']);
    Route::post('/viewStudentShortList', [addShortListController::class, 'viewStudentShortList'])->name('viewStudentShortList');
    Route::get('/testimonial/{schoolCode}', [testimonialController::class, 'testimonial']);
    Route::get('/transferCertificate/{schoolCode}', [trasnferCertificateController::class, 'trasnfer_certificate']);
    Route::get('/transferCertificateList/{schoolCode}', [trasnferCertificateListController::class, 'trasnfer_certificate_list']);




    //Students Accounts
    // Payslip Collection
    Route::get("/studentAccounts/paySlipCollection/{schoolCode}", [PaySlipCollectionController::class, "PaySlipForm"])->name("paySlipCollection.view");
    Route::get("/studentAccounts/paySlipCollection/getStudentRoll/{schoolCode}", [PaySlipCollectionController::class, "GetStudentRoll"])->name("StudentRoll.get");
    Route::get("/studentAccounts/paySlipCollection/studentWisePaySlips/{schoolCode}", [PaySlipCollectionController::class, "StudentWisePaySlips"])->name("sutentPaySlips.get");
    Route::post("/studentAccounts/paySlipCollection/storePaySlipData/{schoolCode}", [PaySlipCollectionController::class, "StorePaySlipData"])->name("paySlipData.store");

    Route::get("/studentAccounts/quickCollection/{schoolCode}", [QuickCollectionController::class, "QuickCollectionView"])->name("quickCollection.view");
    Route::get("/studentAccounts/printUnpaidPaySlip/{schoolCode}", [PrintUnpaidPaySlipController::class, "PrintUnpaidPaySlipForm"])->name("printUnpaidPaySlip.view");
    Route::get("/studentAccounts/collectUnpaidPaySlip/{schoolCode}", [CollectUnpaidPaySlipController::class, "CollectUnpaidPaySlipView"])->name("collectUnpaidPaySlip.view");
    Route::get("/studentAccounts/deletePaySlip/{schoolCode}", [DeletePaySlipController::class, "DeletePaySlipView"])->name("deletePaySlip.view");
    Route::get("/studentAccounts/newStdAddPaySlip/{schoolCode}", [NewStdAddPaySlipController::class, "NewStdAddPaySlipView"])->name("newStdAddPaySlip.view");
    Route::get("/studentAccounts/newOldStdAddPaySlip/{schoolCode}", [NewOldStdAddPaySlipController::class, "NewOldStdAddPaySlipView"])->name("newOldStdAddPaySlip.view");
    // Generate payslips
    Route::get("/studentAccounts/generatePayslip/{schoolCode}", [GeneratePayslipController::class, "GeneratePayslipView"])->name("generatePayslip.view");
    Route::get("/studentAccounts/getPaySlipData/{schoolCode}", [GeneratePayslipController::class, "GetPaySlipData"])->name("PaySlipData.get");
    Route::get("/studentAccounts/getFeeDataTypes/{schoolCode}", [GeneratePayslipController::class, "GetFeeDataTypes"])->name("feeDataTypes.get");
    Route::get("/studentAccounts/getAllInformation/{schoolCode}", [GeneratePayslipController::class, "GetAllInformation"])->name("AllInformation.get");
    Route::post("/studentAccounts/storeGeneratePaySlip/{schoolCode}", [GeneratePayslipController::class, "StoreGeneratePaySlip"])->name("generatePaySlip.store");

    Route::get("/studentAccounts/editGeneratedPayslip/{schoolCode}", [EditGeneratedPayslipController::class, "EditGeneratedPayslipView"])->name("editGeneratedPayslip.view");
    // Generate multiple payslips
    Route::get("/studentAccounts/generateMultiplePayslip/{schoolCode}", [GenerateMultiplePayslipController::class, "GenerateMultiplePayslipView"])->name("generateMultiplePayslip.view");
    Route::get("/studentAccounts/getStudentInformation/{schoolCode}", [GenerateMultiplePayslipController::class, "GetStudentInformation"])->name("studentInformation.get");
    Route::get("/studentAccounts/storeMultiplePayslipData/{schoolCode}", [GenerateMultiplePayslipController::class, "StoreMultiplePayslipData"])->name("multiplePayslipData.store");
    //others
    Route::get('/FeeCollection/{schoolCode}', [FromFeeController::class, 'AddFromFee'])->name('feeCollection');
    Route::get('/donation/{schoolCode}', [DonationController::class, 'AddDonationFee'])->name('donation');
    Route::get('/othersFee/{schoolCode}', [OthersFeeController::class, 'AddOthersFee'])->name('othersFee');
    Route::get('/addFineFail/{schoolCode}', [FineFailController::class, 'AddFineFail'])->name('addFineFail');
    //reports
    Route::get('/DailyCollectionReport/{schoolCode}', [DailyCollectionReportController::class, 'DailyCollectionReport'])->name('DailyCollectionReport');
    Route::get('/geneTransferInquiri/{schoolCode}', [geneTranferInquiriController::class, 'geneTransferInquiri'])->name('geneTransferInquiri');
    Route::get('/DuepaySummary/{schoolCode}', [DuePaySummaryController::class, 'DuepaySummary'])->name('DuepaySummary');
    Route::get('/headwiseSummary/{schoolCode}', [HeadWiseSummaryController::class, 'headwiseSummary'])->name('headwiseSummary');
    Route::get('/transferToAccounts/{schoolCode}', [TransferToAccountsController::class, 'transferToAccounts'])->name('transferToAccounts');
    Route::get('/paidInvoice/{schoolCode}', [PaidInvoiceController::class, 'paidInvoice'])->name('paidInvoice');
    Route::get('/othTransInquiry/{schoolCode}', [OuthTransInquiryController::class, 'othTransInquiry'])->name('othTransInquiry');
    Route::get('/ListOfdueOrPay/{schoolCode}', [ListOfDueOrPayController::class, 'ListOfdueOrPay'])->name('ListOfdueOrPay');
    Route::get('/listOfHeadWise/{schoolCode}', [ListOfHeadWiseController::class, 'listOfHeadWise'])->name('listOfHeadWise');
    Route::get('/listOfMonthWiseFees/{schoolCode}', [ListOfMonthWiseFeesController::class, 'listOfMonthWiseFees'])->name('listOfMonthWiseFees');
    Route::get('/listOfSpecialDiscount/{schoolCode}', [ListOfSepecialDiscountController::class, 'listOfSpecialDiscount'])->name('listOfSpecialDiscount');
    Route::get('/listOfFineOrFailOrAbsent/{schoolCode}', [ListOfFineOrFailOrAbsentController::class, 'listOfFineOrFailOrAbsent'])->name('listOfFineOrFailOrAbsent');
    Route::get('/listOfDonation/{schoolCode}', [ListOfDonationController::class, 'listOfDonation'])->name('listOfDonation');
    Route::get('/listOfFormFees/{schoolCode}', [ListOfFormFeesController::class, 'listOfFormFees'])->name('listOfFormFees');
    Route::get('/monthlyPaidDetails/{schoolCode}', [MonthlyPaidDetailsController::class, 'monthlyPaidDetails'])->name('monthlyPaidDetails');

    // sayem - student attendence
    Route::get('/addStudentAttendence/{schoolCode}', [AttendenceController::class, "add_student_attence"])->name('addStudentAttendence');
    Route::get('/studentLeaveForm/{schoolCode}', [AttendenceController::class, "student_leave_form"])->name('studentLeaveForm');
    Route::get('/addLeaveType/{schoolCode}', [AttendenceController::class, "add_leave_type"])->name('addLeaveType');


    // report Student Attendence
    Route::get('/attendenceReport/{schoolCode}', [ReportStudentAttendenceController::class, "attendence_report"])->name('attendenceReport');
    Route::get('/attendenceBlankReport/{schoolCode}', [ReportStudentAttendenceController::class, "attendence_blank_report"])->name('attendenceBlankReport');
    Route::get('/dateWiseReport/{schoolCode}', [ReportStudentAttendenceController::class, "date_wise_report"])->name('dateWiseReport');
    Route::get('/listOfLeaveReport/{schoolCode}', [ReportStudentAttendenceController::class, "list_of_leave_report"])->name('listOfLeaveReport');
    Route::get('/setionWiseSection/{schoolCode}', [ReportStudentAttendenceController::class, "section_wise_report"])->name('setionWiseSection');



    // exam-Result --------------------------------------

    Route::get('/marksInput/{schoolCode}', [MarkInputController::class, 'exam_marks']);
    Route::post('/exam-marks/get-groups/{schoolCode}', [MarkInputController::class, 'getGroups'])->name('exam-marks.get-groups');
    Route::post('/exam-marks/get-sections/{schoolCode}', [MarkInputController::class, 'getSections'])->name('exam-marks.get-sections');
    Route::post('/exam-marks/get-shifts', [MarkInputController::class, 'getShifts'])->name('exam-marks.get-shifts');

    Route::get('/exam_process/{schoolCode}', [ExamProcessController::class, 'exam_process']);
    Route::get('/getStudents/{schoolCode}/{class}/{group}/{section}', [ExamProcessController::class, 'getStudents']);
    Route::get('/exam_excel/{schoolCode}', [ExamResultController::class, 'exam_excel']);
    Route::get('/exam_marks_delete/{schoolCode}', [ExamResultController::class, 'exam_marks_delete']);
    Route::get('/exam_sms/{schoolCode}', [ExamResultController::class, 'exam_sms']);

    // exam-report
    Route::get('/progressReport/{schoolCode}', [ReportsExamsReportsController::class, 'progressReport']);
    Route::get('/exam-failList/{schoolCode}', [ReportsExamsReportsController::class, 'failList1']);
    Route::get('/tebular-format1/{schoolCode}', [ReportsExamsReportsController::class, 'format1']);
    Route::get('/tebular-format2/{schoolCode}', [ReportsExamsReportsController::class, 'format2']);
    Route::get('/tebular-format3/{schoolCode}', [ReportsExamsReportsController::class, 'format3']);
    Route::get('/gradeInfo/{schoolCode}', [ReportsExamsReportsController::class, 'gradeInfo']);
    Route::get('/grandFinal/{schoolCode}', [ReportsExamsReportsController::class, 'grandFinal']);
    Route::get('/meritClass/{schoolCode}', [ReportsExamsReportsController::class, 'meritClass']);
    Route::get('/meritList/{schoolCode}', [ReportsExamsReportsController::class, 'meritList']);
    Route::get('/passFailPercentage/{schoolCode}', [ReportsExamsReportsController::class, 'passFailPercentage']);
    Route::get('/unassignedSubject/{schoolCode}', [ReportsExamsReportsController::class, 'unassignedSubject']);


    //grand final
    Route::get('/grand_fail_list', [GrandFinalController::class, 'grandFailList']);
    Route::get('/grand_exam_final_process', [GrandFinalController::class, 'grandFinalProcess']);
    Route::get('/grand_merit_list', [GrandFinalController::class, 'grandMeritList']);
    Route::get('/grand_exam_progress_report', [GrandFinalController::class, 'grandProgressReport']);
    Route::get('/grand_result_pass_fail_percentage', [GrandFinalController::class, 'passFailPercentage']);
    Route::get('/grand_exam_setup/{schoolCode}', [GrandFinalController::class, 'setupGrand']);
    Route::get('/grandFinalList/{schoolCode}', [GrandFinalListController::class, 'grandFinalList'])->name('grandFinalList');
    Route::post('/viewGrandFinal/{schoolCode}', [GrandFinalListController::class, 'viewGrandFinal'])->name('viewGrandFinal');

    //Message
    Route::get('/contact/{schoolCode}', [AddContactController::class, 'Contact'])->name('contact');
    Route::post('/addContact', [AddContactController::class, 'addContact'])->name('addContact');

    Route::get('/message/{schoolCode}', [SendMSGController::class, 'message'])->name('message');
    Route::post('/sendMessage', [SendMSGController::class, 'sendMessage'])->name('sendMessage');
    Route::delete('/delete_contact/{id}', [SendMSGController::class, 'delete_add_contact'])->name('delete.contact');


    Route::get('/excelmsg/{schoolCode}', [ExcelMSGController::class, 'excelMsg'])->name('excelmsg');
    Route::get('/download-contact/{schoolCode}', [ExcelMSGController::class, 'downloadDemo'])->name('download.contact');
    Route::post('/uploadExcel', [ExcelMSGController::class, 'uploadExcel'])->name('uploadExcel');

    Route::get('/addMessage/{schoolCode}', [AddMsgController::class, 'addMsg'])->name('addMsg');
    Route::post('/addInstruction', [AddMsgController::class, 'addInstruction'])->name('addInstruction');


    // teacher routes
    Route::get('/teachers/{schoolCode}', [TeacherController::class, 'teachers'])->name('teachers');
    Route::get('/addteacher', [TeacherController::class, 'addTeachers']);
    Route::post('/create-teacher', [TeacherController::class, 'addteacher'])->name('teacher.add');
    Route::get('/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('/teacher/{id}/update', [TeacherController::class, 'update'])->name('teachers.update');
    Route::get('/teachers/{id}/teacherview', [TeacherController::class, 'view'])->name('teachers.view');
    Route::delete('/techers/{id}', [TeacherController::class, 'Deleteteacher'])->name('teacher.delete');



    // Common Setting start .............................................................................................................


    // Add Class
    Route::get('/addClass/{schoolCode}', [AddClassController::class, 'add_class'])->name('add.class');
    Route::put('/addClass/{schoolCode}', [AddClassController::class, 'store_add_class'])->name('store.class');
    Route::delete('/delete_class/{id}', [AddClassController::class, 'delete_add_class'])->name('delete.class');

    // Add Section
    Route::get('/addSection/{schoolCode}', [AddSectionController::class, 'add_section'])->name('add.section');
    Route::put('/addSection/{schoolCode}', [AddSectionController::class, 'store_add_section'])->name('store.section');
    Route::delete('/delete_section/{id}', [AddSectionController::class, 'delete_add_section'])->name('delete.section');

    // Add Shift
    Route::get('/addShift/{schoolCode}', [AddShiftController::class, 'add_shift'])->name('add.shift');
    Route::put('/addShift/{schoolCode}', [AddShiftController::class, 'store_add_shift'])->name('store.shift');
    Route::delete('/delete_shift/{id}', [AddShiftController::class, 'delete_add_shift'])->name('delete.shift');

    // Add Group
    Route::get('/addGroup/{schoolCode}', [AddGroupController::class, 'add_group'])->name('add.group');
    Route::put('/addGroup/{schoolCode}', [AddGroupController::class, 'store_add_group'])->name('store.group');
    Route::delete('/delete_group/{id}', [AddGroupController::class, 'delete_add_group'])->name('delete.group');

    // Add Subject
    Route::get('/addSubject/{schoolCode}', [AddSubjectController::class, 'add_subject'])->name('add.subject');
    Route::put('/addSubject/{schoolCode}', [AddSubjectController::class, 'store_add_subject'])->name('store.subject');
    Route::delete('/delete_subject/{id}', [AddSubjectController::class, 'delete_add_subject'])->name('delete.subject');


    // Add academic session
    Route::get('/addAcademicSession/{schoolCode}', [AddAcademicSessionController::class, 'add_academic_session'])->name('add.academic.session');
    Route::put('/addAcademicSession/{schoolCode}', [AddAcademicSessionController::class, 'store_add_academic_session'])->name('store.academic.session');
    Route::delete('/delete_academic_session/{id}', [AddAcademicSessionController::class, 'delete_add_academic_session'])->name('delete.academic.session');

    // Add academic year
    Route::get('/addAcademicYear/{schoolCode}', [AddAcademicYearController::class, 'add_academic_year'])->name('add.academic.year');
    Route::put('/addAcademicYear/{schoolCode}', [AddAcademicYearController::class, 'store_add_academic_year'])->name('store.academic.year');
    Route::delete('/delete_academic_Year/{id}', [AddAcademicYearController::class, 'delete_add_academic_year'])->name('delete.academic.year');

    // Add board exam
    Route::get('/addBoardExam/{schoolCode}', [AddBoardExamController::class, 'add_board_exam'])->name('add.board.exam');
    Route::put('/addBoardExam/{schoolCode}', [AddBoardExamController::class, 'store_add_board_exam'])->name('store.board.exam');
    Route::delete('/delete_board_exam/{id}', [AddBoardExamController::class, 'delete_add_board_exam'])->name('delete.board.exam');

    // Add category
    Route::get('/addCategory/{schoolCode}', [AddCategoryController::class, 'add_category'])->name('add.category');
    Route::put('/addCategory/{schoolCode}', [AddCategoryController::class, 'store_add_category'])->name('store.category');
    Route::delete('/delete_category/{id}', [AddCategoryController::class, 'delete_add_category'])->name('delete.category');

    // Add board exam
    Route::get('/addClassExam/{schoolCode}', [AddClassExamController::class, 'add_class_exam'])->name('add.class.exam');
    Route::put('/addClassExam/{schoolCode}', [AddClassExamController::class, 'store_add_class_exam'])->name('store.class.exam');
    Route::delete('/delete_class_exam/{id}', [AddClassExamController::class, 'delete_add_class_exam'])->name('delete.class.exam');

    // Add class wise group
    Route::get('/addClassWiseGroup/{schoolCode}', [AddClassWiseGroupController::class, 'add_class_wise_group'])->name('add.class.wise.group');
    Route::post('/addClassWiseGroup/{schoolCode}', [AddClassWiseGroupController::class, 'store_add_class_wise_group'])->name('store.class.wise.group');
    Route::delete('/delete_class_wise_group/{id}', [AddClassWiseGroupController::class, 'delete_add_class_wise_group'])->name('delete.class.wise.group');

    // Add class wise section
    Route::get('/addClassWiseSection/{schoolCode}', [AddClassWiseSectionController::class, 'add_class_wise_section'])->name('add.class.wise.section');
    Route::post('/addClassWiseSection/{schoolCode}', [AddClassWiseSectionController::class, 'store_add_class_wise_section'])->name('store.class.wise.section');
    Route::delete('/delete_class_wise_section/{id}', [AddClassWiseSectionController::class, 'delete_add_class_wise_section'])->name('delete.class.wise.section');

    // Add class wise shift
    Route::get('/addClassWiseShift/{schoolCode}', [AddClassWiseShiftController::class, 'add_class_wise_shift'])->name('add.class.wise.shift');
    Route::post('/addClassWiseShift/{schoolCode}', [AddClassWiseShiftController::class, 'store_add_class_wise_shift'])->name('store.class.wise.shift');
    Route::delete('/delete_class_wise_shift/{id}', [AddClassWiseShiftController::class, 'delete_add_class_wise_shift'])->name('delete.class.wise.shift');

    // Add category
    Route::get('/addPeriod/{schoolCode}', [AddPeriodController::class, 'add_period'])->name('add.period');
    Route::put('/addPeriod/{schoolCode}', [AddPeriodController::class, 'store_add_period'])->name('store.period');
    Route::delete('/delete_period/{id}', [AddPeriodController::class, 'delete_add_period'])->name('delete.period');

    // Add Institute Info
    Route::get('/addInstituteInfo', [InstituteInfoController::class, 'add_institute_info'])->name('add.institute.info');
    Route::put('/addInstituteInfo', [InstituteInfoController::class, 'store_add_institute_info'])->name('store.institute.info');


    // Add Subject Setup
    Route::get('/addSubjectSetup/{schoolCode}', [AddSubjectSetupController::class, 'add_subject_setup'])->name('add.subject.setup');
    Route::put('/addSubjectSetup/{schoolCode}', [AddSubjectSetupController::class, 'store_add_subject_setup'])->name('store.subject.setup');
    Route::put('/updateSubjectSetup/{schoolCode}', [AddSubjectSetupController::class, 'updateSubjectSetup'])->name('update.setSubject');


    // Common Setting End .............................................................................................................



    // Exam Setting Start .............................................................................................................

    // Add Grade Point
    Route::get('/addGradePoint/{schoolCode}', [AddGradePointController::class, 'add_grade_point'])->name('add.grade.point');
    Route::put('/addGradePoint/{schoolCode}', [AddGradePointController::class, 'store_add_grade_point'])->name('store.grade.point');
    Route::delete('/delete_grade_point/{id}', [AddGradePointController::class, 'delete_add_grade_point'])->name('delete.grade.point');

    // Grade Setup
    Route::get('/setGradeSetup/{schoolCode}', [GradeSetupController::class, 'grade_setup'])->name('set.grade.setup');
    // Route::delete('/delete_set_grade_setup/{id}', [GradeSetupController::class, 'delete_set_grade_setup'])->name('delete.set.grade.setup');
    Route::post('/addGradeSetup/{schoolCode}', [GradeSetupController::class, 'addGradeSetup'])->name('addGradeSetup');
    Route::post('/saveGradeSetup/{schoolCode}', [GradeSetupController::class, 'saveGradeSetup'])->name('saveGradeSetup');

    Route::get('/viewGradeSetup/{schoolCode}', [GradeSetupController::class, 'viewGradeSetup'])->name('viewGradeSetup');
    Route::post('/getGradeSetup/{schoolCode}', [GradeSetupController::class, 'viewGradeSetupData'])->name('getGradeSetup');

    // Add Short Code
    Route::get('/addShortCode/{schoolCode}', [AddShortCodeController::class, 'add_short_code'])->name('add.short.code');
    Route::put('/addShortCode/{schoolCode}', [AddShortCodeController::class, 'store_add_short_code'])->name('store.short.code');
    Route::delete('/delete_short_code/{id}', [AddShortCodeController::class, 'delete_add_short_code'])->name('delete.short.code');

    // Set Short Code
    Route::get('/setShortCode/{schoolCode}', [SetShortCodeController::class, 'set_short_code'])->name('set.short.code');
    Route::put('/setShortCode/{schoolCode}', [SetShortCodeController::class, 'store_set_short_code'])->name('store.set.short.code');


    // set exam marks
    Route::get('/getExamMarks/{schoolCode}', [SetExamMarksController::class, 'store_exam_marks'])->name('get.exam.marks');
    Route::post('/setExamMarks/{schoolCode}', [SetExamMarksController::class, 'set_exam_marks'])->name('store.set.exam.marks');
    Route::post('/saveSetExamMarks/{schoolCode}', [SetExamMarksController::class, 'saveSetExamMarks'])->name('saveSetExamMarks');

    //forth subject

    Route::get('/setForthSubject/{school_code}', [FourthSubjectController::class, 'fourthSubject'])->name('set.Forth.Subject');
    Route::post('/addFourthSubject', [FourthSubjectController::class, 'addFourthSubject'])->name('addFourthSubject');
    Route::post('/saveFourthSubject', [FourthSubjectController::class, 'saveFourthSubject'])->name('saveFourthSubject');
    Route::get('/viewFourthSubject', [FourthSubjectController::class, 'viewFourthSubject'])->name('viewFourthSubject');
    Route::post('/getFourthSubject', [FourthSubjectController::class, 'getFourthSubject'])->name('getFourthSubject');
    Route::delete('/deleteFourthSubject/{id}', [FourthSubjectController::class, 'deleteFourthSubject'])->name('deleteFourthSubject');



    //Add Report Name
    Route::get('/AddReportName/{schoolCode}', [AddReportNameController::class, 'add_report'])->name('add.report');
    Route::put('/AddReportName/{schoolCode}', [AddReportNameController::class, 'store_add_report'])->name('store.report');
    Route::delete('/delete_report/{id}', [AddReportNameController::class, 'delete_add_report'])->name('delete.report');


    //Add Signature Name
    Route::get('/AddSignature/{schoolCode}', [AddSignatureController::class, 'AddSignature']);
    Route::put('/AddSignature/{schoolCode}', [AddSignatureController::class, 'store_add_sign'])->name('store.sign');
    Route::delete('/delete_sign/{id}', [AddSignatureController::class, 'delete_add_sign'])->name('delete.sign');

    Route::get('/listSignature/{schoolCode}', [AddSignatureController::class, 'listSignature']);

    //Add Exam Publish
    Route::get('/ExamPublish/{schoolCode}', [ExamPublishController::class, 'ExamPublish']);
    Route::post('/addExamPublish/{schoolCode}', [ExamPublishController::class, 'store_add_exam_publish'])->name('store.exampublish');
    Route::delete('/delete_exam/{id}', [ViewExamPublishController::class, 'delete_add_exam'])->name('delete.report');
    Route::get('/ViewExamPublish/{schoolCode}', [ViewExamPublishController::class, 'ViewExamPublish']);

    //Add Grand Final
    Route::get('/GrandFinal/{schoolCode}', [SetGrandFinalController::class, 'GrandFinal'])->name('grandfinal');
    Route::put('/store_grandFinal/{schoolCode}', [SetGrandFinalController::class, 'store_grandFinal'])->name('store.grandfinal');
    Route::get('/viewExamMarkSetup/{schoolCode}', [ViewExamMarkSetUpController::class, 'viewExamMarkSetup']);

    //sequential wise exam
    Route::get('/SequentialExam/{schoolCode}', [SequentialWiseExamController::class, 'SequentialExam'])->name('sequentialExam');
    Route::put('/SetExamMarks/{schoolCode}', [SequentialWiseExamController::class, 'store_sequential_exam'])->name('store.sequentialExam');
    //sequential wise exam
    Route::get('/SetExamMarks', [SetExamMarksController::class, 'SetExamMarks']);

    //Set signature
    Route::get('/SetSignature/{schoolCode}', [SetSignatureController::class, 'SetSignature'])->name('view.signature');
    Route::post('/SetSignature/{schoolCode}', [SetSignatureController::class, 'processForm'])->name('store.signature');


    // Exam Setting End .............................................................................................................





    // Fees Setting Start .............................................................................................................

    // Basic Setting => Fees Setting
    // add fee type
    Route::get('/basicSettings/feesSettings/addFeeType/{schoolCode}', [AddFeeTypeController::class, 'FeeTypeView'])->name('addFeeType.view');
    Route::post('/basicSettings/feesSettings/addFeeType/{schoolCode}', [AddFeeTypeController::class, 'FeeTypeStore'])->name('addFeeType.store');
    Route::delete('/basicSettings/feesSettings/addFeeType/{schoolCode}/{id}', [AddFeeTypeController::class, 'FeeTypeDelete'])->name('addFeeType.delete');
    Route::put('/basicSettings/feesSettings/addFeeType/{schoolCode}/{id}', [AddFeeTypeController::class, 'FeeTypeUpdate'])->name('addFeeType.update');
    Route::get('/basicSettings/feesSettings/addFeeType/{schoolCode}/print', [AddFeeTypeController::class, 'FeeTypePrint'])->name('addFeeType.print');
    // fees Setup
    Route::get('/basicSettings/feesSettings/feesSetup/{schoolCode}', [FeesSetupController::class, 'FeesSetupView'])->name('feesSetup.view');
    Route::post('feesSetup/viewFeeTypesData/{schoolCode}', [FeesSetupController::class, 'ViewFeeTypesData'])->name('feesSetup.FeeTypesData.view');
    Route::post('/add_fees_setup/{schoolCode}', [FeesSetupController::class, 'add_fees_setup'])->name('add_fees_setup');
    // add pay slip type
    Route::get('/basicSettings/feesSettings/addPaySlipType/{schoolCode}', [AddPaySlipTypeController::class, 'AddPaySlipTypeView'])->name('addPaySlipType.view');
    Route::post('/addPaySlipType/store/{schoolCode}', [AddPaySlipTypeController::class, 'StorePaySlipType'])->name('addPaySlipType.store');
    Route::delete('/addPaySlipType/delete/{schoolCode}/{id}', [AddPaySlipTypeController::class, 'deletePaySlipType'])->name('PaySlipType.delete');
    Route::put('/addPaySlipType/update/{schoolCode}/{id}', [AddPaySlipTypeController::class, 'updatePaySlipType'])->name('PaySlipType.update');
    // pay slip setup
    Route::get('/basicSettings/feesSettings/paySlipSetup/{schoolCode}', [PaySlipSetupController::class, 'PaySlipSetupView'])->name('paySlipSetup.view');
    Route::post('paySlipSetup/getData/{schoolCode}', [PaySlipSetupController::class, 'PaySlipSetupGetData'])->name('paySlipSetup.getData');
    Route::post('paySlipSetup/store/{schoolCode}', [PaySlipSetupController::class, 'StorePaySlipSetup'])->name('paySlipSetup.store');
    // waiver type
    Route::get('/basicSettings/feesSettings/waiverType/{schoolCode}', [WaiverTypeController::class, 'WaiverTypeView'])->name('waiverType.view');
    Route::post('/basicSettings/feesSettings/waiverType/{schoolCode}', [WaiverTypeController::class, 'StoreWaiverType'])->name('waiverType.store');
    Route::delete('/basicSettings/feesSettings/waiverType/{schoolCode}/{id}', [WaiverTypeController::class, 'DeleteWaiverType'])->name('waiverType.delete');
    Route::put('/basicSettings/feesSettings/waiverType/{schoolCode}/{id}', [WaiverTypeController::class, 'UpdateWaiverType'])->name('waiverType.update');
    // waiver setup
    Route::get('/basicSettings/feesSettings/waiverSetup/{schoolCode}', [WaiverSetupController::class, 'WaiverSetupView'])->name('waiverSetup.view');
    Route::get('/waiverSetup/getStudents/{schoolCode}', [WaiverSetupController::class, 'GetStudents'])->name('GetStudent.data');
    Route::get('/waiverSetup/getData/{schoolCode}', [WaiverSetupController::class, 'WaiverSetupGetData'])->name('waiverSetup.getData');
    Route::post('/waiverSetup/storeWaiberStudent/{schoolCode}', [WaiverSetupController::class, 'WaiverStudentListSetup'])->name('studentListWaiverSetup.store');
    // Report (Fees Setting) => All Fees
    Route::get('/reportFeesSettings/allFees/{schoolCode}', [AllFeesController::class, 'AllFeesView'])->name('allFeesReport.view');
    Route::get('/allFees/getData/{schoolCode}', [AllFeesController::class, 'GetAllFeesReportData'])->name('allFeesReport.getData');
    Route::get('/allFees/print/{schoolCode}', [AllFeesController::class, 'FeesReportDataPrint'])->name('allFeesReport.print');
    // Report (Fees Setting) => All Pay Slip
    Route::get('/reportFeesSettings/allPaySlip/{schoolCode}', [AllPaySlipController::class, 'AllPaySlipView'])->name('allPaySlipReport.view');
    Route::get('/allPaySlip/print/{schoolCode}', [AllPaySlipController::class, 'AllPaySlipPrint'])->name('allPaySlip.print');
    // Report (Fees Setting) => Individual Pay Slip
    Route::get('/reportFeesSettings/individualPaySlip/{schoolCode}', [IndividualPaySlipController::class, 'IndividualPaySlipView'])->name('individualPaySlipReport.view');
    Route::get('reportFeesSettings/PrintindividualPaySlip/{schoolCode}', [IndividualPaySlipController::class, 'PrintIndividualPaySlip'])->name('individualPaySlipReport.print');
    // Report (Fees Setting) => Individual Waiver
    Route::get('/reportFeesSettings/individualWaiver/{schoolCode}', [IndividualWaiverController::class, 'IndividualWaiverView'])->name('individualWaiverReport.view');
    Route::get('/individualWaiver/getData/{schoolCode}', [IndividualWaiverController::class, 'GetDataIndividualWaiver'])->name('individualWaiverReport.getData');


    // Fees Setting End .............................................................................................................





    //teacher module start

    Route::get('/add-teacher', [TeacherController::class, 'addTeacher']);
    Route::post('/create-teacher', [TeacherController::class, 'createTeacher'])->name('teacher.create');


    //Admit Card .............................................................................................................
    // Route::get('/addSubjectSetup', [AddSubjectSetupController::class, 'add_subject_setup'])->name('add.subject.setup');
    // Route::put('/addSubjectSetup', [AddSubjectSetupController::class, 'store_add_subject_setup'])->name('store.subject.setup');
    // Route::put('/updateSubjectSetup', [AddSubjectSetupController::class, 'updateSubjectSetup'])->name('update.setSubject');


    //Set Admit Card
    Route::group(['prefix' => '/', 'namespace' => 'admitCard'], function () {
        Route::get('/setAdmitCard/{schoolCode}', [AddAdmitCardController::class, "add_admit_card"])->name('add.admit.card');
        Route::put('/setAdmitCard/{schoolCode}', [AddAdmitCardController::class, 'store_add_admit_card'])->name('store.add.admit.card');
        Route::put('/updateAdmitCard/{schoolCode}', [AddAdmitCardController::class, 'update_add_admit_card'])->name('update.add.admit.card');
        // Route::get('/setShortCode', [SetShortCodeController::class, 'set_short_code'])->name('set.short.code');
        // Route::put('/setShortCode', [SetShortCodeController::class, 'store_set_short_code'])->name('store.set.short.code');
    });


    //Print Admit Card
    Route::get('/printAdmitCard/{schoolCode}', [PrintAdmitCardController::class, "printAdmitCard"])->name('printAdmitCard');
    Route::post('/downloadAdmit/{schoolCode}', [PrintAdmitCardController::class, "downloadAdmit"])->name('downloadAdmitCard');


    //Print Seat Plan
    Route::get('/printSeatPlan/{schoolCode}', [PrintSeatPlanController::class, "printSeatPlan"]);

    //Print Admit Instuction
    Route::get('/AddAdmitInstruction/{schoolCode}', [AddAdmitInstructionController::class, "AddAdmitInstruction"])->name('addAdmitinstruction');
    Route::post('/instructionInsert/{schoolCode}', [AddAdmitInstructionController::class, 'instructionInsert'])->name('store.instructionInsert');

    //List Admit Instuction
    Route::get('/ListAdminInstruction/{schoolCode}', [ListAdminInstructionController::class, "ListAdminInstruction"])->name('listInstruction');
    Route::delete('/delete_instruction/{id}', [ListAdminInstructionController::class, 'delete_instruction'])->name('delete.instruction');
    //Exam Blank Sheet
    Route::get('/ExamBlankSheet/{schoolCode}', [ExamBlankSheetController::class, "ExamBlankSheet"]);


    // NEDUBD Add School Admin
    Route::get('/addSchoolAdmin/{schoolCode}', [SchoolAdminController::class, "addSchoolAdmin"]);
    Route::post('/createSchoolAdmin', [SchoolAdminController::class, "createSchoolAdmin"])->name('schoolAdmin.create');



    // General Accounts
    Route::get("/generalAccounts/cashPaymentVoucher/{schoolCode}", [CashPaymentVoucherController::class, "CashPaymentVoucherView"])->name("cashPaymentVoucher.view");
    Route::get("/generalAccounts/cashReceiptVoucher/{schoolCode}", [CashReceiptVoucherController::class, "CashReceiptVoucherView"])->name("cashReceiptVoucher.view");
    Route::get("/generalAccounts/bankPaymentVoucher/{schoolCode}", [BankPaymentVoucherController::class, "BankPaymentVoucherView"])->name("bankPaymentVoucher.view");
    Route::get("/generalAccounts/bankReceiptVoucher/{schoolCode}", [BankReceiptVoucherController::class, "BankReceiptVoucherView"])->name("bankReceiptVoucher.view");
    Route::get("/generalAccounts/journalVoucher/{schoolCode}", [JournalVoucherController::class, "JournalVoucherView"])->name("journalVoucher.view");
    Route::get("/generalAccounts/contraVoucher/{schoolCode}", [ContraVoucherController::class, "ContraVoucherView"])->name("contraVoucher.view");
    Route::get("/generalAccounts/voucherPosting/{schoolCode}", [VoucherPostingController::class, "VoucherPostingView"])->name("voucherPosting.view");
    // General Accounts => Reports (General Accounts)
    Route::get("/generalAccounts/Reports_GeneralAccounts/accountsVoucher/{schoolCode}", [AccountsVoucherController::class, "AccountsVoucherView"])->name("accountsVoucher.view");
    Route::get("/generalAccounts/Reports_GeneralAccounts/cashBook/{schoolCode}", [CashBookController::class, "CashBookView"])->name("cashBook.view");
    Route::get("/generalAccounts/Reports_GeneralAccounts/bankBook/{schoolCode}", [BankBookController::class, "BankBookView"])->name("bankBook.view");
    Route::get("/generalAccounts/Reports_GeneralAccounts/journalBook/{schoolCode}", [JournalBookController::class, "JournalBookView"])->name("journalBook.view");
    Route::get("/generalAccounts/Reports_GeneralAccounts/incomeExpenseSummary/{schoolCode}", [IncomeExpenseSummaryController::class, "IncomeExpenseSummaryView"])->name("incomeExpenseSummary.view");
    Route::get("/generalAccounts/Reports_GeneralAccounts/trialBalance/{schoolCode}", [TrialBalanceController::class, "TrialBalanceView"])->name("trialBalance.view");
    Route::get("/generalAccounts/Reports_GeneralAccounts/balanceSheet/{schoolCode}", [BalanceSheetController::class, "BalanceSheetView"])->name("balanceSheet.view");
    Route::get("/generalAccounts/Reports_GeneralAccounts/incomeStatement/{schoolCode}", [IncomeStatementController::class, "IncomeStatementView"])->name("incomeStatement.view");
    // General Accounts => My Account
    Route::get("/generalAccounts/myAccount/currentBalance/{schoolCode}", [CurrentBalanceController::class, "CurrentBalanceView"])->name("currentBalance.view");
    Route::get("/generalAccounts/myAccount/personalStatement/{schoolCode}", [PersonalStatementController::class, "PersonalStatementView"])->name("personalStatement.view");
    Route::get("/generalAccounts/myAccount/allStatement/{schoolCode}", [AllStatementController::class, "AllStatementView"])->name("allStatement.view");



    // Assessment
    Route::get("/assessment/assessmentInput/{schoolCode}", [AssessmentInputController::class, "AssessmentInputView"])->name("assessmentInput.view");
    // Assessment => Basic Setting
    Route::get("/assessment/basicSetting/paradarsitaSuchok/{schoolCode}", [ParadarsitaSuchokController::class, "ParadarsitaSuchokView"])->name("paradarsitaSuchok.view");
    Route::get("/assessment/basicSetting/paradarsitaSuchokExcel/{schoolCode}", [ParadarsitaSuchokExcelController::class, "ParadarsitaSuchokExcelView"])->name("paradarsitaSuchokExcel.view");
    Route::get("/assessment/basicSetting/paradarsitaSuchokMatra/{schoolCode}", [ParadarsitaSuchokMatraController::class, "ParadarsitaSuchokMatraView"])->name("paradarsitaSuchokMatra.view");
    Route::get("/assessment/basicSetting/paradarsitaSuchokMatra_2/{schoolCode}", [ParadarsitaSuchokMatra_2_Controller::class, "ParadarsitaSuchokMatra_2_View"])->name("paradarsitaSuchokMatra_2.view");
    Route::get("/assessment/basicSetting/addNoipunnoName/{schoolCode}", [AddNoipunnoNameController::class, "AddNoipunnoNameView"])->name("addNoipunnoName.view");
    Route::get("/assessment/basicSetting/setupAssParadarsitaNoipunno/{schoolCode}", [SetupAssParadarsitaNoipunnoController::class, "SetupAssParadarsitaNoipunnoView"])->name("setupAssParadarsitaNoipunno.view");
    Route::get("/assessment/basicSetting/paradarsitaSuchokExam/{schoolCode}", [ParadarsitaSuchokExamController::class, "ParadarsitaSuchokExamView"])->name("paradarsitaSuchokExam.view");
    // Assessment => Assessment Reports
    Route::get("/assessment/assessmentReports/subjectWiseReport/{schoolCode}", [SubjectWiseReportController::class, "SubjectWiseReportView"])->name("subjectWiseReport.view");
    Route::get("/assessment/assessmentReports/allSubjectWise/{schoolCode}", [AllSubjectWiseController::class, "AllSubjectWiseView"])->name("allSubjectWise.view");
    Route::get("/assessment/assessmentReports/noipunnoReport/{schoolCode}", [NoipunnoReportController::class, "NoipunnoReportView"])->name("noipunnoReport.view");
    Route::get("/assessment/assessmentReports/noipunnoAllSubject/{schoolCode}", [NoipunnoAllSubjectController::class, "NoipunnoAllSubjectView"])->name("noipunnoAllSubject.view");
    Route::get("/assessment/assessmentReports/noipunnoMullaonPrint/{schoolCode}", [NoipunnoMullaonPrintController::class, "NoipunnoMullaonPrintView"])->name("noipunnoMullaonPrint.view");
    Route::get("/assessment/assessmentReports/noipunnoBI/{schoolCode}", [NoipunnoBIController::class, "NoipunnoBIView"])->name("noipunnoBI.view");
});
