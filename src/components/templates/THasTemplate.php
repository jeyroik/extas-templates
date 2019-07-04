<?php
namespace extas\components\templates;

use extas\interfaces\repositories\IRepository;
use extas\interfaces\templates\IHasTemplate;
use extas\interfaces\templates\ITemplate;

/**
 * Trait THasTemplate
 *
 * @property $config
 * @method getTemplateRepository()
 *
 * @package extas\components\templates
 * @author jeyroik@gmail.com
 */
trait THasTemplate
{
    /**
     * @return ITemplate|null
     */
    public function getTemplate(): ?ITemplate
    {
        /**
         * @var $template ITemplate
         * @var $templateRepo IRepository
         */
        $templateName = $this->getTemplateName();
        $templateRepo = $this->getTemplateRepository();

        return $templateRepo->one([ITemplate::FIELD__NAME => $templateName]);
    }

    /**
     * @param ITemplate $template
     *
     * @return $this
     */
    public function setTemplate(ITemplate $template)
    {
        $this->config[IHasTemplate::FIELD__TEMPLATE] = $template->getName();

        return $this;
    }

    /**
     * @return string
     */
    public function getTemplateName(): string
    {
        return $this->config[IHasTemplate::FIELD__TEMPLATE] ?? '';
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setTemplateName(string $name)
    {
        $this->config[IHasTemplate::FIELD__TEMPLATE] = $name;

        return $this;
    }
}
