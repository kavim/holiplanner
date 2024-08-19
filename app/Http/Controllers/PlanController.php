<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Resources\PlanResource;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PlanController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PlanResource::collection(Plan::all()->keyBy->id);
    }

    public function store(StorePlanRequest $request)
    {
        $plan = Plan::create($request->validated());

        $plan->participants()->sync($request->input('participants', []));

        $plan->participants()->syncWithoutDetaching(auth()->id(), ['is_owner' => true]);

        return new PlanResource($plan);
    }

    public function show($id): PlanResource|JsonResponse
    {
        try {
            $plan = Plan::findOrFail($id);

            return new PlanResource($plan);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Plan not found.',
                'message' => 'The plan with the given ID does not exist.',
            ], Response::HTTP_NOT_FOUND);
        }
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

    public function generatePdf(Plan $plan)
    {
        try {
            $pdf = Pdf::loadView('pdf.holiday_plan', ['plan' => $plan]);

            return $pdf->download("holiday_plan_{$plan->id}-{now()}.pdf");
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Plan not found.',
                'message' => 'The plan with the given ID does not exist.',
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An unexpected error occurred.',
                'message' => 'Please try again later.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
