<?php namespace Waynelogic\ImageResizer;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class Image
{
    protected static $instance;

    public static function resize($image, $width = null, $height = null, $options = []): string
    {
        if (!self::$instance) {
            self::$instance = new static();
        }
        return self::$instance->prepareImage($image, $width, $height, $options);
    }

    public function prepareImage($image, $width, $height, $newOptions) : string {
        $imageInfo = $this->processImage($image);
        if (strtolower($imageInfo['extension']) === 'svg') {
            return $imageInfo['url'];
        }
        $options = array_replace([
            'mode' => 'crop',
            'offset' => [0, 0],
            'quality' => 100,
            'sharpen' => 0,
            'interlace' => false,
            'extension' => 'auto',
        ], $newOptions);

        $cacheKey = $this->getCacheKey([$imageInfo, $width, $height, $options]);
        $filename = $this->getResizeFilename($cacheKey, $width, $height, $options);

        if (Storage::exists('public/resize/' . $filename)) {
            return $this->getPublicPath($filename);
        };

        $this->imageResize($image, $width, $height, $options, $filename);

        return $this->getPublicPath($filename);
    }

    protected function processImage($image): array
    {
        $result = [
            'url' => null,
            'path' => null,
            'extension' => null,
            'source' => null
        ];
        // Пока что проверяет только стринговый путь
        if (is_string($image)) {
            $path =  File::exists($image) ? $image : null;
            if ($path !== null) {
                $result['url'] = $path;
                $result['path'] = $path;
                $result['extension'] = File::extension($path);
                $result['source'] = 'local';
            }
        }
        return $result;
    }

    private function getCacheKey(array $payload) : string
    {
        $cacheKey = json_encode($payload);
        $dataHolder = (object) ['key' => $cacheKey];
        $cacheKey = $dataHolder->key;
        return md5($cacheKey);
    }

    private function getResizeFilename(string $id, $width, $height, array $options): string
    {
        return "img_{$id}_{$width}_{$height}__{$options['mode']}.{$options['extension']}";
    }

    private function getPublicPath(string $fileName): string
    {
        return URL::asset('storage/resize/'. $fileName);
    }

    private function imageResize($image, $width, $height, array $options, string $fileName): void
    {
        if(!Storage::exists('public/resize')) {
            Storage::makeDirectory('public/resize', 0775, true);
        }
        $filePath = Storage::path('public/resize/' . $fileName);
        Resizer::open($image)->resize($width, $height, $options)->save($filePath);
    }
}
