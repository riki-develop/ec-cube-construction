<?php

namespace Plugin\StockShow4;

use Eccube\Event\TemplateEvent;
use Plugin\StockShow4\Repository\StockShowConfigRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class StockShowEvent implements EventSubscriberInterface
{
    /**
     * @var StockShowConfigRepository
     */
    protected $ConfigRepository;

    /**
     * ProductReview constructor.
     * 
     * @param StockShowConfigRepository $ConfigRepository
     */
    public function __construct(StockShowConfigRepository $ConfigRepository)
    {
        $this->ConfigRepository = $ConfigRepository;
    }

    /**
     * 配列のキーはイベント名、値は呼び出すメソッド名
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Product/detail.twig' => 'StockShowTwig',
        ];
    }

    /**
     * @param TemplateEvent $event
     */
    public function StockShowTwig(TemplateEvent $event)
    {
        $twig = '@StockShow4/default/Product/stock_show.twig';
        // addSnippet()関数で指定したテンプレートを<body>タグの下部に追加
        $event->addSnippet($twig);
        $Config = $this->ConfigRepository->get();
        $parameters = $event->getParameters();
        $parameters['StockQtyShow'] = $Config->getStockQtyShow();
        $event->setParameters($parameters);
    }
}