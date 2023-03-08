<?php

namespace App\Http\Controllers\Api;

use App\Models\ProjectUser;
use App\Models\AuditProject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuditProjectResource;
use App\Http\Resources\AuditCollection;

class AuditController extends Controller
{
    public function index(Request $request)
    {
        $audits = AuditProject::with('users','status')->filter()->paginate(8);
        //return response()->json(AuditProjectResource::collection($audits));
        return new AuditCollection($audits);
    }

    public function lead(Request $request)
    {
        $audits =ProjectUser::with(['user','role','status'])
        ->whereHas('user', function ($q) {
            $q->where('id', auth()->id());
        })
        ->filter()
        ->lead()
        ->paginate(8);
        return new AuditCollection($audits);
    }

    public function me(Request $request)
    {
        $audits = auth()->user()->myProjects()->filter()->with('status')->paginate(8);
        return new AuditCollection($audits);
    }
}
