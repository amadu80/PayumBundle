<?php
namespace Payum\Bundle\PayumBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Payum\Bundle\PayumBundle\DependencyInjection\Factory\Payment\PaypalExpressCheckoutNvpPaymentFactory;
use Payum\Bundle\PayumBundle\DependencyInjection\Factory\Payment\Be2BillPaymentFactory;
use Payum\Bundle\PayumBundle\DependencyInjection\Factory\Storage\DoctrineStorageFactory;
use Payum\Bundle\PayumBundle\DependencyInjection\Factory\Storage\FilesystemStorageFactory;

class PayumBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        /** @var $extension \Payum\Bundle\PayumBundle\DependencyInjection\PayumExtension */
        $extension = $container->getExtension('payum');
        
        $extension->addPaymentFactory(new PaypalExpressCheckoutNvpPaymentFactory());
        $extension->addPaymentFactory(new Be2BillPaymentFactory());

        $extension->addStorageFactory(new FilesystemStorageFactory());
        $extension->addStorageFactory(new DoctrineStorageFactory());
    }
}