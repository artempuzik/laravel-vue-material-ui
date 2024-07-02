<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportCsvData extends Command
{
    protected $signature = 'csv:import {file}';

    protected $description = 'Import data from CSV file to database';

    public function handle()
    {
        $file = $this->argument('file');

        $csvData = array_map('str_getcsv', file($file));
        $headers = array_shift($csvData);

        $rows = [];
        foreach ($csvData as $row) {
            $data = array_combine($headers, $row);
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $rows[] = $data;
        }

        if (!empty($rows)) {
            DB::table('files')->insert($rows);
        }

        $this->info('CSV data imported successfully.');
    }
}

