<?php

namespace Plugin\StockShow4\Form\Type\Admin;

use Plugin\StockShow4\Entity\StockShowConfig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StockShowConfigType extends AbstractType
{
    // フォーム項目を生成
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('stock_qty_show', IntegerType::class);
    }

    // data_classオプションでエンティティのクラス名を指定
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StockShowConfig::class,
        ]);
    }
}
