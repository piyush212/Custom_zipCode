<?php

namespace Custom\PincodeChecker\Controller\Adminhtml\Importpincode;

use Magento\Framework\App\Filesystem\DirectoryList;

class Edit extends \Magento\Backend\App\Action
{
    
    /**
     * Page factory
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * Result JSON factory
     *
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $_resultJsonFactory;

    /**
     * constructor
     *
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Filesystem $fileSystem,
        \Magento\Framework\Filesystem\Io\File $fileio,
        \Magento\Backend\App\Action\Context $context
    ) {
    
        $this->_backendSession    = $context->getSession();
        $this->_resultPageFactory = $resultPageFactory;
        $this->_resultJsonFactory = $resultJsonFactory;
        $this->_filesystem = $fileSystem;
        $this->_fileio = $fileio;
        parent::__construct($context);
    }

    /**
     * is action allowed
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Custom_PincodeChecker::importpincode');
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page|\Magento\Framework\View\Result\Page $resultPage */
        $imagepath = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)
                ->getAbsolutePath('catalog');
        $this->_fileio->mkdir($imagepath, '0777', true);
        $imagepath = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)
                ->getAbsolutePath('catalog/category');
        $this->_fileio->mkdir($imagepath, '0777', true);
        $path = $this->_filesystem->getDirectoryRead(DirectoryList::VAR_DIR)
        ->getAbsolutePath('categoryimport');
        $this->_fileio->mkdir($path, '0777', true);
        if (!is_writable($imagepath)) {
            $this->messageManager->addNotice(__('Please make this directory path writable pub/media/catalog/category'));
        }
        if (!is_writable($path)) {
            $this->messageManager->addNotice(__('Please make this directory path writable var/categoryimport'));
        }
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Custom_PincodeChecker::tab');
        $resultPage->getConfig()->getTitle()->prepend('Import Pincodes');
        return $resultPage;
    }
}
