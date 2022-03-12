<?php

declare(strict_types=1);

namespace Tests;

use BladeUI\ThemifyIcons\BladeThemifyIconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Orchestra\Testbench\TestCase;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('themify-link')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17">
            <g>
            </g>
            <path d="M12.983 6.94l-0.938 0.938-0.707-0.707 0.938-0.938c0.975-0.975 0.975-2.561 0-3.535s-2.561-0.975-3.535 0l-2.987 2.988c-0.975 0.975-0.975 2.561 0 3.535s2.561 0.975 3.535 0l0.707 0.707c-0.683 0.683-1.578 1.023-2.475 1.023s-1.792-0.341-2.474-1.023c-1.364-1.364-1.364-3.585 0-4.949l2.987-2.987c1.365-1.365 3.584-1.365 4.949 0 1.365 1.363 1.365 3.584 0 4.948zM6.042 8.034l-0.13 0.129 0.705 0.709 0.131-0.13c0.975-0.975 2.561-0.975 3.535 0s0.975 2.561 0 3.535l-3.023 3.025c-0.975 0.975-2.561 0.975-3.535 0s-0.975-2.561 0-3.535l1.058-1.059-0.707-0.707-1.058 1.059c-1.364 1.364-1.364 3.585 0 4.949 0.683 0.683 1.578 1.023 2.475 1.023s1.792-0.341 2.475-1.023l3.023-3.024c1.364-1.364 1.364-3.585 0-4.949-1.366-1.367-3.586-1.364-4.949-0.002z" fill="#000000" />
            </svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('themify-tag', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg version="1.1" class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17">
            <g>
            </g>
                <path d="M8.953 1.008l-3.967 2.882v12.14l3.986-2.794 4.041 2.785v-12.135l-4.060-2.878zM12.014 14.117l-3.045-2.1-2.982 2.091v-9.709l2.975-2.161 3.053 2.165v9.714zM7.254 6.001c0 0.965 0.785 1.75 1.75 1.75s1.75-0.785 1.75-1.75-0.785-1.75-1.75-1.75-1.75 0.785-1.75 1.75zM9.004 5.251c0.413 0 0.75 0.337 0.75 0.75s-0.337 0.75-0.75 0.75-0.75-0.337-0.75-0.75 0.337-0.75 0.75-0.75z" fill="#000000" />
            </svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('themify-zip', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg version="1.1" style="color: #555" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17">
            <g>
            </g>
                <path d="M9.667 0h-7.667v17h13v-11.692l-5.333-5.308zM10 1.742l3.273 3.258h-3.273v-3.258zM3 16v-15h3v1h1v-1h2v5h5v10h-11zM5 8h1v1h-1v-1zM6 8v-1h1v1h-1zM6 6v-1h1v1h-1zM5 6h1v1h-1v-1zM5 4h1v1h-1v-1zM6 4v-1h1v1h-1zM5 2h1v1h-1v-1zM6 9.389c-1.103 0-2 0.897-2 2s0.897 2 2 2c0.062 0 0.121-0.007 0.219-0.020 0.646-0.071 1.218-0.455 1.531-1.026 0.166-0.303 0.25-0.624 0.25-0.954 0-1.103-0.897-2-2-2zM6.873 11.864c-0.156 0.285-0.441 0.477-0.762 0.512l-0.112 0.014c-0.551 0-0.999-0.449-0.999-1s0.449-1 1-1 1 0.449 1 1c0 0.159-0.043 0.319-0.127 0.474z" fill="#000000" />
            </svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeThemifyIconsServiceProvider::class,
        ];
    }
}