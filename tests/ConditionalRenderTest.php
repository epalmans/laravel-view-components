<?php

namespace Spatie\ViewComponents\Tests;

class ConditionalRenderTest extends TestCase
{
    /** @test */
    public function it_renders_and_shows_a_component()
    {
        $this->assertBladeCompilesTo(
            '<?php if(true): ?> <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find( Spatie\ViewComponents\Tests\Stubs\MyComponent::class), [])->toHtml(); ?> <?php endif; ?>',
            '@renderWhen(true, Spatie\ViewComponents\Tests\Stubs\MyComponent::class)'
        );
    }

    /** @test */
    public function it_renders_and_hides_a_component()
    {
        $this->assertBladeCompilesTo(
            '<?php if(false): ?> <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find( Spatie\ViewComponents\Tests\Stubs\MyComponent::class), [])->toHtml(); ?> <?php endif; ?>',
            '@renderWhen(false, Spatie\ViewComponents\Tests\Stubs\MyComponent::class)'
        );
    }
}
