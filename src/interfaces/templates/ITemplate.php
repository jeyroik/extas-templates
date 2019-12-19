<?php
namespace extas\interfaces\templates;

use extas\interfaces\IHasDescription;
use extas\interfaces\IHasName;
use extas\interfaces\players\IHasOwner;
use extas\interfaces\IItem;
use extas\interfaces\templates\parameters\IHasTemplateParameters;

/**
 * Interface ITemplate
 *
 * Шаблоны применяются для создания конкретных реализаций.
 * Шаблон не связан с конкретной реализацией, но обратная связь должна существовать.
 * Для этого рекомендуется использовать интерфейс extas\interfaces\templates\IHasTemplate.
 *
 * @package extas\interfaces\templates
 * @author jeyroik@gmail.com
 */
interface ITemplate extends IItem, IHasDescription, IHasOwner, IHasName, IHasTemplateParameters
{
}
