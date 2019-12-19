<?php
namespace extas\components\templates\parameters;

use extas\components\parameters\Parameter;
use extas\components\THasDescription;
use extas\interfaces\templates\parameters\ITemplateParameter;

/**
 * Class TemplateParameter
 *
 * @package extas\components\templates\parameters
 * @author jeyroik@gmail.com
 */
class TemplateParameter extends Parameter implements ITemplateParameter
{
    use THasDescription;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'extas.template.parameter';
    }
}
