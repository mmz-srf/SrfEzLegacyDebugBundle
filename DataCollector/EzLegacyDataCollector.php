<?php
namespace SRF\Bundles\EzLegacyDebugBundle\DataCollector;

use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use eZDebug;

use eZ\Bundle\EzPublishCoreBundle\Controller;


class EzLegacyDataCollector extends DataCollector
{
    protected $data = array();
    private $legacyKernel;


    public function __construct(\Closure $legacyKernelClosure)
    {
        $this->legacyKernel = $legacyKernelClosure;
    }

    /*
     * Overwrite the collect method and fill it
     * with custom EzPublish Stuff
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $this->data = array(
            'ezdata' =>  $this->ezDebugInfo()
        );
    }

    public function getEzData()
    {
        return $this->data['ezdata'];
    }

    public function ezDebugInfo()
    {
        $debugOutput = '';
        $closure = $this->legacyKernel;
        $kernel = $closure();

        $debugOutput = $kernel->runCallback(

            function ()
            {
                $ezDebugInstance = eZDebug::instance();
                $ezDebugInstance->setUseExternalCSS(true);
                $report = $ezDebugInstance->printReportInternal(true, true, false, true, true, false);
                return $report;

            });

        return $debugOutput;
    }

    public function getName()
    {
        return 'ezlegacydata';
    }
}