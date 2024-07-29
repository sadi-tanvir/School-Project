<?php

use App\Http\Controllers\Backend\AdmitCard\AddAdmitCardController;
use App\Http\Controllers\Backend\Assessment\AssessmentInputController;
use App\Http\Controllers\Backend\Assessment\AssessmentReports\AllSubjectWiseController;
use App\Http\Controllers\Backend\Assessment\AssessmentReports\NoipunnoAllSubjectController;
use App\Http\Controllers\Backend\Assessment\AssessmentReports\NoipunnoBIController;
use App\Http\Controllers\Backend\Assessment\AssessmentReports\NoipunnoMullaonPrintController;
use App\Http\Controllers\Backend\Assessment\AssessmentReports\NoipunnoReportController;
use App\Http\Controllers\Backend\Assessment\AssessmentReports\SubjectWiseReportController;
use App\Http\Controllers\Backend\Assessment\BasicSetting\AddNoipunnoNameController;
use App\Http\Controllers\Backend\Assessment\BasicSetting\ParadarsitaSuchokController;
use App\Http\Controllers\Backend\Assessment\BasicSetting\ParadarsitaSuchokExamController;
use App\Http\Controllers\Backend\Assessment\BasicSetting\ParadarsitaSuchokExcelController;
use App\Http\Controllers\Backend\Assessment\BasicSetting\ParadarsitaSuchokMatra_2_Controller;
use App\Http\Controllers\Backend\Assessment\BasicSetting\ParadarsitaSuchokMatraController;
use App\Http\Controllers\Backend\Assessment\BasicSetting\SetupAssParadarsitaNoipunnoController;
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
use App\Http\Controllers\Backend\ExamSetting\SubjectSetupViewController;
use App\Http\Controllers\Backend\FeesSetting\AddFeeTypeController;
use App\Http\Controllers\Backend\FeesSetting\AddPaySlipTypeController;
use App\Http\Controllers\Backend\FeesSetting\FeesSetupController;
use App\Http\Controllers\Backend\FeesSetting\PaySlipSetupController;
use App\Http\Controllers\Backend\FeesSetting\ReportFeesSettings\AllFeesController;
use App\Http\Controllers\Backend\FeesSetting\ReportFeesSettings\AllPaySlipController;
use App\Http\Controllers\Backend\FeesSetting\ReportFeesSettings\IndividualPaySlipController;
use App\Http\Controllers\Backend\FeesSetting\ReportFeesSettings\IndividualWaiverController;
use App\Http\Controllers\Backend\FeesSetting\WaiverSetupController;
use App\Http\Controllers\Backend\FeesSetting\WaiverTypeController;
use App\Http\Controllers\Backend\GeneralAccounts\BankPaymentVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\BankReceiptVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\CashPaymentVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\CashReceiptVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\ContraVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\JournalVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\MyAccount\AllStatementController;
use App\Http\Controllers\Backend\GeneralAccounts\MyAccount\CurrentBalanceController;
use App\Http\Controllers\Backend\GeneralAccounts\MyAccount\PersonalStatementController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\AccountsVoucherController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\BalanceSheetController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\BankBookController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\CashBookController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\IncomeExpenseSummaryController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\IncomeStatementController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\JournalBookController;
use App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts\TrialBalanceController;
use App\Http\Controllers\Backend\GeneralAccounts\VoucherPostingController;

use App\Http\Controllers\Backend\Home\HomeController;

use App\Http\Controllers\Backend\MachineAttendance\StudentMachineIntegrateController;
use App\Http\Controllers\Backend\MachineAttendance\StudentMachinUserListController;
use App\Http\Controllers\Backend\MachineAttendance\StudentTimeSettingController;

use App\Http\Controllers\Backend\NEDUB\SettingController;
use App\Http\Controllers\Backend\NEDUBD\NEDUBDController;
use App\Http\Controllers\Backend\NEDUBD\SchoolAdminController;
use App\Http\Controllers\Backend\OnlineApplication\ListOfApplicantController;
use App\Http\Controllers\Backend\Staff\StaffController;
use App\Http\Controllers\Backend\Student\addShortListController;
use App\Http\Controllers\Backend\Student\classSectionSTdTotalController;
use App\Http\Controllers\Backend\Student\DownloadStudentController;
use App\Http\Controllers\Backend\Student\StudentController;
use App\Http\Controllers\Backend\Student\StudentDetailsController;
use App\Http\Controllers\Backend\Student\StudentListWithPhotoController;
use App\Http\Controllers\Backend\Student\UpdateStudentBasicInfoController;
use App\Http\Controllers\Backend\Student\UpdateStudentClassInfoController;
use App\Http\Controllers\Backend\Student\StudentProfileUpdateController;
use App\Http\Controllers\Backend\Student\UploadPhotoController;
use App\Http\Controllers\Backend\Student\MigrateStudentController;
use App\Http\Controllers\Backend\Student\UpdateStudentController;
use App\Http\Controllers\Backend\Student\BasicAddStudentController;

use App\Http\Controllers\Backend\Student\EsifListController;
use App\Http\Controllers\Backend\Student\UploadExcelFileController;

use App\Http\Controllers\Backend\Student_Account\DeletePaySlipController;
use App\Http\Controllers\Backend\Student_Account\EditGeneratedPayslipController;
use App\Http\Controllers\Backend\Student_Account\GenerateMultiplePayslipController;
use App\Http\Controllers\Backend\Student_Account\GeneratePayslipController;
use App\Http\Controllers\Backend\Student_Account\Others\FromFeeController;
use App\Http\Controllers\Backend\Student_Account\Others\DonationController;
use App\Http\Controllers\Backend\Student_Account\Others\OthersFeeController;
use App\Http\Controllers\Backend\Student_Account\Others\FineFailController;

