<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\Datatables\Datatables;
use Auth;


class UsersController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = User::query();
            $query->with("role");
            $query->with("profession");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('user_delete')) {
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
                $gateKey  = 'user_';
                $routeKey = 'admin.users';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('avatar', function ($row) {
                if($row->avatar) { return '<a href="'. asset(env('UPLOAD_PATH').'/' . $row->avatar) .'" target="_blank"><img src="'. asset(env('UPLOAD_PATH').'/thumb/' . $row->avatar) .'"/>'; };
            });
            $table->editColumn('emp_id', function ($row) {
                return $row->emp_id ? $row->emp_id : '';
            });
            $table->editColumn('password', function ($row) {
                return '---';
            });
            $table->editColumn('confirm_password', function ($row) {
                return $row->confirm_password ? $row->confirm_password : '';
            });
            $table->editColumn('rfid_no', function ($row) {
                return $row->rfid_no ? $row->rfid_no : '';
            });
            $table->editColumn('remember_token', function ($row) {
                return $row->remember_token ? $row->remember_token : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? $row->gender : '';
            });
            $table->editColumn('contact_no', function ($row) {
                return $row->contact_no ? $row->contact_no : '';
            });
            $table->editColumn('profession.profession', function ($row) {
                return $row->profession ? $row->profession->profession : '';
            });
            $table->editColumn('prc_number', function ($row) {
                return $row->prc_number ? $row->prc_number : '';
            });
            $table->editColumn('sss_id', function ($row) {
                return $row->sss_id ? $row->sss_id : '';
            });
            $table->editColumn('tin_no', function ($row) {
                return $row->tin_no ? $row->tin_no : '';
            });
            $table->editColumn('philhealth_id', function ($row) {
                return $row->philhealth_id ? $row->philhealth_id : '';
            });
            $table->editColumn('guardian_name', function ($row) {
                return $row->guardian_name ? $row->guardian_name : '';
            });
            $table->editColumn('guardian_contact_no', function ($row) {
                return $row->guardian_contact_no ? $row->guardian_contact_no : '';
            });
            $table->editColumn('guardian_address', function ($row) {
                return $row->guardian_address ? $row->guardian_address : '';
            });

            return $table->make(true);
        }

        return view('admin.users.index');
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id')->prepend('Please select', '');
        $professions = \App\Profession::get()->pluck('profession', 'id')->prepend('Please select', '');

        return view('admin.users.create', compact('roles', 'professions'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }

        $request = $this->saveFiles($request);
        $user = User::create($request->all());



        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id')->prepend('Please select', '');
        $professions = \App\Profession::get()->pluck('profession', 'id')->prepend('Please select', '');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles', 'professions'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }

        $request = $this->saveFiles($request);
        $user = User::findOrFail($id);
        $user->update($request->all());



        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id')->prepend('Please select', '');
        $professions = \App\Profession::get()->pluck('profession', 'id')->prepend('Please select', '');$patients = \App\Patient::whereHas('assigned_therapist',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();$schedules = \App\Schedule::where('staff_id', $id)->get();

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user', 'patients', 'schedules'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('admin.users.index');
    }

    /**
     * Permanently delete User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();

        return redirect()->route('admin.users.index');
    }

    public function profile(){
        return view('admin/profile', array('usermoto' => Auth::user() ));

    }

    // public function update_avatar(Request $request){

    //     //Handle the upload
    //     if ($request->hasFile('avatar')) {

    //         $request = $this->saveFiles($request);
    //         $user = Auth::user();
    //         $user->avatar= $request;
    //         $user->save();
    //     }

    //     return view('/admin/profile', array('usermoto' => Auth::user()));
    // }
}
