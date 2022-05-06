<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Customize\Controller\Block;

use Eccube\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eccube\Repository\ProductRepository;

class NewProductController extends AbstractController
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(
        ProductRepository $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/block/new_product", name="block_new_product")
     * @Template("Block/new_product.twig")
     */
    public function index(Request $request)
    {
        $limit = 3;//取得する商品数
        $qb = $this->productRepository->getQueryBuilderBySearchData([]);
        $qb
        ->orderBy('p.create_date', 'desc')
        ->setMaxResults($limit);

        $Products = $qb->getQuery()->getResult();
        return [
            'Products' => $Products
        ];
    }
}