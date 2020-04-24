<?php
namespace extas\interfaces\stages;

use extas\interfaces\templates\parameters\ITemplateParameter;

/**
 * Interface IStageTemplateParameterGet
 *
 * @package extas\interfaces\stages
 * @author jeyroik@gmail.com
 */
interface IStageTemplateParameterGet
{
    public const NAME__SUFFIX = 'parameter';

    /**
     * @param ITemplateParameter $parameter
     */
    public function __invoke(ITemplateParameter &$parameter): void;
}
