<?php

namespace App\Http\Controllers\Admin;

use App\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProfessionsRequest;
use App\Http\Requests\Admin\UpdateProfessionsRequest;
use Yajra\Datatables\Datatables;

class ProfessionsController extends Controller
{
    /**
     * Display a listing of Profession.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('profession_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('profession_delete')) {
                return abort(401);
            }
            $professions = Profession::onlyTrashed()->get();
        } else {
            $professions = Profession::all();
        }

        return view('admin.professions.index', compact('professions'));
    }

    /**
     * Show the form for creating new Profession.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('profession_create')) {
            return abort(401);
        }
        return view('admin.professions.create');
    }

    /**
     * Store a newly created Profession in storage.
     *
     * @param  \App\Http\Requests\StoreProfessionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfessionsRequest $request)
    {
        if (! Gate::allows('profession_create')) {
            return abort(401);
        }
        $profession = Profession::create($request->all());



        return redirect()->route('admin.professions.index');
    }


    /**
     * Remove Profession from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('profession_delete')) {
            return abort(401);
        }
        $profession = Profession::findOrFail($id);
        $profession->delete();

        return redirect()->route('admin.professions.index');
    }

    /**
     * Delete all selected Profession at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('profession_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Profession::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Profession from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('profession_delete')) {
            return abort(401);
        }
        $profession = Profession::onlyTrashed()->findOrFail($id);
        $profession->restore();

        return redirect()->route('admin.professions.index');
    }

    /**
     * Permanently delete Profession from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('profession_delete')) {
            return abort(401);
        }
        $profession = Profession::onlyTrashed()->findOrFail($id);
        $profession->forceDelete();

        return redirect()->route('admin.professions.index');
    }
}
