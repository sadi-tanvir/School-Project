<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\SchoolInfo;
use App\Models\Student;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\View;
use App\Models\SchoolAdmin;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $schoolAdminData = null;
            $studentData = null;
            $adminData = null;
            $schoolInfo = null;

            $schoolAdminId = Session::get('schoolAdminId');
            $studentId = Session::get('studentId');
            $adminId = Session::get('AdminId');

            $school_code = Session::get('school_code');
            if ($schoolAdminId) {
                $schoolAdminData = SchoolAdmin::find($schoolAdminId);
            }
            if ($studentId) {

                $studentData = Student::find($studentId);
            }
            if ($adminId) {
                $adminData = Admin::find($adminId);
                // dd($adminData);
            }
            if ($school_code) {
                $schoolInfo = SchoolInfo::where('school_code', $school_code)->first();
            }
            $view->with('schoolAdminData', $schoolAdminData)
                ->with('studentData', $studentData)
                ->with('adminData', $adminData)
                ->with('school_code', $school_code)
                ->with('schoolInfo', $schoolInfo);


        });
    }
}
