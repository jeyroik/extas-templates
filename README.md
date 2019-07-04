# extas-templates

Пакет с extas-совместимой сущностью "Шаблон".

# Установка

`composer require jeyroik/extas-templates:*`

# Использование 

```php

use extas\interfaces\templates\IHasTemplate;

use extas\components\Item;
use extas\components\repositories\Repository;
use extas\components\templates\THasTemplate;

class CarTemplatesRepository extends Repository
{
}

class Car extends Item implements IHasTemplte
{
    use THasTemplate;
    
    public function getTemplateRepository()
    {
        return new CarTemplatesRepository();
    }
}

/**
 * @var $templateRepo CarTemplatesRepository
 */
$mazda = new Template(['name' => 'mazda', 'description' => 'Mazda model']);
$templateRepo->create($mazda);

$car = new Car([IHasTemplate::FIELD__TEMPLATE => 'mazda']);
echo $car->getTemplate()->getDescription(); // 'Mazda model'

```