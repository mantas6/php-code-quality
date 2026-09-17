<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\ClassMethod\LocallyCalledStaticMethodToNonStaticRector;
use Rector\CodingStyle\Rector\PostInc\PostIncDecToPreIncDecRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\MethodCall\RemoveNullArgOnNullDefaultParamRector;
use Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector;
use Rector\PHPUnit\CodeQuality\Rector\StmtsAwareInterface\DeclareStrictTypesTestsRector;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\SafeDeclareStrictTypesRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/app',
        __DIR__ . '/bootstrap/app.php',
        __DIR__ . '/database',
        __DIR__ . '/routes',
        __DIR__ . '/tests',
        __DIR__ . '/config',
        __DIR__ . '/lang',
        __DIR__ . '/public',
    ])
    ->withSkip([
        ClosureToArrowFunctionRector::class,
        RemoveNullArgOnNullDefaultParamRector::class,
        // ReturnTypeFromStrictTypedCallRector::class,

        SafeDeclareStrictTypesRector::class,
        DeclareStrictTypesTestsRector::class,
        DeclareStrictTypesRector::class,
        PostIncDecToPreIncDecRector::class,
        LocallyCalledStaticMethodToNonStaticRector::class,
    ])
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        // typeDeclarations: true,
        // typeDeclarationDocblocks: true,
        privatization: true,
        instanceOf: true,
        earlyReturn: true,
        carbon: true,
        rectorPreset: true,
        phpunitCodeQuality: true,

    )
    ->withImportNames(removeUnusedImports: true)
    ->withPhpSets()
    ->withComposerBased(phpunit: true, laravel: true);
