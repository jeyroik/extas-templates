<?php
namespace extas\components\templates;

use extas\components\THasDescription;
use extas\components\THasName;
use extas\components\THasOwner;
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
    use THasOwner;
    use THasDescription;
    use THasName;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'extas.template';
    }
}
