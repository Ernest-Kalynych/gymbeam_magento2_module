<?php
namespace GymBeam\Greeting\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Index extends Action
{
    protected $scopeConfig;
    protected $path = 'GymBeam_Greeting/greeting_config_group/';

    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function execute()
    {
        if ($this->isEnabled()) {
			echo "Showing of greeting module config value is enabled. <br>";
            echo "text: " . $this->scopeConfig->getValue($this->path . 'text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE) . "<br>";
			echo "module_config_show_enabled: " . $this->scopeConfig->getValue($this->path . 'module_config_show_enabled', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        } else {
            echo "Showing of greeting module config value is disabled. ";
        }
        
        exit;
    }

    public function isEnabled()
    {
        return (bool) $this->scopeConfig->getValue($this->path . 'module_config_show_enabled', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
