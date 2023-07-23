<?php


namespace App\Services\Posts;

use App\Models\Posts\PostCategories;
use App\Models\Posts\Posts;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostsParserService
{
    public function parseXml($file)
    {
        try {
            $data = $this->getArrayFromFile($file);

            DB::transaction(function () use ($data) {
                $posts = [];
                foreach ($data as $category) {
                    //Translating text into code for proper URL operations
                    $categoryId = $this->getCategoryIdAfterImportingToTable($category['Category']['Name']);
                    $posts = array_merge($posts, $this->importPostsToTable($category['Category']['Elements'], $categoryId));
                }
                Posts::insert($posts);
            });
            $status = true;
        } catch (\Exception $e) {
            $status = false;
        }

        return $status;
    }

    private function getArrayFromFile($file)
    {
        $xml = simplexml_load_file($file);
        $json = json_encode($xml);

        return json_decode($json,true);
    }

    private function getCategoryIdAfterImportingToTable(string $categoryName)
    {
        return PostCategories::insertGetId([
            'name' => $categoryName,
            'code' => str_slug($categoryName),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    private function importPostsToTable(array $posts, int $categoryId)
    {
        $result = [];
        foreach ($posts as $post) {
            $result[] = [
                'name' => $post['Name'],
                'code' => str_slug($post['Name']),
                'description' => $post['Description'],
                'category_id' => $categoryId,
                //It's not time yet
//                'preview_picture' => !empty($post['Pict1']) ? $this->savePictureFromSomeSite($post['Pict1']) : null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        return $result;
    }

    private function savePictureFromSomeSite($link)
    {
        $link = htmlspecialchars($link);
        $extensions = [
            'png',
            'svg',
            'jpeg',
            'jpg',
            'webp',
        ];

        //Checking image access
        print_r($link);
        echo '<br';
        $ch = curl_init($link);
        curl_setopt($ch,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (!curl_exec($ch)) {
            return;
        }
        $content = file_get_contents($link);
        $pathInfo = pathinfo($link);
        if (empty($pathInfo['extension']) || !in_array($pathInfo['extensions'], $extensions)) {
            $currentExt = 'webp';
        } else {
            $currentExt = $pathInfo['extension'];
        }

        $fileName = md5($content) . $currentExt;
        Storage::disk('temp')->put($fileName, $content);
        $currentFile = Storage::putFile('images', new File(storage_path('temp/' . $fileName)));

        return '/storage/app/' . $currentFile;
    }
}

