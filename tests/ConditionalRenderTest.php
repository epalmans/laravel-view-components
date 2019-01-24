<?php

namespace Spatie\ViewComponents\Tests;

class ConditionalRenderTest extends TestCase
{
    /** @test */
    public function it_renders_a_component_from_a_classname()
    {
        $this->assertBladeCompilesTo(
            '<?php if(true): ?> <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find( Spatie\ViewComponents\Tests\Stubs\MyComponent::class), [])->toHtml(); ?> <?php endif; ?>',
            '@renderWhen(true, Spatie\ViewComponents\Tests\Stubs\MyComponent::class)'
        );
    }

    /** @test */
    public function it_does_not_output_on_falsy_renderwhen()
    {
        $this->assertBladeOutputs(
            '',
            '@renderWhen(false, Spatie\ViewComponents\Tests\Stubs\MyComponent::class)'
        );
    }
}
