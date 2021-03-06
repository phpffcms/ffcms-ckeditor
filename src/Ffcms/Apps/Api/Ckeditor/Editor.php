<?php

namespace Ffcms\Apps\Api\Ckeditor;

use Extend\Core\Arch\ApiController;
use Ffcms\Core\App;
use Ffcms\Core\Exception\NativeException;
use Ffcms\Core\Helper\Type\Any;
use Ffcms\Core\Helper\Type\Arr;
use Ffcms\Core\Helper\Date;
use Ffcms\Core\Helper\FileSystem\File;
use Ffcms\Core\Helper\FileSystem\Normalize;
use Ffcms\Core\Helper\Type\Obj;
use Ffcms\Core\Helper\Type\Str;

class Editor extends ApiController
{
    /**
     * Allowed request type and extensions for it
     * @var array
     */
    public $allowedExt = [
        'images' => ['.jpg', '.jpeg', '.gif', '.png', '.bmp', '.svg'],
        'files' => ['.zip', '.rar', '.gz', '.tar', '.bz2', '.bz', '.doc', '.docx', '.xls', '.xlsx', '.txt', '.csv', '.odt', '.pdf', '.djvu'],
        'flash' => ['.swf', '.fla', '.flv']
    ];

    /**
     * Append translation file ;)
     * @throws NativeException
     */
    public function before()
    {
        parent::before();
        // check if user have permission to access there
        if (!App::$User->isAuth() || !App::$User->identity()->role->can('global/file'))
            throw new NativeException('Permission denied');

        App::$Translate->append(__DIR__ . '/Translation/' . App::$Request->getLanguage() . '.php');
    }

    /**
     * Browse files from ckeditor
     * @param string $type
     * @throws NativeException
     * @throws \Ffcms\Core\Exception\SyntaxException
     * @return string
     */
    public function actionBrowse($type)
    {
        $files = null;
        $relative = null;
        // check if request type is defined
        if ($this->allowedExt[$type] === null || !Any::isArray($this->allowedExt[$type])) {
            throw new NativeException('Hack attempt');
        }
        // list files in directory
        $files = File::listFiles('/upload/' . $type, $this->allowedExt[$type]);

        // absolute path to relative URI
        foreach ($files as $file) {
            $newName = Str::sub($file, Str::length(root)+1);
            $relative[] = trim(Str::replace(DIRECTORY_SEPARATOR, '/', $newName), '/');
        }

        // generate response
        return App::$View->render('editor/browse', [
            'callbackName' => App::$Security->strip_tags(App::$Request->query->get('CKEditor')),
            'callbackId' => (int)App::$Request->query->get('CKEditorFuncNum'),
            'files' => $relative,
            'type' => $type
        ], __DIR__);
    }

    /**
     * Upload files from ckeditor
     * @param string $type
     * @return string
     * @throws NativeException
     * @throws \Ffcms\Core\Exception\SyntaxException
     */
    public function actionUpload($type)
    {
        /** @var $loadFile \Symfony\Component\HttpFoundation\File\UploadedFile */
        $loadFile = App::$Request->files->get('upload');
        if ($loadFile === null || $loadFile->getError() !== 0)
            return $this->errorResponse(__('File upload failed'));

        // get file extension
        $fileExt = '.' . $loadFile->guessExtension();
        // check if this request type is allowed
        if ($this->allowedExt[$type] === null || !Any::isArray($this->allowedExt[$type]))
            throw new NativeException('Hack attempt');

        // check if this file extension is allowed to upload
        if (!Arr::in($fileExt, $this->allowedExt[$type])) {
            return $this->errorResponse(__('This file type is not allowed to upload'));
        }

        $date = Date::convertToDatetime(time(), 'd-m-Y');

        // create file hash based on name-size
        $fileNewName = App::$Security->simpleHash($loadFile->getFilename() . $loadFile->getSize()) . $fileExt;
        $savePath = Normalize::diskFullPath('/upload/' . $type . '/' . $date);
        // save file from tmp to regular
        $loadFile->move($savePath, $fileNewName);

        // generate URI of uploaded file
        $url = '/upload/' . $type . '/' . $date . '/' . $fileNewName;

        return App::$View->render('editor/load_success',
            [
                'callbackId' => (int)App::$Request->query->get('CKEditorFuncNum'),
                'url' => $url
            ],
            __DIR__);
    }

    /**
     * Return error message for ckeditor API
     * @param string|null $message
     * @return string
     * @throws \Ffcms\Core\Exception\SyntaxException
     * @return string
     */
    private function errorResponse($message = null)
    {
        if ($message === null)
            $message = 'Unknown error';

        return App::$View->render('editor/load_error', [
            'callbackId' => (int)App::$Request->query->get('CKEditorFuncNum'),
            'message' => $message
        ],__DIR__);
    }
}