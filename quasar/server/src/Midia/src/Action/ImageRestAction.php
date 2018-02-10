<?php

namespace Midia\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Midia\Model\Entity\Image;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UploadedFileInterface;
use RuntimeException;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Filter\RealPath;
use Zend\Form\Element\File;
use Zend\Json\Json;

class ImageRestAction extends AbstractMidiaRestAction implements MiddlewareInterface
{
    protected $entity = Image::class;
    private $isFileUploaded = false;
    private $fileUploadedDetails = null;

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function createAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        if (!is_null($this->form)) {
            $this->form->setData($request->getParsedBody());
        }
        if ($this->form->isValid()) {
            if (isset($request->getUploadedFiles()['file']['image'])) {
                $file = $request->getUploadedFiles()['file']['image'];
                $this->isFileUploaded = $this->upload($file);
            }
            if ($this->isFileUploaded) {
                $data = $this->form->getData()['detail'];
                $image = new Image($data);
                $image->setUri($this->uri($this->fileUploadedDetails['path']));
                $data = $image->toArray();
                $entity = $this->service->create($data);
                if ($entity) {
                    return new JsonResponse([
                        'success' => true,
                        'collection' => $entity->toArray(),
                    ]);
                }
            }
        }
        return new JsonResponse([
            'success' => false,
            'message' => 'Server Error',
            'debug' => $data
        ], 505);
    }

    private function upload(UploadedFileInterface $file)
    {
        $filter = new RealPath(true);
        $date = new \DateTime('now');
        $directory = sprintf('public/local/image/%s/%s', $date->format('Y'), $date->format('m'));
        $extension = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
        $basename = md5(password_hash(bin2hex(random_bytes(8)), PASSWORD_ARGON2I));
        $filename = sprintf('%s.%s', $basename, $extension);
        $path = sprintf('%s%s%s', $directory, DIRECTORY_SEPARATOR, $filename);
        if (!$filter->filter($directory)) {
            mkdir($directory, 0755, true);
        }
        try {
            $file->moveTo($path);
            $this->fileUploadedDetails = [
                'target' => $directory,
                'path' => $path,
                'basename' => $basename,
                'filename' => $filename,
                'extension' => $extension
            ];
            return true;
        } catch (RuntimeException $e) {
        }
        return false;
    }

    private function uri($path)
    {
        $info = pathinfo($path);
        $dirname = explode(DIRECTORY_SEPARATOR, pathinfo($path, PATHINFO_DIRNAME));
        array_shift($dirname);
        return implode($dirname, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$info['basename'];
    }
}