<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller\Api;

use App\Controller\AbstractController;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;

use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

#[Controller(prefix: '/api/index')]
class IndexController extends AbstractController
{
    #[GetMapping(path: 'index')]
    public function index()
    {
        $user   = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method'  => $method,
            'message' => "Hello {$user}.",
        ];
    }

    #[PostMapping(path: 'file')]
    public function file(\League\Flysystem\Filesystem $filesystem)
    {
        /**
         * @var \Hyperf\HttpMessage\Upload\UploadedFile $file
         */
        $file = $this->request->file('file');

        $stream = fopen($file->getRealPath(), 'r+');

        $md5       = md5_file($file->getRealPath());
        $sfilename = $md5 . ".{$file->getExtension()}";


        $sfilepath = 'uploads/' . date('Y/m/d/') . $sfilename . '.file';

        $sfileurl =$filesystem->publicUrl('uploads/' . date('Y/m/d/') . $sfilename);

        $res = $filesystem->writeStream(
            $sfilepath,
            $stream
        );
        fclose($stream);
//        dump($res);
        return [
            'data'    => [
                'is_file'   => $file->isFile(),
                'file_name' => $file->getClientFilename(),
                'file_type' => $file->getClientMediaType(),
                'ext'       => $file->getExtension(),
                'path'      => $sfilepath,
                'url'       => $sfileurl
            ],
            'message' => "成功",
        ];

    }


    /**
     *
     * @param $path
     * @param ResponseInterface $response
     * @param \League\Flysystem\Filesystem $filesystem
     * @return Psr7ResponseInterface
     * @throws \League\Flysystem\FilesystemException
     * @author dongasai
     * Date 2023/12/15 14:45
     */
    public function fileget($path, ResponseInterface $response, \League\Flysystem\Filesystem $filesystem)
    {

        $steam = $filesystem->read($path . '.file');
        return $response->raw($steam);

    }
}
