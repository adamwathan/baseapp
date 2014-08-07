<?php

return [
    'providers' => append_config([
        'Vehikl\Faktory\FaktoryServiceProvider',
    ]),
    'aliases' => append_config([
        'Faktory' => 'Vehikl\Faktory\Facades\Faktory',
    ]),
];
