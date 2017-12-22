<?php

namespace App\Http\Controllers\Admin;

use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSchedulesRequest;
use App\Http\Requests\Admin\UpdateSchedulesRequest;
use Yajra\Datatables\Datatables;
use Auth;
// ->where('staff_id',3)
class SchedulesController extends Controller
{
    /**
     * Display a listing of Schedule.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('schedule_access')) {
            return abort(401);
        }


if(Auth::user()->role->title == 'Staffs'){
    $id = Auth::user()->id;
        if (request()->ajax()) {
            $query = Schedule::query();
            $query->with("staff")->where('staff_id',$id);
            $query->with("patient");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('schedule_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'schedule_';
                $routeKey = 'admin.schedules';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('staff.name', function ($row) {
                return $row->staff ? $row->staff->name : '';
            });
            $table->editColumn('patient.name', function ($row) {
                return $row->patient ? $row->patient->name : '';
            });
            $table->editColumn('activity', function ($row) {
                return $row->activity ? $row->activity : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('date', function ($row) {
                return $row->date ? $row->date : '';
            });
            $table->editColumn('start', function ($row) {
                return $row->start ? $row->start : '';
            });
            $table->editColumn('end', function ($row) {
                return $row->end ? $row->end : '';
            });

            return $table->make(true);
        }

         return view('admin.schedules.index');
}else
        
          if (request()->ajax()) {
            $query = Schedule::query();
            $query->with("staff");
            $query->with("patient");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('schedule_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'schedule_';
                $routeKey = 'admin.schedules';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('staff.name', function ($row) {
                return $row->staff ? $row->staff->name : '';
            });
            $table->editColumn('patient.name', function ($row) {
                return $row->patient ? $row->patient->name : '';
            });
            $table->editColumn('activity', function ($row) {
                return $row->activity ? $row->activity : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('date', function ($row) {
                return $row->date ? $row->date : '';
            });
            $table->editColumn('start', function ($row) {
                return $row->start ? $row->start : '';
            });
            $table->editColumn('end', function ($row) {
                return $row->end ? $row->end : '';
            });

            return $table->make(true);
        }

        return view('admin.schedules.index');
    }

    /**
     * Show the form for creating new Schedule.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('schedule_create')) {
            return abort(401);
        }
        
        $staff = \App\User::get()->pluck('name', 'id')->prepend('Please select', '');
        $patients = \App\Patient::get()->pluck('name', 'id')->prepend('Please select', '');

        return view('admin.schedules.create', compact('staff', 'patients'));
    }

    /**
     * Store a newly created Schedule in storage.
     *
     * @param  \App\Http\Requests\StoreSchedulesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSchedulesRequest $request)
    {
        if (! Gate::allows('schedule_create')) {
            return abort(401);
        }
        $schedule = Schedule::create($request->all());



        return redirect()->route('admin.schedules.index');
    }


    /**
     * Show the form for editing Schedule.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('schedule_edit')) {
            return abort(401);
        }
        
        $staff = \App\User::get()->pluck('name', 'id')->prepend('Please select', '');
        $patients = \App\Patient::get()->pluck('name', 'id')->prepend('Please select', '');

        $schedule = Schedule::findOrFail($id);

        return view('admin.schedules.edit', compact('schedule', 'staff', 'patients'));
    }

    /**
     * Update Schedule in storage.
     *
     * @param  \App\Http\Requests\UpdateSchedulesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSchedulesRequest $request, $id)
    {
        if (! Gate::allows('schedule_edit')) {
            return abort(401);
        }
        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());



        return redirect()->route('admin.schedules.index');
    }


    /**
     * Display Schedule.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('schedule_view')) {
            return abort(401);
        }
        $schedule = Schedule::findOrFail($id);

        return view('admin.schedules.show', compact('schedule'));
    }


    /**
     * Remove Schedule from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('schedule_delete')) {
            return abort(401);
        }
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('admin.schedules.index');
    }

    /**
     * Delete all selected Schedule at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('schedule_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Schedule::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Schedule from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('schedule_delete')) {
            return abort(401);
        }
        $schedule = Schedule::onlyTrashed()->findOrFail($id);
        $schedule->restore();

        return redirect()->route('admin.schedules.index');
    }

    /**
     * Permanently delete Schedule from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('schedule_delete')) {
            return abort(401);
        }
        $schedule = Schedule::onlyTrashed()->findOrFail($id);
        $schedule->forceDelete();

        return redirect()->route('admin.schedules.index');
    }
}
