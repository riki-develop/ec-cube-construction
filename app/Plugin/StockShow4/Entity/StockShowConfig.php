<?php

namespace Plugin\StockShow4\Entity;

// Doctrine\ORM\Mappingクラスをインポートし、ORMという別名をつける。
use Doctrine\ORM\Mapping as ORM;

// @ORM\TableでDBのテーブルにマッピング
// @ORM\Entityでこのクラスに対するRepositoryを定義
/**
 * Config
 *
 * @ORM\Table(name="plg_stock_show4_config")
 * @ORM\Entity(repositoryClass="Plugin\StockShow4\Repository\StockShowConfigRepository")
 */

class StockShowConfig
{
    // privateでプロパティ$idを定義
    // @ORM\Columnでプロパティ$idをDBテーブルのカラムにマッピング
    // @ORM\Idで$idがプライマリーキーであることを定義
    // @ORM\GeneratedValueで"IDENTITY"を指定し、idを自動採番
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    // privateでプロパティ$stock_qty_showを定義
    // @ORM\Columnでプロパティ$stock_qty_showをDBテーブルのカラムにマッピング
    /**
     * @var int
     *
     * @ORM\Column(name="stock_qty_show", type="smallint", nullable=true, options={"unsigned":true, "default":5})
     */
    private $stock_qty_show;

    // プロパティ$idのGetterメソッドを定義
    /**
     * Get id.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    // プロパティ$stock_qty_showのGetterメソッドを定義
    /**
     * Get StockQtyShow
     * 
     * @return int
     */
    public function getStockQtyShow()
    {
        return $this->stock_qty_show;
    }

    // プロパティ$stock_qty_showのSetterメソッドを定義
    /**
     * Set $qty
     * 
     * @param int $qty
     *
     * @return $this;
     */
    public function setStockQtyShow($qty)
    {
        $this->stock_qty_show = $qty;
        return $this;
    }
}