<?php
namespace extas\interfaces\templates;

use extas\interfaces\repositories\IRepository;

/**
 * Interface IHasTemplate
 *
 * @package extas\interfaces\templates
 * @author jeyroik@gmail.com
 */
interface IHasTemplate
{
    const FIELD__TEMPLATE = 'template';

    /**
     * @return ITemplate|null
     */
    public function getTemplate(): ?ITemplate;

    /**
     * @param ITemplate $template
     *
     * @return $this
     */
    public function setTemplate(ITemplate $template);

    /**
     * @return string
     */
    public function getTemplateName(): string;

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setTemplateName(string $name);

    /**
     * @return IRepository
     */
    public function getTemplateRepository();
}
