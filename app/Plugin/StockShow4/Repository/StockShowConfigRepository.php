<?php

namespace Plugin\StockShow4\Repository;

use Eccube\Repository\AbstractRepository;
use Plugin\StockShow4\Entity\StockShowConfig;
use Symfony\Bridge\Doctrine\RegistryInterface;

// EC-CUBE本体のAbstractRepositoryを継承
// AbstractRepositoryはServiceEntityRepositoryを継承している
class StockShowConfigRepository extends AbstractRepository
{
    /**
     * ConfigRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StockShowConfig::class);
    }

    // エンティティのidを指定し、一致するレコードをオブジェクトで返す
    /**
     * @param int $id
     *
     * @return null|StockShowConfig
     */
    public function get($id = 1)
    {
        return $this->find($id);
    }
}
