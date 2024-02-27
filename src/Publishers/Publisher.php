<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Themes\Bootstrap5\Publishers;

use BasicApp\Core\Publisher as BasePublisher;

class Publisher extends BasePublisher
{

    const VERSION = '5.3.2';

    protected $source = VENDORPATH . 'basic-app/theme-bootstrap5/assets';

    protected $destination = FCPATH . 'themes' . DIRECTORY_SEPARATOR . 'bootstrap5';

    public $createDestination = true;

    public $url = 'https://github.com/twbs/bootstrap/releases/download/v' 
        . self::VERSION .'/bootstrap-' 
        . self::VERSION . '-dist.zip';

    public function publish(): bool
    {
        if (count(directory_map($this->destination)) > 0)
        {
            return true;
        }
        
        $this->addPath('/')->merge(false);

        return $this->downloadFile($this->url)
            ->extractZipArchive($this->getScratch() . 'bootstrap-' . self::VERSION . '-dist.zip')
            ->setSource($this->getScratch() . 'bootstrap-' . self::VERSION . '-dist')
            ->addPath('/')
            ->merge(false);
    }

}