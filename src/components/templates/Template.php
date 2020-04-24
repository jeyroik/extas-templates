<?php
namespace extas\components\templates;

use extas\components\templates\parameters\THasTemplateParameters;
use extas\components\THasDescription;
use extas\components\THasName;
use extas\components\players\THasPlayer;
use extas\interfaces\templates\ITemplate;
use extas\components\Item;

/**
 * Class Template
 *
 * @package extas\components\templates
 * @author jeyroik@gmail.com
 */
class Template extends Item implements ITemplate
{
    use THasPlayer;
    use THasDescription;
    use THasName;
    use THasTemplateParameters;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'extas.template';
    }
}
