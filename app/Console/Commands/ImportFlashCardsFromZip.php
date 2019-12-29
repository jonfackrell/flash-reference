<?php

namespace App\Console\Commands;

use App\Imports\CardsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use ZanySoft\Zip\Zip;

class ImportFlashCardsFromZip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cards:import {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import flash cards from zipped file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file = $this->argument('file');
        $path = dirname($this->argument('file'));
        $unzippedPath = $path . DIRECTORY_SEPARATOR . basename($file, '.zip');

        // Extract File
        $zip = Zip::open($file);
        $zip->extract($path);
        $zip->close();

        // Process csv
        // TODO: Make sure we are using user paths
        // TODO: Pass set ID to be used when creating cards
        // TODO: Optimize images and move them to DO Spaces storage
        Excel::import(new CardsImport($unzippedPath), $unzippedPath . DIRECTORY_SEPARATOR . 'cards.csv');

        // Clean up
        Storage::deleteDirectory(str_replace(storage_path('app'), '', $unzippedPath));
        Storage::delete(str_replace(storage_path('app'), '', $file));

    }
}
