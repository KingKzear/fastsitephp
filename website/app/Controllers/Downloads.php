<?php
namespace App\Controllers;

use FastSitePHP\Application;
use FastSitePHP\Web\Response;

class Downloads
{
    /**
     * Route function for URL '/downloads/file'
     * 
     * @param Application $app
     * @param string $file
     */
    public function get(Application $app, $file)
    {
        $url = null;
        switch ($file) {
            case 'encrypt-bash':
                $file_path = __DIR__ . '/../../scripts/shell/bash/encrypt.sh';
                if (!is_file($file_path)) {
                    // Path when running site for local development
                    $file_path = __DIR__ . '/../../../scripts/shell/bash/encrypt.sh';
                }
                return (new Response())->file($file_path, 'download');
            case 'fastsitephp':
                $url = 'https://github.com/fastsitephp/fastsitephp/archive/master.zip';
                break;
            case 'starter-site':
                $url = 'https://github.com/fastsitephp/starter-site/archive/master.zip';
                break;
            case 'framework':
                $url = 'https://github.com/fastsitephp/fastsitephp/archive/1.0.0.zip';
                break;
        }
        if (isset($url)) {
            $app->redirect($url);
        }
        return $app->pageNotFoud();
    }
}