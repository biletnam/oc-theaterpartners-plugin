<?php namespace Abnmt\TheaterPartners\Updates;

use System\Models\File as File;

use Abnmt\TheaterPartners\Models\Partner;
use Abnmt\TheaterPartners\Models\Category;

use October\Rain\Database\Updates\Seeder;

class SeedPartnersTable extends Seeder
{

    public function run()
    {

        $data = require_once 'partners.php';

        $path = "./storage/app/partners";
        $fileData = $this->fillArrayWithFileNodes( new \DirectoryIterator( $path ), ["jpg", "png"] );

        foreach ($data as $key => $model) {

            if (array_key_exists('category', $model)) {
                $category = $model['category'];
                $_category = Category::where('name', '=', $category)->first();
                if (is_null($_category)) {
                    $_category = Category::create(['name' => $category]);
                }
                $model['category'] = $_category;
            }

            $model = $this->createModel( 'Abnmt\TheaterPartners\Models\Partner', $model);

            $this->assignImages($model, $fileData);

        }

    }

    private function createModel($modelName, $model)
    {
        $model = $modelName::create($model);

        return $model;
    }


    private function assignImages($model, $fileData)
    {

        if ( array_key_exists($model->slug, $fileData) ) {

            $images = $fileData[$model->slug];

            echo $model->slug . " [";

            foreach ($images as $key => $filePath)
            {

                if ( !is_array($filePath) )
                {
                    $pathinfo = pathinfo($filePath);
                    $check = File::where('attachment_id', '=', $model->id)
                        ->where('attachment_type', '=', get_class($model))
                        ->where('file_name', '=', $pathinfo['basename'])
                        // ->where('field', '=', $pathinfo['filename'])
                        ->first();

                    if ( !is_null($check) ) {
                        if (filemtime($filePath) > $check->updated_at->timestamp) {
                            echo "^";
                            $check->delete();
                        } else {
                            echo "~";
                            continue;
                        }
                    } else {
                        echo "+";
                    }

                    $file = new File();
                    $file->fromFile($filePath);
                    switch ($key) {
                        case 'logo_color':
                            $model->logo_color()->save($file, null, ['title' => $model->title]);
                            break;
                        case 'logo_bw':
                            $model->logo_bw()->save($file, null, ['title' => $model->title]);
                            break;
                        default:
                            echo ' Image ' . $filePath . ' not saved.' . "\n";
                            break;
                    }
                }
            }
            echo "]\n";
        }

    }

    private function fillArrayWithFileNodes( \DirectoryIterator $dir, $ext = ["jpg", "png"] )
    {
        $data = array();
        foreach ( $dir as $node )
        {
            if ( $node->isDir() && !$node->isDot() )
            {
                $data[$node->getFilename()] = self::fillArrayWithFileNodes( new \DirectoryIterator( $node->getPathname() ) );
            }
            elseif ( $node->isFile() && in_array($node->getExtension(), $ext) )
            {
                $data[$node->getBasename('.' . $node->getExtension())] = $node->getPathname();
            }
        }
        return $data;
    }

}