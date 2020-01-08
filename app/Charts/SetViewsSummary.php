<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class SetViewsSummary extends Chart
{

    public $colors;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->colors = collect([
            '#1975b5',
            '#ff7e00',
            '#20a026',
            '#d8241f',
            '#9564be',
            '#8c5549',
            '#e474c2',
            '#7e7e7e',
            '#bbbd0a',
            '#00bdd0'
        ]);
    }
}
