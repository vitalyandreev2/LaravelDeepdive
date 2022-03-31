<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(int $idCategory, int $id = null): array
    {
        $faker = Factory::create();
        $statusList = ["DRAFT", "ACTIVE", "BLOCKED"];

        if ($id) {
           return [
            'id' => $id,
            'title' => $faker->jobTitle(),
            'author' => $faker->userName(),
            'image' => $faker->imageUrl(100, 50),
            'status' => $statusList[mt_rand(0, 2)],
            'description' => $faker->text(100)
           ];
        }

        $data = [];
        for ($i=1; $i <= 10; $i++) { 
            $data[] = [
                'id' => $i,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(200, 100),
                'status' => $statusList[mt_rand(0, 2)],
                'description' => $faker->text(100)
            ];
        }

        return $data;
    }

    public function getCategory(int $id = null): array
    {
        $faker = Factory::create();
        $statusList = ["DRAFT", "ACTIVE", "BLOCKED"];

        if ($id) {
            $data = [];
            for ($i=1; $i <= 10; $i++) { 
                $data[] = [
                    'id' => $i,
                    'idCategory' => $id,
                    'title' => $faker->jobTitle(),
                    'author' => $faker->userName(),
                    'image' => $faker->imageUrl(200, 100),
                    'status' => $statusList[mt_rand(0, 2)],
                    'description' => $faker->text(100)
                ];
            }
    
            return $data;
        }

        $data = [];
        for ($i=1; $i <= 5; $i++) { 
            $data[] = [
                'id' => $i,
                'title' => $faker->jobTitle()
            ];
        }

        return $data;
    }
}
