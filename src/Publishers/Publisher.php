<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Themes\Bootstrap5\Publishers;

use BasicApp\Core\Publisher as BasePublisher;

class Publisher extends BasePublisher
{

    protected $destination = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'bootstrap5';

    public $createDestination = true;

    public $url = 'https://github.com/twbs/bootstrap/releases/download/v5.2.3/bootstrap-5.2.3-dist.zip';

    public function publish(): bool
    {
        if (count(directory_map($this->destination)) > 0)
        {
            return true;
        }
        
        return $this->downloadFile($this->url)
            ->extractZipArchive($this->getScratch() . 'bootstrap-5.2.3-dist.zip')
            ->setSource($this->getScratch() . 'bootstrap-5.2.3-dist')
            ->addPath('/')
            ->merge(false);
    }

}