<?php

namespace OrviSoft\AddToCartByUrl\Controller\Addtocart;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Data\Form\FormKey;
use Magento\Checkout\Model\Cart;
use Magento\Catalog\Model\Product;


class Bysku extends \Magento\Framework\App\Action\Action
{

    protected $formKey;   
    protected $cart;
    protected $product;
    private $productRepository;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context  $context
     * @param \Magento\Framework\Data\Form\FormKey $formKey
     * @param \Magento\Checkout\Model\Cart $cart
     * @param \Magento\Catalog\Model\Product $product
     */
    public function __construct(
        Context $context,
        FormKey $formKey,
        Cart $cart,
        Product $product,
        \Magento\Catalog\Model\ProductRepository $productRepository) {
            $this->formKey = $formKey;
            $this->cart = $cart;
            $this->product = $product;    
            $this->productRepository = $productRepository;  
            parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        //echo "Here we go...!";
        $sku = $this->getRequest()->getParam('sku');
        try {
            $product = $this->productRepository->get($sku);
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e){
            die("The requested Product doesn't exists or is currently out of stock.");
        }
        
        $productId =$product->getId();
        $params = array(
                    'form_key' => $this->formKey->getFormKey(),
                    'product' => $productId, 
                    'qty'   =>1
                );              
        $this->cart->addProduct($product, $params);
        $this->cart->save();
        return $this->_redirect('checkout/cart');
    }

}