use App\Http\Controllers\Backend\Student_Account\PaySlipCollectionController;
use App\Http\Controllers\Backend\Student_Account\PrintUnpaidPaySlipController;
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
use App\Http\Controllers\Backend\ExamResult\ExamMarksDeleteController;

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
use App\Http\Controllers\Backend\ReportsExamsReports\ProgressReportController;
use App\Http\Controllers\Backend\AdmitCard\SetAdmitCardController;
use App\Http\Controllers\Backend\AdmitCard\PrintAdmitCardController;
use App\Http\Controllers\Backend\AdmitCard\PrintSeatPlanController;
use App\Http\Controllers\Backend\AdmitCard\AddAdmitInstructionController;
use App\Http\Controllers\Backend\AdmitCard\ListAdminInstructionController;
use App\Http\Controllers\Backend\AdmitCard\ExamBlankSheetController;
use App\Http\Controllers\Backend\StudentAttendence\AttendenceController;
use App\Http\Controllers\Backend\ReportStudentAttendence\ReportStudentAttendenceController;
use App\Http\Controllers\Backend\Student\StudentReports\admissionSummaryController;

use App\Http\Controllers\Backend\Student\StudentReports\listOfMigrateStudentListController;
use App\Http\Controllers\Backend\Student\StudentReports\religionWiseStudentSummaryController;
use App\Http\Controllers\Backend\Student\StudentReports\studentIdCardController;
use App\Http\Controllers\Backend\Student\StudentReports\StudentProfileController;
use App\Http\Controllers\Backend\Student\StudentReports\SiblingsReportController;
use App\Http\Controllers\Backend\Student\StudentReports\testimonialController;
use App\Http\Controllers\Backend\Student\StudentReports\trasnferCertificateController;
use App\Http\Controllers\Backend\Student\StudentReports\trasnferCertificateListController;
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

Route::get('/student-fees-info/{schoolCode}/{studentId}/{invoiceId}', [PaySlipCollectionController::class, 'FeesInfoWithQRCode'])->name('studentFeesInfo.QRCode');


