<?php

namespace App\Tests;

use App\Tests\FunctionalTester;

/**
 * Class AuthorListCest
 *
 * @package App\Tests
 */
class AuthorListCest
{
    /**
     * @param \App\Tests\FunctionalTester $I
     */
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/author/');
    }

    // test page title
    public function testPageTitle(FunctionalTester $I)
    {
        // Check page title
        $I->canSeeInTitle('Authors');

        // Check heading 1
        $I->canSee('Authors List', 'h1');
    }

    /**
     * @param \App\Tests\FunctionalTester $I
     */
    public function testCreateNewLink(FunctionalTester $I)
    {
        // Check add new link
        $I->canSeeLink('Create New', '/author/create');

        // Click the create new link
        $I->click('Create New');
        $I->amOnPage('/author/create');
        $I->canSee('Create new author', 'h1');
    }
}
