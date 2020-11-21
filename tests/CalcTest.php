<?php

namespace Tests;

use Kata\Calc;
use PHPUnit\Framework\TestCase;
use TypeError;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class CalcTest extends TestCase
{
    protected Calc $calc;

    public function setUp(): void
    {
        $this->calc = new Calc();
        parent::setUp();
    }

    public function testClassImplementation(): void
    {
        $this->assertInstanceOf(Calc::class, $this->calc);
    }

    /**
     * @test
     * @dataProvider validAdditionProvider
     * @param float $first
     * @param float $second
     * @param float $expectedResult
     *
     * @backupStaticAttributes enabled
     */
    public function validAddition(float $first, float $second, float $expectedResult): void
    {
        $this->assertEquals(
            $expectedResult,
            (new Calc())->Addition($first, $second)
        );
    }

    /**
     * @test2
     * return  array<Foo>
     */
    public function validAdditionProvider(): array
    {
        return [
            [1, 1.1, 2.1],
            [1, 1, 2],
            [1, 0, 1],
            [1, -1, 0],
            [1, -1.1, -0.1],
            [0, 1.1, 1.1],
            [0, 1, 1],
            [0, 0, 0],
            [0, -1, -1],
            [0, -1.1, -1.1],
            [-1, 1.1, 0.1],
            [-1, 1, 0],
            [-1, 0, -1],
            [-1, -1, -2],
            [-1, -1.1, -2.1],
            [-1.1, 1.1, 0],
            [-1.1, 1, -0.1],
            [-1.1, 0, -1.1],
            [-1.1, -1, -2.1],
            [-1.1, -1.1, -2.2],
        ];
    }

    /**
     * @test
     * @psalm-suppress NullArgument
     */
    public function invalidAdditionNullParameter(): void
    {
        $this->expectException(TypeError::class);
        $this->calc->addition(null, null); // @phpstan-ignore-line
    }

    /**
     * @test
     * @psalm-suppress InvalidScalarArgument
     */
    public function invalidAdditionStringParameter(): void
    {
        $this->expectException(TypeError::class);
        $this->calc->addition('string', 1); // @phpstan-ignore-line
    }

    /**
     * @test
     * @psalm-suppress InvalidArgument
     */
    public function invalidAdditionArrayParameter(): void
    {
        $this->expectException(TypeError::class);
        $this->calc->addition([1], 1); // @phpstan-ignore-line
    }
}
