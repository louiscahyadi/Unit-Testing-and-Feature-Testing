<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Helpers\ArticleHelper;

class ArticleHelperTest extends TestCase
{
    public function test_summary_returns_expected_length()
    {
        $result = ArticleHelper::summary('Ini adalah artikel Laravel yang sangat menarik.', 10);
        $this->assertEquals('Ini adalah', $result);
    }
}
