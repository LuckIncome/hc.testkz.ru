<?php

namespace App\Imports;

use App\Models\Analysis;
use App\Models\Research;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class AnalysisImport implements ToModel, WithHeadingRow, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $researchId = $this->getOrCreateResearch($row['Исследование']);

        $analyze = new Analysis([
            'title' => $row['Название RU'],
            'price' => $row['Цена'],
            'featured' => (stripos($row['Топ'], strtolower('Да')) !== false),
            'status' => (stripos($row['Статус'], strtolower('включен')) !== false),
            'research_id' => $researchId,
            'content' => $row['Контент RU'],
            'sort_id' => Analysis::orderByDesc('sort_id')->first()->sort_id + 1
        ]);
        $analyze->save();

        $analyzeKz = $analyze->translate('kz');
        $analyzeKz->title = $row['Название KZ'];
        $analyzeKz->content = $row['Контент KZ'];
        $analyzeKz->save();

        return $analyze;
    }

    public function getOrCreateResearch($text)
    {
        $research = Research::where('slug', Str::slug($text));
        if ($research->exists()) {
            $research = $research->first();
        } else {
            $research = new Research([
                'title' => $text,
                'slug' => Str::slug($text),
                'seo_title' => $text,
                'meta_description' => $text,
                'meta_keywords' => $text,
                'status' => true,
                'sort_id' => Research::orderByDesc('sort_id')->first()->sort_id + 1
            ]);
            $research->save();
        }
        return $research->id;
    }


    public function batchSize(): int
    {
        return 10;
    }

    public function uniqueBy()
    {
        return 'slug';
    }


    public function chunkSize(): int
    {
        return 10;
    }
}
