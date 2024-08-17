<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Resources\PlanResource;

class PlanController extends Controller
{
    public function index()
    {
        return PlanResource::collection(Plan::all()->keyBy->id);
    }

    public function store(StorePlanRequest $request)
    {
        $plan = Plan::create($request->validated());

        $plan->participants()->sync($request->input('participants', []));

        return new PlanResource($plan);
    }

    public function show(Plan $plan)
    {
        return new PlanResource($plan);
    }

    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        $plan->update($request->validated());

        if($request->has('participants')) {
            $plan->participants()->sync($request->input('participants', []));
        }

        return new PlanResource($plan);
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return response()->noContent();
    }
}
