<?php

/**
 * English translation templates for Respect\Validation 2.x rules.
 *
 * Rule IDs are lcfirst of the rule class name (e.g., Length -> 'length').
 * Placeholders use the {{placeholder}} syntax from Respect\Validation.
 */
return [
    // String rules
    'length' => '{{name}} must have a length between {{minValue}} and {{maxValue}}',
    'notBlank' => '{{name}} must not be blank',
    'notEmpty' => '{{name}} must not be empty',
    'email' => '{{name}} must be a valid email',
    'url' => '{{name}} must be a valid URL',
    'regex' => '{{name}} must match the pattern {{regex}}',
    'alnum' => '{{name}} must contain only letters and digits',
    'alpha' => '{{name}} must contain only letters',
    'digit' => '{{name}} must contain only digits',
    'lowercase' => '{{name}} must be lowercase',
    'uppercase' => '{{name}} must be uppercase',
    'contains' => '{{name}} must contain the value {{containsValue}}',
    'startsWith' => '{{name}} must start with {{startValue}}',
    'endsWith' => '{{name}} must end with {{endValue}}',
    'slug' => '{{name}} must be a valid slug',
    'noWhitespace' => '{{name}} must not contain whitespace',

    // Numeric rules
    'numeric' => '{{name}} must be numeric',
    'numericVal' => '{{name}} must be numeric',
    'intVal' => '{{name}} must be an integer',
    'floatVal' => '{{name}} must be a float number',
    'number' => '{{name}} must be a number',
    'positive' => '{{name}} must be positive',
    'negative' => '{{name}} must be negative',
    'between' => '{{name}} must be between {{minValue}} and {{maxValue}}',
    'min' => '{{name}} must be greater than or equal to {{compareTo}}',
    'max' => '{{name}} must be less than or equal to {{compareTo}}',
    'greaterThan' => '{{name}} must be greater than {{compareTo}}',
    'lessThan' => '{{name}} must be less than {{compareTo}}',
    'decimal' => '{{name}} must have {{decimals}} decimals',
    'even' => '{{name}} must be an even number',
    'odd' => '{{name}} must be an odd number',
    'multiple' => '{{name}} must be a multiple of {{multipleOf}}',

    // Comparison rules
    'equals' => '{{name}} must equal {{compareTo}}',
    'equivalent' => '{{name}} must be equivalent to {{compareTo}}',
    'identical' => '{{name}} must be identical to {{compareTo}}',
    'in' => '{{name}} must be in {{haystack}}',

    // Type rules
    'stringType' => '{{name}} must be a string',
    'intType' => '{{name}} must be an integer',
    'floatType' => '{{name}} must be a float',
    'boolType' => '{{name}} must be a boolean',
    'boolVal' => '{{name}} must be a boolean value',
    'arrayType' => '{{name}} must be an array',
    'arrayVal' => '{{name}} must be an array value',
    'objectType' => '{{name}} must be an object',
    'nullType' => '{{name}} must be null',
    'resourceType' => '{{name}} must be a resource',
    'callableType' => '{{name}} must be callable',
    'scalarVal' => '{{name}} must be a scalar value',
    'iterableType' => '{{name}} must be iterable',
    'countable' => '{{name}} must be countable',

    // Date/Time rules
    'date' => '{{name}} must be a valid date in the format {{sample}}',
    'dateTime' => '{{name}} must be a valid date/time',
    'time' => '{{name}} must be a valid time in the format {{sample}}',
    'leapDate' => '{{name}} must be a leap date',
    'leapYear' => '{{name}} must be a leap year',
    'minAge' => '{{name}} must be at least {{age}} years old',
    'maxAge' => '{{name}} must be at most {{age}} years old',

    // File rules
    'file' => '{{name}} must be a file',
    'directory' => '{{name}} must be a directory',
    'exists' => '{{name}} must exist',
    'readable' => '{{name}} must be readable',
    'writable' => '{{name}} must be writable',
    'executable' => '{{name}} must be executable',
    'uploaded' => '{{name}} must be an uploaded file',
    'image' => '{{name}} must be a valid image',
    'mimetype' => '{{name}} must have the MIME type {{mimetype}}',
    'extension' => '{{name}} must have the extension {{extension}}',
    'size' => '{{name}} must be between {{minSize}} and {{maxSize}}',

    // Special rules
    'optional' => '{{name}} must be optional',
    'nullable' => '{{name}} must be nullable',
    'notOptional' => '{{name}} must not be optional',
    'key' => '{{name}} must be present',
    'callback' => '{{name}} must be valid',
    'not' => '{{name}} must not be valid',
    'json' => '{{name}} must be a valid JSON string',
    'uuid' => '{{name}} must be a valid UUID',
    'ip' => '{{name}} must be a valid IP address',
    'phone' => '{{name}} must be a valid phone number',
    'creditCard' => '{{name}} must be a valid credit card number',
    'isbn' => '{{name}} must be a valid ISBN',
    'iban' => '{{name}} must be a valid IBAN',
    'postalCode' => '{{name}} must be a valid postal code',
    'countryCode' => '{{name}} must be a valid country code',
    'currencyCode' => '{{name}} must be a valid currency code',
    'languageCode' => '{{name}} must be a valid language code',
    'tld' => '{{name}} must be a valid top-level domain',
    'domain' => '{{name}} must be a valid domain',
    'macAddress' => '{{name}} must be a valid MAC address',
    'version' => '{{name}} must be a valid version number',
    'unique' => '{{name}} must contain only unique values',
    'subset' => '{{name}} must be a subset of {{superset}}',
    'sorted' => '{{name}} must be sorted',

    // File upload rules
    'fileUploaded' => '{{name}} must be a successfully uploaded file',
    'fileMaxSize' => '{{name}} must not exceed the maximum file size',
    'fileMimeType' => '{{name}} must have a valid MIME type',
    // Custom validation rules
    'internationalPhone' => '{{name}} must be a valid international phone number',
    'uInt32' => '{{name}} must be an unsigned 32-bit integer (0 to 4294967295)',
    'int32' => '{{name}} must be a signed 32-bit integer (-2147483648 to 2147483647)',
];
