<?php

/**
 * English translation templates for Respect\Validation 2.x rules.
 *
 * Rule IDs are lcfirst of the rule class name (e.g., Length -> 'length').
 * Placeholders use the {{placeholder}} syntax from Respect\Validation.
 */
return [
    // String rules
    'length' => 'Must have a length between {{minValue}} and {{maxValue}}',
    'notBlank' => 'Must not be blank',
    'notEmpty' => 'Must not be empty',
    'email' => 'Must be a valid email',
    'url' => 'Must be a valid URL',
    'regex' => 'Must match the pattern {{regex}}',
    'alnum' => 'Must contain only letters and digits',
    'alpha' => 'Must contain only letters',
    'digit' => 'Must contain only digits',
    'lowercase' => 'Must be lowercase',
    'uppercase' => 'Must be uppercase',
    'contains' => 'Must contain the value {{containsValue}}',
    'startsWith' => 'Must start with {{startValue}}',
    'endsWith' => 'Must end with {{endValue}}',
    'slug' => 'Must be a valid slug',
    'noWhitespace' => 'Must not contain whitespace',

    // Numeric rules
    'numeric' => 'Must be numeric',
    'numericVal' => 'Must be numeric',
    'intVal' => 'Must be an integer',
    'floatVal' => 'Must be a float number',
    'number' => 'Must be a number',
    'positive' => 'Must be positive',
    'negative' => 'Must be negative',
    'between' => 'Must be between {{minValue}} and {{maxValue}}',
    'min' => 'Must be greater than or equal to {{compareTo}}',
    'max' => 'Must be less than or equal to {{compareTo}}',
    'greaterThan' => 'Must be greater than {{compareTo}}',
    'lessThan' => 'Must be less than {{compareTo}}',
    'decimal' => 'Must have {{decimals}} decimals',
    'even' => 'Must be an even number',
    'odd' => 'Must be an odd number',
    'multiple' => 'Must be a multiple of {{multipleOf}}',

    // Comparison rules
    'equals' => 'Must equal {{compareTo}}',
    'equivalent' => 'Must be equivalent to {{compareTo}}',
    'identical' => 'Must be identical to {{compareTo}}',
    'in' => 'Must be in {{haystack}}',

    // Type rules
    'stringType' => 'Must be a string',
    'intType' => 'Must be an integer',
    'floatType' => 'Must be a float',
    'boolType' => 'Must be a boolean',
    'boolVal' => 'Must be a boolean value',
    'arrayType' => 'Must be an array',
    'arrayVal' => 'Must be an array value',
    'objectType' => 'Must be an object',
    'nullType' => 'Must be null',
    'resourceType' => 'Must be a resource',
    'callableType' => 'Must be callable',
    'scalarVal' => 'Must be a scalar value',
    'iterableType' => 'Must be iterable',
    'countable' => 'Must be countable',

    // Date/Time rules
    'date' => 'Must be a valid date in the format {{sample}}',
    'dateTime' => 'Must be a valid date/time',
    'time' => 'Must be a valid time in the format {{sample}}',
    'leapDate' => 'Must be a leap date',
    'leapYear' => 'Must be a leap year',
    'minAge' => 'Must be at least {{age}} years old',
    'maxAge' => 'Must be at most {{age}} years old',

    // File rules
    'file' => 'Must be a file',
    'directory' => 'Must be a directory',
    'exists' => 'Must exist',
    'readable' => 'Must be readable',
    'writable' => 'Must be writable',
    'executable' => 'Must be executable',
    'uploaded' => 'Must be an uploaded file',
    'image' => 'Must be a valid image',
    'mimetype' => 'Must have the MIME type {{mimetype}}',
    'extension' => 'Must have the extension {{extension}}',
    'size' => 'Must be between {{minSize}} and {{maxSize}}',

    // Special rules
    'optional' => 'Is optional',
    'nullable' => 'Is nullable',
    'notOptional' => 'Is required',
    'key' => 'Must be present',
    'callback' => 'Is not valid',
    'not' => 'Is not valid',
    'json' => 'Must be a valid JSON string',
    'uuid' => 'Must be a valid UUID',
    'ip' => 'Must be a valid IP address',
    'phone' => 'Must be a valid phone number',
    'creditCard' => 'Must be a valid credit card number',
    'isbn' => 'Must be a valid ISBN',
    'iban' => 'Must be a valid IBAN',
    'postalCode' => 'Must be a valid postal code',
    'countryCode' => 'Must be a valid country code',
    'currencyCode' => 'Must be a valid currency code',
    'languageCode' => 'Must be a valid language code',
    'tld' => 'Must be a valid top-level domain',
    'domain' => 'Must be a valid domain',
    'macAddress' => 'Must be a valid MAC address',
    'version' => 'Must be a valid version number',
    'unique' => 'Must contain only unique values',
    'subset' => 'Must be a subset of {{superset}}',
    'sorted' => 'Must be sorted',

    // File upload rules
    'fileUploaded' => 'Must be a successfully uploaded file',
    'fileMaxSize' => 'Exceeds the maximum file size',
    'fileMimeType' => 'Must have a valid MIME type',
    // Custom validation rules
    'internationalPhone' => 'Must be a valid international phone number',
    'uInt32' => 'Must be an unsigned 32-bit integer (0 to 4294967295)',
    'int32' => 'Must be a signed 32-bit integer (-2147483648 to 2147483647)',
    'fileCount' => 'Must contain between {{minValue}} and {{maxValue}} files',
];
