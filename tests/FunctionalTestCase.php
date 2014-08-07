<?php

class FunctionalTestCase extends TestCase {

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
    }
}
