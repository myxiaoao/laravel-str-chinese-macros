<?php

namespace Cooper\StrChineseMacros\Command;

use Cooper\StrChineseMacros\StrChineseMacrosServiceProvider;
use Illuminate\Console\Command;
use phpDocumentor\Reflection\DocBlockFactory;

class GenerateIdeHelpers extends Command
{
    protected $signature = 'generate-ide-helpers';
    protected $description = 'Generates the IDE helpers';

    public function __invoke()
    {
        $macros = (new StrChineseMacrosServiceProvider(app()))->macros();
        $factory = DocBlockFactory::createInstance();

        $files = collect([]);
        foreach ($macros as $name => $macro) {
            try {
                $class = new \ReflectionClass($macro);
            } catch (\ReflectionException $e) {
                continue;
            }

            $docblock = $factory->create($class->getDocComment());
            $tags = $docblock->getTagsWithTypeByName('param');

            $param = '';
            foreach ($tags as $tag) {
                $param .= $tag->getType().' $'.$tag->getVariableName();
            }
            $files[] = '    *  @method '.$name.'('.$param.')';
        }

        $header = $this->getFileHeader();
        $content = $files->implode(PHP_EOL);
        $footer = $this->getFileFooter();

        file_put_contents($this->getPath('_ide_helper.php'), $header.$content.$footer);

        $this->info('Generates the IDE helpers done.');
    }


    private function getPath(string $path = null): string
    {
        return __DIR__.'/../'.$path ?: '';
    }

    protected function getFileHeader(): string
    {
        return <<<EOT
<?php
namespace Illuminate\Support {
   /**
    * Illuminate\Support\Str
    * \n
EOT;
    }

    protected function getFileFooter(): string
    {
        return <<<EOT

    */
    class Str {}
}
EOT;
    }
}
