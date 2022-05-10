<?php

namespace Plugin\StockShow4\Controller\Admin;

use Plugin\StockShow4\Form\Type\Admin\StockShowConfigType;
use Plugin\StockShow4\Repository\StockShowConfigRepository;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

// EC-CUBE本体のAbstractControllerを継承
/**
 * Class ConfigController.
 */
class ConfigController extends \Eccube\Controller\AbstractController
{
    // @RouteでURLをマッピング
    // @TemplateでTwigのテンプレートファイルを指定
    /**
     * @Route("/%eccube_admin_route%/stock_show4/config", name="stock_show4_admin_config")
     * @Template("@StockShow4/admin/config.twig")
     * 
     * @param Request $request
     * @param StockShowConfigRepository $configRepository
     * 
     * @return array
     */
    public function index(Request $request, StockShowConfigRepository $configRepository)
    {
        $Config = $configRepository->get();
        // フォームを構築
        $form = $this->createForm(StockShowConfigType::class, $Config);
        // ユーザーから送信されたリクエストをフォームオブジェクト内に書き込み
        $form->handleRequest($request);

        // フォームチェックはSymfonyのisSubmitted()とisValid()を使用
        if ($form->isSubmitted() && $form->isValid()) {
            // $formの値を取得
            $Config = $form->getData();
            // $Configを永続化するエンティティとして管理
            $this->entityManager->persist($Config);
            // DBに永続化
            $this->entityManager->flush($Config);
            log_info('Stock show config', ['status' => 'Success']);
            $this->addSuccess('登録しました。', 'admin');
            return $this->redirectToRoute('stock_show4_admin_config');
        }
        return [
            'form' => $form->createView(),
        ];
    }
}
