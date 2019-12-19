<?php
namespace extas\interfaces\templates\parameters;

use extas\interfaces\parameters\IHasParameters;

/**
 * Interface IHasTemplateParameters
 *
 * @package extas\interfaces\templates\parameters
 * @author jeyroik@gmail.com
 */
interface IHasTemplateParameters
{
    const FIELD__PARAMETERS = IHasParameters::FIELD__PARAMETERS;

    /**
     * @param bool $asArray return  ITemplateParameter[] if false, return array of arrays otherwise
     *
     * @return  ITemplateParameter[]|array
     */
    public function getParameters($asArray = false);

    /**
     * @param  ITemplateParameter[]|array $parameters
     *
     * @return $this
     */
    public function setParameters($parameters);

    /**
     * @param string $name
     * @param  ITemplateParameter|array $default
     * @param bool $asArray return IParameter if false, return array otherwise
     *
     * @return  ITemplateParameter|array|null
     */
    public function getParameter($name, $default = null, $asArray = false);

    /**
     * @param string $name
     * @param  ITemplateParameter|array $parameter
     *
     * @return $this
     */
    public function setParameter($name, $parameter);
}
