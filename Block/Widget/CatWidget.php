<?php
namespace Digimix\CatWidget\Block\Widget;

class CatWidget extends \Magento\Framework\View\Element\Template implements \Magento\Widget\Block\BlockInterface
{
	protected $_template = 'widget/catwidget.phtml';

	    /**
     * Default value for products count that will be shown
     */
     const DEFAULT_IMAGE_WIDTH = 250;
     const DEFAULT_IMAGE_HEIGHT = 250;
     protected $_categoryHelper;
     protected $categoryFlatConfig;

     protected $topMenu;
     protected $_categoryFactory;
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Catalog\Helper\Category $categoryHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Catalog\Model\Indexer\Category\Flat\State $categoryFlatState,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Theme\Block\Html\Topmenu $topMenu
    ) {
        $this->_categoryHelper = $categoryHelper;
        $this->categoryFlatConfig = $categoryFlatState;
        $this->topMenu = $topMenu;
        $this->_categoryFactory = $categoryFactory;
        parent::__construct($context);
    }
    /**
     * Return categories helper
     */
    public function getCategoryHelper()
    {
        return $this->_categoryHelper;
    }

     public function getCategorymodel($id)
    {
         $_category = $this->_categoryFactory->create();
            $_category->load($id);
            return $_category;
    }

    /**
     * Retrieve current store categories
     *
     * @param bool|string $sorted
     * @param bool $asCollection
     * @param bool $toLoad
     * @return \Magento\Framework\Data\Tree\Node\Collection|\Magento\Catalog\Model\Resource\Category\Collection|array
     */

    public function getCategoryCollection()
    {
	    if( $this->getData('featcats') ){
			$str_featcats = $this->getData('featcats');
			$arr_featcats = explode(",",$str_featcats);
		} else {
			$arr_featcats = ['3','23','4'];
		}

        $collection = $this->_categoryFactory->create()
            ->addAttributeToFilter('is_active', 1)
            ->addAttributeToFilter('include_in_menu', 1)
            ->addAttributeToFilter('entity_id', ['in' => $arr_featcats])
            ->addAttributeToSelect(['name', 'entity_id', 'parent_id', 'image', 'url_key']);
            ->setPageSize(12);
        return $collection;
    }

     /**
     * Get the widht of product image
     * @return int
     */
    public function getImagewidth() {
		if($this->getData('imagewidth')==''){
			return DEFAULT_IMAGE_WIDTH;
		}
        return (int) $this->getData('imagewidth');
    }
     /**
     * Get the height of product image
     * @return int
     */
    public function getImageheight() {
		if($this->getData('imageheight')==''){
			return DEFAULT_IMAGE_HEIGHT;
		}
        return (int) $this->getData('imageheight');
    }

    public function canShowImage(){
    	if($this->getData('image') == 'image')
    		return true;
    	elseif($this->getData('image') == 'no-image')
    	return false;
    }
}