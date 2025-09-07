<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        'app/Models',
        'app/Http',
    ])
    ->exclude('vendor')
    ->exclude('storage');

$config = (new PhpCsFixer\Config())
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect());

$config->setRules([
    '@PSR12' => true,
    'declare_strict_types' => true,
])
    ->setFinder($finder);

return $config;
