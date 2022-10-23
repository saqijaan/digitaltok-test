<?php

namespace App\Actions;

class ChangeCompletedStatus
{
    /**
     * @param $job
     * @param $data
     * @return bool
     */
    private function execute($job, $data)
    {
        //        if (in_array($data['status'], ['withdrawnbefore24', 'withdrawafter24', 'timedout'])) {
        $job->status = $data['status'];
        if ($data['status'] == 'timedout') {
            if ($data['admin_comments'] == '') return false;
            $job->admin_comments = $data['admin_comments'];
        }
        $job->save();
        
        return true;
    }
}
