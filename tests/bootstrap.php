<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\ErrorHandler\DebugClassLoader;

require dirname(__DIR__).'/vendor/autoload.php';

// Reports methods that miss a native return type their parent declares or announces,
// so such deprecations fail the suite through the deprecation baseline in phpunit.xml.dist.
DebugClassLoader::enable();

// These deprecations fire only once per process: when a legacy Twig_* alias is first loaded and
// on the first new Spreadsheet(). Triggering them here keeps their baseline entries the same
// whichever tests run, so running a single test or directory does not fail on them.
foreach ([
    'Twig_BaseNodeVisitor', 'Twig_Compiler', 'Twig_Environment', 'Twig_Error_Loader', 'Twig_Error_Runtime',
    'Twig_Error_Syntax', 'Twig_Extension', 'Twig_Loader_Filesystem', 'Twig_Node', 'Twig_Node_Expression',
    'Twig_Node_Expression_Array', 'Twig_Node_Expression_Constant', 'Twig_Node_Expression_MethodCall',
    'Twig_Node_Expression_Name', 'Twig_Node_Text', 'Twig_SimpleFunction', 'Twig_Token', 'Twig_TokenParser',
] as $legacyTwigClass) {
    class_exists($legacyTwigClass);
}
new Spreadsheet();
