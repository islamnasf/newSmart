<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Course;
use Carbon\Carbon;

class UpdateExpiredCourses extends Command
{
    protected $signature = 'courses:update-expired';

    protected $description = 'Update the active status of expired courses';

    public function handle()
    {
        $currentDate = now();

        $expiredCourses = Course::where('expiry_date', '<=', $currentDate)->get();

        foreach ($expiredCourses as $course) {
            $course->update(['active' => 0]);
        }

        $this->info('Expired courses updated successfully.');
    }
}
