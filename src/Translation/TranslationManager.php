<?php

declare(strict_types=1);

namespace Sau64Inc\SlimValidation\Translation;

class TranslationManager
{
    protected string $locale;
    protected string $translationsPath;
    protected array $loadedTranslations = [];
    protected array $customTranslations = [];

    public function __construct(string $locale = 'en', ?string $translationsPath = null)
    {
        $this->locale = $locale;
        $this->translationsPath = $translationsPath ?? __DIR__ . '/lang';
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    /**
     * Returns merged translations for the current locale.
     * Built-in translations are overridden by custom translations.
     *
     * @return array<string, string>
     */
    public function getTranslations(): array
    {
        $builtIn = $this->loadLocaleFile($this->locale);
        $custom = $this->customTranslations[$this->locale] ?? [];

        return array_merge($builtIn, $custom);
    }

    /**
     * Add or override translations for a locale at runtime.
     *
     * @param string $locale
     * @param array<string, string> $translations
     */
    public function addTranslations(string $locale, array $translations): void
    {
        $existing = $this->customTranslations[$locale] ?? [];
        $this->customTranslations[$locale] = array_merge($existing, $translations);
    }

    /**
     * Load a locale file from disk. Results are cached per locale.
     *
     * @return array<string, string>
     */
    protected function loadLocaleFile(string $locale): array
    {
        if (isset($this->loadedTranslations[$locale])) {
            return $this->loadedTranslations[$locale];
        }

        $file = $this->translationsPath . '/' . $locale . '.php';

        if (!is_file($file)) {
            $this->loadedTranslations[$locale] = [];
            return [];
        }

        $translations = require $file;
        $this->loadedTranslations[$locale] = is_array($translations) ? $translations : [];

        return $this->loadedTranslations[$locale];
    }
}
