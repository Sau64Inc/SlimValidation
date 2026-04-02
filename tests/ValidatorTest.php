<?php

namespace Awurth\SlimValidation\Tests;

use Awurth\SlimValidation\Validator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Respect\Validation\Validator as V;
use Slim\Psr7\Factory\ServerRequestFactory;
use TypeError;

class ValidatorTest extends TestCase
{
    /**
     * @var array
     */
    protected $array;

    /**
     * @var TestObject
     */
    protected $object;

    /**
     * @var ServerRequestInterface
     */
    protected $request;

    /**
     * @var Validator
     */
    protected $validator;

    public function setUp(): void
    {
        $this->request = (new ServerRequestFactory())
            ->createServerRequest('GET', 'http://localhost')
            ->withQueryParams(['username' => 'a_wurth', 'password' => '1234']);

        $this->array = [
            'username' => 'a_wurth',
            'password' => '1234'
        ];

        $this->object = new TestObject('private', 'protected', 'public');

        $this->validator = new Validator();
    }

    public function testValidateWithoutRules()
    {
        $this->expectException(TypeError::class);
        $this->validator->validate($this->request, [
            'username'
        ]);
    }

    public function testValidateWithOptionsWrongType()
    {
        $this->expectException(TypeError::class);
        $this->validator->validate($this->request, [
            'username' => null
        ]);
    }

