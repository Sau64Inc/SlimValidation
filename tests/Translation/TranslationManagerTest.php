<?php

namespace Sau64Inc\SlimValidation\Tests\Translation;

use Sau64Inc\SlimValidation\Translation\TranslationManager;
use PHPUnit\Framework\TestCase;

class TranslationManagerTest extends TestCase
{
    public function testDefaultLocaleIsEnglish()
    {
        $manager = new TranslationManager();
        $this->assertEquals('en', $manager->getLocale());
    }

    public function testSetLocale()
    {
        $manager = new TranslationManager('en');
        $manager->setLocale('es');
        $this->assertEquals('es', $manager->getLocale());
    }

    public function testLoadEnglishTranslations()
    {
        $manager = new TranslationManager('en');
        $translations = $manager->getTranslations();

        $this->assertIsArray($translations);
        $this->assertNotEmpty($translations);
        $this->assertArrayHasKey('length', $translations);
        $this->assertArrayHasKey('email', $translations);
        $this->assertArrayHasKey('notBlank', $translations);
    }

    public function testLoadSpanishTranslations()
    {
        $manager = new TranslationManager('es');
        $translations = $manager->getTranslations();

        $this->assertIsArray($translations);
        $this->assertNotEmpty($translations);
        $this->assertArrayHasKey('length', $translations);
        $this->assertStringContainsString('caracteres', $translations['length']);
        $this->assertStringContainsString('requerido', $translations['notBlank']);
    }

    public function testNonExistentLocaleReturnsEmptyArray()
    {
        $manager = new TranslationManager('xx');
        $translations = $manager->getTranslations();

        $this->assertIsArray($translations);
        $this->assertEmpty($translations);
    }

    public function testAddCustomTranslations()
    {
        $manager = new TranslationManager('fr');
        $manager->addTranslations('fr', [
            'email' => '{{name}} doit etre un email valide',
        ]);

        $translations = $manager->getTranslations();
        $this->assertEquals('{{name}} doit etre un email valide', $translations['email']);
    }

    public function testCustomTranslationsOverrideBuiltIn()
    {
        $manager = new TranslationManager('en');
        $manager->addTranslations('en', [
            'email' => 'Custom email message',
        ]);

        $translations = $manager->getTranslations();
        $this->assertEquals('Custom email message', $translations['email']);
        // Other keys should still be from built-in
        $this->assertArrayHasKey('length', $translations);
    }

    public function testCachingLocaleFile()
    {
        $manager = new TranslationManager('en');
        $first = $manager->getTranslations();
        $second = $manager->getTranslations();

        $this->assertEquals($first, $second);
    }

    public function testCustomTranslationsPath()
    {
        $tempDir = sys_get_temp_dir() . '/slim-validation-test-' . uniqid();
        mkdir($tempDir);
        file_put_contents($tempDir . '/pt.php', '<?php return ["email" => "{{name}} deve ser um email valido"];');

        $manager = new TranslationManager('pt', $tempDir);
        $translations = $manager->getTranslations();

        $this->assertEquals('{{name}} deve ser um email valido', $translations['email']);

        unlink($tempDir . '/pt.php');
        rmdir($tempDir);
    }
}
