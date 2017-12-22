<?php

namespace App\Http\Controllers\Admin;

use App\Patient;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePatientsRequest;
use App\Http\Requests\Admin\UpdatePatientsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\Datatables\Datatables;

class PatientsController extends Controller
{
    use FileUploadTrait;
    // $user = \Auth::user()

    /**
     * Display a listing of Patient.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (! Gate::allows('patient_access')) {
            return abort(401);
        }

        // if ($user->role_id=1) {
        //     # code...
        // }
        // if () {
        //    return('admin')
        // }

// foreach (\App\Patient::all() as $patient) { 
// $dt = $patient->assigned_therapist->


        // ->join('patient_user', function ($join) {
        //     $join->on('patient_user.patient_id', '=', 'patients.id')
        //     ->where('patient_user.user_id','=', $this->users->id ) }) 

        //     ->get();

        //     ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
        //     $join->on('users.id', '=', 'contacts.user_id')


        // ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();
if(Auth::user()->role->title == 'Staffs'){
         if (request()->ajax()) {
            // foreach (\App\Patient::all() as $patient) { 
            $id = Auth::user()->id;
            $query = Patient::query();
            // $query->with("assigned_therapist")->where('name','Antonio Banderas');
            $query->with("assigned_therapist")->JOIN('patient_user','patient_user.patient_id', '=', 'patients.id')
            ->where('patient_user.user_id', '=', $id );
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                if (! Gate::allows('patient_delete')) {
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
                $gateKey  = 'patient_';
                $routeKey = 'admin.patients';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('assigned_therapist.name', function ($row) {
                if(count($row->assigned_therapist) == 0) {
                    return '';
                }

                return '<span class="label label-info label-many">' . implode('</span><span class="label label-info label-many"> ',
                        $row->assigned_therapist->pluck('name')->toArray()) . '</span>';
            });
            $table->editColumn('image', function ($row) {
                if($row->image) { return '<a href="'. asset(env('UPLOAD_PATH').'/' . $row->image) .'" target="_blank"><img src="'. asset(env('UPLOAD_PATH').'/thumb/' . $row->image) .'"/>'; };
            });

            return $table->make(true);
        }

        return view('admin.patients.index');

}else

        if (request()->ajax()) {
            $query = Patient::query();
            $query->with("assigned_therapist");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                if (! Gate::allows('patient_delete')) {
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
                $gateKey  = 'patient_';
                $routeKey = 'admin.patients';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('assigned_therapist.name', function ($row) {
                if(count($row->assigned_therapist) == 0) {
                    return '';
                }

                return '<span class="label label-info label-many">' . implode('</span><span class="label label-info label-many"> ',
                        $row->assigned_therapist->pluck('name')->toArray()) . '</span>';
            });
            $table->editColumn('image', function ($row) {
                if($row->image) { return '<a href="'. asset(env('UPLOAD_PATH').'/' . $row->image) .'" target="_blank"><img src="'. asset(env('UPLOAD_PATH').'/thumb/' . $row->image) .'"/>'; };
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? $row->gender : '';
            });
            $table->editColumn('birthday', function ($row) {
                return $row->birthday ? $row->birthday : '';
            });
            $table->editColumn('guardians_name', function ($row) {
                return $row->guardians_name ? $row->guardians_name : '';
            });
            $table->editColumn('contact_number', function ($row) {
                return $row->contact_number ? $row->contact_number : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('doctors_name', function ($row) {
                return $row->doctors_name ? $row->doctors_name : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });
            $table->editColumn('file', function ($row) {
                if($row->file) { return '<a href="'.asset(env('UPLOAD_PATH').'/'.$row->file) .'" target="_blank">Download file</a>'; };
            });

            return $table->make(true);
        }

        return view('admin.patients.index');
    }

    /**
     * Show the form for creating new Patient.
     *
     * @return \Illuminate\Http\Response
     */
 public function create()
    {
        if (! Gate::allows('patient_create')) {
            return abort(401);
        }
        
        $assigned_therapists = \App\User::get()->pluck('name', 'id');


        return view('admin.patients.create', compact('assigned_therapists'));
    }

    /**
     * Store a newly created Patient in storage.
     *
     * @param  \App\Http\Requests\StorePatientsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientsRequest $request)
    {
        if (! Gate::allows('patient_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $patient = Patient::create($request->all());
        $patient->assigned_therapist()->sync(array_filter((array)$request->input('assigned_therapist')));



        return redirect()->route('admin.patients.index');
    }


    /**
     * Show the form for editing Patient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('patient_edit')) {
            return abort(401);
        }
        
        $assigned_therapists = \App\User::get()->pluck('name', 'id');


        $patient = Patient::findOrFail($id);

        return view('admin.patients.edit', compact('patient', 'assigned_therapists'));
    }

    /**
     * Update Patient in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientsRequest $request, $id)
    {
        if (! Gate::allows('patient_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        $patient->assigned_therapist()->sync(array_filter((array)$request->input('assigned_therapist')));



        return redirect()->route('admin.patients.index');
    }


    /**
     * Display Patient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('patient_view')) {
            return abort(401);
        }
        
        $assigned_therapists = \App\User::get()->pluck('name', 'id');
        $schedules = \App\Schedule::where('patient_id', $id)->get();

        $patient = Patient::findOrFail($id);

        return view('admin.patients.show', compact('patient', 'schedules'));
    }


    /**
     * Remove Patient from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('patient_delete')) {
            return abort(401);
        }
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('admin.patients.index');
    }

    /**
     * Delete all selected Patient at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('patient_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Patient::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Patient from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('patient_delete')) {
            return abort(401);
        }
        $patient = Patient::onlyTrashed()->findOrFail($id);
        $patient->restore();

        return redirect()->route('admin.patients.index');
    }

    /**
     * Permanently delete Patient from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('patient_delete')) {
            return abort(401);
        }
        $patient = Patient::onlyTrashed()->findOrFail($id);
        $patient->forceDelete();

        return redirect()->route('admin.patients.index');
    }
}
