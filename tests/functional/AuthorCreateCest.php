<?php

namespace App\Tests;

use App\Tests\FunctionalTester;

/**
 * Class AuthorCreateCest
 *
 * @package App\Tests
 */
class AuthorCreateCest
{
    /**
     * @param \App\Tests\FunctionalTester $I
     */
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/author/create');
    }

    /**
     * @param \App\Tests\FunctionalTester $I
     */
    public function testPageTitle(FunctionalTester $I)
    {
        // Check page title
        $I->canSeeInTitle('Create new author');

        // Check heading 1
        $I->canSee('Create new author', 'h1');
    }

    /**
     * @param \App\Tests\FunctionalTester $I
     */
    public function testPageForm(FunctionalTester $I)
    {
        $I->canSeeElement('.author-form');
        $I->canSeeElement('.author-form form');
        $I->canSeeElement('input#author_name');
        $I->canSeeElement('button#author_save');
        $I->canSee('Save', 'button');
        $I->canSeeLink('Return to author list', '/author/');
    }

    /**
     * @param \App\Tests\FunctionalTester $I
     */
    public function testSubmitCreateAuthorForm(FunctionalTester $I)
    {
        $I->fillField('input#author_name', 'Testing Author');
        $I->click('Save');
        $I->amOnPage('/author/');
        $I->canSeeElement('ul');
        $I->canSee('Testing Author');
    }
}
