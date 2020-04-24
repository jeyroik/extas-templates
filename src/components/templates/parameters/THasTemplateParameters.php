<?php
namespace extas\components\templates\parameters;

use extas\interfaces\stages\IStageTemplateParameterGet;
use extas\interfaces\templates\parameters\IHasTemplateParameters;
use extas\interfaces\templates\parameters\ITemplateParameter;

/**
 * Trait THasTemplateParameters
 * 
 * @property $config
 * @method getSubjectForExtension()
 * @method getPluginsByStage(string $stage)
 * 
 * @package extas\components\templates\parameters
 * @author jeyroik@gmail.com
 */
trait THasTemplateParameters
{
    /**
     * @param bool $asArray return IParameter[] if false, return array of arrays otherwise
     *
     * @return  ITemplateParameter[]|array
     */
    public function getParameters($asArray = false)
    {
        $parameters = $this->config[IHasTemplateParameters::FIELD__PARAMETERS] ?? [];

        if (!$asArray) {
            $items = [];
            foreach ($parameters as $parameterData) {
                $parameter = new  TemplateParameter($parameterData);
                $subject = $this->getSubjectForExtension();
                $suffix = IStageTemplateParameterGet::NAME__SUFFIX;
                foreach ($this->getPluginsByStage($subject . '.' . $suffix) as $plugin) {
                    $plugin($parameter);
                }
                $items[] = $parameter;
            }

            return $items;
        }

        return $parameters;
    }

    /**
     * @param  ITemplateParameter[]|array $parameters
     *
     * @return $this
     */
    public function setParameters($parameters)
    {
        $this->config[IHasTemplateParameters::FIELD__PARAMETERS] = [];

        foreach ($parameters as $parameter) {
            $data = $parameter instanceof  ITemplateParameter ? $parameter->__toArray() : $parameter;
            $this->config[IHasTemplateParameters::FIELD__PARAMETERS][] = $data;
        }

        return $this;
    }

    /**
     * @param string $name
     * @param  ITemplateParameter|array $default
     * @param bool $asArray return IParameter if false, return array otherwise
     *
     * @return  ITemplateParameter|array|null
     */
    public function getParameter($name, $default = null, $asArray = false)
    {
        $parameters = $this->config[IHasTemplateParameters::FIELD__PARAMETERS] ?? [];
        $byName = array_column($parameters, null,  ITemplateParameter::FIELD__NAME);

        $parameter = $byName[$name] ?? [];

        if (empty($parameter)) {
            return $default;
        }

        return $asArray ? $parameter : new  TemplateParameter($parameter);
    }

    /**
     * @param string $name
     * @param  ITemplateParameter|array $parameter
     *
     * @return $this
     */
    public function setParameter($name, $parameter)
    {
        $parameters = $this->config[IHasTemplateParameters::FIELD__PARAMETERS] ?? [];
        $byName = array_column($parameters, null,  ITemplateParameter::FIELD__NAME);
        $byName[$name] = $parameter instanceof  ITemplateParameter ? $parameter->__toArray() : $parameter;

        $this->config[IHasTemplateParameters::FIELD__PARAMETERS] = array_values($byName);

        return $this;
    }
}
