<?php

namespace shop\forms\manage\Shop;

use shop\entities\Shop\Brand;
use shop\forms\CompositeForm;
use shop\forms\manage\MetaForm;
use yii\base\Model;

/**
 * @property MetaForm $meta;
 */
class BrandForm extends CompositeForm
{
    public $name;
    public $slug;
    private $_meta;
    private $_brand;

    public function __construct(Brand $brand = null, $config = [])
    {
        if ($brand) {
            $this->name = $brand->name;
            $this->slug = $brand->slug;
            $this->meta = new MetaForm($brand->meta);
            $this->_brand = $brand;
        }
        parent::__construct($config);
    }


    public function rules(): array
    {
        return [
            [['name', 'slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
            ['slug', 'match', 'pattern' => '#^[a-z0-9_-]*$#s'],
            [['name', 'slug'], 'unique', 'targetClass' => Brand::class, 'filter' => $this->_brand ? ['<>', 'id', $this->_brand->id] : null]
        ];
    }

    public function internalForms(): array
    {
        return ['meta'];
    }
}