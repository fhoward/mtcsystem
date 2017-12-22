<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\User;

class ReportsController extends Controller
{
    public function patientReport()
    {
        $reportTitle = 'Patient Report';
        $reportLabel = 'COUNT';
        $chartType   = 'line';

        $results = Patient::get()->sortBy('created_at')->groupBy(function ($entry) {
            if ($entry->created_at instanceof \Carbon\Carbon) {
                return \Carbon\Carbon::parse($entry->created_at)->format('Y-m-d');
            }

            return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->created_at)->format('Y-m-d');
        })->map(function ($entries, $group) {
            return $entries->count('id');
        });

        return view('admin/reports', compact('reportTitle', 'results', 'chartType', 'reportLabel'));
    }

    public function employeeReport()
    {
        $reportTitle = 'Employee Report';
        $reportLabel = 'COUNT';
        $chartType   = 'line';

        $results = User::get()->sortBy('created_at')->groupBy(function ($entry) {
            if ($entry->created_at instanceof \Carbon\Carbon) {
                return \Carbon\Carbon::parse($entry->created_at)->format('Y-m-d');
            }

            return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->created_at)->format('Y-m-d');
        })->map(function ($entries, $group) {
            return $entries->count('id');
        });

        return view('admin/reports', compact('reportTitle', 'results', 'chartType', 'reportLabel'));
    }

}