Route::prefix('dashboard')->middleware(['session.expired'])->group(function () {
    Route::get('/{schoolCode}', [DashboardController::class, 'index'])->name('dashboard.index');
    // NEDUBD Module
    Route::get('/addAdmin/{schoolCode}', [NEDUBDController::class, 'addAdmin']);
    Route::post('/create-admin', [NEDUBDController::class, 'createAdmin'])->name('admin.add');
    Route::get('/addSchoolInfo/{schoolCode}', [NEDUBDController::class, 'addSchoolInfo']);
    Route::post('/create-schoolInfo', [NEDUBDController::class, 'createSchoolInfo'])->name('schoolInfo.add');

    //Home
    Route::get('/home/{schoolCode}', [HomeController::class, 'home']);

    // settings
    Route::get('/settings/{schoolCode}', [SettingController::class, 'viewSetting'])->name('view.settings');
    Route::put('/change-profile-picture/{role}/{id}/{schoolCode}', [SettingController::class, 'changePhoto'])->name('change.profile.picture');

    //Online Application

    Route::get('/list-of-application/{schoolCode}', [ListOfApplicantController::class, 'ListOfApplicantView'])->name('list.online.application');
    Route::get('/online-application-view/{schoolCode}', [ListOfApplicantController::class, 'ListOfApplicantView'])->name('onlineApplicationForm.view');

    Route::get('/report-applicant/{schoolCode}', [ListOfApplicantController::class, 'ReportApplicationView'])->name('report.applicant');

    // student module
    Route::post('/create-student', [StudentController::class, 'addStudent'])->name('student.add');
    Route::post('/create-student/addFees/{schoolCode}', [StudentController::class, 'addNewStudentFees'])->name('student.add.fees');
    Route::get('/create-student/printAdmissionInvoice/{student_id}/{schoolCode}', [StudentController::class, 'PrintAdmissionInvoice'])->name('student.invoice.print');
    Route::get('/add-student/{schoolCode}', [StudentController::class, 'AddStudentForm'])->name('AddStudentForm');
    Route::post('/add-students/get-groups/{schoolCode}', [StudentController::class, 'getGroups'])->name('add.get-groups');
    Route::post('/add-students/get-sections/{schoolCode}', [StudentController::class, 'getSections'])->name('add.get-sections');
    Route::post('/add-students/get-shifts/{schoolCode}', [StudentController::class, 'getShifts'])->name('add.get-shifts');

    Route::get('/view-download-student/{schoolCode}', [DownloadStudentController::class, 'viewDownloadStudent'])->name('view.download.student');
    Route::post('/download-student-data/{schoolCode}', [DownloadStudentController::class, 'DownloadStudentData'])->name('download.student.data');


    //Update Student Basic Info
    Route::get('/updateStudentBasicInfo/{schoolCode}', [UpdateStudentBasicInfoController::class, 'updateStudentBasicInfo'])->name('updateStudentBasicInfo');
    Route::get('/getStudentData/{schoolCode}', [UpdateStudentBasicInfoController::class, 'getStudentData'])->name('getStudentData');
    Route::put('/updateData/{schoolCode}', [UpdateStudentBasicInfoController::class, 'updateStudentBasic'])->name('updateStudent');
    Route::post('/basic-info/get-groups/{schoolCode}', [UpdateStudentBasicInfoController::class, 'getGroups'])->name('basic.info.get-groups');
    Route::post('/basic-info/get-sections/{schoolCode}', [UpdateStudentBasicInfoController::class, 'getSections'])->name('basic.info.get-sections');
    Route::post('/basic-info/get-shifts/{schoolCode}', [UpdateStudentBasicInfoController::class, 'getShifts'])->name('basic.info.get-shifts');


    //Update student Student Class Info
    Route::get('/studentClassInfo/{schoolCode}', [UpdateStudentClassInfoController::class, 'studentClassInfo'])->name('studentClassInfo');
    Route::get('/getStudentClassData/{schoolCode}', [UpdateStudentClassInfoController::class, 'getStudentClassData'])->name('getStudentClassData');
    Route::put('/updateStudentClass/{schoolCode}', [UpdateStudentClassInfoController::class, 'updateStudentClass'])->name('updateStudentClass');
    Route::delete('/deleteStudent/{schoolCode}', [UpdateStudentClassInfoController::class, 'deleteStudents'])->name('deleteStudent');
    Route::post('/class-info/get-groups/{schoolCode}', [UpdateStudentClassInfoController::class, 'getGroups'])->name('class.info.get-groups');
    Route::post('/class-info/get-sections/{schoolCode}', [UpdateStudentClassInfoController::class, 'getSections'])->name('class.info.get-sections');
    Route::post('/class-info/get-shifts/{schoolCode}', [UpdateStudentClassInfoController::class, 'getShifts'])->name('class.info.get-shifts');


    //update student profile
    Route::get('/studentProfileUpdate/{schoolCode}', [StudentProfileUpdateController::class, 'studentProfileUpdate'])->name('studentProfileUpdate');

    Route::post('/find-Data/{schoolCode}', [StudentProfileUpdateController::class, 'findData'])->name('find.Data');

    Route::post('/student-profile/get-groups/{schoolCode}', [UpdateStudentClassInfoController::class, 'getGroups'])->name('student.profile.get-groups');
    Route::post('/student-profile/get-sections/{schoolCode}', [UpdateStudentClassInfoController::class, 'getSections'])->name('student.profile.get-sections');
    Route::post('/student-profile/get-shifts/{schoolCode}', [UpdateStudentClassInfoController::class, 'getShifts'])->name('student.profile.get-shifts');


    //Update Student ->Add Student
    Route::get('/getStudent/{schoolCode}', [BasicAddStudentController::class, 'getStudent'])->name('getStudent');

    Route::post('/postStudent', [BasicAddStudentController::class, 'postStudent'])->name('postStudent');
    Route::post('/add-student/get-groups/{schoolCode}', [UpdateStudentClassInfoController::class, 'getGroups'])->name('add.student.get-groups');
    Route::post('/add-student/get-section/{schoolCode}', [UpdateStudentClassInfoController::class, 'getSections'])->name('add.student.get-sections');
    Route::post('/add-student/get-shift/{schoolCode}', [UpdateStudentClassInfoController::class, 'getShifts'])->name('add.student.get-shifts');



    //update student
    Route::get('/student_update/{id}/{schoolCode}', [UpdateStudentController::class, 'student_update'])->name('student_update');
    Route::put('/students/{id}', [UpdateStudentController::class, 'updateStudent'])->name('students.update');

    //update student ExcelFile
    Route::get('/uploadExelFile/{schoolCode}', [UploadExcelFileController::class, 'uploadExelFile'])->name('uploadExelFile');
    Route::get('/download-demo/{schoolCode}', [UploadExcelFileController::class, 'downloadDemo'])->name('download.demo');
    Route::post('/upload-excel', [UploadExcelFileController::class, 'uploadExcel'])->name('upload.excel');
    Route::post('/upload-excel/get-groups/{schoolCode}', [UploadExcelFileController::class, 'uploadGroups'])->name('upload.get-groups');
    Route::post('/upload-excel/get-sections/{schoolCode}', [UploadExcelFileController::class, 'uploadSections'])->name('upload.get-sections');
    Route::post('/upload-excel/get-shifts/{schoolCode}', [UploadExcelFileController::class, 'uploaduploadShifts'])->name('upload.get-shifts');


    //upload photo student
    Route::get('/uploadStudentPhoto/{schoolCode}', [UploadPhotoController::class, 'uploadStudentPhoto'])->name('StudentPhoto');
    Route::post('/updatePhoto/{schoolCode}', [UploadPhotoController::class, 'updatePhoto'])->name('updatePhoto');
    Route::post('/update-student-image/{schoolCode}/{id}', [UploadPhotoController::class, 'updateImage'])->name('update.student.image');
    Route::get('/uploadPhoto/{schoolCode}', [UploadPhotoController::class, 'uploadPhoto'])->name('uploadPhoto');
    Route::post('/upload-photo/get-groups/{schoolCode}', [UpdateStudentClassInfoController::class, 'getGroups'])->name('upload.photo.get-groups');
    Route::post('/upload-photo/get-sections/{schoolCode}', [UpdateStudentClassInfoController::class, 'getSections'])->name('upload.photo.get-sections');
    Route::post('/upload-photo/get-shifts/{schoolCode}', [UpdateStudentClassInfoController::class, 'getShifts'])->name('upload.photo.get-shifts');




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

    //student profile
    Route::get('/search/{schoolCode}', [StudentProfileController::class, 'search']);
    Route::get('/studentProfile/{schoolCode}', [StudentProfileController::class, 'student_profileInfo']);
    Route::post('/studentid/{schoolCode}', [StudentProfileController::class, 'studentid'])->name('studentid');
    Route::get('/student_ProfileReport/{schoolCode}', [StudentProfileController::class, 'student_ProfileReport'])->name('student_ProfileReport');
    //sibling report
    Route::get('/siblings/{schoolCode}', [SiblingsReportController::class, 'siblings'])->name('siblings');
    Route::get('/fatherMatch/{schoolCode}', [SiblingsReportController::class, 'fatherMatch'])->name('fatherMatch');
    Route::get('/motherMatch/{schoolCode}', [SiblingsReportController::class, 'motherMatch'])->name('motherMatch');
    Route::get('/findStudent/{schoolCode}', [SiblingsReportController::class, 'findStudent'])->name('findStudent');
    Route::get('/studentMatch/{schoolCode}', [SiblingsReportController::class, 'studentMatch'])->name('studentMatch');

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
    Route::get("/studentAccounts/paySlipCollection/deletePaySlip/{schoolCode}", [PaySlipCollectionController::class, "DeletePaySlip"])->name("paySlipData.delete");
    Route::get("/studentAccounts/paySlipCollection/updatePrintPage/{schoolCode}", [PaySlipCollectionController::class, "UpdatePrintPage"])->name("updatePrintPage");
    Route::post("/studentAccounts/paySlipCollection/storePaySlipData/{schoolCode}", [PaySlipCollectionController::class, "StorePaySlipData"])->name("paySlipData.store");

    // Print Unpaid Payslip
    Route::get("/studentAccounts/printUnpaidPaySlip/{schoolCode}", [PrintUnpaidPaySlipController::class, "PrintUnpaidPaySlipForm"])->name("printUnpaidPaySlip.view");
    Route::get("/studentAccounts/printUnpaidPaySlip/getSectionAndGroup/{schoolCode}", [PrintUnpaidPaySlipController::class, "GetSectionAndGroup"]);
    Route::get("/studentAccounts/printUnpaidPaySlip/getStudentRoll/{schoolCode}", [PrintUnpaidPaySlipController::class, "GetStudentRoll"]);
    Route::get("/studentAccounts/printUnpaidPaySlip/getUnpaidPayslip/{schoolCode}", [PrintUnpaidPaySlipController::class, "GetSingleUnpaidPayslip"]);
    Route::get("/studentAccounts/printUnpaidPaySlip/printInvoice/{schoolCode}", [PrintUnpaidPaySlipController::class, "PrintUnpaidInvoice"])->name("UnpaidInvoice.print");
    Route::get("/studentAccounts/printUnpaidPaySlip/getAllStudentUnpaidPayslip/{schoolCode}", [PrintUnpaidPaySlipController::class, "GetAllStudentUnpaidPayslip"]);

    // Delete Payslip
    Route::get("/studentAccounts/deletePaySlip/{schoolCode}", [DeletePaySlipController::class, "DeletePaySlipView"])->name("deletePaySlip.view");
    Route::get("/studentAccounts/deletePaySlip/getPaySlipData/{schoolCode}", [DeletePaySlipController::class, "GetPaySlipData"]);
    Route::get("/studentAccounts/deletePaySlip/deletePaySlipData/{schoolCode}", [DeletePaySlipController::class, "DeletePaySlipData"]);
    // Generate payslips
    Route::get("/studentAccounts/generatePayslip/{schoolCode}", [GeneratePayslipController::class, "GeneratePayslipView"])->name("generatePayslip.view");
    Route::get("/studentAccounts/getPaySlipData/{schoolCode}", [GeneratePayslipController::class, "GetPaySlipData"])->name("PaySlipData.get");
    Route::get("/studentAccounts/getFeeDataTypes/{schoolCode}", [GeneratePayslipController::class, "GetFeeDataTypes"])->name("feeDataTypes.get");
    Route::get("/studentAccounts/getAllInformation/{schoolCode}", [GeneratePayslipController::class, "GetAllInformation"])->name("AllInformation.get");
    Route::post("/studentAccounts/storeGeneratePaySlip/{schoolCode}", [GeneratePayslipController::class, "StoreGeneratePaySlip"])->name("generatePaySlip.store");
    // Edit Generated Payslip
    Route::get("/studentAccounts/editGeneratedPayslip/{schoolCode}", [EditGeneratedPayslipController::class, "EditGeneratedPayslipView"])->name("editGeneratedPayslip.view");
    Route::get("/studentAccounts/editGeneratedPayslip/getPaySlipData/{schoolCode}", [EditGeneratedPayslipController::class, "GetPaySlipData"]);
    Route::get("/studentAccounts/editGeneratedPayslip/getAllInformation/{schoolCode}", [EditGeneratedPayslipController::class, "GetAllInformation"])->name("AllPayslipInformation.get");
    // Generate multiple payslips
    Route::get("/studentAccounts/generateMultiplePayslip/{schoolCode}", [GenerateMultiplePayslipController::class, "GenerateMultiplePayslipView"])->name("generateMultiplePayslip.view");
    Route::get("/studentAccounts/getStudentInformation/{schoolCode}", [GenerateMultiplePayslipController::class, "GetStudentInformation"])->name("studentInformation.get");
    Route::post("/studentAccounts/storeMultiplePayslipData/{schoolCode}", [GenerateMultiplePayslipController::class, "StoreMultiplePayslipData"])->name("multiplePayslipData.store");
    //others
    Route::get('/FeeCollection/{schoolCode}', [FromFeeController::class, 'AddFromFee'])->name('feeCollection');
    Route::get('/donation/{schoolCode}', [DonationController::class, 'AddDonationFee'])->name('donation');
    Route::get('/othersFee/{schoolCode}', [OthersFeeController::class, 'AddOthersFee'])->name('othersFee');
    Route::get('/addFineFail/{schoolCode}', [FineFailController::class, 'AddFineFail'])->name('addFineFail');
    //reports
    // DailyCollectionReport
    Route::get('/DailyCollectionReport/{schoolCode}', [DailyCollectionReportController::class, 'DailyCollectionReport'])->name('DailyCollectionReport');
    Route::get('/DailyCollectionReport/getStudentRoll/{schoolCode}', [DailyCollectionReportController::class, 'GetStudentRoll'])->name('DailyCollectionReport.studentRoll');
    Route::get('/DailyCollectionReport/getReports/{schoolCode}', [DailyCollectionReportController::class, 'GetPaySlipReport'])->name('DailyCollectionReport.getReports');
    Route::get('/DailyCollectionReport/getReports/sort/{schoolCode}', [DailyCollectionReportController::class, 'GetPaySlipReportSortingWise'])->name('DailyCollectionReport.sort.getReports');
    Route::get('/DailyCollectionReport/getReports/payslipDetails/{schoolCode}/{voucherNumber}', [DailyCollectionReportController::class, 'GetPayslipDetailsReport'])->name('DailyCollectionReport.payslipDetails.getReports');
    Route::get('/DailyCollectionReport/getReports/FeesDetails/{schoolCode}/{className}/{payslipType}', [DailyCollectionReportController::class, 'GetFeesDetailsReport'])->name('DailyCollectionReport.feesDetails.getReports');
    // Route::get('/DailyCollectionReport/printReports/{schoolCode}', [DailyCollectionReportController::class, 'PrintPaySlipReport'])->name('DailyCollectionReport.print');
    Route::get('/geneTransferInquiri/{schoolCode}', [geneTranferInquiriController::class, 'geneTransferInquiri'])->name('geneTransferInquiri');
    // Due/Pay Sumary Report
    Route::get('/DuepaySummary/{schoolCode}', [DuePaySummaryController::class, 'DuepaySummary'])->name('DuepaySummary');
    Route::get('/DuepaySummary/getGroupsAndSections/{schoolCode}', [DuePaySummaryController::class, 'GetClassWiseGroupsAndSection']);
    Route::get('/DuepaySummary/getStudentInfo/{schoolCode}', [DuePaySummaryController::class, 'GetStudentInformation']);
    Route::get('/DuepaySummary/getAllPaidUnpaidInformation/{schoolCode}', [DuePaySummaryController::class, 'GetAllPaidUnpaidInformation'])->name('DuepaySummary.info');
    Route::get('/DuepaySummary/getSortingWisePaidUnpaidReports/{schoolCode}', [DuePaySummaryController::class, 'GetSortingWisePaidUnpaidReports'])->name('DuepaySummary.sort.info');
    Route::get('/DuepaySummary/payslipDetails/{student_id}/{payment_status}/{schoolCode}', [DuePaySummaryController::class, 'GetAllPaidUnpaidDetailsInformation'])->name('DuepaySummary.details.info');

    // HeadWiseSummary Report
    Route::get('/headwiseSummary/{schoolCode}', [HeadWiseSummaryController::class, 'headwiseSummary'])->name('headwiseSummary');
    Route::get('/headwiseSummary/getStudentRoll/{schoolCode}', [HeadWiseSummaryController::class, 'GetStudentRoll']);
    Route::get('/headwiseSummary/getPayslipReport/{schoolCode}', [HeadWiseSummaryController::class, 'GetPaySlipReport'])->name('headwiseSummary.getReports');

    Route::get('/transferToAccounts/{schoolCode}', [TransferToAccountsController::class, 'transferToAccounts'])->name('transferToAccounts');
    // Paid Invoice
    Route::get('/paidInvoice/{schoolCode}', [PaidInvoiceController::class, 'paidInvoice'])->name('paidInvoice');
    Route::get('/paidInvoice/voucherId/printInvoice/{schoolCode}/{voucher_id?}', [PaidInvoiceController::class, 'PrintInvoiceWithVoucherId'])->name('printPaidInvoice.voucherId');
    Route::get('/paidInvoice/collectDate/printInvoice/{schoolCode}', [PaidInvoiceController::class, 'PrintInvoiceWithCollectDate'])->name('printPaidInvoice.collectDate');
    Route::get('/paidInvoice/studentId/printInvoice/{schoolCode}', [PaidInvoiceController::class, 'PrintInvoiceWithStudentId'])->name('printPaidInvoice.studentId');

    Route::get('/othTransInquiry/{schoolCode}', [OuthTransInquiryController::class, 'othTransInquiry'])->name('othTransInquiry');
    Route::get('/ListOfdueOrPay/{schoolCode}', [ListOfDueOrPayController::class, 'ListOfdueOrPay'])->name('ListOfdueOrPay');
    Route::get('/listOfHeadWise/{schoolCode}', [ListOfHeadWiseController::class, 'listOfHeadWise'])->name('listOfHeadWise');
    // list of Month Wise Fees
    Route::get('/listOfMonthWiseFees/{schoolCode}', [ListOfMonthWiseFeesController::class, 'listOfMonthWiseFees'])->name('listOfMonthWiseFees');
    Route::get('/listOfMonthWiseFees/getClassWiseGroupsAndSection/{schoolCode}', [ListOfMonthWiseFeesController::class, 'GetClassWiseGroupsAndSection']);
    Route::get('/listOfMonthWiseFees/getMothWiseFeesInfo/{schoolCode}', [ListOfMonthWiseFeesController::class, 'getMothWiseFeesInfo'])->name("listOfMonthWiseFees.display");
    Route::get('/listOfMonthWiseFees/getMothWiseFeesDetailsInfo/{student_id}/{payment_status}/{schoolCode}', [ListOfMonthWiseFeesController::class, 'GetAllPaidUnpaidDetailsInformation'])->name("listOfMonthWiseFees.details.display");
    // list of special Discount
    Route::get('/listOfSpecialDiscount/{schoolCode}', [ListOfSepecialDiscountController::class, 'listOfSpecialDiscount'])->name('listOfSpecialDiscount');
    Route::get('/listOfSpecialDiscount/getStudentInfo/{schoolCode}', [ListOfSepecialDiscountController::class, 'GetStudentInformation']);
    Route::get('/listOfSpecialDiscount/getData/{schoolCode}', [ListOfSepecialDiscountController::class, 'GetDataListOfWaiverData'])->name('listOfSpecialDiscount.getData');

    Route::get('/listOfFineOrFailOrAbsent/{schoolCode}', [ListOfFineOrFailOrAbsentController::class, 'listOfFineOrFailOrAbsent'])->name('listOfFineOrFailOrAbsent');
    Route::get('/listOfDonation/{schoolCode}', [ListOfDonationController::class, 'listOfDonation'])->name('listOfDonation');
    Route::get('/listOfFormFees/{schoolCode}', [ListOfFormFeesController::class, 'listOfFormFees'])->name('listOfFormFees');
    Route::get('/monthlyPaidDetails/{schoolCode}', [MonthlyPaidDetailsController::class, 'monthlyPaidDetails'])->name('monthlyPaidDetails');





    // HR/Staff Menu
    Route::get('/staff/{schoolCode}', [StaffController::class, 'staffForm'])->name('stuff.form');
    Route::post('/staff/createStaff/{schoolCode}', [StaffController::class, 'createStaff'])->name('stuff.create');




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
    // Assessment => Basic Setting => Paradarshita Suchok
    Route::get("/assessment/basicSetting/paradarsitaSuchok/{schoolCode}", [ParadarsitaSuchokController::class, "ParadarsitaSuchokView"])->name("paradarsitaSuchok.view");
    Route::get("/assessment/basicSetting/paradarsitaSuchok/getSubjects/{schoolCode}", [ParadarsitaSuchokController::class, "GetSubjects"]);
    Route::post("/assessment/basicSetting/paradarsitaSuchok/storeData/{schoolCode}", [ParadarsitaSuchokController::class, "StoreParadarsitaSuchok"])->name('paradarsita_suchoks.store');
    // Assessment => Basic Setting => Paradarshita Suchok Excel upload
    Route::get("/assessment/basicSetting/paradarsitaSuchokExcel/{schoolCode}", [ParadarsitaSuchokExcelController::class, "ParadarsitaSuchokExcelView"])->name("paradarsitaSuchokExcel.view");
    Route::get("/assessment/basicSetting/paradarsitaSuchokExcel/getSubjects/{schoolCode}", [ParadarsitaSuchokExcelController::class, "GetSubjects"]);
    Route::get("/assessment/basicSetting/paradarsitaSuchokExcel/downloadBlankExcel/{schoolCode}", [ParadarsitaSuchokExcelController::class, "DownloadBlankExcel"])->name("paradarsitaSuchokExcel.download");
    Route::post("/assessment/basicSetting/paradarsitaSuchokExcel/uploadExcelFile/{schoolCode}", [ParadarsitaSuchokExcelController::class, "UploadExcelFile"])->name("paradarsitaSuchokExcel.upload");

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


    // sayem - student attendence
    Route::post('/add-students/get-subjects/{schoolCode}', [AttendenceController::class, 'getSubject'])->name('add.get-subjects');
    Route::get('/addStudentAttendence/{schoolCode}', [AttendenceController::class, "add_student_attence"])->name('addStudentAttendence');
    Route::get('/attendanceStudent/{schoolCode}', [AttendenceController::class, "attendanceStudent"])->name('attendanceStudent');
    Route::post('/storeAttendance/{schoolCode}', [AttendenceController::class, "storeAttendance"])->name('storeAttendance');
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
    Route::post('/exam-marks/get-shifts/{schoolCode}', [MarkInputController::class, 'getShifts'])->name('exam-marks.get-shifts');
    Route::post('/exam-marks/get-exams/{schoolCode}', [MarkInputController::class, 'classExam'])->name('exam-marks.get-exams');
    Route::post('/exam-marks/get-subjects/{schoolCode}', [MarkInputController::class, 'subject'])->name('exam-marks.get-subjects');
    Route::get('/findData/{schoolCode}', [MarkInputController::class, 'finData'])->name('findData');
    Route::post('/exam-marks', [MarkInputController::class, 'marksInput'])->name('exam.marks');
    Route::put('/update-mark-input', [MarkInputController::class, 'updateMarkInput'])->name('update.mark.input');
    Route::get('/exam_mark_print/{schoolCode}', [MarkInputController::class, 'printBlankExam'])->name('exam_mark_print');
    Route::post('/download-mark-excel', [MarkInputController::class, 'downloadExcel'])->name('downloadExcel.mark');
    Route::get('/full_marks_print/{schoolCode}', [MarkInputController::class, 'full_marks_print'])->name('full_marks_print');
    Route::post('/mark-input-excel-upload', [MarkInputController::class, 'mark_input_excel_uplaod'])->name('mark.input.excel.upload');

    Route::get('/exam_process/{schoolCode}', [ExamProcessController::class, 'exam_process']);
    Route::post('/exam_process/get-groups/{schoolCode}', [ExamProcessController::class, 'getGroups'])->name('exam_process.get-groups');
    Route::post('/exam_process/get-sections/{schoolCode}', [ExamProcessController::class, 'getSections'])->name('exam_process.get-sections');
    Route::post('/exam_process/get-student/{schoolCode}', [ExamProcessController::class, 'getStudent'])->name('exam_process.get-student');
    Route::post('/exam_process/progress/{schoolCode}', [ExamProcessController::class, 'examProcess'])->name('exam_process');


    Route::get('/getStudents/{schoolCode}/{class}/{group}/{section}', [ExamProcessController::class, 'getStudents']);
    Route::get('/exam_excel/{schoolCode}', [ExamResultController::class, 'exam_excel']);
    Route::get('/exam_marks_delete/{schoolCode}', [ExamMarksDeleteController::class, 'exam_marks_delete']);
    Route::put('/deleteMarks/{schoolCode}', [ExamMarksDeleteController::class, 'deleteMarks'])->name('exam-marks.delete');
    Route::get('/getData/{schoolCode}', [ExamMarksDeleteController::class, 'finData'])->name('getData');
    Route::get('/exam_sms/{schoolCode}', [ExamResultController::class, 'exam_sms']);
    // exam-report
    Route::get('/progressReport/{schoolCode}', [ProgressReportController::class, 'progressReport']);
    Route::get('/downloadProgressReport/{schoolCode}', [ProgressReportController::class, 'downloadProgressReport']);
    Route::post('/exam/get-groups/{schoolCode}', [ProgressReportController::class, 'getGroups'])->name('exam.get-groups');
    Route::post('/exam/get-sections/{schoolCode}', [ProgressReportController::class, 'getSections'])->name('exam.get-sections');
    Route::post('/exam/get-student/{schoolCode}', [ProgressReportController::class, 'getStudent'])->name('exam.get-student');
    Route::get('/exam_process/progressStudent/{schoolCode}', [ProgressReportController::class, 'progressStudent'])->name('exam_progressStudent');


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
    Route::post('/getContact', [SendMSGController::class, 'getContact'])->name('getContact');
    Route::post('/messages/get-groups/{schoolCode}', [SendMSGController::class, 'getGroups'])->name('messages.get-groups');
    Route::post('/messages/get-sections/{schoolCode}', [SendMSGController::class, 'getSections'])->name('messages.get-sections');
    Route::post('/messages/get-shifts/{schoolCode}', [SendMSGController::class, 'getShifts'])->name('messages.get-shifts');
    Route::post('/sendMessage', [SendMSGController::class, 'sendMessage'])->name('sendMessage');
    Route::delete('/delete_contact/{id}', [SendMSGController::class, 'delete_add_contact'])->name('delete.contact');
    Route::delete('/delete_selected_contacts', [SendMSGController::class, 'deleteSelectedContacts']);




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
    Route::delete('/delete_class_wise_subject/{id}', [AddSubjectSetupController::class, 'delete_add_class_wise_subject'])->name('delete.class.wise.subject');
    Route::post('/add-subject/get-groups/{schoolCode}', [AddSubjectSetupController::class, 'getGroups'])->name('add.subject.get-groups');



    // Common Setting End .............................................................................................................


    // Exam Setting Start .............................................................................................................

    // Add Grade Point
    Route::get('/addGradePoint/{schoolCode}', [AddGradePointController::class, 'add_grade_point'])->name('add.grade.point');
    Route::put('/addGradePoint/{schoolCode}', [AddGradePointController::class, 'store_add_grade_point'])->name('store.grade.point');
    Route::delete('/delete_grade_point/{id}', [AddGradePointController::class, 'delete_add_grade_point'])->name('delete.grade.point');

    //subject setup view
    Route::get('/view-subject-setup/{schoolCode}',[SubjectSetupViewController::class,'viewSubjectSetup'])->name('view.subject.setup');
    Route::post('/get-subject-config-data/{schoolCode}',[SubjectSetupViewController::class,'getSubjectConfigData'])->name('get.subject.config.view');

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
    Route::get('/view-set-exam-marks/{schoolCode}', [SetExamMarksController::class, 'viewSetExamMarks'])->name('view.set.exam.marks');
    Route::post('/get-set-exam-marks-data/{schoolCode}', [SetExamMarksController::class, 'getSetExamMarksData'])->name('get.set.class.exam.marks.data');
    Route::post('/set-exam-marks/get-groups/{schoolCode}', [SetExamMarksController::class, 'getGroups'])->name('set.exam.marks.get-groups');
    Route::delete('/delete-exam-marks/{id}/{schoolCode}', [SetExamMarksController::class, 'deleteExamMarks'])->name('delete.set.exam.marks');

    //forth subject

    Route::get('/setForthSubject/{school_code}', [FourthSubjectController::class, 'fourthSubject'])->name('set.Forth.Subject');
    Route::post('/addFourthSubject/{school_code}', [FourthSubjectController::class, 'addFourthSubject'])->name('addFourthSubject');
    Route::post('/saveFourthSubject/{school_code}', [FourthSubjectController::class, 'saveFourthSubject'])->name('saveFourthSubject');
    Route::get('/viewFourthSubject/{school_code}', [FourthSubjectController::class, 'viewFourthSubject'])->name('viewFourthSubject');
    Route::post('/getFourthSubject/{school_code}', [FourthSubjectController::class, 'getFourthSubject'])->name('getFourthSubject');
    Route::delete('/deleteFourthSubject/{id}/{school_code}', [FourthSubjectController::class, 'deleteFourthSubject'])->name('deleteFourthSubject');



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
    // Route::get('/viewExamMarkSetup/{schoolCode}', [ViewExamMarkSetUpController::class, 'viewExamMarkSetup']);

    //sequential wise exam
    Route::get('/SequentialExam/{schoolCode}', [SequentialWiseExamController::class, 'SequentialExam'])->name('sequentialExam');
    Route::put('/SetExamMarks/{schoolCode}', [SequentialWiseExamController::class, 'store_sequential_exam'])->name('store.sequentialExam');
    //sequential wise exam
    Route::get('/SetExamMarks', [SetExamMarksController::class, 'SetExamMarks']);

    //Set signature
    Route::get('/SetSignature/{schoolCode}', [SetSignatureController::class, 'SetSignature'])->name('view.signature');
    Route::post('/getSignatureData/{schoolCode}', [SetSignatureController::class, 'getSignatureData'])->name('get.signature.data');
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
    Route::get('/allFees/getGroups/{schoolCode}', [AllFeesController::class, 'GetGroupsAccordingToClass'])->name('allFeesReport.getGroups');
    Route::get('/allFees/getData/{schoolCode}', [AllFeesController::class, 'GetAllFeesReportData'])->name('allFeesReport.getData');
    Route::get('/allFees/print/{schoolCode}', [AllFeesController::class, 'FeesReportDataPrint'])->name('allFeesReport.print');
    // Report (Fees Setting) => All Pay Slip
    Route::get('/reportFeesSettings/allPaySlip/{schoolCode}', [AllPaySlipController::class, 'AllPaySlipView'])->name('allPaySlipReport.view');
    Route::get('/reportFeesSettings/allPaySlip/getGroups/{schoolCode}', [AllPaySlipController::class, 'GetGroupsAccordingToClass'])->name('allPaySlipReport.getGroups');
    Route::get('/allPaySlip/print/{schoolCode}', [AllPaySlipController::class, 'AllPaySlipPrint'])->name('allPaySlip.print');
    // Report (Fees Setting) => Individual Pay Slip
    Route::get('/reportFeesSettings/individualPaySlip/{schoolCode}', [IndividualPaySlipController::class, 'IndividualPaySlipView'])->name('individualPaySlipReport.view');
    Route::get('reportFeesSettings/PrintindividualPaySlip/{schoolCode}', [IndividualPaySlipController::class, 'PrintIndividualPaySlip'])->name('individualPaySlipReport.print');
    // Report (Fees Setting) => Individual Waiver
    Route::get('/reportFeesSettings/individualWaiver/{schoolCode}', [IndividualWaiverController::class, 'IndividualWaiverView'])->name('individualWaiverReport.view');
    Route::get('/individualWaiver/getStudentInfo/{schoolCode}', [IndividualWaiverController::class, 'GetStudentInformation']);
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
    Route::get('/setAdmitCard/{schoolCode}', [AddAdmitCardController::class, "add_admit_card"])->name('add.admit.card');
    Route::put('/setAdmitCard/{schoolCode}', [AddAdmitCardController::class, 'store_add_admit_card'])->name('store.add.admit.card');
    Route::put('/updateAdmitCard/{schoolCode}', [AddAdmitCardController::class, 'update_add_admit_card'])->name('update.add.admit.card');


    //Print Admit Card
    Route::get('/printAdmitCard/{schoolCode}', [PrintAdmitCardController::class, "printAdmitCard"])->name('printAdmitCard');
    Route::post('/downloadAdmit/{schoolCode}', [PrintAdmitCardController::class, "downloadAdmit"])->name('downloadAdmitCard');
    Route::post('/print/get-groups/{schoolCode}', [PrintAdmitCardController::class, 'printGroups'])->name('print.get-groups');
    Route::post('/print/get-sections/{schoolCode}', [PrintAdmitCardController::class, 'printSections'])->name('print.get-sections');
    Route::get('/get-student-ids/{schoolCode}', [PrintAdmitCardController::class, 'getStudentIds'])->name('getStudentIds');


    //Print Seat Plan
    Route::get('/printSeatPlan/{schoolCode}', [PrintSeatPlanController::class, "printSeatPlan"])->name('printSeatPlan');
    Route::post('/downloadPrint/{schoolCode}', [PrintSeatPlanController::class, "downloadPrint"])->name('downloadPrint');


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


    //Machine Attendance
    // time settings
    Route::get('/std-time-setting/{schoolCode}', [StudentTimeSettingController::class, 'viewTimeSetting'])->name('std.time.setting');
    Route::post('/get-stu-time-set/{schoolCode}', [StudentTimeSettingController::class, 'getTimeSetupData'])->name('std.get.time.setting.data');
    Route::post('/post-student-time-setup/{schoolCode}', [StudentTimeSettingController::class, 'postStudentTimeSetup'])->name('post.student.time.set.up');
    Route::get('/view-student-time-config/{schoolCode}', [StudentTimeSettingController::class, 'viewStudentTimeSetupConfig'])->name('view.student.time.config');
    Route::post('/get-time-config-data/{schoolCode}', [StudentTimeSettingController::class, 'viewConfigTable'])->name('view.get.time.config.table');

    // machine Id Integrate
    Route::get('/std-machine-integrate/{schoolCode}', [StudentMachineIntegrateController::class, 'viewMachineIntegrade'])->name('std.machine.integrate');

    Route::post('/std-machine/get-groups/{schoolCode}', [StudentMachineIntegrateController::class, 'getGroups'])->name('std-machine.get-groups');
    Route::post('/std-machine/get-sections/{schoolCode}', [StudentMachineIntegrateController::class, 'getSections'])->name('std-machine.get-sections');
    Route::get('/student-machine-integrate/{schoolCode}', [StudentMachineIntegrateController::class, 'getData'])->name('student.machine.integrate.get.data');
    Route::post('/save-student-machine-integrate/{schoolCode}', [StudentMachineIntegrateController::class, 'SaveStudentMachineIntegrate'])->name('save.student.machine.integrate');


    // Std machine user list
    Route::get('/std-machine-user-list/{schoolCode}', [StudentMachinUserListController::class, 'viewStdMachineUserList'])->name('std.machine.user.list');
});
