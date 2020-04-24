![tests](https://github.com/jeyroik/extas-templates/workflows/PHP%20Composer/badge.svg?branch=master&event=push)
![codecov.io](https://codecov.io/gh/jeyroik/extas-templates/coverage.svg?branch=master)
<a href="https://github.com/phpstan/phpstan"><img src="https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat" alt="PHPStan Enabled"></a>

# DEPRECATED

Пакет считается устаревшим. Предпочтительнее использовать [extas-samples](https://github.com/jeyroik/extas-samples "Extas samples").

# Описание

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