<?php

namespace App\Http\Controllers;

use App\Actions\StoreJobAction;
use App\Actions\UpdateJobAction;
use App\Http\Requests\Jobs\StoreJobRequest;
use App\Http\Requests\Jobs\UpdateJobRequest;
use App\Models\User;
use App\Services\JobsService;
use Exception;

class BookingController
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $jobsService = JobsService::makeFrom($request)

        /** @var \App\Models\User|null */
        $user = User::find($request->get('user_id'));

        if ( $user ){
            return response()->json(
                $jobsService->getJobsFor(User::findOrFail($userId))
            );
        }
        
        $user = $request->__authenticatedUser;
        
        if ( $user->isAdmin() || $user->isSuperAdmin() ){
            return response()->json(
                $jobsService->getAllJobs($request)
            );
        }

        throw new Exception("Unauthenticated");
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(StoreJobRequest $request)
    {
        return response(
            app(StoreJobAction::class)->execute($request->__authenticatedUser, $data)
        );
    }

    /**
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function update(Job $job, UpdateJobRequest $request)
    {
        return response(
            app(UpdateJobAction::class)->execute($job, $request)
        );
    }
}
