<?php

namespace Spatie\ViewComponents;

final class CompileRenderWhenDirective
{
    private $compileRenderDirective;

    public function __construct(CompileRenderDirective $compileRenderDirective)
    {
        $this->compileRenderDirective = $compileRenderDirective;
    }

    public function __invoke(string $expression): string
    {
        $expressionParts = explode(',', $expression, 2);

        return "<?php if({$expressionParts[0]}): ?> {$this->compileRenderDirective->__invoke($expressionParts[1])} <?php endif; ?>";
    }
}
