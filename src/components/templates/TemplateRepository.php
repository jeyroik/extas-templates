<?php
namespace extas\components\templates;

use extas\components\repositories\Repository;
use extas\interfaces\templates\ITemplateRepository;

/**
 * Class TemplateRepository
 *
 * @package extas\components\templates
 * @author jeyroik@gmail.com
 */
class TemplateRepository extends Repository implements ITemplateRepository
{
    protected string $name = 'templates';
    protected string $pk = Template::FIELD__NAME;
    protected string $scope = 'extas';
    protected string $itemClass = Template::class;
    protected string $idAs = '';
}