    public function testValidateWithRulesWrongType()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->validator->validate($this->request, [
            'username' => [
                'rules' => null
            ]
        ]);
    }

    public function testRequest()
    {
        $this->validator->request($this->request, [
            'username' => V::length(6)
        ]);

        $this->assertEquals(['username' => 'a_wurth'], $this->validator->getValues());
        $this->assertEquals('a_wurth', $this->validator->getValue('username'));
        $this->assertTrue($this->validator->isValid());
    }

    public function testRequestWithGroup()
    {
        $this->validator->request($this->request, [
            'username' => V::length(6)
        ], 'user');

        $this->assertEquals([
            'user' => [
                'username' => 'a_wurth'
            ]
        ], $this->validator->getValues());
        $this->assertEquals('a_wurth', $this->validator->getValue('username', 'user'));
        $this->assertTrue($this->validator->isValid());
    }

    public function testArray()
    {
        $this->validator->array($this->array, [
            'username' => V::notBlank(),
            'password' => V::notBlank()
        ]);

        $this->assertEquals(['username' => 'a_wurth', 'password' => '1234'], $this->validator->getValues());
        $this->assertTrue($this->validator->isValid());
    }

    public function testObject()
    {
        $this->validator->object($this->object, [
            'privateProperty' => V::notBlank(),
            'protectedProperty' => V::notBlank(),
            'publicProperty' => V::notBlank()
        ]);

        $this->assertEquals([
            'privateProperty' => 'private',
            'protectedProperty' => 'protected',
            'publicProperty' => 'public',
        ], $this->validator->getValues());
        $this->assertTrue($this->validator->isValid());
    }

    public function testValue()
    {
        $this->validator->value(2017, V::numeric()->between(2010, 2020), 'year');

        $this->assertEquals(['year' => 2017], $this->validator->getValues());
        $this->assertTrue($this->validator->isValid());
    }

    public function testValidateWithErrors()
    {
        $this->validator->validate($this->request, [
            'username' => V::length(8)
        ]);

        $this->assertEquals(['username' => 'a_wurth'], $this->validator->getValues());
        $this->assertEquals('a_wurth', $this->validator->getValue('username'));
        $this->assertFalse($this->validator->isValid());
        $this->assertEquals([
            'username' => [
                'length' => '"a_wurth" must have a length greater than or equal to 8'
            ]
        ], $this->validator->getErrors());
    }

    public function testValidateWithIndexedErrors()
    {
        $this->validator->setShowValidationRules(false);
        $this->validator->validate($this->request, [
            'username' => V::length(8)
        ]);

        $this->assertEquals(['username' => 'a_wurth'], $this->validator->getValues());
        $this->assertEquals('a_wurth', $this->validator->getValue('username'));
        $this->assertFalse($this->validator->isValid());
        $this->assertEquals([
            'username' => [
                '"a_wurth" must have a length greater than or equal to 8'
            ]
        ], $this->validator->getErrors());
    }

    public function testValidateWithGroupedErrors()
    {
        $this->validator->validate($this->request, [
            'username' => V::length(8)
        ], 'user');

        $this->assertFalse($this->validator->isValid());
        $this->assertEquals([
            'user' => [
                'username' => [
                    'length' => '"a_wurth" must have a length greater than or equal to 8'
                ]
            ]
        ], $this->validator->getErrors());
    }

    public function testIsValidWithErrors()
    {
        $this->validator->setErrors(['error']);

        $this->assertFalse($this->validator->isValid());
    }

    public function testIsValidWithoutErrors()
    {
        $this->validator->removeErrors();

        $this->assertTrue($this->validator->isValid());
    }

    public function testAddError()
    {
        $this->validator->addError('param', 'message');

        $this->assertEquals([
            'param' => [
                'message'
            ]
        ], $this->validator->getErrors());
    }

    public function testGetFirstError()
    {
        $this->assertEquals('', $this->validator->getFirstError('username'));

        $this->validator->setErrors([
            'param' => [
                'notBlank' => 'Required'
            ],
            'username' => [
                'alnum' => 'Only letters and numbers are allowed',
                'length' => 'Too short!'
            ]
        ]);

        $this->assertEquals('Only letters and numbers are allowed', $this->validator->getFirstError('username'));

        $this->validator->setErrors([
            'param' => [
                'Required'
            ],
            'username' => [
                'This field is required',
                'Only letters and numbers are allowed'
            ]
        ]);

        $this->assertEquals('This field is required', $this->validator->getFirstError('username'));
    }

    public function testGetErrors()
    {
        $this->assertEquals([], $this->validator->getErrors('username'));

        $this->validator->setErrors([
            'param' => [
                'Required'
            ],
            'username' => [
                'This field is required',
                'Only letters and numbers are allowed'
            ]
        ]);

        $this->assertEquals([
            'This field is required',
            'Only letters and numbers are allowed'
        ], $this->validator->getErrors('username'));
    }

    public function testGetError()
    {
        $this->assertEquals('', $this->validator->getError('username', 'length'));

        $this->validator->setErrors([
            'username' => [
                'alnum' => 'Only letters and numbers are allowed',
                'length' => 'Too short!'
            ]
        ]);

        $this->assertEquals('Too short!', $this->validator->getError('username', 'length'));
    }

    public function testSetValues()
    {
        $this->assertEquals([], $this->validator->getValues());

        $this->validator->setValues([
            'username' => 'awurth',
            'password' => 'pass'
        ]);

        $this->assertEquals([
            'username' => 'awurth',
            'password' => 'pass'
        ], $this->validator->getValues());
    }

    public function testSetDefaultMessage()
    {
        $this->assertEquals([], $this->validator->getDefaultMessages());

        $this->validator->setDefaultMessage('length', 'Too short!');

        $this->assertEquals([
            'length' => 'Too short!'
        ], $this->validator->getDefaultMessages());
    }

    public function testSetErrors()
    {
        $this->assertEquals([], $this->validator->getErrors());

        $this->validator->setErrors([
            'notBlank' => 'Required',
            'length' => 'Too short!'
        ], 'username');

        $this->assertEquals([
            'username' => [
                'notBlank' => 'Required',
                'length' => 'Too short!'
            ]
        ], $this->validator->getErrors());
    }

    public function testSetShowValidationRules()
    {
        $this->assertTrue($this->validator->getShowValidationRules());

        $this->validator->setShowValidationRules(false);

        $this->assertFalse($this->validator->getShowValidationRules());
    }

    public function testValidateInvalidSearcher()
    {
        $this->validator->value('FR', [
            'rules' => V::subdivisionCode('US')
        ], 'subdivision');

        $this->assertFalse($this->validator->isValid());
    }

    public function testLocaleSpanishMessages()
    {
        $validator = new Validator(locale: 'es');
        $validator->request($this->request, [
            'username' => V::length(8)
        ]);

        $errors = $validator->getErrors();
        $this->assertArrayHasKey('username', $errors);
        $this->assertArrayHasKey('length', $errors['username']);
        $this->assertStringContainsString('caracteres', $errors['username']['length']);
    }

    public function testLocaleDefaultIsNull()
    {
        $validator = new Validator();
        $this->assertNull($validator->getLocale());
    }

    public function testSetLocaleAtRuntime()
    {
        $validator = new Validator();
        $validator->setLocale('es');
        $this->assertEquals('es', $validator->getLocale());

        $validator->request($this->request, [
            'username' => V::length(8)
        ]);

        $errors = $validator->getErrors();
        $this->assertStringContainsString('caracteres', $errors['username']['length']);
    }

    public function testDefaultMessagesOverrideLocale()
    {
        $validator = new Validator(
            defaultMessages: ['length' => 'Custom length message'],
            locale: 'es'
        );
        $validator->request($this->request, [
            'username' => V::length(8)
        ]);

        $errors = $validator->getErrors();
        $this->assertEquals('Custom length message', $errors['username']['length']);
    }

    public function testPerFieldMessagesOverrideAll()
    {
        $validator = new Validator(
            defaultMessages: ['length' => 'Default override'],
            locale: 'es'
        );
        $validator->request($this->request, [
            'username' => [
                'rules' => V::length(8),
                'messages' => ['length' => 'Per-field override']
            ]
        ]);

        $errors = $validator->getErrors();
        $this->assertEquals('Per-field override', $errors['username']['length']);
    }

    public function testGlobalMessagesOverrideLocale()
    {
        $validator = new Validator(locale: 'es');
        $validator->request($this->request, [
            'username' => V::length(8)
        ], null, ['length' => 'Global override']);

        $errors = $validator->getErrors();
        $this->assertEquals('Global override', $errors['username']['length']);
    }

    public function testBackwardCompatibilityWithoutLocale()
    {
        $this->validator->request($this->request, [
            'username' => V::length(8)
        ]);

        $errors = $this->validator->getErrors();
        $this->assertArrayHasKey('username', $errors);
        $this->assertArrayHasKey('length', $errors['username']);
        // Should be the default English message from respect/validation
        $this->assertStringContainsString('must have a length', $errors['username']['length']);
    }
}
