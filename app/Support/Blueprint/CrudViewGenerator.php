<?php

namespace App\Support\Blueprint;

use Blueprint\Generators\Statements\ViewGenerator;
use Blueprint\Models\Statements\RenderStatement;
use Blueprint\Tree;

class CrudViewGenerator extends ViewGenerator
{
    public function output(Tree $tree): array
    {
        $output = [];

        $stub = $this->filesystem->stub('view.stub');

        /**
         * @var \Blueprint\Models\Controller $controller
         */
        foreach ($tree->controllers() as $controller) {
            foreach ($controller->methods() as $method => $statements) {
                foreach ($statements as $statement) {
                    if (! $statement instanceof RenderStatement) {
                        continue;
                    }

                    /** @var \Blueprint\Models\Statements\RenderStatement $statement */

                    $path = $this->getPath($statement->view());

                    if ($this->filesystem->exists($path)) {
                        // TODO: mark skipped...
                        continue;
                    }

                    $this->filesystem->ensureDirectoryExists(dirname($path));

                    $this->filesystem->put($path, $this->populateStub($stub, $statement));

                    $output['created'][] = $path;
                }
            }
        }

        return $output;
    }
}
