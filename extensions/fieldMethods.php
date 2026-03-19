<?php
return [
    'toMomentsTimestamp' => function ($field) {
        $format = option('date.handler') === 'intl' ? 'yyyy-MM-dd\'T\'HH:mm:ssXXX' : 'c';
        return $field->exists() && $field->isNotEmpty() ? $field->toDate($format) : '';
    },
    'toMomentsDate' => function ($field) {
        if (!$field->exists() || $field->isEmpty()) {
            return '';
        }

        $format = option('moinframe.moments.dateformat');
        if ($format) {
            return $field->toDate($format);
        }

        $locale = kirby()->language()?->code() ?? 'en';
        $formatter = new IntlDateFormatter(
            $locale,
            IntlDateFormatter::SHORT,
            IntlDateFormatter::NONE
        );

        return $formatter->format($field->toTimestamp());
    }
];
