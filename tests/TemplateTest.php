<?php
namespace tests;

use extas\components\Item;
use extas\components\SystemContainer;
use extas\components\templates\parameters\TemplateParameter;
use extas\components\templates\parameters\THasTemplateParameters;
use extas\components\templates\Template;
use extas\components\templates\TemplateRepository;
use extas\components\templates\THasTemplate;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\templates\IHasTemplate;
use extas\interfaces\templates\ITemplateRepository;
use extas\interfaces\templates\parameters\IHasTemplateParameters;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateTest
 *
 * @package tests
 * @author jeyroik@gmail.com
 */
class TemplateTest extends TestCase
{
    protected ?IRepository $templateRepo = null;

    protected function setUp(): void
    {
        parent::setUp();
        $env = \Dotenv\Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->templateRepo = new TemplateRepository();
    }

    public function tearDown(): void
    {
        $this->templateRepo->delete([Template::FIELD__NAME => 'test_template']);
    }

    public function testHasTemplate()
    {
        $hasTemplate = new class extends Item implements IHasTemplate {
            use THasTemplate;

            protected function getSubjectForExtension(): string
            {
                return 'test';
            }

            public function getTemplateRepository()
            {
                return SystemContainer::getItem(ITemplateRepository::class);
            }
        };

        $hasTemplate->setTemplateName('test');
        $this->assertEquals('test', $hasTemplate->getTemplateName());

        $template = new Template([
            Template::FIELD__NAME => 'test_template',
            Template::FIELD__TITLE => 'Test'
        ]);
        $hasTemplate->setTemplate($template);
        $this->assertEquals('test_template', $hasTemplate->getTemplateName());

        $this->templateRepo->create($template);
        $this->assertNotEmpty($hasTemplate->getTemplate());
        $this->assertEquals('Test', $hasTemplate->getTemplate()->getTitle());
    }

    public function testHasTemplateParameters()
    {
        $hasTParameters = new class extends Item implements IHasTemplateParameters {
            use THasTemplateParameters;
            protected function getSubjectForExtension(): string
            {
                return 'test';
            }
        };

        $hasTParameters->setParameters([
            [
                TemplateParameter::FIELD__NAME => 'par1'
            ],
            [
                TemplateParameter::FIELD__NAME => 'par2'
            ]
        ]);

        $this->assertCount(2, $hasTParameters->getParameters());
        $paramsAsObjects = $hasTParameters->getParameters(false);
        foreach ($paramsAsObjects as $parameter) {
            $this->assertTrue($parameter instanceof TemplateParameter);
        }

        $paramsAsArray = $hasTParameters->getParameters(true);
        foreach ($paramsAsArray as $parameter) {
            $this->assertTrue(is_array($parameter));
        }

        $hasTParameters->setParameter('test', [
            TemplateParameter::FIELD__NAME => 'test',
            TemplateParameter::FIELD__TITLE => 'Test'
        ]);

        $this->assertNotEmpty($hasTParameters->getParameter('test'));
        $this->assertEquals('Test', $hasTParameters->getParameter('test')->getTitle());
        $this->assertEquals(['default' => true], $hasTParameters->getParameter('unknown', ['default' => true]));
        $this->assertEquals([
                TemplateParameter::FIELD__NAME => 'test',
                TemplateParameter::FIELD__TITLE => 'Test'
            ],
            $hasTParameters->getParameter('test', [], true)
        );
    }
}
