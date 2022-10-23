<?php

namespace App\Actions;

class ChangeQueue
{
    /**
     * @param $oldDue
     * @param $newDue
     * @return array
     */
    private function execute($oldDue, $newDue)
    {
        if ( $oldDue == $newDue ){
            return [
                'dateChanged' => false
            ];
        }

        $log_data = [
            'old_due' => $oldDue,
            'new_due' => $newDue
        ];

        return [
            'dateChanged' => true, 
            'log_data' => $log_data
        ];
    }
}
