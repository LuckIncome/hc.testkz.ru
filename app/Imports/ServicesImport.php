<?php

namespace App\Imports;

use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class ServicesImport implements ToModel, WithHeadingRow, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $serviceTypeId = $this->getOrCreateServiceType($row['Категория']);

        $service = new Service([
            'title' => $row['Название RU'],
            'price' => $row['Цена'],
            'status' => (stripos($row['Статус'], strtolower('включен')) !== false),
            'featured' => (stripos($row['На главной'], strtolower('Да')) !== false),
            'type_id' => $serviceTypeId,
            'content' => $row['Контент RU'],
            'sort_id' => Service::orderByDesc('sort_id')->first()->sort_id + 1
        ]);
        $service->save();

        $serviceKz = $service->translate('kz');
        $serviceKz->title = $row['Название KZ'];
        $serviceKz->content = $row['Контент KZ'];
        $serviceKz->save();

        return $service;
    }

    public function getOrCreateServiceType($text)
    {
        $serviceType = ServiceType::where('slug', Str::slug($text));
        if ($serviceType->exists()) {
            $serviceType = $serviceType->first();
        } else {
            $serviceType = new ServiceType([
                'title' => $text,
                'slug' => Str::slug($text),
                'seo_title' => $text,
                'meta_description' => $text,
                'meta_keywords' => $text,
                'status' => true,
                'sort_id' => ServiceType::orderByDesc('sort_id')->first()->sort_id + 1
            ]);
            $serviceType->save();
        }
        return $serviceType->id;
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
