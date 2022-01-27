<?php
namespace ConfigWise\ArWidget\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Registry;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class Data extends AbstractHelper
{
	const CONFIGWISE_ARWIDGET_ENABLE = 'arwidget/general/enable';
    const CONFIGWISE_ARWIDGET_ATTRIBUTE = 'arwidget/general/attributelist';
    const CONFIGWISE_ARWIDGET_CHANNEL_ID = 'arwidget/general/channel_id';
    const CONFIGWISE_ARWIDGET_DOMAIN = 'arwidget/general/domain';
    const CONFIGWISE_ARWIDGET_COMPANY_REF_NUMBER = 'arwidget/general/company_reference_number';
	const CONFIGWISE_ARWIDGET_DEFAULTBEHAVIOUR = 'arwidget/general/defaultbehaviour';
	
    protected $_modelStoreManagerInterface;
	protected $_frameworkRegistry;
	protected $jsonHelper;
	protected $_session;
	private $_responseFactory;
    private $_url;
    protected $_emailfilter;
    protected $messageManager;

    public function __construct(Context $context, 
        StoreManagerInterface $modelStoreManagerInterface, 
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\App\ResponseFactory $responseFactory,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Email\Model\Template\Filter $filter,
        Registry $frameworkRegistry,
        \Magento\Customer\Model\Session $session,
        \Magento\Framework\Json\Helper\Data $jsonHelper
    )
    {
        $this->_modelStoreManagerInterface = $modelStoreManagerInterface;
        $this->_frameworkRegistry = $frameworkRegistry;
        $this->_session = $session;
        $this->_responseFactory = $responseFactory;
        $this->_url = $url;
        $this->messageManager = $messageManager;
        $this->_emailfilter = $filter;
        $this->jsonHelper = $jsonHelper;
		parent::__construct($context);
    }

	public function isEnabled()
	{
     	return $this->scopeConfig->getValue(self::CONFIGWISE_ARWIDGET_ENABLE, ScopeInterface::SCOPE_STORE);
	}

	public function getAttributelist()
	{
     	return $this->scopeConfig->getValue(self::CONFIGWISE_ARWIDGET_ATTRIBUTE, ScopeInterface::SCOPE_STORE);
	}

	public function getChannelId()
	{
     	return $this->scopeConfig->getValue(self::CONFIGWISE_ARWIDGET_CHANNEL_ID, ScopeInterface::SCOPE_STORE); 
	}

    public function getDomain()
    {
        return $this->scopeConfig->getValue(self::CONFIGWISE_ARWIDGET_DOMAIN, ScopeInterface::SCOPE_STORE); 
    }

    public function getReffNumber()
    {
        return $this->scopeConfig->getValue(self::CONFIGWISE_ARWIDGET_COMPANY_REF_NUMBER, ScopeInterface::SCOPE_STORE); 
    }
    public function getdefaultbehaviour()
    {
        return $this->scopeConfig->getValue(self::CONFIGWISE_ARWIDGET_DEFAULTBEHAVIOUR, ScopeInterface::SCOPE_STORE); 
    }

}