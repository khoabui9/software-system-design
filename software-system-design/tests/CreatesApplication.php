<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
// public function setUp() {
//         parrent::setUp();
//         $this->prepareForTests();
//     }

//     private function prepareForTests() {
//         Artisan::call('migrate');
//         Mail::pretend(true);
//     }

}
