<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use Domain\Math\Calculator;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $result;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->result = null;
        $this->calculator = new Calculator();
    }

    /**
     * @When I add :arg1 and :arg2
     */
    public function iAddAnd($arg1, $arg2)
    {
        $this->result = $this->calculator->add($arg1, $arg2);
    }

    /**
     * @Then I get :arg1
     */
    public function iGet($arg1)
    {
        if ($arg1 != $this->result) {
            throw new \Exception();
        }
    }

    /**
     * @When I substract :arg1 and :arg2
     */
    public function iSubstractAnd($arg1, $arg2)
    {
        $this->result = $this->calculator->substract($arg1, $arg2);
    }

    /**
     * @When I multiply :arg1 and :arg2
     */
    public function iMultiplyAnd($arg1, $arg2)
    {
        $this->result = $this->calculator->multiply($arg1, $arg2);
    }

    /**
     * @When I divde :arg1 and :arg2
     */
    public function iDivdeAnd($arg1, $arg2)
    {
        $this->result = $this->calculator->divide($arg1, $arg2);
    }
}
