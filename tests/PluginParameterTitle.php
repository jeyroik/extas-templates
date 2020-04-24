<?php
namespace tests;

use extas\components\plugins\Plugin;
use extas\interfaces\stages\IStageTemplateParameterGet;
use extas\interfaces\templates\parameters\ITemplateParameter;

/**
 * Class PluginParameterTitle
 *
 * @package tests
 * @author jeyroik@gmail.com
 */
class PluginParameterTitle extends Plugin implements IStageTemplateParameterGet
{
    public function __invoke(ITemplateParameter &$parameter): void
    {
        $parameter->setTitle('New title');
    }
}
