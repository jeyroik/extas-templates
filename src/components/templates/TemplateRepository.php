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
    protected $name = 'templates';
    protected $pk = Template::FIELD__NAME;
    protected $scope = 'extas';
    protected $itemClass = Template::class;
    protected $idAs = '';
}
